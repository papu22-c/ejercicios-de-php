<?php

function validar_datos($nombre, $email, $mensaje, $telefono) {
    // Validar que el nombre no esté vacío y contenga solo letras
    if (!preg_match('/^[\p{L} ]+$/u', $nombre)) {
        throw new Exception("Introduzca un nombre válido");
    }

    // Validar que el email no esté vacío y tenga un formato correcto
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Introduzca un correo válido");
    }

    if (!preg_match('/^\d{9}$/', $telefono)) {
        throw new Exception("Introdusca un  número válido");
    }

    // Validar que el mensaje no esté vacío
    if (empty($mensaje) ) {
        throw new Exception("Escriba un mensaje");
    }

    // Validar que el mensaje no sea demasiado largo
    if (strlen($mensaje) > 400) {
        throw new Exception("El mensaje es demasiado largo");
    }
}
