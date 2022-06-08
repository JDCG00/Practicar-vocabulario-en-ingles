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
            <li><a href="controlador.php?accion=jugar" class="nav-link">Juega</a></li>
            <li><a href="controlador.php?accion=informacion" class="nav-link">Información</a></li>
            <li><a href="controlador.php?accion=contacto" class="nav-link">Contacta</a></li>
        </ul>
        <ul class="nav nav-boton" id="login">
            <li id="inicio_sesion" class="icono"><a href="controlador.php?accion=login" class="nav-link"><img src="../../imgs/user.png">Login</a></li>
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
            <div class="palabras2">
                <div class="input-container ic2">
                    <input class="input" type="number" placeholder=" " name="nPalabras" min="1"/>
                    <div id="cut_palabras" class="cut"></div>
                    <label for="palabras" class="placeholder">Nº de palabras a añadir</label>
                </div>            
                <input class="submit" type="submit" name="añadir" value="Añadir Palabras">
            </div>
            <?php
                require_once('../controller/controlador.php');
                $controlador = new Controlador;
                if (isset($_POST['añadir'])) {
                    $controlador->añadirPalabras();
                    $todasPalabras = $controlador->todasPalabras;
                    if (!empty($_POST['nPalabras'])) {
                        echo "
                                <div class='palabras'>
                                    <div class='title'>Palabras a añadir</div>
                        ";
                        for ($i=0; $i < $_POST['nPalabras']; $i++) { 
                            echo "<select class='selectPalabras' name='palabras[]'>";
                            foreach ($todasPalabras as $palabra) {
                                echo "<option value='".$palabra['idPalabra']."'>".$palabra['nombre']."</option>";
                            }
                            echo "</select>";
                            
                        }
                        echo    "<input class='submit' type='submit' name='volver' value='Volver'>";
                        echo "  </div>";
                        if (isset($_POST['volver'])) {
                            header("Location: controlador.php?accion=crear");
                        }
                    }else{
                        echo "<div class=error>Debe rellenar el número de palabras.</div>";
                    }
                }

            ?>
            
            <input class="submit" type="submit" name="crear" value="Crear Ejercicio">
        </form>
        <?php
            if (isset($_POST['crear'])) {
                
                $controlador->crearEjercicio();

                if (empty($_POST['nombre'])) {
                    echo "<div class=error>Debe rellenar el nombre y el número de palabras.</div>";
                }else{
                    echo "<div class=correcto>Datos introducidos correctamente.</div>";
                }
                print_r($_POST);
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
