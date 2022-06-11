<?php
    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);        
    
    $idEjercicio = array_pop($datos);
    
    print_r($datos);

    require_once('../model/modelo.php');
    $modelo = new Modelo;
    foreach ($datos as $indice => $dato) {
        $modelo->validarPalabras($idEjercicio, $indice, $dato);
        if($modelo->booleano==true){
            $valores[$indice] = 1;
        }else {
            $valores[$indice] = 0;
        }
    }
    print_r($valores);
    // require_once('../controller/controlador.php');
    // $controlador = new Controlador;
    // $controlador->corregir($valores);
?>