<?php
require_once('admin-nav.php');

$day = new DateTime();
$cDayMin = $day->format('Y-m-d');
$day3month = $day->modify('+3 month');
$mDayMax = $day3month->format('Y-m-d');

?>

<main class="py-5">
    <div class="container">
        <div class="row">
                
            
            <div class="col-lg-6" >
                <h2 class="mb-4"> Entradas Vendidas </h2>
                    <form action="<?php echo FRONT_ROOT ?>Admin/FilterSeatsProcess" method="GET">
                        
                            <div class="cine-box">
                                <div class="cine-times">
                                    <p>Película</p>
                                    <select class="form-control category-select" name="idMovie" required>
                                        <option value="Todas las películas">Todas las películas</option>
                                        <?php foreach ($movies as $movie) { ?>
                                        <option value="<?php echo $movie->getIdMovie() ?>">
                                            <?php echo $movie->getTitle(); ?>
                                        </option>
                                        <?php } ?>
                                    </select><br>
                                    <p>Cine</p>
                                    <select class="form-control category-select" name="idCinema" required>
                                        <option value="Todos los cines">Todos los cines</option>
                                        <?php foreach ($cinemas as $cinema) { ?>
                                        <option value="<?php echo $cinema->getId() ?>">
                                            <?php echo $cinema->getName(); ?>
                                        </option>
                                        <?php } ?>
                                    </select><br>                            

                                    <p>Turno</p>
                                    <input type="time" name="time" ><br><br>

                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                    </div>
                                </div>                            
                        </form>   
                        
            </div>   
            <div class="col-lg-6">
                <h2 class="mb-4">Estadísticas requeridas:</h2>
                <section id="listado" class="mb-5">
                    <div class="container">
                        <?php
                        if (isset($final)) {
                            echo $final;
                        }
                        ?>
                    </div>
                </section>
            </div>                               
        </div>
    </div>


    
</main>