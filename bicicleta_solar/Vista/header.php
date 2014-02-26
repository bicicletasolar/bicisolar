<?php
//License:
require_once __DIR__.'/../licencia.php';
require_once __DIR__.'/../Configuracion/config.php';
require_once __DIR__.'/../Modelo/Base/UsuarioClass.php';

use Bicicleta_solar\Modelo\Base\Usuario;
session_start();
if(isset($_SESSION))
{
    $objeto=unserialize($_SESSION['persona']);

}
else
{
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/estilos.css" rel="stylesheet">
    <link href="dist/css/justified-nav.css" rel="stylesheet">

    <title>Bicicleta_Solar</title>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <script src="js/funciones.js"></script>

    <![endif]-->
  </head>

  <body onload="dibujar()">
    <div class="container">
    <img src="img/logo.jpg" alt="egibide"/>

      <!-- Menú -->
      <div class="masthead">
        <ul class="nav nav-justified">
          <li><a href="#">Presentación</a></li>
          <li class="active"><a href="reservas.php">Reservas</a></li>
          <li><a href="#">Proyecto</a></li>
          <li><a href="#">Participantes</a></li>
          <li><a href="#">Patricionadores</a></li>
          <li><a href="bateria.php">Baterías</a></li>
        </ul>
      </div>
      <!-- Fin Menú -->