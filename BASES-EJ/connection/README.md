# CONEXIONES A LA BASE DE DATOS

``` php
$connection = new mysqli("localhost", "root", "", "inmobiliaria"); // (url,usuario,contraseña,dbname)

mysqli_set_charset($connection,"utf8");
if($connection -> connect_errno){
    die("Conexion con la base de datos erronea: ".$connection -> connect_errno);
}
```
