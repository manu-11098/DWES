<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- LISTA SOCIOS -->
        <label for="socio">Socio: </label>
        <select name="socio" id="socio">
            <?php
            // Realizamos conexión
            include "conexion.php";
            // Consultamos socios
            $sql = "SELECT COD_SOCIO, NOMBRE FROM SOCIOS ORDER BY NOMBRE ASC;";
            $consulta = $conexion->query($sql);
            while ($fila = $consulta->fetch_object()) {
                $codSocio = $fila->COD_SOCIO;
                $nombººre = $fila->NOMBRE;
                echo "<option value='$codSocio'>$codSocio - $nombre  </option>";
            }
            ?>
        </select>

        <!-- Lista LIBROS -->
        <label for="libro">Libro</label>
        <select name="libro">
            <?php
            // Consultamos libro
            $sql = "SELECT TITULO, COD_LIBRO FROM LIBROS WHERE UNIDADES > '0' ORDER BY TITULO;";
            $consulta = $conexion->query($sql);
            while ($fila = $consulta->fetch_object()) {
                $TITULO = $fila->TITULO;
                $codlibro = $fila->COD_LIBRO;
                // $codlibro = $fila->COD_LIBRO;
                echo "<option value='$codlibro'>$TITULO</option>";
            }
            ?>
        </select>

        <!-- BOTON ENVIAR -->
        <input type="submit" value="aceptar" name="aceptar">

    </form>

    <?php
    // Si hemos enviado el formulario:
    if (isset($_POST['aceptar'])) {
        // Guardamos el título, código socio y la fecha del préstamo y de devolución.
        $codlibro = $_POST['libro'];
        $codSocio = $_POST['socio'];
        $fechaPrestamo = date('Y-m-d');
        // fecha devolucion
        $fechaDevolucion = strtotime('+15 day', strtotime($fechaPrestamo));
        $fechaDevolucion = date('Y-m-d', $fechaDevolucion);


        $sql = "INSERT INTO PRESTAMO (COD_SOCIO,COD_LIBRO,FECHA_PRESTAMO,FECHA_DEVOLUCION,DEVUELTO) VALUES ('$codSocio', '$codlibro', '$fechaPrestamo', '$fechaDevolucion', 'N');";


        if ($consulta = $conexion->query($sql)) {
            restarLibro($codlibro);
        } else {
            echo "$conexion->error";
        }
    }

    function restarLibro($codlibro)
    {
        include "conexion.php";
        $sql = "UPDATE LIBROS SET UNIDADES = (UNIDADES-1) WHERE COD_LIBRO = '$codlibro';";
        if ($consulta = $conexion->query($sql)) {
            echo "CORRECTO";
        } else {
            echo "$conexion->error";
        }
    }
    ?>
    <a href="index.html">[ INICIO ]</a>

</body>

</html>