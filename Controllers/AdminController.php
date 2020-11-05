<?php
    namespace Controllers;

    use Models\Cinema as Cinema;
    use Models\Movie as Movie;
    use Models\Room as Room;
    use Models\Date as Date;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\DateDAO as DateDAO;
    use DAO\MovieDAO as MovieDAO;
    use DAO\RoomDAO as RoomDAO;

    use Utils\Util;

    class AdminController
    {
        private $cinemaDAO;
        private $movieDAO;
        private $roomDAO;
        private $dateDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
            $this->movieDAO = new MovieDAO();
            $this->roomDAO = new RoomDAO();
            $this->dateDAO = new DateDAO();
        }

        public function FilterByDate()
        {
            Util::loggedInRedirect();

            $movies=$this->movieDAO->GetAll();
            $cinemas=$this->cinemaDAO->GetAll();
            
            require_once(ADMIN_PATH."admin-filter-date.php");
        }

        public function ResultFilterByDate($idMovie,$cinema,$start,$end)
        {            
            $result = $this->movieDAO->GetTotalByDate($idMovie,$cinema,$start,$end);
            
            var_dump($result);
        }

        public function NowPlaying()
        {
            Util::loggedInRedirect();
            
            $error = $this->movieDAO->NowPlayingToDataBase();

            $this->movieDAO->UpdateMoviesRunTime();

            $_SESSION['message'] = "Actualizacion Realizada! " . (isset($error) ? $error : "" );

            $this->ShowCinemaList();
        }

        public function ShowCinemaList()
        {   
            Util::loggedInRedirect();
            
            $cinemaList = $this->cinemaDAO->GetAll();

            require_once(ADMIN_PATH."admin-add.php");
        }

        public function Add($name, $address)
        {
            Util::loggedInRedirect();
            
            $cinema = new Cinema();
            $cinema->setName($name);
            $cinema->setAddress($address);

            require_once(PROCESS_PATH."cinema-process.php");

        }
        
        public function Remove($id)
        {            
            Util::loggedInRedirect();
            
            $error = $this->cinemaDAO->Remove($id);

            $_SESSION['message'] = isset($error) ? "No se puede eliminar un Cine con salas y funciones activas!" : "Cine eliminado con exito!";

            $this->ShowCinemaList();
        }

        public function Update($id)
        {
            Util::loggedInRedirect();
            
            $cinema = $this->cinemaDAO->GetCinema($id);            

            require_once(ADMIN_PATH."admin-update.php");
        }

        public function SaveUpdate($name, $address, $id)
        {
            Util::loggedInRedirect();

            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setName($name);
            $cinema->setAddress($address);

            require_once(PROCESS_PATH."update-cinema-process.php");
        }

        // de aca empiezan los metodos que controlan las SALAS

        public function RemoveRoom($idRoom2)
        {   
            
            Util::loggedInRedirect();
            $cinemaObject = $this->roomDAO->GetCinemaByRoom($idRoom2);
            
            $error = $this->roomDAO->RemoveRoom($idRoom2);

            $_SESSION['message'] = isset($error) ? "No se puede eliminar una Sala con funcione cargadas!" : "Sala eliminada!";
            
            $this->ShowAddRoom($cinemaObject->getId());
            
        }

        public function AddRoom($name,$price,$capacity,$id)
        {                                
            Util::loggedInRedirect();
            
            $room = new Room();
            $room->setIdCinema($id);
            $room->setName($name);
            $room->setCapacity($capacity);
            $room->setPrice($price);

            require_once(PROCESS_PATH."room-process.php");
        }


        public function ShowAddRoom($id)
        {
            Util::loggedInRedirect();            
            
            $cinema = $this->cinemaDAO->GetCinema($id);
            $listId = $this->roomDAO->GetAllByCinema($id);

            require_once(ADMIN_PATH."admin-addrooms.php");
        }

        //aca empiezan las funciones de administrar Funciones

        public function ShowDates($idRoom2)
        {
            
            $thisRoom = $this->roomDAO->GetRoom($idRoom2);
            $cinemaObject = $this->roomDAO->GetCinemaByRoom($idRoom2);
            
            Util::loggedInRedirect();

            $movies=$this->movieDAO->GetAll();
            
            $listDate = $this->dateDAO->GetDatesByRoom($idRoom2);
            

            require_once(ADMIN_PATH."admin-add-dates.php");
            
        }
    
        public function AddDate($idRoom,$idMovie,$date,$time)
        {            
            $dateTime = $date." ".$time.":00";
            
            $dateObject = new Date();
            $dateObject->setDate($dateTime);
            $dateObject->setIdRoom($idRoom);
            $dateObject->setIdMovie($idMovie);

            require_once(PROCESS_PATH."date-process.php");
        }

        public function ShowCinemaByTicketSold(){

            $cinemaList = $this->cinemaDAO->GetAll();

            require_once(ADMIN_PATH."admin-ticket-sold.php");
        }

        public function ShowRoomByTicketSold($idRoom){
            
            $thisRoom = $this->roomDAO->GetAllByCinema($idRoom);;
            var_dump($thisRoom);
            // exit();
            require_once(ADMIN_PATH."admin-ticket-sold-room.php");
        }

    }

?>
