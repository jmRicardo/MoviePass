<?php

    use DAO\CinemaDAO as CinemaDAO;

    $cinemaDAO = new CinemaDAO();

    if('' == $cinema->getName() || empty($cinema->getName())) {

        $_SESSION['message'] = 'Nombre de cine invalido';

    } elseif(''  == $cinema->getAddress() || empty($cinema->getAddress())) {

        $_SESSION['message'] = 'Direccion invalida';

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