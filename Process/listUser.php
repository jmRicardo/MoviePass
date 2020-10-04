<?php
session_start();
empty($_SESSION["usuarioNuevo"]) && header("location:index.php");
require_once("../Config/Autoload.php");

use Repositories\ProfileRepository as ProfileRepository;
use Repositories\UserRepository as UserRepository;

use Models\Profile as Profile;
use Models\User as User;

$repoParaMostrarUser = new UserRepository();
$listUser = $repoParaMostrarUser-> getAll();
$repoParaMostrarProfile = new ProfileRepository();
$listProfile = $repoParaMostrarProfile-> getAll();

?>

<main class="py-5">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Libros</h2>

            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dni</th>
                </thead>
                    <tbody>
                        <?php foreach($listUser as $user){ ?>
                            <tr>
                                <td><?php echo $user->getEmail(); ?></td>
                                <td><?php echo $user->getPassword(); ?></td>
                            </tr> 
                        <?php } ?>
                        <?php foreach($listProfile as $profile){ ?>
                            <tr>
                                <td><?php echo $profile->getFirstName(); ?></td>
                                <td><?php echo $profile->getLastName(); ?></td>
                                <td><?php echo $profile->getDni(); ?></td>
                            </tr> 
                        <?php } ?>                            
                    </tbody>
            </table>
        </div>
    </section>
</main>