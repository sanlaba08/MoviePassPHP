<?php namespace controller;

use config\autoload as Autoload;
use model\Funcion as Funcion;
use model\Genero as generos;
use dao\JSON\peliculasRepository as PeliculasRepository;
use controller\funcionController as funcionController;
use controller\peliculasController as peliculasController;
use controller\homeController as homeController;

class carteleraController{
    public function __construct(){
        $this->homeController = new homeController();
    }

    public function filterByCategory($categoria){
        //no usamos mas estas funciones de JSON.
        /*$PeliculasRepository = new PeliculasRepository();
        $PeliculasRepository->getPeliculas();
        $pelis = $PeliculasRepository->getPeliculasList();*/
      if($categoria != "Todos los generos"){
        $peliculasController = new peliculasController();
        $pelis= $peliculasController->getPeliculas();
        $pelisFiltradas=array();
        $flag = false;
        $funcionController = new funcionController();
        $arrayFuncion = $funcionController->getFunciones();
            for($i=0; $i< count($pelis);$i++){
                foreach($arrayFuncion as $valor){
                    if($pelis[$i]->getTitle() == $valor->getPelicula()->getTitle()){
                        $generos = $pelis[$i]->getGenre_ids();
                        foreach($generos as $values){
                            $gen = $peliculasController->getGeneroById($values);
                            if($categoria == $gen->getNombre()){
                                array_push($pelisFiltradas,$pelis[$i]);
                                $flag = true;
                                }
                            }
                            break;
                            
                        }
                }
        }
        if($flag){
            $home = new homeController();
            $msj='Se han encontrado peliculas relacionadas a la categoría seleccionada.';
            $type='success';
            $home->viewCartelera($pelisFiltradas,$msj,$type);           
        }
        else{
            $msj='Lo siento, no se han encontrado peliculas relacionadas a la categoría seleccionada.';
            $type='error';
            $this->viewAllMovies($msj,$type);
        }
      }else{
        $msj='Se mostrarán todas las peliculas de la cartelera.';
        $type='success';
        $this->viewAllMovies($msj,$type);
          
      }
    }

    public function filterByDate($fecha){
        $PeliculasRepository = new PeliculasRepository();
        $PeliculasRepository->getPeliculas();
        $pelis = $PeliculasRepository->getPeliculasList();
        $pelisFiltradas=array();
        $funcionController = new funcionController();
        $arrayFuncion = $funcionController->getFunciones();
        $flag = false;
        for($i=0; $i< count($pelis);$i++){
            foreach($arrayFuncion as $valor){
                if($pelis[$i]->getTitle() == $valor->getPelicula()->getTitle()){
                    if($fecha == $valor->getFecha()){
                        array_push($pelisFiltradas,$pelis[$i]);
                        $flag = true;
                    }
                }
            break;
            }
        }
        if($flag){
            $home = new homeController();
            $msj='Se han encontrado peliculas relacionadas a la fecha seleccionada.';
            $type='success';
            $home->viewCartelera($pelisFiltradas,$msj,$type);
        }
        else{
            $msj='Lo siento, no se han encontrado peliculas relacionadas a la fecha seleccionada.';
            $type='error';
            $this->viewAllMovies($msj,$type);
        }
    }

    public function ViewDetallePelicula($title){
        
        $home = new homeController();
        $home->ViewDetallePelicula($title,null,null);
        
    }
    public function viewAllMovies($msj, $type){
        $peliculas = new peliculasController();
        $home = new homeController();
        $pelis=$peliculas->getPeliculas();
        $home->viewCartelera($pelis,$msj,$type);
    }

    public function verTodasLasPeliculas(){
        $peliculas = new peliculasController();
        $home = new homeController();
        $pelis=$peliculas->getPeliculas();
        $home->viewCartelera($pelis,NULL, NULL);
    }

    




}