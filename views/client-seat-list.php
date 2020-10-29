<?php

    use DAO\RoomDAO;
use DAO\SeatDAO;
use Models\Seat as Seat;

    $roomDAO = new RoomDAO();
    $seatDAO = new SeatDAO();

    $roomData = $roomDAO->GetRoom(102);

    $seatList = $seatDAO->GetSeatsByDate(6);

    $ticketValue = $roomData->getPrice();

    $capacity = $roomData->getCapacity();

    $rowSeats = array();

    for($x = 0;$x<($capacity/10);$x++){ 

        $rowSeats[$x] = array();
        
        for($y = 0;$y<10;$y++)
        {
            $seat = new Seat();
            $seat->setRow($x);
            $seat->setColumn($y);
            $seat->setRowLetter(chr($x+65));
            $seat->setColumnNumber($y);

            array_push($rowSeats[$x],$seat);            
        }    
    }

    foreach($seatList as $seat)
    {
        $x = $seat->getRow();
        $y = $seat->getColumn();

        $rowSeats[$x][$y]->setIdDate($seat->getIdDate());
    }

    

?>





<table class="roomSeats" bgcolor="grey" >
    <thead>
        <tr>
            <td colspan="12" align="center"><img src="<?php echo IMG_PATH."tv.png"?>" alt="Screen" width="25%"></td>
        </tr>
    </thead>

    <tbody class='bg-transparent border-0'>
       
        <?php

            foreach($rowSeats as $rows)
            {
                ?><tr><td ><img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair"></td><?php
                foreach($rows as $seat)
                {?>                    
                    <td>
                        <button class='bg-transparent border-0' value="<?php echo $seat->getRowLetter() . $seat->getColumnNumber();?>" id="<?php echo $seat->getRowLetter() . $seat->getColumnNumber();?>" onclick="disableBtn(id);" <?php if (!empty($seat->getIdDate())) echo "disabled";?>>
                        <div><?php echo $seat->getRowLetter() . $seat->getColumnNumber();?></div>
                        <img src="<?php echo IMG_PATH."asiento.png"?>" width="75%" alt="chair">
                        </button>
                    </td>
                <?php }?>
                <td ><img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair"></td>    
            </tr>
            <?php }


            /* for($x = 0;$x<($capacity/10);$x++){?>
                <tr>
                <td ><img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair"></td><?php
                for($y = 0;$y<10;$y++)
                {
                     echo "<td><button class='bg-transparent border-0' type=\"button\" name=\"selected\" value='". $x.$y ."'> <img src='". FRONT_ROOT . VIEWS_PATH ."img/asientoV2.png'  onclick=\"this.src='".FRONT_ROOT . VIEWS_PATH ."img/asientoV2-click.png'\" </button></td>"; 
                    ?>
                    <td><div class="seat"><span aria-hidden="true" class="seatDesignation">A19</span></div></td><?php
                }?>
                <td ><img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair"></td><?php
                echo "</tr>";
                
            }    */ 


        ?>
    </tbody>
</table>






                
