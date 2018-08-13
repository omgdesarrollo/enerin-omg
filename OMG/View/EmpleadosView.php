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
                
                <script src="../../js/tools.js" type="text/javascript"></script>
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>                
                <script src="../../js/fEmpleadosView.js" type="text/javascript"></script>
                
                
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

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#crea_empleado">
    Agregar Empleado
</button>

<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh();" >
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
<div class="modal draggable fade" id="crea_empleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">x</span></button>
                <h4 class="modal-title" id="myModalLabel">Crear Nuevo Empleado</h4>
            </div>

            <div id="validacion_empleado" class="modal-body">
                <div id="ok"></div>
                    <div class="form-group">
                        <label class="control-label" for="title">Nombre:</label>
                        <input type="text"  id="NOMBRE_EMPLEADO" class="form-control" data-error="Ingrese Nombre" required />
                        <div id="mensaje1" class="help-block with-errors" ></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Apellido Paterno:</label>
                        <textarea  id="APELLIDO_PATERNO" class="form-control" data-error="Ingrese Apellido Paterno." required></textarea>
                        <div id="mensaje2"class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Apellido Materno:</label>
                        <textarea  id="APELLIDO_MATERNO" class="form-control" data-error="Ingrese Apellido Materno." required></textarea>
                        <div id="mensaje3" class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Categoria:</label>
                        <textarea  id="CATEGORIA" class="form-control" data-error="Ingrese Categoria." required></textarea>
                        <div id="mensaje4" class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Email:</label>
                        <textarea  id="CORREO" class="form-control" data-error="Ingrese Email" required></textarea>
                        <div id="mensaje5"class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <button type="submit" style="width:49%" id="btn_crearEmpleado" disabled class="btn crud-submit btn-info">Guardar</button>
                        <button type="submit" style="width:49%" id="btn_limpiarEmpleado"  class="btn crud-submit btn-info">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Final de Seccion Modal-->

<script>
DataGrid = [];
dataListado=[];

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




