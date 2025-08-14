<?php 
    

    function bajaPersona($nif){
        global $personas;
        //validar nif
        if(!array_key_exists($nif, $personas)){
            throw new Exception("Nif no existe");
        }

        //baja de lal persona en el array
        unset($personas[$nif]);
    }