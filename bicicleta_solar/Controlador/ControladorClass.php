<?php

namespace bicicleta_solar\Controlador;
require_once __DIR__."/../Modelo/BD/bdReserva.php";
require_once __DIR__."/../Modelo/BD/bdUsuario.php";

use bicicleta_solar\Modelo\BD;

class Controlador{

    public static function getReservas(){
       $reservas= BD\bdReserva::getReservas();

        return $reservas;
}
    public static function introducirReserva($datos){
        BD\bdReserva::introducirReserva($datos);
    }

    public static function logear($_POST)
    {
echo "llega";
        //$usuario=BD\bdUsuario::logear($_POST);
    }
}

?>