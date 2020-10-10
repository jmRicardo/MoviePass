<?php
    namespace Controllers;

    class ClientController {
        function __construct() {

        }

        function home() {
            require_once(VIEWS_PATH."client-home.php");
        }
    }
?>