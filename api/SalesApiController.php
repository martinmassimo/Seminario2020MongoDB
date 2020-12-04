<?php
require_once("ApiController.php");
require_once("./Models/ProductsModel.php");
require_once("./Models/SalesModel.php");
require_once("JSONView.php");

class SalesApiController extends ApiController{
    
    public function __construct() {
        parent::__construct();
        $this->model = new SalesModel();        
    }
// Retorna todas las ventas
    public function getSales($params = null){
        $sales = $this->model->getSales();
            if ($sales) {
                $this->view->response($sales, 200);   
            } else {
                $this->view->response("No existen ventas", 404);
            }
    }
    // Se inserta la venta retornando el _id autogenerado
    public function insertSale(){
        $sale = $this->getData();
        $sale->createdAt = time();
        $response = $this->model->insertSale($sale);
        if ($response) {
            $this->view->response($response, 200);   
        } else {
            $this->view->response("No se pudo insertar la venta", 404);
        }
    }
    // Elimina el producto recibiendo el producto como objeto JSON con _id en el body del request
    public function deleteSale($params = null){
        $id = $params[':id'];
        $response = $this->model->deleteSale($id);
        if ($response>0) {
            $this->view->response($response, 200);   
        } else {
            $this->view->response("No se pudo eliminar la venta", 404);
        }
    }
    // Actualiza la venta recibiendo la nueva como objeto JSON con _id y campos modificados
    // Se omite el _id para evitar error en MongoDB intentado actualizar ese campo
    public function updateSale(){
        $sale = $this->getData();
        $id = \MongoDB\BSON\toPHP(\MongoDB\BSON\fromJson(json_encode($sale)))->_id;
        $product = \MongoDB\BSON\toPHP(\MongoDB\BSON\fromJson(json_encode($sale)));
        unset($sale->_id);
        $response = $this->model->updateSale($sale,$id);
        if ($response>0) {
            $this->view->response($response, 200);   
        } else {
            $this->view->response("No se pudo modificar la venta", 404);
        }
    }
}
