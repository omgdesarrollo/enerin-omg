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

<html lang="ES">
    <head>
        <title>OMG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
		<!-- Libreria java scritp de bootstrap -->
        <!--<script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
                <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <!--<script src="../../js/jquery-ui.min.js" type="text/javascript"></script>-->
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
        <script src="../../js/is.js" type="text/javascript"></script>
        <!--<script src="../../js/tooltip.js" type="text/javascript"></script>-->
        <!--<script src="../../angular/angular.min.js" type="text/javascript"></script>-->
        <link href="../../css/wb/imagen_de_inicio.css" rel="stylesheet" type="text/css"/>
        
        
        <style>
        .animacion {
-webkit-animation:fa-spin 20s infinite linear;animation:fa-spin 24s infinite linear;
 /*animation-name: slidein;*/
}
</style>
    </head>
    
    <body>
      
        <div id="" style="position:absolute;left:10px;top:1px;width:175px;height:315px;z-index:0;">
<img src="../../images/base/img0001.png" id="Shape1" alt="" style="width:125px;height:315px;"></div>
<div id="" style="position:absolute;left:2px;top:280px;width:175px;height:310px;z-index:1;">
<img src="../../images/base/img0002.png" id="Shape2" alt="" style="width:125px;height:315px;"></div>
        <div id=""> <img  class="" style="float:right;width:220px;height:220px;" src="../../images/base/omgapps.png" alt="descripción" /></div>
<!--        <div class="rombo"></div>
        <div class="cuadrado"></div>
	<div class="oval "></div>-->
        <!--<p>ddsd </p>-->
        <div id="Contenedor">
            <div class="Icon"><span class="glyphicon glyphicon-user  "></span></div>
            
            <div class="ContentForm">
                <form id="loginform"  method="post" name="FormEntrar">
                        <div class="input-group input-group-lg">
                          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" class="form-control" autocomplete="false" name="usuario" placeholder="Usuario" id="Usuario"  required>
                        </div>
                        <br>
                        <div class="input-group input-group-lg ">
                          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                          <input type="password" name="pass" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
                        </div>
                        <br>
                        <button data-placement="right" title="Haga clic aquí para iniciar sesión" class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
                        <div class="opcioncontra "><a href="">Olvidaste tu contraseña?</a></div>
                        
                        
                        
                        
                        
                </form>   

            </div>
         </div>
        
        <footer>
		<p class="copyright">Copyright © 2018 - 2019 Javier M. Davila Bartoluchi</p>
	</footer>
    </body>    
</html>
