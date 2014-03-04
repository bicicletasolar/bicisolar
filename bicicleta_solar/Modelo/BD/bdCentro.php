<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 4/03/14
 * Time: 9:47
 */

namespace bicicleta_solar\Modelo\BD;

require_once __DIR__."/../Base/CentroClass.php";
use Bicicleta_solar\Modelo\Base;

class bdCentro extends bdGenerico{

    public static function dameCentros()
    {

        $conexion=parent::abrirConexion();

        $query="Select * from centro";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        $centros=parent::convertirArrays($rs,"Centro");

        parent:: cerrarConexion($conexion);

        return $centros;
    }

} 