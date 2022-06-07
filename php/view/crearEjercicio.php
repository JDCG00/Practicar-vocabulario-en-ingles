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
            <li class="icono"><a href="../index.php" class="nav-link"><img src="../../imgs/english.png"></a></li>
            <li><a href="juega.php" class="nav-link">Juega</a></li>
            <li><a href="informacion.php" class="nav-link">Información</a></li>
            <li><a href="contacto.php" class="nav-link">Contacta</a></li>
        </ul>
        <ul class="nav nav-boton" id="login">
            <li id="inicio_sesion" class="icono"><a href="login.php" class="nav-link"><img src="../../imgs/user.png">Login</a></li>
            <li><a href="#" class="nav-link activado">Crear Ejercicio</a></li>
        </ul>
    </nav>
    <div class="contenedor">
        <form class="form" action="#" method="post" enctype="multipart/form-data">
            <div class="title">Crear ejercicios</div>
            <div class="subtitle">Introduzca datos</div>
            <div class="input-container ic1">
                <input class="input" type="text" placeholder=" " name="nombre" />
                <div class="cut"></div>
                <label class="placeholder" for="nombre">Nombre Ejercicio</label>
            </div>
            <div class="input-container ic2">
                <input class="input" type="text" placeholder=" " name="descripcion" />
                <div class="cut"></div>
                <label for="descripcion" class="placeholder">Descripción</label>
            </div>
            <div class="input-container ic2">
                <select class="input" name="tipo">
                    <option value="c">Clasificación</option>
                    <option value="l">Listening</option>
                </select>
                <div class="cut"></div>
                <label for="tipo" class="placeholder">Tipo</label>
            </div>
            <div class="input-container ic2">
                <select class="input" name="clase">
                    <option value="1">1DAW</option>
                    <option value="2">2DAW</option>
                    <option value="3">1SMR</option>
                    <option value="4">2SMR</option>
                    <option value="5">4ESO</option>
                </select>
                <div class="cut"></div>
                <label for="clase" class="placeholder">Clase</label>
            </div>
            <div class="input-container ic2">
                <input class="input" type="text" placeholder=" " name="palabras" />
                <div class="cut"></div>
                <label for="palabras" class="placeholder">Nº de palabras a añadir</label>
            </div>
            <input class="submit" type="submit" name="crear" value="Crear Ejercicio">
        </form>
        <?php
            if (isset($_POST['crear'])) {
                require_once('../controller/controlador.php');
                $controlador = new Controlador;
                $controlador->crearEjercicio();

                if (empty($_POST['nombre'])) {
                    echo "<div class=error>Debe rellenar el nombre.</div>";
                }else{
                    echo "<div class=correcto>Datos introducidos correctamente.</div>";
                }
            }
        ?>
    </div>
    <footer>
        <div>
          <span>© 2021 Juan Diego Carretero Granado</span>
        </div>
        <a class="icono_footer" href="https://github.com/JDCG00/Practicar-vocabulario-en-ingles">
            <img src="../../imgs/eng.png">
        </a>
    </footer>
</body>
</html>
