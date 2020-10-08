<?php
    /* $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=0e38635e1106aa97618b0e7fee7a5b57"; */
     $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=0e38635e1106aa97618b0e7fee7a5b57"; 
    $json = file_get_contents($url);
    $datos = json_decode($json,true);
    $dire = "https://image.tmdb.org/t/p/w500/";

     var_dump($datos);
    exit; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title>Api</title>
</head>
<body>
    <div class="contenedor">
    
        <div>
            <?php 
                
                foreach($datos['results'] as $r )
                {
                    var_dump($r["genre_ids"]);
                } 
                /* var_dump($datos);
                exit(); */
            for($i = 0; $i < sizeof($datos['results']) ; $i++){  ?>
                <?php /* foreach($datos as $datas => $i){ */ ?>
                <?php $imagen = $datos['results'][$i]['poster_path']; ?>
                <td> <img src="<?php echo "$dire"."$imagen"; ?>" class="peli"/>    </td>       
            <?php } ?>       
        </div>
        
    </div>
</body> 
</html>