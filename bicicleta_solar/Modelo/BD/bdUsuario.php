<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 10:22
 */

namespace bicicleta_solar\Modelo\BD;
require_once __DIR__."/../Base/UsuarioClass.php";
use bicicleta_solar\Modelo\Base;


class bdUsuario extends bdGenerico{
    public static function logear(Usuario $usuario){
        $conexion=parent::abrirConexion();
        $query="select * from usaurio where user ='".$usuario->getNombre()."' and password ='".$usuario->getPassword()."'";
        $rs=mysql_query($query,$conexion);
        if(mysql_affected_rows($rs)==1){

        }
    }
} 