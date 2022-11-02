<?php 

use MVC\Controller;

class ControllersBodega  extends Controller {

    public function buscaordencompra(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->buscaordencompra($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

    public function guardarbodega(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->guardarbodega($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

    public function crearpdf(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->crearpdf($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

    public function enviarcorreo(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->enviarcorreo($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }
    public function inbodega(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->inbodega($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }
    
    public function salidabodega(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->salidabodega($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

    public function foliosalida(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->foliosalida($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

    public function guardafactura(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->guardafactura($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }
    public function reportebodega(){
        $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
        // $params = json_decode($json,true); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
        $model = $this->model('bodega');
        $result=$model->reportebodega($json);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

}