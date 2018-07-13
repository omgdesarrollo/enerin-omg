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
                <script src="../../js/fInformeEvidenciasView.js" type="text/javascript"></script>
                
        <style>

            .modal-body{
            color:#888;
            max-height: calc(100vh - 110px);
            overflow-y: auto;
            }                    

            #sugerenciasclausulas {
            width:350px;
            height:5px;
            overflow: auto;
            }  
            body{
            overflow:hidden;     
            }

            .hideScrollBar{
            width: 100%;
            height: 50%;
            overflow: auto;
            margin-right: 14px;
            padding-right: 28px; /*This would hide the scroll bar of the right. To be sure we hide the scrollbar on every browser, increase this value*/
            padding-bottom: 15px; /*This would hide the scroll bar of the bottom if there is one*/
            }
            
            

        </style>            
                
 			 
</head>

        
        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>

             
<div style="position: fixed;">    
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

        <input type="text" id="idInputClaveDocumento" onkeyup="filterTableClaveDocumento()" placeholder="Clave Documento" style="width: 180px;">
        <input type="text" id="idInputNombreDocumento" onkeyup="filterTableNombreDocumento()" placeholder="Nombre Documento" style="width: 180px;">
        <input type="text" id="idInputResponsableDocumento" onkeyup="filterTableResponsableDocumento()" placeholder="Responsable del Documento" style="width: 180px;">
        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>    


<div style="height: 40px"></div>

<div class="container">		
    <div class="row">
        <div class="col-md-4">
                <div class="row align-items-center">
                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkValidado">
                        </div>
                        <div class="col-4">Validados</div>
                </div>
        </div>

        <div class="col-md-4">
                <div class="row align-items-center">
                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkNoValidado">
                        </div>
                        <div class="col-5">En Proceso</div>
                </div>
        </div>

<!--        <div class="col-md-4">
                <div class="row align-items-center">
                        <div class="col-1">
                                <input type="checkbox" style="width: 40px; height: 40px" name="checkValidado"  class="checkboxDocumento" id="checkSinDocumento">
                        </div>
                        <div class="col-6">Sin Documento</div>
                </div>
        </div>							-->
    </div>
</div>    


<table class="table table-bordered table-striped header_fijo tbl-qa" id="idTable ">
    <thead>                              
            <tr>

<!--                  <th class="table-header" width="4.8%">No</th>
                  <th class="table-header" width="9.6%">Cumplimiento</th>-->
                  <th class="table-header" width="9.6%">Tema</th>
                  <th class="table-header" width="9.6%">Requisitos</th>
                  <th class="table-header" width="9.6%">Registros</th>
                  <th class="table-header" width="14.4%">Clave del Documento</th>
                  <th class="table-header" width="14.4%">Responsable del Documento</th>
                  <th class="table-header" width="14.4%">Frecuencia</th>
                  <th class="table-header" width="14.4%">Evidencia</th>
                  <th class="table-header" width="14.4%">Fecha de Registro</th>
                  <th class="table-header" width="14.4%">Desviacion</th>
                  <th class="table-header" width="14.4%">Accion Correctiva</th>
                  <th class="table-header" width="14.4%">Avance del Plan</th>
                  <th class="table-header" width="9.6%">Estatus</th>

            </tr>
    </thead>
    
    <tbody class="hideScrollBar"  id="datosGenerales" style="position: absolute">    

    </tbody>
</table>

               
<!-- Inicio moda -->
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




                
<script>
    listarDatos();
                    
</script>

            
            <!--<script src="../../js/fReporteValidacionDocumentosView.js" type="text/javascript"></script>-->
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


