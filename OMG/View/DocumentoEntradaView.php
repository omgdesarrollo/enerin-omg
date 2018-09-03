<?php
        session_start();
        require_once '../util/Session.php';

$Usuario = Session::getSesion("user"); 
        // $listadoUrls= Session::getSesion("getUrlsArchivos");
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
                <!-- <script src="../../assets/probando/js/bootstrap.min.js"></script> -->
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                
                <!--Para abrir alertas de aviso, success,warning, error-->
                <!-- <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/> -->

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- [if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif] -->

		<!-- <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" /> -->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                

                <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

                <!--Inicia para el spiner cargando-->
                <!-- <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/> -->
                <!--Termina para el spiner cargando-->
                
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <!-- <link href="../../css/jsgridconfiguration.css" rel="stylesheet" type="text/css"/> -->
                <!-- <script src="../../js/jquery.js" type="text/javascript"></script> -->
                             
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>

                <!-- cargar archivo -->
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
                <!-- <script src="../../js/tools.js" type="text/javascript"></script> -->
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>

                <!-- <script src="../../js/fCatalogoProduccionView.js" type="text/javascript"></script> -->

                <script src="../../js/fGridComponent.js" type="text/javascript"></script>

            <style>
                .jsgrid-header-row>.jsgrid-header-cell
                {
                        background-color:#307ECC ;      /* orange */
                        font-family: "Roboto Slab";
                        font-size: 1.2em;
                        color: white;
                        font-weight: normal;
                }
                
                .modal-body{color:#888;max-height: calc(100vh - 110px);overflow-y: auto;}                    
                .modal-lg{width: 100%;}
                .modal {/*En caso de que quieras modificar el modal*/z-index: 1050 !important;}
                body{overflow:hidden;}
              
                .validar_formulario{
                background: blue; 
                width: 100%; 
                color: white; 
                }
                  
                </style>
 
                    
	</head>

        <body class="no-skin" >
<?php

require_once 'EncabezadoUsuarioView.php';

?>
<div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;">

        <button onClick="DocumentoArchivoAgregarModalF();" type="button" class="btn btn-success btn_agregar" data-toggle="modal" data-target="#create-item">
		Agregar Documento de Entrada
        </button>
    
        <button id="btnAgregarDocumentoEntradaRefrescar" type="button" class="btn btn-info btn_refrescar" onclick="refresh();" >
                <i class="glyphicon glyphicon-repeat"></i> 
        </button>
</div>

<br><br><br>
<!-- <div style="height: 50px"></div> -->

<div id="jsGrid"></div>


<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:inherit" aria-hidden="true" class="closeLetra">×</span></button>
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

<!-- Inicio de Seccion Modal Crear nueva Entrada-->
<div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:inherit" aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nueva Entrada</h4>
		      </div>

		        <div class="modal-body">
                                    
                                <div class="form-group">
                                        <label class="control-label" for="title"><?php echo "Contrato: ".Session::getSesion("s_cont"); ?></label>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarContratoModal" ></div>
                                </div>    
                
                                <div class="form-group">
                                        <label class="control-label" for="title">Referencia:</label>
                                        <input type="text"  id="FOLIO_REFERENCIA" class="form-control" data-error="Ingrese el Folio de referencia" required />
                                        <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label" for="title">Folio de Entrada:</label>
                                        <textarea  id="FOLIO_ENTRADA" class="form-control" data-error="Ingrese el folio de entrada" required></textarea>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarFolioEntradaModal" ></div>
                                </div>
                        
                                <div class="form-group-">
                                        <label class="control-label" for="title">Fecha Recepcion:</label>
                                        <input type="date" id="FECHA_RECEPCION" class="form-control" 
                                        data-error="Ingrese la Fecha de Recepcion" required/>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarFechaRecepcionModal" ></div>
                                </div>
                        
                                <div class="form-group">
                                        <label class="control-label" for="title">Asunto:</label>
                                        <textarea  id="ASUNTO" class="form-control" data-error="Ingrese el Asunto" required></textarea>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarAsuntoModal" ></div>
                                </div>
                        
                                <div class="form-group">
                                        <label class="control-label" for="title">Remitente:</label>
                                        <textarea  id="REMITENTE" class="form-control" data-error="Ingrese el Remitente" required></textarea>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarRemitenteModal" ></div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="control-label" for="title">Autoridad Remitente:</label>
                                        <select id="ID_AUTORIDADMODAL" class="select">
                                        </select>
                                        <!--<div class="help-block with-errors"></div>-->
                                </div>
                
                                <div class="form-group">
                                        <label class="control-label" for="title">Tema:</label>
                                        
                                        <select   id="ID_TEMAMODAL" class="select">
                                        </select>
                                        
                                </div>
                                        
                                <div class="form-group">
                                        <label class="control-label" for="title">Clasificacion:</label>
                                        <select id="CLASIFICACION">
                                        <option value="1">Con Limite de Tiempo</option>
                                        <option value="2">Sin Limite de Tiempo</option>
                                        <option value="3">Informativo</option>
                                        </select>
                                </div>
                        
                                <div class="form-group">
                                        <label class="control-label" for="title">Status:</label>
                                        <select id="STATUS_DOC" onchange="CambioStatusDocumentoEntrada()">
                                        <option value="1">En proceso</option>
                                        <option value="2">Suspendido</option>
                                        <option value="3">Terminado</option>
                                        </select>
                                </div>
                
                                <div class="form-group-">
                                        <label class="control-label" for="title">Fecha Asignacion:</label>
                                        <input type="date" id="FECHA_ASIGNACION" class="form-control" data-error="Ingrese la Fecha de Asignacion" required/>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarFechaAsignacionModal" ></div>
                                </div>
                                
                                <div class="form-group-">
                                        <label class="control-label" for="title">Fecha Limite de Atencion:</label>
                                        <input type="date" id="FECHA_LIMITE_ATENCION" class="form-control" data-error="Ingrese la Fecha Limite de Atencion" required/>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarFechaLimiteAtencionModal" ></div>
                                </div>

                                <div class="form-group-">
                                        <label class="control-label" for="title">Fecha Alarma:</label>
                                        <input type="date" id="FECHA_ALARMA" class="form-control" data-error="Ingrese la Fecha de Alarma" required/>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarFechaAlarmaModal" ></div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label" for="title">Mensaje para Alarma:</label>
                                        <textarea  id="MENSAJE_ALERTA" class="form-control"></textarea>
                                        <div class="help-block with-errors"></div>
                                        <div id="ValidarMensajeAlarmaModal" ></div>
                                </div>

                                <div id="DocumentoEntradaAgregarModal"></div>

                                
                                <div class="form-group">
                                        <label class="control-label" for="title">Observaciones:</label>
                                        <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese las observaciones" required></textarea>
                                        <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group" method="post" style="text-align:center">
                                        <button style="width:49%" type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                        <button style="width:49%" type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
                                </div>
		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal--> 
             
<script>

var DataGrid=[];
var dataListado=[];
var filtros=[];
var db={};
var gridInstance;
var ws;
var thisjGrowl;

var id_documento_entrada;
var cualmodificar;
var dataListado;
var thisTemas=[];
var thisAutoridad=[];
$("#create-item").draggable();
$("#create-itemUrls").draggable();

var MyDateField = function(config)
{
        // data = {};
    jsGrid.Field.call(this, config);
//     console.log(this);
};
 
MyDateField.prototype = new jsGrid.Field
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
                fecha="0000-00-00";
                // console.log(this);
                this[this.name] = value;
                // console.log(data);
                if(value!=fecha)
                {
                        date = new Date(value);
                        fecha = date.getDate()+1 +" "+ months[date.getMonth()] +" "+ date.getFullYear();
                        return fecha;
                }
                else
                        return "Sin fecha";
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
        editValue: function()
        {
                return $(this._inputDate).val();
        }
});

var customsFieldsGridData=[
        {field:"customControl",my_field:MyCControlField},
        {field:"date",my_field:MyDateField},
];
// var estructuraGrid=[];
function inicializarEstructuraGrid()
{
        return new Promise((resolve,reject)=>{
                estructuraGrid = [
                        { name: "id_principal", visible:false },
                        { name: "folio_referencia", title: "Referencia", type: "text", width:150},
                        { name: "folio_entrada", title: "Folio Entrada", type: "text", width:150},
                        // { name: "fecha_recepcion", title: "Fecha Recepción", type: "text", width, validate: "required" },
                        { name: "fecha_recepcion", title: "Fecha Recepción", type: "date", width:160},

                        { name: "asunto", title: "Asunto", type: "text", width:130},
                        { name: "remitente", title: "Remitente", type: "text", width:150},

                        { name: "id_autoridad", title: "Autoridad Remitente", type: "select",
                                items:thisAutoridad,
                                valueField:"id_autoridad",
                                textField:"clave_autoridad"
                                },

                        { name: "id_tema", title: "Numero Tema", type: "select",
                                items:thisTemas,
                                valueField:"id_tema",
                                textField:"no"},

                        { name: "nombre", title: "Nombre Tema", type: "text", width:150, editing:false },
                        { name: "nombre_empleado", title: "Responsable Tema", type: "text", width:150, editing:false },

                        { name: "clasificacion", title: "Clasificación", type: "select", width:150,valueField:"clasificacion",textField:"descripcion",
                                items:[{"clasificacion":"1","descripcion":"Con limite de tiempo"},{"clasificacion":"2","descripcion":"Sin limite de tiempo"},{"clasificacion":"3","descripcion":"Informativo"}]
                        },

                        { name: "status_doc", title:"Estatus", type: "select", width:150,valueField:"status_doc",textField:"descripcion",
                                items:[{"status_doc":"1","descripcion":"PROCESO"},{"status_doc":"2","descripcion":"SUSPENDIDO"},{"status_doc":"3","descripcion":"TERMINADO"}]
                        },

                        { name: "fecha_asignacion", title: "Fecha Asignación", type: "date", width:160},
                        { name: "fecha_limite_atencion", title: "Fecha Limite Atención", type: "date", width:160},
                        { name: "fecha_alarma", title: "Fecha Alarma", type: "date", width:160},
                        { name: "adjuntar_archivo", title: "Adjuntar Archivos", type: "text", width:150, validate: "required", editing:false},
                        { name: "observaciones", title: "Observaciones", type: "text", width:150},
                        { name:"delete", title:"Opción", type:"customControl",sorting:""},
                        // {type:"control",editButton: true}
                ];
                resolve();
        });
}

ultimoNumeroGrid=0;

listarTemas().then((res)=>{
        listarAutoridades().then((res1)=>{
                inicializarEstructuraGrid().then((res2)=>{
                        construirGrid();
                        inicializarFiltros().then((res3)=>
                        {
                                construirFiltros();
                                listarDatos();
                        });
                });
        });
});

function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
                // { id:"noneUno", type:"none"},
                // { id: "id_principal", visible:false },
                { id: "folio_referencia", name: "Referencia", type: "text"},
                { id: "folio_entrada", name: "Folio Entrada", type: "text"},
                // { name: "fecha_recepcion", title: "Fecha Recepción", type: "text", width, validate: "required" },
                { id: "fecha_recepcion", name: "Fecha Recepción", type: "date"},

                { id: "asunto", name: "Asunto", type: "text"},
                { id: "remitente", name: "Remitente", type: "text"},

                { id: "id_autoridad", name: "Autoridad Remitente", type: "combobox",data:thisAutoridad,descripcion:"clave_autoridad"},

                { id: "id_tema", name: "Numero Tema", type: "combobox", data:thisTemas,descripcion:"no" },

                { id: "nombre", name: "Nombre Tema", type: "text"},
                { id: "nombre_empleado", name: "Responsable Tema", type: "text"},

                { id: "clasificacion", name: "Clasificación", type: "combobox",descripcion:"descripcion",
                        data:[{"clasificacion":1,"descripcion":"Con limite de tiempo"},{"clasificacion":2,"descripcion":"Sin limite de tiempo"},{"clasificacion":3,"descripcion":"Informativo"}]},

                { id: "status_doc",name:"Estatus", type: "combobox", descripcion:"descripcion",
                        data:[{status_doc:"1",descripcion:"PROCESO"},{status_doc:"2",descripcion:"SUSPENDIDO"},{status_doc:"3",descripcion:"TERMINADO"}]
                },

                { id: "fecha_asignacion", name: "Fecha Asignación", type: "date"},
                { id: "fecha_limite_atencion", name: "Fecha Limite Atención", type: "date"},
                { id: "fecha_alarma", name: "Fecha Alarma", type: "date"},
                // { id: "adjuntar_archivo", name: "Adjuntar Archivos", type: "text"},
                { id:"noneDos", type:"none"},
                { id: "observaciones", name: "Observaciones", type: "text"},
                // { id:"delete", name:"Opción", type:"option",sorting:""},
                { id:"opcion",type:"opcion"}
                // { id:"delete", name:"Opción", type:"customControl",sorting:""},
        ];
        resolve();
    });
}

function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        URL = 'filesEvidenciaDocumento/';
        __datos=[];
        $.ajax({
                url:'../Controller/DocumentosEntradaController.php?Op=Listar',
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
}

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

function listarTemas()
{
        return new Promise((resolve,reject)=>{
                $.ajax({
                        url:'../Controller/TemasOficiosController.php?Op=mostrarCombo',
                        type:'GET',
                        success:function(temas)
                        {
                                thisTemas = temas;
                                resolve();
                        }
                });
        });
}

function DocumentoArchivoAgregarModalF()
{
        $('#DocumentolistadoUrl').html(" ");
        $('#DocumentolistadoUrlModal').html(" ");
        $('#DocumentoEntradaAgregarModal').html(ModalCargaArchivo);
        
        $.ajax({
                url:'../Controller/AutoridadesRemitentesController.php?Op=mostrarCombo',
                type: 'GET',
                success:function(autoridades)
                {
                        tempData = "";
                        $.each(autoridades,function(index,value)
                        {
                                tempData += "<option value='"+value.id_autoridad+"'>"+value.clave_autoridad+"</option>";
                        });
                        $("#ID_AUTORIDADMODAL").html(tempData);
                }
        });

        $.ajax({
                url:'../Controller/TemasOficiosController.php?Op=mostrarCombo',
                type:'GET',
                success:function(temas)
                {
                        tempData = "";
                        $.each(temas,function(index,value)
                        {
                                tempData += "<option value='"+value.id_tema+"'>"+value.nombre+"</option>";
                        });
                        $("#ID_TEMAMODAL").html(tempData);
                }
        });
        // $('#fileupload').fileupload();
        $('#fileupload').fileupload({
                url: '../View/'
        });
}

$(function()
{

        $("#FOLIO_ENTRADA").keyup(function()
        {
                var valuefolioentrada=$(this).val();
                verificarExiste(valuefolioentrada,"folio_entrada");
        });
                                        
        // $('.select').on('change', function()
        // {
                // if (cualmodificar == "id_autoridad")
                // {
                //         column="id_autoridad";
                // }
                // else
                //         if (cualmodificar == "status_doc")
                //         {
                //                 column="status_doc";
                //         }else
                //         {
                //                 column="id_tema";
                //         }
        // });

        $("#btn_guardar").click(function()
        {
                var FOLIO_REFERENCIA=$("#FOLIO_REFERENCIA").val();
                var FOLIO_ENTRADA=$("#FOLIO_ENTRADA").val();
                var FECHA_RECEPCION=$("#FECHA_RECEPCION").val();
                var ASUNTO=$("#ASUNTO").val();
                var REMITENTE=$("#REMITENTE").val();
                var ID_AUTORIDADMODAL=$("#ID_AUTORIDADMODAL").val();
                var ID_TEMAMODAL=$("#ID_TEMAMODAL").val();
                var CLASIFICACION=$("#CLASIFICACION").val();
                var STATUS_DOC=$("#STATUS_DOC").val();
                var FECHA_ASIGNACION=$("#FECHA_ASIGNACION").val();
                var FECHA_LIMITE_ATENCION=$("#FECHA_LIMITE_ATENCION").val();
                var FECHA_ALARMA=$("#FECHA_ALARMA").val();
                var DOCUMENTO=$('#fileupload').fileupload('option', 'url');
                var OBSERVACIONES=$("#OBSERVACIONES").val();
                var MENSAJE_ALERTA=$("#MENSAJE_ALERTA").val();

                datos=[];
                datos.push("");
                datos.push(FOLIO_REFERENCIA);//1
                datos.push(FOLIO_ENTRADA);//2
                datos.push(FECHA_RECEPCION);//3
                datos.push(ASUNTO);//4
                datos.push(REMITENTE);//5
                datos.push(ID_AUTORIDADMODAL);//6
                datos.push(ID_TEMAMODAL);//7
                datos.push(CLASIFICACION);//8
                datos.push(STATUS_DOC);//9
                datos.push(FECHA_ASIGNACION);//10
                datos.push(FECHA_LIMITE_ATENCION);//11
                datos.push(FECHA_ALARMA);//12
                datos.push(DOCUMENTO);//13
                datos.push(OBSERVACIONES);//14
                datos.push(MENSAJE_ALERTA);//15
                console.log(datos);
                todoBien = true;
                
                $('#ValidarFolioEntradaModal').html('');
                $('#ValidarFolioEntradaModal').removeClass("validar_formulario");
                
                $('#ValidarFechaRecepcionModal').html('');
                $('#ValidarFechaRecepcionModal').removeClass("validar_formulario");
                
                $('#ValidarAsuntoModal').html('');
                $('#ValidarAsuntoModal').removeClass("validar_formulario");
                
                $('#ValidarRemitenteModal').html('');
                $('#ValidarRemitenteModal').removeClass("validar_formulario");
                
                $('#ValidarClasificacionModal').html('');
                $('#ValidarClasificacionModal').removeClass("validar_formulario");
                
                $('#ValidarFechaAsignacionModal').html('');
                $('#ValidarFechaAsignacionModal').removeClass("validar_formulario");
                
                $('#ValidarFechaLimiteAtencionModal').html('');
                $('#ValidarFechaLimiteAtencionModal').removeClass("validar_formulario");
                
                $('#ValidarFechaAlarmaModal').html('');
                $('#ValidarFechaAlarmaModal').removeClass("validar_formulario");
                
                
                if(datos[2]=="")
                {
                        todoBien = false;
                        $('#ValidarFolioEntradaModal').html('*Campo requerido');
                        $('#ValidarFolioEntradaModal').addClass("validar_formulario");
                }
                if(datos[3]=="")
                {
                        todoBien = false;
                        $('#ValidarFechaRecepcionModal').html('*Campo requerido');
                        $('#ValidarFechaRecepcionModal').addClass("validar_formulario");
                        
                }
                if(datos[4]=="")
                {
                        todoBien = false;
                        $('#ValidarAsuntoModal').html('*Campo requerido');
                        $('#ValidarAsuntoModal').addClass("validar_formulario");
                }
                if(datos[5]=="")
                {
                        todoBien = false;
                        $('#ValidarRemitenteModal').html('*Campo requerido');
                        $('#ValidarRemitenteModal').addClass("validar_formulario");
                }
                if(datos[8]=="")
                {
                        todoBien = false;
                        $('#ValidarClasificacionModal').html('*Campo requerido');
                        $('#ValidarClasificacionModal').addClass("validar_formulario");
                }
                
                if(datos[10]!="")
                {
                        asignacionF = new Date(datos[10]);
                        asignacionF = new Date(asignacionF.getFullYear(),asignacionF.getMonth(),asignacionF.getDate());
                        if(datos[11]!="")
                        {
                                limiteF = new Date(datos[11]);
                                limiteF = new Date(limiteF.getFullYear(),limiteF.getMonth(),limiteF.getDate());
                                if(limiteF >= asignacionF)
                                {
                                        // console.log("Limite mayor o igual a la fecha de asignacion");
                                        if(datos[12]!="")
                                        {
                                                alarmaF = new Date(datos[12]);
                                                alarmaF = new Date(alarmaF.getFullYear(),alarmaF.getMonth(),alarmaF.getDate());
                                                if(limiteF < alarmaF)
                                                {
                                                        // console.log("Alarma menor o igual a la fecha de limite");
                                                        todoBien = false;
                                                        $('#ValidarFechaAlarmaModal').html('*La Fecha Alarma no puede ser mayor que la Fecha Limite');
                                                        $('#ValidarFechaAlarmaModal').addClass("validar_formulario");
                                                }
                                                if(alarmaF < asignacionF)
                                                {
                                                        // console.log("Alarma mayor o igual a la fecha de asignacion");
                                                        todoBien = false;
                                                        $('#ValidarFechaAlarmaModal').html('*La Fecha Alarma no puede ser menor que la Fecha Asginacion');
                                                        $('#ValidarFechaAlarmaModal').addClass("validar_formulario");
                                                }
                                        }
                                }
                                else
                                {
                                        // console.log("La fecha limite no puede ser antes de la asignación");
                                        todoBien = false;
                                        $('#ValidarFechaLimiteAtencionModal').html('*La Fecha Limite no puede ser menor que la Fecha Asginacion');
                                        $('#ValidarFechaLimiteAtencionModal').addClass("validar_formulario");
                                }
                        }
                        else
                        {
                                //Campo requerido limite$
                                todoBien = false;
                                $('#ValidarFechaLimiteAtencionModal').html('*Campo requerido');
                                $('#ValidarFechaLimiteAtencionModal').addClass("validar_formulario");
                        }
                        if(datos[3]!="")
                        {
                                recepcionF = new Date(datos[3]);
                                recepcionF = new Date(recepcionF.getFullYear(),recepcionF.getMonth(),recepcionF.getDate());
                                if(recepcionF > asignacionF)
                                {
                                        todoBien = false;
                                        $('#ValidarFechaRecepcionModal').html('*La Fecha de recepcion no puede ser mayor a la fecha de asignacion');
                                        $('#ValidarFechaRecepcionModal').addClass("validar_formulario");
                                }
                        }
                }
                else
                {
                        //campo requerido asignacion
                        todoBien = false;
                        $('#ValidarFechaAsignacionModal').html('*Campo requerido');
                        $('#ValidarFechaAsignacionModal').addClass("validar_formulario");
                }
                // console.log((todoBien) ? " BIEN " : "Tus valores estan mal/ se pintara en el modal todo lo que sea erroneo o incompleto");
                if(todoBien == true)
                        saveToDatabaseDatosFormulario(datos);
                else
                        swal("","Algo fallo, revise sus datos","error");
        });
                                                        
        $("#btn_limpiar").click(function()
        {
                $("#FOLIO_REFERENCIA").val("");
                $("#FOLIO_ENTRADA").val("");
                $("#FECHA_RECEPCION").val("");
                $("#ASUNTO").val("");
                $("#REMITENTE").val("");
                $("#CLASIFICACION").val("");
                $("#STATUS_DOC").val("");
                $("#FECHA_ASIGNACION").val("");
                $("#FECHA_LIMITE_ATENCION").val("");
                $("#FECHA_ALARMA").val("");
                $("#DOCUMENTO").val("");
                $("#OBSERVACIONES").val("");        
        });

        
});//Se cierra el $function

//function reconstruirTable2(datos)
//{
//    __datos=[];
//     contador=1;
//    $.each(datos,function(index,value){
//        (value.validacion_tema_responsable=="true")?status="validado":status="En Proceso";
//         __datos.push({
//        "No":contador++,
//        "Clave del Documento":value.clave_documento,
//        "Nombre del Documento":value.documento,
//        "Responsable del Documento":value.nombrecompleto,
//        "Tema":"<button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
//        "Requisitos":"<button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
//        "Registros":"<button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
//        "Status":status
//         })
//      });
//      construir(__datos);
//}

function construirGarid(datosF)//listooo 12
{
        widthNormal=120;
        widthDate=150;
        jsGrid.fields.date = MyDateField;        
        $("#jsGrid").html("");
        $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        editing:true,
        heading: true,
        sorting: true,
        paging: true,
        pageSize: 5,
        pageButtonCount: 5,
        data: datosF,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        fields: [
                { name: "id_principal", visible:false },
                { name: "folio_referencia", title: "Referencia", type: "text", width:widthNormal, validate: "",editing:false},
                { name: "folio_entrada", title: "Folio Entrada", type: "text", width:widthNormal, validate: "required",editing:false},
                // { name: "fecha_recepcion", title: "Fecha Recepción", type: "text", width, validate: "required" },
                { name: "fecha_recepcion", title: "Fecha Recepción", type: "date", width:widthDate},

                { name: "asunto", title: "Asunto", type: "text", width:widthNormal, validate: "required",editing:false},
                { name: "remitente", title: "Remitente", type: "text", width:widthNormal, validate: "required",editing:false},

                { name: "id_autoridad", title: "Autoridad Remitente", type: "select",
                        items:thisAutoridad,
                        valueField:"id_autoridad",
                        textField:"clave_autoridad"
                        },

                { name: "id_tema", title: "Numero Tema", type: "select",
                        items:thisTemas,
                        valueField:"id_tema",
                        textField:"no"},

                { name: "nombre", title: "Nombre Tema", type: "text", width:widthNormal, validate: "required", editing:false },
                { name: "nombre_empleado", title: "Responsable Tema", type: "text", width:widthNormal, validate: "required", editing:false },

                { name: "clasificacion", title: "Clasificación", type: "select", width:widthNormal,valueField:"clasificacion",textField:"descripcion",
                        items:[{"clasificacion":"1","descripcion":"Con limite de tiempo"},{"clasificacion":"2","descripcion":"Sin limite de tiempo"},{"clasificacion":"3","descripcion":"Informativo"}]
                },

                { name: "fecha_asignacion", title: "Fecha Asignación", type: "date", width:widthDate, validate: "required" },
                { name: "fecha_limite_atencion", title: "Fecha Limite Atención", type: "date", width:widthDate, validate: "required" },
                { name: "fecha_alarma", title: "Fecha Alarma", type: "date", width:widthDate, validate: "required" },
                { name: "adjuntar_archivo", title: "Adjuntar Archivos", type: "text", width:widthNormal, validate: "required", editing:false },
                { name: "observaciones", title: "Observaciones", type: "text", width:widthNormal },
                {type:"control"}
        ],
        onItemEditing: function(args)
        {
        },
        onItemUpdated: function(args)
        {
                console.log(args);
                columnas={};
                id_afectado=args["item"]["id_principal"][0];
                $.each(args["item"],function(index,value)
                {
                        if(args["previousItem"][index] != value && value!="")
                        {
                                if(index!="id_principal" && !value.includes("<button"))
                                {
                                        columnas[index]=value;
                                }
                        }
                });
                if(columnas!="")
                {
                        $.ajax({
                                url: '../Controller/GeneralController.php?Op=Actualizar',
                                type:'GET',
                                data:'TABLA=documento_entrada'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                                success:function(exito)
                                {
                                        console.log(exito);
                                }
                        });
                }
        },
        
        onItemDeleting: function(args) {
//            console.log(args);
            eliminarDocumentoEntrada(args);

        }
        
        });
        // $("#loader").hide();
}




function reconstruir(value,index)//listoooo
{
        tempData = new Object();

        tempData["id_principal"] = [];
        tempData["id_principal"].push({"id_documento_entrada" : value.id_documento_entrada});
        tempData["id_principal"].push({eliminar : 1});
        tempData["id_principal"].push({editar : 1});

        tempData["folio_referencia"] = value.folio_referencia;

        tempData["folio_entrada"] = value.folio_entrada;

        tempData["fecha_recepcion"] = value.fecha_recepcion;

        tempData["asunto"] = value.asunto;
        tempData["remitente"] = value.remitente;
        
        tempData["id_autoridad"] = value.id_autoridad;

        tempData["id_tema"] = value.id_tema;
                                
        tempData["nombre"] = value.nombre;
        
        tempData["nombre_empleado"] = value.nombre_empleado;
                                
        tempData["clasificacion"] = value.clasificacion;

        tempData["fecha_asignacion"] = value.fecha_asignacion;
        tempData["fecha_limite_atencion"] = value.fecha_limite_atencion;

        tempData["fecha_alarma"] = value.fecha_alarma;

        tempData["status_doc"] = value.status_doc;

        tempData["adjuntar_archivo"] = "<button onClick='mostrar_urls("+value.id_documento_entrada+")' type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
        tempData["adjuntar_archivo"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Mostrar</button>";
                                
        tempData["observaciones"] = value.observaciones;
        tempData["delete"] = tempData["id_principal"];
        
        return tempData;
}

//function reconstruir2(value)//borrar
//{
//        tempData = "";
//        // tempData += "<td contenteditable='false' onBlur='saveToDatabase(this,\"clave_cumplimiento\","+value.id_documento_entrada+")'";
//        // tempData += "onClick='showEdit(this);'>"+value.clave_cumplimiento+"</td>";
//
//        tempData += "<td contenteditable='true' onBlur='saveToDatabase(this,\"folio_referencia\","+value.id_documento_entrada+")'";
//        tempData += "onClick='showEdit(this);'>"+value.folio_referencia+"</td>";
//
//        tempData += "<td onBlur='saveToDatabase(this,\"folio_entrada\","+value.id_documento_entrada+")'";
//        tempData += "onClick='showEdit(this);'>"+value.folio_entrada+"</td>";
//                                
//        tempData += "<td><input style='' value='"+value.fecha_recepcion+"' onBlur='saveToDatabaseDates(this,\"fecha_recepcion\","+value.id_documento_entrada+",";
//        tempData += value.fecha_asignacion+","+value.fecha_limite_atencion+","+value.fecha_alarma+")' type='date'/></td>";
//
//        tempData += "<td contenteditable='true' onBlur='saveToDatabase(this,\"asunto\","+value.id_documento_entrada+")' onClick='showEdit(this);'>"+value.asunto+"</td>";
//        tempData += "<td contenteditable='true' onBlur='saveToDatabase(this,\"remitente\","+value.id_documento_entrada+")' onClick='showEdit(this);'>"+value.remitente+"</td>";
//
//        tempData += "<td><select id='id_autoridad' class='select' onchange='saveComboToDatabase(this,\"id_autoridad\","+value.id_documento_entrada+")'>";
//        $.each(thisAutoridad,function(index,val)
//        {
//                if(val.id_autoridad == value.id_autoridad)
//                        tempData += "<option value='"+val.id_autoridad+"' selected >"+val.clave_autoridad+"</option>";
//                else
//                        tempData += "<option value='"+val.id_autoridad+"' >"+val.clave_autoridad+"</option>";
//        });
//        tempData += "</select></td>";
//        
//        tempData += "<td style='background-color: #ccccff'>";
//        tempData += "<select id='id_clausula' class='select' onchange='saveComboToDatabase(this,\"id_clausula\","+value.id_documento_entrada+")'>";
//        $.each(thisTemas,function(index,val)
//        {
//                if(val.id_tema == value.id_tema)
//                        tempData += "<option value='"+val.id_tema+"'  selected >"+val.no+"</option>";
//                else
//                        tempData += "<option value='"+val.id_tema+"' >"+val.no+"</option>";
//        });
//        tempData += "</select></td>";
//                                
//        tempData += "<td style='background-color: #ccccff' contenteditable='false' onBlur='saveToDatabase(this,\"nombre\","+value.id_documento_entrada+")'";
//        tempData += " onClick='showEdit(this);'>"+value.nombre+"</td>";
//        
//        tempData += "<td style='background-color: #ccccff' contenteditable='false' onBlur='saveToDatabase(this,\"nombre_empleado\","+value.id_documento_entrada+")'";
//        tempData += " onClick='showEdit(this);'>"+value.nombre_empleado+"</td>";
//                                
//        tempData += "<td contenteditable='false' onBlur='saveToDatabase(this,\"clasificacion\","+value.id_documento_entrada+")'>";
//        if(value.clasificacion == 1)
//                tempData += "Con Limite de Tiempo";   
//        if (value.clasificacion == 2)
//                tempData += "Sin Limite de Tiempo";
//        if (value.clasificacion == 3)
//                tempData += "Informativo";
//        tempData += "</td>";
//                                                                
//        tempData += "<td><select id='id_status' class='select' onchange='saveComboToDatabase(this,\"status_doc\","+value.id_documento_entrada+")'>";
//        if(value.status_doc == 1)
//        {
//                tempData += "<option value='1' selected>En proceso</option>";
//                tempData += "<option value='2'>Suspendido</option>";
//                tempData += "<option value='3'>Terminado</option>";
//        }
//        if(value.status_doc == 2)
//        {
//                tempData += "<option value='2' selected>Suspendido</option>";
//                tempData += "<option value='1'>En proceso</option>";
//                tempData += "<option value='3'>Terminado</option>";
//        }
//        if(value.status_doc == 3)
//        {
//                tempData += "<option value='3' selected>Terminado</option>";
//                tempData += "<option value='1'>En proceso</option>";
//                tempData += "<option value='2'>Suspendido</option>";
//        }
//        tempData += "</select></td>";
//
//        tempData += "<td><input style='' value='"+value.fecha_asignacion+"' onBlur='saveToDatabaseDates(this,\"fecha_asignacion\","+value.id_documento_entrada;
//        tempData += ",\""+value.fecha_asignacion+"\",\""+value.fecha_limite_atencion+"\",\""+value.fecha_alarma+"\")' type='date'/></td>";
//
//        tempData += "<td><input style='' value='"+value.fecha_limite_atencion+"' onBlur='saveToDatabaseDates(this,\"fecha_limite_atencion\","+value.id_documento_entrada;
//        tempData += ",\""+value.fecha_asignacion+"\",\""+value.fecha_limite_atencion+"\",\""+value.fecha_alarma+"\")' type='date'/></td>";
//
//        tempData += "<td><input style='' value='"+value.fecha_alarma+"' onBlur='saveToDatabaseDates(this,\"fecha_alarma\","+value.id_documento_entrada;
//        tempData += ",\""+value.fecha_asignacion+"\",\""+value.fecha_limite_atencion+"\",\""+value.fecha_alarma+"\")' type='date'/></td>";
//
//        tempData += "<td><button onClick='mostrar_urls("+value.id_documento_entrada+")' type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
//        tempData += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i>Mostrar</button></td>";
//                                
//        tempData += "<td contenteditable='true' onBlur='saveToDatabase(this,\"observaciones\","+value.id_documento_entrada+")' onClick='showEdit(this);'>"+value.observaciones+"</td>";
//        return tempData;
//}

// jaja();
// function jaja()
// {
//         _datos = new Object();
//         _datos["Referéncia_Nueva"] = "HóLA";
//         console.log(_datos);
// }

// function reconstruirTable(datos)//listooo
// {
//         __datos=[];
//         $.each(datos,function(index,value)
//         {
//                 // tempData += "<tr id='registro_"+value.id_documento_entrada+"' class='table-row'>"+reconstruir(value)+"</tr>";
//                 __datos.push(reconstruir(value));
//         });

//         // console.log(__datos);

//         // $.each(__datos,function(index,value)
//         // {
//         //         _datos = new Object();
//         //         _datos["Referencia"] = value.referencia;
//         //         _datos["Folio Entrada"] = value.folio_entrada;
//         //         _datos["Fecha Recepción"] = value.fecha_recepcion;
//         //         _datos["Asunto"] = value.asunto;
//         //         _datos["Remitente"] = value.remitente;
//         //         _datos["Autoridad Remitente"] = value.autoridad_remitente;
//         //         _datos["Numero Tema"] = value.no_tema;
//         //         _datos["Nombre Tema"] = value.nombre_tema;
//         //         _datos["Responsable Tema"] = value.nombre_empleado;
//         //         _datos["Clasificación"] = value.clasificacion;
//         //         _datos["Fecha Asignación"] = value.fecha_asignacion;
//         //         _datos["Fecha Limite Atención"] = value.fecha_limite_atencion;
//         //         _datos["Fecha Alarma"] = value.fecha_alarma;
//         //         _datos["Adjuntar Archivos"] = value.adjuntar_archivo;
//         //         _datos["Observaciones"] = value.observaciones;
//         //         _datosF.push(_datos);
//         // });

//         // construirGrid(__datos);

// }

// listarDatos(-1);

// function listaraDatos(id_documento)
// {
//         tempData="";
//         // ajaxTemas = ({
//         //         url:'../Controller/TemasOficiosController.php?Op=mostrarCombo',
//         //         type:'GET',
//         //         async:false,
//         // });

//         // ajaxAutoridades = $.ajax
//         // ({
//         //         url:'../Controller/AutoridadesRemitentesController.php?Op=Listar',
//         //         type: 'GET',
//         //         async:false,
//         //         beforeSend:function()
//         //         {
//         //                 $('#loader').show();
//         //         }
//         // });
        
//         // ajaxAutoridades.done(function(autoridades)
//         // {
//                 // thisAutoridad = autoridades;
//                 // $.ajax(ajaxTemas).done(function(temas)
//                 // {
//                 //         thisTemas = temas;
//                 //         var ajaxListado;
//                         if(id_documento==-1)
//                         {
//                                 ajaxListado = ({
//                                 url:'../Controller/DocumentosEntradaController.php?Op=Listar',
//                                 type: 'GET',
//                                 async:false,
//                                 success:function(datos)
//                                 {
//                                         dataListado = datos;                                        
//                                         reconstruirTable(datos);
//                                         $("td").dblclick(function()
//                                         {
//                                                 $(this).prop("contenteditable",true);
//                                                 // $(this).select();
//                                                 // console.log($(this));
//                                         });
//                                 },
//                                 error:function(error)
//                                 {
//                                         swalError("Error en el servidor");
//                                 }
//                                 });
//                         }
//                         else
//                                 ajaxListado=({
//                                 url:'../Controller/DocumentosEntradaController.php?Op=ListarUno',
//                                 type: 'GET',
//                                 data:'ID_DOCUMENTO='+id_documento,
//                                 async:false,
//                                 success:function(datos)
//                                 {
//                                         $.each(datos,function(index,value)
//                                         {
//                                                 tempData += reconstruir(value);
//                                                 componerDataListado(value);
//                                         });
//                                         $("#registro_"+id_documento).html(tempData);
//                                         $('#loader').hide();
//                                         $("td").dblclick(function()
//                                         {
                                                
//                                                 $(this).prop("contenteditable",true);
//                                         });
//                                 },
//                                 error:function(error)
//                                 {
//                                         swalError("Error en el servidor");
//                                 }
//                                 });
//                         $.ajax(ajaxListado);
//                 // }).fail(function(){swalError("Error en el servidor");});
//         // });
//         // ajaxAutoridades.fail(function(){swalError("Error en el servidor");});
// }

// function componerDataListado(value)// id de la vista documento
// {
//         dataListado;
//         id_vista = value.id_documento_entrada;
//         id_string = "id_documento_entrada"
//         $.each(dataListado,function(indexList,valueList)
//         {
//             $.each(valueList,function(ind,val)
//             {
//                 if(ind == id_string)
//                         ( val.indexOf(id_vista) != -1 ) ? ( dataListado[indexList]=value ):  console.log();
//             });
//         });
//         // console.log(dataListado);
// }

// function showEdit(editableObj)
// {
//         // $(editableObj).css("background","#FFF");

// }
		
// function saveToDatabase(editableObj,column,id)
// {
//         //alert("entraste aqui ");
// //			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
//         // alert("");
//         $.ajax({
//                 url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
//                 type: "POST",
//                 data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
//                 success: function(data)
//                 {
// //					$(editableObj).css("background","#FDFDFD");
//                                         // $("td").prop("contenteditable",false);
//                                         listarDatos(id);
//                 }
//         });
// }

function saveToDatabaseDates(editableObj,column,id,fasignacion,flimite,falarma,frecepcion)
{
        var fecha;
        var ejecutarAjax = true;
        if(column != "fecha_recepcion")
        {
                if(column == "fecha_asignacion" || column == "fecha_limite_atencion")
                {
                        if(editableObj.value == "")
                        {
                                ejecutarAjax=false;
                                (column=="fecha_asignacion")?
                                swal("VERIFICAR","La fecha de asignacion no puede quedar sin fecha!", "error"):
                                swal("VERIFICAR", "La fecha limite no puede quedar sin fecha!", "error");
                                (column=="fecha_asignacion")?
                                fecha = fasignacion:
                                fecha = flimite;
                        }
                        else
                        {
                                if(column=="fecha_asignacion")
                                {
                                        if(editableObj.value==fasignacion)
                                                return 0;
                                }
                                else
                                {
                                        if(editableObj.value==flimite)
                                                return 0;
                                }
                                ejecutarAjax = (column=="fecha_asignacion")?
                                compararFechaAsignacion(editableObj.value,flimite,falarma):
                                compararFechaLimite(editableObj.value,fasignacion,falarma);
                                (ejecutarAjax)? editableObj.style="color:limegreen":
                                (column=="fecha_asignacion")?fecha=fasignacion: fecha=flimite;
                        }
                }
                else
                {
                        if(editableObj.value != "")
                        {
                                (editableObj.value!=falarma)?ejecutarAjax=compararFechaAlarma(editableObj.value,fasignacion,flimite): ejecutarAjax=false;
                                (ejecutarAjax)? editableObj.style="color:limegreen": fecha=falarma;
                        }
                }
        }
        else
        {
                (editableObj.value=="")? ejecutarAjax=false :editableObj.style="color:limegreen";
                fecha = frecepcion;
        }
        // if(ejecutarAjax==true)
        // {
        //         $.ajax({
        //                 url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
        //                 type: "POST",
        //                 data:'column='+column+'&editval='+editableObj.value+'&id='+id,
        //                 success: function(data)
        //                 {
        //                         (data)? (listarDatos(id), editableObj.style="color:limegreen"):editableObj.value=fecha;
        //                 }
        //         });
        // }
        // else
        //         editableObj.value=fecha;
}

function compararFechaAsignacion(val,flimite,falarma)//listo
{
        limiteF = new Date(flimite);
        limiteF = new Date(limiteF.getFullYear(),limiteF.getMonth(),limiteF.getDate());
        asignacionF = new Date(val);
        asignacionF = new Date(asignacionF.getFullYear(),asignacionF.getMonth(),asignacionF.getDate());
//                        recepcionF = new Date(Frecepcion);
//                        recepcionF = new Date(recepcionF.getFullYear(),recepcionF.getMonth(),recepcionF.getDate());
//                        
//                        if(asignacionF<recepcionF)
//                        {
//                                swal("D'oh!", "La fecha de asignacion no debe ser menor que la fecha de recepcion, VERIFICA", "error");
//                                return false;
//                        }
        
        if(asignacionF>limiteF)
        {
                swal("D'oh!", "La fecha de asignacion sobrepasa la fecha limite, VERIFICA", "error");
                return false;
        }
        
        if(falarma!="0000-00-00")
        {
                alarmaF = new Date(falarma);
                alarmaF = new Date(alarmaF.getFullYear(),alarmaF.getMonth(),alarmaF.getDate());
                if(asignacionF>alarmaF)
                {
                        swal("D'oh!", "La fecha de asignacion sobrepasa la fecha de alarma, VERIFICA", "error");
                        return false;
                }
        }
        return true;
}

function compararFechaLimite(val,fasignacion,falarma)//listo
{
        limiteF = new Date(val);
        limiteF = new Date(limiteF.getFullYear(),limiteF.getMonth(),limiteF.getDate());
        asignacionF = new Date(fasignacion);
        asignacionF = new Date(asignacionF.getFullYear(),asignacionF.getMonth(),asignacionF.getDate());
        if(limiteF<asignacionF)
        {
                swal("D'oh!", "La fecha limite no debe ser menor que la fecha de asignacion, VERIFICA", "error");
                return false;
        }
        if(falarma!="0000-00-00")
        {
                alarmaF = new Date(falarma);
                alarmaF = new Date(alarmaF.getFullYear(),alarmaF.getMonth(),alarmaF.getDate());
                if(limiteF<alarmaF)
                {
                        swal("D'oh!", "La fecha limite no puede ser menor que la fecha de alarma, VERIFICA", "error");
                        return false;
                }
        }
        return true;
}

function compararFechaAlarma(val,fasignacion,flimite)//listo
{
        alarmaF = new Date(val);
        alarmaF = new Date(alarmaF.getFullYear(),alarmaF.getMonth(),alarmaF.getDate());
        limiteF = new Date(flimite);
        limiteF = new Date(limiteF.getFullYear(),limiteF.getMonth(),limiteF.getDate());
        asignacionF = new Date(fasignacion);
        asignacionF = new Date(asignacionF.getFullYear(),asignacionF.getMonth(),asignacionF.getDate());
        if(alarmaF<asignacionF)
        {
                swal("D'oh!", "La fecha de alarma no puede ser menor que la fecha de asignacion, VERIFICA", "error");
                return false;
        }
        if(alarmaF>limiteF)
        {
                swal("D'oh!", "La fecha de alarma no puede ser mayor que la fecha limite, VERIFICA", "error");
                return false;
        }
        return true;
}
                
function saveComboToDatabase(Obj,column,id_documento_entrada)
{
        val=$(Obj).prop('value');
        $.ajax({
                url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
                type: "POST",
                data:'column='+column+'&editval='+val+'&id='+id_documento_entrada,
                success: function(data)
                {
                        (data==true)?(  swalSuccess("Modificado"), listarDatos(id_documento_entrada) ):console.log();
                        
                },
                error:function()
                {
                        swalError("Error en el servidor");
                }
        });

}

function saveUpdateToDatabase(args)//listo
{
        console.log(args);
        columnas=new Object();
        entro=0;
        id_afectado = args['item']['id_principal'][0];
        region_fiscalTemp = args['previousItem']['region_fiscal'];

        $.each(args['item'],(index,value)=>
        {
                if(args['previousItem'][index]!=value && value!="")
                {
                if(index!='id_principal' && !value.includes("<button") && index!="delete")
                {
                        columnas[index]=value;
                }
                }
        });
        //     console.log("1");
        //     if(args["itemIndex"]!=-1)
                // $("#jsGrid").jsGrid("updateItem", DataGrid[args["itemIndex"]]);
        //     console.log("2");
        console.log(columnas);
        //     $("#jsGrid").jsGrid("cancelEdit");
        //     $("#jsGrid").jsGrid("updateItem");

        //     console.log(columnas);

        if( Object.keys(columnas).length != 0)
        {
                fechas = true;
                $.each(columnas,(index,value)=>
                {
                        if(index == "fecha_asignacion")
                        {
                                fechas = compararFechaAsignacion(value,args["previousItem"]["fecha_limite_atencion"],args["previousItem"]["fecha_alarma"]);
                        }
                        if(index == "fecha_limite_atencion")
                        {
                                fechas = compararFechaLimite(value,args["previousItem"]["fecha_asignacion"],args["previousItem"]["fecha_alarma"]);
                        }
                        if(index == "fecha_alarma")
                        {
                                fechas = compararFechaAlarma(value,args["previousItem"]["fecha_asignacion"],args["previousItem"]["fecha_limite_atencion"]);
                        }
                });
                if(fechas)
                {
                        $.ajax({
                        url:"../Controller/GeneralController.php?Op=Actualizar",
                        type:"POST",
                        data:'TABLA=documento_entrada'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                        beforeSend:function()
                        {
                                growlWait("Actualización","Espere...");
                        },
                        success:function(data)
                        {
                                // console.log("resultado actualizacion: ",data);
                                $.ajax({
                                        url:'../Controller/DocumentosEntradaController.php?Op=ListarUno',
                                        type: 'GET',
                                        data:'ID_DOCUMENTO='+id_afectado["id_documento_entrada"],
                                        success:function(datos)
                                        {

                                                if(typeof(datos)=="object")
                                                {
                                                        growlSuccess("Actulización","Se actualizaron los campos");
                                                        $.each(datos,function(index,value){
                                                                componerDataListado(value);
                                                        });
                                                        componerDataGrid();
                                                        gridInstance.loadData();
                                                }
                                                else
                                                {
                                                        growlError("Actualización","No se pudo actualizar");
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
                        },
                        error:function()
                        {
                                componerDataGrid();
                                gridInstance.loadData();
                                growlError("Error","Error del servidor");
                        }
                        });
                }
                else
                {
                        componerDataGrid();
                        gridInstance.loadData();
                }
        }
//     else investigar que hacer cuando no hay que actualizar
}

function componerDataListado(value)// id de la vista documento, listo
{
    id_vista = value.id_documento_entrada;
    id_string = "id_documento_entrada";
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

// function actualizarEvidencia(id)
// {
//     URL = 'filesEvidenciaDocumento/';
//     $.ajax({
//         url: "../Controller/EvidenciasController.php?Op=ListarEvidencia",
//         type: 'GET',
//         data: 'ID_EVIDENCIA='+id+"&URL="+URL,
//         success:function(datos)
//         {
//             $.each(datos,function(index,value){
//                 componerDataListado(value);
//             });
//             componerDataGrid();
//             gridInstance.loadData();
//         },
//         error:function()
//         {
//             growlError("Error al refrescar la vista","Error en el servidor, actualize la vista");
//         }
//     });
// }

function eliminarDocumentoEntrada(args)
{
//    console.log(args);
    id_afectado= args['item']['id_principal'][0];

    $.ajax({
        url:"../Controller/DocumentosEntradaController.php?Op=Eliminar",
        type:"POST",
        data:"ID_DOCUMENTO_ENTRADA="+JSON.stringify(id_afectado),
        success:function(data)
        {
//            alert("Entro al success "+data);
            if(data==false)
            {
                swal("","El Documento esta cargado en una Documento de Salida","error");
                setTimeout(function(){swal.close();},1500);
            }else{
                if(data==true)
                {
                    swal("","Se elimino correctamente el Documento de Entrada","success");
                    setTimeout(function(){swal.close();},1500);
                }
            }
        },
        error:function()        
        {
            swal("","Error en el servidor","error");
            setTimeout(function(){swal.close();},1500);
        }
    });
    
}
        
        
function refresh()
{
        // consultarDatos("../Controller/DocumentosEntradaController.php?Op=Listar");
        // listarDatos(-1);
        listarTemas().then((res)=>{
                listarAutoridades().then((res1)=>{
                        inicializarEstructuraGrid().then((res2)=>{
                                construirGrid();
                                inicializarFiltros().then((res3)=>
                                {
                                        construirFiltros();
                                        listarDatos();
                                });
                        });
                });
        });
}

// function consultarDatos(url)
// {
//         $.ajax({  
//                 url: ""+url,  
//                 async:false,
//                 success: function(r)
//                 {
//                         alert();
//                         $("#idT").load("DocumentoEntradaView.php #idTable");
//                         $("#loader").hide();
//                 },
//                 beforeSend:function(r)
//                 {},
//                 error:function()
//                 {
//                         $("#loader").hide(); 
//                 }
//         });
// }

// function consultarInformacion(url)
// {
//         $("#loader").show(); 
//         $.ajax({  
//                 url: ""+url,  
//                 success: function(r)
//                 {
//                         $("#idTable").load("DocumentosEntradaView.php #idTable");
//                         $("#loader").hide();

//                 },
//                 beforeSend:function(r)
//                 {
//                 },
//                 error:function()
//                 {
//                         $("#loader").hide(); 
//                 }        
//         });
// }

    
function verificarExiste(dataString,cualverificar)
{
       $.ajax({
                type: "POST",
                url: "../Controller/DocumentosEntradaController.php?Op=verificacionexisteregistro&cualverificar="+cualverificar,
                data: "registro="+dataString,
                success: function(data)
                {
                        mensajeerror="";
                        $.each(data, function (index,value)
                        {
                                mensajeerror="El Folio de Entrada "+value.folio_entrada+" Ya Existe";
                        });
                        $("#ValidarFolioEntradaModal").html(mensajeerror);
                        if(mensajeerror!="")
                        {
                                $("#ValidarFolioEntradaModal").addClass("validar_formulario");
                                $("#ValidarFolioEntradaModal").css("background","orange");
                                $("#btn_guardar").prop("disabled",true);
                        }
                        else
                        {
                                $("#btn_guardar").prop("disabled",false);
                        }
                }
         })
}

// function loadSpinner()
// {
//         myFunction();
// }

function saveToDatabaseDatosFormulario(datos)
{
        $.ajax({
                url: "../Controller/DocumentosEntradaController.php?Op=Guardar",
                type: "POST",
                data:'FOLIO_REFERENCIA='+datos[1]+'&FOLIO_ENTRADA='+datos[2]+'&FECHA_RECEPCION='+datos[3]
                        +'&ASUNTO='+datos[4]+'&REMITENTE='+datos[5]+'&ID_AUTORIDAD='+datos[6]+'&ID_TEMA='+datos[7]+'&CLASIFICACION='+datos[8]
                        +'&STATUS_DOC='+datos[9]+'&FECHA_ASIGNACION='+datos[10]+'&FECHA_LIMITE_ATENCION='+datos[11]+'&FECHA_ALARMA='+datos[12]
                        +'&DOCUMENTO='+datos[13]+'&OBSERVACIONES='+datos[14]+'&MENSAJE_ALERTA='+datos[15],
                // async: false,
                success: function(valores)
                {
                        // consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                        if(valores != -1 && valores !=false)
                        {
                                $.ajax({
                                        url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',//crea las carpetas y la sesion url
                                        type: 'GET',
                                        data: 'URL='+valores,
                                        success:function(creado)
                                        {
                                                if(creado)
                                                {
                                                        $('.start').click();
                                                        swalSuccess("Creado con exito");
                                                        $('#create-item .close').click();
                                                        refresh();
                                                }
                                        },
                                        error:function()
                                        {
                                                swalError("Error en el servidor");
                                        }
                                });
                        }
                        else
                                swalError("Error al crear");
                },
                error:function()
                {
                        swalError("Error en el servidor");
                }
        });
}

var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
                ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
                ModalCargaArchivo += "<div class='fileupload-buttons'>";
                ModalCargaArchivo += "<span class='fileinput-button'>";
                ModalCargaArchivo += "<span><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
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

months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

function mostrar_urls(id_documento_entrada)
{
        var tempDocumentolistadoUrl = "";
        URL = 'filesDocumento/Entrada/'+id_documento_entrada;
        $.ajax({
                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                type: 'GET',
                data: 'URL='+URL,
                success: function(todo)
                {
                        if(todo[0].length!=0)
                        {
                                tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                                $.each(todo[0], function (index,value)
                                {
                                        nametmp = value.split("^-O-^-M-^-G-^");
                                        fecha = new Date(nametmp[0]*1000);
                                        fecha = fecha.getDate() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                                        
                                        tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                        tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a></td>";
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
                        tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id_documento_entrada+"'>";
                        // alert(tempDocumentolistadoUrl);
                        $('#DocumentoEntradaAgregarModal').html(" ");
                        $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                        $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                        // $('#fileupload').fileupload();
                        $('#fileupload').fileupload({
                        url: '../View/',
                        });
                }
        });
}

function agregarArchivosUrl()
{
        var ID_DOCUMENTO = $('#tempInputIdDocumento').val();
        url = 'filesDocumento/Entrada/'+ID_DOCUMENTO,
        $.ajax({
                url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
                type: 'GET',
                data: 'URL='+url,
                success:function(creado)
                {
                        if(creado==true)
                                $('.start').click();
                },
                error:function()
                {
                        swalError("Error del servidor");
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
                // closeOnConfirm: false,
                // showLoaderOnConfirm: true
                confirmButtonText:'SI'
                }).then((res)=>
                {
                        if(res)
                        {
                                var ID_DOCUMENTO = $('#tempInputIdDocumento').val();
                                $.ajax({
                                        url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
                                        type: 'GET',
                                        data: 'URL='+url,
                                        beforeSend:()=>
                                        {
                                                growlWait("Eliminar Archivo","Eliminando Archivo...");
                                        },
                                        success: function(eliminado)
                                        {
                                                // eliminar = eliminado;
                                                if(eliminado)
                                                {
                                                        growSuccess("Eliminar Archivo","Archivo Eliminado");
                                                        mostrar_urls(ID_DOCUMENTO);
                                                        swal("","Archivo eliminado");
                                                        setTimeout(function(){swal.close();},1000);
                                                }
                                                else
                                                        growlError("Error Eliminar","Ocurrio un error al eliminar el archivo");
                                        },
                                        error:function()
                                        {
                                                growlError("Error","Error en el servidor");
                                        }
                                });
                        }
                });
}

                
function CambioStatusDocumentoEntrada()
{
        if ($("#STATUS_DOC").val() == 3)
        {       
                Habilitar_DesabilitarFechas(true);
        }
        else
        {
                if ($("#STATUS_DOC").val() == 1)
                {
                        Habilitar_DesabilitarFechas(false);
                }
                if ($("#STATUS_DOC").val() == 2)
                {
                        Habilitar_DesabilitarFechas(false);
                }
        }
}

function Habilitar_DesabilitarFechas(accion)
{
        $("#FECHA_ASIGNACION").prop("disabled",accion);
        $("#FECHA_LIMITE_ATENCION").prop("disabled",accion);
        $("#FECHA_ALARMA").prop("disabled",accion);
        $("#MENSAJE_ALERTA").prop("disabled",accion);
}

// listarDatos(-1);

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
        {% if(t == 1){ if( $('#tempInputIdDocumento').length > 0 ) { var ID_DOCUMENTO = $('#tempInputIdDocumento').val(); mostrar_urls(ID_DOCUMENTO);}else{ $('#btnAgregarDocumentoEntradaRefrescar').click(); } } %}
</script>
                
                
                <!--Inicia para el spiner cargando-->
                <!-- <script src="../../js/loaderanimation.js" type="text/javascript"></script> -->
                <!--Termina para el spiner cargando-->
                
                <!--jquery-->
                <!-- <script src="../../js/jquery-ui.min.js" type="text/javascript"></script> -->

                <!--Bootstrap-->
                <!--Aqui abre el modal de insertar-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Aqui cierra para abrir el modal de insertar-->
                <!-- <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script> -->

                <!--Para abrir alertas del encabezado-->
                <!-- <script src="../../assets/probando/js/ace-elements.min.js"></script> -->
                <!-- <script src="../../assets/probando/js/ace.min.js"></script> -->
		<!-- <script src="../../assets/probando/js/ace-extra.min.js"></script>      -->
          

                <!-- js cargar archivo -->
                 <!--<script src="../../assets/FileUpload/js/jquery.min.js"></script>-->
                <!--<script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>--> 
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


