<?php namespace dao\BD;

use model\Pelicula as Pelicula;
use model\Genero as Genero;
use dao\BD\connection as connection;
use PDOException;
class generosXpeliculaPDO{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }
    public function crearGenerosXPelicula($id_genero,$id_pelicula){
            $sql ="INSERT INTO generos_x_pelicula (id_genero,id_pelicula) VALUES (:id_genero, :id_pelicula)";

            $parameters['id_genero']=$id_genero;
            $parameters['id_pelicula']=$id_pelicula;
            
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(PDOException $e) {
                echo $e;
            }
           
    }

    public function getGeneros_x_pelicula($id_pelicula){
        $sql= "SELECT id_genero FROM generos_x_pelicula WHERE id_pelicula = :id_pelicula";

        // EN ESTA FUNCION HAY QUE RETORNAR LOS ID_GENERO QUE TIENE UNA PELICULA (es un array).
        $parameters['id_pelicula']=$id_pelicula;
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
        {
            //Retorno los id_genero de la pelicula en un Array. (costo bastante entender como retornarlo de esta forma.)
            $arrayGeneros=array();
            for($i=0;$i<count($resultSet); $i++){
                $arrayGeneros[$i]=array_shift($resultSet[$i]);
            }
            return $arrayGeneros;
        } 
        else
            return false;
    }


}
?>