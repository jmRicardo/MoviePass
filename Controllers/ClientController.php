<?php
    namespace Controllers;
    use DAO\MovieDAO;

    class ClientController {
        private $movieDao;

        function __construct() {
            $this->movieDao= new MovieDAO();
        }
        
        function Home($message = "") {
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."client-home.php");
        }

        function Account() {
            require_once(VIEWS_PATH."myaccount.php");
        }

        function Select() {
            $idGenre = 0;
            $genres=$this->movieDao->GetActiveGenres();
            $movies=$this->movieDao->GetAll();
            require_once(VIEWS_PATH."select-movie.php");
        }

        function Filter($idGenre){
            $genres=$this->movieDao->GetActiveGenres();
            $movies=$this->movieDao->GetMoviesByGenre($idGenre);
            require_once(VIEWS_PATH."select-movie.php");
        }
        
        function SendMail(){
            // echo "skljdf";
            // var_dump($_POST);
            // exit();
            // array (size=4)
            // 'name' => string 'Guillermo Mainini' (length=17)
            // 'email' => string 'guimainini@gmail.com' (length=20)
            // 'msg' => string 'putos el q le' (length=13)
            // 'enviar' => string 'Enviar' (length=6)
            if(isset($_POST['enviar'])){
                if(!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['name'])){
                    
                    $name = $_POST['name'];
                    $asunto = $_POST['asunto'];
                    $msg = $_POST['msg'];
                    $email = $_POST['email'];
                    $header = "$name"."$email". "\r\n".
                    'X-Mailer: PHP/' . phpversion();
                    mail("guimainini@gmail.com", $asunto, $msg, $header);
                    // if($mail){
                    //     echo "<h4>Mail enviado exitosamente</h4>";
            
                    // }
                    
                }
            }
            
            header("Location:../index.php ") ;
            // header("Location: FRONT_ROOT ") ;
        }
        

    }

?>