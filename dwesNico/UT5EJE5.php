<?php
    	if(isset($_POST['enviar'])){
		
            $email = $_POST['email'];
                
            echo"Tu email es valido: $email";

                echo"<p><a href='UT5EJE5.html'>Volver a la pagina de inicio</a></p>";
            
        }
        else{
            echo"
            <p>No has escrito nada en el formulario</p>
            <p><a href='UT5EJE5.html'>Volver a la pagina de inicio</a></p>";
        }


?>