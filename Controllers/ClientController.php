<?php
    namespace Controllers;
    use DAO\MovieDAO;

    class ClientController {
        private $movieDao;

        function __construct() {
            $this->movieDao= new MovieDAO();
        }
        
        function Home() {
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-home.php");
        }

        function Account() {
            require_once(VIEWS_PATH."myaccount.php");
        }

        function Select() {
            $genres=$this->movieDao->GetGenres();
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."select-movie.php");
        }
    }

?>