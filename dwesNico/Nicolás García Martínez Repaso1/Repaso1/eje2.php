<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <h1>Datos para el cálculo</h1>
    <p>Introduzca un número <input type="number" name="numero" value="<?php if(isset($_POST['numero'])) echo $_POST['numero'];?>"></p>
    <p>Calcular <input type="radio" name="operacion" value="Factorial"
    <?php 
            if(isset($_POST['operacion']) && ($_POST['operacion']=='Factorial')) echo"checked";
    ?>
    >Factorial <input type="radio" name="operacion" value="Sumatoria"
    <?php 
            if(isset($_POST['operacion']) && ($_POST['operacion']=='Sumatoria')) echo"checked";
    ?>
    > Sumatoria</p>
    <input type="submit" name="enviar" value="Enviar">
    <input type="reset" value="Borrar">
</form>
    <?php
    if(isset($_POST['numero'])){
        $numero = $_POST['numero'];
        $calculoFac=1;
        $calculoSum=0;
        
        if(isset($_POST['factorial'])){
            for($i = 1; $i<=$numero; $i++){
                $calculoFac = $calculoFac * $i;
            }
            echo "<h1>El factorial de $numero es $calculoFac</h1>";
        }
        else{
                for($i = 1; $i<=$numero; $i++){
                    $calculoSum = $calculoSum + $i;
                }
                echo "<h1>El sumatorio de $numero es $calculoSum</h1>";
        }

        
    }
    ?>
</body>
</html>