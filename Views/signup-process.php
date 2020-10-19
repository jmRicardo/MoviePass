<?php

	echo "ENTRASTE A SIGN UP PROCSS";

	use DAO\UserDAO as UserDAO;

    $userDAO = new UserDAO();

	// check for user with email address
	$userInfo =  $userDAO->getUserWithEmailAddress( trim( $_POST['email'] ) );

	if ( !filter_var( trim( $_POST['email'] ), FILTER_VALIDATE_EMAIL ) ) { // check email address
		$_SESSION['message'] = 'Correo Electronico Invalido';
	} elseif ( !empty( $userInfo ) ) { // user already exists with that email
		$_SESSION['message'] = 'Ya existe un usuario con ese Correo Electronico';
	} elseif ( !$_POST['first_name'] || !$_POST['last_name'] ) { // check name
		$_SESSION['message'] = 'Nombre o Apellido invalidos';
	} elseif ( !$_POST['password'] || $_POST['password'] != $_POST['confirm_password'] || strlen( $_POST['password'] ) < 8 ) { // check password/confirm password
		$_SESSION['message'] = 'Contraseña invalida, no son iguales o no tiene 8 caracteres como minimo';
	} else { // all passes so we are all good!

		$_SESSION['message'] = 'Registrado con exito!';

		// sign the user up to our site!
		$userId =  $userDAO->signUserUp( $_POST );
	}

	header("Location:".FRONT_ROOT ."Client/Home");

?>