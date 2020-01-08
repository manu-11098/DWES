<html>

<head>
    <title>Almacenes Naranco. P�gina de entrada</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta charset="UTF-8">
</head>

<body>
    <div id="cabeza">
        <?php
        include "conexion.php";
        ?>
        <h1>Consulta de pedidos por cliente</h1>
        <form method="post" action="pedidocliente.php">
            <fieldset>
                Cliente:
                <select name="cliente">
                    <?php
                    $sql = "SELECT DISTINCT id_cliente, nombre FROM clientes";
                    $consulta = $conexion->prepare($sql);
                    if (!$consulta->execute())
                        die("Error:" . $consulta->error);

                    $consulta->bind_result($id, $nombre);
                    echo "id: $id ";
                    while ($consulta->fetch()) {
                        echo "<option value='$id'";
                        if (isset($_POST['cliente']) && $_POST['cliente'] == $id) echo "selected='selected'";

                        echo ">$nombre</option>";
                    }

                    $consulta->close();
                    ?>
                </select>
                <input type="submit" name="buscar" value="Mostrar pedidos">
                <div class="contenido">
                    <h1>Pedidos:</h1>
                    <?php
                    if (isset($_POST['buscar'])) {
                        $id = $_POST['cliente'];
                        $sql = "SELECT DISTINCT p.id_pedido, pr.producto, pr.precio, cantidad FROM pedidos p, det_pedidos dp, productos pr where p.id_pedido = dp.id_pedido and dp.id_producto = pr.id and p.id_cliente = '$id'";

                        $consulta = $conexion->prepare($sql);
                        if (!$consulta->execute())
                            die("Error:" . $consulta->error);

                        $consulta->bind_result($id_pedido, $id_prod, $precio, $cantidad);
                        echo "<table>
                                <tr>
                                    <th>Pedido</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>";
                        while($consulta->fetch()){
                            echo "<tr>";
                            echo "<td>$id_pedido</td>";
                            echo "<td>$id_prod</td>";
                            echo "<td>$precio</td>";
                            echo "<td>$cantidad</td>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>