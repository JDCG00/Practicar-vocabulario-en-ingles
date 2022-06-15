<?php
    class Controlador{
        public $modelo;
        function __construct(){
            require_once('../model/modelo.php');
            $this->modelo = new Modelo;
        }
        function crearEjercicioVista(){
            require_once('../view/crearEjercicio.php');
        }
        function crearPalabrasVista(){
            require_once('../view/crearPalabras.php');
        }
        function crearNPalabrasVista(){
            require_once('../view/crearNPalabras.php');
        }
        function crearProfesorVista(){
            require_once('../view/crearProfesor.php');
        }
        function jugarVista(){
            require_once('../view/juega.php');
        }
        function codigoVista(){
            require_once('../view/codigo.php');
        }
        function informacionVista(){
            require_once('../view/informacion.php');
        }
        function contactoVista(){
            require_once('../view/contacto.php');
        }
        function loginVista(){
            require_once('../view/login.php');
        }
        function añadirPalabras(){
            $this->modelo -> listarTodasPalabras();
            $this->todasPalabras = $this->modelo->filas;
        }
        function crearEjercicio(){
            if (isset($_POST['crear'])) {
                if (!empty($_POST['nombre'] && isset($_POST['palabras']))) {
                    $nombre = "'".$_POST['nombre']."'";
                    if (empty($_POST['descripcion'])) {
                        $descripcion = 'NULL';
                    }else{
                        $descripcion = "'".$_POST['descripcion']."'";
                    }
                    $tipo = "'".$_POST['tipo']."'";
                    $clase = "'".$_POST['clase']."'";
                    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $codigoEjercicio = NULL;
                    for ($i=0; $i < 6 ; $i++) { 
                        $indice = rand(0, strlen($caracteres) - 1);
                        $codigoEjercicio .= $caracteres[$indice];
                    }
                    $codigoEjercicio = "'$codigoEjercicio'";
                    $palabras = $_POST['palabras'];
                    $this -> modelo -> insertEjercicio($nombre, $descripcion, $tipo, $clase, $codigoEjercicio, $palabras);
                }
            }
        }
        function accederCodigo(){
            if (isset($_POST['acceder'])) {
                if (!empty($_POST['codigo'])) {
                    $this->modelo->sacarCodigo();
                    $this->codigos = $this->modelo->codigos;
                    
                    $booleano = false;
                    foreach ($this->codigos as $codigo) {
                        if($_POST['codigo']===$codigo['codEjercicio']){
                            $booleano = true;
                            break;
                        }
                    }
                    if ($booleano==true) {
                        $idEjercicio = $codigo['idEjercicio'];
                        header("Location:controlador.php?accion=jugar&id=$idEjercicio");
                    }
                }
            }
        }
        function listarPalabras(){
            if (!empty($_GET['id'])) {
                $idEjercicio = $_GET['id'];
                $this->modelo->sacarPalabrasEjercicios($idEjercicio);
                $this->ejercicios = $this->modelo->sacarEjercicios;
                if (isset($this->modelo->palabras) && isset($this->modelo->categorias)) {
                    $this->palabras = $this->modelo->palabras;
                    $this->categorias = $this->modelo->categorias;
                }
            }
        }
        function crearPalabras(){
            if (isset($_POST['añadir']) && !empty($_POST['nPalabras'])) {
                $nPalabras = $_POST['nPalabras'];
                header("Location:controlador.php?accion=crearNPalabras&nPalabras=$nPalabras");                   
            }
        }
        function crearNPalabras(){
            $this->modelo->listarCategorias();
            $this->listarCategorias = $this->modelo->listarCategorias;
            if (isset($_POST['crear'])){
                if (!in_array(NULL, $_POST['nombre'])) {
                    $nombres = $_POST['nombre'];
                    $categorias = $_POST['tipo'];
                    foreach ($nombres as $indice => $nombre) {
                        $arrayPalabras[$nombre] = $categorias[$indice];
                    }
                    $this->modelo->insertarPalabras($arrayPalabras);
                }
            }
        }
        function validarLogin(){
            if (!empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['acceder'])) {
                $email = $_POST['email'];
                $this->modelo->validarLogin($email);
                $idUsuario = $this->modelo->idUsuario;
                $nombre = $this->modelo->nombre;
                $password = $this->modelo->password;
                $tipo = $this->modelo->tipo;
                if($this->modelo->booleano==true && password_verify($_POST['password'], $password)){
                    $this->booleano = true;
                    $_SESSION['idUsuario'] = $idUsuario;
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['tipo'] = $tipo;
                    header("Refresh:0.5");
                }else {
                    $this->booleano = false;
                }
            }
        }
        function cerrarSesion(){
            if (isset($_POST['logout'])) {
                header("Refresh:0.5");
                session_destroy();
            }
        }
        function crearProfesor(){
            if (isset($_POST['crear']) && !empty($_POST['nombre'] && $_POST['email'] && $_POST['password'])) {
                $nombre = "'".$_POST['nombre']."'";
                $email = "'".$_POST['email']."'";
                $password = "'".$_POST['nombre']."'";
                echo $nombre, $email, $password;
                $this->modelo->crearProfesor($nombre, $email, $password);
            }
        }
    }

    $controlador = new Controlador;
    if (isset($_GET['accion'])) {
        ob_start();
        session_start();
        switch ($_GET['accion']) {
            case 'crear':
                $controlador->crearEjercicioVista();
                break;            
            case 'crearPalabras':
                $controlador->crearPalabrasVista();
                break;            
            case 'crearNPalabras':
                $controlador->crearNPalabrasVista();
                break;            
            case 'crearProfesor':
                $controlador->crearProfesorVista();
                break;            
            case 'jugar':
                $controlador->jugarVista();
                break;            
            case 'codigo':
                $controlador->codigoVista();
                break;            
            case 'informacion':
                $controlador->informacionVista();
                break;            
            case 'contacto':
                $controlador->contactoVista();
                break;            
            case 'login':
                $controlador->loginVista();
                break;            
            default:
                header('Location:../view/accion_no_encontrada.html');
                break;
        }
    }else{
        header('Location:../view/error.html');
    }
    ob_end_flush();


?>