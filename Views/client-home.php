<?php
    require_once(VIEWS_PATH . "client-nav.php");
?>

<?php if (isset($_SESSION['message'])){ 
        $qwerty = $_SESSION['message']; ?>
        
        
        <!-- echo "<script> alert(' $qwerty ');</script>"; -->


        <div class="alert alert-dismissible fade show" role="alert">
        <strong><?php echo $qwerty; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-body">
                        <p><?php echo $qwerty; ?></p>
                    </div>
                
                </div>
            </div>
        </div>



<?php        $_SESSION['message'] = null;
} ?>    


                
            








 <div class="container-fluid no-padding">
        <div class="banner-container">
            <div class="banner-video-container">
                <video class="video-banner" autoplay muted>
                    <source src="<?php echo FRONT_ROOT.VIEWS_PATH ?>img/banner1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>


<?php

    require_once(VIEWS_PATH . "list-movies.php");

    //ventana emergentes de logeo
    require_once(VIEWS_PATH . "login-signin.php");
    require_once(VIEWS_PATH . "login-signup.php");
?>

