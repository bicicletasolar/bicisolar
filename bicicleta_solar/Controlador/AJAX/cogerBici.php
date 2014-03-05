<?php
require_once __DIR__.'/../../Modelo/BD/bdCentro.php';
use bicicleta_solar\Modelo\BD\bdCentro;

$centro = $_POST['centro'];

$bici = bdCentro::getBicis($centro);

$bici = json_encode($bici);

echo $bici;