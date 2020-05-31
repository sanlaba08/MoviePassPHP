<?php namespace dao\BD;

use model\Pelicula as Pelicula;
use model\Sala as Sala;
use model\Funcion as Funcion;
use dao\BD\peliculasPDO as PeliPDO;
use dao\BD\salaPDO as SalaPDO;
use dao\BD\connection as connection;
use \PDOException as PDOException;

class funcionesPDO{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }
    public function crear($funcion){
      
        $sql= "INSERT INTO funciones (id_sala,id_pelicula,fecha,hora,hora_final) VALUES(:id_sala,:id_pelicula, :fecha, :hora, :hora_final)";
            $parameters['id_sala']=$funcion->getSala()->getID();
            $parameters['id_pelicula']=$funcion->getPelicula()->getID();
            $parameters['fecha'] =$funcion->getFecha();
            $parameters['hora'] =$funcion->getHora();
            $parameters['hora_final'] =$funcion->getHora_final();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e) {
			echo $e;
		}
    }
    
     public function retrieveOne($id) {
        $funcion = null;

        $parameters['id']=$id;
        try
        {
            $sql = "SELECT * FROM funciones where id_funcion=:id";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $id = $resultSet[0]["id_funcion"];
                $id_sala = $resultSet[0]["id_sala"];
                $id_pelicula = $resultSet[0]["id_pelicula"];
                $fecha = $resultSet[0]["fecha"];
                $hora = $resultSet[0]["hora"];
                $hora_final = $resultSet[0]["hora_final"];

                $salaDAO = new salaPDO();
                $sala = $salaDAO->retrieveOne($id_sala);

                $peliculaDAO = new PeliPDO();
                $pelicula = $peliculaDAO->retrieveOne($id_pelicula);

                $funcion = new Funcion($sala, $pelicula, $fecha, $hora);
                $funcion->setID($id);
                $funcion->setHora_final($hora_final);
                 
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        return $funcion;
    }


    public function getAll() {
        $funcionList = array();
            try
            {
                $query = "SELECT * FROM funciones ";
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->execute($query);
    
            if(!empty($resultSet)) {
                foreach($resultSet as $row) {
                    $id = $row["id_funcion"];
                    $fecha = $row["fecha"];
                    $hora = $row["hora"];
                    $hora_final = $row["hora_final"];
                
                    $idSala = $row["id_sala"];
                    $idPelicula = $row["id_pelicula"];
    
                    $salaDAO = new SalaPDO();
                    $sala = $salaDAO->retrieveOne($idSala);

                    
    
                    $peliculaDAO = new PeliPDO();
                    $pelicula = $peliculaDAO->retrieveOne($idPelicula);
    
                    $funcion = new Funcion($sala, $pelicula, $fecha, $hora);
                    $funcion->setID($id);
                    $funcion->setSala($sala);
                    $funcion->setPelicula($pelicula);
                    $funcion->setHora_final($hora_final);
    
                    array_push($funcionList, $funcion);

                }
            }
        }
    catch (PDOException $e)
        {
            throw $e;
        }
        return $funcionList;
}


}


?>
