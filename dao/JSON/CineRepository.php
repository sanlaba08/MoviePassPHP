<?php namespace dao\JSON;

    use dao\JSON\IRepository as IRepository;
    use model\Cine as Cine;

    class CineRepository implements IRepository
    {
        private $cineList = array();

        public function add($cine){
            $this->retrieveData();
            array_push($this->cineList, $cine);
            $this->saveData();
        }
    
        public function getAll(){
            $this->retrieveData();
            return $this->cineList;
        }

        
        public function delete($value) {
            $this->retrieveData();
            foreach($this->cineList as $key => $cine) {
                if($cine->getNombre() == $value) {
                    $cine->setExist(FALSE);
                    break;
                }
            }
            $this->saveData();
        }

        public function update($nombre, $direccion, $capacidad, $valor_entrada){
            $this->retrieveData();
            foreach ($this->cineList as $key => $cine) {
                if($cine->getNombre() == $nombre){
                    $cine->setDireccion($direccion);
                    $cine->setCapacidad($capacidad);
                    $cine->setValor_entrada($valor_entrada);
                    $cine->setExist(true);
                }
            }
            $this->saveData();
        }


        private function saveData()
        {
            $arrayToEncode = array();

            foreach($this->cineList as $cine)
            {
                $valuesArray["nombre"] = $cine->getNombre();
                $valuesArray["direccion"] = $cine->getDireccion();
                $valuesArray["capacidad"] = $cine->getCapacidad();
                $valuesArray["valor_entrada"] = $cine->getValor_entrada();
                $valuesArray["exist"]=$cine->getExist();
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('data/cines.json', $jsonContent);
        }

        private function retrieveData()
        {
            $this->cineList = array();

            if(file_exists('data/cines.json'))
            {
                $jsonContent = file_get_contents('data/cines.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $cine = new Cine($valuesArray["nombre"],$valuesArray["direccion"],$valuesArray["capacidad"],$valuesArray["valor_entrada"],$valuesArray["exist"]);
                    /*$cine->setNombre($valuesArray["nombre"]);
                    $cine->setDireccion($valuesArray["direccion"]);
                    $cine->setCapacidad($valuesArray["capacidad"]);
                    $cine->setValor_entrada($valuesArray["valor_entrada"]);*/
                    array_push($this->cineList, $cine);
                }
            }
        }
    }
?>
