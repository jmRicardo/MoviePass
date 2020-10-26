<?php

    namespace DAO;
    use Models\Ticket;
    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Models\Date;


    class TicketDAO implements ITicketDAO{

        private $connection;
        private $tableName = "tickets";

        public function GetOccupiedSeatByDate($idDate)
        {
            try
            {
                $seatList = array();

                $query = "SELECT * FROM ".$this->tableName. " WHERE idDate = :idDate;";

                $parameters["idDate"] =  $idDate;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {                
                    $seat = new Ticket(); 
                    $seat->setId($row["id"]);
                    $seat->setIdDate($row["idDate"]);
                    $seat->setIdUser($row["idUser"]);
                    $seat->setSeat($row["seat"]);

                    array_push($seatList, $seat);
                }

                return $seatList;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }

        public function AddTicket(Ticket $ticket)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (idDate, idUser, seat) VALUES (:idDate, :idUser, :seat);";
                
                $parameters["idDate"] = $ticket->getIdDate();
                $parameters["idUser"] = $ticket->getIdUser();
                $parameters["seat"] = $ticket->getSeat();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }
    }


?>