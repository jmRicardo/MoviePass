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
</script>

<?php
	
	use DAO\FacebookDAO as FacebookDAO;
	use DAO\UserDAO as UserDAO;

	$facebookDAO = new FacebookDAO();

	// only if you are logged out can you view the login page
	$userDAO = new UserDAO();	
	//$userDAO->loggedInRedirect();

	//echo $userDAO->getRowWithValue('users','id','2');
?>

<form action="Process/login.php" method="POST">
        <h1>Ingreso al sistema</h1>
        <p>Email <input type="Email" placeholder="Ingrese su Email" name="email"> </p>
        <p>Contraseña <input type="password" placeholder="Ingrese su contraseña" name="pass"> </p>
        <button type="submit" class="btn btn-primary" >Ingresar</button><br>
        <!-- <button  type="button" onclick="this.src='./Process/addRegister.php'" class="btn btn-primary mt-2">Registrar</button><br> -->
        
    </form>
    <form>
        <button  type="submit" class="btn btn-primary mt-2">Registrar</button><br>
        <button  type="button" class="btn btn-primary mt-2">Registrar con Facebook</button><br>        
	</form>   
	<div class="section-action-container">
					<a href="<?php echo $facebookDAO->getFacebookLoginUrl(); ?>" class="a-fb">
						<div class="fb-button-container">
							Login with Facebook
						</div>
					</a>
				</div>
    <form action="./Process/listUser.php">
        <button  type="submit" class="btn btn-primary mt-2">Listar Usuarios</button>
	</form>
