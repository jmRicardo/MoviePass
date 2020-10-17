<?php
	
	require_once(VIEWS_PATH . "login-nav.php");
    


	use DAO\FacebookDAO as FacebookDAO;
	use DAO\UserDAO as UserDAO;

	$facebookDAO = new FacebookDAO();

	// only if you are logged out can you view the login page
	$userDAO = new UserDAO();	
	//$userDAO->loggedInRedirect();
?>






<body class="bg-dark" >
	<div class="site-content-container ">
		<div class="site-content-centered">
			<div class="site-content-section">
				<div class="site-content-section-inner">
					<div class="section-heading ">INICIO DE SESION</div>
					<form id="login_form" name="login_form" method="POST" action="<?php echo FRONT_ROOT ?>Login/SignInProcess" >
						<div id="error_message" class="error-message">
							<?php  if (isset($message)) {echo $message;} ?>
							<?php if ( isset( $_SESSION['eci_login_required_to_connect_facebook'] ) && $_SESSION['eci_login_required_to_connect_facebook'] ) : // enter password to connect account ?>
								<div style="margin-bottom:10px;">
									An account already exists with that email address. To connect your Facebook account, enter your password.
								</div>
							<?php endif; ?>
						</div>
						<div>
							<div class="section-label">Correo electronico</div>
							<div>
								<?php if ( isset( $_SESSION['fb_user_info']['email'] ) ? $_SESSION['fb_user_info']['email'] : '' ) : // pre populate with facebook email ?>
									<?php $inputEmail = $_SESSION['fb_user_info']['email']; ?>
								<?php else : ?>
									<?php $inputEmail = ''; ?>
								<?php endif; ?>
								<input class="form-input" type="text" name="email" value="<?php echo $inputEmail; ?>" />
							</div>
						</div>
						<div class="section-mid-container">
							<div class="section-label">Contraseña</div>
							<div><input class="form-input" type="password" name="password" /></div>
						</div>

						<div class="section-action-container">
						<div class="section-button-container" id="login_button">
							<div>
									<button class="login_button_submit" type="submit">Iniciar Sesion</button>
							</div>				
						</div>
						</div>

						
					</form>
					
					
					<div class="section-action-container">
						- O -
					</div>
					<div class="section-action-container">
						<div id="error_message_fb_php" class="error-message">
							<?php if ( !empty( $fbLogin['status'] ) && 'fail' == $fbLogin['status'] ) : // we have a facebook error to display ?>
								<?php echo $fbLogin['message']; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="section-action-container">
						<a href="<?php echo $facebookDAO->getFacebookLoginUrl(); ?>" class="a-fb">
							<div class="fb-button-container">
							Iniciar sesión con Facebook
							</div>
						</a>
					</div>
					<div class="section-footer-container">
					¿No eres usuario? <a class="a-default" href="<?php echo FRONT_ROOT ?>Login/SignUp">Registrate</a>
					</div>
				</div>
			</div>
		</div>
	</div> 
</body>
<!--<script>

	$( '#error_message' ).html( "<?php echo isset( $_GET['message'] );?>" );



function processLogin() {
	// clear error message and red borders on signup click
	$( '#error_message' ).html( '' );
	$( '#error_message_fb_php' ).html( '' );
	$( 'input' ).removeClass( 'invalid-input' );
	// assume no fields are blank
	var allFieldsFilledIn = true;
	$( 'input' ).each( function() { // simple front end check, loop over inputs
		if ( '' == $( this ).val() ) { // input is blank, add red border and set flag to false
			$( this ).addClass( 'invalid-input ');
			allFieldsFilledIn = false;
		}
	} );
	if ( allFieldsFilledIn ) { // all fields are filled in!
		// server side login
		window.location.href = "<?php echo FRONT_ROOT ?>Login/SignIn";
	
	} else { // some fields are not filled in, show error message and scroll to top of page
		$( '#error_message' ).html( 'All fields must be filled in.' );
		$( window ).scrollTop( 0 );
	}
}


$( '#login_button' ).on( 'click', function() { // onclick for our login button
	processLogin();
} );

$( '.form-input' ).keyup( function( e ) {
	if ( e.keyCode == 13 ) { // our enter key
		processLogin();
	}
} );
</script>
 -->