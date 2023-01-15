<?php

require "../model/ListaObjetos.php";
require "../model/Objeto.php";
require "../model/Bd.php";


$id = intval($_GET['id']);

//borro el elemento de la BD y su foto
$figura = new Objeto();
$figura->borrarFigura($id);


//Pido de nuevo la lista de elementos y la envio a AJAX

$lista = new ListaObjetos();
$lista->obtenerElementos();


echo $lista->imprimirObjetosEnBack();