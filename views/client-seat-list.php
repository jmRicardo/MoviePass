
<table>
    <thead>
    </thead>

    <form action="action.php" method="POST">
    <tbody>
        <?php
            for($x = 0;$x<10;$x++){
                echo "<tr>";
                for($y = 0;$y<10;$y++)
                {
                    echo "<td><button type=\"button\" name=\"selected\" value='". $x.$y ."'> <img src='". FRONT_ROOT . VIEWS_PATH ."img/asiento.png'  onclick=\"this.src='".FRONT_ROOT . VIEWS_PATH ."img/asiento-click.png'\" </button></td>";
                }
                echo "</tr>";
            }    
        ?>
    </tbody>
    <button type="submit">ACEPTAR!</button>
    </form>
</table>
                
