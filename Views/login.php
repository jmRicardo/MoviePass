<?php
	// load up global things
	//include_once 'autoloader.php';
	use DAO\FacebookDAO as FacebookDAO;
	use DAO\UserDAO as UserDAO;

	$facebookDAO = new FacebookDAO();
	
	if ( isset( $_GET['state'] ) && FB_APP_STATE == $_GET['state'] ) { // coming from facebook
		// try and log the user in with $_GET vars from facebook 
		$fbLogin = $facebookDAO->tryAndLoginWithFacebook( $_GET );

		header("Location:".VIEWS_PATH."myaccount.php");
	}
	// only if you are logged out can you view the login page
	$userDAO = new UserDAO();
	
	//$userDAO->loggedInRedirect();
?>

<!-- jquery -->
<script type="text/javascript" src= "<?php echo CSS_PATH?>jquery.js"></script>
<!-- include our loader overlay script -->
<script type="text/javascript" src="js/loader.js"></script>

<div class="site-content-container">
	<div class="site-content-centered">
		<div class="site-content-section">
			<div class="site-content-section-inner">
				<div class="section-heading">Login</div>
				<form id="login_form" name="login_form">
					<div id="error_message" class="error-message">
						<?php if ( isset( $_SESSION['eci_login_required_to_connect_facebook'] ) && $_SESSION['eci_login_required_to_connect_facebook'] ) : // enter password to connect account ?>
							<div style="margin-bottom:10px;">
								An account already exists with that email address. To connect your Facebook account, enter your password.
							</div>
						<?php endif; ?>
						<?php if ( isset( $_SESSION['eci_login_required_to_connect_twitter'] ) && $_SESSION['eci_login_required_to_connect_twitter'] ) : // enter password to connect account ?>
							<div style="margin-bottom:10px;">
								An account already exists with that email address. To connect your Twitter account, enter your password.
							</div>
						<?php endif; ?>
						<?php if ( isset( $_SESSION['eci_login_required_to_connect_twitch'] ) && $_SESSION['eci_login_required_to_connect_twitch'] ) : // enter password to connect account ?>
							<div style="margin-bottom:10px;">
								An account already exists with that email address. To connect your Twitch account, enter your password.
							</div>
						<?php endif; ?>
					</div>
					<div>
						<div class="section-label">Email</div>
						<div>
							<?php if ( isset( $_SESSION['fb_user_info']['email'] ) ? $_SESSION['fb_user_info']['email'] : '' ) : // pre populate with facebook email ?>
								<?php $inputEmail = $_SESSION['fb_user_info']['email']; ?>
							<?php elseif ( isset( $_SESSION['tw_user_info']['email'] ) ? $_SESSION['tw_user_info']['email'] : '' ) : // pre populate with twitter email ?>
								<?php $inputEmail = $_SESSION['tw_user_info']['email']; ?>
							<?php elseif ( isset( $_SESSION['twitch_user_info']['email'] ) && $_SESSION['twitch_user_info']['email'] ) : ?>
								<?php $inputEmail = $_SESSION['twitch_user_info']['email']; ?>
							<?php else : ?>
								<?php $inputEmail = ''; ?>
							<?php endif; ?>
							<input class="form-input" type="text" name="email" value="<?php echo $inputEmail; ?>" />
						</div>
					</div>
					<div class="section-mid-container">
						<div class="section-label">Password</div>
						<div><input class="form-input" type="password" name="password" /></div>
					</div>
				</form>
				<div class="section-action-container">
					<div class="section-button-container" id="login_button">
						<div>Login</div>
					</div>
				</div>
				<div class="section-action-container">
					- OR -
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
							Login with Facebook
						</div>
					</a>
				</div>
				<div class="section-footer-container">
					Not a member? <a class="a-default" href="<?php echo FRONT_ROOT ?>Login/SignUp">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>



<script>
	/**
 * Handle loading overlays
 *
 * @author Justin Stolpe
 */
var loader = {
	/**
	 * Initialize our loading overlays for use
	 *
	 * @params void
	 *
	 * @return void
	 */
	initialize : function () {
		var html = 
			'<div class="loading-overlay"></div>' +
			'<div class="loading-overlay-image-container">' +
				'<img src="assets/loading.gif" class="loading-overlay-img"/>' +
			'</div>';

		// append our html to the DOM body
		$( 'body' ).append( html );
	},

	/**
	 * Show the loading overlay
	 *
	 * @params void
	 *
	 * @return void
	 */
	showLoader : function () {
		jQuery( '.loading-overlay' ).show();
		jQuery( '.loading-overlay-image-container' ).show();
	},

	/**
	 * Hide the loading overlay
	 *
	 * @params void
	 *
	 * @return void
	 */
	hideLoader : function () {
		jQuery( '.loading-overlay' ).hide();
		jQuery( '.loading-overlay-image-container' ).hide();
	}
}

	$( function() { // once the document is ready, do things
		// initialize our loader overlay
		loader.initialize();

		$( '#login_button' ).on( 'click', function() { // onclick for our login button
            processLogin();
		} );

		$( '.form-input' ).keyup( function( e ) {
			if ( e.keyCode == 13 ) { // our enter key
				processLogin();
			}
		} );
	} );

	function processLogin() {

        alert('ENTRO EN PROCESS LOGIN');
		// clear error message and red borders on signup click
		$( '#error_message' ).html( '' );
		$( '#error_message_fb_php' ).html( '' );
		$( '#error_message_twitter_php' ).html( '' );
		$( '#error_message_twitch_php' ).html( '' );
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

			// server side login
			$.ajax( {
				url: '../Process/signinprocess.php',
				data: $( '#login_form' ).serialize(),
				type: 'post',
				dataType: 'json',
				success: function( data ) {
					if ( 'ok' == data.status ) {
						loader.hideLoader();
						window.location.href = "index.php";
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
