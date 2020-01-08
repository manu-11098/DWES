<?php

//Creacion del objeto mysqli
$conexion = new mysqli("localhost", "root", "", "biblionaranco");

mysqli_set_charset($conexion,"utf8");
if($conexion -> connect_errno){
die("Conexion con la base de datos erronea: ".$conexion->connect_errno);
}

//echo "Host info:".$conexion->host_info;


?>