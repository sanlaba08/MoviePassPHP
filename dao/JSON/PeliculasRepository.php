<?php
namespace dao\JSON;

use model\Pelicula as Pelicula;
use model\Genero as Genero;

class PeliculasRepository{
    private $peliculasList = array();
    private $generosList = array();
    
    public function getPeliculas(){
        $this->retrievePeliculas();
        //$this->retrieveGeneros();
        //$this->remplazarIdGenero();
        return $this->peliculasList;
    }
    public function getPeliculasList(){
        return $this->peliculasList;
    }
    
       
    public function getGeneros(){
        $this->retrieveGeneros();
        return $this->generosList;
    }
    
    private function retrievePeliculas(){       
        $json = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?page=1&language=en&api_key=e8a574c0179e15aa55f620e17fac7c9f");
        
        $arrayToDecode = ($json) ? json_decode($json, true) : array();
        $arrayPeliculas = array_shift($arrayToDecode);
        foreach($arrayPeliculas as $valuesArray)
        {
            $peli = new Pelicula($valuesArray["title"],$valuesArray["id"],$valuesArray["overview"],$valuesArray["original_language"],$valuesArray["genre_ids"],$valuesArray["poster_path"],"02:00:00");
            array_push($this->peliculasList, $peli);
        }
        
    }
    public function retrieveGeneros(){
        /* !!!!!!!!EN WAMP FUNCIONA ASI!!!!!!!!!!*/                
        $json = file_get_contents("https://api.themoviedb.org/3/genre/movie/list?api_key=e8a574c0179e15aa55f620e17fac7c9f");
        $arrayToDecode = ($json) ? json_decode($json, true) : array();
        $arrayGeneros = array_shift($arrayToDecode);
        foreach($arrayGeneros as $valuesArray)
            {
                $genero = new Genero($valuesArray["id"],$valuesArray["name"]);
                array_push($this->generosList, $genero);
            }
    }

    public function getGeneroPorId($id_buscado){
        $generoARetornar;
        for($i=0; $i < count($this->generosList) ; $i++)
        {
            $id = $this->generosList[$i]->getId();
            if($id == $id_buscado)
            {
                $generoARetornar = $this->generosList[$i];
                
            }
                
        }
        return $generoARetornar;
    }

    private function remplazarIdGenero(){
        foreach($this->peliculasList as $values){
            $generosValues = $values->getGenre_ids();
            for($i=0;$i < count($generosValues); $i++){                
                $generosValues[$i] = $this->getGeneroPorId($generosValues[$i]);               
            }
            $values->setGenre_ids($generosValues);
        }
    }
    
}
?>


