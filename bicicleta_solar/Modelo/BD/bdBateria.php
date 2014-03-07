<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 6/03/14
 * Time: 11:45
 */

namespace bicicleta_solar\Modelo\BD;

require_once __DIR__."/bdGenerico.php";
require_once __DIR__."/../Base/BateriaClass.php";
require_once __DIR__."/../Base/BicicletaClass.php";
require_once __DIR__."/../Base/ArbolSolarClass.php";


use bicicleta_solar\Modelo\Base\Bicicleta;
use bicicleta_solar\Modelo\Base\Bateria;
use bicicleta_solar\Modelo\Base\ArbolSolar;



class bdBateria extends bdGenerico{

    public static function dameBateriaGeneral(ArbolSolar  $arbol){

        $conexion=parent::abrirConexion();

        $sql="select * from datosarbol where id_arbolsolar='".$arbol->getIdArbolSolar()."' order by id_arbolsolar desc limit 1;";
        $rs=mysql_query($sql);

        if(mysql_num_rows($rs)==1)
        {
            $fila = mysql_fetch_assoc($rs);
            $bateria=new Bateria($fila['corriente'],$fila['tension'],$fila['carga']);
        }


        parent::cerrarConexion($conexion);

        return $bateria;
    }

    public static function dameBateriaPorBici(Bicicleta $bici){

        $conexion=parent::abrirConexion();

        $sql="select * from datosbicicleta where id_bicicleta='".$bici->getIdBicicleta()."'order by id_bicicleta desc limit 1;";
        $rs=mysql_query($sql);


        if(mysql_num_rows($rs)==1)
        {
            $fila = mysql_fetch_assoc($rs);
            $bateria=new Bateria($fila['corriente'],$fila['tension'],$fila['carga']);
        }


        parent::cerrarConexion($conexion);

        return $bateria;
    }
};

