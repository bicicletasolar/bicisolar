<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 10:13
 */

namespace Bicicleta_solar\Modelo\BaseDatos;

use Bicicleta_solar\Modelo\Base\Reserva;
use Bicicleta_solar\Modelo\Base\Usuario;

class BdGenerico {

    protected static function abrirConexion(){
        $servidor="localhost";
        $usuario="root";
        $pass="";
        $base_datos="bicileta_solar";
        $conexion=mysql_connect($servidor,$usuario,$pass);
        mysql_select_db($base_datos,$conexion);
        return $conexion;

    }
    protected static function cerrarConexion($conexion){
        mysql_close($conexion);
    }


    protected static function convertirArrays($rs,$clase){
        $objetos=array();

        switch($clase){
            case "Usuario":
                while($fila=mysql_fetch_assoc($rs))
                {
                    $objetos[]=new Usuario($fila['nombre']);
                }
            case "Reserva":
                while($fila=mysql_fetch_assoc($rs))
                {
                    $objetos[]=new Reserva($fila['centro'],$fila['estado'],$fila['fechaFin'],$fila['fechaInicio'],$fila['horaFin'],$fila['horaInicio']);
                }



        }
        return $objetos;

    }
} 