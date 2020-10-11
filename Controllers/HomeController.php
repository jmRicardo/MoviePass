<?php
    namespace Controllers;

    use DAO\FacebookDAO as FacebookDAO;

    class HomeController
    {
       
        public function Index($message = "")
        {
            //require_once(VIEWS_PATH."login.php");
            require_once(VIEWS_PATH."contact.php");
        }

        public function Facebook()
        {
            $facebookDAO = new FacebookDAO();
            
            if ( isset( $_GET['state'] ) && FB_APP_STATE == $_GET['state'] ) { // coming from facebook
                
                // try and log the user in with $_GET vars from facebook 
                $fbLogin = $facebookDAO->tryAndLoginWithFacebook( $_GET );

                require_once(VIEWS_PATH."myaccount.php");
            }
        }
        
        public function LogOut()
        {
            session_destroy();

            $this->Index();
        }
    }
?>