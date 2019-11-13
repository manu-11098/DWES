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

    <h1>Lista de precios</h1>
    <table>
	<tr>
		<th>Cantidad</th>
		<th>Precio Unidad</th>
	</tr>
	<tr>
		<td>menos de 10</td>
		<td class="derecha">2€</td>
	</tr>
	<tr>
		<td>entre 10 y 30</td>
		<td class="derecha">1.5€</td>
	</tr>
	<tr>
		<td>más de 30</td>
		<td class="derecha">1€</td>
	</tr>
</table>
<p>Selecciona la cantidad a pedir según nuestras tarifas</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend>Datos pedido </legend>
        <p>Números de cuadernos: <input type="number"  name="cantidad" value="<?php if(isset($_POST['cantidad'])) echo $_POST['cantidad'];?>"></p>
        <p class="der"><input type="submit" name="enviar" value="enviar"></p>

<?php
	if(isset($_POST['cantidad'])){
		$cantidad=isset($_POST['cantidad'])?$_POST['cantidad']:0;
		if($cantidad<10 && $cantidad>0) $precio=2;
		elseif($cantidad>=10 && $cantidad<30) $precio=1.5;
		elseif($cantidad>=30) $precio=1;
		$pagar = $precio*$cantidad;

		echo"El precio del pedido asciende a <b>$pagar</b>";
		
	}
?>
</fieldset>
</form>
    
</body>
</html>