<?php

    use DAO\CinemaDAO as CinemaDAO;

    $cinemaDAO = new CinemaDAO();

    if('' == $cinema->getName() || empty($cinema->getName()) || strlen($cinema->getName()) <= 3 || strlen($cinema->getName()) >= 25) {

        $_SESSION['message'] = 'Nombre de cine invalido';

    } elseif(''  == $cinema->getAddress() || empty($cinema->getAddress()) || strlen($cinema->getAddress()) <= 3 || strlen($cinema->getAddress()) >= 25) {

        $_SESSION['message'] = 'Direccion invalida';

    } else {

        $cinema->setName(trim($cinema->getName()));
        $cinema->setAddress(trim($cinema->getAddress()));
        
        $error = $this->cinemaDAO->Add($cinema);

        if (isset($error)) {
            $_SESSION['message'] = $error;
        }else {
            $_SESSION['message'] = "Cine agregado con exito!";
        }

    }
?>

<script> location.replace("<?php echo FRONT_ROOT.'Admin/ShowCinemaList';?>"); </script>