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
                    <th></th>
                    <th>Recaudacion</th>

                </thead>
                    <tbody>
                        <form action="<?php echo FRONT_ROOT ?>Admin/ShowRoomByTicketSold" method="GET" id="from">
                            <?php foreach ($cinemaList as $cinema) { ?>
                                <tr>
                                    <td><?php echo $cinema->getName() ?></td>
                                    <td><?php echo $cinema->getAddress() ?></td>
                                    <td>
                                    <button type="submit" name="id" class="btn btn-success" value="<?php echo $cinema->getId() ?>">
                                        Total Sala
                                    </button>
                                    </td>
                                    <!-- <td>
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
                                    </td> -->
                                    <td>
                                    $15000
                                    </td> 
                                </tr>
                                     
                            <?php }?>
                                                
                        </form>
                    </tbody>
            </table>
        </div>
    </section>

</main>

















































<!-- <main class="py-5">
    <div class="col-lg-5">
        <div class="cine-box">
            <div class="cine-header">
                <section id="listado" class="mb-5">
                    <div class="container">
                        <h2 class="mb-4">Listado de Cines</h2>
                        <table class="table bg-light-alpha">
                            <tbody>
                                <form action="<?php echo FRONT_ROOT ?>Admin/ShowRoomByTicketSold" method="GET" id="from">
                                    <select class="form-control category-select" name="nameMovie" required>
                                        <option disabled selected></option>
                                        <?php foreach ($cinemaList as $cinema) { ?>
                                            <option value="<?php echo $cinema->getId() ?>">
                                                <?php echo $cinema->getName() ?>
                                            </option>
                                        <?php } ?>
                                    </select><br>
                                    <button type="submit" class="btn btn-primary"> Siguiente </button>
                                </form>
                                <form action="<?php echo FRONT_ROOT ?>Admin/ShowDateByTicketSold" method="GET" id="from">
                                    <h2 class="mb-4">Listado de Salas</h2>
                                    <select class="form-control category-select" name="idRoomTicket" required>
                                        <option disabled selected></option>
                                        <?php foreach ($listRoom as $room) { ?>
                                            <option value="">
                                                <?php echo $room->getName() ?>
                                            </option>
                                        <?php } ?>
                                    </select><br>
                                    <button type="submit" class="btn btn-primary"> Siguiente </button>
                                </form>

                                <h2 class="mb-4">Listado de Funciones</h2>
                                <select class="form-control category-select" name="idRoomTicket" required>
                                    <option disabled selected></option>
                                    <?php foreach ($listDate as $date) { ?>
                                        <option value="<?php echo $cinema->getId() ?>">
                                            <?php echo $date->getDate() ?>
                                        </option>
                                    <?php } ?>
                                </select><br>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main> -->