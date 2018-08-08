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
                <link href="../../css/jsgridconfiguration.css" rel="stylesheet" type="text/css"/>

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>

                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/fTareasView.js" type="text/javascript"></script>
                     
                
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
    Agregar Tarea
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

 <table class="table table-bordered table-striped header_fijo"  >
    <thead >
    <tr class="">
     <th class="table-headert" width="7.68%">Contrato</th>
     <th class="table-headert" width="7.68%">Tarea</th>
     <th class="table-headert" width="14.4%">Responsale del Plan</th>
     <th class="table-headert" width="14.4%">Fecha de Creacion</th>
     <th class="table-headert" width="7.68%">Fecha de Alarma</th>
     <th class="table-headert" width="7.68%">Fecha de Cumplimiento</th>
     <th class="table-headert" width="14.4%">Observaciones</th>
     <th class="table-headert" width="7.68%">Archivo Adjunto</th>
     <th class="table-headert" width="7.68%">Registrar Programa</th>
     <th class="table-headert" width="6.72%">Avance</th>     
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
            <h4 class="modal-title" id="myModalLabel">Crear Nueva Tarea</h4>
          </div>

          <div id="validacion_empleado" class="modal-body">
                    <!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                        <!--<form data-toggle="validator"  >-->
                        <div id="ok"></div>
                            <div class="form-group">
                                            <label class="control-label" for="title">Nombre:</label>
                                            <input type="text"  id="NOMBRE_EMPLEADO" class="form-control" data-error="Ingrese Nombre" required />
                                            <div id="mensaje1" class="help-block with-errors" ></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Apellido Paterno:</label>
                                            <textarea  id="APELLIDO_PATERNO" class="form-control" data-error="Ingrese Apellido Paterno." required></textarea>
                                            <div id="mensaje2"class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Apellido Materno:</label>
                                            <textarea  id="APELLIDO_MATERNO" class="form-control" data-error="Ingrese Apellido Materno." required></textarea>
                                            <div id="mensaje3" class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Categoria:</label>
                                            <textarea  id="CATEGORIA" class="form-control" data-error="Ingrese Categoria." required></textarea>
                                            <div id="mensaje4" class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label" for="title">Email:</label>
                                            <textarea  id="CORREO" class="form-control" data-error="Ingrese Email" required></textarea>
                                            <div id="mensaje5"class="help-block with-errors"></div>
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

<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <!-- <div id="loaderModalMostrar"></div> -->
		<div class="modal-content">
                        
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabelItermUrls">Archivos Adjuntos</h4>
            </div>

            <div class="modal-body">
                <div id="DocumentolistadoUrl"></div>

                <div class="form-group">
                    <div id="DocumentolistadoUrlModal"></div>
                </div>

                <div class="form-group" method="post">
                    <button style='width:-webkit-fill-available;' type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Adjuntar Archivo</button>
                </div>
            </div><!-- cierre div class-body -->
        </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->

</body>
<script>
    si_hay_cambio=false;
    mostrarTareas();

function loadSpinner()
{
    myFunction();
}
</script>

<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload" style="width:100%">
            <td>
            <span class="preview"></span>
            </td>
            <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error"></strong>
            </td>
            <td>
            <p class="size">Processing...</p>
            <!-- <div class="progress"></div> -->
            </td>
            <td>
            {% if (!i && !o.options.autoUpload) { { %}
                    <button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>
            {% } } %}
            {% if (!i) { %}
                    <button class="cancel" style="padding: 0px 4px 0px 4px;color:white">Cancel</button>
            {% } %}
            </td>
        </tr>
    {% noArchivo=1; } %}
</script>

<script id="template-download" type="text/x-tmpl">
    {% var t = $('#fileupload').fileupload('active'); var i,file;%}
    {% for (i=0,file; file=o.files[i]; i++) { %}
        <tr class="template-download">
            <td>
            <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
            </span>
            </td>
            <td>
            <p class="name">
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            </td>
            <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <!-- <td> -->
            <!-- <button class="delete" style="padding: 0px 4px 0px 4px;" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button> -->
            <!-- <input type="checkbox" name="delete" value="1" class="toggle"> -->
            <!-- </td> -->
        </tr>
    {% } %}
    {% if(t == 1){ if( $('#tempInputIdTarea').length > 0 ) { var ID_TAREA = $('#tempInputIdTarea').val(); mostrar_urls(ID_TAREA); reconstruirRow(ID_TAREA); noArchivo=0; } } %}
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
    <!-- js cargar archivo -->
    <script src="../../assets/FileUpload/js/jquery.min.js"></script>
        <script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>
        <script src="../../assets/FileUpload/js/tmpl.min.js"></script>
        <script src="../../assets/FileUpload/js/load-image.all.min.js"></script>
        <script src="../../assets/FileUpload/js/canvas-to-blob.min.js"></script>
        <script src="../../assets/FileUpload/js/jquery.blueimp-gallery.min.js"></script>
        <script src="../../assets/FileUpload/js/jquery.iframe-transport.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-process.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-image.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-audio.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-video.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-validate.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-ui.js"></script>
        <script src="../../assets/FileUpload/js/jquery.fileupload-jquery-ui.js"></script>
        <script src="../../assets/FileUpload/js/main.js"></script>
        <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
        <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
</html>
