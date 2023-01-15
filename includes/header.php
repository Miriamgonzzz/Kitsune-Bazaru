<?php

require_once 'includes/protec.php';
require_once 'model/User.php';
require_once 'model/BD.php';
require_once 'model/funciones.php';

$message = '';

if(isset($_POST)&&!empty($_POST)){
    $email= addslashes($_POST['user']);
    $pass=addslashes($_POST['pass']);
    $user = new User();

    if($user->userExists($email,$pass)){
        //echo "usuario validado";
        $message ="Usuario validado";

    }else{
       // echo "email y/o contraseña incorrectos  ";
        $message ="Email y/o contraseña incorrectos  ";
    }

}else{
    //echo "LOGIN";
    $message ="LOGIN";
}

?>
<header>

        <img id="foto" src="img/logo.png" alt="Logo_Web" title="Logo Principal">
    <div id="menu">
    <section>
        <h1><?php if(isset($_SESSION['id_usuario']))echo"Bienvenido " .$_SESSION['nombre'] .$_SESSION['apellidos'];  echo '<link href="styles/estilos.css" rel="stylesheet" type="text/css">'; ?> </h1>
        <a href="logout.php"><?php if(isset($_SESSION['id_usuario'])) echo '<img id="salida" src="img/login.png"alt="Salida" title="Salida" >';
        echo '<link href="styles/estilos.css" rel="stylesheet" type="text/css">';?></a>
    </section>
    </div>
    <div class="sesion">
        <a href="Iniciar.php" ><img id="fotoLogin" src="img/user.png" alt="Iniciar_Sesion" title="Iniciar Sesion"></a>

    <div id="contenedorLogin">
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
</header>
