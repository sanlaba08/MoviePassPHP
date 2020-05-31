<?php
namespace controller;
use model\PerfilUsuario as PerfilUsuario;
use dao\JSON\UsersRepository as UsersRepository;
use controller\homeController as homeC;
use dao\BD\usuariosPDO as usuariosPDO;
/**
 *
 */
class UserController
{
	private $repository;
	private $homeController;
	private $pdo;

	function __construct()
	{
		$this->repository = new UsersRepository();
		$this->pdo = new usuariosPDO();
		$this->homeController = new homeC();
	}

	public function create($id,$email,$password,$rol,$nombre,$apellido,$dni)
	{
		$user = new PerfilUsuario($id,$email,$password,$rol,$nombre,$apellido,$dni);
		//$this->repository->Add($user);
		$this->pdo->create($user); 	
	}

	public function getByEmail($email)
	{
		$user = $this->pdo->getByEmail($email);
	}

	public function delete($email)
	{
		$this->pdo->delete($email);
	}

	public function login ($email, $pass)
	{
		$user = $this->pdo->getByEmail($email);
		if($user)
		{
			if($user->getPassword() == $pass)
			{
				$this->setSession($user);
				if($user->getRol() == 1){
					$this->homeController->viewHomeAdmin();
				}
				if($user->getRol() == 2){
					$this->homeController->viewHomeCliente();
				}
			} else {
				$msj = 'El usuario y la contraseña no coinciden, por favor vuelva a intentarlo.';
				$type= 'error';
				$this->homeController->login($msj,$type);
			}
		} else {
				$msj = 'El usuario y la contraseña no coinciden, por favor vuelva a intentarlo.';
				$type= 'error';
				$this->homeController->login($msj,$type);
		}
	}

	public function checkSession ()
	{
		if (session_status() == PHP_SESSION_NONE)
            session_start();
        if(isset($_SESSION['user'])) {
            $user = $this->pdo->getByEmail($_SESSION['user']->getEmail());
            if($user->getPassword() == $_SESSION['user']->getPassword())
                return $user;
          } else {
            return false;
          }
	}
	
	public function setSession($user)
	{
		$_SESSION['user'] = $user;
	}

	public function logout()
	{
		if(session_status() == PHP_SESSION_NONE)
               session_start();
          unset($_SESSION['user']);
          $this->homeController->login(null,null);
	}



	public function UserExist($email){
		try{
			if($this->pdo->getByEmail($email)){
				return true;
			}else
			{
				return false;
			}
		}catch(\PDOException $ex){
			throw $ex;
		}
	}

	/*Methods for Facebook API*/

	
	public function loginWithFacebook($fbUserData) {
		
		try{
			if($this->UserExist($fbUserData['email']))//comprueba que exista el usuario
			{
				$user = $this->pdo->getByEmail($fbUserData['email']);
				
				if($user)
				{

					$_SESSION["user"] = $user;
					$this->homeController->viewHomeCliente();

				}else{
					$msj = "Error: we Can´t access to your facebook acount";
					$type= 'error';
					$this->homeController->login($msj,$type);
				}
			}else{
				$msj = "Error: there are no records of such user in the database";
				$type= 'error';
				$this->homeController->login($msj,$type);
			}
		}catch(\PDOExeption $ex){
			throw $ex;
		}
	}




	/* para registrar usuario, no se usa 
	public function signUp($name,$last_name,$email,$dni,$pass,$type=''){ // adaptar
		$user = new User($email, $name, $pass);
		//llama al metodo del dao para guardarlo en la base de datos
		$user = $this->create($user);
		if($user){
			require(ROOT . VIEWS . 'login.php');
			echo "<script> alert('Usuario creado exitosamente');</script>";
		}
		else {
			require(ROOT . VIEWS . 'signup.php');
			echo "<script> alert('No se pudo crear usuario');</script>";
		}
	} */
}