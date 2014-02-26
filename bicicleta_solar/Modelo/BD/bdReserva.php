<?php

namespace Bicicleta_solar\Modelo\BaseDatos;
require_once __DIR__."/../Base/ReservaClass.php";
use bicicleta_solar\Modelo\Base;

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

    public static function introducirReserva($reserva)
    {
        $conexion=parent::abrirConexion();

        $query = "insert into reserva values(0,'".$reserva->getCentro()."','".$reserva->getEstado()."','".$reserva->getFechaFin()."')";

        try
        {
            $res = mysql_query($query, $conexion);
            if (!$res) {
                $errno = mysql_errno($conexion);
                $error = mysql_error($conexion);

                switch ($errno) {
                    default:
                        throw new MySQLException($error, $errno);
                        break;
                }
            }
        }
        catch (MySQLException $e) {
            echo "Error.Codigo: ".$e->getCode()."\n Mensaje: ".$e->getMessage();
            parent::cerrarConexion($conexion);
        }

        parent::cerrarConexion($conexion);
    }
}
?>
