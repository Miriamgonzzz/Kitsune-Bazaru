<?php

class ListaObjetos
{

    private $lista;
    private $tabla;


    public function __construct(){

        $this->lista = array();
        $this->tabla = "objetos";
    }

    public function obtenerElementos($txt = ""){

        $sqlBusca = "";
        if(strlen($txt)>0){
            $sqlBusca = " WHERE nombre LIKE '%".$txt."%'";
        }

        $sql = "SELECT * FROM ".$this->tabla." ".$sqlBusca.";";

        $conexion = new Bd();
        $res = $conexion->consulta($sql);

        while( list($id, $nombre, $unidades, $precio, $descripcion, $foto ) = mysqli_fetch_array($res) ){

            $fila = new Objeto($id, $nombre, $unidades, $precio, $descripcion, $foto);
            array_push($this->lista,$fila);
            //$this->lista[] = $fila;

        }

    }


    public function imprimirObjetosEnBack(){

        $html = "<div >";

        for($i=0;$i<sizeof($this->lista);$i++){

            $html .= $this->lista[$i]->imprimeteEnTr();
        }
        $html .= "</div>";

        return $html;

    }

    public function imprimirTienda(){
        $html = "<div >";

        for($i=0;$i<sizeof($this->lista);$i++){

            $html .= $this->lista[$i]->imprimeteEnDiv();
        }
        $html .= "</div>";

        return $html;
    }




}