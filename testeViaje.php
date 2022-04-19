<?php
include "viaje.php";
include "pasajero.php";
include "responsableV.php";

//El menu me quedo un poquito grande, agrandar la terminal

$objPasajero = new Pasajero("JUAN","ZAPATA",45987237,4891234);
$objPasajero2 = new Pasajero("PABLO","GONZALES",22428491,4890987);

$objResponsable = new Responsable(59,23482349,"MARTIN","RODRIGUEZ");
$objViaje = new viajes("san martin",6,4431,$objPasajero,$objResponsable);
$objViaje->agregarPasajero($objPasajero2);

$p = $objViaje->getObjPasajeros();
//print_r($p);

do {    
    $limite = count($objViaje->getObjPasajeros());
    //El echo va a imorimir en pantalla los datos del viaje como el codigo, destino y el total de los pasajeros
    echo $objViaje;//
    
    echo "\n__MENU__ \nIngrese la opcion quiera realizar: \n1 _ Registrar un nuevo pasajero \n2 _ Modificar datos del viaje \n3 _ Ver los datos de los pasajeros \n4 _ Ver datos del responsable \n5 _ Salir \nOPCION: ";
    $operando = trim(fgets(STDIN));

    switch ($operando) {
        //Agregar y verificacion de un pasajero
        case 1:

            if (count($objViaje->getObjPasajeros()) ==  $objViaje->getCantidadMax()) { //L
                echo "\nLimite de pasajeros alcanzados.";
            }
            else{
                echo "Ingrese el nombre del pasajero: ";
                $nombre = strtoupper(trim(fgets(STDIN)));
                echo "Ingrese el apellido del pasajero: ";
                $apellido = strtoupper(trim(fgets(STDIN)));
                echo "Ingrese el DNI: ";
                $dni = trim(fgets(STDIN));
                echo "Ingrese el telefono: ";
                $telefono = trim(fgets(STDIN));
                $objPasajero3 = new Pasajero($nombre,$apellido,$dni,$telefono);
                $registrado = $objViaje->agregarPasajero($objPasajero3);
                //la variable $registrado tira un mensaje de si el pasajero esta registrado o no
                echo $registrado;
            }
            
        break;
        //Modificar los datos del viaje y sus pasajeros
        case 2:
            do {
                echo "\nElija la opcion que quiera modificar: \n1 _ Codigo \n2 _ Cantidad maxima de pasajeros \n3 _ Destino \n4 _ Datos de un pasajero \n5 _ Eliminar un pasajero \n6 _ Cambiar datos del responsable \nOPCION: ";
                $opcion = trim(fgets(STDIN));
                switch ($opcion) {
                    case 1:
                        echo "Ingrese el nuevo codigo(solo numeros): ";
                        $newCodigo = trim(fgets(STDIN));
                        $objViaje->setCodigo($newCodigo);
                    break;
                    
                    case 2:
                        echo "Ingrese la nueva cantidad maxima de pasajeros: ";
                        $newCantidadMax = trim(fgets(STDIN));
                        $objViaje->setCantidadMaxima($newCantidadMax);
                    break;

                    case 3:
                        echo "Ingrese el nuevo destino: ";
                        $newDestino = strtoupper(trim(fgets(STDIN)));
                        $objViaje->setDestino($newDestino);
                    break;

                    case 4:
                        echo "Ingrese el numero del pasajero que quiera cambiar los datos(". $limite."/".$objViaje->getCantidadMax()."): ";
                        $pasajero = trim(fgets(STDIN));
                        echo "Ingrese el nombre del pasajero: ";
                        $cambioNombre = strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese el Apellido del pasajero: ";
                        $cambioApellido = strtoupper(trim(fgets(STDIN)));
                        echo "Ingrese el DNI: ";
                        $cambioDNI = trim(fgets(STDIN));
                        echo "Ingrese el telefono: ";
                        $nuevoTelefono = trim(fgets(STDIN));
                        $pasajeroModificado = new Pasajero($cambioNombre,$cambioApellido,$cambioDNI,$nuevoTelefono);
                        $objViaje->cambiarDatos($pasajero,$pasajeroModificado);
                    break;
                    case 5:
                        echo "Ingrese el numero del pasajero que quiera eliminar(". $limite."/".$objViaje->getCantidadMax()."): ";
                        $pasajero = trim(fgets(STDIN));
                        $verificacion = $objViaje->eliminarPasajero($pasajero);
                        echo $verificacion;
                    break;
                    case 6:
                        "Ingrese el nombre del responsable: ";
                        $newNombre = strtoupper(trim(fgets(STDIN)));
                        "Ingrese el apellido: ";
                        $newApellido = strtoupper(trim(fgets(STDIN)));
                        "Ingrese el numero de empleado: ";
                        $newNumeroEmpleado = trim(fgets(STDIN));
                        "Ingrese el numero de licencia del empleado: ";
                        $newLicencia = trim(fgets(STDIN));
                        $ResponsableCambiado = new Responsable($newNumeroEmpleado,$newLicencia,$newNombre,$newApellido);
                        $objViaje->setObjResponsable($ResponsableCambiado);
                        echo "Se han cambiado los datos del responsable.";
                    break;
                }
                echo "\n¿Desea realizar otra operacion?(S/N): ";
                $a = strtoupper(trim(fgets(STDIN)));
            } while ($a == "S");
        break;
        //ver los datos de un pasajero
        case 3:
            do {
                echo "\nElija el numero del pasajero(". $limite."/".$objViaje->getCantidadMax()."): ";
            $numero = trim(fgets(STDIN));
            if ($numero > $limite) {
                echo "Aun no se ha registrado el numero de ese pasajero";
            }
            else{
                $numero = $numero - 1;
                $datos = $objViaje->datosPasajero($numero);
                echo $datos;
            }

                echo "\n¿Desea ver los datos de otro pasajero?(S/N): ";
                $e = strtoupper(trim(fgets(STDIN)));
            } while ($e == "S");
        break;
        //Ver datos del responsable
        case 4:
            $datosResponsable = $objViaje->datosResponsable();
            echo "Los datos del responsable son: ".  $datosResponsable;
        break;
        case 5:
            echo "Fin del programa";
        break;
    
    }
} while ($operando != 5 );

?>