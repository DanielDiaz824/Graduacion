<?php
session_start();
include("conexion.php");

$idUsuario = $_SESSION["datosUsuario"]["id"];
$idSilla = $_POST["silla"];
$paquete = $_POST["paquete"];

$statementPaquete = "SELECT(SELECT lugares FROM usuarios_paquetes WHERE paquete = $paquete AND idUsuario = $idUsuario)
                     -(SELECT COUNT(*) FROM reservaciones WHERE paquete = $paquete AND idUsuario = $idUsuario) as Resultado";

$resultadoPaquete = $conexionDB ->query($statementPaquete);

if(mysqli_num_rows($resultadoPaquete)>0){
    $fila = $resultadoPaquete->fetch_array(MYSQLI_ASSOC);
    $_SESSION["paquete"] = $fila["Resultado"];
}


$Lugares = $_SESSION["paquete"];

if($Lugares != 0){
    $statement = "INSERT INTO reservaciones (idSilla,idUsuario,paquete) VALUES ('$idSilla','$idUsuario','$paquete')";
    $resultado = $conexionDB ->query($statement);
     
    if($resultado){
        echo "Registro exitoso";
    }
    else{
        echo "Error";
    }
}

?>