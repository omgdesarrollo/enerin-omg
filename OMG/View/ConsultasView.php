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

		<!-- <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" /> -->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->

                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>

                <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

                <!-- Chart -->
                <script src="../../assets/chart/loader.js" type="text/javascript"></script>

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>

                <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>

                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <link href="../../css/filtroSupremo.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/fConsultasView.js" type="text/javascript"></script>
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
    require_once 'EncabezadoUsuarioView.php';

?>

<div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;">

    <button type="button" title="Recargar Datos" class="btn btn-info btn_refrescar" id="btnrefrescar" onclick="refresh();">
        <i class="glyphicon glyphicon-repeat"></i>
    </button>

    <div class="pull-right">
    
        <button onClick="graficar()" title="Graficar Circular" type="button" class="btn btn-success style-filter" data-toggle="modal" data-target="#Grafica">
        <i class="fa fa-pie-chart"></i>
        </button>
        <button style="width:51px;height:42px" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Excel'">
            <img src="../../images/base/_excel.png" width="30px" height="30px">
        </button>

        <button style="width:51px;height:42px" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Word'">
            <img src="../../images/base/word.png" width="30px" height="30px"> 
        </button>

        <button style="width:51px;height:42px" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Pdf'">
            <img src="../../images/base/pdf.png" width="30px" height="30px"> 
        </button>
    </div>
</div>

<br><br><br>
<div id="jsGrid"></div>

<div class="modal draggable fade" id="Grafica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:fit-content">
            <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeLetra">X</span>
                </button>
		        <h4 class="modal-title" id="myModalLabelNuevaEvidencia">Cumplimiento Requisitos</h4>
            </div>

            <div class="modal-body">
                
                <!-- <div class="form-group">
                    <label class="control-label">Región Fiscal: </label>
                    <div id="INPUT_REGIONFISCAL_NUEVOREGISTRO" style="witdth:100%;"></div>
                </div> -->
                <div id="graficaPie" ></div>

            </div>
            <!-- <div class="form-group" method="post" style="text-align:center"> -->
                <!-- <button type="submit" id="BTN_CREAR_NUEVOREGISTROMODAL" class="btn crud-submit btn-info" style="width:49%" >Crear Registro</button>
                <button type="submit" id="BTN_LIMPIAR_NUEVOREGISTROMODAL" class="btn crud-submit btn-info" style="width:49%">Limpiar</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>

<script>
    var DataGrid=[];
    var dataListado=[];
    var filtros=[];
    var db={};
    var gridInstance;
    var thisjGrowl;
    var ultimoNumeroGrid=0;

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    var porcentajesFields = function(config)
    {
        jsGrid.Field.call(this, config);
    };
    
    porcentajesFields.prototype = new jsGrid.Field
    ({
        css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
            console.log("haber cuando entra aqui");
            console.log(date1);
            console.log(date2);
            // return 1;
        },
        itemTemplate: function(value,todo)
        {
            if(typeof(value)=="number")
                return value+" %";
            else
                return "X"
        },
        insertTemplate: function(value)
        {
        },
        editTemplate: function(value)
        {
            if(typeof(value)=="number")
                return value+" %";
            else
                return "X"
        },
        insertValue: function()
        {
        },
        editValue: function()
        {
        }
    });

    var customsFieldsGridData=[
        // {field:"customControl",my_field:MyCControlField},
        {field:"porcentaje",my_field:porcentajesFields},
    ];
    
    estructuraGrid = [
        { name: "id_principal",visible:false},
        { name: "no_tema",title:"No. Tema", type: "text", width: 70,editing:false},
        { name: "nombre_tema",title:"Nombre Tema", type: "text", width: 150,editing:false},
        { name: "id_responsable", visible:false},
        { name: "responsable_tema",title:"Responsable del Tema", type: "text", width: 150,editing:false},
        { name: "cumplimiento_tema",title:"% Cumplimiento Tema", type: "porcentaje", width: 100,editing:false},
        { name: "estado_tema",title:"Estado del Tema", type: "text", width: 100,editing:false},
        { name: "id_requisito",visible:false},
        { name: "requisito",title:"Requisito", type: "text", width: 140,editing:false},
        { name: "penalizacion",title:"Penalizacion", type: "text", width: 110,editing:false},
        { name: "cumplimiento_requisito",title:"% Cumplimiento Requisito", type: "porcentaje", width: 100,editing:false},
        { name: "estado_requisito",title:"Estado Requisito", type: "text", width: 100,editing:false},
        // { name:"delete", title:"Opción", type:"customControl",sorting:""},
        { title:"Opción", type:"",sorting:""},
        
    ];
    
    construirGrid();
            // RegionesFiscalesComboDhtml = new dhtmlXCombo({
            //     parent: "INPUT_REGIONFISCAL_NUEVOREGISTRO",
            //     width: 540,
            //     filter: true,
            //     name: "combo",
            //     index:"2000",
            //     items:[],
            // });

            // RegionesFiscalesComboDhtml.attachEvent("onChange", function(value, text)
            // {
            //         region_fiscal=text;
            //         selectItemCombo(value,text);
            // });

            // contratoComboDhtml.attachEvent("onOpen",function()
            // {
            //     this.DOMlist.style.zIndex = 2000;
            // });

        promesaInicializarFiltros = inicializarFiltros();
        promesaInicializarFiltros.then((resolve2)=>
        {
            construirFiltros();
            listarDatos();
        },(error)=>
        {
            growlError("Error!","Error al construir la vista, recargue la página");
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




