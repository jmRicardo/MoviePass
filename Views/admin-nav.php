<nav class="navbar navbar-expand-lg  navbar-dark bg-dark admin-nav">
     <span class="navbar-text">
          <strong>MoviePass - MODO ADMINISTRADOR</strong>
     </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <?php  if (isset($message)) {echo $message;}?>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/NowPlaying">Actualizar BD</a>
          </li>          
          <!-- <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowAddView">Agregar Funcion</a>
          </li> -->
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowAddView">Agregar Cines</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowListView">Listar Cines</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Client/Home">Volver a Inicio</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Home/LogOut">Desconectarse</a>
          </li>           
     </ul>
</nav>
<div class="content-container"> <!-- abro div contenedor -->
