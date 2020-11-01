<?php
require_once('admin-nav.php');
?>

<main class="py-5">
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
</main>