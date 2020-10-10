<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;
    use Models\GenreByMovie as GenreByMovie;
    use DAO\Connection as Connection;
    

    class MovieDAO implements IMovieDAO
    {
        private $connection;
        private $tableName = "movies";
        private $genreByMovieTableName = "genresByMovie";

        public function __construct()
        {
           
        }

        public function GetAll()
        {
            try
            {
                $movieList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = new Movie();
                    $movie->setIdMovie($row["idMovie"]);
                    $movie->setAdult($row["adult"]);
                    $movie->setPosterPath($row["posterPath"]);
                    $movie->setOriginalTitle($row["originalTitle"]);
                    $movie->setOriginalLanguage($row["originalLanguage"]);
                    $movie->setTitle($row["title"]);
                    $movie->setOverview($row["overview"]);
                    $movie->setReleaseDate($row["releaseDate"]);


                    array_push($movieList, $movie);
                }

                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function NowPlayingToDataBase()
        {
            
            $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=0e38635e1106aa97618b0e7fee7a5b57&language=es-ES";
            
            $json = file_get_contents($url);
            
            $datos = json_decode($json,true);

         
            foreach($datos['results'] as $value)
            {
                           
                $movie = new Movie();
                $movie->setIdMovie($value["id"]);
                $movie->setAdult($value["adult"]);
                $movie->setPosterPath($value["poster_path"]);
                $movie->setOriginalTitle($value["original_title"]);
                $movie->setOriginalLanguage($value["original_language"]);
                $movie->setTitle($value["title"]);
                $movie->setOverview($value["overview"]);
                $movie->setReleaseDate($value["release_date"]);

                $this->AddMovie($movie);               

                 foreach($value['genre_ids'] as $gKey)
                {
                    $genreByMovie = new GenreByMovie();
                    $genreByMovie->setIdGenre($gKey);
                    $genreByMovie->setIdMovie($value["id"]);                    
                    
                    $this->AddGenreByMovie($genreByMovie);     
                }             
            }            
        }

        public function AddGenreByMovie(GenreByMovie $genreByMovie)
        {
            try
            {
                $query = "INSERT INTO ".$this->genreByMovieTableName." (idGenre, idMovie ) VALUES (:idGenre, :idMovie);";
                    
                $parameters["idGenre"] = $genreByMovie->getIdGenre();

                $parameters["idMovie"] = $genreByMovie->getIdMovie();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function AddMovie(Movie $movie)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (idMovie, adult, posterPath, originalTitle, originalLanguage,title,overview, releaseDate) VALUES (:idMovie, :adult, :posterPath, :originalTitle, :originalLanguage,:title, :overview, :releaseDate );";
                
                $parameters["idMovie"] = $movie->getIdMovie();
                $parameters["adult"] = $movie->getAdult();
                $parameters["posterPath"] = $movie->getPosterPath();
                $parameters["originalTitle"] = $movie->getOriginalTitle();
                $parameters["title"] = $movie->getTitle();
                $parameters["overview"] = $movie->getOverview();
                $parameters["releaseDate"] = $movie->getReleaseDate();
                $parameters["originalLanguage"] = $movie->getOriginalLanguage();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }     
    }

?>
