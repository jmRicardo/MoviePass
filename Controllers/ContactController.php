<?php
    namespace Controllers;

    

    class ContactController{

        public function SendMail($name,$asunto,$msg,$email){

            require_once(PROCESS_PATH."mail-process.php");        
        }       
    }    

?>



