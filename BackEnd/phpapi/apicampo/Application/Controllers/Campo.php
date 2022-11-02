
<?php 

use MVC\Controller;

class ControllersCampo  extends Controller {

    public function getAllProductos(){
       
        $model = $this->model('campo');
        $result=$model->getAllProductos();
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }

    public function getProductosbyId($params){
       
        $model = $this->model('campo');
        $result=$model->getProductosbyId($params);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }
    
    public function getVariedadesbyId($params){
       
        $model = $this->model('campo');
        $result=$model->getVariedadesbyId($params);
         // Send Response
         $this->response->sendStatus(200);
         $this->response->setContent($result); 
    }
    
    
}