<?php namespace dao\JSON;

    use dao\JSON\IRepository as IRepository;
    use model\PerfilUsuario as PerfilUsuario;
    use model\User as User;

    class UsersRepository implements IRepository
    {
        private $usersList = array();

        public function Add($user){
            $this->retrieveData();
            array_push($this->usersList, $user);
            $this->saveData();
        }
    
        public function GetAll(){
            $this->retrieveData();
            return $this->usersList;
        }

        public function Delete($email){
            if($_SESSION['loggedUser']->getEmail() === $email){
                session_destroy();
                header("location: index.php");
            }
            $this->retrieveData();
            $newList = array();
            foreach ($this->usersList as $user) {
                if($user->getEmail() != $email){
                    array_push($newList, $user);
                }
            }
    
            $this->usersList = $newList;
            $this->saveData();
        }


        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->usersList as $user)
            {
                $valuesArray["email"] = $user->getEmail();
                $valuesArray["password"] = $user->getPassword();
                $valuesArray["rol"] = $user->getRol();
                $valuesArray["nombre"] = $user->getNombre();
                $valuesArray["apellido"] = $user->getApellido();
                $valuesArray["dni"] = $user->getDni();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('data/users.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->usersList = array();

            if(file_exists('data/users.json'))
            {
                $jsonContent = file_get_contents('data/users.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $user = new PerfilUsuario($valuesArray["email"],$valuesArray["password"],$valuesArray["rol"],$valuesArray["nombre"],$valuesArray["apellido"],$valuesArray["dni"]);
                    /*$user->setEmail($valuesArray["email"]);
                    $user->setPass($valuesArray["password"]);
                    $user->setRol($valuesArray["rol"]);
                    $user->setNombre($valuesArray["nombre"]);
                    $user->setApellido($valuesArray["apellido"]);
                    $user->setDni($valuesArray["dni"]);*/

                    array_push($this->usersList, $user);
                }
            }
        }

        public function getByEmail($email) {
            $this->RetrieveData();

            foreach ($this->usersList as $key => $user) {
                if($user->getEmail() == $email) {
                    return $user;
                }
            }
        }
    }
?>