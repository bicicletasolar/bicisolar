<?php
/**
 * User: Jon Ander Fernandez
 * Date: 27/02/14
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */
namespace Bicicleta_solar\Modelo\Base;

use bicicleta_solar\Modelo\BD\bdReserva;

require_once __DIR__."/BateriaClass.php";
require_once __DIR__."/../BD/bdReserva.php";

class Bicicleta {
    private $id_bicicleta;
    private $bateria;
    private $centro;
    private $reserva;


    private function __construct1($id_bicicleta=null,Bateria $bateria=null, Centro $centro=null,Reserva $reserva=null)
    {
        $this->setBateria($bateria);
        $this->setIdBicicleta($id_bicicleta);
        $this->setCentro($centro);
        $this->setReserva($reserva);
    }


    public function __construct()
    {
        $args=func_get_args();
        $nargs=func_num_args();

        switch($nargs){
            case 0:
                $this->__construct1();
                break;
            case 1:
                $this->__construct1($args[1]);
                break;
            case 2:
                $this->__construct1($args[1],$args[2]);
                break;
            case 3:
                $this->__construct1($args[1],$args[2],$args[1]);
                break;
        }
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

    /**
     * @param mixed $centro
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;
    }

    /**
     * @return mixed
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * @param mixed $reserva
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * @return mixed
     */
    public function getReserva()
    {
        return $this->reserva;
    }

    public function getReservas()
    {
        if(!$this->reservas){
        $this->setReserva(bdReserva::getReservas($this));
        }
    }





}