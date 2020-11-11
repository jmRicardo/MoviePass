<?php 

    use Models\Seat;
    use Models\Ticket;
    use Utils\Util;

    $date =$this->dateDao->GetDateByID($idDate);
    $dateTickets = new DateTime($date->getDate());
    
    $cine =$this->roomDao->getCinemaByRoom($date->getIdRoom());
    $movie = $this->movieDao->GetMovieByID($date->getIdMovie());
    $user = $_SESSION['user_info'];
    $seats = explode(",", $stringSeats);
    $tickets= [];
    foreach ($seats as $seat){
        $rowColumn = explode("-", $seat);
        $row = $rowColumn[0];
        $column = $rowColumn[1];
        $seatObj = new Seat();
        $seatObj->setRow($row);
        $seatObj->setColumn($column);
        $seatObj->setIdDate($idDate);
        $idSeat = $this->seatDao->SetSeat($seatObj);
        if (strrpos($idSeat, "SQLSTATE") === FALSE) {
            $ticket = new Ticket();
            $ticket->setIdDate($idDate);
            $ticket->setIdUser($user["id"]);
            $ticket->setIdSeat($idSeat);
            $id = $this->ticketDao->AddTicket($ticket);
            $ticket->setId($id);
            array_push($tickets,$ticket);

            $info = "Cine: " . $cine->getName() ."\r\n" .
                    "Dirección: " . $cine->getAddress() ."\r\n" .
                    "Sala: " . $date->getIdRoom() ."\r\n" .
                    "Pelicula: " . $movie->getTitle() ."\r\n" .
                    "Fecha: " . $dateTickets->format("d M y") ."\r\n" .
                    "Horario: " . $dateTickets->format("g:i a") ."\r\n" .
                    "Nro Ticket: " . $ticket->getId() ."\r\n" ;
                    

            $img = VIEWS_PATH."img/qrs/qr-".$id.".png";
            if (!file_exists($img)) {
                \QRcode::png($id, $img);
            }
            Util::sendTicket($info,$ticket->getId());
        } else {
            echo "
                <script>
                    alert('No puede repetir la misma compra');
                    window.location = '".FRONT_ROOT."Client/Home';
                </script>";
        }            
    }

    require_once(CLIENT_PATH."client-checkout.php");
?>