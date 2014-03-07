<?php
require_once __DIR__."/../../Modelo/BD/bdBateria.php";
require_once __DIR__."/../../Modelo/Base/ArbolSolarClass.php";
require_once __DIR__."/../../Modelo/Base/BateriaClass.php";



use Bicicleta_solar\Modelo\BD\bdBateria;
use Bicicleta_solar\Modelo\Base\ArbolSolar;
use Bicicleta_solar\Modelo\Base\Bateria;


$id_arbol=json_decode($_POST['id_arbol']);

$arbol=new ArbolSolar($id_arbol,null);

 $bateria=bdBateria::dameBateriaGeneral($arbol);


echo $bateria->getCarga();
?>