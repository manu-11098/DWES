<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$anio = rand(2000,2050);
		if(checkdate(2, 29, $anio)==true)echo "El año ". $anio ." es bisiesto";
		else echo"El año ". $anio ." no es bisiesto";



	?>
</body>
</html>