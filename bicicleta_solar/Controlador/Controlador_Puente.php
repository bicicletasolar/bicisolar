<?php
namespace bicicleta_solar\Controlador;
require_once __DIR__."/ControladorClass.php";
use bicicleta_solar\Controlador;
    if(isset($_POST['enviar'])){
        switch($_GET['cod']){
            case 1:
                Controlador::introducirReserva($_POST);
        }
    }

?>