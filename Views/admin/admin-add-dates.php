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
                <h2 class="mb-4"> Agregar Funcion </h2>
                    <form action="<?php echo FRONT_ROOT ?>Admin/AddDate" method="GET">
                        
                            <div class="cine-box">
                                <div class="cine-header">
                                    <h2 class="mb-4">Este es el Cine -> <?php echo $cinemaObject->getName(); ?></h2>
                                    <h2 class="mb-4">Esta es la Sala -> <?php echo $thisRoom->getName(); ?></h2>
                                </div>
                                <div class="cine-times">
                                    <input type="hidden" name="idRoom" value="<?php echo $idRoom2; ?>">
                                    <select class="form-control category-select" name="nameMovie" required>
                                        <option disabled selected></option>
                                        <?php foreach ($movies as $movie) { ?>
                                        <option value="<?php echo $movie->getIdMovie() ?>">
                                            <?php echo $movie->getTitle(); ?>
                                        </option>
                                        <?php } ?>
                                        </select><br>
                                        
                                        <input type="date" min="<?php echo $cDayMin ?>" max="<?php echo $mDayMax ?>" name="date" required>

                                        <input type="time" name="time" required><br>

                                        <button type="submit" class="btn btn-primary">Agregar Pelicula</button>
                                    </div>
                                </div>
                            
                        </form>
            
            </div>
                
            <div class="col-lg-6" >
                <h2 class="mb-4"> Agregar Funcion </h2>
                        
                    
                        <div class="cine-box">
                            <div class="cine-header">
                        
                                <table class="table bg-light-alpha">      


                                    <?php foreach ($listDate as $date) { ?>
                                        <tr>
                                            <td><?php echo "Fecha: ".$date->getDate() ?></td>                        
                                            <?php $movieOnly = $this->movieDAO->GetMovieByID($date->getIdMovie()); ?>
                                            <td><?php echo "Pelicula: ".$movieOnly->getTitle(); ?></td>                    
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>        
                    
            
            </div>                      
        </div>
    </div>


    
</main>