<?php namespace model;

    class Funcion{
       
        private $id;
        private $sala;
        private $pelicula;
        private $fecha;
        private $hora;
        private $hora_final;
       
    
        public function __construct($sala, $pelicula, $fecha, $hora){
            $this->sala = $sala;
            $this->pelicula = $pelicula;
            $this->fecha = $fecha;
            $this->hora = $hora;
         
        }
       
        
        public function getID(){
            return $this->id;
        }

        public function getHora_final(){
            return $this->hora_final;
        }

        public function getSala(){
            return $this->sala;
        }
        public function getPelicula(){
            return $this->pelicula;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getHora(){
            return $this->hora;
        }
       
        public function setSala($sala){
            $this->sala = $sala;
        }
        public function setPelicula($pelicula){
            $this->pelicula = $pelicula;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function setHora($hora){
            $this->hora = $hora;
        }
        public function setHora_final($hora_final){
            $this->hora_final = $hora_final;
        }
       public function setID($id){
            $this->id = $id;
        }
    }


?>
