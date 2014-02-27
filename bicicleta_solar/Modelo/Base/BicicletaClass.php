<?php
/**
 * User: Jon Ander Fernandez
 * Date: 27/02/14
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */
namespace Bicicleta_solar\Modelo\Base;

require_once "BateriaClass.php";

class Bicicleta {
    private $id_bicicleta;

    function __construct($id_bicicleta,$corriente=null, $tension=null, $carga=null)
    {
        new Bateria($corriente,$tension,$carga);
        $this->id_bicicleta = $id_bicicleta;
    }

    /**
     * @param mixed $id_bicicleta
     */
    public function setIdBicicleta($id_bicicleta)
    {
        $this->id_bicicleta = $id_bicicleta;
    }

    /**
     * @return mixed
     */
    public function getIdBicicleta()
    {
        return $this->id_bicicleta;
    }



}