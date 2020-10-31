<?php

    require_once("client-nav.php");
?>
<div class="container"> 
    <div class="row pt-4 pb-4">
        <div class="col-lg-4">
            <img class="image-poster" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath();?>"/>
        </div>
        <div class="col-lg-8">
            <h4>Confirmación de compra</h4>
            <span>¡Ya tenés tus entradas! ¡Que disfrutes de la función!</span>
            <div class="cine-box">
                <div class="row">
                    <div class="col-lg-8">
                        <span class="ticket-items"><?php echo $cine->getName();?></span>
                        <span class="ticket-items"><?php echo $cine->getAddress();?></span>
                        <span class="ticket-items">Sala <?php echo $date->getIdRoom();?></span>
                    </div>
                    <div class="col-lg-4">
                    
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>