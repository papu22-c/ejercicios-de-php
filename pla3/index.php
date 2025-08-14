<?php 
	session_start();

	//eliminar datos de accesos anteriores
	$_SESSION['datosPersonas'] = [];
	
	//acciones a realizar al entrar en la aplicación
	
	

	header("Location: personas.php");
