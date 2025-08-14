<?php 

	function modificacionPersona($nif, $nombre, $direccion){
		global $personas;
		validarModi($nif, $nombre, $direccion);		
		
		// Modificación  de el array con la clave de $nif
		$personas[$nif]['nombre'] = $nombre;
		$personas[$nif]['direccion'] = $direccion;
		
		
	}
    