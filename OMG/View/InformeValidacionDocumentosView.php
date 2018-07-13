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
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/fInformeValidacionDocumentosView.js" type="text/javascript"></script>
               
               <!--librerias para utilizar componentes de dhtmlx-->
<!--                <link rel="stylesheet" type="text/css" href="../../codebase/fonts/font_roboto/roboto.css"/>
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                <script src="../../codebase/dhtmlx.js"></script>-->
                <!--...-->
                
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
            height: 50%;
            overflow: auto;
            margin-right: 14px;
            padding-right: 28px; /*This would hide the scroll bar of the right. To be sure we hide the scrollbar on every browser, increase this value*/
            padding-bottom: 15px; /*This would hide the scroll bar of the bottom if there is one*/
            }
           
/*input[type="checkbox"] {
    display:none;
}*/
/*input[type="checkbox"] + label span {
    display:inline-block;
    width:19px;
    height:19px;
    background:url(../../images/base/_excel.png) left top no-repeat;
}*/
            

        </style>            
                
 			 
</head>

        
        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>

             
<div style="position: fixed;">    
<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i>   
</button>

<button type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Excel'">
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>
<button type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Word'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Pdf'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>    

        <input type="text" id="idInputClaveDocumento" onkeyup="filterTableClaveDocumento()" placeholder="Clave Documento" style="width: 180px;">
        <input type="text" id="idInputNombreDocumento" onkeyup="filterTableNombreDocumento()" placeholder="Nombre Documento" style="width: 180px;">
        <input type="text" id="idInputResponsableDocumento" onkeyup="filterTableResponsableDocumento()" placeholder="Responsable del Documento" style="width: 180px;">
        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
        <input type="submit" id="btnGraficar" class="btn btn-danger" value="Graficar">
        
        
</div>    


<div style="height: 40px"></div>

<div class="container">		
    <div class="row">
        <div class="col-md-12">
                <!--<div class="row align-items-center">-->
                        <!--<div class="col-1">-->
                                <!--<input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkValidado">-->
                         <!--<div class="col-4">Validados</div>-->
                        <!--</div>-->
                       
                <!--</div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <div class="col-md-2">
        <div class="input-group">
          <!--<input name="remitosucursal" id="remitosucursal" type="text" required class="form-control" placeholder="Sucursal">-->
          <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkValidado">
          <span style="border:none;background-color:transparent;" class="input-group-addon">Validados</span>
          <!--<input name="remitonumero" id="remitonumero" type="text" required class="form-control" placeholder="Numero">-->
            <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkNoValidado">
             <span style="border:none;background-color: transparent;" class="input-group-addon">En Proceso</span>
            
             <!--<input type="submit"  style="width: 40px; height: 40px" class="btn btn-info" id="btngraficar" value="Graficar">-->
        </div>
            
            </div>
        <div id="arbolprincipal"></div>
        <!--<input type="submit"   style=" height: 40px" class="btn btn-info" id="btngraficar" value="Graficar">-->
        
<!--        <div class="col-md-10">
             <div class="input-group">
                 <input type="submit"  style="width: 40px; height: 40px" class="btn btn-info" id="btngraficar" value="Graficar">
             </div>
        </div>-->
        <!--</div>-->
        <!--<div class="col-md-2">-->
                <!--<div class="row align-items-center">-->
<!--                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkNoValidado">
                        </div>
                        <div class="col-5">En Proceso</div>-->
                <!--</div>-->
        <!--</div>-->

        <!--<div class="col-md-4">-->
                <!--<div class="row align-items-center">-->
                        <!--<div class="col-1">-->
                                
                        <!--</div>-->
                        <!--<div class="col-6">Sin Documento</div>-->
                <!--</div>-->
        </div>
        
    </div>
</div>    


<table class="table table-bordered table-striped header_fijo tbl-qa" id="idTable ">
    <thead>                              
            <tr>

                  <th class="table-header" width="4.8%">No</th>
                  <th class="table-header" width="9.6%">Cumplimiento</th>
                  <th class="table-header" width="9.6%">Tema</th>
                  <th class="table-header" width="9.6%">Requisitos</th>
                  <th class="table-header" width="9.6%">Registros</th>
                  <th class="table-header" width="14.4%">Clave del Documento</th>
                  <th class="table-header" width="14.4%">Nombre del Documento</th>
                  <th class="table-header" width="14.4%">Responsable del Documento</th>
                  <th class="table-header" width="9.6%">Estatus</th>

            </tr>
    </thead>
    
    <tbody class="hideScrollBar"  id="datosGenerales" style="position: absolute">    

    </tbody>
</table>

               
<!-- Inicio moda -->
<div class="modal draggable fade" id="mostrar-temaresponsable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"  class="closeLetra">X</span></button>
          <h4 class="modal-title" id="myModalLabel">Lista Tema y Responsable</h4>
        </div>

        <div class="modal-body">
          
            <div id="TemayResponsableListado"></div>
  
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal-->

               
<!-- Inicio modal Requisitos -->
<div class="modal draggable fade" id="mostrar-requisitos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
          <h4 class="modal-title" id="myModalLabel">Lista Requisitos</h4>
        </div>

        <div class="modal-body">
          
            <div id="RequisitosListado"></div>
  
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal Requisitos-->



<!-- Inicio modal Registros -->
<div class="modal draggable fade" id="mostrar-registros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
          <h4 class="modal-title" id="myModalLabel">Lista Registros</h4>
        </div>

        <div class="modal-body">
          
            <div id="RegistrosListado"></div>
  
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal Requisitos-->




                
<script>
    listarDatos();
    


//    function filterTableClaveDocumento()
//    {
//                // Declare variables 
//      var input, filter, table, tr, td, i;
//      input = document.getElementById("idInputClaveDocumento");
//      filter = input.value.toUpperCase();
//      table = document.getElementById("idTable");
//      tr = table.getElementsByTagName("tr");
//
//      // Loop through all table rows, and hide those who don't match the search query
//      for (i = 0; i < tr.length; i++) {
//        td = tr[i].getElementsByTagName("td")[0];
//        if (td) {
//          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
//            tr[i].style.display = "";
//          } else {
//            tr[i].style.display = "none";
//          }
//        } 
//      }
//  }
//                
//                
//  function filterTableNombreDocumento() 
//  {
//  // Declare variables 
//      var input, filter, table, tr, td, i;
//      input = document.getElementById("idInputNombreDocumento");
//      filter = input.value.toUpperCase();
//      table = document.getElementById("idTable");
//      tr = table.getElementsByTagName("tr");
//
//      // Loop through all table rows, and hide those who don't match the search query
//      for (i = 0; i < tr.length; i++) {
//        td = tr[i].getElementsByTagName("td")[1];
//        if (td) {
//          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
//            tr[i].style.display = "";
//          } else {
//            tr[i].style.display = "none";
//          }
//        } 
//      }
//  }   
//  
//                
//  function filterTableResponsableDocumento()
//  {
//  // Declare variables 
//    var input, filter, table, tr, td, i;
//    input = document.getElementById("idInputResponsableDocumento");
//    filter = input.value.toUpperCase();
//    table = document.getElementById("idTable");
//    tr = table.getElementsByTagName("tr");
//
//    // Loop through all table rows, and hide those who don't match the search query
//    for (i = 0; i < tr.length; i++) 
//    {
//      td = tr[i].getElementsByTagName("td")[2];
//      if (td) {
//        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
//          tr[i].style.display = "";
//        } else {
//          tr[i].style.display = "none";
//        }
//      } 
//    }
//  }
                

</script>

<!--    <script id="template-upload" type="text/x-tmpl">
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
               <div class="progress"></div> 
              </td>
              <td>
              {% if (!i && !o.options.autoUpload) { %}
                      <button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>
              {% } %}
              {% if (!i) { %}
                      <button class="cancel" style="padding: 0px 4px 0px 4px;color:white">Cancel</button>
              {% } %}
              </td>
      </tr>
      {% } %} 
</script>-->


<!--<script id="template-download" type="text/x-tmpl">
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
           <td> 
           <button class="delete" style="padding: 0px 4px 0px 4px;" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button> 
           <input type="checkbox" name="delete" value="1" class="toggle"> 
           </td> 
  </tr>
  {% } %}
  {% if(t == 1){ if( $('#tempInputIdValidacionDocumento').length > 0 ) { var ID_VALIDACION_DOCUMENTO = $('#tempInputIdValidacionDocumento').val(); mostrar_urls(ID_VALIDACION_DOCUMENTO);} } %}
</script>-->
            
            <!--<script src="../../js/fReporteValidacionDocumentosView.js" type="text/javascript"></script>-->
            <!--Inicia para el spiner cargando-->
            <script src="../../js/loaderanimation.js" type="text/javascript"></script>
            <!--Termina para el spiner cargando-->
           
            <!--Bootstrap-->
            <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
            <!--Para abrir alertas de aviso, success,warning, error-->       
            <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
            
            <!--Para abrir alertas del encabezado-->
            <script src="../../assets/probando/js/ace-elements.min.js"></script>
            <script src="../../assets/probando/js/ace.min.js"></script>
       
                
	</body>
     
</html>


