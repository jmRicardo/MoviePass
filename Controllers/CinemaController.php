<?php
    namespace Controllers;

    use Models\Cinema as Cinema;
    use DAO\CinemaDAO as CinemaDAO;

    class CinemaController
    {
        private $cinemaDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."cinema-add.php");
        }

        public function ShowListView()
        {
            $cinemaList = $this->cinemaDAO->GetAll();

            require_once(VIEWS_PATH."cinema-list.php");
        }

        public function Add($name,$total_capacity,$address,$ticket_value)
        {
            $cinema = new Cinema();
            $cinema->setName($name);
            $cinema->setTotal_capacity($total_capacity);
            $cinema->setAddress($address);
            $cinema->setTicket_value($ticket_value);

            $this->cinemaDAO->Add($cinema);

            $this->ShowAddView();
        }
        
        public function Remove($id)
        {
            
            $this->cinemaDAO->Remove($id);

            $this->ShowListView();
        }
    }
?>