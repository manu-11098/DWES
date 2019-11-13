<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$array["Nombre"]="Pedro Torres";
	$array["Dirección"]="C/Mayor 37";
	$array["Telefono"]="123456789";

	foreach ($array as $key => $value) {
		echo"$key >>> $value <br>";
	}

	 ?>
</body>
</html>