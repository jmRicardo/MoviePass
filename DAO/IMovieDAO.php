<?php
    namespace DAO;

    use Models\Movie as Movie;
    use Models\GenreByMovie as GenreByMovie;
    use DAO\Connection as Connection;

    interface IMovieDAO
    {
        /* function GetMoviesByDate($date);
        function GetMovie($id);*/
        function GetAll();
        function NowPlayingToDataBase();
        function AddMovie(Movie $movie);
        public function AddGenreByMovie(GenreByMovie $genreByMovie);
    }
?>  