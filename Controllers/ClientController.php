<?php
    namespace Controllers;
    use DAO\MovieDAO;
    use DAO\DateDAO;
    use DAO\RoomDAO;

class ClientController 
    {
        private $movieDao;
        private $dateDao;
        private $roomDao;

        function __construct() 
        {
            $this->movieDao = new MovieDAO();
            $this->dateDao = new DateDAO();
            $this->roomDao = new RoomDAO();
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
            function getDatesByDay($day, $dates) {
                $datesOfDay = array();
                $formattedDay = $day->format("Y-m-d");
                foreach($dates as $date) {
                    $dateToCompare = new \DateTime($date->getDate());       
                    $formattedCompareDate = $dateToCompare->format("Y-m-d");
                    if ($formattedDay === $formattedCompareDate) {
                        array_push($datesOfDay, $date);
                    }
                }
                return $datesOfDay;
            }
            function getCinemasByDay($day, $dates) {
                $currentDates = getDatesByDay($day, $dates);
                $cinemas = array();
                foreach ($currentDates as $date) {
                    if (!isset($cinemas[$date->getIdRoom()])) {
                        $cinemas[$date->getIdRoom()] = array();
                    }
                    array_push($cinemas[$date->getIdRoom()], $date);
                }
                return $cinemas;
            }
            require_once(VIEWS_PATH."client-select-date.php");
        }

        /* probando
        function listCarusel()
        {
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-list-carusel.php");
        }
        */

        function selectSeat()
        {
            require_once(VIEWS_PATH."client-select-seat.php");
        }
        
        function SendMail(){

            require_once(PROCESS_PATH."mail-process.php");             
        }


        

    }

?>