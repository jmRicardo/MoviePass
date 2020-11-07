<?php

    
if(isset($result)){
                                
    $total = 0;

    foreach($result as $resu){
        $total += $resu['TOTAL'];
    }

    if ($result)
    {
    if ($idMovie == 'TODES' && $cinema == 'TODES')
    {
        $final = "De " . $start . " hasta " . $end . "<br>". "El total recaudado en ese período de tiempo es: $" .$total;       
    }
    elseif ($cinema == 'TODES')
    {
        $final = "De " . $start . " hasta " . $end . "<br>" . "La pelicula " .$result[0]['PELICULA']. " recaudo un total de: $" . $total;                   
    }
    elseif ($idMovie == 'TODES')
    {
        $final = "De " . $start . " hasta " . $end . "<br>" . "El cine " .$result[0]['CINE'] . " recaudo un total de $". $total;
    }
    else
    {
        $final = "De " . $start . " hasta " . $end . "<br>" . "La pelicula " .$result[0]['PELICULA']. " recaudo un total de: $" . $total . " en el cine ". $result[0]['CINE'];                    
    }
    }else {
        $final = "Pelicula sin ser vista";
    }
    }        

    header("Location:".FRONT_ROOT."Admin/FilterByDate/".$final);

?>