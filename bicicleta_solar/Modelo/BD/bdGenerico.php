<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 10:13
 */

namespace bicicleta_solar\Modelo\BD;
require_once __DIR__."/../Base/ArbolSolarClass.php";
require_once __DIR__."/../Base/BateriaClass.php";
require_once __DIR__."/../Base/BicicletaClass.php";
require_once __DIR__."/../Base/CentroClass.php";
require_once __DIR__."/../Base/ReservaClass.php";
require_once __DIR__."/../Base/UsuarioClass.php";

use Bicicleta_solar\Modelo\Base\ArbolSolar;
use Bicicleta_solar\Modelo\Base\Bateria;
use Bicicleta_solar\Modelo\Base\Bicicleta;
use Bicicleta_solar\Modelo\Base\Centro;
use Bicicleta_solar\Modelo\Base\Reserva;
use Bicicleta_solar\Modelo\Base\Usuario;

class BdGenerico {

    protected static function abrirConexion(){
        $servidor="localhost";
        $usuario="root";
        $pass="";
        $base_datos="bicicleta_solar";
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
                break;
            case "Reserva":
                while($fila=mysql_fetch_assoc($rs))
                {
                    $centro = new Centro($fila['id_Centro']);
                    $objetos[]=new Reserva($centro,$fila['fecha'],$fila['horaFin'],$fila['horaInicio'],$fila['id_reserva']);
                }
                break;
            case "Centro":
                while($fila=mysql_fetch_assoc($rs))
                {
                    $objetos[]=new Centro($fila['id_centro'],$fila['nombre'],$fila['direccion']);
                }
                break;
            case "Arbol":
                while($fila=mysql_fetch_assoc($rs))
                {
                    $bateria=new Bateria($fila['corriente'],$fila['tension'],$fila['carga']);
                    $centro=new Centro($fila['id_centro']);
                    $objetos[]=new ArbolSolar($fila['id_Arbol_solar'],$centro,$bateria);
                }
                break;
            case "Bici":

                while($fila=mysql_fetch_assoc($rs)){
                    $objetos[]=new Bicicleta($fila['id_bicicleta']);
                }
                break;

        }
        return $objetos;

    }
}
