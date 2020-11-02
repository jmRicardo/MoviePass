<?php
    namespace Controllers;
    use DAO\MovieDAO;
    use DAO\DateDAO;
    use DAO\RoomDAO;
    use DAO\TicketDAO;
    use DAO\SeatDAO;
    use Models\Seat;
    use Models\Ticket;
use Utils\Util;

include(UTILS_PATH.'phpqrcode/qrlib.php');

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
            $this->seatDao = new SeatDAO();
        }
        
        /* Home with banner */
        function Home($message = "") 
        {
            $movies = $this->movieDao->GetAllActives();
            require_once(CLIENT_PATH."client-home.php");
        }

        function Account()
        {
            Util::loggedInRedirect();
           
            require_once(CLIENT_PATH."client-account.php");
        }

        /*Movies with genres*/
        function Select() 
        {
            $idGenre = 0;
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetAllActives();
            require_once(CLIENT_PATH."client-select-movie.php");
        }

         /*Movies with genres filter*/
        function Filter($idGenre)
        {
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetMoviesByGenre($idGenre);
            require_once(CLIENT_PATH."client-select-movie.php");
        }

        /*Movies by date & cinema*/
        function SelectDate($idMovie)
        {   
            $roomDao = $this->roomDao;
            $movie = $this->movieDao->GetMovieByID($idMovie);
            $dates = $this->dateDao->GetDatesFromWeek($idMovie);
            
            require_once(CLIENT_PATH."client-select-date.php");
        }

        function SelectDateCalendar($idMovie,$day)
        {   
            
            $roomDao = $this->roomDao;
            $movie = $this->movieDao->GetMovieByID($idMovie);
            $dates  = $this->dateDao->GetDatesFromWeekFromDate($idMovie,$day);
            $startingDay = $day;
           
            require_once(CLIENT_PATH."client-select-date.php");
            
        }

        function listCarusel()
        {
            $movies = $this->movieDao->GetAll();
            require_once(CLIENT_PATH."client-list-carusel.php");
        }
        
        function selectSeat($idDate)
        {
            $date =$this->dateDao->GetDateByID($idDate);
            $cine =$this->roomDao->getCinemaByRoom($date->getIdRoom());
            $movie = $this->movieDao->GetMovieByID($date->getIdMovie());
            require_once(CLIENT_PATH."client-select-seat.php");
        }
        
        function reservations()
        {   
            Util::loggedInRedirect();
            
            $usuario = $_SESSION['user_info'];
            //$movies = $this->movieDao->GetAll();
            $ticketList = $this->ticketDao->GetTicketListByUserId($usuario['id']);
            


            $dateList = array();
            foreach($ticketList as $onlyDate){
                $date  = $this->dateDao->GetDateByID($onlyDate->getIdDate());
                if( !(in_array($date, $dateList)) ){
                    $dateList[] = $date;
                }    
            }


            // var_dump($dateList);
            // exit();
            foreach($dateList as $aux){
                $cineList[] = $this->roomDao->getCinemaByRoom($aux->getIdRoom());
            }
            
            $movieList = array();
            foreach($dateList as $aux2){
                $movie =  $this->movieDao->GetMovieByID($aux2->getIdMovie());
                if( !(in_array($movie, $movieList)) ){
                    $movieList[] = $movie;
                }    
            }
            
            require_once(CLIENT_PATH."client-reservations.php");
        }

        function Checkout($stringSeats, $idDate)
        {
            Util::loggedInRedirect();
            require_once(PROCESS_PATH."seat-process.php");
        }

        function SendMail(){

            require_once(PROCESS_PATH."mail-process.php");             
        }

        function SearchMovie ($title){
            $movieSearch = $this->movieDao->GetMovieByTitle($title);
            $genres = $this->movieDao->GetActiveGenres();
            $IdMovie = $movieSearch->getIdMovie();
            
            require_once(CLIENT_PATH."client-search-movie.php");
        }
    }

?>