<?php

// echo "skljdf";
// var_dump($_POST);
// exit();
// array (size=4)
// 'name' => string 'Guillermo Mainini' (length=17)
// 'email' => string 'guimainini@gmail.com' (length=20)
// 'msg' => string 'putos el q le' (length=13)
// 'enviar' => string 'Enviar' (length=6)
if(isset($_POST['enviar'])){
    if(!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['name'])){
        
        $name = $_POST['name'];
        $asunto = $_POST['asunto'];
        $msg = $_POST['msg'];
        $email = $_POST['email'];
        $header = "$name"."$email". "\r\n".
        'X-Mailer: PHP/' . phpversion();
        mail("guimainini@gmail.com", $asunto, $msg, $header);
        // if($mail){
        //     echo "<h4>Mail enviado exitosamente</h4>";

        // }
        
    }
}

header("Location:".FRONT_ROOT."Client/Home"); 

?>