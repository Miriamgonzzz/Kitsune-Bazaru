<?php
require_once 'includes/protec.php';
require"model/User.php";
require "model/ListaObjetos.php";
require "model/Objeto.php";
require "model/Bd.php";


/*if($_SESSION['permiso']<2){
    header('location:Buscador.php');
}*/


$lista = new ListaObjetos();
if(isset($_GET['buscar']) && !empty($_GET['buscar'])){

    $lista->obtenerElementos(addslashes($_GET['buscar']));

}else {
    $lista->obtenerElementos();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilos.css">
    <title>Document</title>

    <script src="scripts/scriptObjetos.js" type="text/javascript"></script>
<style>
    #listar{
        overflow: hidden;
        background-image: url("img/images.jpg");
        background-size:cover;
    }
    #listar a{
      text-decoration: none;
        color: #0C090A;
        font-size: 30px;
        margin-left: 20px;
    }
    #listar #contenido{
        color: #E59786;
    }
    #listar h1{
        margin-left: 10px;
        color: white;
    }
    #listar form{
        margin-left: 30px;
    }
    #listar input[name=buscar]{
        color: #D13818;
        margin-left:20px ;
        padding-left: 10px;
        border: 1px solid black;
        border-radius: 2px;
        box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px

    }
    #listar input[type=submit]{
        height: 30px;
        font-weight: bold;
        color: #fff;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#B62405), to(#65412C));
        border: 1px solid saddlebrown;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
        cursor: pointer;
    }
</style>
</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="listar">
    <a id="contenido" href="Subir.php" >Añadir contenido</a>
    <h1>Mi Lista</h1>
    <form name="buscador" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
        <input name="buscar" type="text" placeholder="Buscador"><input type="submit" value="Buscar">
    </form>
    <div class="lista" id="lista">

        <?php
        echo '<link href="styles/estiloListar.css" rel="stylesheet" type="text/css">';
        echo  $lista->imprimirObjetosEnBack();

        ?>


    </div>

</section>
<?php
include "includes/footer.php";
?>
</body>
</html>
