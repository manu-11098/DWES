<!DOCTYPE HTML>
<html>
<head>

    <meta charset=UTF-8"> 
    <title>Desarrollo Web</title>

</head>
<body>
    <?php
        function convertirACentigrados($temp){

            $tempCen = ($temp-32)/1.8;

            return $tempCen;
        }

        echo convertirACentigrados(39.2);
    ?>
</body>

</html>