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
            ?>
                <script> location.replace("<?php echo FRONT_ROOT.'Client/Home';?>"); </script> 
            <?php 
            exit();    
        }          
        }

        static function isAdmin() {
            if ( isset( $_SESSION['user_info'] ) && $_SESSION['user_info'] && USER_LEVEL_ADMIN == $_SESSION['user_info']['user_level'] ) {
                return true;
            } else {
                return false;
            }
        }

        static function sendTicket($info,$id)
        {           
            $to = $_SESSION['user_info']['email'];

            $fromFull 	=  "MoviePass" . ' <'.CONTACT_MAIL.'> ';
            
            $replytoFull 	=  "Contacto" . ' <'.CONTACT_MAIL.'> ';

            $boundary = md5("MoviePass"); 

            //header
            $headers = "MIME-Version: 1.0\r\n";
            $headers  = "From: ".$fromFull . "\r\n";
            $headers .= "Reply-To: ".$replytoFull . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            $headers .= "X-Priority: 1" . "\r\n";
            
            $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
            
            //message text
            $body = "--$boundary\r\n";
            $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
            $body .= chunk_split(base64_encode($info)); 
            
            $subject = "Nro Ticket: " . $id;

            $imgPath = VIEWS_PATH."img/qrs/qr-".$id.".png";

            $data = getimagesize($imgPath);

            $file_name = "qr-".$id.".png";
            $file_size = 300;
            $file_type = $data['mime'];   

            $handle = fopen($imgPath, "r");                
            $content = fread($handle, $file_size);
            fclose($handle);
            $encoded_content = chunk_split(base64_encode($content));

            $body .= "--$boundary\r\n";
            $body .="Content-Type: $file_type; name=".$file_name."\r\n";
            $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
            $body .="Content-Transfer-Encoding: base64\r\n";
            $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
            $body .= $encoded_content; 

            mail($to, $subject, $body, $headers);
        }
    }     

        
?>