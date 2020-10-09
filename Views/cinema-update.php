<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar Cine</h2>
               <form action="<?php echo FRONT_ROOT ?>Cinema/SaveUpdate" method="get" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="<?php echo $cinema->getName() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Capacidad Total</label>
                                   <input type="text" name="total_capacity" value="<?php echo $cinema->getTotal_capacity() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Direccion</label>
                                   <input type="text" name="address" value="<?php echo $cinema->getAddress() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Valor de Ticket</label>
                                   <input type="text" name="ticket_value" value="<?php echo $cinema->getTicket_value() ?>" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="id" class="admin_buttons" value="<?php echo $cinema->getId() ?>">Guardar</button>
               </form>
          </div>
     </section>
</main>