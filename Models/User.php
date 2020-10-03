<?php 
    namespace Models;

    class User {

        private $idUser;
        private $idProfile;
        private $email;
        private $password;

        function __construct($idUser, $idProfile, $email, $password) {
            $this->idUser = $idUser;
            $this->idProfile = $idProfile;
            $this->email = $email;
            $this->password = $password;
        }

        public function getIdUser(){
            return $this->idUser;
        }
    
        public function setIdUser($idUser){
            $this->idUser = $idUser;
        }
    
        public function getIdProfile(){
            return $this->idProfile;
        }
    
        public function setIdProfile($idProfile){
            $this->idProfile = $idProfile;
        }

        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }

    }


?>