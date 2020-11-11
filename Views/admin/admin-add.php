<?php
require_once('admin-nav.php');

use DAO\MovieDAO as MovieDAO;

$movieDAO = new MovieDAO;

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Cine</h2>
               <form action="<?php echo FRONT_ROOT ?>Admin/Add" method="GET" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="" class="form-control" minlength="3" maxlength="25" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Dirección</label>
                                   <input type="text" name="address" value="" class="form-control" minlength="3" maxlength="25" required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary ">Agregar</button>
               </form>
          </div>
     </section>


     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Cines</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Dirección</th>
                    </thead>
                    <tbody>
                         <form action="<?php echo FRONT_ROOT ?>Admin/Remove " method="GET" id="from">
                              <?php foreach ($cinemaList as $cinema) { ?>
                                   <tr>
                                        <td><?php echo $cinema->getName() ?></td>
                                        <td><?php echo $cinema->getAddress() ?></td>
                                        <td>
                                             <button type="submit" name="id" class="btn btn-danger" value="<?php echo $cinema->getId() ?>">
                                                  <i class="fa fa-trash "></i>
                                                  Eliminar
                                             </button>
                                        </td>
                                        <td>
                                             <button name="id" value="<?php echo $cinema->getId() ?>" class="btn btn-warning" onclick="
                                                       var frm = document.getElementById('from') || null;
                                                       if(frm) {
                                                            frm.action = '<?php echo FRONT_ROOT ?>'.concat('Admin/Update');     
                                                       }">
                                                  <i class="fa fa-edit"></i>
                                                  Modificar
                                             </button>
                                        </td>
                                        <td>
                                             <button name="id" value="<?php echo $cinema->getId() ?>" class="btn btn-success" onclick="
                                                       var frm = document.getElementById('from') || null;
                                                       if(frm) {
                                                            frm.action = '<?php echo FRONT_ROOT ?>'.concat('Admin/ShowAddRoom');     
                                                       }">
                                                  <i class="fa fa-edit"></i>
                                                  Administrar Salas
                                             </button>
                                        </td>
                                   </tr>
                              <?php
                              }
                              ?>
                              </tr>
                         </form>
                    </tbody>
               </table>
          </div>
     </section>
</main>