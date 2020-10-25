<?php

    namespace Models;

    class Date{

        private $id;
        private $date;
        private $idRoom;
        private $idMovie;

        public function __construct()
        {
                
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
         * Get the value of idRoom
         */ 
        public function getIdRoom()
        {
                return $this->idRoom;
        }

        /**
         * Set the value of idRoom
         *
         * @return  self
         */ 
        public function setIdRoom($idRoom)
        {
                $this->idRoom = $idRoom;

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