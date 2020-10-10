<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Cinema as Movie;    
    use DAO\Connection as Connection;

    class MovieDAO implements IMovieDAO
    {
        private $connection;
        private $tableName = "movies";

        public function __construct()
        {
           
        }

        public function GetMoviesByDate($date)
        {
            
        }


    }

?>
