<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>reservaciones</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        footer{
            background-color: burlywood;
        }
        #Contador1 h1{
        }
        #Contador1{
            text-align: center;
            font-size: 20px;
        }
        #MesaComida{
            text-align: center;
        }
    .salon{
        margin: 41px;
    }
    .silla-reservada{
        color: red;
    }
    .contenedor-mesa{
        margin: 5px;
        width: 150px;
        height: 150px;
        position: relative;
        display: inline-block;
    }
    .mesa{
        font-size: 6em;
    }
    .silla{
        font-size: 1.5em;
        position: absolute;
        cursor: pointer;
    }
    .silla-pos1{
        top: -25px;
        left: 18px;
    }
    .silla-pos2{
        top: -25px;
        left: 56px;
    }
    .silla-pos3{
        top: 15px;
        left: 94px;
    }
    .silla-pos4{
        top: 56px;
        left: 94px;
    }
    .silla-pos5{
        top: 96px;
        left: 56px;
    }
    .silla-pos6{
        top: 96px;
        left: 18px;
    }
    .silla-pos7{
        top: 15px;
        left: -20px;
    }
    .silla-pos8{
        top: 56px;
        left: -20px;
    }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="NavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="vip.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="vip.php" class="nav-link">Comprar Paquete</a>
                </li>
            </ul>
            <a href="login.php" placeolder="Search">
                <i class="fas fa-sign-out-alt"></i>
                Salir
            </a>
        </div>
    </nav>

    <section class="container">
        <section class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="Contador1" data-contador="0">
                <h1>Lugares Restantes</h1>
                <p class="badge badge-danger" id="Contador">0</p>
            </div>
            <div class="col-md-4"></div>
        </section>
    </section>
    
    <section class="salon">
        <?php
        include("procesarPlantillas.php");
        echo $mesas;
        ?>
    </section>

    <div class="modal" id="ventanaConfirmacion" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar reservacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Seleccione el paquete que desea usar</p>
                    <select name="" id="SelectorPaquete">
                        <option value="1">Basico</option>
                        <option value="2">Medio</option>
                        <option value="3">Premium</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                    <button type="button" class="btn btn btn-dark" id="btnAceptar">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        var idSilla = 0;
        var lugares = 0;
        var nPaquete = 0;

        $(function() {
            $('[data-toogle="tooltip"]').tooltip();
            $("#ventanaConfirmacion").modal({show:false});
            $.ajax({
                url: "contador.php",
                method: "GET",
                dataType : "json"
            })
            .done(function(Contador){
                dataContador=document.getElementById('Contador1');
                dataContador.dataset.contador = Contador[0].Resultado;
                console.log(Contador);
                $("#Contador1 p").text(Contador[0].Resultado);
            });

            $(".silla").on("click", function(){
                var reservada = $(this).hasClass("silla-reservada");
                dataContador=document.getElementById('Contador1');
                var lugares = dataContador.dataset.contador;

                if(lugares > 0){
                    if(!reservada){
                        idSilla = $(this).attr("data_id");
                        $("#ventanaConfirmacion").modal("show");
                    }
                }
            });

            $("#btnCancelar").on("click", function(){
                $("#ventanaConfirmacion").modal("hide");
            });

            $("#btnAceptar").on("click", function(){
                nPaquete = SelectorPaquete.options[SelectorPaquete.selectedIndex].value;
                $.ajax({
                    url: "confirmarReservacion.php",
                    method: "POST",
                    data:{
                        silla: idSilla,
                        paquete: nPaquete
                    }
                })
                .done(function(){
                    $("#ventanaConfirmacion").modal("hide");
                    window.location.href = "reservaciones.php";
                });
            });
        });
    </script>
</body>
</html>