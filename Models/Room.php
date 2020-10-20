<?php

    namespace Models;

    class Room {

        private $idRoom;
        private $idCinema;
        private $name;
        private $price;
        private $capacity;

        public function getIdRoom(){
            return $this->idRoom;
        }
    
        public function setIdRoom($idRoom){
            $this->idRoom = $idRoom;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getPrice(){
            return $this->price;
        }
    
        public function setPrice($price){
            $this->price = $price;
        }
    
        public function getCapacity(){
            return $this->capacity;
        }
    
        public function setCapacity($capacity){
            $this->capacity = $capacity;
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
    }









?>