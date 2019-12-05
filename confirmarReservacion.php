<?php
    session_start();
    $idUsuario=$_SESSION["datosUsuario"]["id"];
    include("conexion.php");
    $idSilla=$_POST["silla"];
    $paquete0=$_POST["paquete1"];
    $paquete2=$_POST["paquete2"];
    $paquete3=$_POST["paquete3"];

    $sql = "SELECT paquete FROM usuarios_paquetes where idUsuario=$idUsuario ";
    $result1 = $conexionBD->query("SELECT SUM(lugares) FROM usuarios_paquetes where idUsuario=$idUsuario")->fetch_array();
    $result2 = $conexionBD->query("SELECT COUNT(paquete) FROM reservaciones where id_usuario=$idUsuario")->fetch_array();
    $Sum = $result1[0];
    $Res=$result2[0];
    $resta=$Sum-$Res;

    /*echo"El usuario tiene: ".$Sum." lugares";
    echo"El usuario tiene: ".$Res." lugares apartados";*/

    $paquete=$conexionBD->query($sql);
    $fila=mysqli_num_rows($paquete);
    if($fila>0){
        $fila = $paquete->fetch_array(MYSQLI_ASSOC);

        $_SESSION['Paquete1']=$fila['paquete'];
    }
    else {
        echo "No hay resultados";
    }
    $paquete1= $_SESSION['Paquete1'] ;
        if($resta!=0){
            $statementr="INSERT INTO reservaciones (id_silla,id_usuario,paquete) VALUES ('$idSilla','$idUsuario','$paquete1')";  
            $resultado1= $conexionBD->query($statementr);
            
            if($resultado1){
                echo "Registro exitoso";
            }
            else{
                echo "Error en el registro :(";
            }  
        }
?>