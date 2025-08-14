<?php

function validarNifDuplicado($nif){
    // Incorporamos a la funcion al array global $personas
    global $personas;
    
    // Validamos si el NIF ya existe en el array
    if (array_key_exists($nif, $personas)) {
        throw new Exception("El NIF ya existe");
    }  
}

function validarNifexiste($nif){
    Global $personas;
    if (!array_key_exists($nif, $personas)) {
        throw new Exception("El nie no existet");
    }
}