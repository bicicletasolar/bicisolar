<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 10:22
 */

namespace bicicleta_solar\Modelo\BD;
require_once __DIR__."/../Base/UsuarioClass.php";
use bicicleta_solar\Modelo\Base\Usuario;


class bdUsuario extends bdGenerico{
    public static function logear(Usuario $usuario){
        $conexion=parent::abrirConexion();
        $query="select * from usuario where dni ='".$usuario->getDni()."'and password ='".$usuario->getPassword()."'";

        $rs=mysql_query($query);

        if(mysql_affected_rows($conexion) == 1){
            $fila = mysql_fetch_assoc($rs);

            $usuario->setDni($fila['dni']);
            $usuario->setNombre($fila['nombre']);
            $usuario->setIdUsuario($fila['id_usuario']);
            $usuario->setPassword($fila['password']);
        }
        else{
            $fila = mysql_fetch_assoc($rs);
            echo "hola".$fila['nombre'];
            echo" no encuantra";
        }

        parent::cerrarConexion($conexion);
        var_dump($usuario);
        die();
        return $usuario;
    }
} 