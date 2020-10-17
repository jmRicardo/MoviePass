<?php
    namespace Controllers;

    use DAO\FacebookDAO as FacebookDAO;

    class HomeController
    {
        
        public function Index($message = "")
        {
            header("Location:".FRONT_ROOT."Client/Home");     
        }

        public function Facebook()
        {
            $facebookDAO = new FacebookDAO();
            
            if ( isset( $_GET['state'] ) && FB_APP_STATE == $_GET['state'] ) { // coming from facebook
                
                // try and log the user in with $_GET vars from facebook 
                $fbLogin = $facebookDAO->tryAndLoginWithFacebook( $_GET );
            }

            $this->Index();
        }
        
        public function LogOut()
        {
            session_destroy();

            session_start();

            $this->Index();
        }

        


    }
?>