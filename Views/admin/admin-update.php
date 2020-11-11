<?php
    require_once('admin-nav.php');
    require_once(UTILS_PATH . "MessageBox.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar Cine</h2>
               <form action="<?php echo FRONT_ROOT ?>Admin/SaveUpdate" method="get" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="<?php echo $cinema->getName() ?>" class="form-control" minlength="3" maxlength="25" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Dirección</label>
                                   <input type="text" name="address" value="<?php echo $cinema->getAddress() ?>" class="form-control" minlength="3" maxlength="25" required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="id" class="btn btn-primary" value="<?php echo $cinema->getId() ?>">Guardar</button>
               </form>
          </div>
     </section>
</main>