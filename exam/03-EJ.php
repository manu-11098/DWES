<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>03-EJ</title>
    <link rel="stylesheet" href="./css/estilo5ana.css">
</head>

<body>
    <?php
        function mantenerRadio($nombre,$valor){

            $check = "";
            if (isset($_POST[$nombre]) && $_POST[$nombre] == $valor) 
                  $check = "checked";

              return $check;
            }
            function mantenercheckbox($valor){
                if(isset($_POST['matriculas'])){
                  $matricula = $_POST['matriculas'];
                  if (in_array($valor, $matricula)!=false){
                        return "checked=true";
                   }
                }
            }
        function nota(){
            if(isset($_POST['fecha'])){
                $fecha=$_POST['fecha'];
                $nota = '';

                list ( $ano, $mes, $dia ) = explode ( "-", $fecha );

                if(($mes == 9) || ($mes == 10 && $dia <= 15)){
                    $nota ="ESTAS EN PLAZO";
                }elseif(($mes == 10 && $dia > 15)||($mes > 10 && $mes <= 12)){
                    $nota ="AUN TIENES OPCION";
                }elseif($mes >= 1 && $mes <= 5){
                    $nota ="VETE A CONVOCATORIA JUNIO";
                }elseif($mes == 6){
                    $nota = "PUEDES MATRICULARTE";
                }elseif($mes > 6 && $mes < 9){
                    $nota = "PERIODO VACACIONAL";
                }
        }
        return $nota;
    }
            ?>
    <form action="<?php	$_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            <p>Escriba los datos siguientes:</p>

            <label>Nombre:
                <input type="text" name="nombre" maxlength="20" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'];?>"></label></br>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" size="20" maxlength="20" value="<?php if(isset($_POST['apellidos']))echo $_POST['apellidos'];?>">

            <br><label>Enseñanza:</label>
            <input type="radio" name="estado" value="secundaria" <?php echo mantenerRadio("estado","secundaria"); ?> /> Secundaria
            <input type="radio" name="estado" value="bachillerato" <?php echo mantenerRadio("estado","bachillerato"); ?> /> Bachillerato
            <input type="radio" name="estado" value="cicloMedio" <?php echo mantenerRadio("estado","cicloMedio"); ?> /> Ciclo Medio
            <input type="radio" name="estado" value="cicloSuperior" <?php echo mantenerRadio("estado","cicloSuperior"); ?> /> Ciclo Superior<br />

            <label>Matriculado:</label>
            <input type="checkbox" name="matriculas[]" value ="matriculado" <?php echo mantenercheckbox("matriculado"); ?> /><br>

            <label>FechaMatricula:</label>
            <input type="date" name="fecha" value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha'];?>" required /></br>
            <label>NOTA:</label>
            <input type="text" name="nota" value="<?php if(isset($_POST['fecha'])) echo nota();?>" size="30" /></br>




            <p class="der">
                <input type="submit" value="Enviar" name="enviar" />
                <input type="reset" value="Borrar" name="Reset" /></p>
        </fieldset>
    </form>
</body>

</html>