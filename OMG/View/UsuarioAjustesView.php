<?php
session_start();
require_once '../util/Session.php';
//$error=Session::eliminarSesion("error");
//$usuario=Session::eliminarSesion("usuario");
// if (Session:: existeSesion("user")){
//     header("location: principalmodulos.php");
//     return;
// }
?>
<html>
    <head>
        <title>OMG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
		<!-- Libreria java scritp de bootstrap -->
        <!-- <script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
                <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
        <!-- <script src="../../js/is.js" type="text/javascript"></script> -->
        <!-- <script src="../../js/tooltip.js" type="text/javascript"></script> -->
        <script src="../../angular/angular.min.js" type="text/javascript"></script>

        <!-- swalAlert -->
        <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
        <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    </head>

    <div id="Contenedor" style="margin: 0px auto;">
        <div class="Icon"><span class="glyphicon glyphicon-user"></span></div>
		<!-- <div class="ContentForm"> -->
        <div class="form-group">
		 	<!-- <form id="loginform"  method="post" name="FormEntrar"> -->
            <label class="control-label">Contraña Actual: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id=""><i class="glyphicon glyphicon-lock"></i></span>
                <input onBlur="verificarPass(this)" id="contraActual" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassActual"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
            </div>
            <br>

            <label class="control-label">Contraseña Nueva: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id=""><i class="glyphicon glyphicon-lock"></i></span>
                <input onKeyup="checarPass(this)" id="contraNueva" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassNueva"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
            </div>
            <br>

            <label class="control-label">Repetir Contraseña: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id=""><i class="glyphicon glyphicon-lock"></i></span>
                <input onKeyup="checarPass(this)" id="contraNueva2" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassNueva2"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
            </div>
            <br>

            <button onClick="cambiarPass()" title="Haga clic aquí para cambiar contraseña" class="btn btn-lg btn-primary btn-block btn-signin">
            Cambiar Contraseña</button>
				<!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
            <!-- </form> -->
    </div>

     </div>
     <script>
        okpass=false;
        okpassN=false;
        
        function limpiarFormulario()
        {
            no = "<i style='color:red' class='glyphicon glyphicon-remove'></i>";
            clearInterval(outTime);
            swal({
                    title:"",
                    text: "Se agoto el tiempo de espera para el cambio de contraseña",
                    type: "info",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Recargar",
                    }, function()
                    {
                        outTime = setInterval(function(){limpiarFormulario();},30000);
                        swal.close();
                        limpiar();
                    }
                );
        }
        function limpiar()
        {
            $("#contraActual").val("");
            $("#contraNueva").val("");
            $("#contraNueva2").val("");

            $("#iconPassActual").html(no);
            $("#iconPassNueva").html(no);
            $("#iconPassNueva2").html(no);
            
            okpass=false;
            okpassN=false;
        }
        outTime = setInterval(function(){limpiarFormulario();},30000);

        function cambiarPass()
        {
            contraA = $("#contraActual").val();
            contraN = $("#contraNueva").val();
            if(okpass==true && okpassN==true)
            {
                if(contraA != contraN)
                {
                    $.ajax({
                        url: '../Controller/AdminController.php?Op=CambiarPass',
                        type: 'POST',
                        data: 'PASS='+contraA+"&NEW_PASS="+contraN,
                        success:function(exito)
                        {
                            if(exito==true)
                            {
                                clearInterval(outTime);
                                swal({
                                    title:"",
                                    text: "La contraseña se cambio. Inicie sesion de nuevo",
                                    type: "info",
                                    showCancelButton: false,
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true,
                                    confirmButtonText: "Salir",
                                    }, function()
                                    {
                                        window.parent.location.href="Logout.php";
                                    }
                                );
//                                setTimeout(function(){swal.close();window.parent.location.href="Logout.php";},7000);
                            }
                            else
                            {
                                swalError("No se pudo hacer el cambio de contraseña");
                            }
                        },
                        error:function()
                        {
                            swalError("Error en el servidor");
                        }
                    });
                }
                else
                {
                    swal("","No puedes utilizar tu misma contraseña","info");
                }
            }
        }

        // function verificarTodo()
        // {
        //     //contraActual,contraNueva,contraNueva2
        //     contraA = $("#contraActual").val();
        //     contraN = $("#contraNueva").val();
        //     contraN2 = $("#contraNueva2").val();

        //     if(contraN!="")
        //     {
        //     }
        //     if(contraN2!="")
        //     {
        //     }
        // }
        function checarPass(Obj)
        {
            console.log("aq");
            pass = $("#contraNueva").val();
            passN = $("#contraNueva2").val();
            yes = "<i style='color:#02ff00' class='glyphicon glyphicon-ok'></i>";
            no = "<i style='color:red' class='glyphicon glyphicon-remove'></i>";
            if(pass!="" && passN!="")
            {                
                if(pass == passN)
                {
                    $("#iconPassNueva").html(yes);
                    $("#iconPassNueva2").html(yes);
                    okpassN=true;
                }
                else
                {
                    $("#iconPassNueva").html(no);
                    $("#iconPassNueva2").html(no);
                    okpassN=false;
                }
            }
            else
            {
                $("#iconPassNueva").html(no);
                $("#iconPassNueva2").html(no);
                okpassN=false;
            }
        }

        function verificarPass(Obj)
        {
            contrasena = $(Obj).val();
            yes = "<i style='color:#02ff00' class='glyphicon glyphicon-ok'></i>";
            no = "<i style='color:red' class='glyphicon glyphicon-remove'></i>";
            $.ajax({
                url: '../Controller/AdminController.php?Op=VerificarPass',
                type: 'GET',
                data: 'PASS='+contrasena,
                success:function(correcta)
                {
                    if(correcta==true)
                    {
                        $("#iconPassActual").html(yes);
                        okpass=true;
                    }
                    else
                    {
                        okpass=false;
                        $("#iconPassActual").html(no);
                    }
                },
                error:function()
                {
                    okpass=false;
                    swalError("Error en el servidor");
                }
            });
        }

        function swalSuccess(msj)
        {
            swal({
                    title: '',
                    text: msj,
                    showCancelButton: false,
                    showConfirmButton: false,
                    type:"success"
                });
            setTimeout(function(){swal.close();},1500);
            $('#loader').hide();
        }

        function swalError(msj)
        {
            swal({
                    title: '',
                    text: msj,
                    showCancelButton: false,
                    showConfirmButton: false,
                    type:"error"
                });
            setTimeout(function(){swal.close();$('#agregarUsuario .close').click()},1500);
            $('#loader').hide();
        }
     </script>
</html>