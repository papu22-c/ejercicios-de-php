<?php 
    
    function altaPersona($nif, $nombre, $direccion){
        global $personas;
        
        validarDatos($nif, $nombre, $direccion);

        validarNifDuplicado($nif);

        // alta persona  en el array con la clave $nif
        $personas[$nif]['nombre'] = $nombre;
        $personas[$nif]['direccion'] = $direccion;
    }
    
    