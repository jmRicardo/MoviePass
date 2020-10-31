<?php
require_once("client-nav.php");
require_once(UTILS_PATH . "MessageBox.php");

?>

<div class="container-fluid no-padding">
    <div class="banner-container">
        <div class="banner-video-container">
            <video class="video-banner" autoplay muted>
                <source src="<?php echo FRONT_ROOT . VIEWS_PATH ?>img/banner1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>


<?php
require_once(CLIENT_PATH . "client-list-movies.php");
//ventana emergentes de logeo
require_once(LOGIN_PATH . "login-signin.php");
require_once(LOGIN_PATH . "login-signup.php");
require_once(CLIENT_PATH . "client-mail.php");
require_once(CLIENT_PATH . "client-search-movie.php");
?>