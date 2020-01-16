<?php
include 'conexion.php';
?>
<html>
<head>
<title>Gestión de noticias - Eliminación de noticias</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
</head>
<body>
<h1>Eliminación de noticias</h1>
<?php
//Comprobar si se ha enviado el formulario de Eliminar noticias   
//Procesar el formulario
if (isset($_POST['eliminar'])){
  $eliminar = $_POST['eliminar'];
  // Obtener número de noticias a borrar
  $nfilas=0;
  if (isset($_POST['borrar']))
   {
         $borrar = $_POST['borrar'];
         $nfilas = count ($borrar); 
   }     
  // Mostrar noticias a borrar y borrarlas
  echo " voy a borrar los siguientes registros:";
  for ($i=0; $i<$nfilas; $i++)   {
      
    $instruccion = "select * from noticias where id = $borrar[$i]";
    $consulta = $conexion -> query($instruccion);
    $resultado = $consulta->fetch_object();
      // Mostrar datos de la noticia i-ésima a borrar
    
    echo "<ul>";
    echo "   <li>Título: $resultado->titulo";
    echo "   <li>Texto: $resultado->texto";
    echo "   <li>Categoría: $resultado->categoria";
    $fecha=date('j/n/Y',strtotime($resultado->fecha));
    echo "   <li>Fecha: $fecha";
    if (!empty($resultado->imagen) )
            echo "   <li>Imagen: $resultado->imagen";
    else
    echo "   <li>Imagen: (no hay)";
         echo "</ul>";
      // Eliminar noticia
  $instruccion = "delete from noticias where id = $borrar[$i]";
  $consulta = $conexion->query($instruccion);
}

echo "<p>Número total de noticias eliminadas: " . $conexion->affected_rows . "</p>";  
echo "<p>[ <a href='elimina_noticia.php'>Eliminar más noticias</a> | ";
echo "<a href='login.html'>Menú principal</a> ]</p>";
}
//Mostrar el formulario con las noticias que hay en la b.d.
else
{
// Realizar consulta de todas las noticias disponibles
$instruccion = "select * from noticias order by fecha desc";
$consulta = $conexion->query($instruccion);
// Mostrar resultados de la consulta
$fila=$conexion->affected_rows;
if($fila>0){
  echo "<form action='elimina_noticia.php'  method='post'>";
  echo "<table>";
  echo "<tr><th>Título</th>";
  echo "<th>Texto</th>";
  echo "<th>Categoría</th>";
  echo "<th>Fecha</th>";
  echo "<th>Imagen</th>";
  echo "<th>Borrar</th></tr>";
  while($resultado= $consulta->fetch_object())  {
  echo "<tr><td>" . $resultado->titulo . "</td>";
  echo "<td>{$resultado->texto}</td>";
  echo "<td>" . $resultado->categoria
  . "</td>";
  $fecha=date('j/n/Y',strtotime($resultado->fecha));
  echo "<td>" . $fecha . "</td>";
  if (!empty($resultado->imagen))
   echo "<td><a target='_blank' href='img/".$resultado->imagen."'><img border='0' src='img/ico-fichero.gif' alt='Imagen asociada'></a></td>";
  else  echo "<td> </td>";
  echo "<td><input type='checkbox' name='borrar[]' value='{$resultado->id}'></td></tr>";
  }
  echo "</table>";
  echo "<br /><input type='submit' name='eliminar' value='Eliminar noticias marcadas'>";
  echo "</form>";      
  }else
      echo "No hay noticias disponibles";      
      echo "<p>[ <a href='login.html'>Menú principal</a> ]</p>";
     
   
}   
   $conexion->close(); 
?>

</body>
</html>