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
        <?php
            if (isset($_GET['id'])) {
                require_once('../controller/controlador.php');
                $controlador = new Controlador;
                $idEjercicio = $_GET['id'];
                $controlador->listarPalabras();
                echo "<form id='formPalabras' class='formPalabras' action='#' method='post'>
                        <div id='words' class='container'>
                            Words";
                if (isset($controlador->palabras)) {
                    $palabras = $controlador->palabras;
                    foreach ($palabras as $palabra) {
                        echo     "<p id='".$palabra['idPalabra']."' class='draggable' draggable='true'>".$palabra['nombre']."</p>";
                    }
                }else{
                    echo "<div class=error>No existen palabras.</div>";
                }
                echo "  </div>";
                if (isset($controlador->categorias)) {
                    $categorias = $controlador->categorias;
                    foreach ($categorias as $categoria) {
                        echo"   
                            <div id='".$categoria['idCategoria']."' class='container'>
                                ".$categoria['nombre']."
                            </div>";
                    }
                }
                echo"
                        <button id='corregir' class='submit' type='button' name='corregir'>Corregir</button>
                    </form>
                    ";
                    
                // $controlador->corregir();
            }
    
        ?>
        
    </div>
    <footer>
        <div>
          <span>© 2022 Juan Diego Carretero Granado</span>
        </div>
        <a class="icono_footer" href="https://github.com/JDCG00/Practicar-vocabulario-en-ingles">
            <img src="../../imgs/eng.png">
        </a>
        <script src="../../js/drag-and-drop.js"></script>
        <script src="../../js/jugar.js"></script>
    </footer>
</body>
</html>