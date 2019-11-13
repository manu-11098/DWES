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

    <form method="post" action="eje7ut2pag2.php">
        <fieldset>
            <legend>Recetas</legend>
            <h1>RECETAS DE COCINA</h1>

            <p>Indique el numero de ingredientes <input type="number" value="<?php if(isset($_POST['number'])) echo $_POST['number'] ?>" name="number" required></p>
            <input type="submit" name="enviar" value="enviar">
        </fieldset>
    </form>

</body>
</html>