<?php 
	session_start();

	
	//eliminar datos de accesos anteriores

	
	//acciones a realizar al entrar en la aplicación
	$_SESSION['datosPersonas'] = [];

	header("Location: personas.php");




?>