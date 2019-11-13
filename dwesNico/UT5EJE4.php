<?php
    	if(isset($_POST['enviar'])){
		
            $temp = $_POST['temp'];
            $grados = $_POST['grados'];
                
            if($grados == "celsius") echo convertirAFahrenheit($temp);
            else echo convertirACentigrados($temp);

                echo"<p><a href='UT5EJE4.html'>Volver a la pagina de inicio</a></p>";
            
        }
        else{
            echo"
            <p>No has escrito nada en el formulario</p>
            <p><a href='UT5EJE4.html'>Volver a la pagina de inicio</a></p>";
        }


        function convertirAFahrenheit($temp){

            $tempFah = ($temp*1.8)+32;

            return $tempFah;
        }
        function convertirACentigrados($temp){

            $tempCen = ($temp-32)/1.8;

            return $tempCen;
        }

?>