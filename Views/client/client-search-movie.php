
<?php
require_once("client-nav.php"); 
use DAO\MovieDAO;
function listGenres ($IdMovie) {
    $movieDao= new MovieDAO();
    $genres= $movieDao->GetGenresMovie($IdMovie);
    $stringGenres= "";
    foreach($genres as $genre){
        $stringGenres= $stringGenres . $genre->getName(). ", ";
    }
    return substr($stringGenres,0,-2);
}
?>

<!-- Modal -->
<!-- <div class="modal fade" id="searchMovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                <div class="container">
                    <div class="row pt-4 pb-4">
                        <div class="col-lg-4">
                            <img class="image-poster" src="<?php echo MOVIE_API_IMAGE_URL . $movieSearch->getPosterPath(); ?>" />
                        </div>
                        <div class="col-lg-8">
                            <h2 class="text-danger"><?php echo $movieSearch->getTitle() ?></h2>
                            <p class="text-danger"><b>Géneros: </b><span><?php echo listGenres($IdMovie)?></span></p>
                            <p class="text-danger"><b>Descripcion: </b><span><?php echo $movieSearch->getOverview() ?></span></p>
                            <p class="text-danger"><b>Fecha de Lanzamiento: </b><span><?php echo $movieSearch->getReleaseDate() ?></span></p>
                            <p class="text-danger"><b>Duracion:  </b><span><?php echo $movieSearch->getRuntime() ?></span></p>
                            <p class="text-danger"><b>Titulo Original:  </b><span><?php echo $movieSearch-> getOriginalTitle() ?></span></p>
                            

                        </div>
                    </div>
                </div>
            <!-- </div>
        </div>
    </div>
</div> -->