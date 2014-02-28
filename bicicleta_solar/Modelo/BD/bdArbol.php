<?php
/**
 * User: Jon Ander Fernandez
 * Date: 28/02/14
 * Time: 11:37
 * To change this template use File | Settings | File Templates.
 */

namespace bicicleta_solar\Modelo\BD;


use Bicicleta_solar\Modelo\Base\ArbolSolar;
use Bicicleta_solar\Modelo\Base\Centro;

class bdArbol extends BdGenerico{

    public static function getCentro(ArbolSolar $arbol)
    {
        $conexion=parent::abrirConexion();

        $query="";

        $rs = mysql_query($query,$conexion) or die(mysql_error());

        if(mysql_affected_rows($query) == 1)
        {
            $fila = mysql_fetch_assoc($rs);
            $centro = new Centro();
        }

        parent:: cerrarConexion($conexion);

        return $centro;
    }
}