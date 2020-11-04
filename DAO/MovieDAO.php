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
        private $seatTableName = "seats";

        public function __construct()
        {
           
        }

        public function GetTotalByDate($idMovie,$cinema,$start,$end)
        {            
            try
            {

                /* $query = "                 
                select PELICULA,CINE,SALA,TOTAL from (                
                select 
                m.originalTitle as PELICULA,
                (select c.name from cinemas c where id = (select idCinema from rooms where idRoom = d.idRoom)) as CINE,
                r.name as SALA, 
                (select price from rooms where idRoom = d.idRoom) * (select count(*) from seats where idDate = d.id) as TOTAL,                
                from movies m                
                inner join dates d on m.idMovie = d.idMovie                
                inner join rooms r on r.idRoom = d.idRoom                
                WHERE " . ($idMovie == "TODES" ? "" : " d.idMovie = :idMovie and ") . 
                " date_format(d.`date`,'%Y-%m-%d') > :start and date_format(d.`date`,'%Y-%m-%d') < :end                 
                having TOTAL > 0                 
                order by d.idRoom) as MAGIC;            
                "; */

                $query = "
                
                select PELICULA,CINE,SALA,TOTAL from (
                    select 
                    m.originalTitle as PELICULA,
                    (select c.name from cinemas c where id = (select idCinema from rooms where idRoom = d.idRoom)) as CINE,
                    r.name as SALA,
                    (select price from rooms where idRoom = d.idRoom) * (select count(*) from seats where idDate = d.id) as TOTAL,
                    d.date
                    from movies m
                    inner join dates d on m.idMovie = d.idMovie
                    inner join rooms r on r.idRoom = d.idRoom
                    WHERE " . ($idMovie == "TODES" ? "" : " d.idMovie = :idMovie and ") . 
                    " date_format(d.`date`,'%Y-%m-%d') > :start and date_format(d.`date`,'%Y-%m-%d') < :end  
                    having TOTAL > 0
                    order by d.idRoom) as MAGIC where CINE like '%". ($cinema == "TODES" ? "" : $cinema ) ."';               
                
                ";

                if ($idMovie != "TODES")                
                    $parameters["idMovie"] = $idMovie;

                $parameters["start"] = $start;

                $parameters["end"] = $end;                

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);

                return $result;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
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

                $query = "
                
                SELECT distinct(g.idGenre),g.name 
                
                FROM ". $this->genreTableName ." g 
                
                INNER JOIN ". $this->genreByMovieTableName ." gbm on g.idGenre = gbm.idGenre 
                
                INNER JOIN ". $this->dateTableName ." d on gbm.idMovie = d.idMovie order by g.name;";

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
            $query = "
            
            SELECT DISTINCT m.`id`,m.`idMovie`,m.`adult`,m.`posterPath`,m.`originalTitle`,m.`originalLanguage`,m.`title`,m.`overview`,m.
            
            `releaseDate`,m.`trailerPath`,m.`runtime` 
            
            FROM genresByMovie gbm 
            
            INNER JOIN genres g on gbm.idGenre = g.idGenre 
            
            INNER JOIN movies m on gbm.idMovie = m.idMovie 
            
            INNER JOIN dates d on d.idMovie = gbm.idMovie 
            
            WHERE gbm.idGenre = :idGenre;";

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
                    $movie->setId($row["id"]);
                    $movie->setIdMovie($row["idMovie"]);
                    $movie->setAdult($row["adult"]);
                    $movie->setPosterPath($row["posterPath"]);
                    $movie->setOriginalTitle($row["originalTitle"]);
                    $movie->setOriginalLanguage($row["originalLanguage"]);
                    $movie->setTitle($row["title"]);
                    $movie->setOverview($row["overview"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setTrailerPath($row["trailerPath"]);
                    $movie->setRuntime($row["runtime"]);
                    
                    array_push($movieList, $movie);
                }

            //return count($movieList) == 1  ?  $movieList[0] : $movieList;
            return $movieList;
        }

        public function GetMovieByID($id)
        {
            $query = "SELECT * FROM ".$this->tableName." WHERE (idMovie = :idMovie)";

            $parameters["idMovie"] =  $id;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query,$parameters);

            $movies = $this->ArrayToMovieObjects($result);

            $movie = array_pop($movies);

            return $movie;
        }

        public function GetMovieByTitle($title)
        {
            $query = "SELECT * FROM ".$this->tableName." WHERE (title = :title)";

            $parameters["title"] =  $title;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query,$parameters);

            $movies = $this->ArrayToMovieObjects($result);

            $movie = array_pop($movies);

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

        public function GetAllActives()
        {
            try
            {
                $movieList = array();

                $query = "

                SELECT m.`id`,m.`idMovie`,m.`adult`,m.`posterPath`,m.`originalTitle`,m.`originalLanguage`,m.`title`,m.`overview`,m.`releaseDate`,m.`trailerPath`,m.`runtime` 
                
                FROM ". $this->tableName ." m inner join ". $this->dateTableName ." d 
                
                ON m.idMovie = d.idMovie group by idMovie;";

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

        public function UpdateMoviesRunTime()
        {
            $movieList = $this->GetAll();

            foreach($movieList as $movie)
            {
                $idMovie = $movie->getIdMovie();                
                
                $url = "https://api.themoviedb.org/3/movie/". $idMovie ."?api_key=". TMDB_API_KEY ."&language=es-ES";
            
                $json = file_get_contents($url);
            
                $datos = json_decode($json,true);

                $runtime = $datos['runtime'];

                $this->UpdateRuntime($runtime,$idMovie);                                               
            }        
        }

        public function UpdateRuntime($runtime,$idMovie)
        {
            try
            {
                $query = "UPDATE " .$this->tableName. 
                " SET runtime = :runtime 
                WHERE (idMovie = :idMovie)";
            
                $parameters["runtime"] = $runtime;
                $parameters["idMovie"] = $idMovie;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }

        }

        public function NowPlayingToDataBase()
        {
            
            $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=". TMDB_API_KEY ."&language=es-ES";
            
            $json = file_get_contents($url);
            
            $datos = json_decode($json,true);         

            $duplicates = 0;
            
            foreach($datos['results'] as $value)
            {
                           
                $movie = new Movie();
                $movie->setIdMovie($value["id"]);
                $movie->setAdult($value["adult"] ? 1 : 0);
                $movie->setPosterPath($value["poster_path"]);
                $movie->setOriginalTitle($value["original_title"]);
                $movie->setOriginalLanguage($value["original_language"]);
                $movie->setTitle($value["title"]);
                $movie->setOverview($value["overview"]);
                $movie->setReleaseDate($value["release_date"]);

                try
                {
                    $this->AddMovie($movie);               

                    foreach($value['genre_ids'] as $gKey)
                    {
                    $genreByMovie = new GenreByMovie();
                    $genreByMovie->setIdGenre($gKey);
                    $genreByMovie->setIdMovie($value["id"]);                    
                    
                    $this->AddGenreByMovie($genreByMovie);     
                    }
                }
                catch(Exception $Exception)
                {
                    $duplicates++;
                    $error = " elementos Duplicados";
                }           
            }
            
            return $duplicates . $error;
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

        public function GetGenresMovie($idMovie)
        {
            try
            {
                $genreList = array();

                $query = "SELECT gbm.idGenre, g.name
                FROM ".$this->genreByMovieTableName." AS gbm
                INNER JOIN ".$this->genreTableName." AS g ON gbm.idGenre=g.idGenre
                WHERE gbm.idMovie= :idMovie";

                $parameters["idMovie"] = $idMovie;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query,$parameters);
                
                $genreList = $this->ArrayToGenreObjects($resultSet);

                return $genreList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }

?>
