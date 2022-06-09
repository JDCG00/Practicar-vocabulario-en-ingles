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
            $this->conex -> query($insertarEjercicios);
            $id = $this->conex->insert_id;
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
            $sacarTodosCodigos = "SELECT idEjercicio, codEjercicio FROM ejercicios;";
            $resultado = $this->conex->query($sacarTodosCodigos);
            while ($codigo = $resultado->fetch_array()) {
                $this->codigos[] = $codigo;
            }
        }
        function sacarPalabrasEjercicios($idEjercicio){
            $sacarPalabras = "SELECT palabras.idPalabra, palabras.nombre FROM ejercicios_palabras INNER JOIN palabras ON palabras.idPalabra = ejercicios_palabras.idPalabra WHERE idEjercicio=$idEjercicio;";
            $resultado = $this->conex ->query($sacarPalabras);

            while ($palabra = $resultado->fetch_array()) {
                $this->palabras[] = $palabra;
            }
        }
    }
?>