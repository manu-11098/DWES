<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../estilo5.css">
</head>
<?php
    function mantenercheckbox($valor){
        if(isset($_POST['numeros'])){
          $afic = $_POST['numeros'];
          if (in_array($valor, $afic)!=false){
                return "checked=true";
           }
        }
    }
?>
<body>
    <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>

    <h1>Tabla con casillas de verificación - Paso 1</h1>
    <fieldset>
    <table border: 1px solid>
        <tr>

    <?php
        if(isset($_POST['numero'])){
            $numero = $_POST['numero'];
            
        
        $numeroTotal = $numero * $numero;    

        for($i=1; $i<=$numeroTotal ; $i++){
                 
            echo"<td><input type='checkbox' name='numeros[]' value='$i'".  mantenercheckbox($i).";>$i</td>";

            if(($i % $numero)  == 0 && $i < 16){
                 echo"</tr><tr>";
            }
                
        }
        
        
    ?>
    </tr>
    </table>
        <input type="hidden" name="numero" value="<?php echo $numero;?>">
        <input type="submit" name="Contar" value="Contar">
        <input type="reset" value="Borrar">
    </fieldset>

<?php

    if(isset($_POST['Contar'])){
        if(isset($_POST['numeros'])){
            $afic = $_POST['numeros'];
            echo "<p>Has marcado: <ul>";
            foreach ($afic as $key => $value) {
              echo "<li><strong>$value</strong><br></li>";
            }
            echo "</ul></p>";
          }
    }
}
else{
    echo"No has introducido nada en el formulario anterior.<br>
    <a href='inicio.php'>Volver</a>";
}
?>


    </form>
</body>
</html>