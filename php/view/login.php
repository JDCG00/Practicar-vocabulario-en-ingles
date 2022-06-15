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
            <li><a href="controlador.php?accion=codigo" class="nav-link">Juega</a></li>
            <li><a href="controlador.php?accion=informacion" class="nav-link">Información</a></li>
            <li><a href="controlador.php?accion=contacto" class="nav-link">Contacta</a></li>
        </ul>
        <ul class="nav nav-boton" id="login">
            <li id="inicio_sesion" class="icono">
                <a href="#" class="nav-link activado">
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
        <?php
            if (empty($_SESSION)) {
                echo "
                        <div class='screen'>
                            <div class='screen__content'>
                                <form class='login' action='#' method='POST'>
                                    <div class='login__field'>
                                        <i class='login__icon fas fa-user'></i>
                                        <input type='email' name='email' class='login__input' placeholder='E-mail'>
                                    </div>
                                    <div class='login__field'>
                                        <i class='login__icon fas fa-lock'></i>
                                        <input type='password' name='password' class='login__input' placeholder='Contraseña'>
                                    </div>
                                    <input type='submit' name='acceder' value='Acceder' class='button login__submit'>
                                        <i class='button__icon fas fa-chevron-right'></i>
                                    </input>
                                </form>
                            </div>
                            <div class='screen__background'>
                                <span class='screen__background__shape screen__background__shape4'></span>
                                <span class='screen__background__shape screen__background__shape3'></span>		
                                <span class='screen__background__shape screen__background__shape2'></span>
                                <span class='screen__background__shape screen__background__shape1'></span>
                            </div>
                        </div>
                ";
            }else{
                echo "
                    <form class='login' action='#' method='POST'>
                        <input type='submit' name='logout' value='Cerrar Sesión' class='button login__submit'>
                            <i class='button__icon fas fa-chevron-right'></i>
                        </input>
                    </form>
                ";
            }
            require_once('../controller/controlador.php');
            $controlador = new Controlador;
            if (isset($_POST['logout'])) {
                echo "<div class=correcto>Cierre de sesión correcto.</div>";
                $controlador->cerrarSesion();
            }
            if (isset($_POST['acceder'])){
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $controlador->validarLogin();
                    if ($controlador->booleano == true) {
                        echo "<div class=correcto>Inicio de sesión correcto.</div>";
                    }else{
                        echo "<div class=error>Usuario y/o contraseña incorrecto.</div>";
                    }
                }else{
                    echo "<div class=error>Debe rellenar el email y la contraseña.</div>";
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