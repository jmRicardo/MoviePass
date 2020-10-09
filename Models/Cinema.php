<?php

    namespace Models;


    class Cinema{

        private $id;
        private $name;
        private $total_capacity;
        private $address;
        private $ticket_value;

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
         * Get the value of total_capacity
         */ 
        public function getTotal_capacity()
        {
                return $this->total_capacity;
        }

        /**
         * Set the value of total_capacity
         *
         * @return  self
         */ 
        public function setTotal_capacity($total_capacity)
        {
                $this->total_capacity = $total_capacity;

                return $this;
        }

        /**
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }

        /**
         * Get the value of ticket_value
         */ 
        public function getTicket_value()
        {
                return $this->ticket_value;
        }

        /**
         * Set the value of ticket_value
         *
         * @return  self
         */ 
        public function setTicket_value($ticket_value)
        {
                $this->ticket_value = $ticket_value;

                return $this;
        }
    }
    

?>