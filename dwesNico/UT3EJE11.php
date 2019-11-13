<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$Familias = array(
		"Simpson" => array("Padre"=>"Homer",
						 	"Madre"=>"Marge", 
							"Hijos" => array("Bart", "Lisa", "Maggie")),
		"Griffin" => array("Padre"=>"Peter",
						 	"Madre"=>"Louise", 
							"Hijos" => array("Chris", "Meg", "Stewie"))

	);
		echo"<ol>";
	foreach ($Familias as $key => $familia) {
		echo"<li>Familia $key: </li><ul>";

		foreach ($familia as $key => $personas) {
			
			if($key != "Hijos") echo "<li>$key: $personas</li>";
			else{
				echo "<li>Hijos:</li><ul> ";
				foreach ($personas as $key => $value) {
					echo "<li>$value</li>";
				}
				echo "</ul>";
			}
		}
		echo "</ul>";
	}

		echo "</ol>";
		
	 ?>
</body>
</html>