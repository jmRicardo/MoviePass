<?php

    namespace DAO;
    use Models\Date as Date;

    interface IDateDAO{

        function AddDate(Date $date);
        function CheckIfAvailable(Date $date); /* Devuelve 1 si encuentra coincidencia, compara por fecha y pelicula */
        function CheckRuntimeWithDate(Date $date);
        function GetDatesFromWeek($idMovie);
        function GetDateByID($id);
        function GetDatesByRoom($idRoom);
        function GetDatesForSeats($idMovie,$idCinema,$time);

        
    }
?>