<?php
    namespace Controllers;
    use DAO\MovieDAO;

    class ClientController 
    {
        private $movieDao;

        function __construct() 
        {
            $this->movieDao= new MovieDAO();
        }
        
        function Home($message = "") 
        {
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-home.php");
            // require_once(VIEWS_PATH."admin-cinema-add.php");

        }

        function Account()
        {
            require_once(VIEWS_PATH."myaccount.php");
        }

        function Select() 
        {
            $idGenre = 0;
            $genres=$this->movieDao->GetActiveGenres();
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-select-movie.php");
        }

        function Filter($idGenre)
        {
            $genres=$this->movieDao->GetActiveGenres();
            $movies=$this->movieDao->GetMoviesByGenre($idGenre);
            require_once(VIEWS_PATH."client-select-movie.php");
        }

        function SelectDate($idMovie)
        {
            $movie=$this->movieDao->GetMovieByID($idMovie);
            require_once(VIEWS_PATH."client-select-date.php");
        }
        
        function SendMail(){

            require_once(PROCESS_PATH."mail-process.php");             
        }
        

    }

?>