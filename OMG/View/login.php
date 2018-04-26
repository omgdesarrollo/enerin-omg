<?php
session_start();
require_once '../util/Session.php';
//$error=Session::eliminarSesion("error");
//$usuario=Session::eliminarSesion("usuario");
if (Session:: existeSesion("user")){
    header("location: principalmodulos.php");
    return;
}
?>

<?php // echo "el error es "+$error;  ?>
<?php // echo "el usuario es  "+$usuario   ?>

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
        <script src="../../js/is.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../angular/angular.min.js" type="text/javascript"></script>
       
        
        
        
    </head>

    <div id="Contenedor">
            <div class="Icon"><span class="glyphicon glyphicon-user"></span></div>
		 <div class="ContentForm">
		 	<form id="loginform"  method="post" name="FormEntrar">
		 		<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
				  <input type="text" class="form-control" name="usuario" placeholder="Usuario" id="Usuario"  required>
				</div>
				<br>
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				  <input type="password" name="pass" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
				</div>
				<br>
				<button data-placement="right" title="Haga clic aquí para iniciar sesión" class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
				<!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
                           
                                
		 	</form>   
                     
		 </div>
			
     </div>  
</html>