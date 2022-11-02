<?php 

use MVC\Model;

class ModelsBodega extends Model {

    public function buscaordencompra($json){
        $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $data = [];

        $query = "CALL recibos.buscaOrdenCompra('".$params['folio']."') ";

        $data['query']=$query;
        $result = $this->db->query($query);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
                $data['data'][]= $value;
            endforeach;
            
        }else{
            $data['data']= 'NO DATA';
        }
        return $data;
    }

    public function guardarbodega($json)
    {
        $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $data = [];


        foreach ($params as $value) {
            if (isset($value['formallego'])) {  
              
                $sqlQuery ="CALL recibos.guardaentradabodega(".$value['id'].",".$value['idCompDet'].",".$value['folio'].",'".$value['cve']."','".$value['num_sol']."','".$value['cod_depto']."','".$value['fec_sol']."',".$value['cant_ord'].",'".$value['des_art']."','".$value['descp']."','".$value['resp_dpto']."',".$value['numfactura'].",'".$value['idagricom']."','".$value['formallego']."',".$value['cantidadllego'].",'".$value['bodeguero']."',".$value['idbodega'].",".$value['idFolio'].")";

                // $sqlQuery="CALL recibos.guardaentradabodega(".$value['id'].",".$value['idFolio'].")";
               
                $data["query"] = $sqlQuery;


                $result = $this->db->query($sqlQuery);
                if ($result->num_rows) {
                    foreach($result->rows as $key => $value):
                        $data['data'][]=$value;
                    endforeach;
                }
            }
        }
        return $data;
    }

    public function crearpdf($json){
        $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $data = [];
        $data['paramJSON'] = $params;
        $hora = date('H:i:s a');
        $fecha = date('d-m-Y ');
        $productor ="";
        $imagen ="";
        $codigobarra = substr($params['codigobarra'], 0, 1);

        if ($codigobarra == "A") {
            $subTitulo="RECEPCION DE MERCANCIA AGRICOMPRAS ";
            $ordenCompra = $params['codigobarra'];
        }else{
            $subTitulo="RECEPCION DE MERCANCIA ";
        }

        switch ($params['cve']) {
            case '01':
                $productor="AGRICOLA CHAPARRAL S. DE P.R. DE R.L.";
                $imagen ="chaparral";
                break;
            case '02':
                $productor="AGROINDUSTRIAS TOMBELL SA DE CV";
                $imagen ="tombell";
                break;
            case '03':
                $productor="VILLA SANTIAGO";
                $imagen ="villasantiago";
                break;
            case '06':
                $productor="CITRIC FRESH S. DE P.R. DE R.L.";
                $imagen ="citric";
                break;
            default:
                # code...
                break;
        }

        $sqlQuery = "SELECT * FROM recibos.statusordencompra where num_sol ='".$params['num_sol']."' AND cve ='".$params['cve']."' AND folio = ".$params['ordenCompra']." limit 1";
        $data["querypdf"] = $sqlQuery;
        $result = $this->db->query($sqlQuery);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
              //  $data['data'][]= $value;
                if ($codigobarra !== "A") {
                    $ordenCompra = $value['folio'];
                }
                
                $fechareq = $value['fec_sol'];
                $numsol = $value['num_sol'];
                $responsable = $value['resp_dpto'];
                $depto = $value['descp'];
                $usuario = $value['usuario'];
                $cveproductor =$value['cve'];
                //$datos[] =array('folio'=>$row['id'],'numsol'=>$numsol,'ordenCompra'=>$ordenCompra,'PDF'=>'SE CREA PDF CON EXITO');
            endforeach;

            
        }   

        $cImagen = 'images/'.$imagen.'.png';
        require('fpdf/fpdf.php');
        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(200,6,$productor,0,1,'C');
        $pdf->Cell(200,6,$subTitulo,0,1,'C');
        $pdf->Image($cImagen,20,0,30,30);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,6,'Orden de Compra:',0,0,'C');
        $pdf->Cell(50,6,'Fecha de Solicitud:',0,0,'C');
        $pdf->Cell(50,6,'Requisicion:',0,0,'C');
        $pdf->Cell(50,6,'Fecha Recibe',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50,6,$ordenCompra,0,0,'C');
        $pdf->Cell(50,6,$fechareq,0,0,'C');
        $pdf->Cell(50,6,$numsol,0,0,'C');
        $pdf->Cell(50,6,$fecha.' '.$hora,0,1 ,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(60,6,'Responsable',0,0,'C');
        $pdf->Cell(60,6,'Departamento',0,0,'C');
        $pdf->Cell(70,6,'Recibe',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(60,6,$responsable,0,0,'C');
        $pdf->Cell(60,6,$depto,0,0,'C');
        $pdf->Cell(70,6,$usuario,0,1,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15,6,'Folio',1,0,'C');
        $pdf->Cell(90,6,'Descripcion',1,0,'C');
        $pdf->Cell(25,6,'Cant-Bodega',1,0,'C');
        $pdf->Cell(20,6,'Recibido',1,0,'C');
        $pdf->Cell(20,6,'Por Surtir',1,0,'C');
        $pdf->Cell(20,6,'Estatus',1,1,'C');
        $pdf->SetFont('Arial','',7);


        $querypdf = "SELECT * FROM recibos.statusordencompra where num_sol ='".$params['num_sol']."' AND cve ='".$params['cve']."' AND folio = ".$params['ordenCompra'];
        $resultpdf = $this->db->query($querypdf);
        if ($resultpdf->num_rows) {
            foreach($resultpdf->rows as $key => $registros):
                $pdf->Cell(15,6,$registros['idFolio']      ,0,0,'C');
                $pdf->Cell(90,6,$registros['des_art']       ,0,0,'C');
                $pdf->Cell(25,6, $registros['cant_ord']   ,0,0,'C');
                $pdf->Cell(20,6, $registros['cant_llego'] ,0,0,'C');
                $pdf->Cell(20,6, $registros['por_surtir'] ,0,0,'C');
                $pdf->Cell(20,6, $registros['status']     ,0,1,'C'); 
            endforeach;
        }
        $pdf->Output('C:\bodegapdf\Orden_'.$ordenCompra.'.pdf', 'F');
        $data['pdf']='OK';
        return $data;
    }

    public function enviarcorreo($json){
        $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $data = [];
        $folioOrdenCompra =     $params['ordenCompra'].$params['cve'];
        $codigobarra = substr(  $params['codigobarra'], 0, 1);

        if ($codigobarra == "A") {
            $titulo="NOTIFICACION DE RECEPCION DE MERCANCIA AGRICOMPRAS ORDEN ". $params['ordenCompra'];
            $subTitulo="ESTATUS DE RECEPCION DE MERCANCIA AGRICOMPRAS ORDEN ". $params['ordenCompra'];
            $ordenCompra = $params['codigobarra'];
        }else{
            $titulo="NOTIFICACION DE RECEPCION DE MERCANCIA GPOCH ORDEN ". $params['ordenCompra'];
            $subTitulo="ESTATUS DE RECEPCION DE MERCANCIA GPOCH ORDEN ". $params['ordenCompra'];
            $ordenCompra = $params['ordenCompra'];
        }

        $correoResp="";
        //obtener los correos 
        $sqlQuery = "SELECT dep.correo FROM recibos.compdep dep INNER JOIN recibos.comphist his ON (CONCAT(his.folio,his.cve)='".$folioOrdenCompra."' and dep.cod_dpto='".$params['cod_depto']."' ) GROUP BY dep.correo";
        $result = $this->db->query($sqlQuery);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
                $correoResp=$value;
            endforeach;
        }
        //hacer string un array 
        $correoResp= implode(";",$correoResp);

        //obtener el pdf
        $nomarchivopdf = "Orden_".$ordenCompra.".pdf"; 
        $archivopdf = "C:/bodegapdf/".$nomarchivopdf; 

        require 'PHPMailer\PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->SMTPAuth = false;                               // Enable SMTP authentication
        $mail->SMTPAutoTLS = false ;
        $mail->Host = 'mail.agricolachaparral.com';                       // Specify main and backup server
        $mail->Port =26;                                    // Set the SMTP port number - 587 for authenticated TLS 465
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Username = 'notificaciones@agricolachaparral.com';               // SMTP username
        $mail->Password = 'N0t1f1c4c10n3s-19';                 // SMTP password
        $mail->setFrom('notificaciones@agricolachaparral.com');   
        $mail->addAddress('pjimenez@agricolachaparral.com');            // A QUIEN LE LLEGARA EL CORREO
        $mail->addAddress("jesusmadrid@agricolachaparral.com");
        $mail->addAddress("adelgado@agricolachaparral.com");
        $mail->addAddress("elylara@agricolachaparral.com");
        $mail->addAddress("ccardenas@agricolachaparral.com");
        $mail->addAddress("rlopez@agricolachaparral.com");

        $token = strtok($correoResp, ";");
        while($token !== false) {
        // $data['correoResp'][] = $token;
            $mail->addAddress($token); 
            $token = strtok(";"); 
        }
        $mail->FromName   =$titulo;
        $mail->addAttachment($archivopdf);                          // SE ADJUNTA EL ARCHIVO DESCARGADO
        $mail->Subject    = $subTitulo; //ASUNTO DEL CORREO
        $mail->Body       = '<b>BUEN DIA HACER CASO OMISO SON CORREOS DE PRUEBA !</b>
                            <br> Estatus de recepcion de mercancia
                            <br> Orden de compra : '.$ordenCompra; //LO QUE CONTENDRA EL CORREO
        $mail->AltBody    = 'Este es un mensaje automatico'; //SOLO ES UN EJEMPLO DE LO QUE PUEDE CONTENER

        if(!$mail->send())
        {
            echo 'MESSAGE COULD NOT BE SENT.';
            echo 'MAILER ERROR: ' . $mail->ErrorInfo;
            exit;
        }else{
            $data["correo"] = "OK";
        }
        return $data;   

    }

    public function inbodega($json){
        $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE 
        $data = [];

        $sqlQuery = "CALL recibos.buscaEntradasBodega('".$params['fecha']."','".$params['empresa']."','".$params['bodega']."')";
        $result = $this->db->query($sqlQuery);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
                $data['data'][]=$value;
            endforeach;
        }
        return $data;
    }

    public function salidabodega($json){
        $params= json_decode($json,true);
        $data=[];

    
        foreach ($params as $value) {
            $sqlQuery ="CALL recibos.guardaSalidaBodega('".$value['folio']."',".$value['idbodega'].",".$value['id'].",'".$value['chofer']."',".$value['cantSalida'].",'".$value['transporte']."','".$value['uso']."','".$value['obse']."')";
            $result = $this->db->query($sqlQuery);
            if ($result->num_rows) {
                foreach($result->rows as $key => $value):
                    $data['data']= $value;
                endforeach;
            }
        }
        return $data;
    }

    public function foliosalida($json){
        $params= json_decode($json,true);
        $data=[];
        $query = "CALL recibos.folioSalidaBodega('".$params['empresa']."','".$params['bodega']."') ";

        $data['query']=$query;
       $result = $this->db->query($query);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
                $data['folio']= $value;
            endforeach;
            
        }else{
            $data['folio']= 'NO DATA';
        }
        return $data;
    }

    public function guardafactura($json){
        $params= json_decode($json,true);
        $data=[];
        $total =0;
        if($params['total'] !==''){
            $total =$params['total'];
        }
  
        $query = "CALL recibos.factbodegaordencompra(".$params['numero'].",'".$params['folio']."','".$params['receptor']."','".$params['emisor']."',".$total.",'".$params['ordenCompra']."')";

        $data['query']=$query;
       $result = $this->db->query($query);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
                $data['data']= $value;
            endforeach;
            
        }else{
            $data['data']= 'NO DATA';
        }
        return $data;
    }

    public function reportebodega($json){
        $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE 
        $data = [];

        $sqlQuery = "CALL recibos.buscaReporteBodega('".$params['fecha']."','".$params['empresa']."','".$params['bodega']."')";
        $result = $this->db->query($sqlQuery);
        if ($result->num_rows) {
            foreach($result->rows as $key => $value):
                $data['data'][]=$value;
            endforeach;
        }
        return $data;
    }
    
    
    
}

