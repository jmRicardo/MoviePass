<?php
    namespace Controllers;

    use Models\Cinema as Cinema;
    use Models\Movie as Movie;
    use Models\Room as Room;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\MovieDAO as MovieDAO;
    use DAO\RoomDAO as RoomDAO;

    use Utils\Util;

    class AdminController
    {
        private $cinemaDAO;
        private $movieDAO;
        private $roomDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
            $this->movieDAO = new MovieDAO();
            $this->roomDAO = new RoomDAO();
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

            require_once(VIEWS_PATH."admin-cinema-add.php");
        }

        public function Add($name,$address)
        {
            Util::loggedInRedirect();
            
            $cinema = new Cinema();
            $cinema->setName($name);
            $cinema->setAddress($address);

            $this->cinemaDAO->Add($cinema);

            $_SESSION['message'] = "Cine agregado con exito!";

            $this->ShowCinemaList();
        }
        
        public function Remove($id)
        {            
            Util::loggedInRedirect();
            
            $error = $this->cinemaDAO->Remove($id);

            $_SESSION['message'] = isset($error) ? $error : "Cine eliminado con exito!";

            $this->ShowCinemaList();
        }

        public function Update($id)
        {
            Util::loggedInRedirect();
            
            $cinema = $this->cinemaDAO->GetCinema($id);            

            require_once(VIEWS_PATH."admin-cinema-update.php");
        }

        public function SaveUpdate($name,$address,$id)
        {
            Util::loggedInRedirect();

            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setName($name);
            $cinema->setAddress($address);

            $error =  $this->cinemaDAO->UpdateCinema($cinema); 

            $_SESSION['message'] = isset($error) ? $error : "Cine actualizado con exito!";
            
            $this->ShowCinemaList();
        }

        // de aca empiezan los metodos que controlan las SALAS

        public function RemoveRoom($id, $idRoom)
        {   
            Util::loggedInRedirect();
            
            $this->roomDAO->RemoveRoom($idRoom);
            
            $this->ShowAddRoom($id);
            
        }

        public function AddRoom($name,$price,$capacity,$id)
        {                                
            Util::loggedInRedirect();
            
            $room = new Room();
            $room->setIdCinema($id);
            $room->setName($name);
            $room->setCapacity($capacity);
            $room->setPrice($price);

            $_SESSION['message'] = $this->roomDAO->Add($room);           

            $this->ShowAddRoom($id);
        }


        public function ShowAddRoom($id)
        {
            Util::loggedInRedirect();            
            
            $cinema = $this->cinemaDAO->GetCinema($id);
            $listId = $this->roomDAO->GetAllByCinema($id);

            require_once(VIEWS_PATH."admin-cinema-addRooms.php");
        }

        //aca empiezan las funciones de administrar Funciones

        public function ShowDates()
        {
            Util::loggedInRedirect();
            $movies=$this->movieDAO->GetAll();
            $listRooms=$this->roomDAO->GetAll();
            $listCinema=$this->cinemaDAO->GetAll();

            require_once(VIEWS_PATH."admin-cinema-add-dates.php");
            
        }

    }

?>
