<?php

    use DAO\CinemaDAO as CinemaDAO;

    $cinemaDAO = new CinemaDAO();

    $cinemaInfo = $cinemaDAO->GetCinema(trim($_POST['id']));

    if('' == $_POST['id' || empty($cinemaInfo)]) {
        $status = 'fail';
        $_SESSION['message'] = 'Nombre de cine invalido';
    } else {
        $status = 'ok';
        $_SESSION['message'] = null;
    }

    header("Location:".FRONT_ROOT."Admin/ShowCinemaList");






    /* $userDAO = new UserDAO();

     // check for user with email address
    $userInfo = $userDAO->getUserWithEmailAddress( trim( $_POST['email'] ) );

    if ( '' == $_POST['email'] || empty( $userInfo ) ) { // no email or password is invalid
        $status = 'fail';
        $_SESSION['message'] = 'Correo Electronico o contraseña incorrecta';
    } elseif ( '' == $_POST['password'] || !password_verify( $_POST['password'], $userInfo['password'] ) ) { // password check
        $status = 'fail';
        $_SESSION['message'] = 'Correo Electronico o contraseña incorrecta';
    } else { // all good
        $status = 'ok';
        $_SESSION['message'] = null;

        if ( isset( $_SESSION['fb_user_info']['id'] ) ) { // if we have facebook id save it
            $userDAO->updateRow( 'users', 'fb_user_id', $_SESSION['fb_user_info']['id'], $userInfo['id'] );
        }

        if ( isset( $_SESSION['fb_access_token'] ) ) { // if we have an access token save it
            $userDAO->updateRow( 'users', 'fb_access_token', $_SESSION['fb_access_token'], $userInfo['id'] );
        }

        // get updated info
        $userInfo = $userDAO->getUserWithEmailAddress( trim( $_POST['email'] ) );

        // save info to php session
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_info'] = $userInfo;
    }

    header("Location:".FRONT_ROOT."Client/Home");    */

?>