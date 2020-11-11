<?php

// var_dump($start);
// var_dump($end);

// $day = new DateTime();
// $cDayMin = $day->format('Y-m-d');

// $mDayMax = $day3month->format('Y-m-d');

if($start > $end) {
        
    $_SESSION['message'] = "Fecha inválida";
    $final = "0";?>
    <script> location.replace("<?php echo FRONT_ROOT.'Admin/FilterByDate';?>"); </script>
    <?php $result = null;
}

    
if(isset($result)){
                                
    $total = 0;

    foreach($result as $resu){
        $total += $resu['TOTAL'];
    }

    if ($result)
    {
        if ($idMovie == 'Todas las películas' && $cinema == 'Todos los cines')
        {
            $final = "De " . $start . " hasta " . $end . "<br>". "El total recaudado en ese período de tiempo es: $" .$total;       
        }
        elseif ($cinema == 'Todos los cines')
        {
            $final = "De " . $start . " hasta " . $end . "<br>" . "La película " .$result[0]['PELICULA']. " recaudó un total de: $" . $total;                   
        }
        elseif ($idMovie == 'Todas las películas')
        {
            $final = "De " . $start . " hasta " . $end . "<br>" . "El cine " .$result[0]['CINE'] . " recaudó un total de $". $total;
        }
        else
        {
        $final = "De " . $start . " hasta " . $end . "<br>" . "La película " .$result[0]['PELICULA']. " recaudó un total de: $" . $total . " en el cine ". $result[0]['CINE'];                    
        }
    }else {
        $final = "Película sin ser vista";
    }
    }

?>

<script> location.replace("<?php echo FRONT_ROOT.'Admin/FilterByDate?final='.urlencode($final);?>"); </script>