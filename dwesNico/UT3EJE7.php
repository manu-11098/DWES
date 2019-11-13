<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$array = array();
	$media = 0;
	$contador = 0;

	for($i=1;$i<=10;$i++){

		$array[$i]=$i;

	}

	foreach ($array as $key => $value) {
		
		if($key%2!=0){
			echo"$key ===> $value <br>";
		}else{

			$media = $media + $value;
			$contador++;
		}
	}

		$media = $media/$contador;
		echo "Media: $media";


	 ?>
</body>
</html>