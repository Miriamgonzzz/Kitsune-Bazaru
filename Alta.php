<?php

require "includes/protec.php";
require "model/Usuario.php";
require "model/Bd.php";



if(isset($_POST) && !empty($_POST)) {

    $usuario = new Usuario();
    $usuario->guardarEnBD($_POST);

  /*  $errores ="";

//Comprobamos que los campos no están vacíos
    if(empty($_POST['nombre'])){
        $errores=$errores. 'Falta por rellenar el campo "Nombre"<br>';
    }
    if(empty($_POST["apellidos"])){
        $errores=$errores. 'Falta por rellenar el campo "Apellidos"<br>';
    }

    if(empty($_POST['email'])){
        $errores=$errores. 'Falta por rellenar el campo "Email"<br>';
    }else{
        //Comprobamos si el patrón coincide con el Email.
        $patronEmail="/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/";
        if (!preg_match($patronEmail,$_POST['email'])) {
            $errores=$errores. "No es un correo electrónico válido.<br>";
        }
    }
    if(empty($_POST["contraseña"])){
        $errores=$errores. 'Falta por rellenar el campo "Contraseña"<br>';
    }
    if(strlen($errores)>0){
        echo "Se han detectado los siguientes errores:<br>";
        echo $errores;
    }else{
        echo "Formulario validado :)";
    }*/
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilos.css">
    <link rel="stylesheet" href="styles/estiloAlta.css">

    <script src="scripts/javascrit.js"></script>
    <title>Document</title>

</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<section id="Alta">

<div class="login">

    <h1>Registrarse</h1>

    <form name="altaUsuarios" id="altaUsuario" action="<?PHP  $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
        <div id="forum">
        <ul>

            <li><label for="nombre" >Nombre:</label><input type="name" name="nombre" id="nombre" ></li>
            <li><label for="apellidos" >Apellidos:</label><input type="surname" name="apellidos" id="apellidos" ></li>
            <li><label for="correo">Email:</label><input type="email" name="email" id="correo" ></li>
            <li><label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" onkeyup="validar()">
                <button type="button" onclick="mostrarPassword()"> Mostrar</button></li>

            <li><label for="contrasena2">Confirmar Contraseña:</label>
                <input type="password" id="contrasena2" onkeyup="una()">
                <button type="button" onclick="mostrar()"> Mostrar</button></li>
</div>
            <div id="pswd_info">
                <h4>La contraseña debe tener estos requisitos:</h4>
                <ul>
                    <li id="letra" class="invalid"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="cruzLetra"  d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                        <path visibility="hidden" id="tickLetra"  d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg> Al menos <strong>una letra</strong></li>
                    <li id="mayuscula" class="invalid"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="cruzMayuscula" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                            <path visibility="hidden" id="tickMayuscula" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg> Al menos <strong>una letra mayuscula</strong></li>
                    <li id="numero" class="invalid"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="cruzNumero" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                            <path visibility="hidden" id="tickNumero" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg> Al menos <strong>un numero</strong></li>
                    <li id="dimension" class="invalid"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="cruzLongitud" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                           <path visibility="hidden" id="tickDimension"  d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg> Debe de tener al menos <strong>8 caracteres</strong></li>
                    <li id="comparar" class="invalid"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="cruzComparar" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                            <path visibility="hidden" id="tickComparar" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg> Las dos contraseñas  <strong>deben ser iguales</strong></li>
                </ul>
            </div>
            <div id="lower">
                <button type="button" id ="registrarse"  onclick="validarUsuario()">Registrarse</button>
            </div>
        </ul>
    </form>
</div>
</section>
<?php
include "includes/footer.php";
?>
</body>
</html>
