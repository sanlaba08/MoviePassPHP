<?php namespace controller;
use dao\JSON\PeliculasRepository as peliculasRepository;
use dao\BD\peliculasPDO as peliculasPDO;
use dao\BD\generosXpeliculaPDO as GenXPeliPDO;
use dao\BD\generosPDO as generosPDO;
class peliculasController{
    
    public function __construct(){

    }
    public function getPeliculas(){
        //Get directo de la api momentaneo.
        /*$peliculasRepository = new peliculasRepository();
        $peliculasRepository->getPeliculas();
        $pelis = $peliculasRepository->getPeliculasList();*/

        $peliPDO = new peliculasPDO();
        //busco las peliculas en la base de datos.
        if($peliPDO->getAll() == false){
            //Si no hay peliculas Actualizo las peliculas de nuestra base de datos desde la api.
            $this->updatePeliculasFromApi();
        }
        $pelis = $peliPDO->getAll();
        return $pelis;
    }

    public function updatePeliculasFromApi(){
        $peliculasRepository = new peliculasRepository();
        $peliculasRepository->getPeliculas();
        $pelis = $peliculasRepository->getPeliculasList();

        $peliPDO = new peliculasPDO();
        $generoXpelicula = new GenXPeliPDO();
        for($i=0; $i< count($pelis);$i++){
            if($peliPDO->exist($pelis[$i]->getId()) == false)
            {
                //Si la pelicula no  esta en la base de datos la agrega.
                $pelicula = $peliPDO->crear($pelis[$i]);
                foreach($pelis[$i]->getGenre_ids() as $id_genero){
                    $genXpeli=$generoXpelicula->crearGenerosXPelicula($id_genero,$pelis[$i]->getId());
                }
            }
        }
    }
    public function getGeneros(){
        /*$generoRepository = new peliculasRepository();
        $genero = $generoRepository->getGeneros();*/
        $gen_pdo = new generosPDO();
        $gen_pdo->updateGenerosFromAPI();
        return $gen_pdo->getAll();
    }
    public function getGeneroById($id){
        $gen_pdo = new generosPDO();
        return $gen_pdo->get($id);
    }

}
?>