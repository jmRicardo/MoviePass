<?php

    namespace Models;

    class User{

        private $id;
        private $email;
        private $first_name;
        private $last_name;
        private $password;
        private $created;
        private $key_value;
        private $user_level;
        private $fb_user_id;
        private $fb_access_token;

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
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of first_name
         */ 
        public function getFirst_name()
        {
                return $this->first_name;
        }

        /**
         * Set the value of first_name
         *
         * @return  self
         */ 
        public function setFirst_name($first_name)
        {
                $this->first_name = $first_name;

                return $this;
        }

        /**
         * Get the value of last_name
         */ 
        public function getLast_name()
        {
                return $this->last_name;
        }

        /**
         * Set the value of last_name
         *
         * @return  self
         */ 
        public function setLast_name($last_name)
        {
                $this->last_name = $last_name;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of created
         */ 
        public function getCreated()
        {
                return $this->created;
        }

        /**
         * Set the value of created
         *
         * @return  self
         */ 
        public function setCreated($created)
        {
                $this->created = $created;

                return $this;
        }

        /**
         * Get the value of key_value
         */ 
        public function getKey_value()
        {
                return $this->key_value;
        }

        /**
         * Set the value of key_value
         *
         * @return  self
         */ 
        public function setKey_value($key_value)
        {
                $this->key_value = $key_value;

                return $this;
        }

        /**
         * Get the value of user_level
         */ 
        public function getUser_level()
        {
                return $this->user_level;
        }

        /**
         * Set the value of user_level
         *
         * @return  self
         */ 
        public function setUser_level($user_level)
        {
                $this->user_level = $user_level;

                return $this;
        }

        /**
         * Get the value of fb_access_token
         */ 
        public function getFb_access_token()
        {
                return $this->fb_access_token;
        }

        /**
         * Set the value of fb_access_token
         *
         * @return  self
         */ 
        public function setFb_access_token($fb_access_token)
        {
                $this->fb_access_token = $fb_access_token;

                return $this;
        }

        /**
         * Get the value of fb_user_id
         */ 
        public function getFb_user_id()
        {
                return $this->fb_user_id;
        }

        /**
         * Set the value of fb_user_id
         *
         * @return  self
         */ 
        public function setFb_user_id($fb_user_id)
        {
                $this->fb_user_id = $fb_user_id;

                return $this;
        }
    }

?>
