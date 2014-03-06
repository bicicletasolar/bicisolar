<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 9:32
 */

namespace Bicicleta_solar\Modelo\Base;
use bicicleta_solar\Modelo\BD\bdReserva;
require_once __DIR__."/UsuarioClass.php";

class Reserva {
    private $id_reserva;
    private $fecha;
    private $horaInicio;
    private $horaFin;
    private $usuario;
    private $centro;
    private $bicicleta;



    private function __construct1($centro=null, $fecha=null, $horaFin=null, $horaInicio=null, $id_reserva=null, $usuario=null,$bicicleta=null)
    {
        $this->setIdReserva($id_reserva);
        $this->setFecha($fecha);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
        if($usuario){
        $this->setUsuario($usuario);
        }
        if($centro){
        $this->setCentro($centro);
        }
        if($bicicleta){
            $this->setBicicleta($bicicleta);
        }
    }


    public function __construct()
    {
        $args=func_get_args();
        $nargs=func_num_args();

        switch($nargs){
            case 0:
                $this->__construct1();
                break;
            case 5:
                $this->__construct1($args[0],$args[1],$args[2],$args[3],$args[4]);
                break;
            case 7:
                $this->__construct1($args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7]);
                break;

        }
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
        if(!isset($this->centro)){
            $this->setCentro(bdReserva::getCentro($this));
        }
        return $this->centro;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }





    /**
     * @param mixed $horaFin
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @param mixed $horaInicio
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @param mixed $id_reserva
     */
    public function setIdReserva($id_reserva)
    {
        $this->id_reserva = $id_reserva;
    }

    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->id_reserva;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        if(!isset($this->usuario)){
            $this->setUsuario(bdReserva::getReserva($this));
        }

        return $this->usuario;
    }

    /**
     * @param mixed $bicicleta
     */
    public function setBicicleta($bicicleta)
    {
        $this->bicicleta = $bicicleta;
    }

    /**
     * @return mixed
     */
    public function getBicicleta()
    {
        if(!isset($this->bicicleta)){
            $this->setBicicleta(bdReserva::getBicicleta($this));
        }

        return $this->bicicleta;
    }







} 