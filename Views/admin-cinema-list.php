<?php
    require_once('admin-nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Cines</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Direccion</th>
                    </thead>
                    <tbody>
                         <form action="<?php echo FRONT_ROOT ?>Admin/Remove " method="post" id="from">
                         <?php
                              foreach($cinemaList as $cinema)
                              {
                                   ?>
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
                                                            var a = '<?php echo FRONT_ROOT ?>';
                                                            var b = 'Admin/Update';
                                                            frm.action = a.concat(b);     
                                                       }">
                                                       <i class="fa fa-edit"></i>
                                                            Modificar
                                                  </button>
                                             </td>
                                             <td>
                                                  <button name="id" value="<?php echo $cinema->getId() ?>" class="btn btn-success" onclick="
                                                       var frm = document.getElementById('from') || null;
                                                       if(frm) {
                                                            var a = '<?php echo FRONT_ROOT ?>';
                                                            var b = 'Admin/AddRooms';
                                                            frm.action = a.concat(b);     
                                                       }">
                                                       <i class="fa fa-edit"></i>
                                                            Añadir Salas
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