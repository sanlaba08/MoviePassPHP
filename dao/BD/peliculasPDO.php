<?php namespace dao\BD;

use model\Pelicula as Pelicula;
use model\Genero as Genero;
use dao\BD\connection as connection;
use dao\BD\generosXpeliculaPDO as GenXPeliPDO;
use \PDOException as PDOException;

class peliculasPDO{
    private $connection;

    public function __construct()
    {
        $this->connection = null;
    }
    
    public function crear($pelicula){
        $sql= "INSERT INTO peliculas (id_pelicula,titulo,overview,original_language,imagen,duration) VALUES(:id_pelicula,:titulo,:overview,:original_language,:imagen, :duration)";
        
        $parameters['id_pelicula']=$pelicula->getId();
        $parameters['titulo'] =$pelicula->getTitle();
        $parameters['overview'] =$pelicula->getOverview();
        $parameters['original_language'] =$pelicula->getOriginal_language();
        $parameters['imagen'] =$pelicula->getImagen();
        $parameters['duration'] = $pelicula->getDuration();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e) {
			echo $e;
		}
    }

    public function exist($id_pelicula){
        $sql = "SELECT * FROM peliculas where id_pelicula = :id_pelicula";
        $parameters['id_pelicula'] = $id_pelicula;
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
        if(!empty($resultSet))
            return true;
        else
            return false;

    }
    public function getAll(){
        
        $sql = "SELECT * FROM peliculas";
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
        if(!empty($resultSet))
        {
            //ver funcion mapear.
            return $this->mapear($resultSet);
        }
        else
            return false;

    }


    protected function mapear($value) {
        
		$value = is_array($value) ? $value : [];
		$resp = array_map(function($p){
            //Busca los id_genero que tiene una pelicula en especifico para hacer el new Pelicula();
            //No va a funcionar bien hasta que la funcion getGeneros_x_pelicula retorne todos los id_genero de la pelicula.
            $genXPeliPDO =new GenXPeliPDO();
            $generos_id = $genXPeliPDO->getGeneros_x_pelicula($p['id_pelicula']);
		    return new Pelicula($p['titulo'], $p['id_pelicula'],  $p['overview'], $p['original_language'],$generos_id,$p['imagen'],$p['duration']);
        }, $value);
            //devuelve un arreglo si tiene datos y sino devuelve nulo
            return count($resp) > 1 ? $resp : $resp['0'];
     }

     
    public function getNombrePelicula($nombre_pelicula){
        $pelicula = null;

        $parameters['titulo']=$nombre_pelicula;
        try
        {
            $sql = "SELECT * FROM peliculas where titulo=:titulo";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $id_pelicula = $resultSet[0]["id_pelicula"];
                $title = $resultSet[0]["titulo"];
                $overview = $resultSet[0]["overview"];
                $original_language = $resultSet[0]["original_language"];
                $imagen = $resultSet[0]["imagen"];
                $duration = $resultSet[0]["duration"];

                $genXPeliPDO =new GenXPeliPDO();
                $generos_id = $genXPeliPDO->getGeneros_x_pelicula($id_pelicula);
               

                $pelicula = new Pelicula($title, $id_pelicula, $overview, $original_language, $generos_id, $imagen,$duration);
             
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $pelicula;
    }

    public function retrieveOne($id) {
        $pelicula = null;

        $parameters['id']=$id;
        try
        {
            $sql = "SELECT * FROM peliculas where id_pelicula=:id";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $id_pelicula = $resultSet[0]["id_pelicula"];
                $title = $resultSet[0]["titulo"];
                $overview = $resultSet[0]["overview"];
                $original_language = $resultSet[0]["original_language"];
                $imagen = $resultSet[0]["imagen"];
                $duration = $resultSet[0]["duration"];

                $genXPeliPDO =new GenXPeliPDO();
                $generos_id = $genXPeliPDO->getGeneros_x_pelicula($id_pelicula);
               

                $pelicula = new Pelicula($title, $id_pelicula, $overview, $original_language, $generos_id, $imagen,$duration );
             
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $pelicula;
    }

}



?>