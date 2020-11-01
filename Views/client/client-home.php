<?php
require_once("client-nav.php");
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
?>