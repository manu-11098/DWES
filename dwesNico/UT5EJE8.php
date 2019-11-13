<?php
if(isset($_POST['aficiones'])){
        
        foreach ($_POST['aficiones'] as $value) {
            echo"Le gusta: <strong> el $value</strong><br>";
        }

        
        
            
        echo"
        <p><a href='UT5EJE8.html'>Volver a la pagina de inicio</a></p>";
            
        
    }
    else{
        echo"
        <p>No has escrito nada en el formulario</p>
        <p><a href='UT5EJE8.html'>Volver a la pagina de inicio</a></p>";
    }




?>