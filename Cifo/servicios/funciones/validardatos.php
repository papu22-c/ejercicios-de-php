<?php 
	
    //FUNCION DE VALIDACION DE DATOS COMUNES
	function validarDatos($nif, $nombre, $direccion) {
		
		if (empty(trim(filter_input(INPUT_POST, "nif")))){
			throw new Exception("Introduzca un nif válido" );
		}
    	if (empty(trim(filter_input(INPUT_POST, "nombre")))){
    	    throw new Exception('Introduzca su nombre');
    	}
    	if (empty(trim(filter_input(INPUT_POST, "direccion")))){
    	    throw new Exception("Introduzca una dirección");            
    	}
	}


	//validar formulario de modificacción
	function validarModi($nif, $nombre, $direccion) {
		
		if (empty(trim("$nif"))){
			throw new Exception("Introduzca un nif válido" );
		}
    	if (empty(trim("$nombre"))){
    	    throw new Exception('Introduzca su nombre');
    	}
    	if (empty(trim("$direccion"))){
    	    throw new Exception("Introduzca una dirección");            
    	}
	
	}


