<?php
    namespace model;

    class Usuario{

        private $email;
        private $password;
        private $rol;
        private $id;
        
        
        public function __construct($id,$email, $password,$rol){
            $this->id= $id;
            $this->email = $email;
            $this->password = $password;
            $this->rol = $rol;
        }

        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getRol(){
            return $this->rol;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setPass($pass){
            $this->pass = $pass;
        }

        public function setRol($rol){
            $this->rol = $rol;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        
    }