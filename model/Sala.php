<?php

	namespace model;

	class Sala{
		private $id;
		private $nombre;
        private $precio;
        private $id_cine;
        private $capacidad;
        private $exist;
        
        public function __construct($nombre,$id_cine, $precio, $capacidad, $exist){
            $this->nombre = $nombre;
            $this->id_cine = $id_cine;
            $this->precio = $precio;
            $this->capacidad = $capacidad;
            $this->exist = $exist;
			
		}
        
        public function getID(){
            return $this->id;
        }
    
        public function setID($id){
            $this->id = $id;
        }
    
        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    
        public function getPrecio(){
            return $this->precio;
        }
    
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function getCine(){
            return $this->id_cine;
        }
    
        public function setCine($id_cine){
            $this->id_cine = $id_cine;
        }
    
        public function getCapacidad(){
            return $this->capacidad;
        }
    
        public function setCapacidad($capacidad){
            $this->capacidad = $capacidad;
        }
        public function getExist(){
			return $this->exist;
		}

		public function setExist($exist){
			$this->exist = $exist;
		}
    }