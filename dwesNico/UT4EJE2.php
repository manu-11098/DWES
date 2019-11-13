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

    $nombres=array("Roberto","Juan","Marta","Mercedes","Martin","Jorge","Miriam","Nahuel","Mirta");
    $noMbres = array();
    $letra = "M";
    $otraLetra="";
    foreach ($nombres as $key => $value) {
        $otraLetra = substr($value,0,1);
        if($otraLetra == $letra){
            array_push($noMbres,$value);
        }
    }
    
        echo implode(",",$noMbres);

    
    ?>
</body>
</html>