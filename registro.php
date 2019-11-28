<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/main.css"/>

    <style>
    .form-group{
        padding:15px;
    }
    </style>
    
        
    
</head>
<body>
    <div>
        <h1>Registrarse es primero</h1>
    </div>
    <section class="row">
        <div class="col-md-6">
            <form action="registroProceso.php" method="POST">
                <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" name ="usuario">
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" name ="contrasena">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name ="correo">
                </div>
                <button class="btn btn-primary">Registrarse</button>
             </form>
        </div>
</section>  
    
</body>
</html>