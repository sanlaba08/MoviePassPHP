<?php
namespace dao\BD;
use model\Usuario as PerfilUsuario;
use dao\BD\connection as Connection;
use PDOException;
/**
 *
 */
class usuariosPDO /*extends Singleton*/
{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }
    public function create($user)
    {
    	
		$sql = "INSERT INTO usuarios (email, pass, id_rol, nombre, apellido, dni) VALUES (:email, :pass, :id_rol, :nombre, :apellido, :dni)";
        $parameters['email'] = $user->getEmail();
        $parameters['pass'] = $user->getPassword();
        $parameters['id_rol'] = $user->getRol();
        $parameters['nombre'] = $user->getNombre();
        $parameters['apellido'] = $user->getApellido();
        $parameters['dni'] = $user->getDni();
		try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e) {
			echo $e;
		}
    }
    public function readAll()
    {
        $sql = "SELECT * FROM usuarios";
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
            return $this->mapear($resultSet);
        else
            return false;
    }
    public function getByEmail ($email)
    {
        $sql = "SELECT * FROM usuarios where email = :email";
        $parameters['email'] = $email;
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo '<script>';
            echo 'console.log("Error en base de datos. Archivo: userdao.php")';
            echo '</script>';
        }
        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;
    }
    public function readById ($id)
    {
        $sql = "SELECT * FROM usuarios where id_usuario = :id_usuario";
        $parameters['id_usuario'] = $id;
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {
            throw $e;
            echo '<script>';
            echo 'console.log("Error en base de datos. Archivo: userdao.php")';
            echo '</script>';
        }
        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;
    }
    public function update ($id,$pass)
    {
      $sql = "UPDATE usuarios SET pass = :pass  WHERE id_usuario = :id_usuario";
      $parameters['id_usuario'] = $id;
      $parameters['pass'] = $pass;
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
    public function delete ($email)
    {
        $sql = "DELETE FROM usuarios WHERE email = :email";
        $parameters['email'] = $email;
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
   	protected function mapear($value) {
		$value = is_array($value) ? $value : [];
		$resp = array_map(function($p){
		    return new PerfilUsuario( $p['id_usuario'],$p['email'], $p['pass'], $p['id_rol'], $p['nombre'],$p['apellido'],$p['dni']);
        }, $value);
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/
            return count($resp) > 1 ? $resp : $resp['0'];
     }
}