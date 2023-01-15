<?php

class Contacto
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;
    private $problema;

    private $tabla;

    /**
     * @param $id
     * @param $nombre
     * @param $apellidos
     * @param $email
     * @param $telefono
     * @param $problema
     */
    public function __construct($id="", $nombre="", $apellidos="", $email="", $telefono="", $problema="")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->problema = $problema;
    }
    private function llenar($id, $nombre, $apellidos, $email, $telefono, $problema)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->problema = $problema;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
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
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getProblema()
    {
        return $this->problema;
    }

    /**
     * @param mixed $problema
     */
    public function setPrblema($problema)
    {
        $this->prblema = $problema;
    }

    public function guardar($datos){

        $bd = new Bd();
        $bd->insertar("contacto",$datos);
    }


}
