<?php 
    use Utils\Util as Util;

    require_once(LOGIN_PATH . "login-signin.php");
    require_once(LOGIN_PATH . "login-signup.php");
?>

<nav class="navbar navbar-expand-lg  navbar-dark nav-client">
   <a  href="<?php echo FRONT_ROOT ?>client/home"><img src="<?php
        echo FRONT_ROOT . VIEWS_PATH ?>img/logo.png" alt="" width="170" height="60">
   </a>
   
    <ul class="navbar-nav ml-auto">
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
        
       <img class="rounded-circle" 
            src="<?php 
                if (isset($_SESSION['user_info']['avatar'])) 
                {
                    echo "data:image/png;charset=utf8;base64," . base64_encode(stripslashes($_SESSION['user_info']['avatar'])) ;
                }
                else 
                { echo IMG_PATH . "oveja.png";}
                ; ?>" alt="" width="64" height="64">
        <?php else: ?>
            <li class="nav-item">
                <a id="algo" class="nav-link"  type="button" data-toggle="modal" data-target="#sectionStart" >Iniciar sesión</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?php
    require_once(UTILS_PATH . "MessageBox.php");
?>
<!-- abro div contenedor -->
<div class="content-container"> 



