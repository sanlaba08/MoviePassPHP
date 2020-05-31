<?php namespace model;
    class Entrada{
        private $nro_entrada;
        private $qr_code;

        public function __construct($nro_entrada, $qr_code){
            $this->nro_entrada = $nro_entrada;
            $this->qr_code = $qr_code;
        }

        public function getNro_entrada(){
            return $this->nro_entrada;
        }
    
        public function setNro_entrada($nro_entrada){
            $this->nro_entrada = $nro_entrada;
        }
    
        public function getQr_code(){
            return $this->qr_code;
        }
    
        public function setQr_code($qr_code){
            $this->qr_code = $qr_code;
        }
    }
?>