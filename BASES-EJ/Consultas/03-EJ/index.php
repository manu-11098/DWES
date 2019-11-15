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
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Consulta</legend>

            <label for="categoria"> Mostrar noticias de la categoría: </label>
            <select name="categoria">
                <option value="*">TODAS</option> <!-- el value asterisco es para diferenciarlo abajo *1-->
                <?php getOptions();?>
                <!-- llamamos al método getOptions que nos rellena el select del formulario con las distintas categorías leyendolas de la tabla -->
            </select>
            <input type="submit" name="enviar" value="consulta">
        </fieldset>
    </form>
    <?php
        showTable();
    ?>

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

        function showTable(){
            include "../../connection/conexion.php";
            if(isset($_POST['categoria'])){
                echo "<table> <tr> <th>Titulo</th> <th>Texto</th> <th>Categoria</th> <th>Fecha</th> <th>Imagen</th> </tr>";

                $sql = "SELECT * FROM noticias";

                if($_POST['categoria'] != '*'){ // *1
                    $sql = $sql." WHERE categoria = '".$_POST['categoria']."';";  // cuidado con los espacios y las comillas
                }

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