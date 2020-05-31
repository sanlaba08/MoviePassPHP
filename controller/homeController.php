<?php namespace controller;

use model\Cine as Cine;
use model\Pelicula as Pelicula;
use model\Sala as Sala;
use model\Compra as Compra;
use model\Funcion as Funcion;
use controller\cineController as cineController;
use controller\userController as userController;
use controller\peliculasController as peliculasController;
use controller\salaController as salaController;
use controller\funcionController as funcionController;
use controller\compraController as compraController;



        

class homeController{

  

    public function __construct()
    {
    }

    public function viewAdminSala($msj=null,$type=null){
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        $cineController = new cineController();
        $arrayCines = $cineController->getCines();

        $salaController = new salaController();
        $arraySala = $salaController->getSalas();

        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/administrarSala.php');
        require_once(VIEWS_PATH."/footer.php");
       }else{
            $this->login($msj,$type);
        }
    }
    public function presentation(){
        require(VIEWS_PATH . '/presentation.php');
    }
    public function login($msj=null,$type=null){
        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/login.php');
        require_once(VIEWS_PATH."/footer.php");
    }
    public function viewHomeCliente(){
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navCliente.php');
        require(VIEWS_PATH . '/home.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login($msj,$type);
        }
    }
    public function viewHomeAdmin($msj=null,$type=null){
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/homeAdmin.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login($msj,$type);
        }
    }

    public function viewModifyCine()
    {
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){

        $cineController = new cineController();
        $arrayCines = $cineController->getCines();


        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/ModificarCine.php');
        require_once(VIEWS_PATH."/footer.php");
       } else{
            $this->login();
        }
    }

    public function viewModifySala()
    {
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
                
        $salaController = new salaController();
        $arraySalas = $salaController->getSalas();


        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/modificarSala.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login();
        }
    }

    public function viewAdminCartelera($msj=null,$type=null){
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        $salaController = new salaController();
        $arraySala = $salaController->getSalas();
        
        $peliculas = new peliculasController();
        $pelis=$peliculas->getPeliculas();
        
        $funcionController = new funcionController();
        $arrayFuncion = $funcionController->getFunciones();
        
        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/administrarCartelera.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login($msj,$type);
        }
    }
    public function viewAdminCine($msj=null,$type=null)
    {
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        $cineController = new cineController();
        $arrayCines = $cineController->getCines();

        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/administrarCine.php');
        require_once(VIEWS_PATH."/footer.php");
       }else{
            $this->login($msj,$type);
        }
    }

    public function viewCartelera($peliculas,$msj=null,$type=null){
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        $pelisController = new peliculasController();
        $allGenres = $pelisController->getGeneros();

        $funcionController = new funcionController();
        $arrayFuncion = $funcionController->getFunciones();
        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navCliente.php');
        require(VIEWS_PATH . '/cartelera.php');
        require_once(VIEWS_PATH."/footer.php");
       }else{
           $this->login($msj,$type);
       }

        
    }
    public function viewDetallePelicula($title,$msj=null,$type=null){
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){
        $peliculas = new peliculasController();
        $pelis=$peliculas->getPeliculas();
        $genero = $peliculas->getGeneros();

        $funcion = new funcionController();
        $arrayFuncion = $funcion->getFunciones();

        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navCliente.php');
        require(VIEWS_PATH . '/detallePelicula.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login($msj,$type);
        }
    }
    
    public function viewCompra(){
        
        $userController = new userController();
        $user = $userController->checkSession();
        if($user){
        $pelisController = new peliculasController();
        //traigo de la base de datos todos los generos.
        $allGenres = $pelisController->getGeneros();

        $compra = new compraController();
        $arrayCompra = $compra->getCompras();

        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navCliente.php');
        require(VIEWS_PATH . '/compra.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login($msj,$type);
        }
    }

    public function viewRecaudaciones($recaudacion,$msj=null,$type=null){
          
        $userController = new userController();
        $user = $userController->checkSession();
       if($user){

        $compra = new compraController();
        $arrayCompra = $compra->getCompras();
        $peliculas = new peliculasController();
        $pelis=$peliculas->getPeliculas();

        require_once(VIEWS_PATH."/header.php");
        require(VIEWS_PATH . '/navAdmin.php');
        require(VIEWS_PATH . '/recaudaciones.php');
        require_once(VIEWS_PATH."/footer.php");
        }else{
            $this->login($msj,$type);
        }
    }
 
    

    



}


?>
