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
        <h1>Visualizar productos de un pedido</h1>
        <form method="post" action="anadirproducto.php">
            <fieldset>
                Pedido:
                <select name="pedido">
                    <?php
                    $sql = "SELECT DISTINCT id_pedido FROM pedidos";
                    $consulta = $conexion->prepare($sql);
                    if (!$consulta->execute())
                        die("Error:" . $consulta->error);

                    $consulta->bind_result($id);
                    while ($consulta->fetch()) {
                        echo "<option value='$id'";
                        if (isset($_POST["pedido"]) && $_POST["pedido"] == $id) echo "selected='selected'";

                        echo ">$id</option>";
                    }
                    $consulta->close();
                    ?>
                </select>
                <input type="submit" name="buscar" value="Listar pedido">
                <?php
                if (isset($_POST['buscar'])) {
                    $id = $_POST['pedido'];
                    $sql = "SELECT DISTINCT p.id_pedido, dp.id_producto, pr.producto, pr.precio, dp.cantidad, c.etiqueta_cat from pedidos p, productos pr, det_pedidos dp, categorias c where p.id_pedido = dp.id_pedido and dp.id_producto = pr.id and pr.num_cat_prod = c.numero_cat and p.id_pedido = '$id'";
                    $consulta = $conexion->prepare($sql);
                    if (!$consulta->execute())
                        die("Error:" . $consulta->error);

                    $consulta->bind_result($id_pedido, $id_prod, $nombrePr, $precio, $cantidad, $categoria);
                    echo "<table>
                                <tr>
                                    <th>Pedido</th>
                                    <th>Producto</th>
                                    <th>Nombre producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Categoria</th>

                                </tr>";
                    while ($consulta->fetch()) {
                        echo "<tr>";
                        echo "<td>$id_pedido</td>";
                        echo "<td>$id_prod</td>";
                        echo "<td>$nombrePr</td>";
                        echo "<td>$precio</td>";
                        echo "<td>$cantidad</td>";
                        echo "<td>$categoria</td>";
                    }
                    echo "</table>";
                }
                ?>
                </br>
                <input type="submit" name="addProducto" value="Añadir producto">
                <?php
                $id = $_POST['pedido'];
                if (isset($_POST['addProducto'])) {
                    var_dump($_POST['addProducto']);
                    echo "<select name='categoria'>";
                    $sql = "SELECT DISTINCT p.id from productos p, det_pedidos dp where p.id not in (SELECT DISTINCT id_producto from det_pedidos where id_pedido = '$id')";

                    $consulta = $conexion->prepare($sql);
                    if (!$consulta->execute())
                        die("Error:" . $consulta->error);

                    $consulta->bind_result($idPr);
                    while ($consulta->fetch()) {
                        if (isset($_POST["addProducto"]) && $_POST["addProducto"] == $idPr) echo "selected='selected'";

                        echo ">$idPr</option>";
                    }
                    echo "</select>";
                }
                ?>
    </div>

</body>

</html>