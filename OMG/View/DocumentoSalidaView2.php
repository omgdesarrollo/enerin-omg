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
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/jsgridconfiguration.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jqueryblockUI.js" type="text/javascript"></script>               

<!--                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>-->

                <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
                
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <link href="../../css/filtroSupremo.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/tools.js" type="text/javascript"></script>
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/fDocumentoSalidaView.js" type="text/javascript"></script>
                
                
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

    <button type="button" class="btn btn-success btn_agregar" data-toggle="modal" data-target="#crea_autoridad">
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

<script>
DataGrid = [];
dataListado=[];
filtros=[];
ultimoNumeroGrid=0;

listarDatos();
inicializarFiltros();
construirGrid();
construirFiltros();
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




