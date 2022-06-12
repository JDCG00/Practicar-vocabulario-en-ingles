<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);        
    
 +  $idEjercicio = array_pop($datos);
 
    // print_r($datos);

    require_once('../model/modelo.php');
    $modelo = new Modelo;
    foreach ($datos as $idPalabra => $idCategoria) {
        $modelo->validarPalabras($idEjercicio, $idPalabra, $idCategoria);
        $idPalabras =  $modelo->idPalabras['idPalabra'];
        
        if($modelo->booleano==true){
            $valores[$idPalabras] = "correcto";
        }else {
            $valores[$idPalabras] = "incorrecto";
        }
    }

    header('Content-Type: application/json; charset=utf-8');
    echo $datos_final = json_encode($valores);
    file_put_contents('../../js/validacion.json', $datos_final);
?>
