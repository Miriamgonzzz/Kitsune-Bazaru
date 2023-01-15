<?php

require_once 'includes/protec.php';
require_once 'model/User.php';
require_once 'model/BD.php';
require_once 'model/funciones.php';



?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilos.css">
    <link rel="stylesheet" href="styles/estiloInicio.css">
    <title>Document</title>

</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="iniciar">
    <div class="sesion">
        <div id="contenedorLogin12">
            <form action=" <?PHP  $_SERVER['PHP_SELF'] ?> "  method="post">
                <?php if(!empty($message)): ?>
                    <p> <?= $message ?></p>
                <?php endif; ?>
                <ul>
                    <li> <label for="name" >Email:</label>
                        <input type="email" name="user"></li>

                    <li><label for="username">Contraseña:</label>
                        <input type="password" name="pass">
                    </li>

                    <li><a href="#" id="Olviden">- ¿Olvidastes la contraseña? -</a></li>

                </ul>
                <div id="lower">
                    <button type="submit" id="loge"  value="Login">Login</button>
                </div>
            </form>
        </div>
</section>
<?php
include "includes/footer.php";
?>
        </body>
        </html>