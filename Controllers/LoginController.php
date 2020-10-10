<?php
    namespace Controllers;

    class LoginController
    {
        public function __construct()
        {
           
        }

        public function SignUp()
        {
            require_once(VIEWS_PATH."signup.php");           
        }

        public function Login()
        {
            require_once(VIEWS_PATH."login.php");           
        }

        public function Test()
        {
            require_once(PROCESS_PATH."signinprocess.php");           
        }
    }
?>