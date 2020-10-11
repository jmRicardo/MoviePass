<?php

if(isset($_POST['enviar'])){
    if(!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['name'])){
        
        $name = $_POST['name'];
        $asunto = $_POST['asunto'];
        $msg = $_POST['msg'];
        $email = $_POST['email'];
        $header = "$email". "\r\n".
        'X-Mailer: PHP/' . phpversion();
        mail("guimainini@gmail.com", $asunto, $msg, $header);
        // if($mail){
        //     echo "<h4>Mail enviado exitosamente</h4>";

        // }
    }
}


?>