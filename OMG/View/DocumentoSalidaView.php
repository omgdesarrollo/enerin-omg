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

		<!-- ace styles Para Encabezado-->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
                
                <!--Inicia para el spiner cargando-->
                <!--<link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>-->
                <!--Termina para el spiner cargando-->
                
                
                 <script src="../../js/jquery.js" type="text/javascript"></script>
                 <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
    
                 
                    <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/jsgridconfiguration.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <!--<script src="../../js/jquery.js" type="text/javascript"></script>-->
                <script src="../../js/jqueryblockUI.js" type="text/javascript"></script>               

<!--                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>-->
                 <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
                
                <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
                
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <link href="../../css/filtroSupremo.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
                <!--<script src="../../js/tools.js" type="text/javascript"></script>-->
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <!--<script src="../../js/fDocumentoSalidaView.js" type="text/javascript"></script>-->
                <!-- Empieza libreria que contiene la estructura del jsGridCompleta en configuracion-->
                <script src="../../js/fGridComponent.js" type="text/javascript"></script>
                <!--termina libreria que contiene la estructura del jsGridCompleta--> 
        <style>
            .jsgrid-header-row>.jsgrid-header-cell {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
            }
             .display-none
            {
                display:none;
            }

        </style>              
                
 			 
</head>

        
<body class="no-skin">

       
<?php

require_once 'EncabezadoUsuarioView.php';

?>

             
<div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;"> 

    <button onclick="documentosEntradaComboboxparaModal()" type="button" class="btn btn-success btn_agregar" data-toggle="modal" data-target="#crea_documentoSalida">
        Agregar Documento de Salida
    </button>

    <button type="button" class="btn btn-info btn_refrescar" id="btnrefrescar" onclick="refresh();" >
        <i class="glyphicon glyphicon-repeat"></i>   
    </button>
    
    <div class="pull-right">
        <button type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Excel'">
            <img src="../../images/base/_excel.png" width="30px" height="30px">
        </button>
        <button type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Word'">
            <img src="../../images/base/word.png" width="30px" height="30px"> 
        </button>
        <button type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Pdf'">
            <img src="../../images/base/pdf.png" width="30px" height="30px"> 
        </button> 
    </div>
    
</div>

<br><br><br>

<div id="jsGrid"></div>

<!-- Inicio de Seccion Modal -->
<div class="modal draggable fade" id="crea_documentoSalida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">x</span></button>
              <h4 class="modal-title" id="myModalLabel">Crear Nuevo Documento de Salida</h4>
            </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label class="control-label" for="title">Folio de Entrada:</label>
                        <select id="ID_DOCUMENTO_ENTRADA" class="select">
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group">
                            <label class="control-label" for="title">Folio de Salida:</label>
                            <input type="text"  id="FOLIO_SALIDA" class="form-control" data-error="Ingrese el Folio de Salida" required />
                            <div id="mensaje1" class="help-block with-errors" ></div>
                    </div>
                        
                    <div class="form-group">
                            <label class="control-label" for="title">Fecha de Envio:</label>
                            <input type="date" id="FECHA_ENVIO" class="form-control" data-error="Ingrese la Fecha de Envio" required>
                            <div id="mensaje2"class="help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group">
                            <label class="control-label" for="title">Asunto:</label>
                            <textarea  id="ASUNTO" class="form-control" data-error="Ingrese el Asunto" required></textarea>
                            <div id="mensaje3" class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                            <label class="control-label" for="title">Destinatario:</label>
                            <textarea  id="DESTINATARIO" class="form-control" data-error="Ingrese el Destinatario" required></textarea>
                            <div id="mensaje4" class="help-block with-errors"></div>
                    </div>
                    
                    <div id="DocumentoEntradaAgregarModal"></div>

                    <div class="form-group">
                            <label class="control-label" for="title">Observaciones:</label>
                            <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese la Observacion" required></textarea>
                            <div id="mensaje5"class="help-block with-errors"></div>
                    </div>


                    <div class="form-group">
                        <button type="submit" style="width:49%" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                        <button type="submit" style="width:49%" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
                    </div>
                    
                </div>
        </div>

    </div>
</div>
<!--Final de Seccion Modal-->


<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
      <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Archivos Adjuntos</h4>
      </div>

      <div class="modal-body">
        <div id="DocumentolistadoUrl"></div>
        
        <div class="form-group">
          <div id="DocumentolistadoUrlModal"></div>
			  </div>

        <div class="form-group" method="post" >
          <button type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Adjuntar Archivo</button>
        </div>
      </div><!-- cierre div class-body -->
    </div><!-- cierre div class modal-content -->
  </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal --> 

<script>
var DataGrid=[];
var dataListado=[];
var filtros=[];
var db={};
var gridInstance;

var MyField = function(config)
{
        // data = {};
    jsGrid.Field.call(this, config);
//     console.log(this);
};


MyField.prototype = new jsGrid.Field
({
        css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
                console.log("haber cuando entra aqui");
                console.log(date1);
                console.log(date2);
        },
        itemTemplate: function(value)
        {
//                fecha="0000-00-00";
//                // console.log(this);
//                this[this.name] = value;
//                // console.log(data);
//                if(value!=fecha)
//                {
//                        date = new Date(value);
//                        fecha = date.getDate()+1 +" "+ months[date.getMonth()] +" "+ date.getFullYear().toString().slice(2,4);
//                        return fecha;
//                }
//                else
//                        return "Sin fecha";
return "";
        },
        insertTemplate: function(value)
        {},
        editTemplate: function(value)
        {
                // console.log(this);
//                fecha="0000-00-00";
//                if(value!=fecha)
//                {
//                        fecha=value;
//                }
//                return this._inputDate = $("<input>").attr({type:"date",value:fecha,style:"margin:-5px;width:145px"});
       return "";
       },
        insertValue: function()
        {},
        editValue: function(val)
        {
//                value = this._inputDate[0].value;
//                if(value=="")
//                        return "0000-00-00";
//                else
//                        return $(this._inputDate).val();
return "";
        }
});

var customsFieldsGridData=[
        {field:"customControl",my_field:MyField}
//        {field:"date",my_field:MyField},
];

function inicializarEstructuraGrid(){


return new Promise((resolve,reject)=>{
      estructuraGrid=[{ name: "id_principal", visible:false },
                        { name: "no", title: "NO", type: "text", width:150},
                        { name: "folio_entrada", title: "Folio de Entrada", type: "text", width:150},
                        { name: "folio_salida", title: "Folio de Salida", type: "text", width:150},
                        { name: "nombre_empleado", title: "Responsable Tema", type: "text", width:150},
                        { name: "fecha_envio", title: "Fecha de Envio", type: "text", width:150},
                        { name: "asunto", title: "Asunto", type: "text", width:150},
                        { name: "destinatario", title: "Destinatario", type: "text", width:150},
                        { name: "clave_autoridad", title: "Autoridad Remitente", type: "text", width:150},
                        { name: "archivo_adjunto", title: "Arvhivo Adjunto", type: "text", width:150},
                        { name: "observaciones", title: "Observacion", type: "text", width:150},
                        { name: "delete", title: "Opcion", type: "customControl", width:150}
                     ];
      resolve();
  })
  
    }
ultimoNumeroGrid=0;
//DataGrid = [];
//dataListado=[];
//filtros=[];
//ultimoNumeroGrid=0;
//DocumentoEntradasComboBox=[];

//listarDatos();
//inicializarFiltros();
//construirGrid();
//construirFiltros();

function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
                // { id:"noneUno", type:"none"},
                // { id: "id_principal", visible:false },
                {id:"noneUno", type:"none"},
                { id: "folio_entrada", name: "Folio Entrada", type: "text"},
                { id: "folio_salida", name: "Folio Entrada", type: "text"},
                // { name: "fecha_recepcion", title: "Fecha Recepción", type: "text", width, validate: "required" },   
                {id:"nombre_empleado", name: "Referencia",type:"text"},
    //            {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
                {id:"fecha_envio",type:"date"},
                {id:"asunto",type:"text"},
                {id:"destinatario",type:"text"},
                {id:"clave_autoridad",type:"text"},
                {id:"archivo_adjunto",type:"text"},
                {id:"observaciones",type:"text"},
                {name:"opcion",id:"opcion",type:"opcion"}
                // { id:"delete", name:"Opción", type:"customControl",sorting:""},
        ];
        resolve();
    });
}

//()=>{  esto e igual a function(){
inicializarEstructuraGrid().then(()=>{
   
    inicializarEstructuraGrid().then(()=>{
        construirFiltros();
    })
 })

</script>



<!-- INICIA SECCION PARA CARGAR ARCHIVOS--> 
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
{% var t = $('#fileupload').fileupload('active'); var i,file; %}
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
      {% if(t == 1){ if( $('#tempInputIdDocumentoSalida').length > 0 ) { var ID_DOCUMENTO = $('#tempInputIdDocumentoSalida').val(); mostrar_urls(ID_DOCUMENTO);}else{ $('#btnAgregarDocumentoSalidaRefrescar').click(); } } %}
</script>
<!-- FINALIZA SECCION PARA CARGAR ARCHIVOS-->



    <!--Inicia para el spiner cargando-->
    <!--<script src="../../js/loaderanimation.js" type="text/javascript"></script>-->
    <!--Termina para el spiner cargando-->
    
    <!--Bootstrap-->
    <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
    <!--Para abrir alertas de aviso, success,warning, error-->       
    <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
    
    <!--Para abrir alertas del encabezado-->
<!--    <script src="../../assets/probando/js/ace-elements.min.js"></script>
    <script src="../../assets/probando/js/ace.min.js"></script>-->
    
        <!-- js cargar archivo -->
<!--        <script src="../../assets/FileUpload/js/jquery.min.js"></script>
        <script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>-->
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
        
<!--        <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
        <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">-->



            
	</body>
     
</html>




