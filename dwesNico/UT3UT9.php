<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$array =  array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
	

	$ConjuntoArrays = array_reverse($array);

	foreach ($ConjuntoArrays as $key => $value) {
		echo"$key ===> $value <br>";
	}

	 ?>
</body>
</html>