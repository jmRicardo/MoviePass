<div class="modal fade" id="sendMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="sendMail" name="sendMail" method="POST" action="<?php echo FRONT_ROOT?>Client/SendMail" >
            <div class="modal-header">
              <h5 class="modal-title text-primary " id="exampleModalLabel">Escribanos su consulta</h5>
            </div>
            <div class="modal-body">
                  <label for="recipient-name" class="col-form-label text-primary">Introduzca su nombre y mail asi nos comunicaremos con usted!!!</label>
                  <input type="text" placeholder="Nombre" class="form-control" name="name">
                  <input type="email" placeholder="ejemplo@email.com" class="form-control" name="email">
                <div class="form-group">
                  <label for="message-text" class="col-form-label text-primary">Mensaje:</label>
                  <textarea placeholder="mensaje"class="form-control" name="msg"></textarea>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
            </div>
      </form>  
    </div>
  </div>
</div>