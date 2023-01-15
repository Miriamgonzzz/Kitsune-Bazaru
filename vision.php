<?php
//requires
require "includes/protec.php";
require "model/Objeto.php";
require "model/Bd.php";
require "model/funciones.php";

$id = intval($_GET['id']);

$objeto = new Objeto();
$objeto->obtenerPorId($id);


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilos.css">
    <title>Document</title>

    <script src="scripts/scriptObjetos.js" type="text/javascript"></script>

    <style>
        #lonce{
            background-image: url("img/21.jpg");
            background-size:cover;
        }
        #lonce h1{
            margin: auto;
            color: white;
            padding: 20px;
        }

    </style>
</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="lonce">
    <div class="formulario">
        <h1>Objeto Seleccionado</h1>
        <?php
        echo '<link href="styles/estiloVision.css" rel="stylesheet" type="text/css">';

        echo $objeto->imprimirEnFicha();

        ?>
    </div>
</section>
<?php

include "includes/footer.php";

?>

</body>
</html>

