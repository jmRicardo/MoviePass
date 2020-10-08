<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Cines</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Capacidad TOTAL</th>
                         <th>Direccion</th>
                         <th>VALOR TICKET</th>
                    </thead>
                    <tbody>
                         <form action="<?php echo FRONT_ROOT ?>Cinema/Remove " method="post">
                         <?php
                              foreach($cinemaList as $cinema)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $cinema->getId() ?></td>
                                             <td><?php echo $cinema->getName() ?></td>
                                             <td><?php echo $cinema->getTotal_capacity() ?></td>
                                             <td><?php echo $cinema->getAddress() ?></td>
                                             <td><?php echo $cinema->getTicket_value() ?></td>
                                             <td>
                                                  <button type="submit" name="id" class="delete_button" value="<?php echo $cinema->getId() ?>">
                                                       <i class="fa fa-trash"></i>
                                                            Eliminar 
                                                  </button>
                                             </td>
                                             <td>
                                                  <button class="delete_button">
                                                       <i class="fa fa-edit"></i>
                                                            Modificar
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