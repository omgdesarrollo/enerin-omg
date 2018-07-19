<?php
session_start();
require_once '../util/Session.php';

$Usuario=  Session::getSesion("user"); 
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
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
                
                <!--Para abrir alertas de aviso, success,warning, error-->       
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                <script src="../../js/jquery.js" type="text/javascript"></script>

                             
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>

                <!-- cargar archivo -->
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
                
            <style>
                    .modal
                    {
                        overflow: hidden;
                    }
                    .modal-dialog{
                        margin-right: 0;
                        margin-left: 0;
                    }
                    .modal-header{
                      height:30px;background-color:#444;
                      color:#ddd;
                    }
                    .modal-title{
                      margin-top:-10px;
                      font-size:16px;
                    }
                    .modal-header .close{
                      margin-top:-10px;
                      color:#fff;
                    }
                    .modal-body{
                      color:#888;
                       /*max-height: calc(100vh - 210px);*/
                      max-height: calc(100vh - 110px);
                      overflow-y: auto;
                    }
                    .modal-body p {
                      text-align:center;
                      padding-top:10px;
                    }
                    
                    .validar_formulario{
                       background: blue; 
                       width: 100%; 
                       color: white; 
                    }


                    
/*Inicia estilos para mantener fijo el header*/                    
 .table-fixed-header {
    display: table; /* 1 */
    position: relative;
    padding-top: calc(~'2.5em + 2px'); /* 2 */
    
    table {
        margin: 0;
        margin-top: calc(~"-2.5em - 2px"); /* 2 */
    }
    
    thead th {
        white-space: nowrap;
        
        /* 3 - apply same styling as for thead th */
        /* 4 - compensation for padding-left */
        &:before {
            content: attr(data-header);
            position: absolute;
            top: 0;
            padding: .5em 1em; /* 3 */
            margin-left: -1em; /* 4 */
        }
    }
}

 /* 5 - setting height and scrolling */
.table-container {
    max-height: 70vh; /* 5 */
    overflow-y: auto; /* 5 */
        
        /* 6 - same styling as for thead th */
        &:before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        min-height: 2.5em;             /* 6 */
        border-bottom: 2px solid #DDD; /* 6 */
        background: #f1f1f1;           /* 6 */
    }
}
 
/*Finaliza estilos para mantener fijo el header*/                     
                    
                    
                    
                </style>
 
                    
	</head>

        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       
<?php

require_once 'EncabezadoUsuarioView.php';

?>
             <div id="idT"></div>        
<div style="height: 5px"></div>

             
<div style="position: fixed;">             
<button onClick="DocumentoArchivoAgregarModalF();" type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
		Agregar Documento de Entrada
</button>
    
<button id="btnAgregarDocumentoEntradaRefrescar" type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>

    <input type="text" id="idInputFolioEntrada" onkeyup="filterTableFolioEntrada()" placeholder="Folio de Entrada" style="width: 120px;">
    <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Asunto" style="width: 110px;">
    <input type="text" id="idInputRemitente" onkeyup="filterTableRemitente()" placeholder="Remitente" style="width: 110px;">
    <input type="text" id="idInputAutoridadRemitente" onkeyup="filterTableAutoridadRemitente()" placeholder="Autoridad Remitente" style="width: 150px;">
    <input type="text" id="idInputResponsableTema" onkeyup="filterTableResponsableTema()" placeholder="Responsable del Tema" style="width: 170px;">
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>  


<div style="height: 50px"></div>



<!--<div class="contenedortable" style="position: fixed;">   
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Folio de Entrada" style="width: 200px;">
</div >


<div style="height: 36px"></div>-->
             
             
 <div class="table-fixed-header" style="display:block;" id="myDiv" class="animate-bottom"> 
		
    <div class="table-container">
        
        <table id="idTable" class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">Contrato</th>
                                <th class="table-header">Referencia</th>
                                <th class="table-header">Folio de Entrada</th>
                                <th class="table-header">Fecha Recepcion</th>
                                <th class="table-header">Asunto</th>
                                <th class="table-header">Remitente</th>
                                <th class="table-header">Autoridad Remitente</th>
                                <th class="table-header">No.Tema</th>
                                <th class="table-header">Tema</th>
                                <th class="table-header">Responsable del Tema</th>              
                                <th class="table-header">Clasificacion</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Fecha Asignacion</th>
                                <th class="table-header">Fecha Limite</th>
                                <th class="table-header">Fecha Alarma</th>
                                <th class="table-header">Archivo Adjunto</th>
                                <th class="table-header">Observaciones</th>
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                    $Lista = Session::getSesion("listarDocumentosEntrada");
                    $cbxCump= Session::getSesion("listarCumplimientosComboBox");
                    $cbxAut= Session::getSesion("listarAutoridadesRemitentesComboBox");
                    $cbxTem= Session::getSesion("listarTemasComboBox");
//                  
//                  $datostema
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
                    if($filas["folio_entrada"] != "SIN FOLIO DE ENTRADA" ){  
                      
                      ?>
                      
			  <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clave_cumplimiento','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_cumplimiento"]; ?></td>                                                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'folio_referencia','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_referencia"]; ?></td>                                                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'folio_entrada','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_entrada"]; ?></td>
                                
                                
                                <td>
                                        <input style="" value="<?php echo $filas["fecha_recepcion"]; ?>" 
                                        onBlur="saveToDatabaseDates(this,'fecha_recepcion','<?php echo $filas["id_documento_entrada"]; ?>',
                                        '<?php echo $filas["fecha_asignacion"]; ?>','<?php echo $filas["fecha_limite_atencion"];?>',
                                        '<?php echo $filas["fecha_alarma"]; ?>')" type="date"/>
                                </td>
                                

                                <td contenteditable="true" onBlur="saveToDatabase(this,'asunto','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["asunto"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'remitente','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["remitente"]; ?></td>
                                
                                
                                <td> 
                                    <select id="id_autoridad" class="select" onchange="saveComboToDatabase('id_autoridad', <?php echo $filas["id_documento_entrada"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxAut as $value) {
                                                    if($value["id_autoridad"]=="".$filas["id_autoridad"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_autoridad"] ?>"  selected ><?php echo "".$value["clave_autoridad"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_autoridad"] ?>"  ><?php echo "".$value["clave_autoridad"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>

                                
                                <td style="background-color: #ccccff"> 
                                    <select id="id_clausula" class="select" onchange="saveComboToDatabase('id_clausula', <?php echo $filas["id_documento_entrada"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxTem as $value) {
                                                    if($value["id_tema"]=="".$filas["id_tema"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_tema"] ?>"  selected ><?php echo "".$value["no"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_tema"] ?>"  ><?php echo "".$value["no"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>
                                
                                    
                                <td style="background-color: #ccccff" contenteditable="false" onBlur="saveToDatabase(this,'nombre','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre"]; ?></td>
                                <td style="background-color: #ccccff" contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado"]; ?></td>
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clasificacion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);">
                                <?php 
                                
                                if ($filas["clasificacion"] == 1)
                                    {
                                    
                                    echo "Con Limite de Tiempo";                                   
                                    }
                                
                                if ($filas["clasificacion"] == 2)
                                    {
                                    
                                    echo "Sin Limite de Tiempo";                                   
                                    }
                                
                                if ($filas["clasificacion"] == 3)
                                    {
                                    
                                    echo "Informativo";                                   
                                    }
                                                              
                                ?>
                                </td>
                                
                                
                                <td> 
                                    <select id="id_status" class="select" onchange="saveComboToDatabase('status_doc', <?php echo $filas["id_documento_entrada"]; ?> )">
                                        <?php
                                        if($filas["status_doc"]== 1){                                                                                                            
                                        ?>                    
                                                        
                                            <option value="1" selected>En proceso</option>
                                            <option value="2">Suspendido</option>
                                            <option value="3">Terminado</option>
                                        
                                       <?php                                                              
                                        } 
                                       
                                                if($filas["status_doc"]== 2){
                                         
                                                ?>            
                                     
                                                    <option value="2" selected>Suspendido</option>
                                                    <option value="1">En proceso</option>
                                                    <option value="3">Terminado</option>
                                       
                                                <?php
                                                }
                                         
                                         
                                                            if($filas["status_doc"]== 3){
                                            
                                                            ?> 
                                                                <option value="3" selected>Terminado</option>
                                                                <option value="1">En proceso</option>
                                                                <option value="2">Suspendido</option>

                                       
                                                            <?php
                                                            }
                                                                                                                                           
                                                            ?>
                                       
 
                                    </select>                                                                     
                                </td>                        
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'status_doc','<?php // echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["status_doc"]; ?></td>-->
                                <td>
                                        <input style="" value="<?php echo $filas["fecha_asignacion"]; ?>" 
                                        onBlur="saveToDatabaseDates(this,'fecha_asignacion','<?php echo $filas["id_documento_entrada"]; ?>',
                                        '<?php echo $filas["fecha_asignacion"]; ?>','<?php echo $filas["fecha_limite_atencion"];?>',
                                        '<?php echo $filas["fecha_alarma"]; ?>')" type="date"/>
                                </td>
                                
                                <td>
                                        <input style="" value="<?php echo $filas["fecha_limite_atencion"]; ?>" 
                                        onBlur="saveToDatabaseDates(this,'fecha_limite_atencion','<?php echo $filas["id_documento_entrada"]; ?>',
                                        '<?php echo $filas["fecha_asignacion"]; ?>','<?php echo $filas["fecha_limite_atencion"];?>',
                                        '<?php echo $filas["fecha_alarma"]; ?>')" type="date"/>
                                </td>

                                <td>
                                        <input style="" value="<?php echo $filas["fecha_alarma"]; ?>" 
                                        onBlur="saveToDatabaseDates(this,'fecha_alarma','<?php echo $filas["id_documento_entrada"]; ?>',
                                        '<?php echo $filas["fecha_asignacion"]; ?>','<?php echo $filas["fecha_limite_atencion"];?>',
                                        '<?php echo $filas["fecha_alarma"]; ?>')" type="date"/>
                                </td>
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_ALARMA','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_alarma"]; ?></td>-->
                                <td>
                                        <button onClick="mostrar_urls(<?php echo $filas['id_documento_entrada'] ?>);" type="button" class="btn btn-info" data-toggle="modal" data-target="#create-itemUrls">
                                            <i class='fa fa-cloud-upload' style='font-size: 20px'></i>
                                            Mostrar
                                        </button>
                                        <!-- <?php echo $filas['id_documento_entrada']; ?> -->
                                </td>
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'observaciones','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observaciones"]; ?></td>
                                
                                
			  </tr>
                          
		<?php
		  }
                
                }// Cierra Foreach
                
		?>
		  </tbody>
		</table>


    </div>

</div>



<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nueva Entrada</h4>
		      </div>

		      <div class="modal-body">

                                        <!-- jjrl -->
                                    <!-- <form action="" id="form_subir"> -->
                                    
                                                <div class="form-group">
							<label class="control-label" for="title"><?php echo "Contrato: ".$filas["id_cumplimiento"]; ?></label>
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
                                                        
                                                        <select   id="ID_AUTORIDADMODAL" class="select2">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxAut as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_autoridad"] ?>"  ><?php echo "".$value["clave_autoridad"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                          
                          
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        
                                                        <select   id="ID_TEMAMODAL" class="select3">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxTem as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_tema"] ?>"  ><?php echo "".$value["nombre"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
						</div>
                                                    
                                                                              
                                                                                      
                                                <div class="form-group">
							<label class="control-label" for="title">Clasificacion:</label>
<!--                                                        <textarea  id="CLASIFICACION" class="form-control" data-error="Ingrese la Clasificacion" required></textarea>
							<div class="help-block with-errors"></div>
                                                        <div id="ValidarClasificacionModal" ></div>-->
                                                        <select id="CLASIFICACION">
                                                        <option value="1">Con Limite de Tiempo</option>
                                                        <option value="2">Sin Limite de Tiempo</option>
                                                        <option value="3">Informativo</option>
                                                        </select>
                                                        
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Status:</label>
<!--                                                        <textarea  id="STATUS_DOC" class="form-control" data-error="Ingrese el Status" required></textarea>
							<div class="help-block with-errors"></div>-->
                                                        
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
                                                                        
                                    
						<div class="form-group" method="post" >
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>

		      		<!-- </form> -->

		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal--> 
             
                


		
                
                
		<script>
                    
                var id_documento_entrada;
                var cualmodificar;
                function DocumentoArchivoAgregarModalF()
                {
                        $('#DocumentolistadoUrl').html(" ");
                        $('#DocumentolistadoUrlModal').html(" ");
                        $('#DocumentoEntradaAgregarModal').html(ModalCargaArchivo);
                        // $('#fileupload').fileupload();
                        $('#fileupload').fileupload({
                                url: '../View/'
                        });
                }
                $(function(){
                          
                          
                       $("#FOLIO_ENTRADA").keyup(function(){
//                            alert("d");
                            var valuefolioentrada=$(this).val();
//                            alert("d  "+valueclavedocumento);
                            
                            verificarExiste(valuefolioentrada,"folio_entrada");
                           
                        });
                      
                      
                          
                          
                          
                        $('.select').on('change', function() {  
                          
                        if (cualmodificar == "id_cumplimiento") {
    
                         column="id_cumplimiento";
    
                        } else if (cualmodificar == "id_autoridad"){
                          
                          column="id_autoridad";                          
                          
                        } else if (cualmodificar == "status_doc"){
                            
                          column="status_doc"; 
                         
                            
                        } else {
                            
                          column="id_tema";  
                            
                        }
                        
                        
//                          alert("d");
                          val=$(this).prop('value');
//                          alert("el value que va a viajar es "+val+" y el id del documento de entrada : "+id_documento_entrada);
                          $.ajax({
                                url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_documento_entrada,
				success: function(data){
                                        refresh();
				}   
                           });
                          
                          
                        });
                        $("#btn_guardar").click(function(){
                                //   alert("entro");
       
        
//                                    var ID_CUMPLIMIENTOMODAL=$("#ID_CUMPLIMIENTOMODAL").val();
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
                                  
                                   alert("FOLIO_REFERENCIA :"+FOLIO_REFERENCIA
                                        +"FOLIO_ENTRADA :"+FOLIO_ENTRADA+"FECHA_RECEPCION :"+FECHA_RECEPCION+"ASUNTO :"+ASUNTO
                                        +"REMITENTE :"+REMITENTE+"ID_AUTORIDADDMODAL :"+ID_AUTORIDADMODAL+"ID_TEMAMODAL :"+ID_TEMAMODAL
                                        +"CLASIFICACION :"+CLASIFICACION+"STATUS_DOC :"+STATUS_DOC+"STATUS_DOC :"+STATUS_DOC
                                        +"FECHA_ASIGNACION :"+FECHA_ASIGNACION+"FECHA_LIMITE_ATENCION :"+FECHA_LIMITE_ATENCION
                                        +"FECHA_ALARMA :"+FECHA_ALARMA+"DOCUMENTO :"+DOCUMENTO+"OBSERVACIONES :"+OBSERVACIONES);

                                    datos=[];
//                                    datos.push(ID_CUMPLIMIENTOMODAL);//0
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
//                                   verificar si esta correcto!!! 
//                                   recepcionF = new Date(datos[3]);
//                                   recepcionF = new Date(recepcionF.getFullYear(),recepcionF.getMonth(),recepcionF.getDate()); 
                                   
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
                                                }
                                                else
                                                {
                                                        // console.log("La fecha de Alarma no puede ser antes de la asignación");
                                                        //$
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
                                else {
                                
                                    //campo requerido asignacion
                                                  todoBien = false;
                                                  $('#ValidarFechaAsignacionModal').html('*Campo requerido');
                                                $('#ValidarFechaAsignacionModal').addClass("validar_formulario");

                                }
                                console.log((todoBien) ? " BIEN " : "Tus valores estan mal/ se pintara en el modal todo lo que sea erroneo o incompleto");
                                // var peticion = new XMLHttpRequest();
                                // console.log("2");
                                //progreso
                                // peticion.upload.addEventListener("Progress",(event)=>
                                // {
                                //         var porcentaje = Math.round((event.loaded/event.total) * 100);
                                //         console.log(porcentaje);
                                        // barra_estado.style.width = porcentaje+'%';
                                        // span.innerHTML = porcentaje+'%';
                                // });
                                // console.log("3");
                                //finalizar
                                // peticion.addEventListener("load",()=>
                                // {
                                        // barra_estado.classList.add('barra_verde');
                                        // console.log("Proceso completado");
                                // });
                                // peticion.open('post','../../subir.php');
                                // peticion.send(new FormData());
                                //cancelar
                                // botton_cancelar.addEventListener("click",()=>
                                // {
                                //         peticion.abort();
                                //         barra_estado.classList.remove('barra_verde');
                                //         barra_estado.classList.add('barra_roja');
                                //         span.innerHTML = "proceso Cancelado";
                                // });
                                if(todoBien == true)
                                    saveToDatabaseDatosFormulario(datos);
                        // });
                        });
                        
                        
                        $("#btn_limpiar").click(function(){
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
                      
                      
                      
                                                  
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
//			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
//					$(editableObj).css("background","#FDFDFD");
                                    refresh();
				}   
		   });
		}
                function saveToDatabaseDates(editableObj,column,id,fasignacion,flimite,falarma,frecepcion)
                {
                        // console.log(column);
                        // console.log(id);
                        // console.log(editableObj.value);
                        // console.log(fasignacion);
                        // console.log(flimite);
                        // console.log(falarma);
                        alert(falarma);
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
                                        // else
                                        // {
                                        //         ejecutarAjax=false;
                                        //         swal("VERIFICAR", "La fecha de alarma no puede quedar sin fecha!", "error");
                                        //         fecha = falarma;
                                        // }
                                }
                        }
                        else
                        {
                                (editableObj.value=="")? ejecutarAjax=false :editableObj.style="color:limegreen";
                                fecha = frecepcion;
                        }
                        if(ejecutarAjax==true)
                        {
                                $.ajax({
                                        url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
                                        type: "POST",
                                        data:'column='+column+'&editval='+editableObj.value+'&id='+id,
                                        success: function(data)
                                        {
                                                (data)? editableObj.style="color:limegreen":editableObj.value=fecha;
                                        }
                                });
                        }
                        else
                                editableObj.value=fecha

		}
                function compararFechaAsignacion(val,flimite,falarma)
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
                function compararFechaLimite(val,fasignacion,falarma)
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
                function compararFechaAlarma(val,fasignacion,flimite)
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
                
                
                function saveComboToDatabase(column,id){
                        id_documento_entrada=id;
                        cualmodificar=column;
               }
              
              
    function refresh(){
//        alert("entro ");
                  consultarDatos("../Controller/DocumentosEntradaController.php?Op=Listar");  
//                  window.location.href="DocumentoEntradaView.php";

                }           
                          
         
         
         function consultarDatos(url){
            $.ajax({  
                  url: ""+url,  
                  async:false,
                 success: function(r) {
                     alert();
                     $("#idT").load("DocumentoEntradaView.php #idTable");
//                     table-container
                     $("#loader").hide();

                  },
                  beforeSend:function(r){

                  },
                  error:function(){
                     $("#loader").hide(); 
                  }

            }); 
    }
    function consultarInformacion(url){
        $("#loader").show(); 
        $.ajax({  
              url: ""+url,  
             success: function(r) {
                 $("#idTable").load("DocumentosEntradaView.php #idTable");
                 $("#loader").hide();

              },
              beforeSend:function(r){

              },
              error:function(){
                 $("#loader").hide(); 
              }
                 
        });  
    }
    
    
    
    function verificarExiste(dataString,cualverificar){
//          alert("fdf");
                    //Le pasamos el valor del input al ajax
       $.ajax({
                                type: "POST",
                                url: "../Controller/DocumentosEntradaController.php?Op=verificacionexisteregistro&cualverificar="+cualverificar,
                                data: "registro="+dataString,
                                success: function(data) {    
                mensajeerror="";

                    $.each(data, function (index,value) {
                //        console.log("sub_clausula: " + value.sub_clausula);
                        mensajeerror="El Folio de Entrada "+value.folio_entrada+" Ya Existe";
                    });
                $("#ValidarFolioEntradaModal").html(mensajeerror);
                

                if(mensajeerror!=""){
                    
                    $("#ValidarFolioEntradaModal").addClass("validar_formulario");
                    $("#ValidarFolioEntradaModal").css("background","orange");
                    $("#btn_guardar").prop("disabled",true);
                }else{
                    $("#btn_guardar").prop("disabled",false);
                }



                }
         })
}
    
    

    
    
    function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
         
                
        function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                // var ID_DOCUMENTO;
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
                        //     alert(  $Url ?>);
//					$(editableObj).css("background","#FDFDFD");
                                // ID_DOCUMENTO = jsonData.ID_DOCUMENTO;
                                consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                // $('#fileupload').fileupload({
                                //         url: '../../archivos/files/'+jsonData.ID_CUMPLIMIENTO+'/'+jsonData.ID_DOCUMENTO+'/'
                                // });
                                // $('#fileupload').fileupload
                                // ({
                                //         formData: {newUrl: '/'+jsonData.ID_CUMPLIMIENTO+'/'+jsonData.ID_DOCUMENTO+'/'}
                                // });
                                $.ajax({
                                        url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',//crea las carpetas y la sesion url
                                        type: 'GET',
                                        data: 'URL='+valores,
                                        success:function(creado)
                                        {
                                                if(creado)
                                                {
                                                        $('.start').click();
                                                        $('#create-item .close').click();
                                                }
                                        }
                                });
                                // $ ( ' #fileupload ' ). fileupload ( ' send ' , {files : filesList}).success(function(data){alert("termino")})
                                // {
                                        // console.log();
                                        // $.ajax({
                                        // url: "../Controller/ArchivoUploadController.php?Op=Guardar",
                                        // type: "POST",
                                        // data: 'ID_DOCUMENTO='+ID_DOCUMENTO,
                                        // async: false,
                                        // success: function(data)
                                        // {
                                        //         alert("insertado urls");
                                        // }
                                        // });
                                // });
                        }
                // }).done(function(jsonData)
                // {
                        // ID_DOCUMENTO = jsonData.ID_DOCUMENTO;
                        // consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                        // $('.start').click();
                });
                // .then(function(data)
                // {
                        // var tempUrls = "
                                // Session::getSesion("archivos_urls") ?>";
                        // console.log("valores : "+tempUrls); no funciona
                
                // });
//                   window.location.href("EmpleadosView.php");
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
                $.ajax({
                        url:    '../Controller/DocumentosEntradaController.php?Op=getIdCumplimiento',
                        type:   'GET',
                        data: 'ID_DOCUMENTO='+id_documento_entrada,
                        success: function(Id_cumplimiento)
                        {
                                if(Id_cumplimiento!="")
                                {
                                        URL = 'filesDocumento/Entrada/'+Id_cumplimiento+"/"+id_documento_entrada;
//                                        alert(URL);
                                        $.ajax({
                                                url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
                                                type: 'GET',
                                                data: 'URL='+URL,
                                                success:function(creado)
                                                {
                                                        if(creado)
                                                        {
                                                                $.ajax({
                                                                        url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                                                                        type: 'GET',
                                                                        data: 'URL='+URL,
                                                                        success: function(todo)
                                                                        {
                                                                                console.log(todo[0].length);
                                                                                if(todo[0].length!=0)
                                                                                {
                                                                                        tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                                                                                        $.each(todo[0], function (index,value)
                                                                                        {
                                                                                                nametmp = value.split("^-O-^-M-^-G-^");
                                                                                                fecha = new Date(nametmp[0]*1000);
                                                                                                fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                                                                                                
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
                                                        else
                                                        {
                                                                swal("","Error del servidor","error");
                                                        }
                                                }
                                        });
                                }
                        }
                });
        }


        function agregarArchivosUrl()
        {
                var ID_DOCUMENTO = $('#tempInputIdDocumento').val();
                // alert(ID_DOCUMENTO);
                $.ajax({
                        url: "../Controller/DocumentosEntradaController.php?Op=getIdCumplimiento",
                        type: 'GET',
                        data: 'ID_DOCUMENTO='+ID_DOCUMENTO,
                        success:function(Id_cumplimiento)
                        {
                                if(Id_cumplimiento!="")
                                {
                                        url = 'filesDocumento/Entrada/'+Id_cumplimiento+"/"+ID_DOCUMENTO,
                                        $.ajax({
                                                url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
                                                type: 'GET',
                                                data: 'URL='+url,
                                                success:function(creado)
                                                {
                                                        if(creado)
                                                                $('.start').click();
                                                },
                                                error:function()
                                                {
                                                        swal("","Error del servidor","error");
                                                }
                                        });
                                }
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
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                        }, function()
                        {
                                var ID_DOCUMENTO = $('#tempInputIdDocumento').val();
                                $.ajax({
                                        url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
                                        type: 'GET',
                                        data: 'URL='+url,
                                        success: function(eliminado)
                                        {
                                                // eliminar = eliminado;
                                                if(eliminado)
                                                {
                                                        mostrar_urls(ID_DOCUMENTO);
                                                        swal("","Archivo eliminado");
                                                        setTimeout(function(){swal.close();},1000);
                                                }
                                                else
                                                        swal("","Ocurrio un error al eliminar el archivo", "error");
                                        },
                                        error:function()
                                        {
                                                swal("","Ocurrio un error al elimiar el archivo", "error");
                                        }
                                });
                        });
        }
                function filterTableFolioEntrada() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputFolioEntrada");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[2];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                
                function filterTableAsunto() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputAsunto");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[4];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                
                
                function filterTableRemitente() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputRemitente");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[5];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                
                function filterTableAutoridadRemitente() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputAutoridadRemitente");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[6];
                      if (td) {
                        select=td.getElementsByTagName("select");
                          $.each(select,function(index,value)
                          {
                                var indexRes = value.selectedIndex;
                                var responsable=value[indexRes].innerHTML;
                                console.log(responsable);
                              if (responsable.toUpperCase().indexOf(filter) > -1)
                              {
                                tr[i].style.display = "";
                              }
                              else
                              {
                                tr[i].style.display = "none";
                              }
//                            console.log(value.options(ind));
                          });
                      } 
                    }
                }
                
                
                function filterTableResponsableTema() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsableTema");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[9];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                
                function CambioStatusDocumentoEntrada(){
//                    alert("Llego aqui "+$("#STATUS_DOC").val());
                    if ($("#STATUS_DOC").val() == 3){
                    
                    Habilitar_DesabilitarFechas(true);
                    
                    } else {
                        if ($("#STATUS_DOC").val() == 1) {
                            
                            Habilitar_DesabilitarFechas(false);
                        }
                        
                        if ($("#STATUS_DOC").val() == 2) {
                            
                            Habilitar_DesabilitarFechas(false);
                        }
                    }
                        

                }
                
                
                function Habilitar_DesabilitarFechas(accion) {
                    $("#FECHA_ASIGNACION").prop("disabled",accion);
                    $("#FECHA_LIMITE_ATENCION").prop("disabled",accion);
                    $("#FECHA_ALARMA").prop("disabled",accion);
                    $("#MENSAJE_ALERTA").prop("disabled",accion);
                }
                
                
                
                
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
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
                <!--jquery-->
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>

                <!--Bootstrap-->
                <!--Aqui abre el modal de insertar-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Aqui cierra para abrir el modal de insertar-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>

                <!--Para abrir alertas del encabezado-->
                <script src="../../assets/probando/js/ace-elements.min.js"></script>
                <script src="../../assets/probando/js/ace.min.js"></script>
		<script src="../../assets/probando/js/ace-extra.min.js"></script>     
          

                <!-- js cargar archivo -->
                <script src="../../assets/FileUpload/js/jquery.min.js"></script>
                <script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>
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


