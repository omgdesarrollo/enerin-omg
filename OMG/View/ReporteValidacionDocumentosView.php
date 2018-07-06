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
                <script src="../../js/fReporteValidacionDocumentosView.js" type="text/javascript"></script>
               
                
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
</div>    


<div style="height: 40px"></div>

<div class="container">		
    <div class="row">
        <div class="col-md-4">
                <div class="row align-items-center">
                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkValidado">
                        </div>
                        <div class="col-4">Validados</div>
                </div>
        </div>

        <div class="col-md-4">
                <div class="row align-items-center">
                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkNoValidado">
                        </div>
                        <div class="col-5">No Validados</div>
                </div>
        </div>

<!--        <div class="col-md-4">
                <div class="row align-items-center">
                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkSinDocumento">
                        </div>
                        <div class="col-6">Sin Documento</div>
                </div>
        </div>							-->
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
    

    
    
//    function obtenerDatosValidados(){
//        
//        
//    }
//    function consultarInformacion(url)
//    {
//        $("#loader").show();
//      $.ajax({  
//            url: ""+url,  
//          success: function(r) {
//              $("#idTable").load("ValidacionDocumentosView.php #idTable");
//              $("#loader").hide();
//            },
//            beforeSend:function(r)
//            {
//
//            },
//            error:function()
//            {
//                $("#loader").hide();
//            }
//      });  
//    }
//                
//                
//    function cargadePrograma(foliodeentrada)
//    {
//      window.location.href=" GanttView.php?folio_entrada="+foliodeentrada;     
//    }
//    
//   
//
//    var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
//        ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
//        ModalCargaArchivo += "<div class='fileupload-buttons'>";
//        ModalCargaArchivo += "<span class='fileinput-button'>";
//        ModalCargaArchivo += "<span><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
//        ModalCargaArchivo += "<input type='file' name='files[]' multiple></span>";
//        ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
//        ModalCargaArchivo += "<div class='fileupload-progress' >";
//        // ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
//        ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
//        ModalCargaArchivo += "</div></div>";
//        ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";
//    $("#subirArchivos").click(function()
//    {
//      agregarArchivosUrl();
//    });
//
//    function mostrar_urls(id_validacion_documento)
//    {
//      var tempDocumentolistadoUrl = "";
//      URL = 'filesValidacionDocumento/'+id_validacion_documento;
//      $.ajax({
//          url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
//          type: 'GET',
//          data: 'URL='+URL,
//          success:function(creado)
//          {
//            if(creado)
//            {
//              $.ajax({
//                  url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
//                  type: 'GET',
//                  data: 'URL='+URL,
//                  success: function(todo)
//                  {
//                      // console.log(todo[0].length);
//                      if(todo[0].length!=0)
//                      {
//                              tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
//                              $.each(todo[0], function (index,value)
//                              {
//                                      nametmp = value.split("^");
//                                      name;
//                                      fecha = nametmp[0];
//                                      $.each(nametmp, function(index,value)
//                                      {
//                                              if(index!=0)
//                                                      (index==1)?name=value:name+="-"+value;
//                                      });
//                                      tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
//                                      tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\">"+name+"</a></td>";
//                                      tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
//                                      tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
//                                      tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
//                              });
//                              tempDocumentolistadoUrl += "</tbody></table>";
//                      }
//                      if(tempDocumentolistadoUrl == " ")
//                      {
//                              tempDocumentolistadoUrl = " No hay archivos agregados ";
//                      }
//                      tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdValidacionDocumento' type='text' style='display:none;' value='"+id_validacion_documento+"'>";                  
//                      $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
//                      $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
//                      $('#fileupload').fileupload
//                      ({
//                        url: '../View/',
//                      });
//                  }
//              });
//            }
//            else
//            {
//              swal("","Error del servidor","error");
//            }
//          }
//        });
//    }
// 
//    
//    function agregarArchivosUrl()
//    {
//      var ID_VALIDACION_DOCUMENTO = $('#tempInputIdValidacionDocumento').val();
//      url = 'filesValidacionDocumento/'+ID_VALIDACION_DOCUMENTO,
//      $.ajax({
//        url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
//        type: 'GET',
//        data: 'URL='+url,
//        success:function(creado)
//        {
//          if(creado)
//            $('.start').click();
//        },
//        error:function()
//        {
//          swal("","Error del servidor","error");
//        }
//      });
//    }
//    function borrarArchivo(url)
//    {
//      swal({
//          title: "ELIMINAR",
//          text: "Confirme para eliminar el documento",
//          type: "warning",
//          showCancelButton: true,
//          closeOnConfirm: false,
//          showLoaderOnConfirm: true
//        },function()
//        {
//          var ID_VALIDACION_DOCUMENTO = $('#tempInputIdValidacionDocumento').val();
//          $.ajax({
//            url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
//            type: 'POST',
//            data: 'URL='+url,
//            success: function(eliminado)
//            {
//              if(eliminado)
//              {
//                mostrar_urls(ID_VALIDACION_DOCUMENTO);
//                swal("","Archivo eliminado");
//                setTimeout(function(){swal.close();},1000);
//              }
//              else
//                swal("","Ocurrio un error al elimiar el documento", "error");
//            },
//            error:function()
//            {
//              swal("","Ocurrio un error al elimiar el documento", "error");
//            }
//          });
//        });
//    }
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


