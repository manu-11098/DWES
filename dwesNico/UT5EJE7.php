<?php
if(isset($_POST['enviar'])){
		
        $sexo = $_POST['sexo'];
        
        echo hombreomujer($sexo);
        
        
            
        echo"
        <p><a href='UT5EJE7.html'>Volver a la pagina de inicio</a></p>";
            
        
    }
    else{
        echo"
        <p>No has escrito nada en el formulario</p>
        <p><a href='UT5EJE7.html'>Volver a la pagina de inicio</a></p>";
    }

    function hombreomujer($sexo){
        $devolver ="";
        if($sexo == "hombre")$devolver="eres un <strong>hombre</strong>";
        else$devolver="eres un <strong>mujer</strong>";
        return $devolver;
    }


?>