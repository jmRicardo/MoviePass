<?php
    namespace Models;

    class Profile {

        private $idProfile;
        private $firstName;
        private $lastName;
        private $dni;

        function __construct($idProfile, $firstName, $lastName, $dni) {
            $this->idProfile = $idProfile;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->dni = $dni;
        }

        public function getIdProfile(){
            return $this->idProfile;
        }
    
        public function setIdProfile($idProfile){
            $this->idProfile = $idProfile;
        }
    
        public function getFirstName(){
            return $this->firstName;
        }
    
        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }
    
        public function getLastName(){
            return $this->lastName;
        }
    
        public function setLastName($lastName){
            $this->lastName = $lastName;
        }
    
        public function getDni(){
            return $this->dni;
        }
    
        public function setDni($dni){
            $this->dni = $dni;
        }
    }



?>