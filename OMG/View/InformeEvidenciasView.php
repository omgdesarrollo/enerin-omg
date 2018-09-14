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

        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>

		<link async href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" /> -->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
        <!-- <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/> -->
                <!--Termina para el spiner cargando-->
                
        <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>

        <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>

        <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

        <script src="../../js/fechas_formato.js" type="text/javascript"></script>
        <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
        <link href="../../css/filtroSupremo.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
        <!-- <script src="../../js/tools.js" type="text/javascript"></script> marca un error al agregarse -->
        <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>

        <script src="../../js/fInformeEvidenciasView.js" type="text/javascript"></script>
        <script src="../../js/fGridComponent.js" type="text/javascript"></script>
                
        <style>
            .jsgrid-header-row>.jsgrid-header-cell {
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
        </style>              
                
 			 
</head>

        
    <body class="no-skin">
       

<?php
    // require_once 'EncabezadoUsuarioView.php';
?>

             
<div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;">    
    <button type="button" class="btn btn-info btn_refrescar" id="btnrefrescar" onclick="refresh();" >
        <i class="glyphicon glyphicon-repeat"></i>   
    </button>

    <div class="pull-right">
        <button style="width:48px;height:42px" class="btn_agregar" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Excel'">
            <img src="../../images/base/_excel.png" width="30px" height="30px">
        </button>
        <button style="width:48px;height:42px" class="btn_agregar" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Word'">
            <img src="../../images/base/word.png" width="30px" height="30px"> 
        </button>
        <button style="width:48px;height:42px" class="btn_agregar" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Pdf'">
            <img src="../../images/base/pdf.png" width="30px" height="30px"> 
        </button>
    </div>    
</div>

<br><br><br>
    <div id="jsGrid"></div>
<!-- <div style="height: 10px"></div>
<div class="container" style="height: 0px">		
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <div class="input-group">
                    <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkValidado">
                    <span style="border:none;background-color:transparent;" class="input-group-addon">Validados</span>
                    
                    <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkNoValidado">
                    <span style="border:none;background-color: transparent;" class="input-group-addon">En Proceso</span>
                </div>

            </div>
            
            <div id="arbolprincipal">
                
            </div>

        </div>    
    </div>
</div> -->
               
<!-- Inicio modal Tema y Responsable -->
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

<!-- Inicio modal adjuntar documento -->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
          <h4 class="modal-title" id="myModalLabel">Archivos Adjuntos</h4>
        </div>

        <div class="modal-body">
          <div id="DocumentolistadoUrl"></div>
  
          <div class="form-group">
                  <div id="DocumentolistadoUrlModal"></div>
          </div>
        </div><!-- cierre div class-body -->
      </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->

<script>

    var DataGrid = [];
    var dataListado = [];
    var filtros = [];
    var db = {};
    var gridInstance;
    var ultimoNumeroGrid = 0;

    var frecuenciaData = [
                {frecuencia:"DIARIO"},
                {frecuencia:"SEMANAL"},
                {frecuencia:"MENSUAL"},
                {frecuencia:"BIMESTRAL"},
                {frecuencia:"ANUAL"},
                {frecuencia:"TIEMPO INDEFINIDO"}
            ];

    var estructuraGrid = [
        { name: "id_principal", type: "text",visible:false },
        { name: "no", title:"No",type: "text", width: 40, editing:false },
        { name: "tema",title:"Tema", type: "text", width: 150, editing:false },
        { name: "tema_responsable",title:"Responsable Tema", type: "text", width: 150, editing:false },
        { name: "requisito",title:"Requisito", type: "text", width: 150, editing:false  },
        { name: "registro",title:"Registro", type: "text", width: 150, editing:false  },
        { name: "frecuencia",title:"Frecuencia", type: "text", width: 130, editing:false  },
        { name: "clave_documento",title:"Clave Documento", type: "text",  width: 150, editing:false },
        { name: "documento_responsable",title:"Responsable Documento", type: "text",  width: 150, editing:false },
        { name: "evidencia",title:"Evidencia", type: "text",  width: 150, editing:false },
        { name: "fecha_registro",title:"Fecha Registro", type: "text", width: 155, editing:false },
        { name: "fecha_creacion",title:"Fecha Evidencia", type: "text",  width: 155, editing:false },
        // { name: "usuario",title:"Usuario", type: "text", width:250, editing:false },
        { name: "accion_correctiva",title:"Accion Correctiva", type: "text", width: 150, editing:false},
        { name: "plan_accion",title:"Plan Accion", type: "text", width: 160, editing:false },
        { name: "desviacion",title:"Desviacion", type: "text", width: 100, editing:false},
        { name: "plan",title:"Avance del Plan", type: "text", width: 100, editing:false},
        {name: "estatus",title:"Estatus", type: "text", width: 100, editing:false },
        { name:"delete", title:"Opción", type:"customControl",sorting:""},
    ];

    var customsFieldsGridData=[
            {field:"customControl",my_field:MyCControlField},
            // {field:"porcentaje",my_field:porcentajesFields},
        ];

    construirGrid();
    inicializarFiltros().then((resolve2)=>
    {
        construirFiltros();
        listarDatos();
    });

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
    

           
                
	</body>
     
</html>


