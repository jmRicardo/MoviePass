<?php 

    namespace DAO;
    use Models\Seat;

    interface ISeatDAO{

        function GetOcuppiedSeats($idDate);
        function SetSeat(Seat $seat);
    }

?>