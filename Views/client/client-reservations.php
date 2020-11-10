<?php
     require_once("client-nav.php");
?>

<div class="container"> 
<div class="row">

     <div class="col-lg-6">  

          <h3 class="title-reservation">Peliculas</h3>
          
          <?php foreach($movieList as $movie) { ?>               

               <div class="cine-box">
                    <div class="cine-header">
          
                         <div class="row">
                              <div class="col-lg-8 box">
                                   <?php echo "Titulo: ".$movie->getTitle(); ?></br>
                                   <?php echo "Duracion: ".$movie->getRuntime()."m"; ?></br>   
                                   <?php echo "Descripcion: ".$movie-> getOverview(); ?></br>   
                                   <?php echo "Idioma Original: ".$movie->getOriginalLanguage(); ?> 
                              </div>
                              <div class="col-lg-4">
                                   <img  style="float: right; width: 80%;" style="" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath();?>"/></br>  
                              </div>
                         </div>  
                    </div>
               </div>
          <?php } ?> 
     
     </div>    


     <div class="col-lg-6">

          <h3 class="title-reservation">Fechas</h3>
          <?php
          
               ?>
          <?php foreach($dateList as $date) { ?>    

               <div class="cine-box">    
                    <div class="cine-header">

                         <?php echo "Fecha de la función: ".$date->getDate(); ?></br> 
                         <?php $cine = $this->roomDao->getCinemaByRoom($date->getIdRoom()); ?>
                         <?php echo "Nombre Cine: ".$cine->getName(); ?> </br>   
          
                         <?php $room = $this->roomDao->GetRoom($date->getIdRoom()); ?>
                         <?php echo "Nombre Sala: ".$room->getName(); ?> </br>
                         <?php echo "Valor de la entrada: ".$room->getPrice(); ?> </br>

                         <?php $movie =  $this->movieDao->GetMovieByID($date->getIdMovie()); ?>
                         <?php echo "Pelicula: ".$movie->getTitle(); ?>

                    </div>
               </div>
          <?php } ?> 
     </div>
</div>
</div>