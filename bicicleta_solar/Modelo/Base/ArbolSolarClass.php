<?php
/**
 * User: Jon Ander Fernandez
 * Date: 27/02/14
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */

namespace Bicicleta_solar\Modelo\Base;
require_once "BateriaClass.php";

class ArbolSolar {

    private $id_ArbolSolar;

    function __construct($id_ArbolSolar)
    {
        $this->id_ArbolSolar = $id_ArbolSolar;
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




}