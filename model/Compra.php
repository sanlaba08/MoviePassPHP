<?php
    namespace model;
    class Compra{
        private $id_compra;
        private $funcion;
        private $fecha;
        private $cantidad_entradas;
        private $total;
        private $descuento;
        private $usuario;

        public function __construct($funcion, $fecha,$cantidad_entradas,$total,$usuario){
            $this->funcion = $funcion;
            $this->fecha = $fecha;
            $this->cantidad_entradas = $cantidad_entradas;
            $this->total = $total;
            $this->usuario = $usuario ;
        }

        public function getID(){
            return $this->id_compra;
        }
    
        public function setID($id_compra){
            $this->id_compra = $id_compra;
        }

        public function getFuncion(){
            return $this->funcion;
        }
    
        public function setFuncion($funcion){
            $this->funcion = $funcion;
        }
        
        public function getFecha(){
            return $this->fecha;
        }
    
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
    
        public function getCantidad_entradas(){
            return $this->cantidad_entradas;
        }
    
        public function setCantidad_entradas($cantidad_entradas){
            $this->cantidad_entradas = $cantidad_entradas;
        }
    
        public function getTotal(){
            return $this->total;
        }
    
        public function setTotal($total){
            $this->total = $total;
        }
    
        public function getDescuento(){
            return $this->descuento;
        }
    
        public function setDescuento($descuento){
            $this->descuento = $descuento;
        }
        public function getUsuario(){
            return $this->usuario;
        }
    
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

    }

?>
