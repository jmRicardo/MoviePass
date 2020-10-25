<?php
    require_once('admin-nav.php');

    foreach( $listCinema as $nameCinema ){
        if($nameCinema->getId() == $_POST['id']){
            $realCinema = $nameCinema->getName();
        }
    }
    foreach( $listRooms as $nameRoom ){
        if($nameRoom->getIdRoom() == $_POST['idRoom']){
            $realRoom = $nameRoom->getName();
        }
    }
    

?>
<main class="py-5">

<!-- <h2 class="mb-4">Este es el Cine -> <?php echo $realCinema; ?></h2>
<h2 class="mb-4">Esta es la Sala -> <?php echo $realRoom; ?></h2> -->

    <!-- <div class="modal fade" id="addDates" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> -->
                
            



            <section id="listado" class="mb-5">
                <div class="container">
                    <h2 class="mb-4"> Agregar Funcion </h2>

                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                        <select class="form-control category-select" name="category" placeholder="genre">
                            <option disabled selected></option>
                                <?php foreach($movies as $movie){?>
                                <option>
                                    <?php echo $movie->getTitle();?>
                                </option>
                            <?php } ?>
                        </select>

                        <input type="date" min="2020-10-24" max="2020-11-24" name="date">
                        <input type="time" name="time">
                        <input type="week" name="week">
                        <input type="datetime-local" name="completito" ><br/>
                        <button type="submit" name="id" class="btn btn-primary" >Agregar Pelicula</button>
                    </form>                
                </div>
            </section>







            <!-- </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div> -->
</main>
<?PHP 
var_dump($_GET);
exit();
?>

