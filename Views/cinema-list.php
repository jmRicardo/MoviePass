<?php
    require_once('nav.php');

    use DAO\MovieDAO as MovieDAO;

    $movieDAO = new MovieDAO;
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
                         <form action="<?php echo FRONT_ROOT ?>Cinema/Remove " method="post" id="from">
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
                                                  <button type="submit" name="id" class="admin_buttons" value="<?php echo $cinema->getId() ?>">
                                                       <i class="fa fa-trash"></i>
                                                            Eliminar 
                                                  </button>
                                             </td>
                                             <td>
                                                  <button name="id" value="<?php echo $cinema->getId() ?>" class="admin_buttons" onclick="
                                                       var frm = document.getElementById('from') || null;
                                                       if(frm) {
                                                            var a = '<?php echo FRONT_ROOT ?>';
                                                            var b = 'Cinema/Update';
                                                            frm.action = a.concat(b);     
                                                       }">
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