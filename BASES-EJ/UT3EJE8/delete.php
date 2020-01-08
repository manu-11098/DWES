<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
    <link rel="stylesheet" href="almacen.css">
</head>
<body>
<?php
   include "conexion.php";
?>
<div id="encabezado">
    <h1>Almacenes Naranco</h1>
    <h2>Borrar un producto</h2>
    <form method="post" action="delete.php">
    <label>Producto:</label> 
    <select name="producto">
    <?php
        $sql = "SELECT DISTINCT cod FROM producto";
        $consulta = $conexion->prepare($sql);
        if(!$consulta->execute())
        die
            ("Error:".$consulta->error);

        $consulta->bind_result($cod);
        while ($consulta->fetch()) {
            echo "<option value='$cod'";
            if(isset($_POST["producto"])&&$_POST["producto"] == $cod) echo"selected='selected'";
        
            echo ">$cod</option>";
           
                            
        }
        $consulta->close();
    ?>
    </select>
    <input type="submit" name="enviar" value="Comprobar en stock">
</div>
</form>
<?php
    if(isset($_POST['enviar'])){
        $codigo = $_POST['producto'];
        $existencias = false;
        $sql = "SELECT DISTINCT producto FROM stock";
        $consulta = $conexion->prepare($sql);
        if(!$consulta->execute())
            die("Error:".$consulta->error);

        $consulta->bind_result($codConsulta);
        while ($consulta->fetch()) {
            if($codigo == $codConsulta)
                $existencias = true;      
        }    
        $consulta->close();

        if($existencias == true)
            echo"<br>Error: Existen existencias del producto en Stock<br>";
        else{
            $sql ="DELETE FROM producto WHERE cod = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bind_param('s',$codigo);
                if(!$consulta->execute())
                    die("Error:".$consulta->error);
                else{
                    echo"<br><br>Borrado exitoso.";
                }
        }
    }
?>
<br><br>
[<a href="Index.html">Volver al index</a>]
</body>
</html>