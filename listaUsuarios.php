<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<?php

include("conexion.php");

$sentencia = "SELECT nombre, email, contrasena, lugares FROM usuarios";
$resultado = $conexionDB->query($sentencia);

$usuarios = array();

while($fila = mysqli_fetch_assoc($resultado)){
$usuarios[]=$fila;
}

echo "<table class = \"table table-striped\">
        <tr>
            <th>Nombres</th>
            <th>Correos</th>
            <th>Contraseñas</th>
            <th>Lugares reservados</th>
        </tr>";

foreach($usuarios AS $usuario){
    $nombre = $usuario["nombre"];
    $correo = $usuario["email"];
    $contraseña = $usuario["contrasena"];
    $lugar = $usuario["lugares"];
    echo "<tr>
            <td>$nombre</td>
            <td>$correo</td>
            <td>$contraseña</td>
            <td>$lugar</td>
        </tr>";
}
echo "</table>";

//var_dump($usuarios);


?>    
</body>
</html>
