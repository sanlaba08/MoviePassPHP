<?php namespace dao\BD;

use model\Genero as Genero;
use dao\BD\connection as connection;
use dao\JSON\PeliculasRepository;
use PDOException;

class generosPDO{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }
    public function crearGenero($genero){
        
            $sql= "INSERT INTO generos VALUES (:id_genero , :nombre_genero);";

            $parameters['id_genero']=$genero->getId();
            $parameters['nombre_genero']=$genero->getNombre();
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(PDOException $e) {
                echo $e;
            }
    }

    public function updateGenerosFromAPI(){
        $peliRepo = new PeliculasRepository();
        $generosJSON=$peliRepo->getGeneros();
        foreach($generosJSON as $genero){
            //solo va a agregar el genero a la BD si este no existe ya en ella.
            if($this->get($genero->getId()) == false)
                $genero = $this->crearGenero($genero);
        }
    }
    public function get($id_genero){
        $sql = "SELECT * FROM generos where id_genero = :id_genero";
        $parameters['id_genero'] = $id_genero;
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
            return $this->mapear($resultSet);
        else
            return false;

    }
    public function getAll(){
        $sql = "SELECT * FROM generos";
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
            return $this->mapear($resultSet);
        }
        else
            return false;
    }

    protected function mapear($value) {
		$value = is_array($value) ? $value : [];
		$resp = array_map(function($p){
		    return new Genero( $p['id_genero'], $p['nombre_genero']);
        }, $value);
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/
            return count($resp) > 1 ? $resp : $resp['0'];
     }
}



?>