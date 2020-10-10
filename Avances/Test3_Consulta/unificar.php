<?php
    $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json = file_get_contents($url);
    $datos = json_decode($json,true);
    //var_dump($datos);
    //exit();

    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    $url2 = "https://api.themoviedb.org/3/genre/movie/list?api_key=0e38635e1106aa97618b0e7fee7a5b57";
    $json2 = file_get_contents($url2);
    $datos2 = json_decode($json2,true);
    //var_dump($datos2['genres'][0]['name']);
    //var_dump(sizeof($datos2['genres']));
    //exit();
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    $id_real = 0;
    if(isset($_POST['genre'])){
        // var_dump($_POST['id']);
        $id_real = $_POST['genre'];
        //exit();
    }
    $dire = "https://image.tmdb.org/t/p/w500/";
    // if(isset($_POST['genre'])){
    //     foreach( $datos2['genres'] as $da ){
    //         if($da['name'] == $_POST['genre']){
    //         $id_Real  = $da['id'];
    //         }
    //     }
    //     var_dump($id_Real);
    // }   
    
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/css/estilos.css">
    <link rel="stylesheet" href="Style/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Consulta</title>
</head>
<body>
    
    <main class="py-5">
        <section id="listado" class="mb-5">
            
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="container">
                    <h3 class="mb-3">Selecciona Genero</h3>
                    <div class="bg-light p-4">
                        <div class="row">
                            <div class="col-lg-4" >
                                <label for="">Genero</label>
                                    <div class="form-group">
                                        <select name="genre" class="custom-select"  required>
                                            <?php for($i = 0; $i < sizeof($datos2['genres']) ; $i++){  ?>
                                                <option  value="<?php echo $datos2['genres'][$i]['id'] ?>"> <?php echo $datos2['genres'][$i]['name']; ?> </option>
                                            <?php } ?>    
                                        </select>
                                    </div>                              
                            </div>                         
                        <div class="col-lg-4">
                                <span>&nbsp;</span>
                                <button type="submit"  class="btn btn-primary ml-auto d-block">Seleccionar</button>
                                    
                        </div>
                    </div>                    
                </div>
            </form>

        </section>
    </main>


    <main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado Filtrado por Genero</h2>

                <table class="table bg-light">
                    <thead class="bg-dark text-white">
                        
                        <th>Titulo</th>
                        
                    </thead>
                    
                        <div>
                            <?php foreach( $datos['results'] as $id ){ ?>
                                    <?php if($id_real == $id['genre_ids'][0]){ ?>
                                        
                                        <td> <img src="<?php echo "$dire".$id['poster_path']; ?>" class="peli"/>    </td> 
                                        
                                    <?php } ?>
                            <?php } ?>                    
                        </div>
                    
                </table>
        </div>
    </section>
</main>

















</body>
</html>