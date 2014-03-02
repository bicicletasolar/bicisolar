<?php
require_once __DIR__.'/config.php';

session_start();
session_destroy();
header('Location: http://localhost/bicisolar/trunk/bicicleta_solar/Vista/reservas.php');