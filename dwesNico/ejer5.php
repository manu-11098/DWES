<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset=UTF-8">
<title>Fecha en castellano</title>
</head>
<body>
<?php
for($i = 1; $i<=10; $i++){
    if($i%2 == 0) echo "<p class='roja'> $i <br>";

    else echo"<p class='azul'> $i <br>";
    
}
?>
</body>
</html>