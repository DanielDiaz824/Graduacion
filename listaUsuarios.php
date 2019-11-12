<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
<?php
    include("conexion.php");
    $sentencia="SELECT nombre,contrasena,correo,lugares FROM usuarios";
    $resultado=$conexionBD->query($sentencia);

    $usuarios=array();
    while($fila=mysqli_fetch_assoc($resultado)){
        $usuarios[]=$fila;
    }
    echo "<table class=\"table table-striped\">
    <tr>
    <th>Nombre</th>
    <th>Contraseña</th>
    <th>Correo</th>
    <th>Lugares reservados</th>
    </tr>";

    foreach($usuarios as $usuario){

        $nombre=$usuario["nombre"];
        $contrasena=$usuario["contrasena"];
        $correo=$usuario["correo"];
        $lugares=$usuario["lugares"];
        
        echo"<tr>
        <td>$nombre</td>
        <td>$contrasena</td>
        <td>$correo</td>
        <td>$lugares</td>
        </tr>";
    }
    echo"</table>";
?>
</body>
</html>
