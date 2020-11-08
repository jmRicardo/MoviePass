<?php

    use DAO\UserDAO as UserDAO;

    $userDAO = new UserDAO();

    if('' == $user->getFirst_name() || empty($user->getFirst_name()) || strlen($user->getFirst_name()) <= 3 || strlen($user->getFirst_name()) >= 25) {

        $_SESSION['message'] = 'Nombre invalido';

    } elseif(''  == $user->getLast_name() || empty($user->getLast_name()) || strlen($user->getLast_name()) <= 3 || strlen($user->getLast_name()) >= 25) {

        $_SESSION['message'] = 'Apellido invalido';

    } elseif('' == $user->getPassword() || empty($user->getPassword()) || strlen($user->getPassword()) < 8 || $user->getPassword() != $_POST['confirm_password']){
        
        $_SESSION['message'] = 'Contraseña invalida, no son iguales o no tiene 8 caracteres como minimo';
          
    }else {

        $user->setFirst_name(trim($user->getFirst_name()));
        $user->setLast_name(trim($user->getLast_name()));
        $user->setPassword(trim($user->getPassword()));
        
        /* $error = $this->userDAO->updateUserInfo($user);

        if (isset($error)) {
            $_SESSION['message'] = $error;
        }else {
            $_SESSION['message'] = "User actualizado con exito!";
        } */

    }

    header("Location:".FRONT_ROOT."Client/UpdateProcess");


?>