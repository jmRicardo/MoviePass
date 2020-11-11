<?php

    use DAO\UserDAO;
    use Models\User;

    $user = new User();
    $user->setKey_value($key_value);
    $user->setEmail($email);
    $user->setFirst_name($first_name);
    $user->setLast_name($last_name);
    $user->setPassword($password);            

    $fileName = basename($_FILES["avatar"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

    $allowTypes = array('jpg','png','jpeg','gif'); 

    if(empty($_FILES["avatar"]["error"]))
    {
        if (in_array($fileType, $allowTypes))
        {
            $image = $_FILES['avatar']['tmp_name'];             
            $imgContent = addslashes(file_get_contents($image));      
            
            $user->setAvatar($imgContent);
        }else
        {
            $_SESSION['message'] = "Tipo de archivo invalido. Formatos permitidos: (JPG,GIF,PNG,JPEG)"; 
        ?>

            <script> location.replace("<?php echo FRONT_ROOT.'Client/Account';?>"); </script>
        <?php 
        exit();
        }
    }

    $userDAO = new UserDAO();

    if('' == $user->getFirst_name() || empty($user->getFirst_name()) || strlen($user->getFirst_name()) <= 3 || strlen($user->getFirst_name()) >= 25) {

        $_SESSION['message'] = 'Nombre invalido';

    } elseif(''  == $user->getLast_name() || empty($user->getLast_name()) || strlen($user->getLast_name()) <= 3 || strlen($user->getLast_name()) >= 25) {

        $_SESSION['message'] = 'Apellido invalido';

    } elseif(!empty($user->getPassword())){
        
        if(strlen($user->getPassword()) < 8 || $user->getPassword() != $confirm_password){
            
            $_SESSION['message'] = 'Contraseña invalida, no son iguales o no tiene 8 caracteres como minimo';

        }else {

            $user->setFirst_name(trim($user->getFirst_name()));
            $user->setLast_name(trim($user->getLast_name()));
            $user->setPassword(trim($user->getPassword()));

            $error = $userDAO->Update($user);

            $_SESSION['message'] = "User actualizado con exito!";
        }

    }else {
        
        $user->setFirst_name(trim($user->getFirst_name()));
        $user->setLast_name(trim($user->getLast_name()));

        $error = $userDAO->Update($user);

        $_SESSION['message'] = "User actualizado con exito!";
    }

    if (isset($error)) {
        $_SESSION['message'] = $error;
    }
?>

<script> location.replace("<?php echo FRONT_ROOT.'Client/Account';?>"); </script>