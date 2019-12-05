<?php

    include("conexion.php");
    $usuario=$_POST["usuario"];
    $contrasena=hash("whirlpool",$_POST["contrasena"]);
    $correo=$_POST["correo"];

    $statement="INSERT INTO usuarios (nombre,contrasena,correo) VALUES ('$usuario','$contrasena','$correo')";
    
    $resultado= $conexionBD->query($statement);
    if($resultado){
        header("Location:xd.html");
        
    }
    else{
        echo "Error en el registro :(";
    }
?>