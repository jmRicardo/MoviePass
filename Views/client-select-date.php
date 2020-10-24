<?php
    require_once(VIEWS_PATH . "client-nav.php");
?>
<div class="container"> 
    <ul class="nav nav-tabs day-selector">
        <li class="nav-item day-item">
            <a class="nav-link day-link selected-day active " href="#">Lunes</a>
        </li>
        <li class="nav-item day-item">
            <a class="nav-link day-link" href="#">Martes</a>
        </li>
        <li class="nav-item day-item">
            <a class="nav-link day-link" href="#">Miercoles</a>
        </li>
        <li class="nav-item day-item">
            <a class="nav-link day-link" href="#">Jueves</a>
        </li>
        <li class="nav-item day-item">
            <a class="nav-link day-link" href="#">Viernes</a>
        </li>
        <li class="nav-item day-item">
            <a class="nav-link day-link" href="#">Sabado</a>
        </li>
        <li class="nav-item day-item">
            <a class="nav-link day-link" href="#">Domingo</a>
        </li>
    </ul>
    <div class="row">  
        <div class="col-lg-4">
            <div class="cine-box">
                <div class="cine-header">
                    <h3 class="cine-name">Cines del paseo</h3>
                    <span>Santiago del estero 2020</span>
                </div>
                <div class="cine-times">
                    <button type="button" class="btn btn-warning cine-time">05:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">10:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cine-box">
                <div class="cine-header">
                    <h3 class="cine-name">Pompas</h3>
                    <span>Rivadavia 20527</span>
                </div>
                <div class="cine-times">
                    <button type="button" class="btn btn-warning cine-time">05:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                    <button type="button" class="btn btn-warning cine-time">06:30 pm</button>
                </div>
            </div>
        </div>
    </div>
</div>