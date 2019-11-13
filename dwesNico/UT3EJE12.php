<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

		$array = array("futbol","baloncesto","natación","tenis");

		for ($i=0; $i <= count($array)-1; $i++) { 
		
			echo $array[$i]."<br>";

		}

		echo "<br>";


		for ($i=0; $i <= count($array)-1; $i++) { 
		
			$primero = array_search($array[$i], $array);
			echo $primero."<br>";
			
		}
		reset($array);

		echo next($array)."<br>";

		echo end($array);

		

		


	 ?>
</body>
</html>