<?php
require_once('admin-nav.php');
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de las Salas</h2>
            <table class="table bg-light-alpha">
                <thead>
                    <th>Id Sala</th>
                    <!-- <th>Id Cine</th> -->
                    <th>Nombre de la Sala</th>
                    <!-- <th>Precio</th> -->
                    <!-- <th>Capacidad</th> -->
                </thead>
                <tbody>
                    <form action="<?php echo FRONT_ROOT ?>Admin/Remove" method="GET" id="from">
                        <?php foreach ($thisRoom as $room) { ?>
                            <tr>
                                <td><?php echo $room->getIdRoom() ?></td>
                                <!-- <td><?php echo $room->getIdCinema() ?></td> -->
                                <td><?php echo $room->getName() ?></td>
                                <!-- <td><?php echo $room->getPrice() ?></td> -->
                                <!-- <td><?php echo $room->getCapacity() ?></td> -->
                                <td>

                                <!-- <td>
                                    <button name="idRoom2" value="<?php echo $room->getIdRoom() ?>" class="btn btn-warning" onclick="
                                                    var frm = document.getElementById('from') || null;
                                                    if(frm) {
                                                            frm.action = '<?php echo FRONT_ROOT ?>'.concat('Admin/RemoveRoom');     
                                                    }">
                                        <i class="fa fa-edit"></i>
                                        Eliminar
                                    </button>
                                </td>
                                <td>
                                    <button name="idRoom2" value="<?php echo $room->getIdRoom() ?>" class="btn btn-success" onclick="
                                                    var frm = document.getElementById('from') || null;
                                                    if(frm) {
                                                            frm.action = '<?php echo FRONT_ROOT ?>'.concat('Admin/ShowDates');     
                                                    }">
                                        <i class="fa fa-edit"></i>
                                        Agregar Funciones
                                    </button>
                                </td> -->
                            </tr>
                        <?php }  ?>
                    </form>
                </tbody>
            </table>
        </div>
    </section>

</main>
