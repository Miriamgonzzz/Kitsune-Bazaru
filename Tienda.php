<?php
require_once "includes/protec.php";
require "model/ListaObjetos.php";
require "model/Objeto.php";
require "model/BD.php";
require "model/funciones.php";


$listas = new ListaObjetos();
if(isset($_GET['buscar']) && !empty($_GET['buscar'])){

    $listas->obtenerElementos(addslashes($_GET['buscar']));

}else {
    $listas->obtenerElementos();
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/estilos.css">
    <script src="scripts/scriptObjetos.js" type="text/javascript"></script>
    <style>
        #Tienda{
            background-image: url("img/22.jpg");
            background-size:cover;
        }
        #Tienda h1{
           margin: auto;
            padding: 20px;
            color: white;

        }
        .formulario input[name=buscar]{
            color: #743E10;
            margin-left:20px ;
            padding-left: 10px;
            border: 1px solid black;
            border-radius: 2px;
            box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px

        }
        .formulario input[type=submit]{
            height: 30px;
            font-weight: bold;
            color: #fff;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#CC8664), to(#65412C));
            border: 1px solid saddlebrown;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
            cursor: pointer;
        }
    </style>
</head>px
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="Tienda">
    <div class="formulario">
        <h1>PRODUCTOS</h1>
        <form name="buscador" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <input name="buscar" type="text" placeholder="Buscador"><input type="submit" value="Buscar">
        </form>
        <div class="lista" id="lista">
            <?php
            echo '<link href="styles/estiloTienda.css" rel="stylesheet" type="text/css">';
            echo $listas->imprimirTienda();

            ?>
        </div>
</section>
<?php
include "includes/footer.php";
?>
</body>
</html>
