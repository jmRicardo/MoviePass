<?php

    namespace DAO;

    use Models\Room as Room;

    interface IRoomDAO{

        function GetAll();
        function GetAllByCinema($id);
        function Add(Room $room);
        //function GetCinemaByRoom($idRoom);
    }

?>