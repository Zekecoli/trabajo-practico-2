<?php
    class viajes{
        private $destino;
        private $cantidadMax;
        private $codigo;
        private $objArrayPasajeros = [];
        private $objResponsable;

        public function __construct($destino,$cantidadMax,$codigo,$objArrayPasajeros,$objResponsable){
            $this->destino = $destino;
            $this->cantidadMax = $cantidadMax;
            $this->codigo = $codigo;
            array_push($this->objArrayPasajeros,$objArrayPasajeros);
            $this->objResponsable = $objResponsable;
        }

        //Metodos getter
        //obteneter el valor de los atributos

        public function getDestino(){
            return $this->destino;
        }

        public function getCantidadMax(){
            return $this->cantidadMax;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function getObjPasajeros(){
            return $this->objArrayPasajeros;
        }

        public function getObjResponsable(){
            return $this->objResponsable;
        }

        //Metodos setter
        //settear/colocar/cambiar el valor de los atributos

        public function setDestino($destino){
            $this->destino = $destino;
        }

        public function setCantidadMaxima($maxima){
            $this->cantidadMax = $maxima;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function setObjPasajeros($ArrayPasajeros){
            $this->objArrayPasajeros = $ArrayPasajeros;
        }

        public function setObjResponsable($resposable){
            $this->objResponsable = $resposable;
        }

        //Metodo para agregar a un pasajero y vereficar si no esta anotado 
        public function agregarPasajero($newPasajero){
            $verificacion = "";
            foreach ($this->getObjPasajeros() as $key => $value) {
                if ($newPasajero->getDocumento() == $value->getDocumento()) {
                    $verificacion = "\nEl pasajero que quiere anotar ya esta registrado.";
                }
            }
           if ($verificacion == "") {
               $nuevaArray = $this->getObjPasajeros();
               array_push($nuevaArray,$newPasajero);
               $this->setObjPasajeros($nuevaArray);
               $verificacion = "\nregistrado.";
           }

           return $verificacion;
        }

        //Metodo para cambiar los datos de una persona
        public function cambiarDatos($valor,$cambioDatos){
            $arrayModificado = $this->getObjPasajeros();
            $valor = $valor - 1;
            $arrayModificado[$valor] = $cambioDatos;
            $this->setObjPasajeros($arrayModificado);
        }

        //Metodo para eliminar a un pasajero
        public function eliminarPasajero($valor){
            $arrayModificada = [];
            $verificacion = "";
            if (count($this->getObjPasajeros()) < $valor) {
                $verificacion = "El numero ingresado no coicide con ningun pasajero.";
            }else {
                $valor = $valor - 1;
                foreach ($this->getObjPasajeros() as $key => $value) {
                    if ($valor != $key) {
                        array_push($arrayModificada, $this->getObjPasajeros()[$key]);
                        $this->setObjPasajeros($arrayModificada);
                        $verificacion = "El pasajero se ha eliminado.";
                    }
                }
            }
            return $verificacion;
        }

        //Metodo para saber los datos del pasajero seleccionado
        public function datosPasajero($valor){
            $pasajero = "";
            foreach ($this->getObjPasajeros() as $key => $value) {
                if ($key == $valor) {
                    $pasajero = "Nombre: ". $value->getNombre(). "\nApellido: ". $value->getApellido(). "\nDNI: ". $value->getDocumento(). "\nTelefono: ". $value->getTelefono();
                }
            }
            return $pasajero;
        }


        //Metodo para saber los datos del responsable del viaje
        public function datosResponsable(){
            $nombreResponsable = $this->getObjResponsable()->getNombre();
            $apellidoResponsable = $this->getObjResponsable()->getApellido();
            $numEmpleado = $this->getObjResponsable()->getNumEmpleado();
            $numLicencia = $this->getObjResponsable()-> getNumLicencia();
            $datos = "\nNombre: ". $nombreResponsable. "\nApellido: ". $apellidoResponsable. "\nNumero de empleado: ". $numEmpleado. "\nNumero de licencia: ". $numLicencia;
            return $datos;
        }
        //Metodo tostring
        public function __toString()
        {
            $encargado = $this->getObjResponsable();
            return "\nDatos el viaje: \nCodigo del viaje: ". $this->getCodigo(). "\nDestino: ". $this->getDestino(). "\nNumero de pasajeros: ". count($this->getObjPasajeros())."/". $this->getCantidadMax(). "\nResponsable: ". $encargado->getNombre()."\n";
        }
    }

?>