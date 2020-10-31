<?php
    namespace Controllers;

    

    class ContactController{

        public function SendMail($name,$asunto,$msg,$email){

        $header = "$email". "\r\n".
        'X-Mailer: PHP/' . phpversion();

        mail(CONTACT_MAIL, $asunto, $msg, $header);

        
        }       



        
    }    

?>



