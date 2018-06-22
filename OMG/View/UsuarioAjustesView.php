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
        <script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
        <!-- <script src="../../js/is.js" type="text/javascript"></script> -->
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../angular/angular.min.js" type="text/javascript"></script>
    </head>

    <div id="Contenedor" style="margin: 0px auto;">
        <div class="Icon"><span class="glyphicon glyphicon-user"></span></div>
		<!-- <div class="ContentForm"> -->
        <div class="form-group">
		 	<!-- <form id="loginform"  method="post" name="FormEntrar"> -->
                <label class="control-label">Contraña Actual: </label>
		 		<div class="input-group input-group-lg">
				    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				    <input id="contraActual" type="password" class="form-control" placeholder="******" required>
				</div>
				<br>

                <label class="control-label">Contraseña Nueva: </label>
				<div class="input-group input-group-lg">
				    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				    <input id="contraNueva" type="password" class="form-control" placeholder="******" required>
				</div>
				<br>

                <label class="control-label">Repetir Contraseña: </label>
				<div class="input-group input-group-lg">
				    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				    <input id="contraNueva2" type="password" class="form-control" placeholder="******" required>
				</div>
                <br>

				<button onClick="cambiarPass('hola')" title="Haga clic aquí para cambiar contraseña" class="btn btn-lg btn-primary btn-block btn-signin">
                Entrar</button>
				<!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
            <!-- </form> -->
    </div>
			
     </div>
     <script>
        function cambiarPass(data)
        {
            alert("cambiar contraseña contruyendo");
        }
     </script>
</html>