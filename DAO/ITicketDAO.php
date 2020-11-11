<?php

    namespace DAO;
    use Models\Date;
    use Models\Ticket;

interface ITicketDAO
    {
        function GetOccupiedSeatByDate(Date $date);
        function AddTicket(Ticket $ticket);
        function GetTicket($id);
    }

?>