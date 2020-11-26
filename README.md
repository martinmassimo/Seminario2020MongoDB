# Seminario2020MongoDB
API REST MongoDB - PHP - XAMPP - Composer
## Tutorial de Instalación
_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### 1. Instalar mongodb Community Server
* [Descargar MongoDB](https://www.mongodb.com/try/download/community?tck=docs_server)

### 2. Instalar xampp (con php 7.3 en este caso)
https://www.apachefriends.org/es/download.html

### 3. Instalar extensión de mongoDB para version de php 7.3 (archivo en ext y agregar line en archivo ini)
* [Instrucciones para instalar la extensión](https://www.php.net/manual/en/mongodb.installation.pecl.php)
* [Instrucciones para instalar extensiones php en Windows](https://www.php.net/manual/es/install.pecl.windows.php)
* [Descargar PECL necesario](https://pecl.php.net/package/mongodb)

### 4. Instalar Composer
* [Descargar Composer](https://getcomposer.org/download/)

### 5. Clonar el repositorio actual
```
git clone https://github.com/martinmassimo/Seminario2020MongoDB.git
```

### 6. Instalar biblioteca de MongoDB (1.0.0) para php con Composer en el directorio del repositorio clonado
* [Instrucciones para instalar la biblioteca](https://www.php.net/manual/es/mongodb.tutorial.library.php)

### 7. Comandos MongoDB para inicializar las BBDD y las colecciones necesarias
```
mongo
use ecommerce
db.createColleccions("products")
db.createColleccions("sales")
db.createColleccions("clients")
```

### 8. Ejecutar XAMPP para terminar de poner en funcionamiento la API

### * Opcionalmente puede descargar Postman para realizar pruebas de funcionamiento

* [Postman](https://www.postman.com/downloads/)

## Autor

* **Martín Massimo** - *Desarrollo y documentación* - [martinmassimo](https://github.com/martinmassimo)
