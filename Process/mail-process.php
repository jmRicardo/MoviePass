<?php 		

$to = "manochon@gmail.com";
$subject = "test image";
$message = "UN MENSAJE DE PRUEBA";

$data = getimagesize(VIEWS_PATH."img/qrs/qr-552.png");

var_dump($data);

//get file info
$file_name = "qr-552.png";
$file_size = $data[2];
$file_type = $data['mime'];


//header
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Reply-To: ".$replytoFull . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "X-Priority: 1" . "\r\n";	
$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
//message text
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
$body .= chunk_split(base64_encode($message_body)); 


//read file 
$handle = fopen(VIEWS_PATH."img/qrs/qr-552.png", "r");
$content = fread($handle, $file_size);

fclose($handle);
$encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)

$body .= "--$boundary\r\n";
$body .="Content-Type: $file_type; name=".$file_name."\r\n";
$body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
$body .="Content-Transfer-Encoding: base64\r\n";
$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
$body .= $encoded_content; 

mail($to, $subject, $body, $headers);

exit();



if(isset($_POST["submitnow"])){
   						$fromname = "fromname";
                        $fromemail = "fromemail";
                        $replytoname = "replytoname";
                        $replytoemail = "replytoemail";
                        $to = "manochon@gmail.com";
                        $subject = "TEST MAIL";
                        $message = "UN MENSAJE DE PRUEBA";

    //php validation, exit outputting json string
	// CREATE FULL FIELDS (NAME + EMAIL)
	$fromFull 	=  $fromname . ' <'.$fromemail.'> ';
	$replytoFull 	=  $replytoname . ' <'.$replytoemail.'> ';



    $subject        = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
	//$mgs = "".$message;
	//$message        = filter_var($mgs, FILTER_SANITIZE_STRING); //capture message

    $attachments = $_FILES['my_files'];
    
    $file_count = count($attachments['name']); //count total files attached
    $boundary = md5("shopinson.com"); 
    
    //construct a message body to be sent to recipient
    //$message_body =  "------------------------------\n";
    $message_body =  "$message\n";

    
    if($file_count > 0){ //if attachment exists
        //header
        $headers = "MIME-Version: 1.0\r\n";
        $headers  = "From: ".$fromFull . "\r\n";
        $headers .= "Reply-To: ".$replytoFull . "\r\n";
    	// $headers .= "To: Mary <mary@example.com>, Kelly <kelly@example.com>" . "\r\n";
		// $headers .= "Cc: sendacopy@here.com" . "\r\n";
		// $headers .= "Bcc: sendablindcopy@here.com" . "\r\n";
		// $headers .= "X-Sender: testsite < mail@testsite.com >" . "\r\n";
		// $headers .= "Return-Path: " . $fromFull . "\r\n";
		// $headers .= "Content-Type: text/html; charset=ISO-8859-1" . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "X-Priority: 1" . "\r\n";
        
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //message text
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message_body)); 

        //attachments
        for ($x = 0; $x < $file_count; $x++){       
            if(!empty($attachments['name'][$x])){
                
                if($attachments['error'][$x]>0) //exit script and output error if we encounter any
                {
                    $mymsg = array( 
                    1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
                    2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
                    3=>"The uploaded file was only partially uploaded", 
                    4=>"No file was uploaded", 
                    6=>"Missing a temporary folder" ); 
                    print  $mymsg[$attachments['error'][$x]]; 
                    exit;
                }

 
                

                //get file info
                $file_name = $attachments['name'][$x];
                $file_size = $attachments['size'][$x];
                $file_type = $attachments['type'][$x];
                
                //read file 
                $handle = fopen($attachments['tmp_name'][$x], "r");

                $content = fread($handle, $file_size);
                fclose($handle);
                $encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)
                
                $body .= "--$boundary\r\n";
                $body .="Content-Type: $file_type; name=".$file_name."\r\n";
                $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
                $body .="Content-Transfer-Encoding: base64\r\n";
                $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
                $body .= $encoded_content; 
            }
        }

    }else{ //send plain email otherwise
	// FULL HEADER
	$headers  = "From: ".$fromFull . "\r\n";
	$headers .= "Reply-To: ".$replytoFull . "\r\n";
	// $headers .= "To: Mary <mary@example.com>, Kelly <kelly@example.com>" . "\r\n";
	// $headers .= "Cc: sendacopy@here.com" . "\r\n";
	// $headers .= "Bcc: sendablindcopy@here.com" . "\r\n";
	// $headers .= "X-Sender: testsite < mail@testsite.com >" . "\r\n";
	// $headers .= "Return-Path: " . $fromFull . "\r\n";
	// $headers .= "Content-Type: text/html; charset=ISO-8859-1" . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers .= "X-Priority: 1" . "\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
    $body = $message_body;
    }

    $sentMail = mail($to, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
        $_SESSION['message'] = 'Thank you for your email';
    }else{
        $_SESSION['message'] = 'Could not send mail! Please check your PHP mail configuration.';  
    }
}
?>

<script> location.replace("<?php echo FRONT_ROOT.'Client/Home';?>"); </script>