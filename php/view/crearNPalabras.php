<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../imgs/united-kingdom.png">
    <link rel="stylesheet" href="../../css/estiloPalabrasForm.css">
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
                            <li><a href='#' class='nav-link activado'>Crear Palabras</a></li>
                            <li><a href='controlador.php?accion=crearProfesor' class='nav-link'>Crear Profesor</a></li>
                        ";
                    }
                }
            ?>
        </ul>
    </nav>
    <div class="contenedor">
        <form class="form" action="#" method="post">
            <div class="title">Crear Palabras</div>
            <div class="subtitle">Introduzca datos</div>
            <?php
                require_once('../controller/controlador.php');
                $controlador = new Controlador;
                $controlador->crearNPalabras();
                $categorias = $controlador->listarCategorias;
                if (isset($_GET['nPalabras'])) {
                    for ($i=0; $i < $_GET['nPalabras']; $i++) { 
                        echo "
                            <div class='input-container ic1'>
                                <input class='input' type='text' placeholder=' ' name='nombre[]' />
                                <div class='cut'></div>
                                <label class='placeholder' for='nombre[]'>Nombre Palabra</label>
                            </div>
                            <div class='input-container ic2'>
                                <select class='input' name='tipo[]'>
                            ";
                            foreach ($categorias as $categoria) {
                               echo "<option value='".$categoria['idCategoria']."'>".$categoria['nombre']."</option>";
                            }
                            echo "      
                                </select>
                                <div class='cut'></div>
                                <label for='categoria' class='placeholder'>Categoria</label>
                            </div>";
                    }
                }
            ?>
            
            <input class="submit" type="submit" name="crear" value="Crear Palabras">
        </form>
        <?php
            if (isset($_POST['crear'])) {                
                if (in_array(NULL, $_POST['nombre'])) {
                    echo "<div class=error>Debe rellenar todos los nombres.</div>";
                }else{
                    echo "<div class=correcto>Datos introducidos correctamente.</div>";
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
