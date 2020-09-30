<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
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
                        echo "<td><button name=\"selected\" value='". $x.$y ."'> <img src='asiento.png'  onclick=\"this.src='asiento-click.png'\" </button></td>";
                    }
                    echo "</tr>";
                }    
            ?>
        </tbody>
        <button type="submit">ACEPTAR!</button>
        </form>
        
    </table>
                

    
    
</body>
</html>