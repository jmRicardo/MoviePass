<?php
    namespace DAO;

    use Models\Cinema as Cinema;
    use DAO\Connection as Connection;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        function Remove($id);
        function Update($id,$name,$total_capacity,$address,$ticket_value);
        function UpdateCinema(Cinema $cinema);
    }
?>