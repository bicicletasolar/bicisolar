<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 6/03/14
 * Time: 11:45
 */

namespace bicicleta_solar\Modelo\BD;
require_once __DIR__."/bdGenerico.php";
use bicicleta_solar\Modelo\BD;

class bdBateria extends bdGenerico{

    public static function dameBateriaGeneral(ArbolSolar  $arbol){
        $conexion=parent::abrirConexion();
        $sql="select * from arbolSolar where id_ArbolSolar='".$arbol->getIdArbolSolar()."' order by id_ArbolSolar desc limit 1;";
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
        $sql="select * from bicicleta where id_bicicleta='".$bici->getIdBicicleta()."' ";

}
};

