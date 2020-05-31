<?php

	namespace model;

	class Cine{
		private $id;
		private $nombre;
		private $direccion;
		private $exist;

		public function __construct($nombre, $direccion,$exist){
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->exist = $exist;
		}

		public function getId(){
			return $this->id;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getDireccion(){
			return $this->direccion;
		}

		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}

		public function setId($id){
			$this->id = $id;
		}
		
		public function getExist(){
			return $this->exist;
		}

		public function setExist($exist){
			$this->exist = $exist;
		}
	}
?>