<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 26/02/14
 * Time: 10:22
 */
namespace bicicleta_solar\Controlador;
require_once __DIR__."/../Modelo/BD/bdReserva.php";
class ControladorClass {

    public static function getReservas(){
       $reservas= bdReserva::getReserva();
}
    public static function introducirReserva($reserva){
        bdReserva::introducirReserva($reserva);
    }
} 