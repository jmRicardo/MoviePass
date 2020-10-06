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
