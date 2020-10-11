<div class="bg-black">
    <div class="container">
        <div class="row py-4 movie-expanded">
            <div class="col-4 text-white">
                <h2 id="movie-title"></h2>
                <p><b>Estreno: </b><span id="movie-release-date"></span></p>
                <p><b>Género: </b>Acción</p>
                <p id="movie-overview"></p>
            </div>
            <div class="col-8">
            <iframe class="movie-trailer"
            src="https://www.youtube.com/embed/vw2FOYjCz38?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
        <div class="row">
            <?php foreach($movies as $movie){?>
            <div class="col-lg-2 col-sm-4 px-1">
                <div class="movie-container">
                    <img class="movie-image" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath();?>"/>
                    <div class="movie-overlay">
                        <span class="movie-name"><?php  echo $movie->getTitle();?></span>
                        <button type="button" onclick="expandMovie('<?php echo $movie->getTitle(); ?>', '<?php echo $movie->getReleaseDate(); ?>', '<?php echo $movie->getOverview(); ?>')" class="btn btn-primary ver-mas">Ver más</button>
                    </div>
                </div>
            </div>
<?php }?>
        </div>
    </div>
</div>
<script>
    function expandMovie(title, releaseDate, overview) {
        $("#movie-title").html(title);
        $("#movie-release-date").html(releaseDate);
        $("#movie-overview").html(overview);
        $(".movie-expanded").css('display', 'flex').animate();
    }
</script>

