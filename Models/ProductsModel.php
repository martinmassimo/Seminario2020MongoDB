<?php

class ProductsModel{

    private $manager;
    private $products;

    // Conexión del cliente de MongoDB a la bd local
    function __construct(){
        $this->manager = new MongoDB\Client("mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass&ssl=false");
        $this->products = $this->manager->ecommerce->products;
    }
    // Retorna un arreglo de JSON de todos productos
    public function getProducts(){
        return $this->products->find()->toArray();
    }
    // Retorna un arreglo de objetos que concuerde con el atributo de nombre que se parametriza
    public function getProductsByName($filter){
        return $this->products->find($filter)->toArray();
    }
    // Retorna el ObjectId genero luego de la inserción del producto
    public function insertProduct($product){
        $resultado = $this->products->insertOne($product);
        return $resultado->getInsertedId();
    }
    // Retorna la cantidad de documentos eliminados (al borrar por _id devuelve 1 en caso de eliminar o 0 si no encontró el documento con ese id)
    public function deleteProduct($id){
        $resultado = $this->products->deleteOne(['_id'  => new MongoDB\BSON\ObjectID($id)]);
        return $resultado->getDeletedCount();
    }
    // Retorna la cantidad de documentos modificados (al modificar por _id devuelve 1 en caso de eliminar o 0 si no encontró el documento con ese id)
    public function updateProduct($product,$id){
        $filter = ['_id' => $id];
        $resultado = $this->products->updateOne(
                                                $filter,
                                                ['$set' => $product]);
        return $resultado->getModifiedCount();
    }
}
?>
