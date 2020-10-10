<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Cinema as Cinema;    
    use DAO\Connection as Connection;

    class CinemaDAO implements ICinemaDAO
    {
        private $connection;
        private $tableName = "cinemas";

        public function UpdateCinema($cinema)
        {
            $query = "UPDATE " .$this->tableName. 
            " SET name = :name,  
            total_capacity = :total_capacity,
            address = :address,
            ticket_value = :ticket_value
            WHERE (id = :id)";
        
            $parameters["id"] = $cinema->getId();
            $parameters["name"] = $cinema->getName();
            $parameters["total_capacity"] = $cinema->getTotal_capacity();
            $parameters["address"] = $cinema->getAddress();
            $parameters["ticket_value"] = $cinema->getTicket_value();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        

        
        public function Add(Cinema $cinema)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name, total_capacity, address, ticket_value) VALUES (:name, :total_capacity, :address, :ticket_value);";
                
                $parameters["name"] = $cinema->getName();
                $parameters["total_capacity"] = $cinema->getTotal_capacity();
                $parameters["address"] = $cinema->getAddress();
                $parameters["ticket_value"] = $cinema->getTicket_value();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetCinema($id)
        {
            $query = "SELECT * FROM ".$this->tableName." WHERE (id = :id)";

            $parameters["id"] =  $id;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query,$parameters);

            $cinema = new Cinema(); 
            $cinema->setId($result[0]["id"]);
            $cinema->setName($result[0]["name"]);
            $cinema->setTotal_capacity($result[0]["total_capacity"]);
            $cinema->setAddress($result[0]["address"]);
            $cinema->setTicket_value($result[0]["ticket_value"]);

            return $cinema;
        }

        public function GetAll()
        {
            try
            {
                $cinemaList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema(); 
                    $cinema->setId($row["id"]);
                    $cinema->setName($row["name"]);
                    $cinema->setTotal_capacity($row["total_capacity"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setTicket_value($row["ticket_value"]);

                    array_push($cinemaList, $cinema);
                }

                return $cinemaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Remove($id)
        {            
            $query = "DELETE FROM ".$this->tableName." WHERE (id = :id)";

            $parameters["id"] =  $id;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }

        public function Update($id,$name,$total_capacity,$address,$ticket_value)
        {
            $query = "UPDATE " .$this->tableName. " SET name = :name,  
                                                        total_capacity = :total_capacity,
                                                        address = :address,
                                                        ticket_value = :ticket_value
                                                    WHERE (id = :id)";
            

            $parameters["id"] =  $id;
            $parameters["name"] =  $name;
            $parameters["total_capacity"] =  $total_capacity;
            $parameters["address"] =  $address;
            $parameters["ticket_value"] =  $ticket_value;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
    }
?>