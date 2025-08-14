<?php
require_once './traits/GuardarFichero.php';
final class EmpleadoFijo extends Empleados {
    use empleados\traits\GuardarFichero;
    private $añoAlta;
  
    // Constructor
    public function __construct(string $nif, string $nombre, string $apellido, string $departamento, int $añoAlta, ) {
        //delegamos al contructor de la clase padre
        parent::__construct($nif, $nombre, $apellido, $departamento); 
        $this->setañoAlta($añoAlta);
        $this->altaEmpleado();
    }
    public function setAñoAlta(int $añoAlta):void{
        if(empty($añoAlta)){
            throw new Exception("Introdusca el año de alta");      
        }
        $this->añoAlta = $añoAlta;
    }
    public function getAñoAlta(){
        return $this->añoAlta;
    }
    
    // Método obligatorio heredado
    public function calcularSueldo():string {
        $nomina = self::BASE * 1;
        return "Nomina: $nomina";
    }
    // Ampliamos la funcion padre, verdDatos
    public function verDatos():string {
        $empleado = parent::verDatos();
    return "$empleado; | $this->añoAlta";
    }
    protected function altaEmpleado():void{
    $datosEmpleadosCsv = parent::datosEmpleadosCsv();
    $datosAñoCsv = "Empleado Fijo;$datosEmpleadosCsv;{$this->añoAlta}";
    // Guardar el empleado en el fichero
    $this->guardar($datosAñoCsv);
    }

}
