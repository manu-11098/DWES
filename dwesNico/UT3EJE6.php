<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$ciudades["MD"]="Madrid";
	$ciudades["BC"]="Barcelona";
	$ciudades["LN"]="Londres";
	$ciudades["NY"]="New York";
	$ciudades["LA"]="Los Angeles";
	$ciudades["CH"]="Chicago";

	foreach ($ciudades as $key => $value) {
		echo"La ciudad con el indice $key tiene de nombre $value <br>";
	}

	 ?>
</body>
</html>