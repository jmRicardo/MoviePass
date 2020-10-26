<?php
    use DAO\MovieDAO;

use function Controllers\getCinemasByDay;

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
                    for ($i=0; $i < 7; $i++) {
                        $currentDay = $day->format("j");
                        ?>
                        <li class="nav-item day-item" role="presentation">
                            <a class="nav-link day-link <?php if ($i === 0) echo "active";?>" id="date-<?php echo $currentDay; ?>-tab" data-toggle="tab" href="#date-<?php echo $currentDay; ?>" role="tab" aria-controls="date-<?php echo $currentDay; ?>" aria-selected="true"><?php echo utf8_encode(strftime("%A %#d", $day->getTimestamp())); ?></a>
                        </li>
                        <?php
                        $day->modify("+1 day");
                    }
                ?>
                <li class=" dropdown nav-item day-item">
                    <a class="nav-link day-link" href="#">Ver más</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php
                    $day = new DateTime();
                    for ($i=0; $i < 7; $i++) {
                        $currentDay = $day->format("j");
                        $cinemas = getCinemasByDay($day, $dates);
                ?>
                <div class="tab-pane fade <?php if ($i === 0) echo "show active";?>" id="date-<?php echo $currentDay; ?>" role="tab-panel" aria-labelledby="date-<?php echo $currentDay; ?>-tab">
                    <div class="row">
                        <?php
                            foreach ($cinemas as $room=>$currentDates) {
                        ?>
                        <div class="col-lg-6">
                            <div class="cine-box">
                                <div class="cine-header">
                                    <h3 class="cine-name">Cines del paseo <?php echo $room; ?></h3>
                                    <span>Santiago del estero 2020</span>
                                </div>
                                <div class="cine-times">
                                    <?php
                                        foreach ($currentDates as $date) {
                                    ?>
                                    <button type="button" class="btn btn-warning cine-time">
                                        <?php
                                            $hour = new DateTime($date->getDate());
                                            echo $hour->format("g:i a");
                                        ?>
                                    </button>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <?php
                        $day->modify("+1 day");
                    }
                ?>
            </div>
        </div>
    </div>
</div>