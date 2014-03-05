<?php
session_start();
ob_start();
require_once __DIR__.'/../../Modelo/BD/bdReserva.php';
use bicicleta_solar\Modelo\BD;
$reserva = json_decode($_POST['r']);

$usuario=unserialize($_SESSION['persona']);
BD\bdReserva::introducirReserva($reserva,$usuario);
