<?php

class Objeto
{
    private $id;
    private $nombre;
    private $unidades;
    private $precio;
    private $descripcion;
    private $foto;

    private $tabla;
    private $carpetaFotos;

    /**
     * Figura constructor.
     * @param $id
     * @param $nombre
     * @param $unidades
     * @param $precio
     * @param $descripcion
     * @param $foto
     * @param $tabla
     * @param $carpetaFotos
     */
    public function __construct($id = "", $nombre = "", $unidades = "", $precio = "", $descripcion = "", $foto = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->unidades = $unidades;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->foto = $foto;

        $this->tabla = "objetos";
        $this->carpetaFotos = "imagenes/";
    }


    private function llenar($id, $nombre, $unidades, $precio, $descripcion, $foto)
    {
        $this->id = $id;
        $this->unidades = $unidades;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->foto = $foto;


    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    /**
     * @return string
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * @param string $unidades
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }

    /**
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param string $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }


    public function insertarFoto($datos,$foto){


        $conexion = new Bd();
        $conexion->insertarElemento($this->tabla,$datos,$this->carpetaFotos,$foto);
    }

    public function update($id, $datos, $foto){

        $conexion = new Bd();
        $conexion->uppdateBD($id, $this->tabla, $datos, $foto, $this->carpetaFotos);
    }




    /**
     * Version larga
     * @param $id
     */
    public function obtenerPorId($id){

        $sql = "SELECT id, nombre, unidades, precio, descripcion, foto FROM ".$this->tabla." WHERE id=".$id;

        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        list($id, $nombre, $unidades, $precio, $descripcion, $foto) = mysqli_fetch_array($res);
        /*
        $this->id = $id;
        $this->unidades = $unidades;
        ...
        */
        $this->llenar($id, $nombre, $unidades, $precio, $descripcion, $foto);


    }

    public function borrarFigura($id){

        $conexion = new Bd();
        $conexion->borrarFoto($id, $this->tabla,"../".$this->carpetaFotos);
        $sql = "DELETE FROM ".$this->tabla ." WHERE id=".$id;
        $conexion->consulta($sql);

    }


    public function obtencionPorIdVersionCorta($id){

        $sql = "SELECT id, unidades, nombre, pintada, foto, descripcion, precio, coleccion FROM ".$this->tabla." WHERE id=".$id;

        $conexion = new Bd();
        $res = $conexion->consulta($sql);

    }


    /**
     * Método que retorna una fila para la insercion en una tabla de la clase lista.
     * @return string
     */
    public function imprimeteEnTr(){


        $html = "<a  href='vision.php?id=" . $this->id . "'><div id='miProducto'><ul><li id='id'> ". $this->id . "</li>
                        <li id='nombre'> Nombre: " . $this->nombre . "</li>
                        <li id='unidades'> Unidades: " . $this->unidades . "</li>
                        <li id='precio'> Precio: " . $this->precio . " €</li>
                        <li id='descripcion'> Descripcion: " . $this->descripcion . "</li>
                        <li id='fotoObjeto'><img src='" . $this->carpetaFotos . $this->foto . "'></li>
                       <li id='carrito'>Ver Objeto</li></a> ";

        if(isset($_SESSION['nombre']) && $_SESSION['permiso'] >1) {

            $html.= "<div id='editar'><li><a href = 'Subir.php?id=" . $this->id . "' > Editar</a></li>
                       <li><a href = 'javascript:borrarFigura(" . $this->id . ")' > Borrar</a></li></div>";
        }

        $html .= "</ul></div>";

        return $html;

    }

    public function imprimeteEnDiv(){
        $html = "<a href='vision.php?id=" . $this->id . "'><div id='objeto'><ul><li id='id'> ". $this->id . "</li>
                        <li> Nombre: " . $this->nombre . "</li>
                        <li> Unidades: " . $this->unidades . "</li>
                       
                        <li> Descripcion: " . $this->descripcion . "</li>
                        <li><div id='fotoObjeto'><img src='" . $this->carpetaFotos . $this->foto . "' style='margin-top:40px'></div></li> 
                        <li> Precio: " . $this->precio . " €</li>
                       <li id='carrito'><img  src='img/carrito-de-compras.png'></li></ul></div></a>";

        return $html;

    }

    public function imprimirEnFicha() {


        $html ="  <div id='vision'><ul><li><img src='" . $this->carpetaFotos . $this->foto . "' style='width: 700px'></li>
                        <li id='nombre'> Nombre: " . $this->nombre . "</li>
                        <li id='unidades'>Unidades: " . $this->unidades . "</li>
                        <li id='precio'> Precio: " . $this->precio . " €</li>
                        
                        <li id='descripcion'>" . $this->descripcion . "</li>
                        </ul></div>";

        return $html;

    }


}