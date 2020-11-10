<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

/* 	 // SDK de Mercado Pago
	require 'vendor/autoload.php';

	// Agrega credenciales
	MercadoPago\SDK::setAccessToken('TEST-1781045786318548-111001-4e62d9a38ab8b741821c89e4299c41e1-117229908');

	// Crea un objeto de preferencia
	$preference = new MercadoPago\Preference();  */
	
	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start();

	session_start();

	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");
?>