<?php namespace dao\BD;

use model\Sala as Sala;
use model\Cine as Cine;
use dao\BD\cinePDO as CinePDO;
use dao\BD\connection as connection;
use \PDOException as PDOException;

class salaPDO{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }

    public function crear($sala){
        
        $sql= "INSERT INTO salas (nombre_sala,id_cine,precio,capacidad, exist) VALUES(:nombre_sala,:id_cine,:precio, :capacidad, :exist)";

        $parameters['nombre_sala']=$sala->getNombre();
        $parameters['id_cine']=$sala->getCine();
        $parameters['precio'] =$sala->getPrecio();
        $parameters['capacidad'] =$sala->getCapacidad();
        $parameters['exist'] =$sala->getExist();
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e) {
			throw $e;
		}
    }

    public function getAll() {
        $SalaList = array();
            try
            {
                $query = "SELECT * FROM salas";
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->execute($query);
    
            if(!empty($resultSet)) {
                foreach($resultSet as $row) {
                    $id = $row["id_sala"];
                    $nombre = $row["nombre_sala"];
                    $id_cine = $row["id_cine"];
                    $precio = $row["precio"];
                    $capacidad = $row["capacidad"];
                    $exist = $row["exist"];

                    $cineDAO = new CinePDO();
                    $cine = $cineDAO->retrieveOne($id_cine);

                    $sala = new Sala($nombre, $cine, $precio, $capacidad, $exist);
                    $sala->setID($id);
    
                    array_push($SalaList, $sala);
                }
            }
            
        }
        catch (PDOException $e)
            {
                throw $e;
            }
            return $SalaList;
    }


    public function retrieveOne($id) {
        $sala = null;

        $parameters['id']=$id;
        try
        {
            $sql = "SELECT * FROM salas where id_sala=:id";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $id = $resultSet[0]["id_sala"];
                $nombre = $resultSet[0]["nombre_sala"];
                $id_cine = $resultSet[0]["id_cine"];
                $precio = $resultSet[0]["precio"];
                $capacidad = $resultSet[0]["capacidad"];
                $exist = $resultSet[0]["exist"];

                $cineDAO = new CinePDO();
                $cine = $cineDAO->retrieveOne($id_cine);
              
                $sala = new Sala($nombre, $cine, $precio, $capacidad, $exist);
                $sala->setID($id);           

            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $sala;
    }

    public function modificar ($nombre_sala,$capacidad,$precio){
        

        $sql = "UPDATE salas SET  capacidad = :capacidad , precio = :precio, exist = :exist WHERE nombre_sala = :nombre_sala";
        $parameters['nombre_sala'] = $nombre_sala;
        $parameters['capacidad'] = $capacidad;
        $parameters['precio'] = $precio;
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

    public function getNombreSala($nombre) {
        $sala = null;

        $parameters['nombre_sala']=$nombre;
        try
        {
            $sql = "SELECT * FROM salas where nombre_sala=:nombre_sala";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

          
            if(!empty($resultSet)) {
                $id = $resultSet[0]["id_sala"];
                $nombre = $resultSet[0]["nombre_sala"];
                $id_cine = $resultSet[0]["id_cine"];
                $precio = $resultSet[0]["precio"];
                $capacidad = $resultSet[0]["capacidad"];
                $exist = $resultSet[0]["exist"];

                $cineDAO = new CinePDO();
                $cine = $cineDAO->retrieveOne($id_cine);
              
                $sala = new Sala($nombre, $cine, $precio, $capacidad, $exist);
                $sala->setID($id);           

            }

        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $sala;
        
    }

    public function borrar($nombre_sala,$id_cine){

        $sql = "UPDATE salas SET exist=0 WHERE nombre_sala= :nombre_sala AND id_cine = :id_cine";
        $parameters['nombre_sala'] = $nombre_sala;
        $parameters['id_cine'] = $id_cine;
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




}