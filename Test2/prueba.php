<?php
    $url = "https://api.themoviedb.org/3/movie/550?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json = file_get_contents($url);
    $datos = json_decode($json,true);
    //var_dump($datos);
    $imagen = $datos['poster_path'];
    $dire = "https://image.tmdb.org/t/p/w500/";
    
    $url2 = "https://api.themoviedb.org/3/movie/551?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json2 = file_get_contents($url2);
    $datos2 = json_decode($json2,true);
    //var_dump($datos);
    $imagen2 = $datos2['poster_path'];
    $dire = "https://image.tmdb.org/t/p/w500/";

    $url3 = "https://api.themoviedb.org/3/movie/553?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json3 = file_get_contents($url3);
    $datos3 = json_decode($json3,true);
    //var_dump($datos);
    $imagen3 = $datos3['poster_path'];
    $dire = "https://image.tmdb.org/t/p/w500/";

    $url4 = "https://api.themoviedb.org/3/movie/554?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json4 = file_get_contents($url4);
    $datos4 = json_decode($json4,true);
    //var_dump($datos);
    $imagen4 = $datos4['poster_path'];
    $dire = "https://image.tmdb.org/t/p/w500/";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Api</title>
</head>
<body>
    <div style=" display: flex; justify-content: space-around; class="mt-3"   "  >
        
        <div>
            <img 
                src="<?php echo "$dire"."$imagen"; ?>" 
                height = "300"   
            />
            <label>Club de la Pelea</label>
        </div>
        <div>
            <img 
                src="<?php echo "$dire"."$imagen2"; ?>" 
                height = "300"
            />
        </div>
        <div>
            <img 
                src="<?php echo "$dire"."$imagen3"; ?>" 
                height = "300"
            />
        </div>
        <div>
            <img 
                src="<?php echo "$dire"."$imagen4"; ?>" 
                height = "300"
            />
        </div>



    </div>
</body> 
</html>