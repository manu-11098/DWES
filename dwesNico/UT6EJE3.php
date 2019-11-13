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
<?php
  function mantenercheckbox($valor){
    if(isset($_POST['aficiones'])){
      $afic = $_POST['aficiones'];
      if (in_array($valor, $afic)!=false){
            return "checked=true";
       }
    }
}

function mantenerRadio($nombre,$valor){

$check = "";
if (isset($_POST[$nombre]) && $_POST[$nombre] == $valor) 
      $check = "checked";
    
 
  return $check;
	

}
?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
    <legend>Datos personales</legend>
    <p>Escriba los datos siguientes</p>
    <table >
      <tbody>
        <tr>
          <td><strong>Nombre:</strong><br />
            <input type="text" name="nombre" size="20" maxlength="20" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'];?>" /></td>
          <td><strong>Apellidos:</strong><br />
            <input type="text" name="apellidos" size="20" maxlength="20" value="<?php if(isset($_POST['apellidos']))echo $_POST['apellidos'];?>"/></td>
          <td><strong>Edad:</strong><br />

            <select name="edad">
              <option selected="selected"></option>
              <option value="Menos de 20 años">Menos de 20 años</option>
              <option value="Entre 20 y 39 años">Entre 20 y 39 años</option>
              <option value="Entre 40 y 59 años">Entre 40 y 59 años</option>
              <option value="60 años o más">60 años o más</option>
            </select>
             </td>
        </tr>
        <tr>
          <td><strong>Peso:<br />
            </strong><input type="text" name="peso" size="6" maxlength="5" value="<?php if(isset($_POST['peso']))echo $_POST['peso'];?>"/>
          kg</td>
          <td><strong>Sexo:</strong><br />
            <input type="radio" name="sexo" value="hombre" 
            <?php 
            if(isset($_POST['sexo']) && ($_POST['sexo']=='hombre')) echo"checked";
            ?>
            />Hombre 
            <input type="radio" name="sexo" value="mujer" 
            <?php 
            if(isset($_POST['sexo']) && ($_POST['sexo']=='mujer')) echo"checked";
            ?>
            />Mujer</td>
          <td><strong>Estado Civil:</strong><br />
            <input type="radio" name="estadoCivil" value="soltero" <?php echo mantenerRadio("estadoCivil","soltero"); ?> /> Soltero
            <input type="radio" name="estadoCivil" value="casado" <?php echo mantenerRadio("estadoCivil","casado"); ?>/> Casado
            <input type="radio" name="estadoCivil" value="otro" <?php echo mantenerRadio("estadoCivil","otro"); ?>/> Otro</td><br />
        </tr>
        <tr>
          <td rowspan="2" class="borde"><strong>Aficiones:</strong></td>
          <td><input type="checkbox"  name="aficiones[]" value="cine" <?php echo mantenercheckbox("cine"); ?>/> Cine</td>
          <td><input type="checkbox"  name="aficiones[]" value="literatura" <?php echo mantenercheckbox("literatura"); ?>/> Literatura</td>
          <td><input type="checkbox"  name="aficiones[]" value="tebeos" <?php echo mantenercheckbox("tebeos"); ?>/> Tebeos</td>
        </tr>
        <tr>
          <td><input type="checkbox"  name="aficiones[]" value="deporte" <?php echo mantenercheckbox("deporte"); ?>/> Deporte</td>
          <td><input type="checkbox"  name="aficiones[]" value="musica" <?php echo mantenercheckbox("musica"); ?>/> Música</td>
          <td><input type="checkbox"  name="aficiones[]" value="television" <?php echo mantenercheckbox("television"); ?>/> Televisión</td>
        </tr>
      </tbody>
    </table>
    <input type="submit" name="enviar" value="enviar">
    <input type="reset">

    <?php
      if(isset($_POST['nombre'])){
        echo "<p>Su nombre es: <strong>".$_POST['nombre']."</strong></p>";
      }
      if(isset($_POST['apellidos'])){
        echo "<p>Sus apellidos son: <strong>".$_POST['apellidos']."</strong></p>";
      }
      if(isset($_POST['edad'])){
        echo "<p>Su edad es: <strong>".$_POST['edad']."</strong></p>";
      }
      if(isset($_POST['peso'])){
        echo "<p>Su peso es: <strong>".$_POST['peso']."</strong></p>";
      }
      if(isset($_POST['sexo'])){
        echo "<p>Su sexo es: <strong>".$_POST['sexo']."</strong></p>";
      }
      if(isset($_POST['estadoCivil'])){
        echo "<p>Su estado Civil es: <strong>".$_POST['estadoCivil']."</strong></p>";
      }
      if(isset($_POST['aficiones'])){
        $afic = $_POST['aficiones'];
        echo "<p>Sus aficiones son: <br>";
        foreach ($afic as $key => $value) {
          echo "<strong>$value</strong><br>";
        }
        echo "</p>";
      }
    ?>

    </fieldset>
</form>
    
</body>
</html>