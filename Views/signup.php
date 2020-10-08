<?php
	
	use DAO\FacebookDAO as FacebookDAO;
	use DAO\UserDAO as UserDAO;

	$facebookDAO = new FacebookDAO();

	// only if you are logged out can you view the login page
	$userDAO = new UserDAO();	
	//$userDAO->loggedInRedirect();
?>

<script>
$( function() { // once the document is ready, do things
				// initialize our loader overlay
				loader.initialize();

				$( '#signup_button' ).on( 'click', function() { // onclick for our signup button
					processSignup();
				} );

				$( '.form-input' ).keyup( function( e ) {
					if ( e.keyCode == 13 ) { // our enter key
						processSignup();
					}
				} );
			} );

			function processSignup() {
				// clear error message and red borders on signup click
				$( '#error_message' ).html( '' );
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
					loader.showLoader();

					$.ajax( {
						url: 'php/process_signup.php',
						data: $( '#signup_form' ).serialize(),
						type: 'post',
						dataType: 'json',
						success: function( data ) {
							if ( 'ok' == data.status ) {
								loader.hideLoader();
								window.location.href = "login.php";
							} else if ( 'fail' == data.status ) {
								$( '#error_message' ).html( data.message );
								loader.hideLoader();
							}
						}
					} );
				} else { // some fields are not filled in, show error message and scroll to top of page
					$( '#error_message' ).html( 'All fields must be filled in.' );
					$( window ).scrollTop( 0 );
				}
			}
</script>			
		<div class="site-content-container">
			<div class="site-content-centered">
				<div class="site-content-section">
					<div class="site-content-section-inner">
						<div class="section-heading">REGISTRARSE</div>
						<form id="signup_form" name="signup_form">
							<div id="error_message" class="error-message">
							</div>
							<div>
								<div class="section-label">Correo Electronico</div>
								<div><input class="form-input" type="text" name="email" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Nombre</div>
								<div><input class="form-input" type="text" name="first_name" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Apellido</div>
								<div><input class="form-input" type="text" name="last_name" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Contraseña</div>
								<div><input class="form-input" type="password" name="password" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Confirmar contraseña</div>
								<div><input class="form-input" type="password" name="confirm_password" /></div>
							</div>
						</form>
						<div class="section-action-container">
							<div class="section-button-container" id="signup_button">
								<div>Registrarse</div>
							</div>
						</div>
						<div class="section-action-container">
							- O -
						</div>
						<div class="section-action-container">
							<a href="<?php echo $facebookDAO->getFacebookLoginUrl(); ?>" class="a-fb">
								<div class="fb-button-container">
									Registrarse con Faceboook
								</div>
							</a>
						</div>
						<div class="section-footer-container">
							¿Ya eres usuario? <a class="a-default" href="<?php echo FRONT_ROOT ?>Login/SignIn">Inicia sesion</a>
						</div>
					</div>
				</div>
			</div>
		</div>