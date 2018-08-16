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
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script> -->

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" /> -->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
        <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>

                <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

                <!--  -->
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                
                <!-- <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script> -->

                <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
                <!--LIBRERIA SWEET ALERT 2-->
                <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
                <!--END LIBRERIA SWEET ALERT 2-->
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <script src="../../js/tools.js" type="text/javascript"></script>
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/fCatalogoProcesosView.js" type="text/javascript"></script>
                <script src="../../js/jqueryblockUI.js" type="text/javascript"></script>
                <script src="../../js/fGridComponent.js" type="text/javascript"></script>
                <!-- <script src="../../js/socket.js" type="text/javascript"></script> -->
                <!-- <script src="../../js/fancywebsocket.js" type="text/javascript"></script> -->
                
        <style>
            .jsgrid-header-row>.jsgrid-header-cell 
            {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
            }
            div.combo_info
            {
                color: gray;
                font-size: 11px;
                padding-bottom: 5px;
                padding-left: 2px;
                font-family: Tahoma;
            }
            .dhxcombo_select
            {
                z-index:9999;
            }
            .jsgrid-cancel-edit-button
            {

            }
            .modal-body{color:#888;max-height: calc(100vh - 110px);overflow-y: auto;}                    
            .modal-lg{width: 100%;}
            .modal {/*En caso de que quieras modificar el modal*/z-index: 1050 !important;}
            
            .jsgrid-grid-body
            {
                /* height:450px; */
            }

            ::-webkit-scrollbar
            {
                width: 8px;
            }

            ::-webkit-scrollbar-track
            {
                /* background-color: blue; */
            }
            ::-webkit-scrollbar-thumb
            {
                background-color: #438eb9;
                border-radius:20px;

                /* background-color: #e4e6e9;
                border-radius:20px;
                border: 1px solid;
                border-color:#438eb9; */
            }
            /* ::-webkit-scrollbar-button
            {
                background-color: #3399cc;
            } */
            ::-webkit-scrollbar-corner
            {
                background-color: #e4e6e9;
            }
            body{overflow:hidden;}
        </style>              
                
 			 
</head>

<body class="no-skin" onload="">

<!-- <div id="loader"></div>  -->
       

<?php
    require_once 'EncabezadoUsuarioView.php';
    // require_once '../Model/socketModel.php';
?>

<div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;">
    
<button onClick="" type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoRegistro" style='border-radius:3px;border:3px #49986d solid;height:44px'>
    Agregar Nuevo Registro
</button>

<button type="button" title="Recargar Datos" class="btn btn-info " style='border-radius:5px;border:3px #3399cc solid;width:47px;height:44px;padding-left:12px' id="btnrefrescar" onclick="refresh();">
    <i class="glyphicon glyphicon-repeat"></i>
</button>

<!-- <button type="button" class="btn btn-info " onClick="mostrarFiltros()">
    <i class='ace-icon fa fa-search'></i>
</button> -->
<div class="pull-right">
<button style="width:51px;height:42px" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Excel'">
    <img src="../../images/base/_excel.png" width="35px" height="auto
    ">
</button>
<button style="width:51px;height:42pxwi" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Word'">
    <img src="../../images/base/word.png" width="35px" height="auto">
</button>
<button style="width:51px;height:42px" type="button" onclick="window.location.href='../ExportarView/exportarValidacionDocumentoViewTiposDocumentos.php?t=Pdf'">
    <img src="../../images/base/pdf.png" width="35px" height="auto">
</button> 
</div>
</div>
<br><br><br>

<div id="jsGrid"></div>

<div class="modal draggable fade" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeLetra">X</span>
                </button>
		        <h4 class="modal-title" id="myModalLabelNuevaEvidencia">Crear Nuevo Registro</h4>
            </div>

            <div class="modal-body">
                
                <div class="form-group">
                    <label class="control-label">Región Fiscal: </label>
                    <div id="INPUT_REGIONFISCAL_NUEVOREGISTRO" style="witdth:100%;"></div>
                </div>

                <div class='form-group'><label class='control-label'>ID de Contrato o Asignación: </label><div id='INPUT_CONTRATO_NUEVOREGISTRO' style='witdth:100%'></div></div>
                <!-- <div class="form-group">
                    <label class="control-label">ID de Contrato o Asignación: </label>
                    <textarea class="form-control" type="text" id="INPUT_CONTRATO_NUEVOREGISTRO" style="min-width: -webkit-fill-available;max-width: -webkit-fill-available;" disabled></textarea>
                </div> -->
                <div class='form-group'><label class='control-label'>Ubicación del Punto de Medicion: </label><div id='INPUT_UBICACION_NUEVOREGISTRO' style='witdth:100%'></div></div>

                <!-- <div class="form-group">
                    <label class="control-label">Ubicación del Punto de Medición: </label>
                    <input class="form-control" type="text" id="INPUT_UBICACION_NUEVOREGISTRO" disabled/>
                </div> -->

                <div class="form-group">
                    <label class="control-label">Tag del Patín de Medición: </label>
                    <input class="form-control" type="text" id="INPUT_TAGPATIN_NUEVOREGISTRO"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipo de Medidor: </label>
                    <input class="form-control" type="text" id="INPUT_TIPOMEDIDOR_NUEVOREGISTRO"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Tag del Medidor: </label>
                    <input class="form-control" type="text" id="INPUT_TAGMEDIDOR_NUEVOREGISTRO"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Clasificación del Sistema de Medición: </label>
                    <input class="form-control" type="text" id="INPUT_CLASIFICACION_NUEVOREGISTRO"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipo de Hidrocarburo: </label>
                    <input class="form-control" type="text" id="INPUT_HIDROCARBURO_NUEVOREGISTRO"/>
                </div>

                <!-- <div class="form-group">
                    <input id="ID_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
                    <input id="IDTEMA_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
                    <input id="IDREGISTRO_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
                </div> -->
            </div>
            <div class="form-group" method="post" style="text-align:center">
                <button type="submit" id="BTN_CREAR_NUEVOREGISTROMODAL" class="btn crud-submit btn-info" style="width:49%" >Crear Registro</button>
                <button type="submit" id="BTN_LIMPIAR_NUEVOREGISTROMODAL" class="btn crud-submit btn-info" style="width:49%">Limpiar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var DataGrid=[];
    var dataListado=[];
    var filtros=[];
    var db={};
    var gridInstance;
    var ws;
    var thisjGrowl;
    // var estructuraGrid=[];
    estructuraGrid = [
        { name:"id_principal", visible:false},
        { name:"no", title:"No",width:60},
        { name:"clave_contrato", title: "ID del Contrato o Asignación", type: "text", width: 150, validate: "required"},
        { name:"region_fiscal", title: "Region Fiscal", type: "text", width: 150, validate: "required" },
        { name:"ubicacion", title: "Ubicación del Punto de Medición", type: "text", width: 150, validate: "required" },
        { name:"tag_patin", title: "Tag del Patin de Medición", type: "text", width: 130, validate: "required" },
        { name:"tipo_medidor", title: "Tipo de Medidor", type: "text", width: 150, validate: "required" },    
        { name:"tag_medidor", title: "Tag del Medidor", type: "text", width: 130, validate: "required" },
        { name:"clasificacion", title: "Clasificación del Sistema de Medición", type: "text", width: 150, validate: "required" },
        { name:"hidrocarburo", title: "Tipo de Hidrocarburo", type: "text", width: 150, validate: "required"},
        { name:"delete", title:"Opción", type:"customControl",sorting:""},
        // {type:"control",editButton: true}
    ];
    ultimoNumeroGrid=0;
    // $.when(
        var abrir=false;
        var intervalFunc;
        // function abrirSocket()
        // {
        //     // setTimeout( function(){abrir.abort();}, 1500);
        //     $.ajax({
        //         url:"../Controller/SocketController.php?Op=socket",
        //         typ
        //         beforeSend:function()
        //         {
        //             // abrir = setInterval(function(){camino();},100);
        //             camino();
        //         },
        //         success:function(val)
        //         {
        //             clearInterval(abrir);
        //         }
        //     });
        //     // ;
        // };
        // abrirSocket();
        // function conexionClienteSocket()
        // {
        //     while(conexionSocketC()){console.log("no conectado no")};
            // $.ajax({
            //         url:"../Controller/SocketController.php?Op=conect",
            //         success:function(val)
            //         {
            //             console.log(val);
            //         }
            //     });
        // }

        construirGridPromise = new Promise((resolve,reject)=>
        {
            construirGrid();
            resolve();
        });
    // ).done(function(dataListarDatos, dataConstruirGrid)
    // {//IMPORTANTE NO BORRAR NO PREGUNTEN SOLO NO BORRAR 'FVAZCONCELOS' :D
        construirGridPromise.then ((result)=>{
            listarDatos();
            iniciar = new Promise( (resolve,reject)=>
            {
                inicializarFiltros();
                resolve();
            });
            iniciar.then( (result)=>
            {
                construirFiltros();
            });
        });
        buscarRegionesFiscales();
        // construirFiltros();
        // console.log(dataListado);
    // });
 
    region_fiscal="";
    ubicacion="";
    clave_contrato="";
    tag_medidor="";

    $("#BTN_CREAR_NUEVOREGISTROMODAL").click(function()
    {
        //NO SE PUEDEN CAMBIAR LOS NOMBRES DE LOS KEY DEL OBJECTO DATOS YA QUE ESTAN LIGADOS A LA BASE DE DATOS
        datos=new Object();
        datos.clave_contrato = clave_contrato=="" ? contratoComboDhtml.getSelectedText() : clave_contrato;
        datos.region_fiscal = RegionesFiscalesComboDhtml.getSelectedText();
        datos.ubicacion = ubicacionComboDhtml.getSelectedText();
        datos.tag_patin = $("#INPUT_TAGPATIN_NUEVOREGISTRO").val();
        datos.tipo_medidor = tag_medidor;
        datos.tag_medidor = $("#INPUT_TAGMEDIDOR_NUEVOREGISTRO").val();
        datos.clasificacion = $("#INPUT_CLASIFICACION_NUEVOREGISTRO").val();
        datos.hidrocarburo = $("#INPUT_HIDROCARBURO_NUEVOREGISTRO ").val();

        listo = ( datos.clave_contrato!=""?
        datos.region_fiscal!=""?
        datos.ubicacion!=""?
        datos.tag_patin!=""?
        datos.tipo_medidor!=""?
        datos.tag_medidor!=""?
        datos.clasificacion!=""?
        datos.hidrocarburo!=""?
        true : false: false: false: false: false: false: false: false );
        listo ? insertarRegistro(datos) : swalInfo("Campos requeridos");
    });

    $("#BTN_LIMPIAR_NUEVOREGISTROMODAL").click(function()
    {
        RegionesFiscalesComboDhtml.setComboText("");
        contratoComboDhtml.setComboText("");
        ubicacionComboDhtml.setComboText("");
        clave_contrato = "";
        $("#INPUT_TAGPATIN_NUEVOREGISTRO").val("");
        $("#INPUT_TIPOMEDIDOR_NUEVOREGISTRO").val("");
        $("#INPUT_TAGMEDIDOR_NUEVOREGISTRO").val("");
        $("#INPUT_CLASIFICACION_NUEVOREGISTRO").val("");
        $("#INPUT_HIDROCARBURO_NUEVOREGISTRO ").val("");
    });

    $("#INPUT_TAGMEDIDOR_NUEVOREGISTRO").blur(function()
    {
        val = $(this).val();
        tag_medidor = "";
        $.ajax({
            url:'../Controller/CatalogoProcesosController.php?Op=BuscarTagMedidor',
            type:'GET',
            data:'CADENA='+val,
            success:function(existe)
            {
                if(existe==0)
                {
                    tag_medidor = val;
                }
                else
                {
                    // tag_medidor = "";
                    swalInfo("El Tag del Medidor ya ha sido cargado, verifique");
                    $("#INPUT_TAGMEDIDOR_NUEVOREGISTRO").val(val.slice(0,-1));
                }
            },
            error:function()
            {
                swalError("Error en el servidor");
                tag_medidor = "";
            }
        });
    });

    
    
    
    
    
</script>
        <script src="../../js/socket.js" type="text/javascript"></script>
            <script src="../../js/fCatalogoProcesosView.js" type="text/javascript"></script>

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