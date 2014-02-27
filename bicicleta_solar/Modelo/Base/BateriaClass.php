<?php
/**
 * User: Jon Ander Fernandez
 * Date: 27/02/14
 * Time: 13:14
 * To change this template use File | Settings | File Templates.
 */

namespace Bicicleta_solar\Modelo\Base;


class Bateria {

    private $corriente;
    private $tension;
    private $carga;

    function __construct1($corriente=null, $tension=null, $carga=null)
    {
        $this->setCorriente($corriente);
        $this->setTension($tension);
        $this->setCarga($carga);
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
                $this->__construct1(null,null,$args[0]);
                break;
            case 2:
                $this->__construct1($args[0],$args[1]);
                break;
            case 3:
                $this->__construct1($args[0],$args[1],$args[2]);
                break;

        }

    }

    /**
     * @param mixed $corriente
     */
    public function setCorriente($corriente)
    {
        $this->corriente = $corriente;
    }

    /**
     * @return mixed
     */
    public function getCorriente()
    {
        return $this->corriente;
    }

    /**
     * @param mixed $tension
     */
    public function setTension($tension)
    {
        $this->tension = $tension;
    }

    /**
     * @return mixed
     */
    public function getTension()
    {
        return $this->tension;
    }

    /**
     * @param mixed $carga
     */
    public function setCarga($carga)
    {
        $this->carga = $carga;
    }

    /**
     * @return mixed
     */
    public function getCarga()
    {
        return $this->carga;
    }




}