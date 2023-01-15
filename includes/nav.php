
<nav>
    <ul>
        <li><a href="Index.php">INICIO</a></li>
        <li><a href="ProductosRecientes.php">PRODUCTOS RECIENTES</a> </li>
        <li><a href="Tienda.php">TIENDA</a></li>
        <?php

        if(isset($_SESSION['nombre']) && $_SESSION['permiso']>1){
            echo '<li><a href="ListarObjetos.php">MIS PRODUCTOS</a></li>';
        }else{
            echo ' <li><a href="Alta.php">ALTA</a></li>';
        }

        ?>
        <li><a href="Contacto.php">CONTACTO</a></li>

    </ul>
</nav>
