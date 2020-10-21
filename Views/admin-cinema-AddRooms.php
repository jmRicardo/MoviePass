<?php
    require_once('admin-nav.php');
    require_once(UTILS_PATH . "MessageBox.php");
    use DAO\MovieDAO as MovieDAO;

    $movieDAO = new MovieDAO;
    
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Agregar Sala</h2>
                <form action="<?php echo FRONT_ROOT ?>Admin/Add" method="post" class="bg-light-alpha p-5">
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Capacidad</label><br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" value="150" class="btn btn-secondary">150</button>
                                    <button type="button" value="250" class="btn btn-secondary">250</button>
                                    <button type="button" value="251" class="btn btn-secondary">251</button>
                                </div>


                            </div>
                        </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary ">Agregar</button>
                </form>
        </div>
    </section>
</main>