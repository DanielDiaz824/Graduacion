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
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: f1fde3;">
    <a class="navbar-brand" href="#">
    <img src="img/loguillo.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
    <a class="navbar-brand" href="xd.html">Universidad Politecnica de Durango</a>
    </nav>
    <div>
        <h3>Registrarse es primero</h3>
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