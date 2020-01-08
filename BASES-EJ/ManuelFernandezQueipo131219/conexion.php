<?php
    $conexion = new mysqli ("localhost", "root", "", "sotware");
    mysqli_set_charset($conexion,"utf8");
	if ($conexion->connect_error) 
    die('Error de conexión:'.$conexion->connect_error);
?>