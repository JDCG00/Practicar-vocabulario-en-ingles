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
        function crearEjercicio(){
            if (isset($_POST['crear'])) {
                if (!empty($_POST['nombre'])) {
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
                    $this -> modelo -> insertEjercicio($nombre, $descripcion, $tipo, $clase, $codigoEjercicio);
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
            
            default:
                header('Location:../view/accion_no_encontrada.html');
                break;
        }
    }else{
        header('Location:../view/error.html');
    }
    ob_end_flush();


?>