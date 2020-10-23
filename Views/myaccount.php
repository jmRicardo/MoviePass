<?php
	/* if ( !isLoggedIn() ) { // if user is not logged in they cannot see this page
		header( 'location: index.php' );
	} */ 
	use DAO\FacebookDAO as FacebookDAO;

	$facebookDAO = new FacebookDAO();

	if ( !empty( $_SESSION['user_info']['fb_access_token'] ) ) { // get users facebook info is we have an access token
		$fbUserInfo = $facebookDAO->getFacebookUserInfo( $_SESSION['user_info']['fb_access_token'] );
		$fbDebugTokenInfo = $facebookDAO->getDebugAccessTokenInfo( $_SESSION['user_info']['fb_access_token'] );
	}
	require_once(VIEWS_PATH . "client-nav.php");
?>
		<div class="site-content-container">
			<div class="site-content-centered">
				<div class="site-content-section">
					<div class="section-action-container">
						<div class="section-heading">Mi Perfil</div>
						<form id="myaccount_form" name="myaccount_form">
							<div id="error_message" class="error-message">
							</div>
							<div>
								<div class="section-label">Email</div>
								<div><input class="form-input" type="text" name="email" value="<?php echo $_SESSION['user_info']['email']; ?>" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Nombre</div>
								<div><input class="form-input" type="text" name="first_name" value="<?php echo $_SESSION['user_info']['first_name']; ?>" /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Apellido</div>
								<div><input class="form-input" type="text" name="last_name" value="<?php echo $_SESSION['user_info']['last_name']; ?>"/></div>
							</div>

							



							<div class="section-mid-container">	
								<div class="section-label">Mi avatar</div>
								<img class="rounded-circle" alt="" style="width:50px; height:50px " src="data:image/jpeg;base64,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" data-holder-rendered="true">
							</div>
							<div section-mid-container >
								<div class="section-label">Cambiar Avatar</div>
								<input type="file" class="section-button-container" name="avatar">
							</div>
							


							<div>
								<div class="section-label">
									<input type="checkbox" name="change_password" id="change_password" style="width:10px"/>
									<label for="change_password">Cambiar Password</label>
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
						<div class="section-heading">Cuenta de Facebook conectada</div>
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
		