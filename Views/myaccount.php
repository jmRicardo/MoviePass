<?php
	/* // load up global things
	include_once 'autoloader.php';

	if ( !isLoggedIn() ) { // if user is not logged in they cannot see this page
		header( 'location: index.php' );
	} */


	use DAO\FacebookDAO as FacebookDAO;

	$facebookDAO = new FacebookDAO();

	if ( !empty( $_SESSION['user_info']['fb_access_token'] ) ) { // get users facebook info is we have an access token
		$fbUserInfo = $facebookDAO->getFacebookUserInfo( $_SESSION['user_info']['fb_access_token'] );
		$fbDebugTokenInfo = $facebookDAO->getDebugAccessTokenInfo( $_SESSION['user_info']['fb_access_token'] );
	}
?>
		<div class="site-content-container">
			<div class="site-content-centered">
				<div class="site-content-section">
					<div class="site-content-section-inner">
						<div class="section-heading">My Account</div>
						<form id="myaccount_form" name="myaccount_form">
							<div id="error_message" class="error-message">
							</div>
							<div>
								<div class="section-label">Email</div>
								<div><input class="form-input" type="text" name="email" value="<?php echo $_SESSION['user_info']['email']; ?>" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">First Name</div>
								<div><input class="form-input" type="text" name="first_name" value="<?php echo $_SESSION['user_info']['first_name']; ?>" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Last Name</div>
								<div><input class="form-input" type="text" name="last_name" value="<?php echo $_SESSION['user_info']['last_name']; ?>"/></div>
							</div>
							<div>
								<div class="section-label">
									<input type="checkbox" name="change_password" id="change_password" style="width:10px"/>
									<label for="change_password">Change Passowrd</label>
								</div>
							</div>
							<div id="change_password_section" style="display:none">
								<div class="section-mid-container">
									<div class="section-label">Password</div>
									<div><input class="form-input" type="password" name="password" /></div>
								</div>
								<div class="section-mid-container">
									<div class="section-label">Confirm Password</div>
									<div><input class="form-input" type="password" name="confirm_password" /></div>
								</div>
							</div>
						</form>
						<div class="section-action-container">
							<div class="section-button-container" id="update_button">
								<div>Update</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-content-container">
			<div class="site-content-centered">
				<div class="site-content-section">
					<div class="site-content-section-inner">
						<div class="section-heading">Connected Facebook Account</div>
						<?php if ( empty( $fbUserInfo ) || $fbUserInfo['has_errors'] ) : // could not get facebook user info ?>
							<div class="a-fb">
								<div class="fb-button-container">
									<div>Login With Facebook to Connect Facebook Account</div>
								</div>
							</div>
						<?php else : // display facebook user info ?> 
							<div>
								<div class="pro-img-cont">
									<img class="pro-img" src="<?php echo $fbUserInfo['fb_response']['picture']['data']['url']; ?>" />
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									Email
								</div>
								<div>
									<?php echo $fbUserInfo['fb_response']['email']; ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									First Name
								</div>
								<div>
									<?php echo $fbUserInfo['fb_response']['first_name']; ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									Last Name
								</div>
								<div>
									<?php echo $fbUserInfo['fb_response']['last_name']; ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									User Access Token Facebook Application
								</div>
								<div>
									<?php echo $fbDebugTokenInfo['fb_response']['data']['application']; ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									User Access Token Issued
								</div>
								<div>
									<?php echo date( 'm-d-Y h:i:s', $fbDebugTokenInfo['fb_response']['data']['issued_at'] ); ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									User Access Token Expires
								</div>
								<div>
									<?php echo date( 'm-d-Y h:i:s', $fbDebugTokenInfo['fb_response']['data']['expires_at'] ); ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									User Access Token Scope
								</div>
								<div>
									<?php echo implode( ',', $fbDebugTokenInfo['fb_response']['data']['scopes'] ); ?>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									User Info Raw FB Response
								</div>
								<div>
									<div class="a-default show-hide" data-section="fb_user_info">
										show
									</div>
									<div id="fb_user_info" class="show-hide-section">
										<textarea class="show-hide-textarea"><?php print_r( $fbUserInfo['fb_response'] ); ?></textarea>
									</div>
								</div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">
									User Access Token Debug Info Raw FB Response
								</div>
								<div>
									<div class="a-default show-hide" data-section="fb_user_access_token_debug">
										show
									</div>
									<div id="fb_user_access_token_debug" class="show-hide-section">
										<textarea class="show-hide-textarea"><?php print_r( $fbDebugTokenInfo['fb_response'] ); ?></textarea>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
		<br />
		