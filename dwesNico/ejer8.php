<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Eje 8</title>
</head>
<body>
<?php

echo"<table border= \"2\" width = \"100\">";
$numero = 8;
$mult;
for($i = 1; $i<=10; $i++){
    echo"<tr><td>";
    echo"$numero * $i";
    echo"</td><td>";
    $mult = $numero * $i;
    echo"$mult";
    echo"</td></tr>";
}
echo"</table>";
?>
</body>
</html>
