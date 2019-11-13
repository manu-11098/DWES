<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Eje 9</title>
</head>
<body>
<?php
setlocale(LC_ALL,"es_ES","esp");
date_default_timezone_set('Europe/Madrid');
echo"Cuando se cargó esta página eran las ". date('H:i:s')." del día ".
 strftime("%d")." de ". strftime("%B")." del año ". strftime("%Y"). 
 "<br> Estamos en el día ". strftime("%j")." del año";
?>
</body>
</html>