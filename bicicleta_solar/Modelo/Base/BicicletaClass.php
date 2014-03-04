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
    private $bateria;

    function __construct($id_bicicleta,Bateria $bateria)
    {
        $this->setBateria($bateria);
        $this->setIdBicicleta($id_bicicleta);
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

    /**
     * @param \Bicicleta_solar\Modelo\Base\Bateria $bateria
     */
    public function setBateria($bateria)
    {
        $this->bateria = $bateria;
    }

    /**
     * @return \Bicicleta_solar\Modelo\Base\Bateria
     */
    public function getBateria()
    {
        return $this->bateria;
    }





}