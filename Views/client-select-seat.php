<?php
    require_once(VIEWS_PATH . "client-nav.php");
    
?>

<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <?php require_once(VIEWS_PATH . "client-seat-list.php"); ?>
        </div>
        <div class="col-lg-5">
            <div class="cine-box">
                    <div class="cine-header">   
                        <h3 class="movie-name">Pinocho</h3>
                        <span class="dateTime">Sunday, October 25 at 4:30 pm</span>
                        <div>
                            <span>Cinema Center</span>
                            <span>Santiago del estero 3047</span>
                            <span>Sala 2</span>
                        </div>
                        <div class="price-row">
                            <div>
                                <div id="CartSummary" class="col-xs-6">3 Tickets</div>
                                <div id="CartSummaryValue" class="col-xs-6">$30.00</div>
                            </div> 
                            <h2 id="CartTotalAmount" class="text-right noline top">
                                Total &nbsp; <span id="CartTotalAmountValue">$37.71</span>
                            </h2>
                        </div>
                        <a id="movie-id">
                            <button type="submit" class="btn btn-success" id="movie-reservation">Confirmar Reserva</button>
                        </a>
                 </div>
            </div>
        </div>
    </div>
</div>



                   
   