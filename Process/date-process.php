<?php

    use DAO\DateDAO;
    use Models\Date;

    $dateDAO = new DateDAO();

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
            $status = "fail";
            $_SESSION['message'] = "La sala " . $result->getIdRoom() . " ya pasa esa pelicula ese dia.";
        }
    }
    else
    {
        $status = "ok";
        $_SESSION['message'] = "Se creo una funcion para la pelicula " . $dateObject->getIdMovie();
    }


    if ($status == "ok")
    {
        $result = $dateDAO->CheckRuntimeWithDate($dateObject);
        
        if (!empty($result))
         {
             $_SESSION['message'] = "El horario asignado no respeta las politicas de la empresa ( no hay 15 minutos entre funciones o su duracion es muy elevada para el espacio asignado";
         }
         else
        {
             $dateDAO->AddDate($dateObject);
        } 
    }

    header("Location:".FRONT_ROOT."Admin/ShowDates/". $dateObject->getIdRoom());

    
