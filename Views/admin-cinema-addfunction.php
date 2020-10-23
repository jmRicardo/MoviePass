<?php
    require_once('admin-nav.php');
?>
<main class="py-5">

    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4"> Agregar Funcion </h2>

            <?php
                var_dump($movies);
                exit();
            
            ?>


            <form action="<?php echo FRONT_ROOT ?>Admin/SaveUpdate" method="get" class="bg-light-alpha p-5">
                
            

                <button type="submit" name="id" class="btn btn-primary" value="<?php echo $cinema->getId() ?>">Guardar</button>
            </form>
        </div>
    </section>



</main>