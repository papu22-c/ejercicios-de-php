<?php
function validarFichero($longFichero, $tmpNombre) {
    if (empty($tmpNombre) || !file_exists($tmpNombre)) {
        throw new Exception("Falta el nombre temporal del fichero o no existe");
    }

    if ($longFichero > 20000000) {
        throw new Exception("El fichero excede los 20 MB");
    }

    $mime = $_FILES['fichero']['type'] ?? '';
    if (stripos($mime, 'pdf') === false) {
        throw new Exception("Solo se permiten ficheros PDF");
    }

    return true;
}
