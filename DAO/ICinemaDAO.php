<?php
    namespace DAO;

    use Models\Cinema as Cinema;
    use DAO\Connection as Connection;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        function GetCinema($id);
        function Remove($id);
        function Update($id,$name,$address);
        function UpdateCinema(Cinema $cinema);        
    }
?>