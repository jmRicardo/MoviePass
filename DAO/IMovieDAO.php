<?php
    namespace DAO;

    use Models\Movie as Movie;
    use Models\GenreByMovie as GenreByMovie;
    use DAO\Connection as Connection;

    interface IMovieDAO
    {
        function GetMoviesByGenre($id);
        function GetMovieByID($id);
        function GetAll();
        function NowPlayingToDataBase();
        function AddMovie(Movie $movie);
        function AddGenreByMovie(GenreByMovie $genreByMovie);
        function ArrayToMovieObjects(array $result);
        function GetGenres();
       /*  function GetGenresActive(); */
    }
?>  