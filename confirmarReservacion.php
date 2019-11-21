<?php
    session_start();
    $idUsuario=$_SESSION["datosUsuario"]["id"];
    include("conexion.php");
    $idSilla=$_POST["id_silla"];
    $paquete=$_POST["paquete"];


    $statementr="INSERT INTO reservaciones (id_silla,id_usuario,paquete) VALUES ('$idSilla','$idUsuario','$paquete')";  
    
    $resultado= $conexionBD->query($statementr);
    if($resultado){
        echo "Registro exitoso";
    }
    else{
        echo "Error en el registro :(";
    }
?>