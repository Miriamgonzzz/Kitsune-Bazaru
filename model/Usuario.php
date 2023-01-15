<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $contrasena;



    /**
     * @param $id
     * @param $nombre
     * @param $apellidos
     * @param $email
     * @param $contrasena
     */
    public function __construct($id="", $nombre="", $apellidos="", $email="", $contrasena = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->contrasena = $contrasena;
    }
    public function llenarDesdeFormulario($nombre="", $apellidos="", $email="",$contrasena=""){

        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->contrasena=$contrasena;

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
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }





    public function llenarDesdePost($datos){

        foreach ($datos as $clave => $valor){

            $$clave = addslashes($valor);
        }

        $this->llenarDesdeFormulario($nombre, $apellidos, $email, $contrasena);
    }

    public function guardarEnBD($datos){

        $bd = new Bd();
        $bd->insertar("usuarios",$datos);
    }


}