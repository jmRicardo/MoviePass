<?php

use Models\Ticket;

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
            <?php 
                $dateTickets = new DateTime($date->getDate());
            foreach($tickets as $ticket) {?>
            <div class="cine-box">
                <div class="row">
                    <div class="col-lg-8 box">
                        <span class="ticket-items"><b class="ticket-title">Cine:</b> <?php echo $cine->getName();?></span>
                        <span class="ticket-items"><b class="ticket-title">Dirección: </b><?php echo $cine->getAddress();?></span>
                        <span class="ticket-items"><b class="ticket-title">Sala: </b><?php echo $date->getIdRoom();?></span>
                        <span class="ticket-items"><b class="ticket-title">Pelicula: </b><?php echo $movie->getTitle();?></span>
                        <span class="ticket-items"><b class="ticket-title">Fecha: </b><?php echo $dateTickets->format("d M y");?></span>
                        <span class="ticket-items"><b class="ticket-title">Horario: </b><?php echo $dateTickets->format("g:i a");?></span>
                        <span class="ticket-items"><b class="ticket-title">Nro Ticket: </b><?php echo $ticket->getId();?></span>
                    </div>
                    <div class="col-lg-4">
                        <img class="image-qr" src="<?php echo FRONT_ROOT . VIEWS_PATH."img/qrs/qr-".$ticket->getId().".png"; ?>" />
                    </div>
                </div>              
            </div>
            <?php }?>
        </div>
    </div>
</div>