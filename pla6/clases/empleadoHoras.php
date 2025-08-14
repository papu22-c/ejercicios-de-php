<?php
require_once './traits/GuardarFichero.php';
final class empleadoHoras extends Empleados {
    use empleados\traits\GuardarFichero;

    private $horas;

    // Constructor
    public function __construct(string $nif, string $nombre, string $apellido, string $departamento, int $horas) {
        try {
            // delegación de los setters de la sub clase
            $this->setHoras($horas);
            // Delegamos al contructor de la clase padre "Superclase"
            parent::__construct($nif, $nombre, $apellido, $departamento); 
            // Guardamos los datos del empleado
            $this->altaEmpleado();

        } catch (Exception $e) {
            throw new Exception("Empleado Horas".$e->getMessage());
        }
    }
    // devolvemos el valor
    public function gethoras():int{
        return $this->horas;
    }
    public function setHoras($horas) {
        if(empty($horas)){
            throw new Exception("Introdusca las horas");
        }
        $this->horas = $horas;
    }
    // Método obligatorio heredado
    public function calcularSueldo() {
        $nomina = self::BASE +(self::BASE/160)* $this->horas;
        return "Nomina: $nomina";
    }
    // Ampliamos la funcion padre, verdDatos
    public function verDatos():string {
        $empleado = parent::verDatos();
    return "$empleado; | $this->horas" ;
    }
    protected function datosHorasCsv():string {
        return"{$this->horas}";
        
    }
    protected function altaEmpleado():void{
        $datosEmpleadosCsv = parent::datosEmpleadosCsv();
        $datosHorasCsv = "Empleado Horas;$datosEmpleadosCsv;{$this->horas}";
        // Guardar el empleado en el fichero
        $this->guardar($datosHorasCsv);
    }
}

