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
<form name='selecciona' action='consulta_noticias.php' method='post'>
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
 $instruccion = "select * from noticias";

 if (isset($categoria) && $categoria != "Todas")
   $instruccion = $instruccion . " where categoria='$categoria'";

$instruccion = $instruccion . " order by fecha desc";
$consulta = $conexion->query ($instruccion);
// Mostrar resultados de la consulta
$nfilas = $conexion -> affected_rows;
echo "filas:".$nfilas;
$fila = $consulta->num_rows;
echo "filasnumwows:".$fila;
if ($nfilas > 0){
   echo "<table>";
   echo "<tr>";
   echo "<th>Título</th>";
   echo "<th>Texto</th>";
   echo "<th>Categoría</th>";
   echo "<th>Fecha</th>";
   echo "<th>Imagen</th>";
   echo "</tr>";
   //for ($i=0; $i<$nfilas; $i++)
   //{
    while($resultado = $consulta->fetch_object()){
     echo "<tr>";
     echo "<td>" . $resultado->titulo . "</td>";
     echo "<td>" . $resultado->texto . "</td>";
     echo "<td>" . $resultado->categoria . "</td>";
     echo "<td>" . date ("j/n/Y",strtotime($resultado->fecha)) . "</td>";
   if ($resultado->imagen != "")
   echo "<td><a target='_blank' href='img/" . $resultado->imagen ."'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td>";
   else
   echo "<td> </td>";
   echo "</tr>";
}
   echo "</table>";
}
   else
echo "No hay noticias disponibles";
   // Cerrar conexión
    $consulta->close();
    $conexion->close();
}
?>
<p>[ <a href='login.html'>Menú principal</a> ]</p>
</body>
</html>
