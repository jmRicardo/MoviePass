<?php
    namespace Controllers;

    

    class ContactController{

        public function SendMail($name,$asunto,$msg,$email){

            require_once(PROCESS_PATH."mail-process.php");        
        }       

        public function SendQuery($name,$email,$msg)
        {
            $fromFull 	=  $name . ' <'.$email.'> ';
            $replytoFull 	=  "admin" . ' <'.CONTACT_MAIL.'> ';

            $headers  = "From: ".$fromFull . "\r\n";
            $headers .= "Reply-To: ".$replytoFull . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            $headers .= "X-Priority: 1" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";

            $sentMail = mail(CONTACT_MAIL, "CONSULTA", $msg, $headers);
            if($sentMail) 
            {       
                $_SESSION['message'] = 'Gracias por su Consulta!';
            }else{
                $_SESSION['message'] = 'No pudimos enviar la consulta! intente mas tarde.';  
            }?>         

            <script> location.replace("<?php echo FRONT_ROOT.'Client/Home';?>"); </script>
        <?php }
    }    

?>



