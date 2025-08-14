<?php
require_once './traits/GuardarFichero.php';
final class EmpleadoTemporal extends Empleados {
    
    use empleados\traits\GuardarFichero;
    // Atributo específico de esta clase
    private $inicioContrato;
    private $finContrato;
    
    // Constructor
    public function __construct(string $nif, string $nombre, string $apellido, string $departamento, string $inicioContrato, string $finContrato) {    
        
        // Agregamos valores de los atributo especifico de la clase hija
        $this->setInicioContrato($inicioContrato); 
        $this->setFinContrato($finContrato);    
        //delegamos al contructor de la clase padre
        parent::__construct($nif, $nombre, $apellido, $departamento); 
        $this->altaEmpleado();

        
    }
     // Getter básico para informar
    public function getInicioContrato() {
        return $this->inicioContrato;
    }
    public function getFinContrato() {
        return $this->finContrato;
    }
    // Funcion para modificar los atributos 
    public function setInicioContrato($inicioContrato) {
        if (empty($inicioContrato)) {
            throw new Exception("Introdusca una fecha válidad");
        }
        $this->inicioContrato = $inicioContrato;
    }
    public function setFinContrato($finContrato) {
        if (empty($finContrato)) {
        throw new Exception("introdusca fecha de final de contrato");
        }
        $this->finContrato = $finContrato;
    }
    // Método obligatorio heredado
    public function calcularSueldo() {
        $nomina = self::BASE +(self::BASE/160)* 80;
        return "Nomina: $nomina";
    }
    // Ampliamos la funcion padre, verdDatos
    public function verDatos():string{
        $empleado = parent::verDatos();
    return "$empleado | Fecha de inicio:  $this->inicioContrato | Fecha de fina: $this->finContrato";
    }
    protected function altaEmpleado():void{
        $datosEmpleadosCsv = parent::datosEmpleadosCsv();
        $datosTemporalCsv = "Empleado Temporal;$datosEmpleadosCsv;{$this->inicioContrato};{$this->finContrato}";
        // Guardar el empleado en el fichero
        $this->guardar($datosTemporalCsv);
    }

}
