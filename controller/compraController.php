<?php namespace controller;

use config\autoload as Autoload;
use model\Compra as Compra;
use dao\BD\funcionesPDO as FuncionPDO;
use controller\homeController as homeC;
use dao\BD\compraPDO as CompraPDO;



class compraController{
    private $homeController;

    public function __construct() {
        $this->homeController = new homeC();
    }

    public function create($funcion, $cantidad_entradas){
        $compraDAO = new CompraPDO();
        $funcionDAO = new FuncionPDO();

        $totalFinal = $compraDAO->totalFinal($funcion) + $cantidad_entradas;
        $funcion = $funcionDAO->retrieveOne($funcion);
        $fecha = strftime( "%Y-%m-%d", time());
        $total = $cantidad_entradas * $funcion->getSala()->getPrecio();
        echo $totalFinal;
        echo " / ";
        echo $funcion->getSala()->getCapacidad();
        if($totalFinal <= $funcion->getSala()->getCapacidad()){
            $compraNueva = new Compra($funcion, $fecha, $cantidad_entradas, $total,$_SESSION['user']->getId());
            $compraDAO->crear($compraNueva);
            $msj='La compra se ha realizado con exito.';
            $type='success';
            $this->homeController->viewDetallePelicula($funcion->getPelicula()->getTitle(),$msj,$type);
    
        }else{
            $msj='Lo siento, la cantidad de personas que desea ingresar supera la capacidad de la sala.';
            $type='error';
            $this->homeController->viewDetallePelicula($funcion->getPelicula()->getTitle(),$msj,$type);
            
        }
    }

    public function filterByPelicula($pelicula){
        $compraDAO = new CompraPDO();
        $peliculasController = new peliculasController();
        $pelis= $peliculasController->getPeliculas();
        $arrayCompra = $compraDAO->totalFinalXPelicula();;
       
        if($pelicula != "Todos las peliculas"){
            $flag = false;
            foreach($arrayCompra as $values){
                $arrayRecaudacion = array();
                if($values->getTitulo() == $pelicula){
                    $flag = true;
                    array_push($arrayRecaudacion,$values);
                    break;
                }   
            }
    
                if($flag){
                    $home = new homeController();
                    $msj='Se mostrarán las recaudaciones de la pelicula seleccionada.';
                    $type='success';
                    $home->viewRecaudaciones($arrayRecaudacion,$msj,$type);
                    
                }else{
                    $msj='Lo siento, la pelicula seleccionada no posee recaudaciones';
                    $type='error';
                    $this->todasLasRecaudaciones($msj,$type);
                }
            
        }else{
            $msj='Se mostrarán las recaudaciones de todas las peliculas.';
            $type='success';
            $this->todasLasRecaudaciones($msj,$type);
        
        }
    }

    public function todasLasRecaudaciones($msj,$type){
        $compraDAO = new CompraPDO();
        $home = new homeController();
        $arrayRecaudacionTotal = array();
        $totalFinal = $compraDAO->totalFinalAllPelicula();
        
        if($type== "null"){
            $home->viewRecaudaciones($totalFinal,null,null);
        }
        else
        {
            $home->viewRecaudaciones($totalFinal,$msj,$type);
        }
        
    }

    public function viewAllRecaudaciones(){
        $compraDAO = new CompraPDO();
        $home = new homeController();
        $arrayRecaudacionTotal = array();
        $totalFinal = $compraDAO->totalFinalAllPelicula();
        $home->viewRecaudaciones($totalFinal,null,null);


    }
            



    public function getCompras(){
        $compraDAO = new CompraPDO();
        $arrayCompras = $compraDAO->getAll();
        return $arrayCompras;

    }

    public function getTotalFinal(){
        $compraDAO = new CompraPDO();
        $total = $compraDAO->AllTotalFinal();
       
        return $total;
    }

    public function getCantidadEntradas(){
        $compraDAO = new CompraPDO();
        $total = $compraDAO->cantidadVendidasTotal();
        return $total;
    }
}