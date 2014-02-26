<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 9:32
 */

namespace Bicicleta_solar\Modelo\Base;
require_once __DIR__."/UsuarioClass.php";

class Reserva {
    private $id_reserva;
    private $fechaInicio;
    private $fechaFin;
    private $horaInicio;
    private $horaFin;
    private $estado;
    private $usuario;
    private $centro;



    private function __construct1($centro=null, $estado=null, $fechaFin=null, $fechaInicio=null, $horaFin=null, $horaInicio=null, $id_reserva=null, $usuario=null)
    {
        $this->setIdReserva($id_reserva);
        $this->setFechaInicio($fechaInicio);
        $this->setFechaFin($fechaFin);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
        $this->setEstado($estado);
        if($usuario){
        $this->setUsuario($usuario);
        }
        if($centro){
        $this->setCentro($centro);
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
            case 8:
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
        return $this->centro;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
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
        return $this->usuario;
    }





} 