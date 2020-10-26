<?php

    use DAO\DateDAO;
    use Models\Date;

    $dateDAO = new DateDAO();
    //$dateObject = new Date();

    $result = $dateDAO->CheckIfAvailable($dateObject);
    
    if (isset($result))
    {
        if ($result->getIdRoom() == $dateObject->getIdRoom())
        {
            $status = "ok";
            $_SESSION['message'] = "Nueva funcion agregada en la sala ". $dateObject->getIdRoom();
        }
        else
        {
            $_SESSION['message'] = "La sala " . $result->getIdRoom() . " ya pasa esa pelicula ese dia.";
        }
    }
    else
    {
        $status = "ok";
        $_SESSION['message'] = "Se creo una funcion para la pelicula " . $dateObject->getIdMovie();
    }


    // if ($status == "ok")
    // {
    //     if ($dateDAO->CheckRuntimeWithDate($dateObject))
    //     {
    //         $_SESSION['message'] = "El horario asignado no respeta las politicas de la empresa ( no hay 15 minutos entre funciones o su duracion es muy elevada para el espacio asignado";
    //     }
    //     else
    //     {
    //         $dateDAO->AddDate($dateObject);
    //     }
    // }

    header("Location:".FRONT_ROOT."Admin/ShowDates/". $dateObject->getIdRoom());

?>