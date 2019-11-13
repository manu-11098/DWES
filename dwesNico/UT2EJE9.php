<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php 
	
	$bisiesto = false;
	function esbisiesto($anio){

		if($anio%4==0 && $anio%100!=0 || $anio%400==0){

			$bisiesto = true;
		}else $bisiesto = false;

		return $bisiesto;
	}
	$anio = 200;
	if(esbisiesto($anio) == true) echo "El año ".$anio." es bisiesto";
	else echo "El año ".$anio." NO es bisiesto";

 ?>
</body>
</html>