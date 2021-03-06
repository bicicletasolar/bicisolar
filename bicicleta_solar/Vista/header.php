<?php
session_start();
//License:
require_once __DIR__.'/../licencia.php';
require_once __DIR__.'/../Configuracion/config.php';
require_once __DIR__.'/../Modelo/Base/UsuarioClass.php';

use Bicicleta_solar\Modelo\Base\Usuario;


if(isset($_SESSION['persona']))
{
    $objeto=unserialize($_SESSION['persona']);

}
else
{
  $objeto=null;
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="shortcut icon" href="img/favicon.ico" />
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/estilos.css" rel="stylesheet">
      <link href="dist/css/justified-nav.css" rel="stylesheet">
      <link rel="stylesheet" href="dist/css/baterisBici.css"/>
      <meta charset="utf-8">

      <script type="text/javascript" src="ClasesJS/Reserva.js"></script>
      <script type="text/javascript" src="ClasesJS/Centro.js"></script>
      <script type="text/javascript" src="ClasesJS/Bicicleta.js"></script>



      <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--  <script src="js/dibujar.js"></script> -->
