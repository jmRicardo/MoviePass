<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>estilos_contact.css"> 
    <title>Mail Form</title>
</head>
<body>
    <form action="<?php echo FRONT_ROOT ?>Contact/SendMail" method="POST" >
        <input type="text" placeholder="name" name="name">
        <input type="email" placeholder="email" name="email">
        <input type="text" placeholder="" name="asunto">
        <textarea placeholder="mensaje" name="msg"></textarea>
        <input type="submit" name="enviar">
    </form>    

</body>
</html>