<?php
//Creacion del objeto mysqli

$conexion = new mysqli("localhost", "root", "", "almacen");
mysqli_set_charset($conexion,"utf8");
if($conexion -> connect_error){
die("Conexion con la base de datos erronea: ".$conexion->connect_error);
}

//echo "Host info:".$conexion->host_info;


?>