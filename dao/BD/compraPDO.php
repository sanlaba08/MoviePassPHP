<?php namespace dao\BD;

use model\Compra as Compra;
use model\Recaudacion as Recaudacion;
use dao\BD\funcionesPDO as FuncionPDO;
use dao\BD\usuariosPDO as UsuarioPDO;
use dao\BD\connection as connection;
use \PDOException as PDOException;

class compraPDO{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }

    public function crear($compra){
        
        $sql= "INSERT INTO compras (id_funcion, fecha, cantidad_entradas, total,id_usuario) VALUES(:id_funcion, :fecha, :cantidad_entradas, :total,:id_usuario)";

        $parameters['id_funcion']=$compra->getFuncion()->getID();
        $parameters['fecha'] =$compra->getFecha();
        $parameters['cantidad_entradas'] =$compra->getCantidad_entradas();
        $parameters['total'] =$compra->getTotal();
        $parameters['id_usuario']=$_SESSION['user']->getID();


        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e) {
			echo $e;
		}
    }

    public function borrar($compra){

        $sql = "DELETE FROM compras WHERE id_compra= :id_compra";
        $parameters['id_compra'] = $compra;
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

    public function totalFinal($funcion){
        $parameters['id_funcion']=$funcion;
        try
        {
            $sql = "SELECT sum(compras.cantidad_entradas) as Total FROM compras INNER JOIN funciones ON compras.id_funcion = funciones.id_funcion WHERE funciones.id_funcion= :id_funcion order by Total";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);

            if(!empty($resultSet)) {
                $total = $resultSet[0]["Total"];
                  
                }
            }
        catch(PDOException $e)
        {
            echo $e;
            
        }
        return $total;
        
    }

    
    public function totalFinalXPelicula(){
        $totalList = array();
        try{
            $sql = "SELECT peli.titulo as Titulo, sum(c.cantidad_entradas) as TotalEntradas, sum(c.total) as Total 
            FROM compras c inner join 
            (select f.id_funcion, p.titulo from funciones f inner join peliculas p on f.id_pelicula = p.id_pelicula) peli on c.id_funcion = peli.id_funcion
            group by Titulo";
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql);
            if(!empty($resultSet)) {
                foreach($resultSet as $row) {
                    $titulo = $row["Titulo"];
                    $totalEntradas = $row["TotalEntradas"];
                    $total = $row["Total"];
                    $recaudacion = new Recaudacion($titulo,$totalEntradas, $total);
                    array_push($totalList, $recaudacion);
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e;
            
        }
     
        return $totalList;
    }

    public function totalFinalAllPelicula(){
        $totalList = array();
        try{
            $sql = "SELECT sum(c.cantidad_entradas) as TotalEntradas, sum(c.total) as Total 
            FROM compras c inner join 
            funciones f on c.id_funcion = f.id_funcion";
        $this->connection = Connection::getInstance();
        $resultSet = $this->connection->execute($sql);
        if(!empty($resultSet)) {
            foreach($resultSet as $row) {
                $totalEntradas = $row["TotalEntradas"];
                $total = $row["Total"];
            
                $recaudacion = new Recaudacion("Todos los generos",$totalEntradas, $total);
                array_push($totalList, $recaudacion);
            }
        }
    } catch(PDOException $e)
    {
        echo $e;
        
    }
 
    return $totalList;
    
    }



    public function getAll() {
        $compraList = array();
            try
            {
                $query = "SELECT * FROM compras ";
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->execute($query);
    
            if(!empty($resultSet)) {
                foreach($resultSet as $row) {
                    $id = $row["id_compra"];
                    $fecha = $row["fecha"];
                    $cantidad_entradas = $row["cantidad_entradas"];
                    $total = $row["total"];
                    $idusuario = $row["id_usuario"];
                    $id_funcion = $row["id_funcion"];

    
                    $funcionDAO = new FuncionPDO();
                    $funcion = $funcionDAO->retrieveOne($id_funcion);
                    $usuarioDAO = new UsuarioPDO();
                    $usuario = $usuarioDAO->readById($idusuario);

                    $compra = new Compra($funcion,$fecha, $cantidad_entradas, $total, $usuario);
                    $compra->setFuncion($funcion);
                    $compra->setID($id);
    
                    array_push($compraList, $compra);

                }
            }
        }catch (PDOException $e){
                throw $e;
        }
        
        return $compraList;
    }

   
}