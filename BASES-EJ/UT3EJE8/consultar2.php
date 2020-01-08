<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="almacen.css">
</head>

<!-- CONSULTA CON SENTENCIAS PREARADAS-->

<body>
    <?php
    include "conexion.php";
    ?>
    <div id="encabezado">
        <h1>Almacenes Naranco</h1>
        <form method="post" action="consultar2.php">
            Producto
            <select name="prod">
                <?php
                $sql = "SELECT distinct cod,  nombre FROM familia order by cod";
                $consulta = $conexion->prepare($sql);
                if (!$consulta->execute())
                    die("Error:" . $consulta->error);

                $consulta->bind_result($cod, $nombre);
                while ($consulta->fetch()) {
                    echo "<option value='$cod'";
                    if (isset($_POST["prod"]) && $_POST["prod"] == $cod) echo "selected='selected'";

                    echo ">$nombre</option>";
                }

                $consulta->close();
                ?>
            </select>
            <input type="submit" name="buscar" value="Mostrar stock">
        </form>
        <form method="post" action="modificar.php">
    </div>
    <div id="contenido">
        <h1>Productos disponibles:</h1>
        <?php
        if (isset($_POST['buscar'])) {
            $cod = $_POST['prod'];
            $codbot = 0;
            $sql = "SELECT distinct cod, nombre,nombre_corto, PVP, descripcion FROM producto WHERE familia = '$cod'";


            $consulta = $conexion->prepare($sql);
            if (!$consulta->execute())
                die("Error:" . $consulta->error);

            $consulta->bind_result($codigo, $nombre, $nombreCorto, $precio, $descripcion);
            echo "<table>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>";
            while ($consulta->fetch()) {
                echo "<tr>";
                echo "<td>$nombreCorto</td>";
                echo "<td>$precio</td>";
                echo "<td><button name='editar'value='$codbot'>Editar</button></td>";
                echo "</tr>";

                echo "<input type='hidden' name='nombre[]'value='$nombre'>";
                echo "<input type='hidden' name='nombreCorto[]' value='$nombreCorto'>";
                echo "<input type='hidden' name='precio[]'value='$precio'>";
                echo "<input type='hidden' name='descripcion[]' value='$descripcion'>";
                echo "<input type='hidden' name='codigo[]'value='$codigo'>";
                $codbot++;
            }
            echo "</table>";
        }
        ?>
    </div>
    </form>
    <div id="pie">
        <p>Productos seleccionados</p>
        [<a href="index.html">Volver al index</a>]
    </div>
</body>

</html>