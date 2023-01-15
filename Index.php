<?php
require "includes/protec.php";
require 'model/User.php';


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilos.css">
    <title>Document</title>
    <style>
        #index{
            text-align: center;
        }
        #index img{
            width: 500px;

        }
    </style>
</head>
<body>
<?php
include "includes/header.php";
include "includes/nav.php";
?>
<div id="index">
<img src="img/fondoIndex.jpg">
</div>
<?php
include "includes/footer.php";
?>
</body>
</html>
