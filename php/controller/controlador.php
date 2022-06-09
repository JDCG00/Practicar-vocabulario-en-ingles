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
        function jugarVista(){
            require_once('../view/juega.php');
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
                        $this->modelo->sacarPalabrasEjercicios($idEjercicio);
                        if (isset($this->modelo->palabras)) {
                            $this->palabras = $this->modelo->palabras;
                        }
                    }
                }
            }
        }
    }

    $controlador = new Controlador;
    if (isset($_GET['accion'])) {
        ob_start();
        switch ($_GET['accion']) {
            case 'crear':
                $controlador->crearEjercicioVista();
                break;            
            case 'jugar':
                $controlador->jugarVista();
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