<?php

    require_once(VIEWS_PATH . "client-nav.php");
?>
<div class="container"> 
    <div class="row pt-4 pb-4">
        <div class="col-lg-4">
            <img class="image-poster" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath();?>"/>
        </div>
        <div class="col-lg-8">
            <div class="cine-box">
                <div  lass="row">
                    <div class="col-lg-8">
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>