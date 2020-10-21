<?php
    namespace Controllers;

    use Models\Cinema as Cinema;
    use Models\Movie as Movie;
    use Models\Room as Room;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\MovieDAO as MovieDAO;
    use DAO\RoomDAO;

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
            $duplicates = $this->movieDAO->NowPlayingToDataBase();

            $this->ShowAddView("Actualizacion Realizada! " . $duplicates . " Elementos duplicados!");
        }

        public function ShowAddView($message = "")
        {
            require_once(VIEWS_PATH."admin-cinema-add.php");
        }

        public function ShowListView()
        {
            $cinemaList = $this->cinemaDAO->GetAll();

            require_once(VIEWS_PATH."admin-cinema-list.php");
        }

        public function Add($name,$address)
        {
            $cinema = new Cinema();
            $cinema->setName($name);
            $cinema->setAddress($address);

            $this->cinemaDAO->Add($cinema);

            $this->ShowAddView();
        }
        
        public function Remove($id)
        {
            
            $this->cinemaDAO->Remove($id);

            $this->ShowListView();
        }

        public function Update($id)
        {
            
            $cinema = $this->cinemaDAO->GetCinema($id);

            require_once(VIEWS_PATH."admin-cinema-update.php");
        }

        public function AddRoom($name,$price,$capacity,$id)
        {                                
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
            
            $cinema = $this->cinemaDAO->GetCinema($id);

            require_once(VIEWS_PATH."admin-cinema-addrooms.php");
        }

        public function SaveUpdate($name,$address,$id)
        {
            
            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setName($name);
            $cinema->setAddress($address);

            $this->cinemaDAO->UpdateCinema($cinema); 
            
            $this->ShowListView();
        }
    }
