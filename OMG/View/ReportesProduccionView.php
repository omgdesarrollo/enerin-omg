<?php
    session_start();
    require_once '../util/Session.php';    
    $Usuario=  Session::getSesion("user");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title></title>
    
    <!--Bootstrap y fontawesome-->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
    
    <link async href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    
    <!-- text fonts -->
	<!--<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />-->
    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <!--<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />-->
    <link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
    
    <!--Inicia para el spiner cargando-->
    <link async href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
    <!--Termina para el spiner cargando-->
                  
    <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
    <link async href="../../css/modal.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>
    <!--jquery-->
        <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--LIBRERIA DE dhtmlx-->
    <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
    <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
    <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
    <!--TERMINA LIBRERIA DE dhtmlx-->
    <!--EMPIEZA LIBRERIA DE SWEETALERT-->
     <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
    <!--TERMINA LIBRERIA DE SWEETALERT-->
    <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
<!--    LIBRERIA JSGRID-->
    <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
    <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
    <!--END JSGRID--> 
    
    
    <!--INICIA LIBRERIA DE JBOSS-->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v0.4.9/Source/jBox.min.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v0.4.9/Source/jBox.css" rel="stylesheet">-->
    <!--TERMINA LIBRERIA DE JBOSS-->

    
     <!--LIBRERIA PARA FORMULARIOS REPORTES-->
   
    <!--TERMINA LIBRERIA PARA FORMULARIO REPORTES-->
    
    <!--<script src="../../js/tools.js" type="text/javascript"></script>-->
    <script src="../../js/fReportesView.js" type="text/javascript"></script>
    <style>
/*        .dhxcombo_select_img{
            background-image: "../../images/base/loader.gif";
        }*/
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
            
        .modal-body{color:#888;max-height: calc(100vh - 110px);overflow-y: auto;}                    
        .modal-lg{width: 100%;}
        .modal {z-index: 1050 !important;}/*En caso de que quieras modificar el modal*/
        body{overflow:hidden;}
         div#myventana{
/*                  position: relative;*/
                    height:400px; 
                }
        fieldset {padding: 1px;}
		.readonly{ background: #F2F2F2 }
		td { margin: 2px; padding: 2px; }
		.inputhdr{font-weight: bold;padding-left: 5px;}

        </style>

</head>
<!-- <body> -->
<body class="no-skin" >
    <!--<div id="loader"></div>-->
    
    <?php
//        require_once 'EncabezadoUsuarioView.php';
    ?>
    
    <div id="headerFiltros" style="position: fixed;">
        <!--<div id="DemoLogin" class="btn btn-success target-click">  Agregar Nuevo Reporte Diario</div>-->
        <button onClick="" type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevaReporteModal">
		 Agregar  Reporte Diario
        </button>
    </div>
<!--    <div class="row"></div>-->
<br><br><br><!--esta linea no deberia ir hacerlo con boostrap-->
    <div id="jsGrid"></div>
<!-- Inicio de Seccion Modal Crear nueva Evidencia-->
<div class="modal draggable fade" id="nuevaReporteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeLetra">X</span>
                </button>
		        <h4 class="modal-title" id="myModalLabelNuevaEvidencia">Crear Nuevo Reporte</h4>
            </div>

            <div class="modal-body">
                <fieldset><legend><b>Seleccionar Datos</b></legend></fieldset>
                
                <div class='form-group'>
                    <label class='control-label'>Fecha: </label>
                    <!--<div id='INPUT_FECHA_NUEVOREGISTRO' style='witdth:100%'></div>-->
                    <input type="date" id="INPUT_FECHA_NUEVOREGISTRO" class="form-control" style='width:21%'>
                </div>
                
                <div class='form-group'>
                    <label class='control-label'>Región Fiscal: </label>
                    <div id='INPUT_REGIONFISCAL_NUEVOREGISTRO' style='witdth:100%'></div>                            
                </div>
                
                <div class="form-group">
                    <label class="control-label">ID de Contrato o Asignación: </label>
                    <div id="INPUT_CONTRATO_NUEVOREGISTRO" style='width:43%'></div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Ubicacion: </label>
                    <div id="INPUT_UBICACION_NUEVOREGISTRO" style="witdth:100%;"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tag del Patín: </label>
                    <div id="INPUT_TAGPATIN_NUEVOREGISTRO" style="witdth:100%;"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tag del Medidor: </label>
                    <div id="INPUT_TAGMEDIDOR_NUEVOREGISTRO" style="witdth:100%;"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipo de Medidor: </label>
                    <div id="INPUT_TIPOMEDIDOR_NUEVOREGISTRO" style='width:43%'></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Clasificacion: </label>
                    <div id="INPUT_CLASIFICACION_NUEVOREGISTRO" style='width:43%'></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipo de Hidrocarburo: </label>
                    <div id="INPUT_HIDROCARBURO_NUEVOREGISTRO" style='width:43%'></div>
                </div>
                
                    <!--<form id="forma" name="forma" method="post" class="frmcss" style="width:100%; overflow: hidden;"  >-->
                    <fieldset>
                        <table>
<!--                        <tr>

                                     <td>Cumplimiento<label style="cursor: pointer;padding-left: 6px;"><div id="contrato"></div></label></td>
                            </tr>-->
            <!--		<tr>
                                    <td>Orden</td>
                                    <td><input type="text" id ="orden" value="" readonly class="inputhdr"> </td>
                            </tr>-->
<!--                            <tr>
                                    <td></td>
                                <td>Fecha<label style="cursor: pointer;padding-left: 6px;"><input type="date" name ="fecha"  id="fecha"  class="inputhdr" ></label> </td>
                            </tr>-->
                        </table>
                    </fieldset>
                        
                    <!--<div style="position: relative;width: 100%;height: 4px;"></div>-->	

            <!--	<fieldset>
                            <table>
                                    <tr><td><button id="deshabilitar" type="button" onclick="">Deshabilitar</button></td>
                                    <td><button id="reporte" type="button" onclick="descargarReporte();">Generar reporte</button></td></tr>
                            </table>
                    </fieldset>-->

<!--                    <div style="position: relative;width: 100%;height: 10px;"></div>	
                    <fieldset><legend><b>Precargado a seleccionar</b></legend>
                            <table>
                            <tr>
                                <td><label style="cursor: pointer;padding-left: 3px;">Region fiscal<div id="region_fiscal"></div></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Punto de medicion<div id="pm"></div></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Tag del patin de medicion<div id="tpm"></div></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Tipo de medidor<div id="tm"></div></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Clasificacion de sistema de medicion<div id="clasificacionsistemamedicion"></div></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Tipo de Hidrocarburo<div id="th"></div></label></td>
                            </tr>
                            </table>
                    </fieldset>-->
                    <div style="position: relative;width: 100%;height: 8px;"></div>
                    <fieldset><legend><b>Ingresar Datos</b></legend>
                            <table>
                            <tr>	
                                <td><label style="cursor: pointer;padding-left: 3px;">Presion<pre><input id="DATO_MANUAL_1" name=""  type="text"   ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Temperatura<pre><input id="DATO_MANUAL_2" name=""  type="text"  ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Producción de Petróleo Medido Neto [bbl/día]<pre><input id="DATO_MANUAL_3" name=""  type="text"  ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">°API<pre>   <input id="DATO_MANUAL_4" name="" type="text" checked ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">% S<pre>    <input id="DATO_MANUAL_5" name=""  type="text"  ></label></td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>	
                                    <td><label style="cursor: pointer;padding-left: 3px;">% H₂O <pre>  <input id="DATO_MANUAL_6" name=""  type="text"  ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Producción de Gas Medido<pre><input id="DATO_MANUAL_7" name="pgmedido" type="text" ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Poder Calorífico de Gas<pre><input id="DATO_MANUAL_8" name="podercalorifico"   type="text" ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Peso Molecular de Gas<pre><input id="DATO_MANUAL_9" name="pesomolecular"  type="text"  ></label></td>
                                    <td><label style="cursor: pointer;padding-left: 3px;">Energía de Gas<pre> <input id="DATO_MANUAL_10" name="egas"  type="text"  ></label></td>
                            </tr>
                            <tr>




                                     <td><label style="cursor: pointer;padding-left: 3px;">Eventos<pre><input id="DATO_MANUAL_11" name="eventos"  type="text" ></label></td>
                            </tr>

                            <tr>


                            </tr>
                            </table>
                    </fieldset>
                    <div style="position: relative;width: 100%;height: 5px;"></div>
                    <!--</form>-->
                
                    <div class="form-group" method="post">
                        <button type="submit" id="btn_guardar_reportediario" class="btn crud-submit btn-info">Crear Reporte</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
DataGrid=[];
dataListado=[];

region_fiscal="";
ubicacion="";
clave_contrato="";
tag_medidor="";

listarDatosReportes();
buscarRegionesFiscales();    
  
</script>

<!--Final de Seccion Modal-->
    <!--Inicia para el spiner cargando-->
    <script src="../../js/loaderanimation.js" type="text/javascript"></script>
    <!--Termina para el spiner cargando-->   
    <!--Bootstrap-->
    <script src="../../assets/probando/js/bootstrap.min.js"></script>
    <!--Para abrir alertas de aviso, success,warning, error-->
    <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
    <!--Para abrir alertas del encabezado-->
    <script src="../../assets/probando/js/ace-elements.min.js"></script>
    <script src="../../assets/probando/js/ace.min.js"></script>
</body>
</html>



