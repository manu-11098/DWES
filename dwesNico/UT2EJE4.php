<!DOCTYPE HTML>
<html>
<head>

    <meta charset=UTF-8"> 
    <title>Desarrollo Web</title>

</head>
<body>
    <?php
        function convertirAFahrenheit($temp){

            $tempFah = ($temp*1.8)+32;

            return $tempFah;
        }

        echo convertirAFahrenheit(4);
    ?>
</body>

</html>