<?php

    namespace Models;

    class Seat{

        private $id;
        private $row;
        private $column;
        private $rowLetter;
        private $columnNumber;
        private $idDate;
        private $idUser;

        public function __construct()
        {
            
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
         * Get the value of columnNumber
         */ 
        public function getColumnNumber()
        {
                return $this->columnNumber;
        }

        /**
         * Set the value of columnNumber
         *
         * @return  self
         */ 
        public function setColumnNumber($columnNumber)
        {
                $this->columnNumber = $columnNumber;

                return $this;
        }

        /**
         * Get the value of rowLetter
         */ 
        public function getRowLetter()
        {
                return $this->rowLetter;
        }

        /**
         * Set the value of rowLetter
         *
         * @return  self
         */ 
        public function setRowLetter($rowLetter)
        {
                $this->rowLetter = $rowLetter;

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