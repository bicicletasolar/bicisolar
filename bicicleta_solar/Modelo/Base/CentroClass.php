<?php
/**
 * Created by PhpStorm.
 * User: 8BDWES04
 * Date: 25/02/14
 * Time: 9:44
 */

namespace Bicicleta_solar\Modelo\Base;

use bicicleta_solar\Modelo\BD\bdCentro;

class Centro {

    private $id_centro;
    private $nombre;
    private $direccion;
    private $arboles; // Relacion

    private function __construct1($id_centro=null,$nombre=null,$direccion=null)
    {
        $this->setIdCentro($id_centro);
        $this->setNombre($nombre);
        $this->setDireccion($direccion);

    }

    public function __construct()
    {
        $nargs=func_num_args();
        $args=func_get_args();

        switch($nargs)
        {
            case 0:
                $this->__construct1();
                break;
            case 1:
                $this->__construct1($args[0]);
                break;
            case 3:
                $this->__construct1($args[0],$args[1],$args[2]);
                break;

        }

    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setIdCentro($id_centro)
    {
        $this->id_centro = $id_centro;
    }


    public function getIdCentro()
    {
        return $this->id_centro;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getNombre()
    {
        return $this->nombre;
    }
    public function setArboles($arboles)
    {
        $this->arboles=$arboles;
    }

    public function addArbol(ArbolSolar $arbol)
    {
        $this->arboles[]= $arbol;
        $arbol->setCentro($this);
    }

    /**
     * @return mixed
     */
    public function getArboles()
    {
        if(!$this->arboles){
            $this->setArboles(bdCentro::getArboles($this));
        }
    }



} 