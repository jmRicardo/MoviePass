<?php

	use DAO\FacebookDAO as FacebookDAO;

	$facebookDAO = new FacebookDAO();

	if ( !empty( $_SESSION['user_info']['fb_access_token'] ) ) { // get users facebook info is we have an access token
		$fbUserInfo = $facebookDAO->getFacebookUserInfo( $_SESSION['user_info']['fb_access_token'] );
		$fbDebugTokenInfo = $facebookDAO->getDebugAccessTokenInfo( $_SESSION['user_info']['fb_access_token'] );
	}
	require_once("client-nav.php");
?>
		<div class="site-content-container">
			<div class="site-content-centered">
				<div class="site-content-section">
					<div class="section-action-container ">
						<form method="POST" action="<?php echo FRONT_ROOT ?>Client/UpdateProcess" enctype="multipart/form-data">
							<input type="hidden" name="key_value" value="<?php echo $_SESSION['user_info']['key_value']?>">
							<!-- <div class="row site-content-centered "> -->
								<div class=" text-primary display-4">Mi Perfil</div><br>
								<div>
									<img 
									class="rounded-circle" 
									alt="no disponible" 
									style="width:128px; height:128px " 
									src="<?php 
										if (isset($_SESSION['user_info']['avatar'])) 
										{
											echo "data:image/png;charset=utf8;base64," . base64_encode(stripslashes($_SESSION['user_info']['avatar'])) ;
										}
										else 
										{ echo IMG_PATH . "oveja.png";}
										; ?>"
									data-holder-rendered="true">
								</div>	<br>					
							
							<div id="error_message" class="error-message">
							</div>
							<div>
								<input type="hidden" name="email" value="<?php echo $_SESSION['user_info']['email']; ?>">
								<div class="section-label">Email</div>
								<div><input class="form-input" type="text" name="email" value="<?php echo $_SESSION['user_info']['email']; ?>" disabled /></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Nombre</div>
								<div><input class="form-input" type="text" name="first_name" value="<?php echo $_SESSION['user_info']['first_name']; ?>" minlength="3" maxlength="25" required/></div>
							</div>
							<div class="section-mid-container">
								<div class="section-label">Apellido</div>
								<div><input class="form-input" type="text" name="last_name" value="<?php echo $_SESSION['user_info']['last_name']; ?>" minlength="3" maxlength="25" required/></div>
							</div>						

							<!-- <div class="section-mid-container">	
								<div class="section-label">Mi avatar</div>
								<img class="rounded-circle" alt="" style="width:50px; height:50px " src="" data-holder-rendered="true">
							</div> -->
							<!-- <div section-mid-container >
								<div class="section-label">Cambiar Avatar</div>
								<input type="file" class="section-button-container" name="avatar">
							</div> -->	
							<div section-mid-container >
								<div class="section-label">Cargar avatar</div>
									<input type="file" style="border: none" id="avatar" name="avatar">
								
								</div>
								
							<div>
								<div class="section-label">
									<input type="checkbox" id="change_password" style="width:10px"/>
									<label for="change_password">Cambiar Password</label>
								</div>
							</div>
							<div id="change_password_section" style="display:none">
								<div class="section-mid-container">
									<div class="section-label">Contraseña</div>
									<div><input class="form-input" type="password" name="password" minlength="8"/></div>
								</div>
								<div class="section-mid-container">
									<div class="section-label">Confirmar Contraseña</div>
									<div><input class="form-input" type="password" name="confirm_password" minlength="8"/></div>
								</div>
							</div>
							<div class="section-action-container">
								<div id="login_button">
								<div>
									<button class="btn btn-outline-info btn-md" type="submit">Actualizar</button>
								</div>
							</div>
						</div><br>
						</form>
					<!-- 	<div class="section-action-container">
							<div class="section-button-container" id="update_button">
								<div>Actualizar</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>			
		<br />
		<br />
		<br />

<script>

	$( '#change_password' ).on( 'click', function() 
	{ // onclick for our change password check box
		if ( $( '#change_password_section' ).is( ':visible' ) ) { // if visible, hide it
			$( '#change_password_section' ).hide();
		} else { // if hidden, show it
			$( '#change_password_section' ).show();
		}
	} );

</script>
		