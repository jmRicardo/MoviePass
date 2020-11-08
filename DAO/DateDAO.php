<?php

    namespace DAO;

    use Models\Date as Date;
    use \Exception as Exception;  
    use DAO\Connection as Connection;
    use DateTime;

class DateDAO implements IDateDAO{

        private $connection;
        private $tableName = "dates";

        function GetDatesStatus($idMovie, $idCinema, $time)
        {
            try
            {
                var_dump($time);
                

                $timeQuery = ( $time ? " date_format(d.`date`,'%H:%i') = :time ": "");
                
                $idMovieQuery = ( $idMovie == "TODES" ? "" : " d.idMovie = :idMovie " );
                
                $idCinemaQuery = ( $idCinema == "TODES" ? "" : " r.idCinema = :idCinema " );
                
                $query = " 
                
                select m.title as 'pelicula',c.name as 'cine',r.name as 'sala',d.date as 'funcion',count(s.idDate) as 'asientos vendidos', (r.capacity - count(s.idDate)) as 'asientos disponibles'
                
                from seats s
                
                inner join dates d on s.idDate = d.id
                
                inner join rooms r on r.idRoom = d.idRoom
                
                inner join cinemas c on c.id = r.idCinema 
                
                inner join movies m on d.idMovie = m.idMovie "
                
                . (empty($idCinemaQuery) && empty($idMovieQuery) && empty($timeQuery) ? "" : " WHERE " ) 
                
                . $timeQuery . (!empty($idMovieQuery) && $timeQuery ? " AND " : "") . $idMovieQuery . (!empty($idCinemaQuery) && $idMovieQuery ? " AND " : "") . $idCinemaQuery . " group by idDate ;";

                if ($idMovieQuery)
                    $parameters["idMovie"] = $idMovie;
                if ($idCinemaQuery)
                    $parameters["idCinema"] = $idCinema;
                if ($timeQuery)
                    $parameters["time"] = $time;

                $this->connection = Connection::GetInstance();
                
                $resultSet = ( isset($parameters) ? $this->connection->Execute( $query, $parameters) : $this->connection->Execute( $query ) );       

                return $resultSet;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            } 
        }

        function GetDatesByRoom($idRoom)
        {            
            try
            {
                $dateList = array();

                $query = "SELECT * FROM ".$this->tableName . " WHERE idRoom = :idRoom and date >= now() order by date;";

                $parameters["idRoom"] = $idRoom;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {                
                    $date = new Date();
                    $date->setDate($row["date"]);
                    $date->setIdMovie($row["idMovie"]);
                    $date->setIdRoom($row["idRoom"]);
                    $date->setId($row["id"]);

                    array_push($dateList, $date);
                }

                return $dateList;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }    
        }

        function AddDate(Date $date){

            try
            {
                $query = "INSERT INTO ".$this->tableName." (date, idRoom, idMovie) VALUES (:date, :idRoom, :idMovie);";
                
                $parameters["date"] = $date->getDate();
                $parameters["idRoom"] = $date->getIdRoom();
                $parameters["idMovie"] = $date->getIdMovie();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }

        function CheckIfAvailable(Date $date)
        {
            try
            {
                $query = "SELECT * FROM ".$this->tableName." WHERE  date_format(`date`,'%Y-%m-%d') = date_format(:date,'%Y-%m-%d') and idMovie = :idMovie;";
                
                $parameters["date"] = $date->getDate();
                $parameters["idMovie"] = $date->getIdMovie();

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query, $parameters);

                if(!empty($result)){
                    $date = new Date(); 
                    $date->setId($result[0]["id"]);
                    $date->setDate($result[0]["date"]);
                    $date->setIdMovie($result[0]["idMovie"]);
                    $date->setIdRoom($result[0]["idRoom"]);
                    return $date;
                }else{
                    return null;
                }                
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }

        function CheckRuntimeWithDate(Date $date)
        {
            try
            {
                $query = 
                "select * 
                from dates 
                where IFNULL(`date` >
                (select date_add(dato.date, interval (select runtime from movies where idMovie = dato.idMovie)+15 minute)  
                from ( select * from dates where `date` < :date order by `date` desc limit 1) as dato),'')
                and  IFNULL(`date` < date_add(:date, interval (select runtime from movies where idMovie = :idMovie)+15 minute),'')
                and idRoom = :idRoom;";

                $parameters["date"] = $date->getDate();
                $parameters["idMovie"] = $date->getIdMovie();
                $parameters["idRoom"] = $date->getIdRoom();
                
                $this->connection = Connection::GetInstance();

                return $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }            
        }
        
        public function GetDatesFromWeek($idMovie)
        {
            $date = date('Y-m-d h:m:s');
            
            try
            {
                $dateList = array();

                $query = "SELECT * FROM ".$this->tableName . 
                " WHERE (`date` between :date and 
                date_add(:date , interval 7 day) and idMovie = :idMovie);";

                $parameters["date"] = $date;
                $parameters["idMovie"] = $idMovie;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {                
                    $date = new Date();
                    $date->setDate($row["date"]);
                    $date->setIdMovie($row["idMovie"]);
                    $date->setIdRoom($row["idRoom"]);
                    $date->setId($row["id"]);

                    array_push($dateList, $date);
                }

                return $dateList;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }            
        }

        public function GetDatesFromWeekFromDate($idMovie, $fromDate)
        {
            $dateTimeDate = new DateTime($fromDate);
            $date = $dateTimeDate->format('Y-m-d h:m:s');
            
            try
            {
                $dateList = array();

                $query = "SELECT * FROM ".$this->tableName . 
                " WHERE (`date` between :date and 
                date_add(:date , interval 7 day) and idMovie = :idMovie);";

                $parameters["date"] = $date;
                $parameters["idMovie"] = $idMovie;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {                
                    $date = new Date();
                    $date->setDate($row["date"]);
                    $date->setIdMovie($row["idMovie"]);
                    $date->setIdRoom($row["idRoom"]);
                    $date->setId($row["id"]);

                    array_push($dateList, $date);
                }

                return $dateList;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }            
        }

        public function GetDateByID($id)
        {
            $query = "SELECT * FROM ".$this->tableName." WHERE (id = :id)";

            $parameters["id"] =  $id;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query,$parameters);

            $date = new Date();
            $date->setDate($result[0]["date"]);
            $date->setIdMovie($result[0]["idMovie"]);
            $date->setIdRoom($result[0]["idRoom"]);
            $date->setId($result[0]["id"]);

            return $date;
        }
    }


?>