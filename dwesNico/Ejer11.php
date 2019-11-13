<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Fecha en castellano</title>
</head>
<body>
<?php
 global $suma;
for($i = 2; $i<=1000; $i=$i+2){
    $suma = $i + $suma;
}
echo"$suma";

?>
</body>
</html>