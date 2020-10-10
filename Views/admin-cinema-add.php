<?php
    require_once('admin-nav.php');

    use DAO\MovieDAO as MovieDAO;

    $movieDAO = new MovieDAO;

<<<<<<< HEAD
    $movie = $movieDAO->GetAll();
    var_dump($movie);
    exit();

    
=======
   /*  $movie = $movieDAO->GetMoviesByGenre(12);
    var_dump($movie);
    exit(); */

    $movie = $movieDAO->GetMovieByID(337401);
    var_dump($movie);
    exit();
>>>>>>> master
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
                                   <input type="text" name="name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Capacidad Total</label>
                                   <input type="text" name="total_capacity" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Direccion</label>
                                   <input type="text" name="address" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Valor de Ticket</label>
                                   <input type="text" name="ticket_value" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="admin_buttons">Agregar</button>
               </form>
          </div>
     </section>
</main>