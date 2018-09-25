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
       
        <style>
            body {
                background-color: #00c4ff26;
            }

            footer {
                    background: #337ab7;
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    height: 50px;
                    color: white;
            }

            footer .copyright {
                    text-align: center;
                    font-size: 14px;
                    padding: 15px 0;
            }

            .rombo {
                 width: 100px; 
                 height: 100px; 
                 border: 3px solid #337ab7; 
                 background: #00c4ff26;
                 margin-top: 100px;
                 color: #fff;
                 position: absolute;
                 
                 -webkit-transform: rotate(45deg) skew(15deg, 15deg);
                 -moz-transform: rotate(45deg) skew(15deg, 15deg);
                 -ms-transform: rotate(45deg) skew(15deg, 15deg);
                 -o-transform: rotate(45deg) skew(15deg, 15deg);
                 transform: rotate(45deg) skew(15deg, 15deg);
            }

            .cuadrado {
                 width: 100px; 
                 height: 100px; 
                 border: 3px solid #337ab7;
                 background: #428bca;
                 margin-top: 250px;
                 position: absolute;
            }

            .oval {
                 width: 250px;
                 height: 100px;
                 -moz-border-radius: 0 50% / 0 100%;
                 -webkit-border-radius: 0 50% / 0 100%;
                 border-radius: 0 50% / 0 100%;
                 background: #5cb85c;
                 border: 3px solid #337ab7;
                 margin-top: 370px;
                 position: absolute;
            }
                
        </style>
        <?php 
        
        ?>
        
    </head>
    
    <body>
        <img style="float:right;width:220px;height:220px;" src="../../images/base/omgapps.png" alt="descripción" />
        <div class="rombo"></div>
        <div class="cuadrado"></div>
	<div class="oval"></div>
        
        <div id="Contenedor">
            <div class="Icon"><span class="glyphicon glyphicon-user"></span></div>
            
            <div class="ContentForm">
                <form id="loginform"  method="post" name="FormEntrar">
                        <div class="input-group input-group-lg">
                          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" class="form-control" name="usuario" placeholder="Usuario" id="Usuario"  required>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                          <input type="password" name="pass" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
                        </div>
                        <br>
                        <button data-placement="right" title="Haga clic aquí para iniciar sesión" class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
                        <div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>
                </form>   

            </div>
         </div>
        
        <footer>
		<p class="copyright">Copyright © 2018 - 2019 Javier M. Davila Bartoluchi</p>
	</footer>
    </body>    
</html>