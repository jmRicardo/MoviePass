<?php
    namespace Controllers;

    class LoginController
    {
        public function __construct()
        {
           
        }

        public function SignUp($message = "")
        {
            require_once(VIEWS_PATH."login-signup.php");           
        }

        public function SignUpProcess()
        {            
            require_once(VIEWS_PATH."signup-process.php");           
        }

        public function SignIn($message = "")
        {
            require_once(VIEWS_PATH."login-signin.php");           
        }

        public function SignInProcess()
        {
            require_once(VIEWS_PATH."signin-process.php");           
        }
    }
?>