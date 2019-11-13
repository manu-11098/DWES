	<?php 

	if(isset($_POST['enviar'])){
		
		$dni = $_POST['num'];
		
		
		if(strlen($dni) == 8 && $dni >= 0){
		
			$dni=letraDNI($dni);
			echo"<p>Tu  DNI es: $dni </p>";
			echo"<a href='UT5EJE1.html'>Volver a la pagina de inicio</a>";
		}
	}


	function letraDNI($dni){

		$cadena="";

		if($dni <8){
			$cadena = "El número es demasiado corto";
		}

		else{
		$letras = "TRWAGMYFPDXBNJZSQVHLCKE";
		$letra = $dni%23;
		$letraBuena = substr($letras, $letra,1);

		$cadena=$dni.$letraBuena;
		}

		return $cadena;
	}

	 ?>
