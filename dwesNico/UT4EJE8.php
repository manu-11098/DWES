<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta http-equiv="refresh" content="2">
</head>
<body>
	<?php 

	$frutas = array("fresa","grosella","guayaba","kiwi","manzana","melocoton","naranja","pera");


	shuffle($frutas);


	
	
	foreach ($frutas as $key => $value) {
		
		echo "<img src='frutas/$frutas[$key].jpg'>";
		if($key == 3) echo "<br>";
	}
			

	 ?>
</body>
</html>