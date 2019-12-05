<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Sign Up</title>
</head>
<body>
<?php
    include("conexion.php");

    $usuario = $_POST["usuario"];
    $contrasena = hash("whirlpool", $_POST["contrasena"]);
    $email = $_POST["email"];

    $statement = "INSERT INTO usuarios(nombre, contrasena, email) Values
                    ('$usuario', '$contrasena', '$email')";

    $resultado = $conexionDB->query($statement);

    if($resultado){
        echo "<nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light bg-light\">
        <div class=\"collapse navbar-collapse\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"index.html\">Inicio<span class=\"sr-only\">(current)</span></a>
                </li>
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"NavDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"far fa-user-circle\"></i>
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"NavDropdown\">
                        <a class=\"dropdown-item\" href=\"login.php\">
                        <i class=\"fas fa-sign-in-alt\"></i>
                        Iniciar Sesion
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
        
        <br><br><br>
        <section class=\"container\">
            <section class=\"row\">
                <div class=\"col-md-4\"></div>
                <div class=\"col-md-4\">
                    <div class=\"jumbotron\">
                        <h2 class=\"display-5\">Registro exitoso</h2>
                        <a type=\"button\" href=\"login.php\" class=\"btn btn-primary\">Login</a>
                    </div>
                </div>
                <div class=\"col-md-4\"></div>
            </section>
        </section>";
    }
    else{
        echo "<nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light bg-light\">
        <a class=\"navbar-brand\" href=\"#\">
            <img src=\"img/cintillo-web.png\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">
        </a>
        <div class=\"collapse navbar-collapse\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"index.html\">Home<span class=\"sr-only\">(current)</span></a>
                </li>
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"NavDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"far fa-user-circle\"></i>
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"NavDropdown\">
                        <a class=\"dropdown-item\" href=\"login.php\">Login</a>
                        <a class=\"dropdown-item\" href=\"registro.php\">Sign Up</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
        
        <br><br><br>
        <section class=\"container\">
            <section class=\"row\">
                <div class=\"col-md-4\"></div>
                <div class=\"col-md-4\">
                    <div class=\"jumbotron\">
                        <h2 class=\"display-5\">Usuario Existente</h2>
                        <a type=\"button\" href=\"registro.php\" class=\"btn btn-primary\">Login</a>
                    </div>
                </div>
                <div class=\"col-md-4\"></div>
            </section>
        </section>";
    }
?>
</body>
</html>