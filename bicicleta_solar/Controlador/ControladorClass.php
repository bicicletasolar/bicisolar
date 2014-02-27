<?php

namespace bicicleta_solar\Controlador;
require_once __DIR__."/../Modelo/BD/bdReserva.php";
require_once __DIR__."/../Modelo/BD/bdUsuario.php";
require_once __DIR__."/../Modelo/Base/ReservaClass.php";
require_once __DIR__."/../Modelo/Base/CentroClass.php";
use Bicicleta_solar\Modelo\Base\Reserva;
use bicicleta_solar\Modelo\BD;

class Controlador{

    public static function getReservas(){
       $reservas= BD\bdReserva::getReservas();

        return $reservas;
}
    public static function introducirReserva($datos){
        $reserva=new Reserva();
        $reserva->setFechaInicio($datos['fechaInicio']);
        $reserva->setFechaFin($datos['fechaFin']);
        $reserva->setHoraInicio($datos['horaInicio']);
        $reserva->setHoraFin($datos['horaFin']);
        $centro=new Centro();
        $centro->setNombre($datos['centro']);
        $reserva->setCentro($centro);
        $usuario=unserialize($_SESSION['persona']);
        $reserva->setUsuario($usuario);
        BD\bdReserva::introducirReserva($reserva);
    }

    public static function logear($post)
    {
        echo "llega";
        //$usuario=BD\bdUsuario::logear($_POST);
    }
}

?>