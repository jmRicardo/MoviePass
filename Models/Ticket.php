<?php

    namespace Models;

    class Ticket{

        private $id;
        private $idDate;
        private $idUser;
        private $seat;

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
         * Get the value of idUser
         */ 
        public function getIdUser()
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @return  self
         */ 
        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }       

        /**
         * Get the value of seat
         */ 
        public function getSeat()
        {
                return $this->seat;
        }

        /**
         * Set the value of seat
         *
         * @return  self
         */ 
        public function setSeat($seat)
        {
                $this->seat = $seat;

                return $this;
        }
    }

?>