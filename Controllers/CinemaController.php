<?php

    namespace Controllers;

    class CinemaController {

        public function __construct()
        {
           
        }

        public function CinemaProcess() {
            require_once(PROCESS_PATH."cinema-process.php");
        }

    }
   
?>