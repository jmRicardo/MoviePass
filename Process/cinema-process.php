<?php

    use DAO\CinemaDAO as CinemaDAO;

    $cinemaDAO = new CinemaDAO();

    $_SESSION['message'] = 'manochon gay';


    if('' == $cinema->getName() || empty($cinema)) {
        
        $_SESSION['message'] = 'Nombre de cine invalido';
    } else {
       

        $error = $this->cinemaDAO->Add($cinema);

        if (isset($error)) {
            $_SESSION['message'] = $error;
        }else {
            $_SESSION['message'] = "Cine agregado con exito!";
        }

        

    }

    

    header("Location:".FRONT_ROOT."Admin/ShowCinemaList");



?>