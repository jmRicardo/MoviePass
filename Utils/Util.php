<?php 

    namespace Utils;

    class Util{

        private static $instance = null;

        public static function GetInstance()
        {
            if(self::$instance == null)
                self::$instance = new Util();

            return self::$instance;
        }

         /**
         * Check if user is logged in
         *
         * @param void
         *
         * @return boolean
         */
        static function isLoggedIn() {
            if ( ( isset( $_SESSION['is_logged_in'] ) && $_SESSION['is_logged_in'] ) && ( isset( $_SESSION['user_info'] ) && $_SESSION['user_info'] ) ) { // check session variables, user is logged in
                return true;
            } else { // user is not logged in
                return false;
            }
        }

        /**
         * If user is logged in, redirect to homepage
         *
         * @param void
         *
         * @return boolean
         */
        static function loggedInRedirect() {
            if ( !Util::isLoggedIn() ) { // user is not logged in
                // send them to the home page
                header( 'location:'.VIEWS_PATH."Client/Home" );
            }
        }

        static function isAdmin() {
            if ( isset( $_SESSION['user_info'] ) && $_SESSION['user_info'] && USER_LEVEL_ADMIN == $_SESSION['user_info']['user_level'] ) {
                return true;
            } else {
                return false;
            }
        } 
    }     

        
?>