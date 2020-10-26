<?php
    namespace Controllers;
    use DAO\MovieDAO;
    use DAO\DateDAO;

    class ClientController 
    {
        private $movieDao;
        private $dateDao;

        function __construct() 
        {
            $this->movieDao = new MovieDAO();
            $this->dateDao = new DateDAO();
        }
        
        function Home($message = "") 
        {
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-home.php");
        }

        function Account()
        {
            require_once(VIEWS_PATH."myaccount.php");
        }

        function Select() 
        {
            $idGenre = 0;
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-select-movie.php");
        }

        function Filter($idGenre)
        {
            $genres = $this->movieDao->GetActiveGenres();
            $movies = $this->movieDao->GetMoviesByGenre($idGenre);
            require_once(VIEWS_PATH."client-select-movie.php");
        }

        function SelectDate($idMovie)
        {
            $movie = $this->movieDao->GetMovieByID($idMovie);
            $dates = $this->dateDao->GetDatesFromWeek($idMovie);
            function getDatesByDay($day, $dates) {
                $datesOfDay = array();
                $currentDay = new \DateTime($day);
                foreach($dates as $date) {
                    $dateToCompare = new \DateTime($date->getDate());
                    $interval = $currentDay->diff($dateToCompare);
                    if ($interval->days === 0) {
                        array_push($datesOfDay, $date);
                    }
                }
            }
            require_once(VIEWS_PATH."client-select-date.php");
        }
        function listCarusel()
        {
            $movies = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-list-carusel.php");
        }

        function selectSeat()
        {
            require_once(VIEWS_PATH."client-select-seat.php");
        }
        
        function SendMail(){

            require_once(PROCESS_PATH."mail-process.php");             
        }


        

    }

?>