<?php
    namespace DAO;

    use Models\Cinema as Movie;
    use DAO\Connection as Connection;

    interface IMovieDAO
    {
        function GetMoviesByDate($date);
    }
?>