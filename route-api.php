<?php

// Esta ruta debe apuntar al autocargador de Composer
require 'vendor/autoload.php';
require_once ("Router.php");
require_once ("api/ProductsApiController.php"); 
require_once ("api/SalesApiController.php"); 

// require_once ("api/ComentariosApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("products", "GET", "ProductsApiController", "getProducts");
$router->addRoute("products", "POST", "ProductsApiController", "insertProduct");
$router->addRoute("products/byName/:name", "GET", "ProductsApiController", "getProductsByName");
$router->addRoute("products/:id", "DELETE", "ProductsApiController", "deleteProduct");
$router->addRoute("products", "PUT", "ProductsApiController", "updateProduct");

$router->addRoute("sales", "GET", "SalesApiController", "getSales");
$router->addRoute("sales", "POST", "SalesApiController", "insertSale");
$router->addRoute("sales/:id", "DELETE", "SalesApiController", "deleteSale");
$router->addRoute("sales", "PUT", "SalesApiController", "updateSale");

// rutea
$router->route($resource, $method);

?>