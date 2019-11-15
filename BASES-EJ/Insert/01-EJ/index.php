<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="./estilos/estilo5ana.css" rel="stylesheet">
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" mehtod = "POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Insert</legend>
            <label for = "title">Titulo:</label>
            <input type = "text" name = "title"><br>
            <label for = "new">Noticia:</label><br>
            <textarea rows="4" cols="50" name="new"></textarea><br>
            <label for="categoria">Categoria:</label>
            <select name="categoria">
                <option value="*">TODAS</option>
                <?php getOptions();?>
            </select><br><br>
            <label for="image">Selecciona una imagen</label>
            <input type="file" name="image">
            <input type="submit" name="insert" value="insertar">
        </fieldset>
    </form>

    <?php
        function getOptions(){
            include "../../connection/conexion.php";// incluimos la conexión
            $sql = "SELECT DISTINCT categoria FROM noticias"; // creamos la sentencia sql

            if($result = $connection -> query($sql)){   // $connection contiene la conexión que se almacena en $result. query($sql) ejecuta como sql el string $sql
                while($row = $result -> fetch_assoc()){ // fetch recupera los datos de la $result y lo almacena en $row
                    echo "<option value='".$row["categoria"]."'".mantenerSelect($row["categoria"]).">".ucfirst($row["categoria"])."</option>"; // ucfirst permite poner la primera letra en mayúscula
                }
            }
        }

        function mantenerSelect($valor){ // mantenemos el valor del select
            if(isset($_POST['categoria']) && $_POST['categoria'] == $valor){
                return "selected=selected";
            }
        }

        function insertInto(){
            include "../../connection/conexion.php";
            if(isset($_POST['title']) && isset($_POST['new']) && isset($_POST['categoria'])){

                $title = $_POST['title'];
                $new = $_POST['new'];
                $categorie = $_POST['categoria'];
                $date = date('Y-m-d');
                $img = $_FILES['image']['name']; // $_FILES['name del input']['name'(recoge el nombre de la imagen)]


                $slq = "INSERT INTO noticias(titulo,texto,categoria,fecha,imagen) VALUES('$titulo', '$texto', '$categoria','$fecha', '$imagen');";


            }
        }

        function fileSave(){
            $fileName = $_FILES['image']['name'];
            $filePath = $_FILES['image']['tmp_name'];
            $dir = "../../src/img/inmobiliaria/"; //* Where you save the file

            $completeName = $dir. $fileName;
            if(is_file($completeName)){
                $finalName = time(). "-" .$fileName;
            }
            move_uploaded_file($filePath, $completeName);
        }
    ?>

</body>
</html>