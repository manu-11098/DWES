<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$array =  array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
	$array2 =  array(12, 34, 45, 52, 12);
	$array3 =  array("Sauce", "Piño", "Naranjo", "Chopo", "Perro", 34);

	$ConjuntoArrays = array_merge($array, $array2, $array3);

	foreach ($ConjuntoArrays as $key => $value) {
		echo"$key ===> $value <br>";
	}
	 ?>
</body>
</html>