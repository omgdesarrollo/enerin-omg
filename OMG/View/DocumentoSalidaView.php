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
                  <!--LIBRERIA SWEET ALERT 2-->
                <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
                <!--END LIBRERIA SWEET ALERT 2-->
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <link href="../../css/filtroSupremo.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
                <!--<script src="../../js/tools.js" type="text/javascript"></script>-->
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/fDocumentoSalidaView.js" type="text/javascript"></script>
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
var encabezado="";
var mensaje="";
var thisAutoridad=[];

var MyCombo = function(config)
{
        // data = {};
    jsGrid.Field.call(this, config);
//     console.log(this);
};
 
MyCombo.prototype = new jsGrid.Field
({
        // css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
                console.log("haber cuando entra aqui");
                console.log(date1);
                console.log(date2);
        },
        itemTemplate: function(value,todo)
        {
                console.log(value);
                console.log(value);
        },
        insertTemplate: function(value)
        {},
        editTemplate: function(value)
        {
                // console.log(this);
                fecha="0000-00-00";
                if(value!=fecha)
                {
                        fecha=value;
                }
                return this._inputDate = $("<input>").attr({type:"date",value:fecha,style:"margin:-5px;width:145px"});
        },
        insertValue: function()
        {},
        editValue: function(val)
        {
                value = this._inputDate[0].value;
                if(value=="")
                        return "0000-00-00";
                else
                        return $(this._inputDate).val();
        }
});

var customsFieldsGridData=[
        {field:"customControl",my_field:MyCControlField},
        {field:"combo",my_field:MyCombo},
//        {field:"date",my_field:MyField},
];

function inicializarEstructuraGrid(){

return new Promise((resolve,reject)=>{
      
      estructuraGrid=[{ name: "id_principal", visible:false },
                        { name: "no", title: "No", type: "text", width:50,editing:false},
                        { name: "folio_entrada", title: "Folio de Entrada", type: "text", width:150,editing:false},
                        { name: "folio_salida", title: "Folio de Salida", type: "text", width:150,editing:false},
                        { name: "nombre_empleado", title: "Responsable Tema", type: "text", width:150},
                        { name: "fecha_envio", title: "Fecha de Envio", type: "text", width:150,editing:false},
                        { name: "asunto", title: "Asunto", type: "text", width:150},
                        { name: "destinatario", title: "Destinatario", type: "text", width:150},
                        { name: "id_autoridad", title: "Autoridad Remitente", type: "combo", width:150},
                        { name: "archivo_adjunto", title: "Archivo Adjunto", type: "text", width:150,editing:false},    
                        { name: "observaciones", title: "Observacion", type: "text", width:150},
                        { name: "delete", title: "Opcion", type: "customControl", width:150}
                     ];
       resolve();
  })

  
    }
ultimoNumeroGrid=0;

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
                {id:"id_autoridad",type:"combobox",data:thisAutoridad,descripcion:"clave_autoridad"},
              { id:"noneDos", type:"none"},
                {id:"observaciones",type:"text"},
                {name:"opcion",id:"opcion",type:"opcion"}
                // { id:"delete", name:"Opción", type:"customControl",sorting:""},
        ];
        resolve();
    });
}

//()=>{  esto e igual a function(){


inicializarEstructuraGrid().then(()=>{
        listarAutoridades().then(()=>
        {
                inicializarEstructuraGrid().then(()=>{
                        construirGrid();
                        inicializarFiltros().then(()=>{
                                construirFiltros();
                                listarDatos()
                        });
                });
        });
 });
 
 function listarAutoridades()
{
        return new Promise((resolve,reject)=>
        {
                // tempData=[];
                $.ajax({
                        url:'../Controller/AutoridadesRemitentesController.php?Op=mostrarCombo',
                        type: 'GET',
                        success:function(autoridades)
                        {
                                // tempData = autoridades;
                                thisAutoridad = autoridades;
                                resolve("autoridades");
                        }
                });
        });
        
}
 
 function listarDatos()
{

      return new Promise((resolve,reject)=>
    {
        URL = 'filesDocumento/Salida/';
        __datos=[];
        $.ajax({
                url:'../Controller/DocumentosSalidaController.php?Op=Listar',
                type: 'GET',
                data:"URL="+URL,
                beforeSend:function()
                {
                        growlWait("Solicitud","Solicitando Datos...");
                },
                success:function(data)
                {
                        if(typeof(data)=="object")
                        {
                                growlSuccess("Solicitud","Registros obtenidos");
                                dataListado = data;
                                $.each(data,function (index,value)
                                {
                                        __datos.push( reconstruir(value,index+1) );
                                });
                                console.log(__datos);
                                DataGrid = __datos;
                                gridInstance.loadData();
                                resolve();
                        }
                        else
                        {
                                growlSuccess("Solicitud","No Existen Registros de Evidencias");
                                reject();
                        }
                },
                error:function(e)
                {
                        console.log(e);
                        growlError("Error","Error en el servidor");
                        reject();
                }
        });
    });
//    var listfunciones=[variablefunciondatos];
//    ajaxHibrido(datosParamAjaxValues,listfunciones);
//    DataGrid = __datos;
//    }
}

function reconstruir(value,index)
{
    tempData=new Object();
    ultimoNumeroGrid = index;
    tempData["id_principal"] = [];
    tempData["id_principal"].push({'id_documento_salida':value.id_documento_salida});
    
    tempData["no"]= index;
    tempData["folio_entrada"]=value.folio_entrada;
    tempData["folio_salida"]=value.folio_salida;
    tempData["id_empleado"]= value.nombre_empleado;
    tempData["fecha_envio"]=value.fecha_envio;
    tempData["asunto"]=value.asunto;
    tempData["destinatario"]=value.destinatario;
    tempData["id_autoridad"]=value.id_autoridad;
    tempData["archivo_adjunto"] = "<button onClick='mostrar_urls("+value.id_documento_salida+")' type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
    tempData["archivo_adjunto"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Mostrar</button>";
    tempData["observaciones"]=value.observaciones;
    
    
    if(value.archivosUpload[0].length==0)
         tempData["id_principal"].push({eliminar : 1});
      else
           tempData["id_principal"].push({eliminar : 0});
//    tempData["delete"]= [{"existe_archivo":value.archivosUpload[0].length}];
    tempData["id_principal"].push({editar : 1});
    tempData["delete"]= tempData["id_principal"] ;
     
    return tempData;
}
function componerDataListado(value)// id de la vista documento, listo
{
    id_vista = value.id_documento_entrada;
    id_string = "id_documento_salida";
    $.each(dataListado,function(indexList,valueList)
    {
        $.each(valueList,function(ind,val)
        {
            if(ind == id_string)
                    ( val==id_vista) ? dataListado[indexList]=value : console.log();
        });
    });
}
function componerDataGrid()//listo
{
    __datos = [];
    $.each(dataListado,function(index,value){
        __datos.push(reconstruir(value,index+1));
    });
    DataGrid = __datos;
}

function preguntarEliminar(data)
{
    console.log("jajaja",data);
    swal({
        title: "",
        text: "¿Eliminar Documento Entrada?",
        type: "info",
        showCancelButton: true,
        // closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
        }).then((confirmacion)=>{
                if(confirmacion)
                {
                        eliminarDocumentoSalidaRegistro(data);
                }
        });
}

 function eliminarDocumentoSalidaRegistro(id_afectado)
 {
        $.ajax({
                url:"../Controller/DocumentosSalidaController.php?Op=Eliminar",
                type:"POST",
                data:"ID_DOCUMENTO_ENTRADA="+JSON.stringify(id_afectado),
                // beforeSend
                success:function(data)
                {
                        if(data)
                        {
                                dataListadoTemp=[];
                                dataItem = [];
                                numeroEliminar=0;
                                itemEliminar={};
                                id = id_afectado.id_documento_entrada;
                                $.each(dataListado,function(index,value)
                                {
                                        value.id_documento_entrada != id ? dataListadoTemp.push(value) : (dataItem.push(value), numeroEliminar=index+1);
                                });
                                console.log(dataListadoTemp);
                                itemEliminar = reconstruir(dataItem[0],numeroEliminar);
                                DataGrid = [];
                                dataListado = dataListadoTemp;
                                $.each(dataListado,function(index,value)
                                {
                                        DataGrid.push( reconstruir(value,index+1) );
                                });
                                gridInstance.loadData();
                                growlSuccess("Eliminación","Registro Eliminado");
                        }
                        else
                                growlError("Error Eliminación","Error al Rliminar Registro");
                },
                error:function()        
                {
                        growlError("Error Eliminación","Error del servidor");
                }
        });
 }
 
 function actualizarDocumentoSalida(id)
{
        url = "filesDocumento/Salida/";
        $.ajax({
                url:'../Controller/DocumentosEntradaController.php?Op=Listar',
                type: 'GET',
                data:"URL="+url,
                success:function(datos)
                {
                        if(typeof(datos)=="object")
                        {
                                // growlSuccess("Actulización","Se actualizaron los campos");
                                $.each(datos,function(index,value){
                                        componerDataListado(value);
                                });
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                        else
                        {
                                growlError("Actualizar Vista","No se pudo actualizar la vista, refresque");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
        });
}

 
 function refresh(){
     
     inicializarEstructuraGrid().then(()=>{
   
    inicializarEstructuraGrid().then(()=>{
        construirGrid();
 
    
        inicializarFiltros().then(()=>{
                construirFiltros();
                  listarDatos()
            });
    });   
        
 });
 }


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
      {% if(t == 1){ if( $('#tempInputIdDocumentoSalida').length > 0 ) { var ID_DOCUMENTO = $('#tempInputIdDocumentoSalida').val(); mostrar_urls(ID_DOCUMENTO);actualizarDocumentoSalida(ID_DOCUMENTO);}else{ $('#btnAgregarDocumentoSalidaRefrescar').click(); } } %}
</script>
<!-- FINALIZA SECCION PARA CARGAR ARCHIVOS-->



    <!--Inicia para el spiner cargando-->
    <!--<script src="../../js/loaderanimation.js" type="text/javascript"></script>-->
    <!--Termina para el spiner cargando-->
    
    <!--Bootstrap-->
    <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
    <!--Para abrir alertas de aviso, success,warning, error-->       
    <!--<script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>-->
    
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




