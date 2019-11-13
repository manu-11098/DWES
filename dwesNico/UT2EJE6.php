<!DOCTYPE HTML>
<html>
<head>

    <meta charset="UTF-8"> 
    <title>Desarrollo Web</title>

</head>
<body>
    <?php
        function tabla($cad1, $cad2, $cad3, $cad4){

            $devolver = "<table border=1>
            <tr>
                <td> $cad1 </td>
            </tr>
            <tr>
                <td> $cad2 </td>
            </tr>
            <tr>
                <td> $cad3 </td>
            </tr>
            <tr>
                <td> $cad4 </td>
            </tr>
            </table>";

            return $devolver;

        }

        echo tabla("a", "b", " c", "d");

    ?>
</body>

</html>