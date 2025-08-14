<?php
abstract class Empleados {
    public const BASE = 1091.13;
    // Atributos / Propiedades
    private $nif;
    private $nombre;
    private $edad;
    private $departamento;
    

    // Método abstracto que deben implementar las subclases
    public abstract function calcularSueldo();
    
    

    // Constructor
    public function __construct(string $nif, string $nombre, int $edad, string $departamento) {
        $this->setNombre($nombre);
        $this->setNif($nif);
        $this->setEdad($edad);
        $this->setDepartamento($departamento);               
    }
    // Setters
    // Funciones para modificar los atributos privados
    public function setNombre(string $nombre):void { 
        if (empty($nombre)){
            throw new Exception("El nombre es obligatorio");
        }    
        $this->nombre = $nombre;
    }
    public function setNif(string $nif):void{
        if(empty($nif)){
            throw new Exception("El NIF es obligatorio");            
        }
        $this->nif = $nif; 
    }
    public function setEdad(int $edad):void{
        if(empty($edad)){
            throw new Exception("La edad es obligatorio");
        }
        $this->edad = $edad; 
    }
    public function setDepartamento(string $departamento):void{
        $this->departamento = $departamento; 
    }  
    // Getters
    // Funciones para devolver el valor actual
    public function getNombre():string{ 
        return $this->nombre; 
    }
    public function getNif():string{
        return $this->nif;    
    }
    public function getedad():string{
        return $this->edad;
    }
    public function getDepartamento():string{
        return $this->departamento;
    }
    // Función para mostrar datos
    protected function verDatos():string{
        return "Datos: $this->nombre | $this->nif | $this->edad | $this->departamento";
    }
    protected function datosEmpleadosCsv():string {
        return"{$this->nif};{$this->nombre};{$this->edad};{$this->departamento}";
    }


}
