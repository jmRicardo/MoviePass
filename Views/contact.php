
<main>
    <form action="<?php echo FRONT_ROOT ?>Contact/SendMail" method="POST" >
        <input type="text" placeholder="name" name="name">
        <input type="email" placeholder="email" name="email">
        <input type="text" placeholder="" name="asunto">
        <textarea placeholder="mensaje" name="msg"></textarea>
        <input type="submit" name="enviar">
    </form>    
</main>

