<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Fecha en castellano</title>
</head>
<body>
<?php

setlocale(LC_ALL,"es_ES","esp");
date_default_timezone_set('Europe/Madrid');

$hora = date("H");
if($hora >= 8 and $hora < 13) echo"Buenos días";
elseif($hora >= 13 and $hora < 15) echo"Que aproveche la comida";
elseif($hora >= 15 and $hora < 18) echo"Es la hora del café";
else echo"Buenas noches";
?>
</body>
</html>