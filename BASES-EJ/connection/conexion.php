<?php
//Creacion del objeto mysqli

$connection = new mysqli("localhost", "root", "", "inmobiliaria");

mysqli_set_charset($connection,"utf8");
if($connection -> connect_errno){
    die("Conexion con la base de datos erronea: ".$connection->connect_errno);
}

?>