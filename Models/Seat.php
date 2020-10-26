<?php

    namespace Models;

    class Seat{

        private $id;
        private $idDate;
        private $number;

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
         * Get the value of number
         */ 
        public function getNumber()
        {
                return $this->number;
        }

        /**
         * Set the value of number
         *
         * @return  self
         */ 
        public function setNumber($number)
        {
                $this->number = $number;

                return $this;
        }
    }

?>