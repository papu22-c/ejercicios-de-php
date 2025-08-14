<?php
abstract class Administracion {
    public static function consultaEmpleados(): array {
        $empleados = [];

        $fichero = fopen("./ficheros/empleados.csv", "r");

       while (!feof($fichero)) {
            $empleado = fgetcsv($fichero, 0, ';');

            if ($empleado !== false && count($empleado) > 1) {
                $empleados[] = $empleado;
            }
        }

        fclose($fichero);
        return $empleados;
    }
}





