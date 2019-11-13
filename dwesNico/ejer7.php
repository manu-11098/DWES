<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Eje 7</title>
</head>
<body>
<?php

echo"<table border= \"2\" width = \"100\">";
$numero = 1;
$caracter;
for($i = 65; $i<=74; $i++){
    $caracter = chr($i);
    echo"<tr><td>";
    echo"$caracter";
    echo"</td><td>";
    echo"$numero";
    echo"</td></tr>";
    $numero++;
}
echo"</table>";
?>
</body>
</html>