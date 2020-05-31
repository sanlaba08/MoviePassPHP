<?php namespace dao\BD;

use model\Cine as Cine;
use dao\BD\connection as connection;
use \PDOException as PDOException;

class cinePDO{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }
    public function crear($cine){
        
        $sql= "INSERT INTO cines (nombre_cine,direccion,exist) VALUES(:nombre_cine,:direccion, :exist)";

        $parameters['nombre_cine']=$cine->getNombre();
        $parameters['direccion'] =$cine->getDireccion();
        $parameters['exist'] =$cine->getExist();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e) {
			throw $e;
		}
    }
    public function get($nombreCine){
        $sql = "SELECT * FROM cines where nombre_cine = :nombre_cine";
        $parameters['nombre_cine'] = $title;
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
    public function modificar ($nombre_cine,$direccion){

        $sql = "UPDATE cines SET direccion = :direccion , exist = :exist WHERE nombre_cine = :nombre_cine";
      $parameters['nombre_cine'] = $nombre_cine;
      $parameters['direccion'] = $direccion;
      $parameters['exist']=true;
      try
      {
          $this->connection = Connection::getInstance();
          return $this->connection->ExecuteNonQuery($sql, $parameters);
      }
      catch(PDOException $e)
      {
          echo $e;
      }

    }
    public function borrar($nombre_cine){

        $sql = "UPDATE cines SET exist=0 WHERE nombre_cine= :nombre_cine";
        $parameters['nombre_cine'] = $nombre_cine;
        try
        {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
            
        }
    }
   
    public function getAll() {
        $CineList = array();
            try
            {
                $query = "SELECT * FROM cines ";
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->execute($query);
    
            if(!empty($resultSet)) {
                foreach($resultSet as $row) {
                    $id = $row["id_cine"];
                    $nombre = $row["nombre_cine"];
                    $direccion = $row["direccion"];
                    $exist = $row["exist"];
    
                    $cine = new Cine($nombre, $direccion, $exist);
                    $cine->setID($id);
    
                    array_push($CineList, $cine);
                }
            }
            
        }
        catch (PDOException $e)
            {
                throw $e;
            }
            return $CineList;
    }


    public function retrieveOne($id) {
        $cine = null;

        $parameters['id']=$id;
        try
        {
            $sql = "SELECT * FROM cines where id_cine=:id";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $id = $resultSet[0]["id_cine"];
                $nombre = $resultSet[0]["nombre_cine"];
                $direccion = $resultSet[0]["direccion"];
                $exist = $resultSet[0]["exist"];

                $cine = new Cine($nombre, $direccion, $exist);
                $cine->setID($id);
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $cine;
    }

    public function getNombreCine($id) {
        $cine = null;

        $parameters['nombre']=$id;
        try
        {
            $sql = "SELECT * FROM cines where nombre_cine=:nombre";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $id = $resultSet[0]["id_cine"];
                $nombre = $resultSet[0]["nombre_cine"];
                $direccion = $resultSet[0]["direccion"];
                $exist = $resultSet[0]["exist"];

                $cine = new Cine($nombre, $direccion, $exist);
                $cine->setID($id);
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $cine;
    }

    


}



?>