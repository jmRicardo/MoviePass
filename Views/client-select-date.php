<?php
    use DAO\MovieDAO;
    use Models\Date;

    function listGenres ($idMovie) {
        $movieDao= new MovieDAO();
        $genres= $movieDao->GetGenresMovie($idMovie);
        $stringGenres= "";
        foreach($genres as $genre){
            $stringGenres= $stringGenres . $genre->getName(). ", ";
        }
        return substr($stringGenres,0,-2);
    }
    function getDatesByDay($day, $dates) {
        $datesOfDay = array();
        $formattedDay = $day->format("Y-m-d");
        foreach($dates as $date) {
            $dateToCompare = new \DateTime($date->getDate());       
            $formattedCompareDate = $dateToCompare->format("Y-m-d");
            if ($formattedDay === $formattedCompareDate) {
                array_push($datesOfDay, $date);
            }
        }
        return $datesOfDay;
    }
    function getCinemasByDay($day, $dates) {
        $currentDates = getDatesByDay($day, $dates);
        $cinemas = array();
        foreach ($currentDates as $date) {
            if (!isset($cinemas[$date->getIdRoom()])) {
                $cinemas[$date->getIdRoom()] = array();
            }
            array_push($cinemas[$date->getIdRoom()], $date);
        }
        return $cinemas;
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
                    date_default_timezone_set("America/Argentina/Buenos_Aires");
                    setlocale(LC_TIME,"spanish");
                    if (isset($startingDay)) {
                        $day = new DateTime($startingDay);
                    } else {
                        $day = new DateTime();
                    }
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
                <li class="dropdown nav-item day-item calendar-button">
                    <a class="nav-link day-link" href="#">Ver más</a>
                    <?php 
                        $day= new DateTime();
                        $day->setTimezone(new DateTimeZone('-300'));
                        $cDay= $day->format('Y-m-d');
                        $day1month= $day->modify('+1 month');
                        $mDay = $day1month->format('Y-m-d');
                    ?>
                
                    <input id="calendar" class="hidden-calendar" type="date" min="<?php echo $cDay?>" max="<?php echo $mDay?>" name="date">
                    <script>
                        $('#calendar').change(function() {
                        var date = $(this).val();
                        window.location.href =  "<?php echo FRONT_ROOT."Client/SelectDateCalendar/". $movie->getIdmovie()?>/" + date;});
                    </script>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php 
                    if (isset($startingDay)) {
                        $day = new DateTime($startingDay);
                    } else {
                        $day = new DateTime();
                    }
                    for ($i=0; $i < 7; $i++) {
                        $currentDay = $day->format("j");
                        $cinemas = getCinemasByDay($day, $dates);
                       
                        
                ?>
                <div class="tab-pane fade <?php if ($i === 0) echo "show active";?>" id="date-<?php echo $currentDay; ?>" role="tab-panel" aria-labelledby="date-<?php echo $currentDay; ?>-tab">
            
                <div class="row">
                        <?php // currentDates son todas las funciones de ese dia 
                               
                             foreach ($cinemas as $roomId=>$currentDates) {
                              $cine = $roomDao->getCinemaByRoom($roomId);
                        ?>
                        <div class="col-lg-6">
                            <div class="cine-box">
                                <div class="cine-header">
                                    <h3 class="cine-name"><?php echo $cine->getName();?></h3>
                                    <span><?php echo $cine->getAddress();?></span>
                                    <h6>Sala <?php echo $roomId?></h6>
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
                        $day->modify("+1 day"); /* sumo 1 dia listar el contenido*/ 
                    }
                ?>
            </div>
        </div>
    </div>
</div>