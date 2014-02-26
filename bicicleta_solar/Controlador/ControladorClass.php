<?php

namespace bicicleta_solar\Controlador;
require_once __DIR__."/../Modelo/BD/bdReserva.php";
use bicicleta_solar\Modelo\BD\bdReserva;
class Controlador{

    public static function getReservas(){
       $reservas= bdReserva::getReservas();

        return $reservas;
}
    public static function introducirReserva($datos){
        bdReserva::introducirReserva($datos);
    }
}

?>