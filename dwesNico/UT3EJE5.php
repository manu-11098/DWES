<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$ciudades[]="Madrid";
	$ciudades[]="Barcelona";
	$ciudades[]="Londres";
	$ciudades[]="New York";
	$ciudades[]="Los Angeles";
	$ciudades[]="Chicago";

	foreach ($ciudades as $key => $value) {
		echo"La ciudad con el indice $key tiene de nombre $value <br>";
	}

	 ?>
</body>
</html>