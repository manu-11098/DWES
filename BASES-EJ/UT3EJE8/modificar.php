<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<link rel='stylesheet' href='almacen.css'>";
    include "conexion.php";
    
    ?>
    
    <form method="post" action="modificar.php">
        <div id="encabezado">
            <h1>Modificar datos del producto</h1>
            <?php
            if(!isset($_POST['modificar']) && isset($_POST['editar'])){
                $posicion = $_POST['editar'];
                $array_cod = $_POST['codigo'];
                $array_nombre = $_POST['nombre'];
                $array_nombreCorto = $_POST['nombreCorto'];
                $array_precio = $_POST['precio'];
                $array_descripcion = $_POST['descripcion'];
                echo"<input type='hidden' name='precioantiguo'value='$array_precio[$posicion]'>";

                echo "<h3>$array_nombreCorto[$posicion]</h3>";

                echo "<table id='mod'>
                <tr>
                        <th>Codigo</th>
                        <td><input type='text' name='campoCodigo' value='$array_cod[$posicion]' size='50' readonly></td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><textarea name='campoNombre' cols='100' rows='5' readonly>$array_nombre[$posicion]</textarea></td>
                    </tr>
                    <tr>
                        <th>Nombre corto</th>
                        <td><input type='text' name='campoNombreCorto' value='$array_nombreCorto[$posicion]' size='50' readonly></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td><textarea name='campoDescripcion' cols='100' rows='5' readonly>$array_descripcion[$posicion]</textarea></td>
                    </tr>
                    <tr>
                        <th>Precio</th>
                        <td><input type='text' name='campoPrecio' value='$array_precio[$posicion]'></td>
                    </tr>
                </table>";
                ?>
               <input type='submit' name='modificar' value='Modificar'/>
            
        
        </form>
        <?php        
        }else{

            
                if (isset($_POST['modificar'])) {
                    $cod = $_POST["campoCodigo"];
                    $nombre = $_POST["campoNombre"];
                    $nombreCorto = $_POST["campoNombreCorto"];
                    $descripcion = $_POST["campoDescripcion"];
                    $precio = $_POST["campoPrecio"];
                    $precioAntiguo = $_POST['precioantiguo'];
                    $sql = "UPDATE producto SET PVP = ? WHERE cod=?";

                    $consulta = $conexion->prepare($sql);
                    $consulta->bind_param("ss",$precio, $cod);
                    if(!$consulta->execute())
                        die("Error:".$consulta->error);
                    if($precio == $precioAntiguo)
                    echo"<h2>El precio que has introducido es el mismo de antes</h2>";
                    else
                        echo"<h2>Precio Modificado</h2>";
                    echo"<br>";
                    echo"<a href='consultar2.php'>Volver a consultar</a>";
                }
            }

            


    ?>

    </div>
    <div id="contenido">
    </div>


</body>

</html>