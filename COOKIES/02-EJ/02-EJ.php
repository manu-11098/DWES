<?php

if (isset($_COOKIE['contador'])) {

    setcookie('contador', $_COOKIE['contador'] + 1 );
    $mensaje = 'Número de visitas: ' . $_COOKIE['contador'];
  } else {
  
    setcookie('contador', 1);
    $mensaje = 'Es la primera vez que accedes a la página';
  }

?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Prueba de cookie</title>
</head>

<body>
  <h1>Trabajando con cookies</h1>
  <h2>Contador de accesos</h2>
  <p>
    <?php echo $mensaje;
    ?>
  </p>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <input type="submit" name="recargar" value="Recargar">
    <input type="submit" name="eliminar" value="Eliminar">

    <br>

    <?php
    if(isset($_POST['eliminar'])){
        setcookie('contador');
        $mensaje = 'Cookie borrada con exito ->';
        echo $mensaje;
        echo '<input type="submit" name="recargar" value="Crear nueva cookie">';
    }
  ?>

  </form>
</body>

</html>