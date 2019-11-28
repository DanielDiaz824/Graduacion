<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .salon{
        margin:41px;
        }
        .salon2{
            display:inline-flex;
            width:100%;
        }
        .silla-reservada{
        color:red;
        }
        .contenedor-mesa{
            margin:5px;
            width:30%;
            height:150px;
            position:relative;
            display:inline-block;
        }
        .mesa{
            font-size:6em;
        }
        .silla{
            font-size:1.5em;
            position:absolute;
            cursor:pointer;
        }
        .silla-pos1{
            top:-25px;
            left:18px;
        }
        .silla-pos2{
            top:-25px;
            left:56px;
        }
        .silla-pos3{
            top:15px;
            left:94px;
        }
        .silla-pos4{
            top:56px;
            left:94px;
        }
        .silla-pos5{
            top:96px;
            left:56px;
        }
        .silla-pos6{
            top:96px;
            left:18px;
        }
        .silla-pos7{
            top:15px;
            left:-20px;
        }
        .silla-pos8{
            top:56px;
            left:-20px;
        }
        .pista{
            width:30%;
            padding:10px;
        }
        .img{
            border-top:100px;
            padding:8% 0px 0px 0px;
        }
    </style>
</head>
<body>
    <section class="salon2">
    <section class="salon">
        <?php
            include("procesarPlantillas.php");
            echo $mesas;
        ?>
    </section>
    <section class="pista">
        <h1>Aparta tu lugar</h1>
    </section>
    <section class="img">
    <img src="img/salonn.jpeg" alt="salon">
    </section>
    </section>
    

    <div class="modal" id="ventanaConfirmacion" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Confirmar reservacion</h5>
                </div>
                <div class="modal-body">
                    <p>¿Confirma su reservacion?</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" id="btnCancelar">No</button>
                  <button class="btn btn-primary" id="btnAceptar">Si</button>    
                </div>
            </div>
        </div>
    </div>

    <script>
        var idSilla=0;
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $("#ventanaConfirmacion").modal({show:false});

            $(".silla").on("click",function(){
                var reservada=$(this).hasClass("silla-reservada");
                if(!reservada){
                    idSilla=$(this).attr("data_id");
                    $("#ventanaConfirmacion").modal("show");
                }else{

                }
            });

            $("#btnCancelar").on("click",function(){
                $("#ventanaConfirmacion").modal("hide");
            });

            $("#btnAceptar").on("click",function(){
                $.ajax({
                    url:"confirmarReservacion.php",
                    method:"POST",
                    data:{
                        silla:idSilla
                        
                    }
                    })
                    .done(function(){
                        $("#ventanaConfirmacion").modal("hide");
                    
                });
            });
        });
    </script>
</body>
</html>