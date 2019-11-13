<!DOCTYPE HTML>
<html>
<head>

    <meta charset=UTF-8"> 
    <title>Desarrollo Web</title>

</head>
<body>
    <?php
        function devolverMayor($num1,$num2){

        	$devolver;

            if($num1>$num2) $devolver = $num1;
            elseif ($num1=$num2) $devolver = "Ambos son iguales";
            else $devolver = $num2;

            return $devolver;
        }

        echo devolverMayor(4,4);
    ?>
</body>

</html>