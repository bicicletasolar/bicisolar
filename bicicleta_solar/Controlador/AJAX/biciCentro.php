<?php

require_once __DIR__.'/../../Modelo/BD/bdReserva.php';
use bicicleta_solar\Modelo\BD;

$centro = $_POST['centro'];
$bici = $_POST['bici'];

$reservas = BD\bdReserva::getReservas($centro,$bici);

echo $bici." ".$centro;