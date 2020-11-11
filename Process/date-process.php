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
            $_SESSION['message'] = "Nueva función agregada en la sala ". $dateObject->getIdRoom();
        }
        else
        {
            $status = "fail";
            $_SESSION['message'] = "La sala " . $result->getIdRoom() . " ya pasa esa película ese día.";
        }
    }
    else
    {
        $status = "ok";
        $_SESSION['message'] = "Se creó una función para la película " . $dateObject->getIdMovie();
    }


    if ($status == "ok")
    {
        $result = $dateDAO->CheckRuntimeWithDate($dateObject);
        
        if (!empty($result))
         {
             $_SESSION['message'] = "El horario asignado no respeta las políticas de la empresa ( no hay 15 minutos entre funciones o su duración es muy elevada para el espacio asignado";
         }
         else
        {
             $dateDAO->AddDate($dateObject);
        } 
    }
?>

<script> location.replace("<?php echo FRONT_ROOT.'Admin/ShowDates/'. $dateObject->getIdRoom();?>"); </script>

    
