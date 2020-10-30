<?php
    require_once('admin-nav.php');
    require_once(UTILS_PATH . "MessageBox.php");   
    
    $day= new DateTime();
    $cDayMin= $day->format('Y-m-d');
    $day3month= $day->modify('+3 month');
    $mDayMax = $day3month->format('Y-m-d');

?>
<main class="py-5">



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

                    <form action="<?php echo FRONT_ROOT ?>Admin/AddDate" method="GET">
                    
                        

                    <div class="col-lg-6">
                            <div class="cine-box">
                                <div class="cine-header">
                                    <h2 class="mb-4">Este es el Cine -> <?php echo $cinemaObject->getName(); ?></h2>
                                    <h2 class="mb-4">Esta es la Sala -> <?php echo $thisRoom->getName(); ?></h2>
                                </div>
                                <div class="cine-times">
                                            <input type="hidden" name="idRoom" value="<?php echo $idRoom2; ?>">
                                            
                                            <select class="form-control category-select" name="nameMovie"  required>
                                                <option disabled selected  ></option>
                                                    <?php foreach($movies as $movie){?>
                                                    <option value="<?php echo $movie->getIdMovie()?>">
                                                        <?php echo $movie->getTitle();?>
                                                    </option>
                                                <?php } ?>
                                            </select><br>

                                            <input type="date" min="<?php echo $cDayMin?>" max="<?php echo $mDayMax?>" name="date" required>

                                            <input type="time" name="time" required><br>
                                        
                                            <button type="submit" class="btn btn-primary" >Agregar Pelicula</button>
                                </div>
                            </div>
                    </div>                
                    









                        
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


?>

