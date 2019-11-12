<?php 
    session_start();
    include("conexion.php");
    if($_POST["paquete1"]>0){
        $idUsuario=$_SESSION["datosUsuario"]["id"];
        $lugares=$_POST["paquete1"];

        $statementVerificarDuplicados="SELECT * FROM usuarios_paquetes WHERE idUsuario=$idUsuario AND paquete=1";

        $resultadoVD=$conexionBD->query($statementVerificarDuplicados);
        $duplicados=$resultadoVD->num_rows;

        if ($duplicados==0){
            $statement="INSERT INTO usuarios_paquetes (idUsuario,paquete,lugares) VALUES ($idUsuario,1,$lugares)";
            $conexionBD->query($statement);
            echo "resultado de insertar paquete 1:".$resultado;
        }
    }
    if($_POST["paquete2"]>0){
        $idUsuario=$_SESSION["datosUsuario"]["id"];
        $lugares=$_POST["paquete2"];

        $statementVerificarDuplicados="SELECT * FROM usuarios_paquetes WHERE idUsuario=$idUsuario AND paquete=2";

        $resultadoVD=$conexionBD->query($statementVerificarDuplicados);
        $duplicados=$resultadoVD->num_rows;

        if ($duplicados==0){
            $statement="INSERT INTO usuarios_paquetes (idUsuario,paquete,lugares) VALUES ($idUsuario,2,$lugares)";
            $conexionBD->query($statement);
            echo "resultado de insertar paquete 2:".$resultado;
        }
    }
    if($_POST["paquete3"]>0){
        $idUsuario=$_SESSION["datosUsuario"]["id"];
        $lugares=$_POST["paquete3"];

        $statementVerificarDuplicados="SELECT * FROM usuarios_paquetes WHERE idUsuario=$idUsuario AND paquete=3";

        $resultadoVD=$conexionBD->query($statementVerificarDuplicados);
        $duplicados=$resultadoVD->num_rows;

        if ($duplicados==0){
            $statement="INSERT INTO usuarios_paquetes (idUsuario,paquete,lugares) VALUES ($idUsuario,3,$lugares)";
            $conexionBD->query($statement);
            echo "resultado de insertar paquete 3:".$resultado;
        }
    }
    echo "<p>Lugares comprados</p>";

    echo "<p>".$_POST["paquete1"]."</p>"; 
    echo "<p>".$_POST["paquete2"]."</p>";  
    echo "<p>".$_POST["paquete3"]."</p>";  

    echo "<p>Usuario que hizo la compra</p>";
    echo "<p>". $_SESSION["datosUsuario"]["id"] ."</p>";

?>