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
    <form action="<?php $_SERVER['PHP_SELF']?>" method = "POST" enctype="multipart/form-data">
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
            <input type="file" name="image"><br>
            <input type="submit" name="insert" value="insertar">

            <?php
                include "../../connection/conexion.php";
                if(isset($_POST['insert']) && ($_POST['title']) && ($_POST['new'])){
                    
                    $title = $_POST['title'];
                    $new = $_POST['new'];
                    $categorie = $_POST['categoria'];
                    $date = date('Y-m-d');
                    $img = $_FILES['image']['name']; // $_FILES['name del input']['name'(recoge el nombre de la imagen)

                    $sql = "INSERT INTO noticias(titulo,texto,categoria,fecha,imagen) VALUES('$title', '$new', '$categorie','$date', '$img');";

                    $fileName = fileSave();
                    $insert = $connection -> query($sql);

                    showLastModify($fileName);
                }
            ?>

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

        function fileSave(){
            if(is_uploaded_file($_FILES['image']['tmp_name'])){ // @image = etiqueta name del input (sustituir para cambiar el tipo de fichero)

                $fileName = $_FILES['image']['name'];
                $dir = "../../src/img/inmobiliaria/"; // directorio donde guardamos la imagen

                move_uploaded_file($dir, $fileName);

                return $fileName;
            }else{
                $errMsg = "No se ha podido subir el fichero";
                return $errMsg;
            }
        }

        function showLastModify(){ 
            include "../../connection/conexion.php";
            if(isset($_POST['insert'])){
                echo "<table> <tr> <th>Titulo</th> <th>Texto</th> <th>Categoria</th> <th>Fecha</th> <th>Imagen</th> </tr>";
                $sql = "SELECT * FROM noticias WHERE titulo = '". $_POST['title']."' AND texto = '".$_POST['new']."';";

                if($result = $connection -> query($sql)){
                    while($resultado = $result -> fetch_object()){ // crea un objeto con unos atributos con el nombre de la columna que se guardan en $resultado
                        echo "<tr>";
                        echo "<td>" .$resultado -> titulo. "</td>";
                        echo "<td>" .$resultado -> texto. "</td>";
                        echo "<td>" .$resultado -> categoria. "</td>";
                        echo "<td>" .date("j/n/Y",strtotime($resultado -> fecha))."</td>";

                        if($resultado->imagen !=""){
                            echo "<td><a target='_blank' href='../../src/img/inmobiliaria/" . $resultado -> imagen."'><img src='../../src/img/inmobiliaria/ico-fichero.gif' alt='Imagen Asociada'></a></td>"; // el nombre de la imagen está en el campo imagen de la tabla de la base de datos
                        }else{
                            echo"<td> </td>";
                            echo"</tr>";
                        }
                    }
                }
                echo "</table>";
            }
        }
    ?>

</body>
</html>