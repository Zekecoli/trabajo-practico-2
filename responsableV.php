<?php
class Responsable{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleado,$numLicencia,$nombre,$apellido){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //getters
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }

    public function getNumLicencia(){
        return $this->numLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    //setters
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    public function setNumLIcencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //Metodo tostring
    public function __toString()
    {
        return "Numero de empleado: ". $this->getNumEmpleado(). " Numero de licencia: ". $this->getNumLicencia(). " Nombre y apellido: ". $this->getNombre(). $this->getApellido();
    }
}
?>