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
            <li id="inicio_sesion" class="icono">
                <a href="controlador.php?accion=login" class="nav-link">
                    <img src="../../imgs/user.png">
                    <?php
                        if (!empty($_SESSION)) {
                            echo "Logout</br>
                                    ".$_SESSION['nombre']."
                                ";
                        }else {
                            echo "Login";
                        }
                    ?>
                </a>
            </li>
            <?php
                if (!empty($_SESSION)) {
                    if ($_SESSION['tipo']=='a' OR $_SESSION['tipo']=='p') {
                        echo "
                                <li><a href='controlador.php?accion=crear' class='nav-link'>Crear Ejercicio</a></li>
                                <li><a href='controlador.php?accion=crearPalabras' class='nav-link'>Crear Palabras</a></li>
                        ";
                    }
                    if ($_SESSION['tipo']=='a') {
                        echo "
                            <li><a href='controlador.php?accion=crearProfesor' class='nav-link'>Crear Profesor</a></li>
                        ";
                    }
                }
            ?>
        </ul>
    </nav>
    <div class="contenedor">
         <form id="formCodigo" class="form" action="#" method="post">
            <div class="subtitle">Introducir el código del ejercicio</div>
            <div class="input-container ic2">
                <input class="input" type="text" placeholder=" " name="codigo" minlength="6" maxlength="6" />
                <div class="cut"></div>
                <label for="codigo" class="placeholder">Código</label>
            </div>
            <input id="acceder" class="submit" type="submit" name="acceder" value="Acceder">
        </form>
        <?php
            if (isset($_POST['acceder'])) {
                if (!empty($_POST['codigo'])) {
                    require_once('../controller/controlador.php');
                    $controlador = new Controlador;
                    $controlador->accederCodigo();
                    $codigos = $controlador->codigos;

                    $booleano = false;
                    foreach ($codigos as $codigo) {
                        if($_POST['codigo']===$codigo['codEjercicio']){
                            $booleano = true;
                            break;
                        }
                    }  
                    if ($booleano==false) {
                        echo "<div class=error>Debe acceder con un código correcto.</div>";    
                    } 
                }else {
                    echo "<div class=error>Debe poner un código.</div>";
                }
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
    </footer>
</body>
</html>