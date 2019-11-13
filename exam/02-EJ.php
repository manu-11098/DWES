<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>02-EJ</title>
    <link rel="stylesheet" href="./css/estilo5.css">
</head>

<body>
    <?php
        function mantenerRadio($nombre,$valor){

            $check = "";
            if (isset($_POST[$nombre]) && $_POST[$nombre] == $valor) 
                  $check = "checked";

              return $check;
            }
            ?>
    <table>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

            <tr>
                <td>Escribe un texto:</td>
                <td><input name="texto" size="50" placeholder="Escribe aqui tu texto" value="<?php if(isset($_POST['texto'])) echo $_POST['texto'];?>" required = "required"> </input></td>
            </tr>
            <tr>
                <td>Escribe un numero n:</td>
                <td><input type="number" name="num" min="1" value = "<?php if(isset($_POST['num'])) echo $_POST['num'];?>" required = "required" /></td>
            </tr>
            <tr>
                <td>Escribe una letra o caracter:</td>
                <td> <input type="text" name="car" maxlength="1" size="1" value="<?php if(isset($_POST['car'])) echo $_POST['car'];?>"/></td>
            </tr>
            <tr>
                <td>Opciones:</td>
                <td>
                    <input type="radio" name="funcion" value="insert" <?php echo mantenerRadio("funcion", "insert"); ?> required = "required" />Inserta el caracter cada n posiciones
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" name="funcion" value="repeat" <?php echo mantenerRadio("funcion", "repeat"); ?> required = "required" /> repetir el texto n veces</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="funcion" value="reverse" <?php echo mantenerRadio("funcion", "reverse"); ?> required = "required" /> Invertir el texto</td>
            </tr>
            <tr>
                <td>

                    <input type="submit" name="enviar" value="Enviar" />
                    <input type="reset" name="borrar" value="borrar" />
                </td>
                <td></td>
            </tr>
        </form>
    </table>
    <table>
        <tr>
            <td><?php
                if(isset($_POST['funcion'])){

                    $texto = $_POST['texto'];
                    $n = $_POST['num'];

                        if($_POST['funcion'] == 'insert'){
                            if(isset($_POST['car'])){
                            $character = $_POST['car'];
                          //  echo $character;
                            echo chunk_split($texto, $n, $character );
                            }else{
                                echo "INTRODUCE UN CARACTER";
                            }
                        }elseif($_POST['funcion'] == 'repeat'){
                            echo str_repeat($texto, $n);
                        }elseif($_POST['funcion'] == 'reverse'){
                            echo strrev($texto);
                        }
                }
            ?></td>
        </tr>
    </table>
    
</body>

</html>