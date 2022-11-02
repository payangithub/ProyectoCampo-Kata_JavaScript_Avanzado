<?php 

use MVC\Model;

class ModelsCampo extends Model {
    public function getAllProductos(){
        $data = [];

        $query = "CALL campo.proc_getproductall() ";

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

    public function getProductosbyId($params){
        $data = [];

        $query = "CALL campo.proc_getproductid('".$params['id']."') ";

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
    
    public function getVariedadesbyId($params){
        $data = [];

        $query = "Select * from cat_variedades where id_producto = ".$params['producto']."";

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



    

}