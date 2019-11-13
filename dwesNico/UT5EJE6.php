<?php
if(isset($_POST['enviar'])){
		
        $num = $_POST['num'];
        
        echo numeroAleatorio($num);
        
        
            
        echo"
        <p><a href='UT5EJE6.html'>Volver a la pagina de inicio</a></p>";
            
        
    }
    else{
        echo"
        <p>No has escrito nada en el formulario</p>
        <p><a href='UT5EJE6.html'>Volver a la pagina de inicio</a></p>";
    }

    function numeroAleatorio($num){

        $numeroAdivinar = rand(1,10);
        $devolver="";
        if($num>$numeroAdivinar)$devolver="Muy grande";
        elseif($num<$numeroAdivinar)$devolver="Muy pequeño";
        else $devolver="Adivinaste";

        return "$devolver!! El número era $numeroAdivinar ";

    }


?>