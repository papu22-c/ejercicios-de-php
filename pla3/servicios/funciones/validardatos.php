<?php 

    //FUNCION DE VALIDACION DE DATOS COMUNES
	function validarDatos($nif, $nombre, $direccion) {
		//validar datos obligatorios
		if (empty($nif)){
			throw new Exception("Introdusca un nif válido");
		}
		if (empty($nombre)){
			throw new Exception("Introdusca un nombre");
		}
		if (empty($direccion)){
			throw new Exception("Introdusca una dirección");				
		}
		
	}
