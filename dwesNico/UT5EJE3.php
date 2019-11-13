<?php
    	if(isset($_POST['enviar'])){
		
            $anio = $_POST['anio'];
            
            
            
            if($anio>0 && $anio<=10000){
                
                echo esbisiesto($anio);
                echo"<p><a href='UT5EJE3.html'>Volver a la pagina de inicio</a></p>";
            }
        }
        else{
            echo"
            <p>No has escrito nada en el formulario</p>
            <p><a href='UT5EJE3.html'>Volver a la pagina de inicio</a></p>";
        }

        function esbisiesto($anio){
            $bisiesto = false;
            $devolver="";
            if($anio%4==0 && $anio%100!=0 || $anio%400==0){
    
                $bisiesto = true;
            }else $bisiesto = false;
    
            if($bisiesto==true)$devolver="El año $anio es bisiesto";
            else $devolver="El año $anio NO es bisiesto";
            return $devolver;
        }

?>