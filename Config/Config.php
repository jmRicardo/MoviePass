<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/MoviePass/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("PROCESS_PATH", "Process/");

// Datos para el acceso a la base de datos
define("DB_HOST", "localhost");
define("DB_NAME", "MoviePass");
define("DB_USER", "root");
define("DB_PASS", "");

// Credenciales para facebook
define( 'FB_APP_ID', '384084776085842' );
define( 'FB_APP_SECRET', '3c6512529b7c867ce84101b3be8d1bdf' );
define( 'FB_REDIRECT_URI', "http://localhost/MoviePass/index.php" );

// site global defines
define( 'USER_LEVEL_ADMIN', '1' );

// fb defines
define( 'FB_GRAPH_VERSION', 'v6.0' ); // facebook graph version
define( 'FB_GRAPH_DOMAIN', 'https://graph.facebook.com/' ); // base domain for api
define( 'FB_APP_STATE', 'eciphp' ); // verify state
?>




