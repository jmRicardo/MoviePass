<?php
    namespace Models;

    class Movie {

        private $id;
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


        /**
         * Get the value of idMovie
         */ 
        public function getIdMovie()
        {
                return $this->idMovie;
        }

        /**
         * Set the value of idMovie
         *
         * @return  self
         */ 
        public function setIdMovie($idMovie)
        {
                $this->idMovie = $idMovie;

                return $this;
        }

        /**
         * Get the value of adult
         */ 
        public function getAdult()
        {
                return $this->adult;
        }

        /**
         * Set the value of adult
         *
         * @return  self
         */ 
        public function setAdult($adult)
        {
                $this->adult = $adult;

                return $this;
        }

        /**
         * Get the value of posterPath
         */ 
        public function getPosterPath()
        {
                return $this->posterPath;
        }

        /**
         * Set the value of posterPath
         *
         * @return  self
         */ 
        public function setPosterPath($posterPath)
        {
                $this->posterPath = $posterPath;

                return $this;
        }

        /**
         * Get the value of originalTitle
         */ 
        public function getOriginalTitle()
        {
                return $this->originalTitle;
        }

        /**
         * Set the value of originalTitle
         *
         * @return  self
         */ 
        public function setOriginalTitle($originalTitle)
        {
                $this->originalTitle = $originalTitle;

                return $this;
        }

        /**
         * Get the value of originalLanguage
         */ 
        public function getOriginalLanguage()
        {
                return $this->originalLanguage;
        }

        /**
         * Set the value of originalLanguage
         *
         * @return  self
         */ 
        public function setOriginalLanguage($originalLanguage)
        {
                $this->originalLanguage = $originalLanguage;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of overview
         */ 
        public function getOverview()
        {
                return $this->overview;
        }

        /**
         * Set the value of overview
         *
         * @return  self
         */ 
        public function setOverview($overview)
        {
                $this->overview = $overview;

                return $this;
        }

        /**
         * Get the value of releaseDate
         */ 
        public function getReleaseDate()
        {
                return $this->releaseDate;
        }

        /**
         * Set the value of releaseDate
         *
         * @return  self
         */ 
        public function setReleaseDate($releaseDate)
        {
                $this->releaseDate = $releaseDate;

                return $this;
        }

        /**
         * Get the value of trailerPath
         */ 
        public function getTrailerPath()
        {
                return $this->trailerPath;
        }

        /**
         * Set the value of trailerPath
         *
         * @return  self
         */ 
        public function setTrailerPath($trailerPath)
        {
                $this->trailerPath = $trailerPath;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }

?>