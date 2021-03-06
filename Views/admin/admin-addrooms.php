<?php
require_once('admin-nav.php');
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Agregar sala en cine <?php echo $cinema->getName(); ?></h2>
            <form action="<?php echo FRONT_ROOT ?>Admin/AddRoom" method="post" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="name" value="" class="form-control" minlength="2" maxlength="25" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Precio de la entrada</label>
                            <input type="text" name="price" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Capacidad</label><br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="capacity" id="option1" value="100" autocomplete="off" checked>100
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="capacity" id="option2" value="150" autocomplete="off"> 150
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="capacity" id="option3" value="250" autocomplete="off"> 250
                            </label>
                        </div>
                    </div>

                </div>
                <button type="submit" name="id" value="<?php echo $cinema->getId(); ?>" class="btn btn-primary ">Agregar</button>
            </form>
        </div>
    </section>
    <hr>
    <!-- /////////////////////////////////////////////////////////////////////////////// -->
    <!-- /////////////////////////////////////////////////////////////////////////////// -->
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de las Salas</h2>
            <table class="table bg-light-alpha">
                <thead>
                    <th>Nombre de la Sala</th>
                    <th>Precio</th>
                    <th>Capacidad</th>
                </thead>
                <tbody>
                    <form action="<?php echo FRONT_ROOT ?>Admin/Remove" method="GET" id="from">
                        <?php foreach ($listId as $room) { ?>
                            <tr>
                                <td><?php echo $room->getName() ?></td>
                                <td><?php echo $room->getPrice() ?></td>
                                <td><?php echo $room->getCapacity() ?></td>
                                <td>

                                <td>
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
                                </td>
                            </tr>
                        <?php }  ?>
                    </form>
                </tbody>
            </table>
        </div>
    </section>
</main>