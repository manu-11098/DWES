# CONSULTA A LA BASE DE DATOS

## Conexion

``` php
$connection = new mysqli("localhost", "root", "", "inmobiliaria");
mysqli_set_charset($connection,"utf8");
if($connection -> connect_errno){
die("Conexion con la base de datos erronea: ".$connection->connect_errno);
}
```

## Consulta

``` php
$sql = "SELECT DISTINCT categoria FROM noticias";

if($result = $connection -> query($sql)){   // $connection contiene la conexión que se almacena en $result. query($sql) ejecuta como sql el string $sql
                while($row = $result -> fetch_assoc()){ // fetch recupera los datos de la $result y lo almacena en $row
                    echo "<option value='".$row["categoria"]."'".mantenerSelect($row["categoria"]).">".ucfirst($row["categoria"])."</option>"; // ucfirst permite poner la primera letra en mayúscula
                }
            }
```

fetch_assoc lo almacena en formato array y fetch_object lo almacena como un objeto.
