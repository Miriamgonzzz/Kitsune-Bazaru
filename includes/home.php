<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div id="menu">
    <ul>
        <li>Home</li>
        <li class="cerrar-sesion">
            <a href="">Cerrar sesión</a>
        </li>
    </ul>
</div>

<section>
    <h1>Bienvenido <?php if(isset($_SESSION['id_usuario']))echo $_SESSION['nombre']; echo $_SESSION['apellidos']; ?> </h1>
</section>

</body>
</html>
