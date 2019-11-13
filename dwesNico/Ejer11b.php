<!DOCTYPE HTML>
<html>
<head>

    <meta charset=UTF-8"> 
    <title>Desarrollo Web</title>

</head>
<body>
    <?php

    $i=2;
    $suma=0;
    while($i<=1000){

        $suma = $suma + $i;
        $i=$i+2;
    }
    echo"$suma";
    ?>
</body>

</html>