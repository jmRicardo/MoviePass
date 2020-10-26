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
            try
            {
                $query = "UPDATE " .$this->tableName. 
                " SET name = :name,  
                address = :address
                WHERE (id = :id)";
            
                $parameters["id"] = $cinema->getId();
                $parameters["name"] = $cinema->getName();
                $parameters["address"] = $cinema->getAddress();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }
        

        
        public function Add(Cinema $cinema)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name, address) VALUES (:name, :address);";
                
                $parameters["name"] = $cinema->getName();
                $parameters["address"] = $cinema->getAddress();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
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
            $cinema->setAddress($result[0]["address"]);

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
                    $cinema->setAddress($row["address"]);

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
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE (id = :id)";

                $parameters["id"] =  $id;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                return $ex->getMessage();
            }
        }

        public function Update($id,$name,$address)
        {
            try
            {               
                $query = "UPDATE " .$this->tableName. " SET name = :name,  
                                                            address = :address 
                                                        WHERE (id = :id)";            

                $parameters["id"] =  $id;
                $parameters["name"] =  $name;
                $parameters["address"] =  $address;

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