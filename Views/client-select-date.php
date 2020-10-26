<?php
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
    require_once(VIEWS_PATH . "client-nav.php");
?>
<div class="container"> 
    <div class="row pt-4 pb-4">
        <div class="col-lg-4">
            <img class="image-poster" src="<?php echo MOVIE_API_IMAGE_URL . $movie->getPosterPath();?>"/>
        </div>
        <div class="col-lg-8">
            <h2><?php echo $movie->getTitle()?></h2>
            <p><b>Géneros: </b><span><?php echo listGenres($movie->getIdMovie())?></span></p>
            <ul class="nav nav-tabs day-selector" id="myTab" role="tablist">
                <?php
                    setlocale(LC_TIME,"spanish");
                    $day = new DateTime();
                    define("CHARSET", "iso-8859-1");
                ?>
                <li class="nav-item day-item" role="presentation">
                    <a class="nav-link day-link selected-day active" id="date-26-tab" data-toggle="tab" href="#date-26" role="tab" aria-controls="date-26" aria-selected="true"><?php echo utf8_encode(strftime("%A %#d", $day->getTimestamp())); ?></a>
                </li>
                <?php
                    for ($i=0; $i < 1; $i++) {
                        $day->modify("+1 day");
                        ?>
                        <li class="nav-item day-item" role="presentation">
                            <a class="nav-link day-link" id="date-27-tab" data-toggle="tab" href="#date-27" role="tab" aria-controls="date-27" aria-selected="true"><?php echo utf8_encode(strftime("%A %#d", $day->getTimestamp())); ?></a>
                        </li>
                        <?php
                    }
                ?>
                <li class=" dropdown nav-item day-item">
                    <a class="nav-link day-link" href="#">Ver más</a>
                </li>
            </ul>
            <div class="row tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="date-26" role="tab-panel" aria-labelledby="date-26-tab">
                    <div class="col-lg-6">
                        <div class="cine-box">
                            <div class="cine-header">
                                <h3 class="cine-name">Cines del paseo</h3>
                                <span>Santiago del estero 2020</span>
                            </div>
                            <div class="cine-times">
                                <button type="button" class="btn btn-warning cine-time">05:30 pm</button>
                                <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                                <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                                <button type="button" class="btn btn-warning cine-time">10:30 pm</button>
                                <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                                <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                                <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>