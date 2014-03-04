<?php
/**
 * User: Jon Ander Fernandez
 * Date: 27/02/14
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */

namespace Bicicleta_solar\Modelo\Base;

require_once __DIR__."/BateriaClass.php";
require_once __DIR__."/CentroClass.php";

use Bicicleta_solar\Modelo\Base\Centro;

class ArbolSolar {

    private $id_ArbolSolar;
    private $centro; //Relacion con el centro
    private $bateria;

    function __construct($id_ArbolSolar,$centro,Bateria $bateria)
    {
        $this->setBateria($bateria);
        $this->setCentro($centro);
        if($centro){
            $this->setCentro($centro);
        }
    }

    /**
     * @param mixed $id_ArbolSolar
     */
    public function setIdArbolSolar($id_ArbolSolar)
    {
        $this->id_ArbolSolar = $id_ArbolSolar;
    }

    /**
     * @return mixed
     */
    public function getIdArbolSolar()
    {
        return $this->id_ArbolSolar;
    }

    /**
     * @param mixed $centro
     */
    public function setCentro(Centro $centro)
    {
        $this->centro = $centro;
    }

    /**
     * @return mixed
     */
    public function getCentro()
    {
        if(!isset($this->centro)){
            $this->setCentro(bdArbol::getCentro($this));
        }

        return $this->centro;

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