<?php
require_once __DIR__.'/../ControladorClass.php';
use bicicleta_solar\Controlador\Controlador;

$centro = $_POST['centro'];

$bici = Controlador::cogerBicicleta($centro);

$bici = json_encode($bici);

echo $bici;