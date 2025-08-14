<?php
namespace empleados\traits;
trait GuardarFichero{
    public function guardar(string $csv):void{

        // Elimina el cache del servidor (impresindible para obtener  el tamaño del archivo.)
        clearstatcache();
        // btener el tamaño del archivo.
        $long = filesize("ficheros/empleados.csv");
        // Abrir el archivo en modo escritura. ("a")
        $fichero = fopen("ficheros/empleados.csv",  "a");
        // Si el archivo está vacio escribimos sin el salto de linea.
        $long == 0 ? fwrite($fichero, $csv) : fwrite($fichero, "\n$csv");

        //cerrar fichero para liberar recursos.
        fclose($fichero);

    }
}