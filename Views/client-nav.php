<?php use DAO\UserDAO;?>

<nav class="navbar navbar-expand-lg  navbar-dark nav-client">
   <a  href="<?php echo FRONT_ROOT ?>client/home"><img src="<?php

        echo FRONT_ROOT . VIEWS_PATH ?>img/logo.png" alt="" width="170" height="60">
   </a>
    <ul class="navbar-nav ml-auto">

        <?php if (UserDAO::isAdmin()) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowAddView">MODO ADMIN</a>
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
                <a class="dropdown-item" href="#"><i class="fa fa-ticket" aria-hidden="true"></i>
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
        <i class="fa fa-user-o" aria-hidden="true"></i>
        <?php else: ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>Login/SignIn">Iniciar sesión</a>
        </li>
        <?php endif; ?>
    </ul>

</nav>