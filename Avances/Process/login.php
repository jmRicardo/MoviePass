<?php
    namespace Process;

    require_once("../Config/Autoload.php");
    
    use Repositories\UserRepository as UserRepository;
    use Models\User as User;

    $repoUser = new UserRepository();
    $listaUser = $repoUser->getAll();
    // var_dump($listaUser);
    // exit;

    //$user = NULL;
    if($_POST){
        foreach ( $listaUser as $key => $value ) {
            if($_POST['email'] == $value->getEmail()){
                if($_POST['pass'] == $value->getPassword()){
                    
                    session_start();

                    // $newUser = new User();
                    // $newUser->setEmail($_POST['email']);
                    // $newUser->setPassword($_POST['pass']);
                    
                    $_SESSION["newUser"] = $value->getEmail();

                    header("location:selecMovie.php");
                
                }else{
                echo "<script> if(confirm('Verifique que el password sea correctos'));";
	            echo "window.location = '../index.html';
                </script>";
            }
        }else{
            echo "<script> if(confirm('Verifique que el email sea correctos'));";
	        echo "window.location = '../index.html';
            </script>";
        }
    }

}






?>