<?php
namespace DAO; 
use DAO\MovieDAO;

    function listGenres ($idMovie) {
        $movieDao= new MovieDAO();
        $genres= $movieDao->GetGenresMovie($idMovie);
        $stringGenres= "";
        foreach($genres as $genre){
            $stringGenres= $stringGenres . $genre->getName(). ", ";
        }
        return substr($stringGenres,0,-2);
    }
?>
<div>
    <div class="container">
        <div class="row py-4 movie-expanded">
            <div class="col-4 text-white">
                <h2 id="movie-title"></h2>
                <p><b>Estreno: </b><span id="movie-release-date"></span></p>
                <p><b>Género: </b><span id="movie-genres"></span></p>
                <p id="movie-overview"></p>
                <form action="<?php echo FRONT_ROOT. "Client/selectDate"?>" method="GET">
                    <button class="btn btn-primary" id="movie-reservation">Reservar</button></form>
            </div>
            <div class="col-8">
            <iframe class="movie-trailer"
            src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row">
            <?php foreach($movies as $movie){?>
                <div class="col-lg-2 col-sm-4 px-1">
                    <div class="movie-container">
                        <img class="movie-image" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath();?>"/>
                        <div class="movie-overlay"> 
                            <span class="movie-name"><?php  echo $movie->getTitle();?></span>
                            <button type="button" onclick="expandMovie('<?php echo $movie->getTitle(); ?>', '<?php echo $movie->getReleaseDate(); ?>', '<?php echo $movie->getOverview(); ?>','<?php echo listGenres($movie->getIdMovie());?>','<?php echo $movie->getTrailerPath(); ?>')" class="btn btn-primary ver-mas">Ver más</button>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<script>
    function expandMovie(title, releaseDate, overview, genres,trailerPath) {
        $("#movie-title").html(title);
        $("#movie-release-date").html(releaseDate);
        $("#movie-overview").html(overview);
        $("#movie-genres").html(genres);
        $(".movie-trailer").attr("src","https://www.youtube.com/embed/"+ trailerPath +"?autoplay=1&mute=1");
        $(".movie-expanded").css('display', 'flex').animate();
    }
</script>

