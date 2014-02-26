<?php
namespace bicicleta_solar\Controlador;
require_once __DIR__."/ControladorClass.php";
use bicicleta_solar\Controlador\Controlador;
        switch($_GET['cod']){
            case 1:
                Controlador::introducirReserva($_POST);
                break;

            case 3:
                   Controlador::logear($_POST);
                break;
    }

?>