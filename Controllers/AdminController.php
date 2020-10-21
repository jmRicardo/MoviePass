<?php
    namespace Controllers;

    use Models\Cinema as Cinema;
    use Models\Movie as Movie;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\MovieDAO as MovieDAO;


    class AdminController
    {
        private $cinemaDAO;
        private $movieDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
            $this->movieDAO = new MovieDAO();
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

        public function AddRooms($id)
        {
            
            $cinema = $this->cinemaDAO->GetCinema($id);

            require_once(VIEWS_PATH."admin-cinema-AddRooms.php");
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
?>