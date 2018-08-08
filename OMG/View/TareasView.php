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
                <link href="../../css/jsgridconfiguration.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jqueryblockUI.js" type="text/javascript"></script>
                
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <script src="../../js/tools.js" type="text/javascript"></script>
                <script src="../../js/fTareasView.js" type="text/javascript"></script>


                
                
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

        
<body class="no-skin" onload="loadSpinner()">
<div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>

             
<div style="position: fixed;">

<button onClick="archivoyComboboxparaModal();" type="button" class="btn btn-success" data-toggle="modal" data-target="#crea_tarea">
    Agregar Tarea
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

        <!--<input type="text" id="idInputClaveDocumento" onkeyup="filterTableClaveDocumento()" placeholder="Clave Documento" style="width: 180px;">-->
        <!--<input type="text" id="idInputNombreDocumento" onkeyup="filterTableNombreDocumento()" placeholder="Nombre Documento" style="width: 180px;">-->
        <!--<input type="text" id="idInputResponsableDocumento" onkeyup="filterTableResponsableDocumento()" placeholder="Responsable del Documento" style="width: 180px;">-->
        
</div>
<div style="height: 40px"></div>
<div id="headerFiltros" style=""></div>
<!-- <div style="height: 40px"></div> -->


<div id="jsGrid"></div>

<!-- Inicio de Seccion Modal -->
<div class="modal draggable fade" id="crea_tarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">x</span></button>
                <h4 class="modal-title" id="myModalLabel">Crear Nueva Tarea</h4>
            </div>

            <div id="validacion_empleado" class="modal-body">
                <!--<div id="ok"></div>-->
                    <div class="form-group">
                        <label class="control-label" for="title">Contrato:</label>
                        <input type="text"  id="CONTRATO" class="form-control" data-error="Ingrese el Contrato" required />
                        <div id="mensaje1" class="help-block with-errors" ></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title"> Tarea:</label>
                        <textarea  id="TAREA" class="form-control" data-error="Ingrese la Tarea" required></textarea>
                        <div id="mensaje2"class="help-block with-errors"></div>
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
                        <label class="control-label" for="title"> Observaciones:</label>
                        <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese una observacion" required></textarea>
                        <div id="mensaje6"class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <button style="width:49%;" type="submit" id="btn_crearTarea" class="btn crud-submit btn-info">Guardar</button>
                        <button style="width:49%;" type="submit" id="btn_limpiarModalTarea"  class="btn crud-submit btn-info">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Final de Seccion Modal-->

<script>

//construirFiltros();
construirGrid();

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




