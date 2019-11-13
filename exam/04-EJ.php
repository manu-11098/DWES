<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>04-EJ</title>
    <link rel="stylesheet" href="./css/estilo5.css">
</head>
<body>
    <?php
        function calculadora(){
            if(isset($_POST['operacion'])){
                $operacion = $_POST['operacion'];
                $n1 = $_POST['n1'];
                $n2 = $_POST['n2'];
                $total = 0;
                $error = "n1 es mayor que n2";
                if($operacion == "suma"){
                    $total = $n1 + $n2;
                }elseif($operacion == "resta"){
                    $total = $n1 - $n2;
                }elseif($operacion == "multi"){
                    $total = $n1 * $n2;
                }elseif($operacion == "div"){
                    if($n1 < $n2){
                        return $error;
                    }elseif($n1 == 0 || $n2 == 0){
                        $error = "n1 o n2 es 0";
                        return $error;
                    }else{
                        $total = $n1 / $n2;
                    }
                }
                return $total;
            }
        }

        function mantener($valor){
            if(isset($_POST['operacion']) && $_POST['operacion'] == $valor){
                return "selected=selected";
            }
        }
    ?>
    <form action="<?php	$_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <legend>Calculadora</legend>

                <label>N1:
                <input type="text" name="n1" min = "0" value="<?php if(isset($_POST['n1'])) echo $_POST['n1'];?>"></label></br>

                <label>N2:
                <input type="text" name="n2" min = "0" value="<?php if(isset($_POST['n2']))echo $_POST['n2'];?>"></label><br><br>

                <label>Operacion:

                    <select name="operacion">
                        <option selected="selected"></option>
                        <option value="suma" <?php echo mantener("suma");?>>SUMAR</option>
                        <option value="resta" <?php echo mantener("resta");?>>RESTAR</option>
                        <option value="multi" <?php echo mantener("multi");?>>MULTIPLICAR</option>
                        <option value="div" <?php echo mantener("div");?>>DIVIDIR</option>
                    </select>
                </label><br>

                    <input type="submit" name="enviar" value="Resultado">
                    <input type="text" name="resultado" value="<?php echo calculadora();?>">

            </fieldset>
    </form>
</body>
</html>