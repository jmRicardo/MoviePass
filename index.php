<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	// include global functions
	include_once __DIR__  . '/Facebook/functions.php';

	// include facebook api functions
	include_once __DIR__  . '/Facebook/facebook_api.php';

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;


		
	Autoload::start();

	session_start();

	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");
?>