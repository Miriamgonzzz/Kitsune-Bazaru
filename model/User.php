<?php

class User
{
    private $id;
    private $email;
    private $contrasena;
    private $permiso;

    private $tabla;

    /**
     * @param $id
     * @param $email
     * @param $contrasena
     * @param $permiso
     */
    public function __construct($id="", $email="", $contrasena="",$permiso="")
    {
        $this->id = $id;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->permiso= $permiso;
        $this->tabla= "usuarios";
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed|string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed|string
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed|string $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed|string
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * @param mixed|string $permiso
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;
    }





    public function  userExists($email,$pass)
    {

        $conexion = new BD();

        $sql = "SELECT id, nombre, apellidos, permiso FROM ".$this->tabla.
            " WHERE email= '".$email."' AND contrasena= '".md5($pass)."';";

            $res = $conexion->consulta($sql);
           // echo $sql;
        if($conexion->numeroElementos()>0){

            list($id,$nombre,$apellidos,$permiso) = mysqli_fetch_array($res);

            $_SESSION['id_usuario']=$id;
            $_SESSION['nombre']=$nombre;
            $_SESSION['apellidos']=$apellidos;
            $_SESSION['email']=$email;
            $_SESSION['permiso']=$permiso;
            $respuesta = true;
        }else{
            $respuesta=false;
        }

        return $respuesta;

        /*$md5pass = md5($pass);

        $query = $this->conexion->prepare('SELECT email,contrasena FROM usuarios WHERE correo = :user AND contrasena = :pass ');
        $query->binParam();
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }*/

    }

   /* public function setUser($user)
    {

        $query =$conexion->prepare('SELECT * FROM usuarios WHERE email = :user ');
        $query->execute(['user' => $user]);

        foreach ($query as $currenUser) {
            $this->nombre = $currenUser['nombre'];
            $this->email = $currenUser['email'];
        }
        }*/






}