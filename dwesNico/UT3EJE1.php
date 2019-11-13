<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

		$array = array();
		$contador=0;
		for($i = 0; $i<=20;$i++){
			
			if($i%2==0){
				$array[$contador]=$i;
				echo $array[$contador]."<br>";
				$contador++;		
			}
			
		}
		

	 ?>
</body>
</html>