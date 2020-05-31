<?php namespace dao\JSON;

    use dao\JSON\IRepository as IRepository;
    use model\Funcion as Funcion;

    class FuncionRepository implements IRepository
    {
        private $funcionList = array();

        public function add($funcion){
            $this->retrieveData();
            array_push($this->funcionList, $funcion);
            $this->saveData();
        }
    
        public function getAll(){
            $this->retrieveData();
            return $this->funcionList;
        }

        
        public function delete($value) {
            $this->retrieveData();
            foreach($this->funcionList as $key => $funcion) {
                if($funcion->getCine() == $value) {
                    unset($this->funcionList[$key]);
                    break;
                }
            }
            $this->saveData();
        }

       /* public function update($nombre, $direccion, $capacidad, $valor_entrada){
            $this->retrieveData();
            foreach ($this->funcionList as $key => $funcion) {
                if($funcion->getNombre() == $nombre){
                    $funcion->setDireccion($direccion);
                    $funcion->setCapacidad($capacidad);
                    $funcion->setValor_entrada($valor_entrada);
                   
                }
            }
            $this->saveData();
        }*/


        private function saveData()
        {
            $arrayToEncode = array();

            foreach($this->funcionList as $funcion)
            {
                $valuesArray["cine"] = $funcion->getCine();
                $valuesArray["pelicula"] = $funcion->getPelicula();
                $valuesArray["fecha"] = $funcion->getFecha();
                $valuesArray["hora"] = $funcion->getHora();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('data/funcion.json', $jsonContent);
        }

        private function retrieveData()
        {
            $this->funcionList = array();

            if(file_exists('data/funcion.json'))
            {
                $jsonContent = file_get_contents('data/funcion.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $funcion = new Funcion($valuesArray["cine"],$valuesArray["pelicula"],$valuesArray["fecha"],$valuesArray["hora"]);
                    /*$cine->setNombre($valuesArray["nombre"]);
                    $cine->setDireccion($valuesArray["direccion"]);
                    $cine->setCapacidad($valuesArray["capacidad"]);
                    $cine->setValor_entrada($valuesArray["valor_entrada"]);*/
                    array_push($this->funcionList, $funcion);
                }
            }
        }
    }
?>
