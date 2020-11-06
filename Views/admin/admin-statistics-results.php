<?php
    require_once('admin-nav.php');
    require_once(UTILS_PATH . "MessageBox.php");

    var_dump($result);
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Estadísticas requeridas:</h2>


               <?php
                  
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

                    var_dump($cinema);

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
               
               ?>




          </div>
     </section>
</main>