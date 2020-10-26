<?php

    use DAO\RoomDAO as RoomDAO;

    $roomDAO = new roomDAO();

    

    if('' == $room->getName() || empty($room->getName())) {
        
        $_SESSION['message'] = 'Nombre de sala invalido';
    } elseif(!is_numeric($room->getPrice()) || $room->getPrice() <= 0) {

        $_SESSION['message'] = 'Valor de entrada invalido';
    }else{

        $error = $this->roomDAO->Add($room);
        
        if (isset($error)) {
            $_SESSION['message'] = $error;
        }else {
            
            $_SESSION['message'] = "Sala agregada con exito!";
        }
   

    }

    

    header("Location:".FRONT_ROOT."Admin/ShowAddRoom/".$room->getIdCinema());



?>