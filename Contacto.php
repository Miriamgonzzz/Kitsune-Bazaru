<?php

require "includes/protec.php";
require "model/Contacto.php";
require "model/Bd.php";



if(isset($_POST) && !empty($_POST)) {

    $contacto = new Contacto();
    $contacto->guardar($_POST);
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
</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="contactos">
    <form name="objetos" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <ul>
        <li><label for="nombre" >Nombre:</label><input type="name" name="nombre" id="nombre" ></li>
        <li><label for="apellidos" >Apellidos:</label><input type="surname" name="apellidos" id="apellidos" ></li>
        <li><label for="correo">Email:</label><input type="email" name="email" id="correo" ></li>
        <li><label for="telefono">Telefono:</label><input type="tel" name="telefono" id="telefono" ></li>
        <li><label for="problema">Problema:</label><textarea type="" name="problema" id="problema" ></textarea></li>
        <li><input type="submit" value="Guardar"></li>
    </ul>
    </form>
</section>
<?php
include "includes/footer.php";
?>
</body>
</html>