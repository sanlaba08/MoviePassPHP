<?php namespace controller;

use model\Cine as Cine;
use model\Sala as Sala;
use dao\JSON\CineRepository as CineRepository;
use dao\BD\cinePDO as cinePDO;
use controller\homeController as homeC;
use controller\salaController as salaC;
use \PDOException as PDOException;

class cineController {
    private $homeController;

    public function __construct() {
        $this->homeController = new homeC();
    }
 
    public function create($nombre, $direccion){
            $cineNuevo = new Cine($nombre, $direccion,1);

            //Todo lo comentado es lo que usamos con JSON.
            /*$CineRepository = new CineRepository();
            $cinesJSON = $CineRepository->getAll();*/

            $cinePDO = new cinePDO();
            $cinesList= $cinePDO->getAll();
            

            $validacionCine = FALSE;
            foreach($cinesList as $values)
            {
                if($cineNuevo->getNombre() == $values->getNombre() && $values->getExist() == false)
                {
                    $validacionCine=TRUE;
                    $cinePDO->modificar($nombre,$direccion);
                    //$CineRepository->update($nombre,$direccion,$capacidad,$valor_entrada);
                    $msj='El cine ya existía, por eso fue dado de alta.';
                    $type='success';
                    $this->homeController->viewAdminCine($msj,$type);
                }/*
                else if($cineNuevo->getNombre() == $values->getNombre() && $values->getExist() == true)
                {
                    $validacionCine=TRUE;
                    $msj='El cine que desea ingresar ya existe';
                    $type='error';
                    $this->homeController->viewAdminCine($msj,$type);

                }*/
            }          
            if($validacionCine == FALSE){
                try{
                    $cinePDO->crear($cineNuevo);
                /*echo"<pre>";
                var_dump($value);
                echo"<pre>";*/
                //$CineRepository->Add($cineNuevo);
                $msj='Se ha agregado exitosamente un cine';
                $type='success';
                $this->homeController->viewAdminCine($msj,$type);
                }
                catch(PDOException $e){
                    if($e->errorInfo[1]==1062){
                        $msj = 'Ya existe un cine con ese nombre';
                        $type = 'error';
                    }
                    else{
                        $msj = 'Ocurrio un error en la base de datos';
                        $type = 'error';
                    }
                
                    $this->homeController->viewAdminCine($msj,$type);
                }
                
            }   
        }
       
    

    public function delete($cineAborrar){

        $cinePDO = new cinePDO();
        $cinePDO->borrar($cineAborrar);
        //Elimino todas las salas que estaban en este cine.
        $salaC = new salaC();
        $salasList = $salaC->getSalas();
        foreach($salasList as $values)
            {
                if($values->getCine()->getNombre() == $cineAborrar)
                {
                    $salaC->delete($values->getNombre(),$values->getCine()->getId());
                }
            }

        $msj='Se ha eliminado un cine correctamente';
        $type='error';
        $this->homeController->viewHomeAdmin($msj,$type);
        
    }

    public function modify($direccion){
       
        
            /*$CineRepository = new CineRepository();
            $CineRepository->update($_POST["btnModify"], $direccion, $capacidad, $valor_entrada);*/
            $cinePDO = new cinePDO();
            $cinePDO->modificar($_POST["btnModify"], $direccion);
            $msj='Se ha modificado exitosamente un cine';
            $type='success';
            $this->homeController->viewAdminCine($msj,$type);       
       

    }

    public function getCines(){

        /*$CineRepository = new CineRepository();
        $arrayCines = $CineRepository->getAll();*/
        $cinePDO = new cinePDO();
        $arrayCines= $cinePDO->getAll();
        return $arrayCines;
    }

    public function getCantidadSalas($id_Cine){
        $count=0;
        $salaC = new salaC();
        $salasList = $salaC->getSalas();
        foreach($salasList as $values)
            {
                if($values->getCine()->getId() == $id_Cine && $values->getExist()== true)
                {
                    $count++;
                }
            }
            return $count;
    }

}

?>
