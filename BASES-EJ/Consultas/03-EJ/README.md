# CONSULTAS A LA BASE DE DATOS

## Consulta

``` php
$sql = "SELECT DISTINCT categoria FROM noticias";

if($result = $connection -> query($sql)){   // $connection contiene la conexión que se almacena en $result. query($sql) ejecuta como sql el string $sql
                while($row = $result -> fetch_assoc()){ // fetch recupera los datos de la $result y lo almacena en $row en forma de array
                    echo "<option value='".$row["categoria"]."'".mantenerSelect($row["categoria"]).">".ucfirst($row["categoria"])."</option>"; // ucfirst permite poner la primera letra en mayúscula
                }
            }
```

## Fetch

### Fetch assoc

El _fetch\_assoc_ almacena los datos extraidos de la base de datos en forma de array, por lo que para acceder a ellos en el php tienes que tratarlo como si fuera un array.

``` php
while($row = $result -> fetch_assoc()){ 
    echo "<option value='".$row["categoria"]."'".mantenerSelect($row["categoria"]).">".ucfirst($row["categoria"])."</option>";
    }
```

### Fetch object

El _fetch\_object_ almacena los datos extraidos de la base de datos en un objeto el cual contiene unos atributos que se llaman igual que las columnas de la tabla, para acceder a los datos lo hacemos de la siguiente manera:

``` php
while($resultado = $result -> fetch_object()){
    echo $resultado -> titulo;
}
```