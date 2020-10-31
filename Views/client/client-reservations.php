<?php
     require_once(VIEWS_PATH . "client-nav.php");
?>

<div class="container"> 
<div class="row">

     <div class="col-lg-6">  

          <h3>Peliculas</h3>
          
          <?php foreach($movies as $ticket) { ?>               

               <div class="cine-box">
                                 
                    <div class="cine-header">
          
          <?php echo $ticket->getTitle(); ?>   

               </div>

                    </div>
                       
          <?php } ?> 
     
     </div>    


     <div class="col-lg-6">

          <h3>Fechas</h3>

          <?php foreach($movies as $ticket) { ?>    

               <div class="cine-box">
                           
                    <div class="cine-header">

          <?php echo $ticket->getTitle(); ?> 

               </div>

                    </div>

          <?php } ?>
     
     </div>

</div>
</div>