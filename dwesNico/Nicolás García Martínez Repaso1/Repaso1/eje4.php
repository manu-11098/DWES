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

    <fieldset>
    <legend>Formulario</legend>
    <p>Cuantos hijos tiene: 
    <select name="hijos" id="hijos">
    <option value="1200">Hasta 2 hijos</option>
    <option value="1550">Entre 3 y 5</option>
    <option value="1700">6 o más</option>
    </select>
    </p>
    <p>Número de hijos en edad escolar (6-18 años): <input type="number" name="numero" value="<?php if(isset($_POST['numero'])) echo $_POST['numero']; ?>"></p>
    <p>
    <input type="radio" name="estadoCivil" value="Viuda"
    <?php
        if(isset($_POST['estadoCivil']) && ($_POST['estadoCivil'] == 'Viuda')) echo "checked";
    ?>
    >Viuda
    <input type="radio" name="estadoCivil" value="Otro"
    <?php
        if(isset($_POST['estadoCivil']) && ($_POST['estadoCivil'] == 'Otro')) echo "checked";
    ?>
    >Otro
    </p>
    <input type="submit" name="enviar" value="Enviar">
    <input type="reset" value="Borrar">
    
    <?php
        if(isset($_POST['enviar'])){
            $mensualidad = $_POST['hijos'];
            $numero = $_POST['numero'] * 100;
            $dineroAdicional = 0;
            if($_POST['estadoCivil'] == "Viuda"){
                $dineroAdicional = 200;
            }
            if(($_POST['numero']<=2 && $_POST['hijos']==1200) || ($_POST['numero']<=5 && $_POST['hijos']==1550) || ($_POST['numero']>=6 && $_POST['hijos']==1700)){

                $importe = $mensualidad + $dineroAdicional + $numero;

                echo "<br>";
                echo "Dinero por hijos: $mensualidad <br>";
                echo "Dinero por numero de hijos en edad escolar: $numero <br>";
                echo "Dinero por estado civil: $dineroAdicional <br>";
                echo"<strong>Total: </strong>$importe";
            }
            else{
                echo "<br>";
                echo "Error (Más hijos en edad escolar de los que tiene)";
            }
            

        }
    ?>
    
    </fieldset>


</form>
    
</body>
</html>