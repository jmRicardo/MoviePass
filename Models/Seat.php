<?php

    namespace Models;

    class Seat{

        private $id;
        private $row;
        private $column;
        private $idDate;

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
         * Get the value of row
         */ 
        public function getRow()
        {
                return $this->row;
        }

        /**
         * Set the value of row
         *
         * @return  self
         */ 
        public function setRow($row)
        {
                $this->row = $row;

                return $this;
        }

        /**
         * Get the value of column
         */ 
        public function getColumn()
        {
                return $this->column;
        }

        /**
         * Set the value of column
         *
         * @return  self
         */ 
        public function setColumn($column)
        {
                $this->column = $column;

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
    }
?>