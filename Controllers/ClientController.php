<?php
    namespace Controllers;
    use DAO\MovieDAO;
    use DAO\DateDAO;
    use DAO\RoomDAO;
    use DAO\TicketDAO;
    use DAO\SeatDAO;
use Models\Seat;
use Models\Ticket;
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
            $movies = $this->movieDao->GetAll();
            require_once(CLIENT_PATH."client-home.php");
        }

        function Account()
        {
            require_once(CLIENT_PATH."client-account.php");
        }

        /*Movies with genres*/
        function Select() 
        {
            $idGenre = 0;
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetAll();
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
            $usuario = $_SESSION['user_info'];
            $movies = $this->movieDao->GetAll();
            $ticketList = $this->ticketDao->GetTicketListByUserId($usuario['id']);
            var_dump($usuario);
            var_dump($ticketList);
            exit();
            require_once(CLIENT_PATH."client-reservations.php");
        }

        function Checkout($stringSeats, $idDate)
        {
            $date =$this->dateDao->GetDateByID($idDate);
            $cine =$this->roomDao->getCinemaByRoom($date->getIdRoom());
            $movie = $this->movieDao->GetMovieByID($date->getIdMovie());
            $user = $_SESSION['user_info'];
            $seats = explode(",", $stringSeats);
            $tickets= [];
            foreach ($seats as $seat){
                $rowColumn = explode("-", $seat);
                $row = $rowColumn[0];
                $column = $rowColumn[1];
                $seatObj = new Seat();
                $seatObj->setRow($row);
                $seatObj->setColumn($column);
                $seatObj->setIdDate($idDate);
                $idSeat = $this->seatDao->SetSeat($seatObj);
                if (strrpos($idSeat, "SQLSTATE") === FALSE) {
                    $ticket = new ticket();
                    $ticket->setIdDate($idDate);
                    $ticket->setIdUser($user["id"]);
                    $ticket->setIdSeat($idSeat);
                    $id = $this->ticketDao->AddTicket($ticket);
                    $ticket->setId($id);
                    array_push($tickets,$ticket);

                    $img = VIEWS_PATH."img/qrs/qr-".$id.".png";
                    if (!file_exists($img)) {
                        \QRcode::png($id, $img);
                    }
                } else {
                    echo "
                        <script>
                            alert('No puede repetir la misma compra');
                            window.location = '".FRONT_ROOT."Client/Home';
                        </script>";
                }
                
            }

           require_once(CLIENT_PATH."client-checkout.php");
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