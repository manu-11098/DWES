<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../estilo5.css">
</head>
<body>
<form action="casillas.php" method="POST">
        <h1>Tabla con casillas de verificación</h1>
        <p>Escribe un número y dibujaré una tabla cuadrada de ese tamaño con casillas de verificación en cada casilla.</p>
        <fieldset>
            <p>
                Tamaño <input type="number" name="numero" value="<?php if(isset($_POST['numero'])) echo $_POST['numero']; ?>">
                <input type="submit" name="Dibujar" value="Dibujar">
            </p>
        </fieldset>
    </form>
</body>
</html>