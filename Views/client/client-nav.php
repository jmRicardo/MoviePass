<?php 
    use DAO\UserDAO;
    use Utils\Util as Util;
?>

<nav class="navbar navbar-expand-lg  navbar-dark nav-client">
   <a  href="<?php echo FRONT_ROOT ?>client/home"><img src="<?php
        echo FRONT_ROOT . VIEWS_PATH ?>img/logo.png" alt="" width="170" height="60">
   </a>


   <!-- <ul class="navbar-nav mr-auto">
    <?php if (!Util::isAdmin()) : ?>
            <li class="nav-item">
            
                <a type="button" class="nav-link" data-toggle="modal" data-target="#sendMail" data-whatever="@fat">@Contactenos</a>    
            </li>
    <?php endif; ?>
   </ul> -->

    <ul class="navbar-nav ml-auto">
        <li>
        
            <form action="<?php echo FRONT_ROOT ?>Client/SearchMovie" data-toggle="modal" data-target="#searchMovie" method="post" target="_blank">
            <input type="search" name="busquedamodelos" list="listamodelos" required>
            <!-- <a  type="button" data-toggle="modal" data-target="#searchMovie">Buscar</a>         -->
            
            </form>
                <datalist id="listamodelos">

                <?php foreach($movies as $movie){?>
                    <option >
                        <?php echo $movie->getTitle();?>
                    </option>
                <?php } ?>            
            </datalist>
            
        </li>
        <?php if (Util::isAdmin()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowCinemaList">MODO ADMIN</a>
            </li>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT?>Client/Select">Peliculas</a>
        </li>
        <?php if (isset($_SESSION['is_logged_in'])) : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Usuario
            </a>
            <div class="dropdown-menu  dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Client/Reservations"><i class="fa fa-ticket" aria-hidden="true"></i>
                    <span class="icon-option">Mis reservas</span>
                </a>
                <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Client/Account"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="icon-option">Perfil</span>
                </a>
                <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Home/LogOut"><i class="fa fa-sign-out"
                        aria-hidden="true"></i>
                    <span class="icon-option">Salir</span>
                </a>
            </div>
        </li>
        
       <img src="<?php echo FRONT_ROOT . VIEWS_PATH ?>img/oveja.png" alt="" width="40" height="40">
        <?php else: ?>
            <li class="nav-item">
                <a id="algo" class="nav-link"  type="button" data-toggle="modal" data-target="#sectionStart" >Iniciar sesión</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<div class="content-container"> <!-- abro diV contenedor -->

