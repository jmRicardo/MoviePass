<?php

    use DAO\DateDAO;
    use DAO\RoomDAO;
    use DAO\SeatDAO;
    use Models\Seat as Seat;

    $roomDAO = new RoomDAO();
    $seatDAO = new SeatDAO();
    $dateDAO = new DateDAO();

    $date = $dateDAO->GetDateByID($idDate);

    $roomData = $roomDAO->GetRoom($date->getIdRoom());

    $seatList = $seatDAO->GetSeatsByDate($idDate);

    $ticketValue = $roomData->getPrice();

    $capacity = $roomData->getCapacity();

    $rowSeats = array();

    // CREA lA GRILLA DE ASIENTOS VACIOS

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

    // CARGA LOS ASIENTOS OCUPADOS PARA ASI PODER USAR ESE DATO Y DESHABILITARLOS

    foreach($seatList as $seat)
    {
        $x = $seat->getRow();
        $y = $seat->getColumn();

        $rowSeats[$x][$y]->setIdDate($seat->getIdDate());
    }   

?>

<table class="room-seats">

    <thead>
        <tr>
            <td colspan="14" align="center"><img src="<?php echo IMG_PATH."tv.png"?>" alt="Screen" width="25%"></td>
        </tr>
    </thead>

    <tbody class='bg-transparent border-0'>       
        <?php
            foreach($rowSeats as $rows)
            {
                ?><tr>
                    <td >
                        <img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair">
                        <img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair">
                    </td>
                <?php
                foreach($rows as $seat)
                {?>                    
                    <?php 
                        $id = $seat->getRowLetter() . $seat->getColumnNumber();
                        if($seat->getColumn() == 5 ){?>
                        <td>
                            <img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair">
                            <img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair">
                        </td>
                    <?php } ?>
                    <td>
                        <!-- MAGIA NEGRA -->
                        <button class='bg-transparent border-0' 
                                value="<?php echo $seat->getRow() ."-". $seat->getColumn();?>" 
                                id="<?php echo $id;?>" 
                                onclick="changeSeat(id);" 
                                <?php if (!empty($seat->getIdDate())) echo "disabled";?>
                        >
                        <!-- FIN DE LA MAGIA NEGRA -->
                            <div style="position: relative; display: inline-block; text-align: center;" >
                                <div style="position: absolute; top:65%; left: 50%; transform: translate(-50%, -50%);"  ><?php echo $id;?></div>
                                <img 
                                    id="<?php echo $id;?>IMG" 
                                    src="<?php echo IMG_PATH. (empty($seat->getIdDate()) ? "seat.png" : "seat-unavailable.png");?>" 
                                    width="33" 
                                    alt="false"
                                >
                            </div>
                        </button>
                    </td>
                <?php }?>
                <td >
                    <img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair">
                    <img src="<?php echo IMG_PATH."chairsV2.png"?>" alt="chair">
                </td>    
                </tr>
            <?php } 
        ?>
    </tbody>
</table>






                
