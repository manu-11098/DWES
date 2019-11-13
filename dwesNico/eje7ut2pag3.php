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
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend>Recetas</legend>
            <p>Receta incorporada</p>
            
            <?php
            if(isset($_POST['añadir'])){
                $nombre = $_POST['nombre']; 
                $ingredientes= $_POST['ingredientes'];
                $cantidades= $_POST['cantidades'];
                $contador = count($ingredientes);
                $realizacion = $_POST['realizacion'];
              }

              echo"<p>Receta de <strong>$nombre</strong></p><ul>";
              for ($i=0; $i < $contador; $i++) { 
                  echo"<li>$ingredientes[$i]: $cantidades[$i] unidades/gr/ml</li>";
              }
            ?>
            </ul>
            <p><strong>Realización</strong></p>
            <?php echo $realizacion ?>


            
        </fieldset>
    </form>
</body>
</html>