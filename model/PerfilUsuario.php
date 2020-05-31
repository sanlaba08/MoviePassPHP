<?php namespace model;

    class PerfilUsuario extends Usuario{
        private $nombre;
        private $apellido;
        private $dni;

        public function __construct($id,$email, $password, $rol,$nombre, $apellido, $dni){
            parent::__construct($id,$email,$password,$rol);
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->dni = $dni;
        }
        
        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    
        public function getApellido(){
            return $this->apellido;
        }
    
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
    
        public function getDni(){
            return $this->dni;
        }
    
        public function setDni($dni){
            $this->dni = $dni;
        }
    }
?>