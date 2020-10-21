<?php

    namespace Models;

    class Room {

        private $idRoom;
        private $idCinema;
        private $name;
        private $price;
        private $capacity;

        public function __construct()
        {
            
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
         * Get the value of idCinema
         */ 
        public function getIdCinema()
        {
                return $this->idCinema;
        }

        /**
         * Set the value of idCinema
         *
         * @return  self
         */ 
        public function setIdCinema($idCinema)
        {
                $this->idCinema = $idCinema;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of capacity
         */ 
        public function getCapacity()
        {
                return $this->capacity;
        }

        /**
         * Set the value of capacity
         *
         * @return  self
         */ 
        public function setCapacity($capacity)
        {
                $this->capacity = $capacity;

                return $this;
        }
    }

        







?>