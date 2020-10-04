<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="py-5">
        <section id="listado" class="mb-5">
            <form action="addRegister-action.php" method="POST">
            <div class="container">
                <h3 class="mb-3">Agregar Profile</h3>

                <div class="bg-light p-4 ">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Nombre</label>
                                <input type="text" name="firstName" class="form-control form-control-ml" required>
                            </div>  

                            
                            <div class="col-lg-4">
                                <label for="">Apellido</label>
                                <input type="text" name="lastName" class="form-control form-control-ml" required>
                            </div>

                            <div class="col-lg-4">
                                <label for="">DNI</label>
                                <input type="text" name="dni" class="form-control form-control-ml" required>
                            </div>

                            <div class="col-lg-4">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control form-control-ml" required>
                            </div>

                            <div class="col-lg-4" >
                                <label for="">Password</label>
                                <input type="pasword" name="password" class="form-control form-control-ml" required>                            
                            </div>

                            <!-- <div class="col-lg-4" >
                                <label for="">Password re-entry</label>
                                <input type="pasword" name="password" class="form-control form-control-ml" required>                            
                            </div> -->
                            <div class="col-lg-4">
                                <span>&nbsp;</span>
                                <button type="submit" name="" class="btn btn-primary ml-auto d-block">Agregar</button>
                            </div>

                        </div>                    
                </div>
            </div>
            </form>
        </section>
    </main>
</body>
</html>

