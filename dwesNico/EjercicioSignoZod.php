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



<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
    <legend>Datos personales</legend>
    <p>Escriba los datos siguientes</p>
    <strong>Fecha de nacimiento:</strong>

            <input type="date" name="fecha" required="required" id="fecha" value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha'];?>">

    <input type="submit" name="enviar" value="enviar">
    <br>

    <p><strong>Zodiaco: </strong><input type="text" name="zodiaco" value ="<?php echo signo_zodiaco() ?>"></p>

    <p><strong>Imagen: </strong>
    
    <img src="zodiaco/<?php echo signo_zodiaco()?>.jpg"></p>

    <?php
      
      function signo_zodiaco(){ 
        if(isset($_POST['fecha'])){
        $fecha=$_POST['fecha'];
        $zodiaco = ''; 
                 
        list ( $ano, $mes, $dia ) = explode ( "-", $fecha );
        
        if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  
        { $zodiaco = "Acuario"; }
        elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  
        { $zodiaco = "Piscis"; } 
        elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  
        { $zodiaco = "Aries"; } 
        elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  
        { $zodiaco = "Tauro"; } 
        elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  
        { $zodiaco = "Geminis"; } 
        elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  
        { $zodiaco = "Cáncer"; } 
        elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  
        { $zodiaco = "Leo"; } 
        elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  
        { $zodiaco = "Virgo"; } 
        elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) 
        { $zodiaco = "Libra"; } 
        elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) 
        { $zodiaco = "Escorpio"; } 
        elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) 
        { $zodiaco = "Sagitario"; } 
        elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  
        { $zodiaco = "Capricornio"; } 
     
        echo $zodiaco; }
     }

     $signos = array('acuario','piscis','aries','tauro','geminis','cancer','leo','virgo','libra','escorpio','sagitario','capricornio');
  shuffle($signos);

  echo "<h1>Visualizando zodiaco</h1>";
        echo "<table>";

  $n=0;
  for ($i=1;$i<=3;$i++)
  {
    echo '<tr>';
    for ($j=1;$j<=4;$j++)
    {
       echo "<td><img src='zodiaco/".$signos[$n].".jpg' width='50' height='50'</td>";
       $n++;
    }
    echo '</tr>';
  }

echo "</table>";
      
    ?>

    </fieldset>
</form>
    
</body>
</html>