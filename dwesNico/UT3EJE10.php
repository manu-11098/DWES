<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$estadios_futbol = array('Barcelona'=>'Camp Nou', 'Real Madrid'=>'Santiago Bernabeu', 'Valencia'=>'Mestalla', 'Real Sociedad'=>'Anoeta');
	
		echo"<table border=1px>";
		
			foreach ($estadios_futbol as $key => $value) {
				echo"<tr><td>$key ===> $value</td></tr>";
			}

		echo"</table>";

		unset($estadios_futbol["Real Madrid"]);

		echo"<ol>";
		foreach ($estadios_futbol as $key => $value) {
			echo"<li>$key ===> $value</li>";
		}
		echo"</ol>";
	 ?>
</body>
</html>