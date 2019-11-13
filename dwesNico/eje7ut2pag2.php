<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilo5.css">
</head>
<body>

<form method="post" action="eje7ut2pag3.php">
        <fieldset>
            <legend>Recetas</legend>
            <h1>RECETAS DE COCINA</h1>

            <p>Escriba el nombre de la receta:</p><br>
            <p>Nombre receta<input type="text" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'] ?>" name="nombre" required></p>
            <p>Escriba los ingredientes de la receta y la cantidad de cada uno:</p>

            <?php
            if(isset($_POST['enviar'])){
                $NumeroIngredientes = $_POST['number'];
              }
              for ($i=0; $i < $NumeroIngredientes ; $i++) { 
                echo "<p>Ingredientes: <input type='text' name='ingredientes[]'> Cantidad: <input type='number' name='cantidades[]'> unidades - gramos - ml</p>";


              }
            ?>
            <p>Realización:</p><textarea name="realizacion" rows="10" cols="50" value="<?php if(isset($_POST['realizacion'])) echo $_POST['realizacion'] ?>"></textarea>
            
            
            <input type="submit" name="añadir" value="añadir">
        </fieldset>
    </form>

</body>
</html>