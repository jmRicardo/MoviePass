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

<h2 class="mb-4">Este es el Cine -> <?php echo $realCinema; ?></h2>
<h2 class="mb-4">Esta es la Sala -> <?php echo $realRoom; ?></h2>

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

                    <select class="form-control category-select" name="category" placeholder="genre">
                        <option disabled selected></option>
                            <?php foreach($movies as $movie){?>
                            <option>
                                <?php echo $movie->getTitle();?>
                            </option>
                        <?php } ?>
                    </select>

                    
                    <div class="input-group date">
                        <input type="text" class="form-control" value="12-02-2012">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>





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