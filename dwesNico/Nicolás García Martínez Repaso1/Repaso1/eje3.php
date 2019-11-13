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
        $cadena = 1208456852;
        echo"El número es: $cadena <br>";

        foreach (count_chars($cadena, 1) as $i => $val) {
            echo chr($i)." => $val veces <br>";
        }
    ?>

</body>
</html>