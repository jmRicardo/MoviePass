<?php 

    use Utils\Util;
    use Models\Seat;
    use Models\Ticket;


    if (Util::isLoggedIn())
    {
        if($stringSeats != 0)
        {
            $date =$this->dateDao->GetDateByID($idDate);
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

                    $img = VIEWS_PATH."img/qrs/qr-".$id.".png";
                    if (!file_exists($img)) {
                        \QRcode::png($id, $img);
                    }
                } else {
                    echo "
                        <script>
                            alert('No puede repetir la misma compra');
                            window.location = '".FRONT_ROOT."Client/Home';
                        </script>";
                }            
            }
            require_once(CLIENT_PATH."client-checkout.php");
        }
        else{

            $_SESSION['message'] = "Debe seleccionar un asiento!";

            header("Location:". FRONT_ROOT."Client/SelectSeat/" . $idDate);

        }
    }
    else
    {        
        $_SESSION['message'] = "Necesita iniciar sesion para continuar con la compra!";

        header("Location:". FRONT_ROOT."Client/SelectSeat/" . $idDate);
    }
?>