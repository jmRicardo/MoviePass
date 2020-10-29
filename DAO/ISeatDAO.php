<?php 

    namespace DAO;
    use Models\Seat;
    

    interface ISeatDAO{

        function GetSeatsByDate($idDate);
        function SetSeat(Seat $seat);
    }

?>