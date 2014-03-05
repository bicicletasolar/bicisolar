<?php

namespace bicicleta_solar\Controlador;
require_once __DIR__."/../Modelo/BD/bdReserva.php";
require_once __DIR__."/../Modelo/BD/bdCentro.php";
require_once __DIR__."/../Modelo/BD/bdUsuario.php";
require_once __DIR__."/../Modelo/Base/ReservaClass.php";
require_once __DIR__."/../Modelo/Base/CentroClass.php";
require_once __DIR__."/../Modelo/Base/UsuarioClass.php";

use Bicicleta_solar\Modelo\Base;
use bicicleta_solar\Modelo\BD;

class Controlador{

    public static function getTodasReservas(){
        //BD\bdReserva::
    }

    public static function logear($post)
    {
        $usu=new Base\Usuario();
        $usu->setDni($post['dni']);
        $usu->setPassword($post['contrasena']);

        $usuario=BD\bdUsuario::logear($usu);

        if(is_a($usuario,"bicicleta_solar\Modelo\Base\Usuario"))
        {
            session_start();
            ob_start();
            $_SESSION['persona']=serialize($usuario);
            ob_clean();

            header('Location:../Vista/reservas.php');
            exit;

        }
        else
        {
            header('Location:../Vista/reservas.php?men='.$usuario);
            //enviar a pantalla inicial

        }


    }

    public static function sacarCentros()
    {
        $centros=BD\bdCentro::dameCentros();
        return $centros;
    }


}

?>