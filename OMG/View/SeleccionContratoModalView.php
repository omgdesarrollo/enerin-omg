<?php
session_start();
require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");

?>

<!DOCTYPE html>
<html lang="en">
    <head>

                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>OMG APPS</title>
                
                <meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
                
                <!-- bootstrap & fontawesome -->
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
                <!--Para abrir alertas de aviso, success,warning, error-->       
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />-->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>

                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/fEmpleadosView.js" type="text/javascript"></script>
                     
                
<style>
        
.modal-body{
color:#888;
max-height: calc(100vh - 110px);
overflow-y: auto;
}                    

#sugerenciasclausulas {
width:350px;
height:5px;
overflow: auto;
}  
body{
overflow:hidden;     
}

.hideScrollBar{
width: 100%;
height: 100%;
overflow: auto;
margin-right: 14px;
padding-right: 28px; /*This would hide the scroll bar of the right. To be sure we hide the scrollbar on every browser, increase this value*/
padding-bottom: 15px; /*This would hide the scroll bar of the bottom if there is one*/
}
  

</style>

                
</head>
    
    
    
    
<body class="no-skin" onload="loadSpinner()">

<div id="loader"></div>
          
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#change-item">
    Seleccionar Contatos
</button>
  

<!-- Inicio de Seccion Modal Tema-->
       <div class="modal draggable fade" id="change-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Seleccionar Contrato</h4>
		      </div>
                        
		      <div class="modal-body">
                          <form id="temaform">                                                                          

                                                <div class="form-group">
							<label class="control-label" for="title">Contratos:</label>
                                                        
                                                        <select   id="ID_CUMPLIMIENTO" class="select1">
                                                                <?php
                                                                $cbxC = Session::getSesion("listarCumplimientosComboBox");
                                                                foreach ($cbxC as $value) 
                                                                {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_cumplimiento"] ?>"><?php echo "".$value["clave_cumplimiento"]; ?></option>
                                                                
                                                                <?php                                                                
                                                                }                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                                                                        
                                                                                                                                
						<div class="form-group">
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar_tema"  class="btn crud-submit btn-info">Limpiar</button>
						</div>
                          </form>

		      </div>
		    </div>

		  </div>
       </div>
       <!--Final de Seccion Modal-->
                                              
       
                        
                
		<script>
                                                                
		</script>

        <!--Inicia para el spiner cargando-->
        <script src="../../js/loaderanimation.js" type="text/javascript"></script>
        <!--Termina para el spiner cargando-->
        <!--Bootstrap-->
        <script src="../../assets/probando/js/bootstrap.min.js"></script>
        <!--Para abrir alertas de aviso, success,warning, error-->       
        <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
        
        <!--Para abrir alertas del encabezado-->
        <script src="../../assets/probando/js/ace-elements.min.js"></script>
        <script src="../../assets/probando/js/ace.min.js"></script>
    </body>
</html>
