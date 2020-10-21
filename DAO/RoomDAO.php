<?php

    namespace DAO;

    use \Exception as Exception;   
    use DAO\Connection as Connection;
    use DAO\IRoomDAO as IRoomDAO;
    use Models\Room;
    use \PDO as PDO;
    use \PDOException as PDOException;

    class RoomDAO implements IRoomDAO{

        private $connection;
        private $tableName = "rooms";

        public function __construct()
        {
           
        }

        public function GetAllByCinema($id)
        {
            try
            {
                $roomsList = array();

                $query = "SELECT * FROM ".$this->tableName ." WHERE (idCinema = :idCinema)";

                $parameters["idCinema"] =  $id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query,$parameters);
                
                foreach($resultSet as $row)
                {
                    $room = new Room();
                    $room->setIdRoom($row["idRoom"]);
                    $room->setIdCinema($row["idCinema"]);
                    $room->setName($row["name"]);
                    $room->setPrice($row["price"]);
                    $room->setCapacity($row["capacity"]);

                    array_push($roomsList, $room);
                }
                                
                return $roomsList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $roomsList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach($resultSet as $row)
                {
                    $room = new Room();
                    $room->setIdRoom($row["idRoom"]);
                    $room->setIdCinema($row["idCinema"]);
                    $room->setName($row["name"]);
                    $room->setPrice($row["price"]);
                    $room->setCapacity($row["capacity"]);

                    array_push($roomsList, $room);
                }
                                
                return $roomsList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Add(Room $room)
        {           
            try
            {
                $query = "INSERT INTO ".$this->tableName." (idCinema,name, price, capacity ) VALUES ( :idCinema , :name , :price ,:capacity);";
                
                $parameters["idCinema"] = $room->getIdCinema();
                $parameters["name"] = $room->getName();
                $parameters["price"] = $room->getPrice();
                $parameters["capacity"] = $room->getCapacity();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();

                throw $ex;
            }
        }
    }




?>