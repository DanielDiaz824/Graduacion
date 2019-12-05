<?php
session_start();
include("conexion.php");

$idUsuario = $_SESSION["datosUsuario"]["id"];

$statementLugares = "SELECT(SELECT SUM(lugares) AS lugares FROM usuarios_paquetes WHERE idUsuario =$idUsuario)
                            -(SELECT Count(*) AS resta FROM reservaciones WHERE idUsuario=$idUsuario) AS Resultado";
$resultado = $conexionDB->query($statementLugares);

$lugar = array();
while($fila = mysqli_fetch_assoc($resultado)){
    $lugar[] = $fila;
}

echo json_encode($lugar);
?>