
<?php
session_start();
require_once '../util/Session.php';

$Usuario=  Session::getSesion("user"); 
$listadoUrls= Session::getSesion("getUrlsArchivos");
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
		<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
                <!--<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
                <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                
                <!-- clase para la subida de archivos -->
                <link href="../../assets/probando/css/subir.css" rel="stylesheet" type="text/css"/>

		<!--<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />-->
                <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                                                
                <script src="../../js/jquery.js" type="text/javascript"></script>
		<script src="../../assets/probando/js/ace-extra.min.js"></script>              
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>

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
                </style>
 
                    
	</head>

        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       
<?php

require_once 'EncabezadoUsuarioView.php';

?>            
             
             
<button onClick="DocumentoArchivoAgregarModalF();" type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
		Agregar Documento de Entrada
</button>             
             
             
 <div style="display:none;" id="myDiv" class="animate-bottom"> 
		
                     <div class="contenedortable">
                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">Contrato</th>
                                <th class="table-header">Folio Referencia</th>
                                <th class="table-header">Folio de Entrada</th>
                                <th class="table-header">Fecha Recepcion</th>
                                <th class="table-header">Asunto</th>
                                <th class="table-header">Remitente</th>
                                <th class="table-header">Entidad Reguladora</th>
                                <th class="table-header">No.Tema</th>
                                <th class="table-header">Tema</th>
                                <th class="table-header">Responsable del Tema</th>              
                                <th class="table-header">Clasificacion</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Fecha Asignacion</th>
                                <th class="table-header">Fecha Limite</th>
                                <!--<th class="table-header">FECHA ALARMA</th>-->
                                <th class="table-header">Documento</th>
                                <th class="table-header">Observaciones</th>
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                    $Lista = Session::getSesion("listarDocumentosEntrada");
//                   $Lista = PaginacionController::show_rows("ID_ASIGNACION_TEMA_REQUISITO");
                    $cbxCump= Session::getSesion("listarCumplimientosComboBox");
                    $cbxEnt= Session::getSesion("listarEntidadesReguladorasComboBox");
                    $cbxClau= Session::getSesion("listarClausulasComboBox");
//                  
//                  $datostema
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                                
                                <td> 
                                    <select id="id_cumplimiento"class="select" onchange="saveComboToDatabase('id_cumplimiento', <?php echo $filas["id_documento_entrada"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxCump as $value) {
                                                    if($value["id_cumplimiento"]=="".$filas["id_cumplimiento"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_cumplimiento"] ?>"  selected ><?php echo "".$value["clave_cumplimiento"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_cumplimiento"] ?>"  ><?php echo "".$value["clave_cumplimiento"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>
                                
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'folio_referencia','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_referencia"]; ?></td>                                                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'folio_entrada','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_entrada"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'fecha_recepcion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_recepcion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'asunto','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["asunto"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'remitente','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["remitente"]; ?></td>
                                
                                
                                <td> 
                                    <select id="id_entidad" class="select" onchange="saveComboToDatabase('id_entidad', <?php echo $filas["id_documento_entrada"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxEnt as $value) {
                                                    if($value["id_entidad"]=="".$filas["id_entidad"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_entidad"] ?>"  selected ><?php echo "".$value["clave_entidad"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_entidad"] ?>"  ><?php echo "".$value["clave_entidad"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>

                                
                                <td> 
                                    <select id="id_clausula" class="select" onchange="saveComboToDatabase('id_clausula', <?php echo $filas["id_documento_entrada"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxClau as $value) {
                                                    if($value["id_clausula"]=="".$filas["id_clausula"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_clausula"] ?>"  selected ><?php echo "".$value["clausula"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_clausula"] ?>"  ><?php echo "".$value["clausula"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>
                                
                                    
                                <td contenteditable="false" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion_clausula"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'clasificacion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clasificacion"]; ?></td>
                                
                                
                                <td> 
                                    <select id="id_status" class="select" onchange="saveComboToDatabase('status_doc', <?php echo $filas["id_documento_entrada"]; ?> )">
                                        <?php
                                        if($filas["status_doc"]== 1){                                                                                                            
                                        ?>                    
                                                        
                                            <option value="1" selected>En proceso</option>
                                            <option value="2">Suspendido</option>
                                            <option value="3">En alerta</option>
                                            <option value="4">Terminado</option>
                                        
                                       <?php                                                              
                                        } 
                                       
                                                if($filas["status_doc"]== 2){
                                         
                                                ?>            
                                     
                                                    <option value="2" selected>Suspendido</option>
                                                    <option value="1">En proceso</option>
                                                    <option value="3">En alerta</option>
                                                    <option value="4">Terminado</option>
                                       
                                                <?php
                                                }
                                         
                                                        if($filas["status_doc"]== 3){
                                         
                                                        ?>
                                       
                                                            <option value="3" selected>En alerta</option>
                                                            <option value="1">En proceso</option>
                                                            <option value="2">Suspendido</option>
                                                            <option value="4">Terminado</option>
                                       
                                                        <?php
                                                        }
                                         
                                                            if($filas["status_doc"]== 4){
                                            
                                                            ?> 
                                                                <option value="4" selected>Terminado</option>
                                                                <option value="1">En proceso</option>
                                                                <option value="2">Suspendido</option>
                                                                <option value="3" >En alerta</option>

                                       
                                                            <?php
                                                            }
                                                            
                                                                                
                                                            ?>
                                       
 
                                    </select>                                                                     
                                </td>
                                
                                
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'status_doc','<?php // echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["status_doc"]; ?></td>-->
                                <td contenteditable="true" onBlur="saveToDatabase(this,'fecha_asignacion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_asignacion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'fecha_linmite_atencion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_limite_atencion"]; ?></td>
                                
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_ALARMA','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_alarma"]; ?></td>-->
                                <td>
                                        <button onClick="mostrarUrl(<?php echo $filas['id_documento_entrada'] ?>);" type="button" class="btn btn-success" data-toggle="modal" data-target="#create-itemUrls">
		                                Mostrar Documentos
                                        </button>
                                        <!-- <?php echo $filas['id_documento_entrada']; ?> -->
                                </td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'observaciones','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observaciones"]; ?></td>
                                
                                
			  </tr>
                          
		<?php
		}
                
		?>
		  </tbody>
		</table>

                     </div>

<!--			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>-->
	
</div>
             
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Archivos agregados</h4>
		      </div>

		      <div class="modal-body">
                        <div id="DocumentolistadoUrl"></div>

                        
                        <div class="form-group">
                                <div id="DocumentolistadoUrlModal"></div>
			</div>

                        <div class="form-group" method="post" >
                                <button type="submit" id="btn_guardar2"  class="btn crud-submit btn-info">Agragar Archivo</button>
                        </div>
                      </div><!-- cierre div class-body -->
                </div><!-- cierre div class modal-content -->
        </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->

             
       <!-- Inicio de Seccion Modal -->
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
							<label class="control-label" for="title">Contrato:</label>
                                                        
                                                        <select   id="ID_CUMPLIMIENTOMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxCump as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_cumplimiento"] ?>"  ><?php echo "".$value["clave_cumplimiento"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                          
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Folio Referencia:</label>
                                                        <input type="text"  id="FOLIO_REFERENCIA" class="form-control" data-error="Ingrese el Folio de referencia" required />
							<div class="help-block with-errors"></div>
						</div>

                                    
						<div class="form-group">
							<label class="control-label" for="title">Folio de Entrada:</label>
                                                        <textarea  id="FOLIO_ENTRADA" class="form-control" data-error="Ingrese el folio de entrada" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group-">
							<label class="control-label" for="title">Fecha Recepcion:</label>                                                       
                                                        <input type="date" id="FECHA_RECEPCION" class="form-control" data-error="Ingrese la Fecha de Recepcion" required/>							   
                                                        <div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Asunto:</label>
                                                        <textarea  id="ASUNTO" class="form-control" data-error="Ingrese el Asunto" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Remitente:</label>
                                                        <textarea  id="REMITENTE" class="form-control" data-error="Ingrese el Remitente" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                
                          
                          
                                                <div class="form-group">
							<label class="control-label" for="title">Entidad Reguladora:</label>
                                                        
                                                        <select   id="ID_ENTIDADMODAL" class="select2">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxEnt as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_entidad"] ?>"  ><?php echo "".$value["clave_entidad"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                          
                          
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        
                                                        <select   id="ID_CLAUSULAMODAL" class="select3">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxClau as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_clausula"] ?>"  ><?php echo "".$value["clausula"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                                                    
                                                                              
                                                                                      
                                                <div class="form-group">
							<label class="control-label" for="title">Clasificacion:</label>
                                                        <textarea  id="CLASIFICACION" class="form-control" data-error="Ingrese la Clasificacion" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Status:</label>
<!--                                                        <textarea  id="STATUS_DOC" class="form-control" data-error="Ingrese el Status" required></textarea>
							<div class="help-block with-errors"></div>-->
                                                        
                                                        <select id="STATUS_DOC">
                                                        <option value="1">En proceso</option>
                                                        <option value="2">Suspendido</option>
                                                        <option value="3">En alerta</option>
                                                        <option value="4">Terminado</option>
                                                        </select>
						</div>
                          
                          
                                                <div class="form-group-">
							<label class="control-label" for="title">Fecha Asignacion:</label>                                                       
                                                        <input type="date" id="FECHA_ASIGNACION" class="form-control" data-error="Ingrese la Fecha de Asignacion" required/>							   
                                                        <div class="help-block with-errors"></div>
						</div>
                          
                                                
                                                <div class="form-group-">
							<label class="control-label" for="title">Fecha Limite de Atencion:</label>                                                       
                                                        <input type="date" id="FECHA_LIMITE_ATENCION" class="form-control" data-error="Ingrese la Fecha Limite de Atencion" required/>							   
                                                        <div class="help-block with-errors"></div>
						</div>

                                                
                          
                                                <div class="form-group-">
							<label class="control-label" for="title">Fecha Alarma:</label>                                                       
                                                        <input type="date" id="FECHA_ALARMA" class="form-control" data-error="Ingrese la Fecha de Alarma" required/>							   
                                                        <div class="help-block with-errors"></div>
						</div>

                                                <div class="form-group">
							<label class="control-label" for="title">Mensaje para alerta:</label>
                                                        <textarea  id="MENSAJE_ALERTA" class="form-control"></textarea>
							<!-- <div class="help-block with-errors"></div> -->
						</div>

                          
<!--                                                <div class="form-group">
							<label class="control-label" for="title">Documento:</label>
                                                        <textarea  id="DOCUMENTO" class="form-control" data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>-->
                                                <!-- <div class="form-group"> -->
                                                        <div id="DocumentoEntradaAgregarModal"></div>
						<!-- </div> -->
                                                
                                                <!-- <div class="barra">
                                                        <div class="barra_azul" id="barra_estado">
                                                        <span></span>
                                                        </div>
                                                </div> -->
                                                
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
                var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
                ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
                ModalCargaArchivo += "<div class='fileupload-buttons'>";
                ModalCargaArchivo += "<span class='fileinput-button'>";
                ModalCargaArchivo += "<span><a >Agregar documentos(Click o Arrastrar)...</a></span>";
                ModalCargaArchivo += "<input type='file' name='files[]' multiple></span>";
                ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
                ModalCargaArchivo += "<div class='fileupload-progress' >";
                ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
                ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
                ModalCargaArchivo += "</div></div>";
                ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";
                function DocumentoArchivoAgregarModalF()
                {
                        $('#DocumentolistadoUrlModal').html(" ");
                        $('#DocumentoEntradaAgregarModal').html(ModalCargaArchivo);
                        $('#fileupload').fileupload();
                        $('#fileupload').fileupload({
                                url: '../View/',
                        });
                }
                function mostrarUrl(id_documento_entrada)
                {
                        // alert("mostrar urls: "+id_documento_entrada);
                        mostrar_urls(id_documento_entrada);
                }
                      $(function(){
                          
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          
                        if (cualmodificar == "id_cumplimiento") {
    
                         column="id_cumplimiento";
    
                        } else if (cualmodificar == "id_entidad"){
                          
                          column="id_entidad";                          
                          
                        } else if (cualmodificar == "status_doc"){
                            
                          column="status_doc"; 
                         
                            
                        } else {
                            
                          column="id_clausula";  
                            
                        }
                        
                        
                          
                          val=$(this).prop('value');
                          alert("el value que va a viajar es "+val+" y el id del documento de entrada : "+id_documento_entrada);
                          $.ajax({
                                url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_documento_entrada,
				success: function(data){
//                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
					//$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                        consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                        window.location.href="DocumentoEntradaView.php";
				}   
                           });
                          
                          
                        });

                        $("#btn_guardar2").click(function()
                        {
                                agregarArchivosUrl();
                        });
                        $("#btn_guardar").click(function(){
                                //   alert("entro");
       
        
                                    var ID_CUMPLIMIENTOMODAL=$("#ID_CUMPLIMIENTOMODAL").val();
                                    var FOLIO_REFERENCIA=$("#FOLIO_REFERENCIA").val();
                                    var FOLIO_ENTRADA=$("#FOLIO_ENTRADA").val();
                                    var FECHA_RECEPCION=$("#FECHA_RECEPCION").val();
                                    var ASUNTO=$("#ASUNTO").val();
                                    var REMITENTE=$("#REMITENTE").val();
                                    var ID_ENTIDADMODAL=$("#ID_ENTIDADMODAL").val();
                                    var ID_CLAUSULAMODAL=$("#ID_CLAUSULAMODAL").val();
                                    var CLASIFICACION=$("#CLASIFICACION").val();
                                    var STATUS_DOC=$("#STATUS_DOC").val();
                                    var FECHA_ASIGNACION=$("#FECHA_ASIGNACION").val();
                                    var FECHA_LIMITE_ATENCION=$("#FECHA_LIMITE_ATENCION").val();
                                    var FECHA_ALARMA=$("#FECHA_ALARMA").val();
                                    var DOCUMENTO=$('#fileupload').fileupload('option', 'url');
                                    var OBSERVACIONES=$("#OBSERVACIONES").val();
                                    var MENSAJE_ALERTA=$("#MENSAJE_ALERTA").val();
                                  
                                //   alert("ID_CUMPLIMIENTOMODAL :"+ID_CUMPLIMIENTOMODAL+"FOLIO_REFERENCIA :"+FOLIO_REFERENCIA
                                //        +"FOLIO_ENTRADA :"+FOLIO_ENTRADA+"FECHA_RECEPCION :"+FECHA_RECEPCION+"ASUNTO :"+ASUNTO
                                //        +"REMITENTE :"+REMITENTE+"ID_ENTIDADMODAL :"+ID_ENTIDADMODAL+"ID_CLAUSULAMODAL :"+ID_CLAUSULAMODAL
                                //        +"CLASIFICACION :"+CLASIFICACION+"STATUS_DOC :"+STATUS_DOC+"STATUS_DOC :"+STATUS_DOC
                                //        +"FECHA_ASIGNACION :"+FECHA_ASIGNACION+"FECHA_LIMITE_ATENCION :"+FECHA_LIMITE_ATENCION
                                //        +"FECHA_ALARMA :"+FECHA_ALARMA+"DOCUMENTO :"+DOCUMENTO+"OBSERVACIONES :"+OBSERVACIONES);

                                    datos=[];
                                    datos.push(ID_CUMPLIMIENTOMODAL);
                                    datos.push(FOLIO_REFERENCIA);
                                    datos.push(FOLIO_ENTRADA);
                                    datos.push(FECHA_RECEPCION);
                                    datos.push(ASUNTO);
                                    datos.push(REMITENTE);
                                    datos.push(ID_ENTIDADMODAL);
                                    datos.push(ID_CLAUSULAMODAL);
                                    datos.push(CLASIFICACION);
                                    datos.push(STATUS_DOC);
                                    datos.push(FECHA_ASIGNACION);
                                    datos.push(FECHA_LIMITE_ATENCION);
                                    datos.push(FECHA_ALARMA);
                                    datos.push(DOCUMENTO);
                                    datos.push(OBSERVACIONES);
                                    datos.push(MENSAJE_ALERTA);
                                // console.log("entro ");
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
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/DocumentosEntradaController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
                                        
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){
//                   value= $("#id_clausula").val();
//                    //alert("esta es la columna" + column + "este es el" + id);
//                    alert("este es el id de la clausula " + id + " esta es la columna que se va a editar " + column + " el nuevo dato que va a viajar a la BD " + value);
//                   //$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
//                   $.ajax({
//                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Modificar",
//				type: "POST",
//				data:'column='+column+'&editval='+value+'&id='+id,
//				success: function(data){
//                                    
//					//$(editableObj).css("background","#FDFDFD");
//				}   
//		   });
                        id_documento_entrada=id;
                        cualmodificar=column;
               }
              
               
               
              
               
    function consultarInformacion(url){
               $.ajax({  
                     url: ""+url,  
                    success: function(r) {    
//                     $("#procesando").empty();
                     },
                     beforeSend:function(r){
//                          $("#loader").empty();
//                          $("#sidebarObjV").append("<div class='loader'></div>");
//                            $.jGrowl("Cargando  Porfavor Espere......", { header: 'Carga de Informacion' });
//                         alert("e");
//                          $("#sidebarObjV").append("Cargando Informacion ...");
//$.jGrowl("Cargando  Porfavor Espere......", { sticky: true });

//var delay = 1000;
//							setTimeout(function(){
//                                                            $.jGrowl("Informacion Obtenida", { sticky: true });
//                                                        },delay);

                     }
                 
        });  
            }
            
    
    function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
         
                
                function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                        var ID_DOCUMENTO;
                    	$.ajax({
                                url: "../Controller/DocumentosEntradaController.php?Op=Guardar",
				type: "POST",
				data:'ID_CUMPLIMIENTO='+datos[0]+'&FOLIO_REFERENCIA='+datos[1]+'&FOLIO_ENTRADA='+datos[2]+'&FECHA_RECEPCION='+datos[3]
                                    +'&ASUNTO='+datos[4]+'&REMITENTE='+datos[5]+'&ID_ENTIDAD='+datos[6]+'&ID_CLAUSULA='+datos[7]+'&CLASIFICACION='+datos[8]
                                    +'&STATUS_DOC='+datos[9]+'&FECHA_ASIGNACION='+datos[10]+'&FECHA_LIMITE_ATENCION='+datos[11]+'&FECHA_ALARMA='+datos[12]
                                    +'&DOCUMENTO='+datos[13]+'&OBSERVACIONES='+datos[14]+'&MENSAJE_ALERTA='+datos[15],
                            
                            
                                success: function(jsonData)
                                {
                                //     alert(<?php  $Url ?>);
//					$(editableObj).css("background","#FDFDFD");
                                        ID_DOCUMENTO = jsonData.ID_DOCUMENTO;
                                        consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                        // $('#fileupload').fileupload({
                                        //         url: '../../archivos/files/'+jsonData.ID_CUMPLIMIENTO+'/'+jsonData.ID_DOCUMENTO+'/'
                                        // });
                                        // $('#fileupload').fileupload
                                        // ({
                                        //         formData: {newUrl: '/'+jsonData.ID_CUMPLIMIENTO+'/'+jsonData.ID_DOCUMENTO+'/'}
                                        // });
                                        $('.start').click();
                                }
                        })
                        .then(function(data)
                        {
                                // var tempUrls = "<?php Session::getSesion("archivos_urls") ?>";
                                // console.log("valores : "+tempUrls); no funciona
                                $.ajax({
                                        url: "../Controller/ArchivoUploadController.php?Op=Guardar",
                                        type: "POST",
                                        data: 'ID_DOCUMENTO='+ID_DOCUMENTO,
                                        async: false,
                                        success: function(data)
                                        {
                                                // alert("insertado urls");
                                        }
                                });
                        
                        });
//                   window.location.href("EmpleadosView.php");
                }
                function mostrar_urls(id_documento_entrada)
                {
                        var tempDocumentolistadoUrl = " ";
                        $.ajax({
                                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                                type: 'GET',
                                data: 'ID_DOCUMENTO='+id_documento_entrada,
                                success: function(lista)
                                {
                                        $.each(lista, function (index,value)
                                        {
                                                var tempDocumentolistadoUrlSplit = value.DIR.split("/");
                                                var tempDocumentolistadoUrlPos = tempDocumentolistadoUrlSplit.length - 1;
                                                tempDocumentolistadoUrl = tempDocumentolistadoUrl +"<li><a href=\"" +value.DIR+"\">" + tempDocumentolistadoUrlSplit[tempDocumentolistadoUrlPos] + "</a></li>";
                                        });
                                        if(tempDocumentolistadoUrl == " ")
                                        {
                                                tempDocumentolistadoUrl = " No hay archivos agregados "
                                        }
                                        tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id_documento_entrada+"'>";
                                        // alert(tempDocumentolistadoUrl);
                                        $('#DocumentoEntradaAgregarModal').html(" ");
                                        $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                                        $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                                        $('#fileupload').fileupload();
                                        $('#fileupload').fileupload({
                                                url: '../View/',
                                        });
                                }
                        });
                }
                function agregarArchivosUrl()
                {
                        var ID_DOCUMENTO = $('#tempInputIdDocumento').val();
                        // alert(ID_DOCUMENTO);
                        $.ajax({
                                url: "../Controller/DocumentosEntradaController.php?Op=getIdCumplimiento",
                                type: 'POST',
                                data: 'ID_DOCUMENTO='+ID_DOCUMENTO,
                                async:false,
                                success:function(data)
                                {
                                        $('.start').click();
                                }
                        });
                        $.ajax({
                                url: "../Controller/ArchivoUploadController.php?Op=Guardar",
                                type: "POST",
                                data: 'ID_DOCUMENTO='+ID_DOCUMENTO,
                                async: false,
                                success: function(data)
                                {
                                        // alert("insertado urls");
                                }
                        });
                }
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
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
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
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
                                {% if (file.error) { %}
                                        <div><span class="error">Error</span> {%=file.error%}</div>
                                {% } %}
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
                </script>

                <!--Aqui abre para la ventana de guardado ok-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <!--Aqui cierra para la ventana de guardado ok-->

                
                <!--Aqui abre el modal de insertar-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Aqui cierra para abrir el modal de insertar-->

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


