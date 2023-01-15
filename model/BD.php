<?php

class BD
{
    private $server = "127.0.0.1";
    private $usuario = "root";
    private $pass = "";
    private $basedatos = "usuario";

    private $conexion;
    private $resultado;


    public function __construct()
    {
        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass , $this->basedatos);
        $this->conexion->select_db($this->basedatos);
        $this->conexion->query("SET NAMES 'utf8'");

    }

    /*public function insertarEnlace($tabla, $objeto){
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, contrasena)
                VALUES ('".$objeto->getNombre()."',".$objeto->getApellidos()."
                ,'".$objeto->getEmail()."', '".$objeto->getContrasena()."')";
        echo $sql;
        $this->conexion->query($sql);


    }*/
    public function insertar($tabla,$datos){

        $claves  = array();
        $valores = array();

        foreach ($datos as $clave => $valor){

            if($clave != "id") {

                $claves[] = addslashes($clave);
                if ($clave == "contrasena") {
                    $valores[] = ("'" . md5($valor) . "'");
                } else {
                    $valores[] = ("'" . addslashes($valor) . "'");
                }
                if($clave == "permiso"){
                    $valores[] = 0;
                }
            }

        }
        $sql = ("INSERT INTO ".$tabla." (".implode(',', $claves).") 
            VALUES  (".implode(',', $valores).")");

        $this->resultado =   $this->conexion->query($sql);
        $res = $this->resultado;

        //echo $sql;
        return $res;


    }

    public function insertarElemento($tabla, $datos,$carpeta="",$foto){

        $claves  = array();
        $valores = array();

        foreach ($datos as $clave => $valor){
            if($clave != "id") {
                $claves[] = $clave;
                $valores[] = "'" . $valor . "'";
            }
        }

        if($foto['name'] != ""){

            $ruta = subirFoto($foto,$carpeta);

            $claves[] = "foto";
            $valores[] = "'".$ruta."'";
        }

        $sql = "INSERT INTO ".$tabla." (".implode(',', $claves).") VALUES  (".implode(',', $valores).")";
        //INSERT figuras (nombre,unidades,pintada,desscripcion....) VALUES ('figura1','43',.....)
        //echo $sql;
        $this->resultado =   $this->conexion->query($sql);
        $res = $this->resultado;
        return $res;
    }

    public function uppdateBD($id, $tabla, $datos, $foto = "", $directorio = ""){

        $sentencias = array();

        foreach ($datos as $campo => $valor) {
            if ($campo != "id" && $campo != "x" && $campo != "y") {
                $sentencias[] = $campo . "='".addslashes($valor)."'";
                //UPDATE tabla SET nombreCampo = 'valor1', nombreCampo='valor'....
            }
        }


        if(strlen($foto['name'])>0){

            $this->borrarFoto($id, $tabla);
            $ruta= subirFoto($foto, $directorio);
            $sentencias[] = "foto='".$ruta."'";
        }



        $campos = implode(",", $sentencias);
        $sql = "UPDATE " . $tabla . " SET " . $campos . " WHERE id=" . $id;
        $conexion = new Bd();
        //echo $sql;
        $conexion->consulta($sql);
    }

    public function borrarFoto($id, $tabla,$carpeta){

        $sql = "select foto from " . $tabla . " WHERE id = '" . $id . "'";

        $this->resultado = $this->conexion->query($sql);

        if($this->numeroElementos()>0) {

            $res = mysqli_fetch_assoc($this->resultado);
            $rutaAborrar = $carpeta.$res['foto'];
            if(!unlink($rutaAborrar)){
                lanzaError("Error de escritura en el servidor, contacte con su administrador en el mail ......");
            }


        }
    }


    /*public function consultaSimple($consulta){
        //echo "el sql".$consulta ."fin";
        $this->resultado =   $this->conexion->query($consulta);

        $res = mysqli_fetch_assoc($this->resultado);

        return $res;
    }*/

    public function consulta($consulta){
        //echo $consulta;
        $this->resultado =   $this->conexion->query($consulta);
        $res = $this->resultado ;
        return $res;
    }

    public function numeroElementos(){
        $num = $this->resultado->num_rows;
        return $num;
    }

}
?>