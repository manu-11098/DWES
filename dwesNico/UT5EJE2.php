<?php
    	if(isset($_POST['enviar'])){
		
            $columnas = $_POST['numColum'];
            $celdasNumer = $_POST['numCeld'];
            
            
            if((strlen($columnas) >= 0) && ($columnas <= 10) && ($celdasNumer <= $columnas)){
                crearTabla($celdasNumer, $columnas);
                
            echo"
            
            <p><a href='UT5EJE2.html'>Volver a la pagina de inicio</a></p>";
                
            }
        }
        else{
            echo"
            <p>No has escrito nada en el formulario</p>
            <p><a href='UT5EJE2.html'>Volver a la pagina de inicio</a></p>";
        }


        function crearTabla($celdasNumer, $columnas){
            $j=1;
            echo"<table border = 2px><tr>";

                for($i=0; $i<$columnas;$i++){
                    
                    
                    if($j<=$celdasNumer){

                        echo"<td> $j </td>";

                    }else{
                        echo"<td> - </td>";
                    }
                    
                    $j++;
                }

            echo"</tr></table>";
        }
?>