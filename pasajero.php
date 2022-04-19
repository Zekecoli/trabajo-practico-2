<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    public function __construct($nombre,$apellido,$documento,$telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    //getters
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    //setters
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setDocumento($documento){
        $this->documento = $documento;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    //Metodo tostring
    public function __toString()
    {
        return "Nombre: ". $this->getNombre(). " Apellido: ". $this->getApellido(). " dni: ". $this->getDocumento(). " Telefono: ". $this->getTelefono();
    }
}
?>