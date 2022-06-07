<?php
    require_once('../configdb.php');
    
    class Modelo{
        public $filas;
        public $conex;

        function __construct(){
            $this->conex = new mysqli(SERVIDOR,USUARIO,PASSWORD,BD);
        }
        function insertEjercicio($nombre, $descripcion, $tipo, $clase, $codigoEjercicio){
            $consulta = "INSERT INTO ejercicios (nombre, descripcion, tipo, idClase, codEjercicio) VALUES ($nombre, $descripcion, $tipo, $clase, $codigoEjercicio);";
            $this->conex -> query($consulta);
        }
    }
?>