<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/MoviePass/");
define("VIEWS_PATH", "Views/");
define("ADMIN_PATH",  ROOT.VIEWS_PATH . "admin/");
define("CLIENT_PATH", ROOT.VIEWS_PATH . "client/");
define("LOGIN_PATH",  ROOT.VIEWS_PATH . "login/");
define("CSS_PATH",    FRONT_ROOT.VIEWS_PATH . "css/");
define("JS_PATH",     FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH",    FRONT_ROOT.VIEWS_PATH . "img/");
define("PROCESS_PATH", "Process/");
define("UTILS_PATH", "Utils/");

/* // Datos para el acceso a la base de datos
define("DB_HOST", "localhost");
define("DB_NAME", "MoviePass");
define("DB_USER", "root");
define("DB_PASS", "");
 */

// Datos para el acceso a la base de datos REMOTA
define("DB_HOST", "remotemysql.com");
define("DB_NAME", "ic1fGMePQ6");
define("DB_USER", "ic1fGMePQ6");
define("DB_PASS", "k9Adageba0");

// Credenciales para MercadoPAGO

define('MP_PUBLIC_KEY','XXX');
define('MP_ACCESS_TOKEN','XXX');

// MAIL DE LA APP

define('CONTACT_MAIL','guimainini@gmail.com');


// LLave para la Api de movie data base

define("TMDB_API_KEY","0e38635e1106aa97618b0e7fee7a5b57");

// Credenciales para facebook
define( 'FB_APP_ID', '384084776085842' );
define( 'FB_APP_SECRET', '3c6512529b7c867ce84101b3be8d1bdf' );
define( 'FB_REDIRECT_URI', "http://localhost/MoviePass/Home/Facebook" );

// site global defines
define( 'USER_LEVEL_ADMIN', '1' );

// fb defines
define( 'FB_GRAPH_VERSION', 'v6.0' ); // facebook graph version
define( 'FB_GRAPH_DOMAIN', 'https://graph.facebook.com/' ); // base domain for api
define( 'FB_APP_STATE', 'eciphp' ); // verify state

// movie api
define( 'MOVIE_API_IMAGE_URL', 'https://image.tmdb.org/t/p/w500'); // base url for images
?>




