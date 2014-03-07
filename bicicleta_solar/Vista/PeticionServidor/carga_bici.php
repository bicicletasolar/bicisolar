<?php
require_once __DIR__."/../../Modelo/BD/bdBateria.php";
require_once __DIR__."/../../Modelo/Base/BicicletaClass.php";
require_once __DIR__."/../../Modelo/Base/BateriaClass.php";



use Bicicleta_solar\Modelo\BD\bdBateria;
use Bicicleta_solar\Modelo\Base\Bicicleta;
use Bicicleta_solar\Modelo\Base\Bateria;


$id_bici=json_decode($_POST['id_bici']);

$bici=new Bicicleta($id_bici,null,null);

$bateria=bdBateria::dameBateriaPorBici($bici);


echo $bateria->getCarga();
?>