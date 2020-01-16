<?php
include 'conexion.php';
?>

<html>
<head>
   <title>Consulta de noticias</title>
   <link rel="stylesheet" type="text/css" href="estilo.css" />
</head>
<body>
<div>
<h1>Gestión de noticias</h1>
<h2>Consulta de noticias</h2>
<form name='selecciona' action='consulta_PREPARADAS.php' method='post'>
<p>Mostrar noticias de la categoría:
<select name='categoria' >
<option>Todas</option>

<?php
 // Obtener las categorías de la base de datos
 $instruccion = "SELECT DISTINCT categoria FROM noticias ORDER BY 1 DESC";
 $consulta = $conexion -> query ($instruccion);

 // Mostrar cada valor en un elemento OPTION   
    
 while ($fila = $consulta -> fetch_object())       
   echo "<option>{$fila -> categoria}</option>"; 
                  
?>
</select></p>
<input type ="submit" value="Enviar" name="enviar" />
</form>
</div>

<?php

if (isset ($_POST['enviar']) ){
 // Recoger la categoría seleccionada
 $categoria=$_POST['categoria']; 
 // Enviar consulta
 if($categoria=='Todas')
    $instruccion = "select titulo,texto,categoria,fecha,imagen from noticias";
 else
 $instruccion = "select titulo,texto,categoria,fecha,imagen 
 from noticias where categoria=? order by fecha desc";
  
 $sentencia = $conexion->prepare($instruccion);
 if($categoria!='Todas')
 $sentencia->bind_param('s',$categoria);
$sentencia->execute();


// Mostrar resultados de la consulta
$sentencia->bind_result($tit, $texto, $cat, $fec,$img); 

echo "<table>";
echo "<tr>";
echo "<th>Título</th>";
echo "<th>Texto</th>";
echo "<th>Categoría</th>";
echo "<th>Fecha</th>";
echo "<th>Imagen</th>";
echo "</tr>";
while ($sentencia->fetch()){
     echo "<tr>";
     echo "<td>" . $tit . "</td>";
     echo "<td>" . $texto. "</td>";
     echo "<td>" . $cat. "</td>";
     echo "<td>" . date ("j/n/Y",strtotime($fec)) . "</td>";
   if ($img != "")
   echo "<td><a target='_blank' href='img/" . $img."'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td>";
   else
   echo "<td> </td>";
   echo "</tr>";
}
   echo "</table>";

 //  else
//echo "No hay noticias disponibles";
   // Cerrar conexión
    $consulta->close();
    $conexion->close();
}
?>
<p>[ <a href='login.html'>Menú principal</a> ]</p>
</body>
</html>
