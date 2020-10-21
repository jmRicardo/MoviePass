<?php
    require_once('admin-nav.php');
    require_once(UTILS_PATH . "MessageBox.php");
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Agregar Sala</h2>
                <form action="<?php echo FRONT_ROOT ?>Admin/AddRoom" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Precio de la entrada</label>
                                <input type="text" name="price" value="" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label>Capacidad</label><br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" value="100" class="btn btn-secondary">100</button>
                                    <button type="button" value="150" class="btn btn-secondary">150</button>
                                    <button type="button" value="250" class="btn btn-secondary">250</button>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-4">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="capacity" id="option1" value="100" autocomplete="off" checked>100
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="capacity" id="option2" value="150" autocomplete="off"> 150
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="capacity" id="option3" value="250" autocomplete="off"> 250
                                    </label>
                                </div>
                        </div>
                                                                        
                    </div>
                    <button type="submit" name="id" value="<?php echo $cinema->getId(); ?>" class="btn btn-primary ">Agregar</button>
                </form>
        </div>
    </section>
</main>