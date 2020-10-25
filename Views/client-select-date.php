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
            <ul class="nav nav-tabs day-selector">
                <li class="nav-item day-item">
                    <a class="nav-link day-link selected-day active " href="#">Lunes</a>
                </li>
                <li class="nav-item day-item">
                    <a class="nav-link day-link" href="#">Martes</a>
                </li>
                <li class="nav-item day-item">
                    <a class="nav-link day-link" href="#">Miercoles</a>
                </li>
                <li class="nav-item day-item">
                    <a class="nav-link day-link" href="#">Jueves</a>
                </li>
                <li class="nav-item day-item">
                    <a class="nav-link day-link" href="#">Viernes</a>
                </li>
                <li class="nav-item day-item">
                    <a class="nav-link day-link" href="#">Sabado</a>
                </li>
                <li class="nav-item day-item">
                    <a class="nav-link day-link" href="#">Domingo</a>
                </li>
                <li class=" dropdown nav-item day-item">
                    <a class="nav-link day-link" href="#">Ver más</a>
                </li>
            </ul>
            <div class="row">  
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
                <div class="col-lg-6">
                    <div class="cine-box">
                        <div class="cine-header">
                            <h3 class="cine-name">Pompas</h3>
                            <span>Rivadavia 20527</span>
                        </div>
                        <div class="cine-times">
                            <button type="button" class="btn btn-warning cine-time">05:30 pm</button>
                            <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                            <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>