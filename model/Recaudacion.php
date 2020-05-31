<?php

	namespace model;

	class Recaudacion{
		private $titulo;
		private $cantidad_entradas;
		private $totalFinal;
		

		public function __construct($titulo, $cantidad_entradas, $totalFinal){
			$this->titulo = $titulo;
			$this->cantidad_entradas = $cantidad_entradas;
			$this->totalFinal = $totalFinal;
		}

        public function getTitulo(){
            return $this->titulo;
        }
    
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }
    
        public function getCantidad_entradas(){
            return $this->cantidad_entradas;
        }
    
        public function setCantidad_entradas($cantidad_entradas){
            $this->cantidad_entradas = $cantidad_entradas;
        }
    
        public function getTotalFinal(){
            return $this->totalFinal;
        }
    
        public function setTotalFinal($totalFinal){
            $this->totalFinal = $totalFinal;
        }
    }