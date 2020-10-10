<?php

    namespace Models;

    class GenreByMovie {

        private $idGenreByMovie;
        private $idGenre;
        private $idMovie;

        function __construct() {

        }

        public function getIdGenreByMovie(){
            return $this->idGenreByMovie;
        }
    
        public function setIdGenreByMovie($idGenreByMovie){
            $this->idGenreByMovie = $idGenreByMovie;
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