<?php namespace controller;

use config\autoload as Autoload;
use model\Funcion as Funcion;
use dao\BD\funcionesPDO as FuncionRepository;
use dao\BD\peliculasPDO as PeliPDO;
use dao\BD\salaPDO as SalaPDO;
use controller\homeController as homeC;



class FuncionController{
    private $homeController;

    public function __construct() {
        $this->homeController = new homeC();
    }

    public function create($sala, $pelicula, $fecha, $hora){
        $salaDAO = new SalaPDO();
        $sala = $salaDAO->retrieveOne($sala);
  
    
        $peliculaDAO = new PeliPDO();
        $pelicula = $peliculaDAO->getNombrePelicula($pelicula);
       
       

        $funcionNueva = new Funcion($sala, $pelicula, $fecha, $hora);
    
        

        $FuncionRepository = new FuncionRepository();
        $arrayFuncion = $FuncionRepository->getAll();

        $validar = false;
        foreach($arrayFuncion as $values){
            
            if($funcionNueva->getSala()->getID() == $values->getSala()->getID()){
                if($funcionNueva->getPelicula()->getTitle() == $values->getPelicula()->getTitle()){
                    if($funcionNueva->getFecha() == $values->getFecha()){
                        //Si esta en la misma sala, la misma pelicula el mismo dia. Y cumple con la validacion de horario, SI se puede
                        $validar =$this->validarHorario($funcionNueva,$values) ;
                        if($validar){
                            break;
                        }
                            
                    }
                }else if($funcionNueva->getFecha() == $values->getFecha()){
                        //Si esta en la misma sala, otra pelicula el mismo dia. Tiene que cumplir la validacion de horario.
                        $validar =$this->validarHorario($funcionNueva,$values) ;
                        if($validar){
                            break;
                        }
                    }

            }else if($funcionNueva->getPelicula()->getTitle() == $values->getPelicula()->getTitle() && $funcionNueva->getFecha() == $values->getFecha()){
                //Si esta en otra sala, la misma pelicula, el mismo dia NO se puede.
                $validar = true;
                break;
            }
            
           
        }
        if(!$validar){
            $FuncionRepository->crear($funcionNueva);
            $msj='Se ha agregado exitosamente una funcion.';
            $type='success';
            $this->homeController->viewAdminCartelera($msj,$type);
        }else{
            $msj='Lo siento, no podrá ingresar una funcion.';
            $type='error';
            $this->homeController->viewAdminCartelera($msj,$type);
            
        
        }   
    
   
}

    public function getFunciones(){
        $FuncionRepository = new FuncionRepository();
        $arrayFuncion = $FuncionRepository->getAll();
        return $arrayFuncion;

    }
    private function validarHorario($funcionNueva, $values){
        $validar=false;
        $horafinValues = $this->SumaHoras($values->getHora(), 135);
        $horaInicioValues = $values->getHora();
        //$tiempoInt =strtotime($funcionNueva->getHora());
        //Por ahora esta hardcodeado a 135 la duracion de la pelicula.
        $horaMaximaNueva = $this->SumaHoras($horaInicioValues,-135);
        if($funcionNueva->getHora() < $horafinValues && $funcionNueva->getHora() > $horaMaximaNueva){
            //Si la hora de la nueva es
            $validar = true;
        }

        return $validar;

    }
   public function SumaHoras( $hora, $minutos_sumar ) 
        { 
        $minutoAnadir=$minutos_sumar;
        $segundos_horaInicial=strtotime($hora);
        $segundos_minutoAnadir=$minutoAnadir*60;
        $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);
        return $nuevaHora;
        } 

}


    
