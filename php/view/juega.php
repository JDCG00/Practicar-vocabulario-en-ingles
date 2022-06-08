<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../imgs/united-kingdom.png">
    <link rel="stylesheet" href="../../css/estilo.css">
    <title>Practicar vocabulario en inglés</title>
</head>
<body>
    <nav>
        <ul id="panel-navegacion" class="nav nav-boton">
            <li class="icono"><a href="../../index.html" class="nav-link"><img src="../../imgs/english.png"></a></li>
            <li><a href="#" class="nav-link activado">Juega</a></li>
            <li><a href="controlador.php?accion=informacion" class="nav-link">Información</a></li>
            <li><a href="controlador.php?accion=contacto" class="nav-link">Contacta</a></li>
        </ul>
        <ul class="nav nav-boton" id="login">
            <li id="inicio_sesion" class="icono"><a href="controlador.php?accion=login" class="nav-link"><img src="../../imgs/user.png">Login</a></li>
        </ul>
    </nav>
    <div class="contenedor">
        <div class="container">
            Words
            <p id="1" class="draggable" draggable="true">Blue</p>
            <p class="draggable" draggable="true">Red</p>
            <p class="draggable" draggable="true">Green</p>
            <p class="draggable" draggable="true">Yellow</p>
            <p class="draggable" draggable="true">Teacher</p>
            <p class="draggable" draggable="true">Pencil</p>
            <p class="draggable" draggable="true">Snowy</p>
            <p class="draggable" draggable="true">Eraser</p>
        </div>
        <div class="container">
            Colors
        </div>
        <div class="container">
            School
        </div>
        <div id="corregir" class="nav nav-boton">
            <div><a href="" class="nav-link activado">Corregir</a></div>
        </div>
    </div>
    <footer>
        <div>
          <span>© 2021 Juan Diego Carretero Granado</span>
        </div>
        <a class="icono_footer" href="https://github.com/JDCG00/Practicar-vocabulario-en-ingles">
            <img src="../../imgs/eng.png">
        </a>
        <script src="../../js/drag-and-drop.js"></script>
        <script src="../../js/jugar.js"></script>
    </footer>
</body>
</html>