<?php

/* if($start > $end) {
        
    $_SESSION['message'] = "Fecha inválida";
    // require_once(ADMIN_PATH."admin-filter-date.php");
    $final = "0";
    header("Location:".FRONT_ROOT."admin-filter-date.php");
    $result = null;
}
 */

if(isset($dates)){
                                
    $soldSeats = 0;
    $emptySeats = 0;

    foreach($dates as $date){
        $soldSeats += $date['asientos vendidos'];
        $emptySeats += $date['asientos disponibles'];
    }

    if ($dates)
    {
        if ($idMovie == 'Todas las películas' && $idCinema == 'Todos los cines' && $time == '')
        {
            $final = "Todas las películas en todos los cines han ocupado " . $soldSeats . " butacas, y han quedado sin ocupar ". $emptySeats;   

        }elseif ($idMovie == 'Todas las películas' && $idCinema == 'Todos los cines'){

            $final = "Todas las películas en todos los cines han ocupado " . $soldSeats . " butacas, y han quedado sin ocupar ". $emptySeats . " en este horario " . $time; 

        }elseif ($idMovie == 'Todas las películas' && $time == '') {

            $final = "Todas las películas en el cine " . $dates[0]['cine'] . " a lo largo del tiempo han ocupado " . $soldSeats . " butacas y han quedado sin ocupar " . $emptySeats;

        }elseif ($idCinema == 'Todos los cines' && $time == '') {

            $final = $dates[0]['pelicula'] . " ocupo " . $soldSeats . " butacas a lo largo del tiempo, y quedaron sin ocupar " . $emptySeats . " en todos los cines";

        }elseif ($idMovie == 'Todas las películas') {

            $final = "Todas las películas en el cine " . $dates[0]['cine'] . " ocuparon un total de " . $soldSeats . " butacas, y quedaron sin ocupar " . $emptySeats . " en el horario " .$time;

        }elseif ($idCinema == 'Todos los cines'){

            $final = $dates[0]['pelicula'] . " en todos los cines ocupo " . $soldSeats . " butacas, y quedaron sin ocupar " . $emptySeats . " en el horario " .$time;

        }elseif ($time == '') {

            $final = $dates[0]['pelicula'] . " ocupo " . $soldSeats . " butacas, y quedaron sin ocupar " . $emptySeats . " en el cine " . $dates[0]['cine'] . " a lo largo del tiempo";

        }else {

            $final = $dates[0]['pelicula'] . " ocupo " . $soldSeats . " butacas, y quedaron sin ocupar " . $emptySeats . " en el cine " . $dates[0]['cine'] . " en el horario " . $time;

        }
       
    }else {

        $final = "Ingreso de datos invalidos";

    }
    }        

    header("Location:".FRONT_ROOT."Admin/FilterBySeat?final=".urlencode($final));

?>