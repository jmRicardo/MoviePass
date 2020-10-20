<?php

    namespace Models;

    class GenreByMovie {

        private $id;
        private $idGenre;
        private $idMovie;

        function __construct() {

        }

        public function getid(){
            return $this->id;
        }
    
        public function setid($id){
            $this->id = $id;
        }
    
        public function getIdGenre(){
            return $this->idGenre;
        }
    
        public function setIdGenre($idGenre){
            $this->idGenre = $idGenre;
        }
    
        public function getIdMovie(){
            return $this->idMovie;
        }
    
        public function setIdMovie($idMovie){
            $this->idMovie = $idMovie;
        }        
    }

?>