<?php
// verifica que el nif no se duplique
    function validarNifDuplicado($nif){

        global $personas;

        if(array_key_exists($nif, $personas)){
            throw new Exception("El nif existe");

        }
    }

// verifica que el nif exista
    function validarNifExiste($nif){
        
        global $personas;

        if(!array_key_exists($nif, $personas)){
            throw new Exception("El nif no esiste");
            
        }
    }