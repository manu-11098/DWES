<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $cadena="En un lugar de la mancha";
        echo"<strong>$cadena</strong><br>";
        echo"Numero total de caracteres: ".strlen($cadena)."<br>";

        $cadenaSinEspacios = str_replace(' ', '', $cadena);

        echo"Letras y caracteres queaparecen en el texto: ";
        foreach (count_chars($cadenaSinEspacios, 1) as $i => $val) {
            echo chr($i) , "";
         }
         echo "<br>";

         
         $palabras = str_word_count($cadena);
         echo "Numero de palabras: $palabras <br>";

         echo"Veces que parece cada letra o caracter: <br>";

         echo"<table>
                <tr>
                <th>Cod ASCII</td>
                <th>Caracter</td>
                <th>Veces</td>
                </tr>";
        foreach (count_chars($cadena, 1) as $i => $val) {

            echo "<tr>
                    <td>$i</td>
                    <td>".chr($i)."</td>
                    <td>$val</td>
                    </tr>";

            //echo "$i \n\n\n\n\n\n".  chr($i) ." \n\n\n\n\n\n $val <br>";
           // echo "Se ha encontrado $val instancia (s) de \"" , chr($i) , "\" en la cadena.\n<br>";
         }
         echo "</table>";





    ?>
</body>
</html>