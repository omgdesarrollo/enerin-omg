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
                <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- text fonts -->
		<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                
                <!--en esta seccion es para poder abrir el modal--> 
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                <!--aqui termina la seccion para poder abrir el modal-->


                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
   
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
                
                <style>
                    
                    .modal
                    {
                        overflow: hidden;
                    }
                    .modal-dialog{
                        margin-right: 0;
                        margin-left: 0;
                    }
                    .modal-header{
                      height:30px;background-color:#444;
                      color:#ddd;
                    }
                    .modal-title{
                      margin-top:-10px;
                      font-size:16px;
                    }
                    .modal-header .close{
                      margin-top:-10px;
                      color:#fff;
                    }
                    .modal-body{
                      color:#888;
                       /*max-height: calc(100vh - 210px);*/
                      max-height: calc(100vh - 110px);
                      overflow-y: auto;
                    }
                    .modal-body p {
                      text-align:center;
                      padding-top:10px;
                    }
                    
                                    
/*                    div#winVP {
			position: relative;
			height: 350px;
			border: 1px solid #dfdfdf;
			margin: 10px;
		}*/
                
                   
                    
/*                .main-encabezado {
                        background: #333;
                        color: white;
                        height: 80px;

                        width: 100%;  hacemos que la cabecera ocupe el ancho completo de la página 
                        left: 0;  Posicionamos la cabecera al lado izquierdo 
                        top: 0;  Posicionamos la cabecera pegada arriba 
                        position: fixed;  Hacemos que la cabecera tenga una posición fija 
                    }    */
                    
/*Inicia estilos para mantener fijo el header*/                    
/*                    .table-fixed-header {
    display: table;  1 
    position: relative;
    padding-top: calc(~'2.5em + 2px');  2 
    
    table {
        margin: 0;
        margin-top: calc(~"-2.5em - 2px");  2 
    }
    
    thead th {
        white-space: nowrap;
        
         3 - apply same styling as for thead th 
         4 - compensation for padding-left 
        &:before {
            content: attr(data-header);
            position: absolute;
            top: 0;
            padding: .5em 1em;  3 
            margin-left: -1em;  4 
        }
    }
}*/

 /* 5 - setting height and scrolling */
.table-container {
    max-height: 70vh; /* 5 */
    overflow-y: auto; /* 5 */
        
        /* 6 - same styling as for thead th */
        &:before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        min-height: 2.5em;             /* 6 */
        border-bottom: 2px solid #DDD; /* 6 */
        background: #f1f1f1;           /* 6 */
    }
}
/*Finaliza estilos para mantener fijo el header*/                    
                                      
                    
                </style>
                
                    
                
 			 
	</head>

        
        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>


<!--<div style="height: 5px"></div>-->

             
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


<!--<div class="table-fixed-header" style="display:none;" id="myDiv" class="animate-bottom">--> 
    <div class="table-container">
        
        <table class="tbl-qa" id="idTable">
		  <!--<thead>-->
            
            
                            <tr>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                                <th class="table-header" colspan="2">Validacion</th>
                                <th class="table-header"></th>
                                <th class="table-header"></th>
                          </tr>
                  
            
			  <tr>
				
                              <th class="table-header">Clave Documento</th>
                                <th class="table-header">Nombre Documento</th>
                                <th class="table-header">Responsable del Documento</th>
                                <th class="table-header">Tema y Responsable</th>
                                <th class="table-header">Documento Adjunto</th>
                                <th class="table-header">Requisitos</th>
                                <th class="table-header">Registros</th>
                                <th class="table-header">Responsable Documento</th>
                                <th class="table-header">Responsable Tema</th>
                                <th class="table-header">Observaciones</th>
                                <!--<th class="table-header">Plan de Accion</th>-->
                                <th class="table-header">Desviacion Mayor</th>
                                
			  </tr>
            
                          
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  

                      $Lista = Session::getSesion("listarValidacionDocumentos");
                      $ListaReqisitos = Session::getSesion("listarAsignacionTemasRequisitos");

                  

//                      $numeracion = 1;
                  

                      foreach ($Lista as $filas)
                          {
                          if($filas["clave_documento"]!="SIN DOCUMENTO"){
                          ?>			 
                      
                        <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                                
                                
                                
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clave_documento','<?php echo $filas["id_validacion_documento"]; ?>')" 
                                onClick="showEdit(this);"><?php echo $filas["clave_documento"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_validacion_documento"]; ?>')" 
                                onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado_documento','<?php echo $filas["id_validacion_documento"]; ?>')" 
                                onClick="showEdit(this);"><?php echo $filas["nombre_empleado_documento"]." ".$filas["apellido_paterno_documento"]." ".$filas["apellido_materno_documento"]; ?></td>
<!--                                <td contenteditable="false" onBlur="saveToDatabase(this,'clausula','<?php //echo $filas["id_validacion_documento"]; ?>')" 
                                onClick="showEdit(this);"><?php //echo $filas["clausula"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado_tema','<?php //echo $filas["id_validacion_documento"]; ?>')"
                                onClick="showEdit(this);"><?php //echo $filas["nombre_empleado_tema"]." ".$filas["apellido_paterno_tema"]." ".$filas["apellido_materno_tema"]; ?></td>
                                -->
                                
                                <td>
                                        <button onClick="mostrarTemaResponsable(<?php echo $filas['id_documento'] ?>);" type="button" class="btn btn-success" data-toggle="modal" data-target="#mostrar-temaresponsable">		                                
                                                <i class="ace-icon fa fa-book" style="font-size: 20px;"></i>
                                                Ver
                                        </button>
                                </td>
                                
                                
                                <!-- documento adjunto -->
                                <td>
                                  <button onClick="mostrar_urls(<?php echo $filas['id_validacion_documento'] ?>);" type="button" 
                                  class="btn btn-primary" data-toggle="modal" data-target="#create-itemUrls">
		                                Adjuntar
                                  </button>
                                </td>
                                
                                <!--Mostrar Requisutos-->
                                <td>
                                        <button onClick="mostrarRequisitos(<?php echo $filas['id_documento'] ?>);" type="button" class="btn btn-success" data-toggle="modal" data-target="#mostrar-requisitos">
                                                <i class="ace-icon fa fa-book" style="font-size: 20px;"></i>
                                                Ver
                                        </button>
                                </td>
                                
                                <td>
                                        <button onClick="mostrarRegistros(<?php echo $filas['id_documento'] ?>);" type="button" class="btn btn-success" data-toggle="modal" data-target="#mostrar-registros">
                                                <i class="ace-icon fa fa-book" style="font-size: 20px;"></i>
		                                Ver                                                
                                        </button>
                                </td>
                                
                           
                                <td style="background-color: #ccccff">
                                    <div class="">
                                        <input type="checkbox" style="width: 40px; height: 40px"  name="checkbox" class="checkboxDocumento" 
                                            <?php 
                                            if($filas["validacion_documento_responsable"] == "true"){
                                                echo "checked";
                                            }
                                             ?>
                                               onchange="saveCheckBoxToDataBase(this,'validacion_documento_responsable',<?php echo $filas["id_validacion_documento"]; ?>)">
                                    </div>						
                                </td>
                                
                            
                                <td style="background-color: #ccccff">
                                    <div class="">
                                        <input type="checkbox" style="width: 40px; height: 40px" name="checkbox"  class="checkboxDocumento"
                                            <?php 
                                            if($filas["validacion_tema_responsable"] == "true"){
                                                echo "checked";
                                            }
                                             ?>
                                        onchange="saveCheckBoxToDataBase(this,'validacion_tema_responsable',<?php echo $filas["id_validacion_documento"]; ?>)">
                                    </div>						
                                </td>
                                 
                                <td contenteditable="true" onBlur="saveToDatabase(this,'observacion_documento','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["observacion_documento"]; ?></td>
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'observacion_tema','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observacion_tema"]; ?></td>-->
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'plan_accion','<?php //echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["plan_accion"]; ?></td>-->
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'desviacion_mayor','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["desviacion_mayor"]; ?></td>-->
                                
                                <td style="background-color: #ccccff">
                                    <div class="">
                                        <input type="checkbox" style="width: 40px; height: 40px" name="checkbox"  class="checkboxDocumento"
                                            <?php 
                                            if($filas["desviacion_mayor"] == "true"){
                                                echo "checked";
                                            }
                                             ?>
                                        onchange="saveCheckBoxToDataBase(this,'desviacion_mayor',<?php echo $filas["id_validacion_documento"]; ?>)">
                                    </div>						
                                </td>
                                
			  </tr>
                          
                            <?php
                            }
                          }

                            ?>
		  </tbody>
		</table>

                     

<!--			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>-->
    </div>                    	
<!--</div>-->


               
<!-- Inicio modal adjuntar documento -->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Documentos Adjuntos</h4>
        </div>

        <div class="modal-body">
          <div id="DocumentolistadoUrl"></div>
  
          <div class="form-group">
                  <div id="DocumentolistadoUrlModal"></div>
          </div>

          <div class="form-group" method="post" >
                  <button type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Adjuntar Documento</button>
          </div>
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->



               
<!-- Inicio modal Requisitos -->
<div class="modal draggable fade" id="mostrar-requisitos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Lista Registros</h4>
        </div>

        <div class="modal-body">
          
            <div id="RegistrosListado"></div>
  
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal Requisitos-->


<!-- Inicio moda -->
<div class="modal draggable fade" id="mostrar-temaresponsable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Lista Tema y Responsable</h4>
        </div>

        <div class="modal-body">
          
            <div id="TemayResponsableListado"></div>
  
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal-->


                
		<script>
                    
    var id_validacion_documento,columna,objetocheckbox,si_hay_cambio=false;
    
   
    
    
     
    
    
    $(function()
    {
      
        $('.checkboxDocumento').on('change', function()
        {          
          var chekeado=$(objetocheckbox).filter('[type=checkbox]')[0]['checked'];
          alert(chekeado);
            $.ajax({
                url: "../Controller/ValidacionDocumentosController.php?Op=Modificar",
                type: "POST",
                data:'column='+columna+'&editval='+chekeado+'&id='+id_validacion_documento,
                success: function(data)
                {
                    if(data==true)
                    {
                        (chekeado)?
                        swal("","Documento validado"):swal("","Documento no validado");

                        setTimeout(function(){swal.close();},1000);
//                        if(columna=="desviacion_mayor")
//                        {
//                          enviar_notificacion(columna,chekeado,id_validacion_documento);
//                          
//                        }
                    }
                }                
                });
    
        
      });
    
  
    });// Cierra el $function 
 
      function enviar_notificacion(columna,chekeado,id_validacion_documento){
        
          var u=$("#user").val();
//            alert("enviado correccto "+u);
          
          $.ajax({
             url:"../Controller/NotificacionesController.php?Op=enviarNotificacionDesviacionAResponsableContrato",
             data:"columna="+columna+"&checkeado="+chekeado+"&id_validacion_documento="+id_validacion_documento,
             success:function(response){
                 
                 
                 envioCorreo("desarrollador.frv@gmail.com","el asunto ","el mensaje");
                 
             }
              
          });
          
      }
      
      function envioCorreo (para,asunto,mensaje){
          alert("");
          $.ajax({
                    url:"../Controller/EmailController.php?Op=envioCorreo",
                    data:"para="+para+"&asunto="+asunto+"&mensaje="+mensaje,
                    success:function(response){
                         $("#loader").hide();
                    },
                    beforesend:function(){
                        $("#loader").show();
                    },
                    error:function (){
                        
                    }
                    
                 });
      }
      
    function saveCheckBoxToDataBase(checkbox,column,id){
                     id_validacion_documento=id;
                     columna=column;
                     objetocheckbox=checkbox;
               }            
            
                
                
		function showEdit(editableObj)
    {
			$(editableObj).css("background","#FFF");
		}
                
     
     
    function saveToDatabase(editableObj,column,id)
    {
                    //alert("entraste aqui ");
        if(si_hay_cambio==true)
        {
            $("#btnrefrescar").prop("disabled",true);            
            $(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            $.ajax({
                    url: "../Controller/ValidacionDocumentosController.php?Op=Modificar",
                    type: "POST",
                    data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
                    success: function(data)
                        {
                            $(editableObj).css("background","#FDFDFD");
                            swal("Actualizacion Exitosa!", "Ok!", "success");
                            setTimeout(function(){swal.close();},1000);
                            $("#btnrefrescar").prop("disabled",false);
                            si_hay_cambio=false;
                        }
                    });
        }
    }
    
    
    
    function saveComboToDatabase(column,id)
    {
      id_seguimiento_entrada=id;
    }
    
    
    function detectarsihaycambio()
    {
        si_hay_cambio=true;
    }
    
    
    function consultarInformacion(url)
    {
        $("#loader").show();
      $.ajax({  
            url: ""+url,  
          success: function(r) {
              $("#idTable").load("ValidacionDocumentosView.php #idTable");
              $("#loader").hide();
            },
            beforeSend:function(r)
            {

            },
            error:function()
            {
                $("#loader").hide();
            }
      });  
    }
 
    function refresh()
    {
      consultarInformacion("../Controller/ValidacionDocumentosController.php?Op=Listar");  
      //window.location.href="ValidacionDocumentosView.php";
    }
    
    function loadSpinner()
    {
      myFunction();
    }
                
                
    function cargadePrograma(foliodeentrada)
    {
      //alert("le has picado al folio de entrada  "+foliodeentrada);
      window.location.href=" GanttView.php?folio_entrada="+foliodeentrada;
//   window.location.replace("http://sitioweb.com");        
    }
    
   

    var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
        ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
        ModalCargaArchivo += "<div class='fileupload-buttons'>";
        ModalCargaArchivo += "<span class='fileinput-button'>";
        ModalCargaArchivo += "<span><a >Agregar documentos(Click o Arrastrar)...</a></span>";
        ModalCargaArchivo += "<input type='file' name='files[]' multiple></span>";
        ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
        ModalCargaArchivo += "<div class='fileupload-progress' >";
        // ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
        ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
        ModalCargaArchivo += "</div></div>";
        ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";
    $("#subirArchivos").click(function()
    {
      agregarArchivosUrl();
    });

    function mostrar_urls(id_validacion_documento)
    {
      var tempDocumentolistadoUrl = "";
      URL = 'filesValidacionDocumento/'+id_validacion_documento;
      $.ajax({
          url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
          type: 'GET',
          data: 'URL='+URL,
          success:function(creado)
          {
            if(creado)
            {
              $.ajax({
                  url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                  type: 'GET',
                  data: 'URL='+URL,
                  success: function(todo)
                  {
                      // console.log(todo[0].length);
                      if(todo[0].length!=0)
                      {
                              tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                              $.each(todo[0], function (index,value)
                              {
                                      nametmp = value.split("^");
                                      name;
                                      fecha = nametmp[0];
                                      $.each(nametmp, function(index,value)
                                      {
                                              if(index!=0)
                                                      (index==1)?name=value:name+="-"+value;
                                      });
                                      tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                      tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\">"+name+"</a></td>";
                                      tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                                      tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                                      tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
                              });
                              tempDocumentolistadoUrl += "</tbody></table>";
                      }
                      if(tempDocumentolistadoUrl == " ")
                      {
                              tempDocumentolistadoUrl = " No hay archivos agregados ";
                      }
                      tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdValidacionDocumento' type='text' style='display:none;' value='"+id_validacion_documento+"'>";                  
                      $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                      $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                      $('#fileupload').fileupload
                      ({
                        url: '../View/',
                      });
                  }
              });
            }
            else
            {
              swal("","Error del servidor","error");
            }
          }
        });
    }
    
    
    function mostrarRequisitos(id_documento)
    {
            ValoresRequisitos = "<ul>";
            //alert("validacion documento"+id_documento);

            $.ajax ({
                url: "../Controller/ValidacionDocumentosController.php?Op=MostrarRequisitosPorDocumento",
                type: 'POST',
                data: 'ID_DOCUMENTO='+id_documento,
                success:function(responserequisitos)
                {
                   $.each(responserequisitos,function(index,value){
                       //alert("Hast aqui"+value.requisito);
                    ValoresRequisitos+="<li>"+value.requisito+"</li>";                                       

                   });
               ValoresRequisitos += "</ul>";     
                   $('#RequisitosListado').html(ValoresRequisitos);
                }
            });
    }
    
    
    function mostrarRegistros(id_documento)
    {
     ValoresRegistros = "<ul>";
//     alert("validacion documento"+id_documento);
     $.ajax ({
         url:"../Controller/ValidacionDocumentosController.php?Op=MostrarRegistrosPorDocumento",
         type: 'POST',
         data: 'ID_DOCUMENTO='+id_documento,
         success:function(responseregistros)
         {
             $.each(responseregistros,function(index,value){
                ValoresRegistros+="<li>"+value.registros+"</li>"; 
             });
             
    ValoresRegistros += "</ul>";
             $('#RegistrosListado').html(ValoresRegistros);
         }
     })
    }
    
    
    function mostrarTemaResponsable(id_documento)
    {
        ValoresTemaResponsable = "<table class='tbl-qa'>\n\
                                    <tr>\n\
                                        <th class='table-header'>Tema</th>\n\
                                        <th class='table-header'>Responsable del Tema</th>\n\
                                    </tr>\n\
                                    <tbody>";
        //alert("validacion documento"+id_documento);
//alert("d");
        $.ajax ({
            url:"../Controller/ValidacionDocumentosController.php?Op=MostrarTemayResponsable",
            type:'POST',
            data:'ID_DOCUMENTO='+id_documento,
            success:function(responseTemayResponsable)
            {
                $.each(responseTemayResponsable,function(index,value){
                  ValoresTemaResponsable+="<tr><td>"+value.clausula+"</td>" ;
                  ValoresTemaResponsable+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";  

                });
                
                ValoresTemaResponsable += "</tbody></table>";
                $('#TemayResponsableListado').html(ValoresTemaResponsable);
            }
                    
        })
        
    }
    
    
    
    function agregarArchivosUrl()
    {
      var ID_VALIDACION_DOCUMENTO = $('#tempInputIdValidacionDocumento').val();
      url = 'filesValidacionDocumento/'+ID_VALIDACION_DOCUMENTO,
      $.ajax({
        url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
        type: 'GET',
        data: 'URL='+url,
        success:function(creado)
        {
          if(creado)
            $('.start').click();
        },
        error:function()
        {
          swal("","Error del servidor","error");
        }
      });
    }
    function borrarArchivo(url)
    {
      swal({
          title: "ELIMINAR",
          text: "Confirme para eliminar el documento",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        },function()
        {
          var ID_VALIDACION_DOCUMENTO = $('#tempInputIdValidacionDocumento').val();
          $.ajax({
            url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
            type: 'POST',
            data: 'URL='+url,
            success: function(eliminado)
            {
              if(eliminado)
              {
                mostrar_urls(ID_VALIDACION_DOCUMENTO);
                swal("","Archivo eliminado");
                setTimeout(function(){swal.close();},1000);
              }
              else
                swal("","Ocurrio un error al elimiar el documento", "error");
            },
            error:function()
            {
              swal("","Ocurrio un error al elimiar el documento", "error");
            }
          });
        });
    }
    function filterTableClaveDocumento()
    {
                // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("idInputClaveDocumento");
      filter = input.value.toUpperCase();
      table = document.getElementById("idTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
  }
                
                
  function filterTableNombreDocumento() 
  {
  // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("idInputNombreDocumento");
      filter = input.value.toUpperCase();
      table = document.getElementById("idTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
  }   
  
                
  function filterTableResponsableDocumento()
  {
  // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputResponsableDocumento");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) 
    {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      } 
    }
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
              {% if (!i && !o.options.autoUpload) { %}
                      <button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>
              {% } %}
              {% if (!i) { %}
                      <button class="cancel" style="padding: 0px 4px 0px 4px;color:white">Cancel</button>
              {% } %}
              </td>
      </tr>
      {% } %} 
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
  {% if(t == 1){ if( $('#tempInputIdValidacionDocumento').length > 0 ) { var ID_VALIDACION_DOCUMENTO = $('#tempInputIdValidacionDocumento').val(); mostrar_urls(ID_VALIDACION_DOCUMENTO);} } %}
</script>
            
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
            <script src="../../assets/probando/js/ace-extra.min.js"></script>

            <!--DHTMLX-->
            <script src="../../codebase/dhtmlx.js"></script>
            
                

                <!--Para cargar archivos-->
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
                
	</body>
     
</html>


