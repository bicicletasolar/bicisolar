<?php

namespace bicicleta_solar\Modelo\BD;
require_once __DIR__."/../Base/ReservaClass.php";
require_once __DIR__."/bdGenerico.php";
require_once __DIR__."/../Base/UsuarioClass.php";
require_once __DIR__."/../Base/BicicletaClass.php";
use bicicleta_solar\Modelo\Base;
use Bicicleta_solar\Modelo\Base\Bateria;
use Bicicleta_solar\Modelo\Base\Bicicleta;
use Bicicleta_solar\Modelo\Base\Reserva;
use Bicicleta_solar\Modelo\Base\Usuario;

class bdReserva extends bdGenerico{

    public static function getReservas($bici) // Metodo para recoger todas las reservas realizadas
    {
        $conexion=parent::abrirConexion();

        $query="Select * from reserva where id_bicicleta='".$bici->getIdBicicleta();"' ";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        $reservas = parent::convertirArrays($rs, "Reserva");

        parent:: cerrarConexion($conexion);

        return $reservas;

    }
    public static function getReservas2($centro,$bici) // Metodo para recoger todas las reservas realizadas
    {
        $conexion=parent::abrirConexion();

        $query="Select * from reserva where id_bicicleta=".$bici." and id_Centro=".$centro."";

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

    public static function introducirReserva($reserva,Usuario $usuario)
    {
        $fecha = date("Y-m-d",$reserva->fecha);

        $conexion=parent::abrirConexion();
        mysql_query("START TRANSACTION");
        $query = "Insert into reserva values(0,'".$fecha."',".$reserva->horaInicio.",".$reserva->horaFinal.",".$usuario->getIdUsuario().",".$reserva->centro.",".$reserva->bici.")";

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
            $men = "Error.Codigo: ".$e->getCode()."\n Mensaje: ".$e->getMessage();
            mysql_query("ROLLBACK");
            parent::cerrarConexion($conexion);

            return $men;
        }

        mysql_query("COMMIT");

        parent::cerrarConexion($conexion);

        return 1;
    }

    public static function getBicicleta(Reserva $reserva)
    {
        $conexion=parent::abrirConexion();

        $query="Select * from bicicleta where id_bicicleta=(Select id_bicicleta from reserva where id_bicicleta ='".$reserva->getBicicleta()."')";
//Comprobar Query
        $rs = mysql_query($query,$conexion) or die(mysql_error());

        if(mysql_affected_rows($query) == 1)
        {
            $fila = mysql_fetch_assoc($rs);
            $bateria = new Bateria();
            $bicicleta = new Bicicleta($fila['id'],$bateria); // FALLA CONSTRUCTOR
        }

        parent:: cerrarConexion($conexion);

        return $bicicleta;
    }


    public static function mirarDisponibilidad($bici){
        $conexion=parent::abrirConexion();
        $query="select * from reserva where id_Centro='".$bici->getCentro()->getIdCentro()."'";
    }
}
?>

