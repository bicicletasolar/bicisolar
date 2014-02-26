<?php

namespace bicicleta_solar\Modelo\BD;
require_once __DIR__."/../Base/ReservaClass.php";
require_once __DIR__."/bdGenerico.php";
use bicicleta_solar\Modelo\Base;
use Bicicleta_solar\Modelo\Base\Reserva;

class bdReserva extends bdGenerico{

    public static function getReservas() // Metodo para recoger todas las reservas realizadas
    {
        $conexion=parent::abrirConexion();

        $query="Select * from reserva";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        $reservas = parent::convertirArrays($rs, "Reserva");

        parent:: cerrarConexion($conexion);

        return $reservas;

    }

    public static function getUsuario(Reserva $reserva)
    {
        $conexion=parent::abrirConexion();

        $query="Select * from usuario where id_usuario=(Select id_usuario from reserva where id_reserva ='".$reserva->getIdReserva()."')";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        $usuario = parent::convertirArrays($rs, "Usuario");

        parent:: cerrarConexion($conexion);

        return $usuario;
    }

    public static function getCentro(Reserva $reserva)
    {
        $conexion=parent::abrirConexion();

        $query="Select * from centro where id_centro=(Select id_centro from reserva where id_centro ='".$reserva->getIdReserva()."')";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        $usuario = parent::convertirArrays($rs, "Centro");

        parent:: cerrarConexion($conexion);

        return $usuario;
    }

    public static function introducirReserva($reserva)
    {
        $conexion=parent::abrirConexion();

        $query = "insert into reserva values(0,'".$reserva->getCentro()."','".$reserva->getEstado()."','".$reserva->getFechaFin()."','".$reserva->getFechaInicio()."','".$reserva->getHoraFin()."','".$reserva->getHoraInicio()."')";

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
