<?php
    namespace Controllers;

    class ContactController{

        public function SendMail($name,$asunto,$msg,$email){

        $header = "$email". "\r\n".
        'X-Mailer: PHP/' . phpversion();

        mail("guimainini@gmail.com", $asunto, $msg, $header);

        }    
        
    }    

?>



