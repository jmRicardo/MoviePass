<?php
    require_once("client-nav.php");  
?>
<div class="container">
    <div class="row">
        <div class="col-lg-7 pa">
            <?php require_once(CLIENT_PATH . "client-seat-list.php"); ?>
        </div>
        <div class="col-lg-5">
            <div class="cine-box">
                    <div class="box-price">  
                        <?php 
                        date_default_timezone_set("America/Argentina/Buenos_Aires");
                        setlocale(LC_TIME,"spanish");
                        $day= new DateTime($date->getdate());
                         
                         $cDay= $day->format("\n l, jS F Y g:i A");           
                        ?> 
                        <h3 class="movie-name"><?php echo $movie->getTitle(); ?></h3>
                        <hr class="divider">
                        <span><?php echo strftime("%A, %d de %B del %Y a las %H:%M ", $day->getTimestamp()); ?></span>
                        <hr class="divider">
                        <div>
                            <span><?php echo $cine->getName(); ?></span> <br>
                            <span><?php echo $cine->getAddress(); ?></span> <br>
                            <span>Sala <?php echo $idDate ?></span> <br>
                            
                        </div> 
                        <hr class="divider">
                        <div class="price-row">
                            <div class="row">
                                <div class="col-lg-6">Tickets</div>
                                <div id="CartSummary" class="col-lg-6 cart-summary">0</div>
                            </div>
                            <hr class="divider">
                            <div class="row">
                                <div class="col-lg-6">Valor</div>
                                <div id="CartSummaryValue" class="col-lg-6 cart-summary">0</div>
                            </div>
                            <hr class="divider"> 
                            <div class="cart-amount">
                                <h2 id="CartTotalAmount">Total $<span id="CartTotalAmountValue">0.0</span></h2> 
                               
                            </div>
                        <hr class="divider">
                        </div>
                        <div class="confirmed-reservation">
                            <button id="movie-id" onclick="sendData();" type="submit" class="btn btn-success" id="movie-reservation">Confirmar Reserva</button>
                        </div>
                       
                 </div>
            </div>
        </div>
    </div>
</div>

<script>

    var array = [];
    var loggedIn = <?php if (isset($_SESSION['is_logged_in'])) echo "true"; else echo "false"; ?>;

    function sendData()
    {
        if (loggedIn) {
            if (array.length) {
                $("#movie-id").attr("disabled", "true");
                window.location.href = "<?php echo FRONT_ROOT ?>Client/Checkout/" + array + "/<?php  echo $idDate; ?>" ;
            }else{
                alert('Debes seleccionar un asiento');
            }
        } else {
            $("#sectionStart").modal("show");
        }
        
    }

    var totalSeats = 0;

    var tickets = document.getElementById("CartSummary");
    
    tickets.innerHTML = totalSeats;

    var value = document.getElementById("CartSummaryValue");

    value.innerHTML = "<?php echo $ticketValue;?>";

    var value = document.getElementById("totalmostrar");

    value.innerHTML = "0";

    function changeSeat(buttonID) {

        var img = document.getElementById(buttonID +"IMG");
        
        var button = document.getElementById(buttonID);
        
        if (array.indexOf(button.value) === -1)
            array.push(button.value);
        else
            array = array.filter(function(value) {
                return value !== button.value;
            });

        var status = ( img.alt == "false" ? false : true );

        if (totalSeats<10 || status )
        {
            if (!status)
            {
                img.src = "<?php echo IMG_PATH."seat-clicked.png"?>";
                img.alt = "true";
                totalSeats++;
            }
            else
            {
                img.src = "<?php echo IMG_PATH."seat.png"?>";
                img.alt = "false";
                totalSeats--;
            }          

            var button = document.getElementById(buttonID);

            var tickets = document.getElementById("CartSummary");

            var total = document.getElementById("CartTotalAmountValue");

            tickets.innerHTML = totalSeats;        

            total.innerHTML = totalSeats * "<?php echo $ticketValue;?>";  
            console.log(array);       
        }   
        else
        {
            alert('No se pueden comprar mas de 10 Tickets!');
        }
    }

</script>





                   
   