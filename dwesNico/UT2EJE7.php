<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php
    function calcularIMC($peso,$altura){

    	$altura = $altura/100;
    	$imc = round($peso / pow($altura,2),1);
    	return $imc;
    }

    echo calcularIMC(75,173);
    
?>

</body>
</html>