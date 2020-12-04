<?php

class SalesModel{

    private $manager;
    private $sales;

    // Conexión del cliente de MongoDB a la bd local
    function __construct(){
        $this->manager = new MongoDB\Client("mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass&ssl=false");
        $this->sales = $this->manager->ecommerce->sales;
    }
    // Retorna un arreglo de JSON de todas las ventas
    public function getSales(){
        return $this->sales->find()->toArray();
    }
    // Retorna el ObjectId genero luego de la inserción de la venta
    public function insertSale($sale){
        $resultado = $this->sales->insertOne($sale);
        return $resultado->getInsertedId();
    }
    // Retorna la cantidad de documentos eliminados (al borrar por _id devuelve 1 en caso de eliminar o 0 si no encontró el documento con ese id)
    public function deleteSale($id){
        $resultado = $this->sales->deleteOne(['_id'  => new MongoDB\BSON\ObjectID($id)]);
        return $resultado->getDeletedCount();
    }
    // Retorna la cantidad de documentos modificados (al modificar por _id devuelve 1 en caso de eliminar o 0 si no encontró el documento con ese id)
    public function updateSale($sale,$id){
        $filter = ['_id' => $id];
        $resultado = $this->sales->updateOne($filter,['$set' => $sale]);
        return $resultado->getModifiedCount();
    }
}
?>
