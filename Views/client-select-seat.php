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
                                <div>Tickets &nbsp;<div id="CartSummary" class="col-xs-6">0</div></div>
                                <div>Valor &nbsp;<div id="CartSummaryValue" class="col-xs-6">0</div></div>
                            </div> 
                            <h2 id="CartTotalAmount" class="text-right noline top">
                                Total &nbsp; <span id="CartTotalAmountValue">$0.0</span>
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

<script>

    var totalSeats = 0;

    var tickets = document.getElementById("CartSummary");
    
    tickets.innerHTML = totalSeats;

    var value = document.getElementById("CartSummaryValue");

    value.innerHTML = "<?php echo $ticketValue;?>";

    var value = document.getElementById("totalmostrar");

    value.innerHTML = "0";

</script>

<script> 

    function disableBtn(buttonID) {

        if (totalSeats<10)
        {
            totalSeats++;

            var button = document.getElementById(buttonID);

            var tickets = document.getElementById("CartSummary");

            var value = document.getElementById("CartSummaryValue");

            var total = document.getElementById("CartTotalAmountValue");

            tickets.innerHTML = totalSeats;        

            total.innerHTML = totalSeats * "<?php echo $ticketValue;?>";
            
            /* var disabled = document.getElementById(buttonID).disabled;

            document.getElementById(buttonID).disabled = (disabled ? false : true); */
        }
        else
        {
            alert('No se pueden comprar mas de 10 Tickets!');
        }
        
    
    }
</script>




                   
   