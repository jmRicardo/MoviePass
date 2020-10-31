<?php
    namespace Controllers;
    use DAO\MovieDAO;
    use DAO\DateDAO;
    use DAO\RoomDAO;
    use DAO\TicketDAO;
    use Models\Ticket;

class ClientController 
    {
        private $movieDao;
        private $dateDao;
        private $roomDao;
        private $ticketDao;

        function __construct() 
        {
            $this->movieDao = new MovieDAO();
            $this->dateDao = new DateDAO();
            $this->roomDao = new RoomDAO();
            $this->ticketDao = new TicketDAO();
        }
        
        /* Home with banner */
        function Home($message = "") 
        {
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-home.php");
        }

        function Account()
        {
            require_once(VIEWS_PATH."myaccount.php");
        }

        /*Movies with genres*/
        function Select() 
        {
            $idGenre = 0;
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-select-movie.php");
        }

         /*Movies with genres filter*/
        function Filter($idGenre)
        {
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetMoviesByGenre($idGenre);
            require_once(VIEWS_PATH."client-select-movie.php");
        }

        /*Movies by date & cinema*/
        function SelectDate($idMovie)
        {   
            $roomDao = $this->roomDao;
            $movie = $this->movieDao->GetMovieByID($idMovie);
            $dates = $this->dateDao->GetDatesFromWeek($idMovie);
            
            require_once(VIEWS_PATH."client-select-date.php");
        }

        function SelectDateCalendar($idMovie,$day)
        {   
            
            $roomDao = $this->roomDao;
            $movie = $this->movieDao->GetMovieByID($idMovie);
            $dates  = $this->dateDao->GetDatesFromWeekFromDate($idMovie,$day);
            $startingDay = $day;
           
            require_once(VIEWS_PATH."client-select-date.php");
            
        }

        function listCarusel()
        {
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-list-carusel.php");
        }
        
        function selectSeat($idDate)
        {
            require_once(VIEWS_PATH."client-select-seat.php");
        }
        
        function reservations()
        {   
            require_once(VIEWS_PATH."client-reservations.php");
        }

        function Checkout($stringSeats, $idDate)
        {
            $date =$this->dateDao->GetDateByID($idDate);
            $movie = $this->movieDao->GetMovieByID($date->getIdMovie());
            $user = $_SESSION['user_info'];
            $seats = explode(",", $stringSeats);
            $tickets= [];
            foreach ($seats as $seat){
                $ticket = new ticket();
                $ticket->setIdDate($idDate);
                $ticket->setIdUser($user["id"]);
                $ticket->setSeat($seat);
                array_push($tickets,$ticket);
                $this->ticketDao->AddTicket($ticket);
            }

            
            require_once(VIEWS_PATH."client-checkout.php");
        }

        function SendMail(){

            require_once(PROCESS_PATH."mail-process.php");             
        }
    }

?>