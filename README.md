# Seminario2020MongoDB
API REST MongoDB - PHP - XAMPP - Composer
## Endpoints de los recursos
### Products:
```
GET     localhost/Seminario2020MongoDB/api/products
GET     localhost/Seminario2020MongoDB/api/products/byName/:name
POST    localhost/Seminario2020MongoDB/api/products
PUT     localhost/Seminario2020MongoDB/api/products
DELETE  localhost/Seminario2020MongoDB/api/products/:id
```
### Sales:
```
GET     localhost/Seminario2020MongoDB/api/sales
POST    localhost/Seminario2020MongoDB/api/sales
PUT     localhost/Seminario2020MongoDB/api/sales
DELETE  localhost/Seminario2020MongoDB/api/sales/:id
```

## Estructuras JSON de los recursos
### Products:
```
{
  nombre : "silla", 
  descripcion: "mesa de madera de 60cm", 
  precio: 200,
  stock : 10,
  createdAt : new Date()
}
```
### Sales:
```
{
  producto : ObjectId("5fca21c0f1656d4c23a828e4"),
  cantidad: 1,
  precioTotal : 200,
  direccionEntrega : "Sarmiento 850",
  createdAt : new Date()
}
```

## Tutorial de Instalación
_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### 1. Instalar mongodb Community Server
* [Descargar MongoDB](https://www.mongodb.com/try/download/community?tck=docs_server)

### 2. Instalar XAMPP (con php 7.3)
* [Descargar XAMPP](https://www.apachefriends.org/es/download.html)

### 3. Instalar extensión de mongoDB para version de php 7.3 (archivo en ext y agregar line en archivo ini)
* [Instrucciones para instalar la extensión](https://www.php.net/manual/en/mongodb.installation.pecl.php)
* [Instrucciones para instalar extensiones php en Windows](https://www.php.net/manual/es/install.pecl.windows.php)
* [Descargar PECL necesario](https://pecl.php.net/package/mongodb)

### 4. Instalar Composer
* [Descargar Composer](https://getcomposer.org/download/)

### 5. Clonar el repositorio actual en la xampp\htdocs XAMPP
```
git clone https://github.com/martinmassimo/Seminario2020MongoDB.git
```

### 6. Instalar biblioteca de MongoDB (1.0.0) para php con Composer en el directorio del repositorio clonado
* [Instrucciones para instalar la biblioteca](https://www.php.net/manual/es/mongodb.tutorial.library.php)

En este caso el repositorio ya cuenta con la dependecia instalada de MongoDB por lo que solo es necesario el siguiente comando para que se intale:
```
composer install
```


### 7. Comandos MongoDB para inicializar las BBDD y las colecciones necesarias
```
mongo
use ecommerce
db.createColleccions("products")
db.createColleccions("sales")
```

### 8. Ejecutar XAMPP para terminar de poner en funcionamiento la API

### * Opcionalmente puede descargar Postman para realizar pruebas de funcionamiento

* [Postman](https://www.postman.com/downloads/)

## Autor

* **Martín Massimo** - *Desarrollo y documentación* - [martinmassimo](https://github.com/martinmassimo)
