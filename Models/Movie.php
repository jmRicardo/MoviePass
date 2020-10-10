<?php
    namespace Models;

    class Movie {

        private $idMovie;
        private $adult;
        private $posterPath;
        private $originalTitle;
        private $originalLanguage;
        private $title;
        private $overview;
        private $releaseDate;
        private $trailerPath;

        function __construct() {
            
        }

        public function getidMovie(){
            return $this->idMovie;
        }
    
        public function setidMovie($idMovie){
            $this->idMovie = $idMovie;
        }
    
        public function getAdult(){
            return $this->adult;
        }
    
        public function setAdult($adult){
            $this->adult = $adult;
        }
    
        public function getPosterPath(){
            return $this->posterPath;
        }
    
        public function setPosterPath($posterPath){
            $this->posterPath = $posterPath;
        }
    
        public function getOriginalTitle(){
            return $this->originalTitle;
        }
    
        public function setOriginalTitle($originalTitle){
            $this->originalTitle = $originalTitle;
        }
    
        public function getOriginalLanguage(){
            return $this->originalLanguage;
        }
    
        public function setOriginalLanguage($originalLanguage){
            $this->originalLanguage = $originalLanguage;
        }
    
        public function getTitle(){
            return $this->title;
        }
    
        public function setTitle($title){
            $this->title = $title;
        }
    
        public function getOverview(){
            return $this->overview;
        }
    
        public function setOverview($overview){
            $this->overview = $overview;
        }
    
        public function getReleaseDate(){
            return $this->releaseDate;
        }
    
        public function setReleaseDate($releaseDate){
            $this->releaseDate = $releaseDate;
        }
    
        public function getTrailerPath(){
            return $this->trailerPath;
        }
    
        public function setTrailerPath($trailerPath){
            $this->trailerPath = $trailerPath;
        }
    }

?>