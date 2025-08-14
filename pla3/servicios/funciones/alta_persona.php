<?php
function alta_persona($nif, $nombre, $direccion){
    global $personas; 
    validarDatos($nif, $nombre, $direccion);

    validarNifDuplicado($nif);
    // Agrega al array de persona con el nif como key
    $personas[$nif]['nombre'] = $nombre;
    $personas[$nif]['direccion'] = $direccion;
   
}

