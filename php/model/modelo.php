<?php
    require_once('../configdb.php');
    
    class Modelo{
        public $filas;
        public $conex;

        function __construct(){
            $this->conex = new mysqli(SERVIDOR,USUARIO,PASSWORD,BD);
        }
        function test(){
            $consulta = "SELECT * FROM ejercicios;";
            $resultado = $this->conex -> query($consulta);
            echo $consulta;
            while ($filas = $resultado->fetch_array()) {
                $this->filas[] = $filas;
            }
            echo "<br>";
            print_r($this->filas);
            
        }
    }

    $modelo = new Modelo;
    $modelo -> test();
?>