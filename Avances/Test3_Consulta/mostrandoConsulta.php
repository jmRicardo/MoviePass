<?php 
var_dump($_POST['genre']) ;
$url2 = "https://api.themoviedb.org/3/genre/movie/list?api_key=0e38635e1106aa97618b0e7fee7a5b57";
$json2 = file_get_contents($url2);
$datos2 = json_decode($json2,true);
//var_dump($datos2);

foreach( $datos2['genres'] as $da ){
    if($da['name'] == $_POST['genre']){
    $id_Real  = $da['id'];
    }
}   
var_dump($id_Real);

//exit();



$url = "https://api.themoviedb.org/3/movie/now_playing?api_key=0e38635e1106aa97618b0e7fee7a5b57";
$json = file_get_contents($url);
$datos = json_decode($json,true);
//var_dump($datos['results'][1]['genre_ids']);
//exit();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/css/estilos.css">
    <title></title>
</head>
<body>


<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Libros</h2>

                <table class="table bg-light">
                    <thead class="bg-dark text-white">
                        
                        <th>Titulo</th>
                        
                    </thead>
                    <tbody>
                        <?php foreach( $datos['results']['genre_ids'] as $id ){ ?>
                            <tr>
                                <?php if($id['id']  == $id_Real  ){ ?>
                                    <td><?php var_dump($id); ?></td>    
                            </tr>
                                <?php } ?>
                        <?php } ?>                            
                    </tbody>
                </table>
        </div>
    </section>
</main>


</body>
</html>