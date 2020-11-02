<?php

use DAO\FacebookDAO as FacebookDAO;
use DAO\UserDAO as UserDAO;

$facebookDAO = new FacebookDAO();
$userDAO = new UserDAO();
?>

<!-- Modal -->
<div class="modal fade" id="sectionStart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content ">

			<div class="section-action-container">
				<div class=" text-primary ">INICIO DE SESION</div>
				<form id="login_form" name="login_form" method="POST" action="<?php echo FRONT_ROOT ?>Login/SignInProcess">
					<div id="error_message" class="error-message">
						<?php if (isset($message)) {
							echo $message;
						} ?>
						<?php if (isset($_SESSION['eci_login_required_to_connect_facebook']) && $_SESSION['eci_login_required_to_connect_facebook']) : // enter password to connect account 
						?>
							<div style="margin-bottom:10px;">
								An account already exists with that email address. To connect your Facebook account, enter your password.
							</div>
						<?php endif; ?>
					</div>
					<input id="url-input" name="current-url" type="hidden" />
					<div>
						<div class="section-label">Correo electronico</div>
						<div>
							<?php if (isset($_SESSION['fb_user_info']['email']) ? $_SESSION['fb_user_info']['email'] : '') : // pre populate with facebook email 
							?>
								<?php $inputEmail = $_SESSION['fb_user_info']['email']; ?>
							<?php else : ?>
								<?php $inputEmail = ''; ?>
							<?php endif; ?>
							<input class="form-input" type="text" name="email" required minlength="3" maxlength="25" value="<?php echo $inputEmail; ?>" />
						</div>
					</div>
					<div class="section-mid-container">
						<div class="section-label">Contraseña</div>
						<div><input class="form-input" type="password" name="password" required /></div>
					</div>

					<div class="section-action-container">
						<div id="login_button">
							<div>
								<button class="btn btn-outline-info btn-md" type="submit">Iniciar Sesion</button>
							</div>
						</div>
					</div>
				</form>
				<div class="section-action-container">
					<div id="error_message_fb_php" class="error-message">
						<?php if (!empty($fbLogin['status']) && 'fail' == $fbLogin['status']) : // we have a facebook error to display 
						?>
							<?php echo $fbLogin['message']; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="section-action-container">
					<a href="<?php echo $facebookDAO->getFacebookLoginUrl(); ?>" class="a-fb">
						<div class="btn btn-primary btn-md">
							Iniciar sesión con Facebook
						</div>
					</a>
				</div>
				<div class="section-footer-container">
					¿No eres usuario?
					<a class="a-default" data-toggle="modal" data-target="#checkIn" class="close">Registrate</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	$(document).ready(function() {

		$("#checkIn").on('show.bs.modal', function() {
			$("#sectionStart").modal("hide");
		});

		$("#url-input").val(window.location.href);
	});
</script>