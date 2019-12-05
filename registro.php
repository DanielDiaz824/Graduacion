<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">

    <style>
        body{
          background: url(img/fondo_inicio.jpg);
        }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light bg-light">
        <div class="collapse navbar-collapse" id="NavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Inicio<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="container">
        <div class="row">
            <section class="col-md-12 col-sm-12" id="Info">
                <div class="jumbotron">
                    <h1 class="display-4">Registro</h1>
                    <form action="registroProceso.php" method="POST" class="form">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="usuario" aria-label="usuario" aria-describedby="basic-addon1" name="usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="contrasena" aria-label="contrasena" aria-describedby="basic-addon1" name="contrasena">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1" name="email">
                            </div>
                        </div>

                        <button class="btn btn-dark">Registrarse</button>
                        <a type="button" href="login.php" class="btn btn-dark">Login</a>
                    </form>
                    <hr class="my-2">
                </div>
            </section>
        </div>
    </section>
</body>
</html>