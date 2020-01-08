<?php

/*Ejemplo sin time definido*/
if (isset($_COOKIE['contador'])) {

  setcookie('contador', $_COOKIE['contador'] + 1 );
  $mensaje = 'Número de visitas: ' . $_COOKIE['contador'];
} else {

  setcookie('contador', 1);
  $mensaje = 'Bienvenido a nuestra página web';
}

/*Ejemplo con time definido*/
if (isset($_COOKIE['contadorT'])) {

  // Caduca en un año 
  setcookie('contadorT', $_COOKIE['contadorT'] + 1, time() + 365 * 24 * 60 * 60);
  $mensajeT = 'Número de visitas: ' . $_COOKIE['contadorT'];
} else {

  // Caduca en un año 
  setcookie('contadorT', 1, time() + 365 * 24 * 60 * 60);
  $mensajeT = 'Bienvenido a nuestra página web';
}

?>

<html>

<head>
  <meta charset="UTF-8" />
  <title>Prueba de cookie</title>
</head>

<body>
  <p>
    <?php echo $mensaje; ?>
    </br>
    <?php echo $mensajeT; ?>
  </p>
</body>

</html>