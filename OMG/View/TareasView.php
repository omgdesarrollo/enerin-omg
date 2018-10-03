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
		<!-- ace styles Para Encabezado-->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
                <!--JQUERY-->
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                <!--Para abrir alertas de aviso, success,warning, error--> 
                <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
                <!--JGROWL-->
                <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
                <!--Libreria local, para grafica-->
                <script src="../../assets/chart/loader.js" type="text/javascript"></script>
                <!--Libreria web, para grafica-->
                <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/fChartComponent.js" type="text/javascript"></script>
                <script src="../../js/fTareasView.js" type="text/javascript"></script>
                <script src="../../js/fGridComponent.js" type="text/javascript"></script>
                <script src="../../js/excelexportarjs.js" type="text/javascript"></script>
                <script src="../../js/fechas_formato.js" type="text/javascript"></script>
    

                
        <style>
            .jsgrid-header-row>.jsgrid-header-cell {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
            }
             .jsgrid-row:hover{
                background-color: red;
            }
            /*.jsgrid-selected-row>*/
/*            .jsgrid-cell:hover{
                background-color: #ccccff;
                 cursor: cell;
            }*/
            
            .display-none
            {
                display:none;
            }
            
            .modal-body{color:#888;max-height: calc(100vh - 110px);overflow-y: auto;}                    
            .modal-lg{width: 60%;}
            .modal {/*En caso de que quieras modificar el modal*/z-index: 1050 !important;}
            body{overflow:hidden;}
        </style>              
                
 			 
</head>

        
<body class="no-skin">     

<?php

require_once 'EncabezadoUsuarioView.php';

?>

<div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;">             

    <button onClick="archivoyComboboxparaModal();" type="button" class="btn btn-success btn_agregar" data-toggle="modal" data-target="#crea_tarea">
        Agregar
    </button>

<!--    <button onClick="loadChartView(true)" type="button" id="btn_informe" class="btn btn-success btn_agregar" data-toggle="modal" data-target="#informe_tareas">
        Informe
    </button>    -->

    <button type="button" id="btnAgregarDocumentoEntradaRefrescar" class="btn btn-info btn_refrescar" id="btnrefrescar" onclick="refresh();" >
        <i class="glyphicon glyphicon-repeat"></i>   
    </button>

    <div class="pull-right">    
<!--        <button onClick="loadChartView(true)" title="Informe" type="button" class="btn btn-success style-filter" data-toggle="modal" data-target="#informe_tareas">
            <i class="fa fa-pie-chart"></i>
        </button>-->
        <button onClick="graficar()" title="Graficar Circular" type="button" class="btn btn-success style-filter" data-toggle="modal" data-target="#Grafica">
            <i class="fa fa-pie-chart"></i>
        </button>

        <button style="width:48px;height:42px" type="button"  class="btn_agregar" id="toExcel">
            <img src="../../images/base/_excel.png" width="30px" height="30px">
        </button>
    </div>
    
</div>

<br><br><br>

<div id="jsGrid"></div>

<!-- Inicio de Seccion Modal Crear Tarea -->
<div class="modal draggable fade" id="crea_tarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Crear Nuevo Tema</h4>
            </div>

            <div id="validacion_empleado" class="modal-body">
                <!--<div id="ok"></div>-->
                    <div class="form-group">
                        <label class="control-label" for="title">Referencia:</label>
                        <input type="text"  id="REFERENCIA" class="form-control" data-error="Ingrese el Contrato" required />
                        <div id="mensaje1" class="help-block with-errors" ></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title"> Tema:</label>
                        <textarea  id="TAREA" class="form-control" data-error="Ingrese la Tarea" required></textarea>
                        <div id="mensaje2"class="help-block with-errors"></div>
                        <div id="msgerrorTarea" ></div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label" for="title">Responsable del Plan:</label>
                        <select id="ID_EMPLEADOMODAL" class="select2">
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label" for="title">Fecha de Creacion:</label>
                        <input type="date" id="FECHA_CREACION" class="form-control" data-error="Ingrese la Fecha de Recepcion" required>
                        <div id="mensaje3" class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Fecha de Alarma:</label>                         
                        <input type="date" id="FECHA_ALARMA" class="form-control" data-error="Ingrese la Fecha de Alarma" required>
                        <div id="mensaje4" class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Fecha de Cumplimiento:</label>
                        <input type="date" id="FECHA_CUMPLIMIENTO" class="form-control" data-error="Ingrese la Fecha de Cumplimiento" required></textarea>
                        <div id="mensaje5"class="help-block with-errors"></div>
                    </div>
                
                    <div class="form-group">
                            <label class="control-label" for="title">Status:</label>
                            <select id="STATUS_TAREA">
                            <option value="1">En proceso</option>
                            <option value="2">Suspendido</option>
                            <option value="3">Terminado</option>
                            </select>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label" for="title"> Observaciones:</label>
                        <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese una observacion" required></textarea>
                        <div id="mensaje6"class="help-block with-errors"></div>
                    </div>
                
                    <!--<div id="DocumentoEntradaAgregarModal"></div>-->

                    <div class="form-group">
                        <button style="width:49%;" type="submit" id="btn_crearTarea" class="btn crud-submit btn-info botones_vista_tabla">Guardar</button>
                        <button style="width:49%;" type="submit" id="btn_limpiarModalTarea"  class="btn crud-submit btn-info botones_vista_tabla">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Final de Seccion Modal Crear Tarea-->

<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:inherit" aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Archivos Adjuntos</h4>
		      </div>

		      <div class="modal-body">
                        <div id="DocumentolistadoUrl"></div>

                        
                        <div class="form-group">
                                <div id="DocumentolistadoUrlModal"></div>
			</div>

                        <div class="form-group" method="post" >
                            <button type="submit" id="subirArchivos"  class="btn crud-submit btn-info botones_vista_tabla" style="width: 100%;">Adjuntar Archivo</button>
                        </div>
                      </div><!-- cierre div class-body -->
                </div><!-- cierre div class modal-content -->
        </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->


<!-- Inicio de Seccion Modal Informe-->
<!--<div class="modal draggable fade" id="informe_tareas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="loaderModalMostrar"></div>
        <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span style="font-size:inherit" aria-hidden="true" class="closeLetra">X</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Informe Tareas</h4>
            </div>

            <div class="modal-body">

              <div id="graficaTareas"></div>

            </div> cierre div class-body 
        </div> cierre div class modal-content 
    </div> cierre div class="modal-dialog" 
</div> cierre del modal -->

<!-- Modal grafica -->
<!--<div class="modal draggable fade" id="Grafica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeLetra">X</span>
                </button>
                <h4 class="modal-title" id="myModalLabelNuevaEvidencia">Informe de Temas Especiales</h4>
            </div>

            <div class="modal-body">
                <div id="graficaPie" ></div>

                <div class="form-group" method="post" style="text-align:center" id="BTNS_GRAFICAMODAL">
                    <button type="submit" id="BTN_ANTERIOR_GRAFICAMODAL" class="btn crud-submit btn-info" style="width:90%" >Recargar</button>
                </div>
            </div>
            
        </div>
    </div>
</div>-->

<!-- Modal grafica -->
<div id="jsChart"></div>

<script>
var DataGrid = [];
var dataListado = [];
//EmpleadosCombobox=[];
var thisEmpleados=[];
var filtros=[];
var db={};
var gridInstance;
var ultimoNumeroGrid=0;
var DataGridExcel=[];
var origenDeDatosVista="tareas";

//google.charts.load('current', {'packages':['corechart']});
// $('tbody').sortable();
var activeChart = -1;
var chartsCreados = [];
var chartsFunciones = [()=>{graficar()},(dataNextGrafica,concepto)=>{graficar2(dataNextGrafica,concepto)},(dataNextGrafica,concepto)=>{graficar3(dataNextGrafica,concepto)}];


var MyComboEmpleados = function(config)
{
    jsGrid.Field.call(this, config);
};
 
MyComboEmpleados.prototype = new jsGrid.Field
({
        align: "center",
        sorter: function(date1, date2)
        {
            
        },
        itemTemplate: function(value)
        {
                var res ="";
                value!=null ?
                $.each(thisEmpleados,(index,val)=>{
                        if(val.id_empleado == value)
                                res = val.nombre_completo;
                })
                : console.log();
                return res;
        },
        insertTemplate: function(value)
        {},
        editTemplate: function(value,todo)
        {
                var temp = "";
                
                $.each(thisEmpleados,(index,val)=>
                {
                        if(val.id_empleado == value)
                        {
                            temp += "<option value='"+val.id_empleado+"' selected>"+val.nombre_completo+"</option>";
                        }
                        else
                            temp += "<option value='"+val.id_empleado+"'>"+val.nombre_completo+"</option>";
                })
                this._inputDate = $("<select>").attr({style:"margin:-5px;width:145px"});
                $(this._inputDate[0]).append(temp);

                return this._inputDate[0];
                
        },
        insertValue: function()
        {},
        editValue: function()
        {
                if( this._inputDate[1] == undefined )
                        return $(this._inputDate[0]).val();
                else
                        return this._inputDate[1];
        }
});

 
 var customsFieldsGridData=[
         {field:"customControl",my_field:MyCControlField},
//        {field:"porcentaje",my_field:porcentajesFields},
        {field:"comboEmpleados",my_field:MyComboEmpleados},
];
 
 
estructuraGrid= [
    { name: "id_principal",visible:false},
    { name:"no",title:"No",width:50},
    { name: "referencia",title:"Referencia", type: "textarea",width:200},
    { name: "tarea",title:"Tema", type: "textarea", validate: "required",width:200 },
    { name: "id_empleado", title: "Responsable", type: "comboEmpleados", width:250},
    { name: "fecha_creacion",title:"Fecha de Creacion", type: "text", validate: "required", width:150,editing: false},
    { name: "fecha_alarma",title:"Fecha de Alarma", type: "text", validate: "required", width:150,},
    { name: "fecha_cumplimiento",title:"Fecha de Cumplimiento", type: "text", validate: "required", width:190,editing: false},
    { name: "status_tarea", title:"Estatus", type: "select", width:150,valueField:"status_tarea",textField:"descripcion",
        items:[{"status_tarea":"1","descripcion":"En Proceso"},{"status_tarea":"2","descripcion":"Suspendido"},{"status_tarea":"3","descripcion":"Terminado"}]
    },
    { name: "observaciones",title:"Observaciones", type: "textarea", width:150,},
    { name: "archivo_adjunto",title:"Archivo Adjunto", type: "text", validate: "required",width:150,editing:false },
    { name: "registrar_programa",title:"Programa", type: "text", validate: "required",width:160, editing:false },
    { name: "avance_programa",title:"Avance del Programa", type: "text", validate: "required",width:180, editing:false },      
    { name:"delete", title:"Opción", type:"customControl",sorting:"", width:100}
], 
 
construirGrid();
inicializaChartjs();
 
inicializarFiltros().then((resolve)=>
{ 
    construirFiltros();
    listarThisEmpleados();
    listarDatos();
},
(error)=>
{
    growlError("Error!","Error al construir la vista, recargue la página");
}); 
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
        {% if(t == 1){ if( $('#tempInputIdDocumento').length > 0 ) { var ID_TAREA = $('#tempInputIdDocumento').val(); mostrar_urls(ID_TAREA);refresh();}else{ $('#btnAgregarDocumentoEntradaRefrescar').click(); } } %}
</script>
<!-- FINALIZA SECCION PARA CARGAR ARCHIVOS-->

    
    <!--Bootstrap-->
    <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!--Para abrir alertas del encabezado-->
    <script src="../../assets/probando/js/ace-elements.min.js"></script>
    <script src="../../assets/probando/js/ace.min.js"></script>
    
    <!-- js cargar archivo -->
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

    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
            
	</body>
     
</html>




