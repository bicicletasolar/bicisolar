<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo
 * Date: 25/02/14
 * Time: 9:31
 */

namespace Bicicleta_solar\Modelo\Base;


class Usuario {
    private $id_usuario;
    private $dni;
    private $nombre;
    private $password;



    private function __construct1($id_usuario=null,$dni=null,$nombre=null,$password=null)
    {
        $this->setIdUsuario($id_usuario);
        $this->setDni($dni);
        $this->setNombre($nombre);
        $this->setPassword($password);

    }


    public function __construct()
    {
        $args=func_get_args();
        $nargs=func_num_args();
        switch($nargs){
            case 0:
                $this->__construct1();
                break;
            case 2:
                $this->__construct1($args[0],$args[1]);
                break;
            case 4:
                $this->__construct1($args[0],$args[1],$args[2],$args[3]);
                break;
        }
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }








} 