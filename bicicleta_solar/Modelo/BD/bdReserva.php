<?php

namespace Bicicleta_solar\Modelo\BaseDatos;
require_once __DIR__."/../Base/ReservaClass.php";
use Bicicleta_solar\Modelo\Base;

class bdReserva extends bdGenerico{

    public static function getReserva()
    {
        $conexion=parent::abrirConexion();

        $query="Select * from reserva";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        $reservas = parent::convertirArrays($rs, "Reserva");

        parent:: cerrarConexion($conexion);

        return $reservas;

    }
}
?>
