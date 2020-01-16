<?php
include 'conexion.php';
echo "<link rel='stylesheet' type='text/css' href='estilo.css' />";
?>

<h1>Gestión de noticias</h1>
<h2>Insertar nueva noticia</h2>
<form class="borde" action="inserta_noticia.php" name="inserta" 
enctype="multipart/form-data" method="post">                    
<!-- Título de la noticia -->
<p><label>Título: *</label>
<input type="text" name="titulo" size="50" maxlength="50"
value="<?php if (isset($_POST['titulo'])) echo $_POST['titulo'];?>" required />
</p>
<!-- Texto de la noticia-->
<p><label>Texto: *</label>
<textarea cols="45" rows="5" name="texto" ></textarea>
</p>
<!-- Categoría de la noticia-->
<p><label>Categoría:</label>
<select name="categoria">
<?php
  $instruccion = "SELECT DISTINCT categoria FROM noticias ORDER BY 1 DESC";
  $consulta = $conexion -> query ($instruccion);    
  while ($fila = $consulta -> fetch_object()){       
       echo "<option>{$fila -> categoria}</option>";          
   } 
?>
</select>

</p>
<p><label for="imagen">Imagen:</label> 
<input name="imagen" type="file" accept="image/gif,image/jpeg"  /></p>
<!-- Botón de envío -->
<p><input type="submit" name="insertar" value="Insertar noticia" /></p>
</form>

<p>NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente</p>
<p>[ <a href='login.html'>Menú principal</a> ]</p>
<?php
// Obtener valores introducidos en el formulario si se ha enviado el formulario
if (isset($_POST['insertar'])){  
 $insertar = $_POST['insertar'];
 if (isset($_POST['titulo'])) $titulo = $_POST['titulo'];
 if (isset($_POST['texto']))  $texto = $_POST['texto'];
 if (isset($_POST['categoria'])) $categoria = $_POST['categoria'];

// Comprobar que se han introducido todos los datos obligatorios
// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
echo " el nombre es:".$nombre_img;
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
var_dump($_FILES);
echo "el nombre de la imagen es:$nombre_img"; 
//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && 
   ($_FILES['imagen']['size'] <= 200000)) 
{
//indicamos los formatos que permitimos subir a nuestro servidor
if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
{
// Ruta donde se guardarán las imágenes que subamos
$directorio = 'img/';

// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
}else 
  //si no cumple con el formato
  echo "No se puede subir una imagen con ese formato ";
} 
else 
{
//si existe la variable pero se pasa del tamaño permitido
  if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}
   
// Si los datos son correctos, procesar formulario
if (isset($insertar))
   {
   // Insertar la noticia en la Base de Datos
 $fecha=date('Y-m-d');
 $sql = "insert into noticias (titulo, texto, categoria, fecha, imagen) 
      values ('$titulo', '$texto', '$categoria','$fecha','$nombre_img')";     
 $consulta= $conexion->query($sql);
         
   // Mostrar datos introducidos
      echo "<h1>Gestión de noticias</h1>";
      echo "<h2>Resultado de la inserción de nueva noticia</h2>";
      echo "<p>La noticia ha sido recibida correctamente:</p>";
      echo "<ul>";
      echo "   <li>Título: " . $titulo ;
      echo "   <li>Texto: " . $texto;
      echo "   <li>Categoría: " . $categoria ;
      $fecha = date ("d/m/Y");     // Fecha actual
      echo "   <li>Fecha: " . $fecha ;
      echo "   <li>Imagen: " . $nombre_img ;


      echo "</ul>";
      echo "<p>[ <a href='inserta_noticia.php'>Insertar otra noticia</a> | ";
      echo "<a href='login.html'>Menú principal</a> ]</p>";
   }
}
?>
</body>
</html>