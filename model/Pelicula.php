<?php namespace model;

    class Pelicula{
        private $title;
        private $id;
        private $overview;
        private $original_language;
        private $genre_ids;
        private $imagen;
        private $duration;
        public function __construct($title, $id,$overview, $original_language,$genre_ids,$imagen,$duration){
            $this->title = $title;
            $this->id = $id;
            $this->overview = $overview;
            $this->original_language = $original_language;
            $this->genre_ids = $genre_ids;
            $this->imagen=$imagen;
            $this->duration = $duration;
        }
        public function getOverview(){
            return $this->overview;
        }
    
        public function setOverview($overview){
            $this->overview = $overview;
        }
    
        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getOriginal_language(){
            return $this->original_language;
        }
    
        public function setOriginal_language($original_language){
            $this->original_language = $original_language;
        }
    
        public function getTitle(){
            return $this->title;
        }
    
        public function setTitle($title){
            $this->title = $title;
        }
        public function getGenre_ids(){
            return $this->genre_ids;
        }
    
        public function setGenre_ids($genre_ids){
            $this->genre_ids = $genre_ids;
        }
        public function getImagen(){
            return $this->imagen;
        }
    
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }
        public function getDuration(){
            return $this->duration;
        }
    
        public function setDuration($duration){
            $this->duration = $duration;
        }

    }