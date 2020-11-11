<?php

    use DAO\UserDAO as UserDAO;

    $userDAO = new UserDAO();

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
    if (isset($_POST["current-url"])) { ?>

        <script> location.replace("<?php echo $_POST["current-url"];?>"); </script>

    <?php } else { ?>
        
        <script> location.replace("<?php echo FRONT_ROOT.'Client/Home';?>"); </script>
    <?php }   
?>