<?php
    namespace Process;

    require_once("../Config/Autoload.php");

    use Config\Autoload as Autoload;

    use Repositories\ProfileRepository as ProfileRepository;
    use Repositories\UserRepository as UserRepository;

    use Models\Profile as Profile;
    use Models\User as User;

    $repoParaMostrar = new UserRepository();
    $listUser = $repoParaMostrar-> getAll();

    //contador de Id
    if($listUser == null){
        $counter = 1;
    }
    foreach($listUser as $user){
        $counter = $user->getIdUser() + 1;
    } 

    $idProfile = rand (1,10000000);
    
    if($_POST){

        $newProfile = new Profile($idProfile,$_POST['firstName'],$_POST['lastName'],$_POST['dni']);
        $repo = new ProfileRepository();
        $repo->add($newProfile);

        $newUser = new User($counter,$idProfile,$_POST['email'],$_POST['password']);
        $repo = new UserRepository();
        $repo->add($newUser);


        echo "<script> alert('Estudiante agregado con Exito!');";  
	    echo "window.location = '../index.html'; </script>";
    }


?>