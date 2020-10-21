<?php
    require_once('admin-nav.php');
    require_once(UTILS_PATH . "MessageBox.php");
    use DAO\MovieDAO as MovieDAO;

    $movieDAO = new MovieDAO;
    
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Cine</h2>
               <form action="<?php echo FRONT_ROOT ?>Admin/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="" class="form-control" required >
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Direccion</label>
                                   <input type="text" name="address" value="" class="form-control" required >
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary ">Agregar</button>
               </form>
          </div>
     </section>
</main>