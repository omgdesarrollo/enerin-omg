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

        <!--  -->

        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

        <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
        <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
        <script src="../../js/fCatalogoProcesosView.js" type="text/javascript"></script>
        <script src="../../js/jqueryblockUI.js" type="text/javascript"></script>
                
        <style>
            .display-none
            {
                display:none;
            }
/*            .display-view
            {
                display:flex;
            }*/
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
        </style>              
                
 			 
</head>

        
        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>

             
<div style="position: fixed;">

<button onClick="" type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoRegistro">
    Agregar Nuevo Registro
</button>

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

<button onClick="mostrarFiltros()">Mostrar Filtros</button>
</div>

<br><br><br>
<!-- <div class="jsgrid" style="position: relative;width: 100%;"> -->
    <!-- <div class="jsgrid-grid-header jsgrid-header-scrollbar">
        <div class="jsgrid-table">
            <div class="jsgrid-header-row" id="headerFiltros"> -->
                <!-- <div class="jsgrid-header-cell jsgrid-header-sortable"> -->
                    <!-- <div id="headerFiltros"> -->
                <!-- </div> -->
            <!-- </div>
        </div>
    <div> -->
<!-- </div> -->
<!-- </div> -->
<!-- float:left; -->
</div>

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
                    <label class="control-label">ID de Contrato o Asignación: </label>
                    <input class="form-control" type="text" id="INPUT_CONTRATO_NUEVOREGISTRO" onBlur="buscarIdContrato(this)"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Región Fiscal: </label>
                    <input class="form-control" type="text" id="INPUT_REGIONFISCAL_NUEVOREGISTRO" disabled/>
                </div>

                <div class="form-group">
                    <label class="control-label">Ubicación del Punto de Medición: </label>
                    <input class="form-control" type="text" id="INPUT_UBICACION_NUEVOREGISTRO" disabled/>
                </div>

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

                <div class="form-group" method="post" style="text-align:center">
                    <button type="submit" id="BTN_CREAR_NUEVOREGISTROMODAL" class="btn crud-submit btn-info" style="width:49%" >Crear Registro</button>
                    <button type="submit" id="BTN_LIMPIAR_NUEVOREGISTROMODAL" class="btn crud-submit btn-info" style="width:49%">Limpiar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    listarDatos();
    cargarFiltro=0;
    construirGrid();
    construirFiltros();
    region_fiscal="";
    ubicacion="";
    clave_contrato="";
    $("#BTN_CREAR_NUEVOREGISTROMODAL").click(function()
    {
        //NO SE PUEDEN CAMBIAR LOS NOMBRES DE LOS KEY DEL OBJECTO DATOS YA QUE ESTAN LIGADOS A LA BASE DE DATOS
        datos=new Object();
        datos.clave_contrato = clave_contrato==""? $("#INPUT_CONTRATO_NUEVOREGISTRO").val() : clave_contrato;

        datos.region_fiscal = region_fiscal==""? $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").val() : region_fiscal;
        datos.ubicacion = ubicacion==""? $("#INPUT_UBICACION_NUEVOREGISTRO").val() : ubicacion;
        datos.tag_patin = $("#INPUT_TAGPATIN_NUEVOREGISTRO").val();
        datos.tipo_medidor = $("#INPUT_TIPOMEDIDOR_NUEVOREGISTRO").val();
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
        $("#INPUT_CONTRATO_NUEVOREGISTRO").val("");
        $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").val("");
        $("#INPUT_UBICACION_NUEVOREGISTRO").val("");
        $("#INPUT_TAGPATIN_NUEVOREGISTRO").val("");
        $("#INPUT_TIPOMEDIDOR_NUEVOREGISTRO").val("");
        $("#INPUT_TAGMEDIDOR_NUEVOREGISTRO").val("");
        $("#INPUT_CLASIFICACION_NUEVOREGISTRO").val("");
        $("#INPUT_HIDROCARBURO_NUEVOREGISTRO ").val("");
    });

    function insertarRegistro(datos)
    {
        $.ajax({
            url:'../Controller/CatalogoProcesosController.php?Op=Guardar',
            type:'POST',
            data:'DATOS='+JSON.stringify(datos),
            success:function(exito)
            {
                if(exito==1)
                {
                    swalSuccess("Registro Creado");
                    //mandar a insertar al grid
                }
                else
                {
                    swalError("Error al crear");
                }
            },
            error:function()
            {
                swalError("Error en el servidor");
            }
        });
    }

    function buscarIdContrato(Obj)
    {
        $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").attr("disabled",true);
        $("#INPUT_UBICACION_NUEVOREGISTRO").attr("disabled",true);
        val = $(Obj).val();
        if(val!="")
        {
            $.ajax({
                url:'../Controller/CatalogoProcesosController.php?Op=BuscarID',
                type:'GET',
                data:'CADENA='+val,
                success:function(datos)
                {
                    if(typeof(datos)=="object")
                    {
                        if(datos.length!=0)
                        {
                            $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").val(datos[0].region_fiscal);
                            $("#INPUT_UBICACION_NUEVOREGISTRO").val(datos[0].ubicacion);
                            $("#INPUT_CONTRATO_NUEVOREGISTRO").val(datos[0].clave_contrato);
                            region_fiscal = datos[0].region_fiscal;
                            ubicacion = datos[0].ubicacion;
                            contrato = datos[0].clave_contrato;
                        }
                        else
                        {
                            $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").removeAttr("disabled");
                            $("#INPUT_UBICACION_NUEVOREGISTRO").removeAttr("disabled");
                            region_fiscal = "";
                            ubicacion = "";
                            contrato = "";
                        }
                    }
                    else
                    {
                        swalError("Error al intentar comprar clave de contrato");
                    }
                },
                error:function()
                {
                    swalError("Error en el servidor");
                }
            });
        }
    }

    function mostrarFiltros()
    {
        // alert("");
        // $('.jsgrid-filter-row').removeAttr("style",'display:none');
        // console.log($('.jsgrid-filter-row').hasClass("display-none"));
        if($('.jsgrid-filter-row').hasClass("display-none"))
        {
            $('.jsgrid-filter-row').removeClass("display-none");
            $('.jsgrid-filter-row').addClass("display-view");
        }
        else
        {
            $('.jsgrid-filter-row').removeClass("display-view");
            $('.jsgrid-filter-row').addClass("display-none");
        }
    }
</script>
    
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