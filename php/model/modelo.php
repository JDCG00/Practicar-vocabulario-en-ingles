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
            $sacarEjercicios = "SELECT * from ejercicios WHERE idEjercicio=$idEjercicio;";
            $resultado3 = $this->conex->query($sacarEjercicios);
            $this->sacarEjercicios = $resultado3->fetch_assoc();

            $sacarPalabras = "SELECT palabras.idPalabra, palabras.nombre FROM ejercicios_palabras INNER JOIN palabras ON palabras.idPalabra = ejercicios_palabras.idPalabra WHERE idEjercicio=$idEjercicio;";
            $resultado = $this->conex ->query($sacarPalabras);

            while ($palabra = $resultado->fetch_array()) {
                $this->palabras[] = $palabra;
            }
            $sacarCategorias = "SELECT DISTINCT palabras.idCategoria, categorias.nombre
            FROM ejercicios_palabras 
            INNER JOIN palabras ON palabras.idPalabra = ejercicios_palabras.idPalabra
            INNER JOIN categorias ON categorias.idCategoria = palabras.idCategoria
            where idEjercicio= $idEjercicio;";
            $resultado2 = $this->conex->query($sacarCategorias);
            
            while ($categoria = $resultado2->fetch_array()) {
                $this->categorias[] = $categoria;
            }
        }
        function validarPalabras($idEjercicio, $idPalabra, $idCategoria){
            $validarPalabras = "SELECT palabras.idCategoria, palabras.idPalabra
            FROM ejercicios_palabras 
            INNER JOIN palabras ON palabras.idPalabra = ejercicios_palabras.idPalabra
            INNER JOIN categorias ON categorias.idCategoria = palabras.idCategoria
            WHERE idEjercicio=? AND palabras.idPalabra = ? AND palabras.idCategoria=?;";
            $resultado = $this->conex->prepare($validarPalabras);
            $resultado->bind_param("sss", $idEjercicio, $idPalabra, $idCategoria);
            $resultado->execute();
            if ($resultado->fetch()!==null) {
                $this->booleano = true;
            }else{
                $this->booleano = false;
            }
            $resultado->close();
            $sacarIdPalabras = "SELECT palabras.idPalabra
            FROM ejercicios_palabras 
            INNER JOIN palabras ON palabras.idPalabra = ejercicios_palabras.idPalabra
            INNER JOIN categorias ON categorias.idCategoria = palabras.idCategoria
            WHERE idEjercicio=$idEjercicio AND palabras.idPalabra = $idPalabra;";

            $resultado2 = $this->conex->query($sacarIdPalabras);
            $this->idPalabras = $resultado2->fetch_assoc();
        }
        function listarCategorias(){
            $sacarTodasCategorias = "SELECT * FROM categorias ORDER BY idCategoria ASC;";
            $resultado = $this->conex->query($sacarTodasCategorias);
            while ($categoria = $resultado->fetch_array()) {
                $this->listarCategorias[] = $categoria;
            }
        }
        function insertarPalabras($arrayPalabras){
            foreach ($arrayPalabras as $nombre => $categoria) {
                $insertarPalabras = "INSERT INTO palabras (nombre, idCategoria) VALUES(?, ?);";
                $resultado = $this->conex->prepare($insertarPalabras);
                $resultado->bind_param("ss", $nombre, $categoria);
                $resultado->execute();
            }
            $resultado->close();
        }
        function validarLogin(){
            
        }
    }
?>