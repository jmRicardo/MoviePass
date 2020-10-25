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
        
        function CheckDate(Date $date)
        {
            
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
    }


?>