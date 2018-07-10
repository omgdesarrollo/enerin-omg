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
                <script src="../../js/fAutoridadesRemitentesView.js" type="text/javascript"></script>        

                
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
      
<?php

require_once 'EncabezadoUsuarioView.php';

?>       
       
<div style="height: 5px"></div>       

<div style="position: fixed;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
    Agregar Autoridad
</button>
<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh()">
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/exportarEmpleadosView/exportarEmpleadosViewExcel.php'">
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>     
<button type="button" onclick="window.location.href='../ExportarView/exportarEmpleadosView/exportarEmpleadosViewWord.php'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>
    
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Nombre" style="width: 150px;">
    <input type="text" id="idInputapellidopaterno" onkeyup="filterTableapellidoPaterno()" placeholder="Apellido Paterno" style="width: 150px;">
    <input type="text" id="idInputapellidomaterno" onkeyup="filterTableapellidoMaterno()" placeholder="Apellido Materno" style="width: 150px;">
    <input type="text" id="idInputCategoria" onkeyup="filterTableCategoria()" placeholder="Categoria" style="width: 150px;">
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>
                                
<div style="height: 40px"></div>


<table class="table table-bordered table-striped header_fijo" id="idTable">
    <thead >
    <tr class="">
     <!--<th class="table-headert" width="8%">No.</th>-->
     <th class="table-headert" width="11.52%">Clave Autoridad</th>
     <th class="table-headert" width="19.2%">Descripcion</th>
     <th class="table-headert" width="19.2%">Direccion</th>
     <th class="table-headert" width="11.52%">Telefono</th>
     <th class="table-headert" width="11.52%">Extension</th>
     <th class="table-headert" width="11.52%">Email</th>
     <th class="table-headert" width="11.52%">Direccion Web</th>
    </tr>
   </thead>

   <tbody class="hideScrollBar"  id="datosGenerales" style="position: absolute">
   </tbody>

</table>  
                                            

<!-- Inicio de Seccion Modal -->
<div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">x</span></button>
            <h4 class="modal-title" id="myModalLabel">Crear Nueva Autoridad Remitente</h4>
          </div>

          <div id="validacion_empleado" class="modal-body">
                    <!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                        <!--<form data-toggle="validator"  >-->
                        <div id="ok"></div>
                            <div class="form-group">
                                            <label class="control-label" for="title">Clave Autoridad Remitente:</label>
                                            <input type="text"  id="CLAVE_AUTORIDAD" class="form-control" data-error="Ingrese Autoridad" required />
                                            <div id="mensaje1" class="help-block with-errors" ></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Descripcion:</label>
                                            <textarea  id="DESCRIPCION" class="form-control" data-error="Ingrese Descripcion" required></textarea>
                                            <div id="mensaje2"class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Direccion:</label>
                                            <textarea  id="DIRECCION" class="form-control" data-error="Ingrese Direccion" required></textarea>
                                            <div id="mensaje3" class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Telefono:</label>
                                            <textarea  id="TELEFONO" class="form-control" data-error="Ingrese Telefono" required></textarea>
                                            <div id="mensaje4" class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Extension:</label>
                                            <textarea  id="EXTENSION" class="form-control" data-error="Ingrese Extension" required></textarea>
                                            <div id="mensaje5"class="help-block with-errors"></div>
                                    </div>
                        
                                    <div class="form-group">
                                            <label class="control-label" for="title">Email:</label>
                                            <textarea  id="EMAIL" class="form-control" data-error="Ingrese Email" required></textarea>
                                            <div id="mensaje6"class="help-block with-errors"></div>
                                    </div>
                        
                                    <div class="form-group">
                                            <label class="control-label" for="title">Direccion Web:</label>
                                            <textarea  id="DIRECCION_WEB" class="form-control" data-error="Ingrese Direccion Web" required></textarea>
                                            <div id="mensaje7"class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                        <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
                                    </div>

                    <!--</form>-->

          </div>
        </div>

    </div>
</div>
<!--Final de Seccion Modal-->
  
       
                        
                
		<script>
                    si_hay_cambio=false;
                    listarDatos();
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
