<?php
    require_once(VIEWS_PATH . "client-nav.php");
?>

<main>

    <div class="movie-main">

    </div>

    <div class="movie-theaters movie-container">
        <div class="container-title-controller">
                <h3>Peliculas en cartelera</h3>
                <div class="indication"></div> 
        </div>
        <div class="container-main">
            <button role="button" id="left-arrow" class="left-arrow">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button>
            <div class="container-carousel">
                <div class="carousel">
                    <div class="movies">
                        <a href= "img/fotoBanner.jpg"></a>
                    </div>

                </div>

            </div>
            <button role="button" id="rigth-arrow" class="rigth-arrow">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button>
        </div>

    </div>
</main>