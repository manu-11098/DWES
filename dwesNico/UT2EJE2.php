<!DOCTYPE HTML>
<html>
<head>

    <meta charset=UTF-8"> 
    <title>Desarrollo Web</title>

</head>
<body>
    <?php
        function concatenar($cad1,$cad2){

            $cadTotal = $cad1 . $cad2;

            return $cadTotal;
        }

        echo concatenar("Hola ","Mundo");
    ?>
</body>

</html>