<?php namespace model;

    class PagoTC{

        private $fecha;
        private $cod_autorizacion;
        private $total;

        public function __construct($fecha, $cod_autorizacion){
            $this->fecha = $fecha;
            $this->cod_autorizacion = $cod_autorizacion;
            $this->total = $total;
        }

        public function getFecha(){
            return $this->fecha;
        }
    
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
    
        public function getCod_autorizacion(){
            return $this->cod_autorizacion;
        }
    
        public function setCod_autorizacion($cod_autorizacion){
            $this->cod_autorizacion = $cod_autorizacion;
        }
    
        public function getTotal(){
            return $this->total;
        }
    
        public function setTotal($total){
            $this->total = $total;
        }
    }

?>