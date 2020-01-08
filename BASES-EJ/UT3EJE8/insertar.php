<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="almacen.css">
</head>
<body>
<?php
    //echo "<link rel='stylesheet' href='almacen.css'>"; 
        include "conexion.php";
    ?>
    <div id="encabezado">
    <h1>Almacenes Naranco</h1>
    <h2>Insertar un producto</h2>
    <form method="post" action="insertar.php">
    <label>Codigo:</label> 
    <input type="text" name="cod" value="<?php if(isset($_POST['cod'])) echo $_POST['cod']?>">
    <input type="submit" name="enviar" value="Enviar">
</div>

</form>
<?php
    if(isset($_POST['enviar'])){
        $codigo = strtoupper($_POST['cod']);

        echo "<input type='hidden' name='codigo' value='$codigo'";
?>   
<form method="post" action="insertar.php">
<div id="contenido">
<?php
    $sql= "SELECT cod FROM producto";
    $consulta = $conexion->prepare($sql);
    $coincide = false;
    if(!$consulta->execute())
        die("Error:".$consulta->error);

    $consulta->bind_result($codConsulta);
        while ($consulta->fetch()) {
            if($codigo == $codConsulta)
                $coincide = true;      
        }    
        $consulta->close();
    
    if($coincide == true){
        echo "<br><br>El código $codigo ya está en uso.";
    }
    else{
        echo"<br><br>";
?>      
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="campo_nombre"></td>
            </tr>
            <tr>
                <td>Nombre corto:</td>
                <td><input type="text" name="campo_nombre_corto"></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><textarea name="campo_descripcion" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Precio:</td>
                <td><input type="text" name="campo_precio"></td>
            </tr>
            <tr>
                <td>Familia:</td>
                <td>

                    <select name="campo_familia">
                    <?php
                        $sql = "SELECT DISTINCT familia FROM producto";
                        $consulta = $conexion->prepare($sql);
                        if(!$consulta->execute())
                            die("Error:".$consulta->error);

                        $consulta->bind_result($familia);
                        while ($consulta->fetch()) {
                            echo "<option value='$familia'";
                            if(isset($_POST["campo_familia"])&&$_POST["campo_familia"] == $cod) echo"selected='selected'";
        
                            echo ">$familia</option>";
           
                            
                        }
                        $consulta->close();
                    ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="insertar" value="Insertar">
<?php
    }
}
?>

</form>
<?php



        if(isset($_POST['insertar'])){
            
            $codigo = $_POST['codigo'];
            echo"El codigo es:$codigo";
            $nombre = $_POST['campo_nombre'];
            $nombre_corto = $_POST['campo_nombre_corto'];
            $descripcion = $_POST['campo_descripcion'];
            $precio = $_POST['campo_precio'];
            $familia = $_POST['campo_familia'];
            echo"$codigo";
            $sql = "INSERT INTO producto VALUES (?,?,?,?,?,?)";
            $consulta = $conexion->prepare($sql);
            $consulta->bind_param('ssssss',$codigo,$nombre,$nombre_corto,$descripcion,$precio,$familia);
                    if(!$consulta->execute())
                        die("Error:".$consulta->error);
                    else{
                        echo"Inserccion exitosa.";
                    }
        }


    
?>
</div>


</body>
</html> 