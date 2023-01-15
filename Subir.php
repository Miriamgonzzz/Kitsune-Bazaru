<?php

require "includes/protec.php";
require "model/BD.php";
require "model/Objeto.php";
require "model/funciones.php";


if($_SESSION['permiso']<2){
    header('location:Index.php');
}

$objetos = new Objeto();

if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = intval($_GET['id']);
    $objetos->obtenerPorId($id);

}

if(isset($_POST)&& !empty($_POST)){
    if(!empty($_POST['id'])){
        //Actualizar
        $id = intval($_POST['id']);
        $objetos->update($id,$_POST, $_FILES['foto']);
    }else {
        // Insertar
        $objetos->insertarFoto($_POST, $_FILES['foto']);
    }

}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilos.css">
    <link rel="stylesheet" href="styles/estiloSubir.css">
    <title>Document</title>
    <style>
        #subir{
            background-image: url("img/111.jpg");
            background-size:cover;
            overflow: hidden;
        }

    </style>
</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="subir">
<div class="añadir">
<h1>Añadir objetos</h1>

<form name="objetos" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <ul>
        <input type="hidden" name="id" value="<?php echo $objetos->getId() ?>">
        <li><label>Nombre: </label><input type="text" name="nombre" value="<?php echo $objetos->getNombre() ?>"></li>
        <li><label>Unidades: </label><input type="number" name="unidades" value="<?php echo $objetos->getUnidades() ?>"></li>
        <li><label>Precio: </label><input type="number" name="precio" value="<?php echo $objetos->getPrecio() ?>"></li>
        <li><label>Foto: </label><input type="file" name="foto" ></li>
        <?php
        if(strlen($objetos->getFoto())>0){
            echo "<li><img src='".$objetos->getFoto()."' width='55px'> </li>";
        }

        ?>
        <li><label>Descripcion: </label><textarea type="" name="descripcion"><?php echo $objetos->getDescripcion() ?></textarea></li>
        <li><input type="submit" value="Guardar"></li>
    </ul>
</form>
</div>
</section>
<?php
include "includes/footer.php";
?>
</body>
</html>
