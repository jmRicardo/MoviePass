<?php	
	use DAO\FacebookDAO as FacebookDAO;
	use DAO\UserDAO as UserDAO;

	$facebookDAO = new FacebookDAO();

	//require_once(VIEWS_PATH . "login-nav.php");

	// only if you are logged out can you view the login page
	$userDAO = new UserDAO();	
	//$userDAO->loggedInRedirect();
?>





<!-- Modal -->
<div class="modal fade" id="exampleModalNext" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button tyle="button" class="close right" data-dismiss="modal" aria-hidden="true">&times;</button>
					<div class="site-content-container">
						<div class="site-content-section">
							<div class="site-content-section-inner">
								<form id="signup_form" name="signup_form" action="<?php echo FRONT_ROOT ?>Login/SignUpProcess" method="POST">
									<div id="error_message" class="error-message">
										<?php  if (isset($message)) {echo $message;} ?>
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
									<div class="section-action-container">
									<!-- <div class="section-button-container" id="signup_button" type="submit">
										<div>Registrarse</div>
									</div> -->
										<button type="submit" class="btn btn-outline-info btn-lg">Registrarse!</button>
									</div>
								</form>
								<div class="section-action-container">
									<a href="<?php echo $facebookDAO->getFacebookLoginUrl(); ?>" class="a-fb">
										<div class="btn btn-primary btn-lg">
											Registrarse con Faceboook
										</div>
									</a>
								</div>
							<!-- <div class="section-footer-container">
								¿Ya eres usuario? <a class="a-default" href="<?php echo FRONT_ROOT ?>Login/SignIn">Inicia sesion</a>
							</div> -->
							</div>
						</div>	
					</div>		
						
			</div>	
		</div>
	</div>
</div>


















	<body class="bg-dark" >
		
	</body>