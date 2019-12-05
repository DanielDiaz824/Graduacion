<!DOCTYPE html>
<html>
<head>
        <?php
        session_start();
    
        $sesion = $_SESSION["usuario"];
        
        if(!isset($sesion)){
            header("Location: login.php");
        }
        ?>
    <meta charset="UTF-8">
    <title>VIP</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(function(){
        $paquetes = $("#paquete1, #paquete2, #paquete3");
        $paquetes.on("change", function(){
            var numero = $(this).val();
            var $precioCaja = $(this).next("h4");
            var precio = "$" + ($precioCaja.attr("data-precio")*numero);
            $precioCaja.text(precio);
        });

        $("#modalConfirmar").modal({
            show:false
        });

        $("#btnConfirmar").on("click",function(){
            var total = 0;
            $("#modalConfirmar").modal("show");
            $paquetes.each(function(){
                var numero = $(this).val();
                var $precioCaja = $(this).next("h4");
                var precio = ($precioCaja.attr("data-precio")*numero);
                
                total += parseInt(precio);
                });
                $("#precioFinal").text("El total es: $"+total);
            });
        $("#btnAceptar").on("click", function(){
            $(this).prop("disabled",true);
            var lugaresPaquete1 = $("#paquete1").val();
            var lugaresPaquete2 = $("#paquete2").val();
            var lugaresPaquete3 = $("#paquete3").val();
            
            $.ajax({
                url: "comprar.php",
                method: "POST",
                data: {
                    paquete1: lugaresPaquete1,
                    paquete2: lugaresPaquete2,
                    paquete3: lugaresPaquete3
                }
            })
            .done(function(){
                $(this).prop("disabled",false);
                $("#modalConfirmar").modal("hide");
                window.location.href = "vip.php"
            });
        });
        $.ajax({
            url: "indicadores.php",
            method: "GET",
            dataType: "json"
        })
        .done(function(indicadores) {
            console.log(indicadores);
            $("#indicador1 p").text(indicadores[0].lugares);
            $("#indicador2 p").text(indicadores[1].lugares);
            $("#indicador3 p").text(indicadores[2].lugares);
        });
    });
    </script>
    <style>
        #paquetes img{
            width: 25%;
        }
        aside.indicadores{
            text-align: center;
            position: fixed;
            top: 10;
            left: 0;
        }
        aside.indicadores img{
            width: 30px;
        }
    </style>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light bg-light">
        <div class="collapse navbar-collapse" id="NavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="vip.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="reservaciones.php" class="nav-link">Reservar Lugares</a>
                </li>
            </ul>
            <a href="login.php" placeolder="Search">
                <i class="fas fa-sign-out-alt"></i>
                Salir
            </a>
        </div>
    </nav>

    <section class="container-fluid">
        <section class="row" id="paquetes">
            <div class="col-md-12">
                <h3>Selecciona el paquete para la cena</h3>
            </div>
            <div class="col-md-4" id="paquetes">
                <h4>Basico</h4>
                <img src="img/basico.png" alt="platillo1">
                <input type="number" id="paquete1" value="0" min="0" max="10">
                <h4 data-precio="100">$0</h4>
            </div>
            <div class="col-md-4" id="paquetes">
                <h4>Medio</h4>
                <img src="img/medio.png" alt="platillo2">
                <input type="number" id="paquete2" value="0" min="0" max="10">
                <h4 data-precio="500">$0</h4>
            </div>
            <div class="col-md-4" id="paquetes">
                <h4>Premium</h4>
                <img src="img/premium.png" alt="platillo3">
                <input type="number" id="paquete3" value="0" min="0" max="10">
                <h4 data-precio="1000">$0</h4>
            </div>
            <div class="col-md-12">
                <button id="btnConfirmar" class="btn btn-dark">Confirmar</button>
            </div>
        </section>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="modalConfirmar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea confirmar su seleccion?</p>
                    <p id="precioFinal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-dark" id="btnAceptar">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <aside class="indicadores">
        <div id="indicador1">
            <img src="img/basico.png" alt="paquete1">
            <p class="badge badge-danger">0</p>
        </div>
        <div id="indicador2">
            <img src="img/medio.png" alt="paquete2">
            <p class="badge badge-danger">0</p>
        </div>
        <div id="indicador3">
            <img src="img/premium.png" alt="paquete3">
            <p class="badge badge-danger">0</p>
        </div>
    </aside>
</body>
</html> 