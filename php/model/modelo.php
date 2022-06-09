<?php
    require_once('../configdb.php');
    
    class Modelo{
        public $filas;
        public $conex;

        function __construct(){
            $this->conex = new mysqli(SERVIDOR,USUARIO,PASSWORD,BD);
        }
        function insertEjercicio($nombre, $descripcion, $tipo, $clase, $codigoEjercicio, $palabras){
            $insertarEjercicios = "INSERT INTO ejercicios (nombre, descripcion, tipo, idClase, codEjercicio) VALUES ($nombre, $descripcion, $tipo, $clase, $codigoEjercicio);";

            $sacarUltimoId = "SELECT idEjercicio FROM ejercicios ORDER BY idEjercicio DESC LIMIT 1;";
            $this->conex -> query($insertarEjercicios);
            $resultado = $this->conex ->query($sacarUltimoId);
            $filaUltId = $resultado->fetch_array();
            $id = $filaUltId['idEjercicio'];
            foreach ($palabras as $palabra) {
                $insertarPalabrasEjercicio = "INSERT INTO ejercicios_palabras VALUES($id, $palabra);";
                $this->conex -> query($insertarPalabrasEjercicio);
            }
        }
        function listarTodasPalabras(){
            $listarPalabras = "SELECT * from palabras;";
            $resultado = $this->conex->query($listarPalabras);
            while ($fila = $resultado->fetch_array()) {
                $this->filas[] = $fila;
            }
        }
        function sacarCodigo(){

        }
        function sacarPalabrasEjercicios(){
            $sacarPalabras = "SELECT ejercicios_palabras.idEjercicio, palabras.nombre FROM ejercicios_palabras INNER JOIN palabras ON palabras.idPalabra = ejercicios_palabras.idPalabra WHERE idEjercicio=5;";

            $this->conex ->query($sacarPalabras);
            

        }
    }
?>