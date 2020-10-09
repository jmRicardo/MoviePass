<?php

    namespace Models;

    class Date{

        private $idDate;
        private $date;
        private $cinema;
        private $idMovie;

        public function __construct()
        {
            $date = date("Y-m-d");
            $cinema = new Cinema();
        }

        /**
         * Get the value of idDate
         */ 
        public function getIdDate()
        {
                return $this->idDate;
        }

        /**
         * Set the value of idDate
         *
         * @return  self
         */ 
        public function setIdDate($idDate)
        {
                $this->idDate = $idDate;

                return $this;
        }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        /**
         * Get the value of cinema
         */ 
        public function getCinema()
        {
                return $this->cinema;
        }

        /**
         * Set the value of cinema
         *
         * @return  self
         */ 
        public function setCinema($cinema)
        {
                $this->cinema = $cinema;

                return $this;
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
    }



?>