<!-- Modal -->
<div class="modal fade" id="searchMovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container">
                    <div class="row pt-4 pb-4">
                        <div class="col-lg-4">
                            <img class="image-poster" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath(); ?>" />
                        </div>
                        <div class="col-lg-8">
                            <h2 class="text-danger"><?php echo $movie->getTitle() ?></h2>
                            <p class="text-danger"><b>Géneros: </b><span><?php echo listGenres($movie->getIdMovie()) ?></span></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>