<?php

    namespace DAO;

    use Models\Date as Date;
    use \Exception as Exception;  
    use DAO\Connection as Connection;

    class DateDAO implements IDateDAO{

        private $connection;
        private $tableName = "dates";

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
                $query = "SELECT * FROM ".$this->tableName." WHERE  date_format(`date`,'%Y-%m-%d') = :date and idMovie = :idMovie;";

                $parameters["date"] = $date->getDate();
                $parameters["idMovie"] = $date->getIdMovie();

                $this->connection = Connection::GetInstance();

                return $this->connection->ExecuteNonQuery($query, $parameters);
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
                $query = "SELECT * FROM ".$this->tableName." 
                            WHERE `date` BETWEEN ADDTIME(:date,-1500) 
                            and date_add(:date, interval (select runtime from movies where idMovie = :idMovie)+15 minute);";

                $parameters["date"] = $date->getDate();
                $parameters["idMovie"] = $date->getIdMovie();

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
    }


?>