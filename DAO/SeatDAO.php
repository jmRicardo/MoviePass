<?php

    namespace DAO;
    use \Exception as Exception;   
    use DAO\Connection as Connection;
    use Models\Seat;

class SeatDAO implements ISeatDAO{

        private $connection;
        private $tableName = "seats";

        public function SetSeat(Seat $seat)
        {
            
        }

        public function GetSeatsByDate($idDate)
        {
            try
            {
                $query = "SELECT * FROM ".$this->tableName." WHERE idDate = :idDate;";

                $parameters["idDate"] =  $idDate;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);

                $seatList = array();

                foreach($result as $row)
                {
                    $seat = new Seat();
                    $seat->setId($row["id"]);
                    $seat->setRow($row["row"]);
                    $seat->setColumn($row["column"]);
                    $seat->setRowLetter($row["rowLetter"]);
                    $seat->setColumnNumber($row["columnNumber"]);
                    $seat->setIdDate($row["idDate"]);
                    $seat->setIdUser($row["idUser"]);

                    array_push($seatList,$seat);
                }

                return $seatList;
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }


    }

?>