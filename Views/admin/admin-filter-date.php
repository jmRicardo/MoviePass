<?php
    require_once('admin-nav.php');

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    
    setlocale(LC_TIME,"spanish");

    $day = new DateTime();

    $today = $day->format('Y-m-d');
?>

<main>
    <form action="<?php echo FRONT_ROOT ?>Admin/ResultFilterByDate" method="GET">

    <p>Pelicula</p>
    <select class="form-control category-select" name="idMovie" required>
        <option value="TODES" selected>TODES</option>
        <?php foreach ($movies as $movie) { ?>
            <option value="<?php echo $movie->getIdMovie() ?>">
                <?php echo $movie->getTitle(); ?>
            </option>
        <?php } ?>
    </select><br>

    <p>Cine</p>
    <select class="form-control category-select" name="cinema" required>
        <option value="TODES" selected>TODES</option>
        <?php foreach ($cinemas as $cinema) { ?>
            <option value="<?php echo $cinema->getName() ?>">
                <?php echo $cinema->getName(); ?>
            </option>
        <?php } ?>
    </select><br>
    
    <p>Principio</p>
    <input type="date" name="start" value="<?php echo $today;?>"required>
    <p>Fin</p>
    <input type="date" name="end" value="<?php echo $today;?>" required>

    <button type="submit" class="btn btn-primary">Buscar</button>

    </form>

</main>

