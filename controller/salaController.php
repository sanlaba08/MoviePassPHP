<?php namespace controller;

use model\Sala as Sala;
use dao\BD\salaPDO as salaPDO;
use controller\homeController as homeC;


class salaController {
    private $homeController;

    public function __construct() {
        $this->homeController = new homeC();
    }
 
    public function create($id_cine,$nombre_sala, $precio,$capacidad){
            $salaNueva = new Sala($nombre_sala, $id_cine,$precio,$capacidad,1);
            
            //Todo lo comentado es lo que usamos con JSON.
            /*$CineRepository = new CineRepository();
            $cinesJSON = $CineRepository->getAll();*/

            $salaPDO = new SalaPDO();
            $SalasList= $salaPDO->getAll();
            

            $validacionSala = FALSE;
            foreach($SalasList as $values)
            {
                if($salaNueva->getNombre() == $values->getNombre()  && $values->getExist() == false)
                {
                    $validacionSala=TRUE;
                    $salaPDO->modificar($nombre_sala,$capacidad,$precio);
                    $msj='La Sala ya existía, por eso fue dada de alta.';
                    $type='success';
                    $this->homeController->viewAdminSala($msj,$type);
                }
                else if($salaNueva->getNombre() == $values->getNombre() && $salaNueva->getCine()== $values->getCine()->getId() && $values->getExist() == true)
                {
                    $validacionSala=TRUE;
                    $msj='La Sala que desea ingresar ya existe';
                    $type='error';
                    $this->homeController->viewAdminSala($msj,$type);
                }
            }          
            if($validacionSala == FALSE){
            
                $salaPDO->crear($salaNueva);
                $msj='Se ha agregado exitosamente la sala';
                $type='success';
                $this->homeController->viewAdminSala($msj,$type);
                
            }   
        }
       
    

    public function delete($nombre_sala){

        $salaPDO = new salaPDO();
        $id_cine = $salaPDO->getNombreSala($nombre_sala)->getCine()->getId();
        $salaPDO->borrar($nombre_sala,$id_cine);
        $msj='Se ha eliminado una sala correctamente';
        $type='error';
        $this->homeController->viewHomeAdmin($msj,$type);
        
    }

    public function modify($capacidad, $precio){
       
            $salaPDO = new salaPDO();
            $salaPDO->modificar($_POST["btnModify"], $capacidad, $precio);
            $msj='Se ha modificado exitosamente una sala';
            $type='success';
            $this->homeController->viewAdminSala($msj,$type);
    }

    public function getSalas(){

        /*$CineRepository = new CineRepository();
        $arrayCines = $CineRepository->getAll();*/
        $salaPDO = new salaPDO();
        $arraySala= $salaPDO->getAll();
        return $arraySala;
    }

}

?>
