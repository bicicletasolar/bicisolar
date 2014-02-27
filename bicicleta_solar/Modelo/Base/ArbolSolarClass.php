<?php
/**
 * User: Jon Ander Fernandez
 * Date: 27/02/14
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */

namespace Bicicleta_solar\Modelo\Base;

require_once "/BateriaClass.php";
require_once "/CentroClass.php";

use Bicicleta_solar\Modelo\Base\Centro;

class ArbolSolar {

    private $id_ArbolSolar;
    private $centro; //Relacion con el centro

    function __construct($id_ArbolSolar,$centro,$corriente=null, $tension=null, $carga=null)
    {
        new Bateria($corriente,$tension,$carga);
        $this->id_ArbolSolar = $id_ArbolSolar;
        $this->setCentro($centro);
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




}