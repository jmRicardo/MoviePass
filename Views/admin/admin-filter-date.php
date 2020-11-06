<?php
    require_once('admin-nav.php');

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    
    setlocale(LC_TIME,"spanish");

    $day = new DateTime();

    $today = $day->format('Y-m-d');
?>

<main>
    

</main>



<main class="py-5">
    <div class="container">
        <div class="row">
                
            
            <div class="col-lg-6" >
                <h2 class="mb-4"> Estadisticas </h2>
                    
                <form action="<?php echo FRONT_ROOT ?>Admin/ResultFilterByDate" method="GET">

                    <p>Pelicula</p>
                    <select class="form-control category-select" name="idMovie" required>
                        <option value="TODES">TODES</option>
                        <?php foreach ($movies as $movie) { ?>
                            <option value="<?php echo $movie->getIdMovie() ?>">
                                <?php echo $movie->getTitle(); ?>
                            </option>
                        <?php } ?>
                    </select><br>

                    <p>Cine</p>
                    <select class="form-control category-select" name="cinema" required>
                        <option value="TODES">TODES</option>
                        <?php foreach ($cinemas as $cinema) { ?>
                            <option value="<?php echo $cinema->getName() ?>">
                                <?php echo $cinema->getName(); ?>
                            </option>
                        <?php } ?>
                    </select><br>

                    <p>Principio</p>
                    <input type="date" name="start" value="<?php echo $today;?>"required>
                    <p>Fin</p>
                    <input type="date" name="end" value="<?php echo $today;?>" required>

                    <button type="submit" class="btn btn-primary">Buscar</button>

                </form>




            
            </div>
                
            <div class="col-lg-6" >
            <h2 class="mb-4">Estadísticas requeridas:</h2>
                        
                <section id="listado" class="mb-5">
                    <div class="container">
                        

                        <?php
                            if(isset($result)){
                                $total = 0;
                                foreach($result as $resu){
                                    $total += $resu['TOTAL'];
                                }

                            /*  if ($cinema == 'TODES'){
                                    echo "De " . $start . " hasta " . $end . "<br>";
                                    echo "La pelicula " .$result[0]['PELICULA']. " recaudo un total de: $" . $total;
                                }else {
                                    echo "De " . $start . " hasta " . $end . "<br>";
                                    echo "La pelicula " .$result[0]['PELICULA']. " recaudo un total de: $" . $total . " en el cine ". $result[0]['CINE'];
                                } */

                                //var_dump($cinema);

                                if ($result){
                                if ($idMovie == 'TODES' && $cinema == 'TODES'){
                                    echo "De " . $start . " hasta " . $end . "<br>";
                                    echo "El total recaudado en ese período de tiempo es: $" .$total;
                                }elseif ($cinema == 'TODES'){
                                    echo "De " . $start . " hasta " . $end . "<br>";
                                    echo "La pelicula " .$result[0]['PELICULA']. " recaudo un total de: $" . $total;
                                }elseif ($idMovie == 'TODES'){
                                    echo "De " . $start . " hasta " . $end . "<br>";
                                    echo "El cine " .$result[0]['CINE'] . " recaudo un total de $". $total;
                                }
                                else{
                                    echo "De " . $start . " hasta " . $end . "<br>";
                                    echo "La pelicula " .$result[0]['PELICULA']. " recaudo un total de: $" . $total . " en el cine ". $result[0]['CINE'];
                                }
                                }else {
                                    echo "Pelicula sin ser vista";
                                }
                            }    
                        ?>
                        
                    </div>
                </section>
                   
                


                    
            
            </div> 
            
            
        </div>
    </div>
</main>









