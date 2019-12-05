<?php
session_start();
$idUsuario = $_SESSION["datosUsuario"]["id"];

include("conexion.php");
$mesas = "";

$plantillaMesa = file_get_contents("templates/mesa.html");
$plantillaSilla = file_get_contents("templates/silla.html");

$statementMesas = "SELECT Id, numero
                   FROM mesas";
$resultadoMesas = $conexionDB->query($statementMesas);

foreach($resultadoMesas as $fila){
    $sillas = "";
    $idMesa = $fila["Id"];

    $statementSillas = "SELECT S.id, S.posicion, R.paquete, U.nombre
                        FROM sillas S
                        LEFT JOIN reservaciones R ON R.idSilla = S.id
                        LEFT JOIN usuarios U ON U.id = R.idUsuario
                        WHERE idMesa = $idMesa";
    $resultadoSillas = $conexionDB->query($statementSillas);

    foreach($resultadoSillas as $fila){
        $idSilla = $fila["id"];
        $nombre = $fila["nombre"];

        $paqueteVal = $fila["paquete"];

        if($paqueteVal==1){
            $paquete = "Basico";
        }elseif($paqueteVal==2){
            $paquete = "Medio";
        }elseif($paqueteVal==3){
            $paquete = "Premium";
        }

        $posicion = $fila["posicion"];
        $reservada = $fila["paquete"] ? "silla-reservada" : "";
        $mensaje = $nombre ? "title=\"Esta silla ya la tiene $nombre y el paquete es $paquete!\"" : "";

        $sillas .=  sprintf($plantillaSilla, $posicion, $reservada, $mensaje, $idSilla);
    }
    $mesas .= sprintf($plantillaMesa, $idMesa, $sillas);
}
?>