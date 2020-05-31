<?php namespace model;

    class CtaCredito extends PagoTC{
        private $empresa;

        public function __construct($fecha, $cod_autorizacion, $total, $empresa){
            parent::($fecha, $cod_autorizacion, $total);
            $this->empresa = $empresa;
        }
        public function getEmpresa(){
            return $this->empresa;
        }
    
        public function setEmpresa($empresa){
            $this->empresa = $empresa;
        }
    }
?>