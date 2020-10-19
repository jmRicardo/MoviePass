<?php
    namespace Controllers;
    use DAO\MovieDAO;

    class ClientController {
        private $movieDao;

        function __construct() {
            $this->movieDao= new MovieDAO();
        }
        
        function Home($message = "") {
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-home.php");
        }

        function Account() {
            require_once(VIEWS_PATH."myaccount.php");
        }

        function Select() {
            $idGenre = 0;
            $genres=$this->movieDao->GetActiveGenres();
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."select-movie.php");
        }

        function filter($idGenre){
            $genres=$this->movieDao->GetActiveGenres();
            $movies=$this->movieDao->GetMoviesByGenre($idGenre);
            require_once(VIEWS_PATH."select-movie.php");
        }

    }

?>