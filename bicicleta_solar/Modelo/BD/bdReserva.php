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

        $query="Select * from usuario where id_usuario=(Select id_Usuario from reserva where id_reserva ='".$reserva->getIdReserva()."')";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        if(mysql_affected_rows($query) == 1)
        {
            $fila = mysql_fetch_assoc($rs);
            $usuario = new Usuario($fila['nombre']);
        }

        parent:: cerrarConexion($conexion);

        return $usuario;
    }

    public static function getCentro(Reserva $reserva)
    {
        $conexion=parent::abrirConexion();

        $query="Select * from centro where id_centro=(Select id_Centro from reserva where id_reserva ='".$reserva->getIdReserva()."')";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        if(mysql_affected_rows($query) == 1)
        {
            $fila = mysql_fetch_assoc($rs);
            $centro = new Centro($fila['id_centro'],$fila['nombre'],$fila['direccion']);
        }

        parent:: cerrarConexion($conexion);

        return $centro;
    }

    public static function introducirReserva($reserva)
    {
        $conexion=parent::abrirConexion();
        mysql_query("START TRANSACTION");

        $query = "insert into reserva values(0,'".$reserva->getFechaInicio()."','".$reserva->getFechaFin()."','".$reserva->getHoraInicio()."','".$reserva->getHoraFin()."','".$reserva->getEstado()."','".$reserva->getUsuario()->getIdUsuario()."','".$reserva->getCentro()->getIdCentro()."')";

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
            mysql_query("ROLLBACK");
            parent::cerrarConexion($conexion);
        }

        mysql_query("COMMIT");

        parent::cerrarConexion($conexion);
    }
}
?>

