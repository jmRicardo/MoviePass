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
                    $seat->setIdSeat($row["idSeat"]);

                    array_push($seatList, $seat);
                }

                return $seatList;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }

        public function GetTicketListByUserId($idUser)
        {
            try
            {
                $ticketList = array();

                $query = "SELECT * FROM ".$this->tableName. " WHERE idUser = :idUser;";

                $parameters["idUser"] =  $idUser;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {                
                    $ticket = new Ticket(); 
                    $ticket->setId($row["id"]);
                    $ticket->setIdDate($row["idDate"]);
                    $ticket->setIdUser($row["idUser"]);
                    $ticket->setIdSeat($row["idSeat"]);

                    array_push($ticketList, $ticket);
                }

                return $ticketList;
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
                $query = "INSERT INTO ".$this->tableName." (idDate, idUser, idSeat) VALUES (:idDate, :idUser, :idSeat);";
                
                $parameters["idDate"] = $ticket->getIdDate();
                $parameters["idUser"] = $ticket->getIdUser();
                $parameters["idSeat"] = $ticket->getIdSeat();

                $this->connection = Connection::GetInstance();

                $insertId = $this->connection->ExecuteNonQueryWithInsertId($query, $parameters);
                return $insertId;
            }
            catch(Exception $ex)
            {
                var_dump($ex->getMessage());
                return $ex->getMessage();
            }
        }
    }


?>