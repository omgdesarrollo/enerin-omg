
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
                
                
                <script src="../../js/jquery.js" type="text/javascript"></script>

		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                
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
       
	   <div id="navbar" class="navbar navbar-default          ace-save-state">
            
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							OMG APPS
						</small>
					</a>
		</div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav" style="height: 10%">
                    <!--seccion de inicio de sesion de alarmas--> 
                        <li class="purple dropdown-modal">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
					<span class="badge badge-important">0</span>
				</a>

				<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
					<li class="dropdown-header">
					     <i class="ace-icon fa fa-exclamation-triangle"></i>
						1 NOTIFICACIONES
					</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar navbar-pink">
								<li>
									<a href="#">
									     <div class="clearfix">
										<span class="pull-left">
										    <i class="btn btn-xs no-hover btn-pink fa fa-user"></i>
											Urgentes
										</span>
										<span class="pull-right badge badge-info">+1</span>
									      </div>
									</a>
								</li>

							</ul>
						</li>

						<li class="dropdown-footer">
									<a href="#">
										<!--VER MAS NOTIFICACIONES-->
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
						</li>
				</ul>
			</li>
                        <!--seccion de cierre  alarmas-->
                        
                        <!--inicio de seccion de mensajes-->
                        
                        <li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">0</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									Cantidad de Mensajes
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
									


										<li>
											<a href="#" class="clearfix">
												<img src="../../assets/probando/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">aqui va el usuario remitente:</span>
														aqui va el mensaje
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>aqui va la fecha en que lo envio </span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										<!--ver todos los mensajes-->
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
                        
                        <!--cierre de seccion de mensajes-->
                        
                        
                        
                        <!--seccion de info usuario-->
                            <li class="light-blue dropdown-modal">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="../../assets/probando/images/avatars/avatar.png" alt="<?php echo $Usuario["NOMBRE_USUARIO"]; ?>" />
					<span class="user-info">
						<small>Bienvenido,</small>
						<?php echo $Usuario["NOMBRE_USUARIO"]; ?>
					</span>

<!--								<i class="ace-icon fa fa-caret-down"></i>-->
				</a>

					
			    </li>
                        <!--fin de seccion de info usuario-->
                        
                        
                        
                        
                        
                    </ul>
                    
                    
                </div>
                
            </div>
        </div>
             
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
		Agregar Documento de Entrada
</button>             
             
             
 <div style="display:none;" id="myDiv" class="animate-bottom"> 
		
                     <div class="contenedortable">
                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">CONTRATO</th>
                                <th class="table-header">FOLIO REFERENCIA</th>
                                <th class="table-header">FOLIO DE ENTRADA</th>
                                <th class="table-header">FECHA RECEPCION</th>
                                <th class="table-header">ASUNTO</th>
                                <th class="table-header">REMITENTE</th>
                                <th class="table-header">ENTIDAD REGULADORA</th>
                                <th class="table-header">TEMA</th>
                                <th class="table-header"> RESPONSABLE DEL TEMA</th>              
                                <th class="table-header">CLASIFICACION</th>
                                <th class="table-header">STATUS</th>
                                <th class="table-header">FECHA ASIGNACION</th>
                                <th class="table-header">FECHA LIMITE</th>
                                <!--<th class="table-header">FECHA ALARMA</th>-->
                                <th class="table-header">DOCUMENTO</th>
                                <th class="table-header">OBSERVACIONES</th>
                                
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
                                
                                    
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'clasificacion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clasificacion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'status_doc','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["status_doc"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'fecha_asignacion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_asignacion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'fecha_linmite_atencion','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_limite_atencion"]; ?></td>
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_ALARMA','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_alarma"]; ?></td>-->
                                <td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
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
                                                        <textarea  id="STATUS_DOC" class="form-control" data-error="Ingrese el Status" required></textarea>
							<div class="help-block with-errors"></div>
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
                                                <div class="form-group">
                                                        <form id="fileupload" method="POST" enctype="multipart/form-data">
                                                                <div class="fileupload-buttonbar">
                                                                        <div class="fileupload-buttons">
                                                                                <span class="fileinput-button">
                                                                                        <span><a >Agregar documentos(Click o Arrastrar)...</a></span>
                                                                                        <input type="file" name="files[]" multiple>
                                                                                </span>
                                                                                <!-- <button type="submit" class="start">Start upload</button>
                                                                                <button type="reset" class="cancel">Cancel upload</button>
                                                                                <button type="button" class="delete">Delete</button> -->
                                                                                <!-- <input type="checkbox" class="toggle"> -->
                                                                                <span class="fileupload-process"></span>
                                                                        </div>
                                                                        <div class="fileupload-progress" >
                                                                                <!-- The global progress bar -->
                                                                                <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                <!-- The extended global progress state -->
                                                                                <div class="progress-extended">&nbsp;</div>
                                                                        </div>
                                                                </div>
                                                                <table role="presentation"><tbody class="files"></tbody></table>
                                                                                <!-- <label class="control-label" for="title">Documento:</label> -->
                                                                                <!-- <input id="DOCUMENTO" name="uploadfile" type="file" /> -->
                                                                                <!-- <input type="submit" class="btn" value="Cargar"/> -->
                                                                                <!-- <input type="button" id="cancelar" value="Cancelar"/> -->
                                                                                <!-- <div class="help-block with-errors"></div> -->
                                                        </form>
						</div>
                                                
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
                // alert("aaaa");
                // document.addEventListener("DOMContentLoaded;",()=>
                // {
                //         alert("aquiiii");
                //         let form = document.getElementById('form_subir');
                //         form.addEventListener("submit",function(event)
                //         {
                //                 event.preventDefault();
                //                 // console.log("aqui");
                //                 alert(aqui);
                //                 // subir_archivos(this);
                //         });
                // });
                // function subir_archivos(form){
                //         alert("wtf");
                //         let barra_estado = form.children[14].children[0];
                //         span = barra_estado.children[0];
                //         boton_cancelar = form.children[13].children[2];

                //         barra_estadp.classList.remove('barra_verde','barra_roja');
                //         let peticion = new XMLHttpRequest();
                //         //progreso
                //         peticion.upload.addEventListener("Progress",(event)=>
                //         {
                //                 let porcentaje = Math.round((event.loaded/event.total) * 100);
                //                 console.log(porcentaje);
                //                 barra_estado.style.width = porcentaje+'%';
                //                 span.innerHTML = porcentaje+'%';
                //         });
                //         //finalizar
                //         peticion.addEventListener("load",()=>
                //         {
                //                 barra_estado.classList.add('barra_verde');
                //                 console.log("Proceso completado");
                //         });
                //         peticion.open('post','../../../subir.php');
                //         peticion.send(new FormData());
                //         //cancelar
                //         botton_cancelar.addEventListener("click",()=>
                //         {
                //                 peticion.abort();
                //                 barra_estado.classList.remove('barra_verde');
                //                 barra_estado.classList.add('barra_roja');
                //                 span.innerHTML = "proceso Cancelado";
                //         });
                //                 // saveToDatabaseDatosFormulario(datos);
                // }
                        
                      $(function(){
                          
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          
                        if (cualmodificar == "ID_CUMPLIMIENTO") {
    
                         column="ID_CUMPLIMIENTO";
    
                        } else if (cualmodificar == "ID_ENTIDAD"){
                          
                          column="ID_ENTIDAD";                          
                          
                        } else {
                            
                          column="ID_CLAUSULA";  
                            
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
  
                        $("#btn_guardar").click(function(){
                                  alert("entro");
       
        
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
                        });
//                   window.location.href("EmpleadosView.php");
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


