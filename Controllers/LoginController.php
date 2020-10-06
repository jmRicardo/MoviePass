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

        public function SignIn()
        {
            require_once(PROCESS_PATH."signinprocess.php");
        }

        public function LoadInfo()
        {
            require_once(PROCESS_PATH."myaccount.php");
        }
    }
?>