<nav class="navbar navbar-expand-lg  navbar-dark nav-client">
    <img src="<?php echo FRONT_ROOT.VIEWS_PATH ?>img/logo.png" alt="" width="170" height="60">
     <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="peliculasDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Películas
            </a>
            <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="peliculasDropdown">
                
                <a class="dropdown-item" href="#">En cartelera</a>
                <a class="dropdown-item" href="#">Próximamente</a>

            </div>
        </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowListView">Mis reservas</a>
          </li> 
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
            </a>
            <div class="dropdown-menu  dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="icon-option">Perfil</span>
                </a>
                <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Home/LogOut"><i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span class="icon-option">Salir</span>
                </a>
            </div>
        </li>     
     </ul>
     <i class="fa fa-user-o" aria-hidden="true"></i>
</nav>