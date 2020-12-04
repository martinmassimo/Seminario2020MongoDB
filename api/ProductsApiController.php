<?php
require_once("ApiController.php");
require_once("./Models/ProductsModel.php");
require_once("./Models/SalesModel.php");
require_once("JSONView.php");

class ProductsApiController extends ApiController{
    
    public function __construct() {
        parent::__construct();
        $this->model = new ProductsModel();        
    }
// Retorna todos los productos
    public function getProducts($params = null){
        $products = $this->model->getProducts();
            if ($products) {
                $this->view->response($products, 200);   
            } else {
                $this->view->response("No existen productos", 404);
            }
    }
    // Retorna todos los productos con el atributo nombre que se indique
    public function getProductsByName($params = null){
        $name = $params[':name'];
        $filter = ['nombre' => $name];
        $products = $this->model->getProductsByName($filter);
        // var_dump($products);
        if ($products) {
            $this->view->response($products, 200);   
        } else {
            $this->view->response("No existen productos", 404);
        }
    }
    // Se inserta el producto retornando el _id autogenerado
    public function insertProduct(){
        $product = $this->getData();
        $product->createdAt = time();
        $response = $this->model->insertProduct($product);
        if ($response) {
            $this->view->response($response, 200);   
        } else {
            $this->view->response("No se pudo insertar el producto", 404);
        }
    }
    // Elimina el producto recibiendo el producto como objeto JSON con _id en el body del request
    public function deleteProduct($params = null){
        $id = $params[':id'];
        $response = $this->model->deleteProduct($id);
        if ($response>0) {
            $this->view->response($response, 200);   
        } else {
            $this->view->response("No se pudo eliminar el producto", 404);
        }
    }
    // Actualiza el producto recibiendo el producto como objeto JSON con _id y campos modificados
    // Se omite el _id para evitar error en MongoDB intentado actualizar ese campo
    public function updateProduct(){
        $product = $this->getData();
        $id = \MongoDB\BSON\toPHP(\MongoDB\BSON\fromJson(json_encode($product)))->_id;
        $product = \MongoDB\BSON\toPHP(\MongoDB\BSON\fromJson(json_encode($product)));
        unset($product->_id);
        $response = $this->model->updateProduct($product,$id);
        if ($response>0) {
            $this->view->response($response, 200);   
        } else {
            $this->view->response("No se pudo modificar el producto", 404);
        }
    }
}
