<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;
    use Models\Genre as Genre;
    use Models\GenreByMovie as GenreByMovie;
    use DAO\Connection as Connection;
    

    class MovieDAO implements IMovieDAO
    {
        private $connection;
        private $tableName = "movies";
        private $genreByMovieTableName = "genresByMovie";
        private $genreTableName = "genres";
        private $dateTableName = "dates";

        public function __construct()
        {
           
        }

        public function GetBillboardByDate(bool $comingUpNext)
        {
            try
            {
                $movieList = array();

                $query = "select * from " . $this->tableName . " where releaseDate " .( $comingUpNext ? " > ":" <= ") . "date_format(:date,'%Y-%m-%d');";

                $parameters["date"] =  date("Y/m/d");

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);

                $movieList = $this->ArrayToMovieObjects($result);

                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetActiveGenres()
        {
            try
            {
                $genreList = array();

                $query = "select distinct(g.idGenre),g.name from ". $this->genreTableName ." g left join ". $this->genreByMovieTableName ." gbm on g.idGenre = gbm.idGenre order by g.name;";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                $genreList = $this->ArrayToGenreObjects($resultSet);

                return $genreList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetGenres()
        {
            try
            {
                $genreList = array();

                $query = "SELECT * FROM ". $this->genreTableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                $genreList = $this->ArrayToGenreObjects($resultSet);

                return $genreList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function ArrayToGenreObjects($resultSet)
        {
            $genreList = array();

            foreach($resultSet as $row)
            {
                $genre = new Genre();
                $genre->setId($row["idGenre"]);
                $genre->setName($row["name"]);

                array_push($genreList,$genre);
            }

            return $genreList;
        }

        public function GetMoviesByGenre($id)
        {
            //$query = "SELECT idMovie FROM ".$this->tableName." WHERE (idGenre = :idGenre)";

            $query = "select * from ". $this->genreByMovieTableName ." gbm left join genres g on gbm.idGenre = g.idGenre left join ". $this->tableName . " m on gbm.idMovie = m.idMovie  where gbm.idGenre = :idGenre";

            $parameters["idGenre"] =  $id;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query,$parameters);

            $movieList = array();
            
            $movieList = $this->ArrayToMovieObjects($result);

            return $movieList;
        }

        public function ArrayToMovieObjects($result)
        {
            $movieList = array();
            
            foreach ($result as $row)
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
                    $movie->setTrailerPath($row["trailerPath"]);

                    array_push($movieList, $movie);
                }

            return count($movieList) == 1  ?  $movieList[0] : $movieList;
        }

        public function GetMovieByID($id)
        {
            $query = "SELECT * FROM ".$this->tableName." WHERE (idMovie = :idMovie)";

            $parameters["idMovie"] =  $id;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query,$parameters);

            $movie = $this->ArrayToMovieObjects($result);

            return $movie;
        }
      
        public function GetAll()
        {
            try
            {
                $movieList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                
                $movieList = $this->ArrayToMovieObjects($resultSet);

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
