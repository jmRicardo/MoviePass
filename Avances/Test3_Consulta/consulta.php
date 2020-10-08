<?php
    $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json = file_get_contents($url);
    $datos = json_decode($json,true);
    //var_dump($datos);
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    $url2 = "https://api.themoviedb.org/3/genre/movie/list?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json2 = file_get_contents($url2);
    $datos2 = json_decode($json2,true);
    // var_dump($datos2['genres'][0]['name']);
    // var_dump(sizeof($datos2['genres']));
    // exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/css/estilos.css">

    <title>Consulta</title>
</head>
<body>
    
    <main class="py-5">
        <section id="listado" class="mb-5">
            
            <form action="mostrandoConsulta" method="POST">
                <div class="container">
                    <h3 class="mb-3">Selecciona Genero</h3>
                    <div class="bg-light p-4">
                        <div class="row">
                            <div class="col-lg-4" >
                                <label for="">Genero</label>
                                    <div class="form-group">
                                        <select name="genre" class="custom-select" required>
                                            <?php for($i = 0; $i < sizeof($datos2['genres']) ; $i++){  ?>
                                                <option> <?php echo $datos2['genres'][$i]['id']; ?> </option>
                                            <?php } ?>    
                                        </select>
                                    </div>                              
                            </div>                         
                        <div class="col-lg-4">
                                <span>&nbsp;</span>
                                <button type="submit" class="btn btn-primary ml-auto d-block">Seleccionar</button>
                                    
                        </div>
                    </div>                    
                </div>
            </form>

        </section>
    </main>
    
</body>
</html>


