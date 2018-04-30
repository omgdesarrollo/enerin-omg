
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
                                    <select id="id_cumplimiento"class="select" onchange="saveComboToDatabase('ID_CUMPLIMIENTO', <?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxCump as $value) {
                                                    if($value["ID_CUMPLIMIENTO"]=="".$filas["ID_CUMPLIMIENTO"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["ID_CUMPLIMIENTO"] ?>"  selected ><?php echo "".$value["CLAVE_CUMPLIMIENTO"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["ID_CUMPLIMIENTO"] ?>"  ><?php echo "".$value["CLAVE_CUMPLIMIENTO"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>
                                
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'FOLIO_REFERENCIA','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FOLIO_REFERENCIA"]; ?></td>                                                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'FOLIO_ENTRADA','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FOLIO_ENTRADA"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_RECEPCION','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FECHA_RECEPCION"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'ASUNTO','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["ASUNTO"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'REMITENTE','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["REMITENTE"]; ?></td>
                                
                                
                                <td> 
                                    <select id="id_entidad" class="select" onchange="saveComboToDatabase('ID_ENTIDAD', <?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxEnt as $value) {
                                                    if($value["ID_ENTIDAD"]=="".$filas["ID_ENTIDAD"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["ID_ENTIDAD"] ?>"  selected ><?php echo "".$value["CLAVE_ENTIDAD"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["ID_ENTIDAD"] ?>"  ><?php echo "".$value["CLAVE_ENTIDAD"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>

                                
                                <td> 
                                    <select id="id_clausula" class="select" onchange="saveComboToDatabase('ID_CLAUSULA', <?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxClau as $value) {
                                                    if($value["ID_CLAUSULA"]=="".$filas["ID_CLAUSULA"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["ID_CLAUSULA"] ?>"  selected ><?php echo "".$value["CLAUSULA"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["ID_CLAUSULA"] ?>"  ><?php echo "".$value["CLAUSULA"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>
                                
                                    
                                <td contenteditable="false" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADO','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["NOMBRE_EMPLEADO"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'CLASIFICACION','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["CLASIFICACION"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'STATUS_DOC','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["STATUS_DOC"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_ASIGNACION','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FECHA_ASIGNACION"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_LIMITE_ATENCION','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FECHA_LIMITE_ATENCION"]; ?></td>
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'FECHA_ALARMA','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FECHA_ALARMA"]; ?></td>-->
                                <td contenteditable="true" onBlur="saveToDatabase(this,'DOCUMENTO','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DOCUMENTO"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'OBSERVACIONES','<?php echo $filas["ID_DOCUMENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["OBSERVACIONES"]; ?></td>
                                
                                
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

                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Contrato:</label>
                                                        
                                                        <select   id="ID_CUMPLIMIENTOMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxCump as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["ID_CUMPLIMIENTO"] ?>"  ><?php echo "".$value["CLAVE_CUMPLIMIENTO"]; ?></option>
                                                                
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
                                                                
                                                                <option value="<?php echo "".$value["ID_ENTIDAD"] ?>"  ><?php echo "".$value["CLAVE_ENTIDAD"]; ?></option>
                                                                
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
                                                                
                                                                <option value="<?php echo "".$value["ID_CLAUSULA"] ?>"  ><?php echo "".$value["CLAUSULA"]; ?></option>
                                                                
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

                          
<!--                                                <div class="form-group">
							<label class="control-label" for="title">Documento:</label>
                                                        <textarea  id="DOCUMENTO" class="form-control" data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>-->
                                                <div class="form-group">
							<label class="control-label" for="title">Documento:</label>
                                                        <input id="DOCUMENTO" name="uploadfile" type="file" />
                                                        <input type="submit" value="Subir Archivo"/>
							<!--<div class="help-block with-errors"></div>-->
						</div>
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Observaciones:</label>
                                                        <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese las observaciones" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                                        
                                    
						<div class="form-group">
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>

		      		<!--</form>-->

		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal--> 
             
                


		
                
                
		<script>
                    
                var id_documento_entrada;
                var cualmodificar;
                
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
                                  //alert("entro");
       
        
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
                                    var DOCUMENTO=$("#DOCUMENTO").val();
                                    var OBSERVACIONES=$("#OBSERVACIONES").val();
                                                                      
                                  
                                  alert("ID_CUMPLIMIENTOMODAL :"+ID_CUMPLIMIENTOMODAL+"FOLIO_REFERENCIA :"+FOLIO_REFERENCIA
                                       +"FOLIO_ENTRADA :"+FOLIO_ENTRADA+"FECHA_RECEPCION :"+FECHA_RECEPCION+"ASUNTO :"+ASUNTO
                                       +"REMITENTE :"+REMITENTE+"ID_ENTIDADMODAL :"+ID_ENTIDADMODAL+"ID_CLAUSULAMODAL :"+ID_CLAUSULAMODAL
                                       +"CLASIFICACION :"+CLASIFICACION+"STATUS_DOC :"+STATUS_DOC+"STATUS_DOC :"+STATUS_DOC
                                       +"FECHA_ASIGNACION :"+FECHA_ASIGNACION+"FECHA_LIMITE_ATENCION :"+FECHA_LIMITE_ATENCION
                                       +"FECHA_ALARMA :"+FECHA_ALARMA+"DOCUMENTO :"+DOCUMENTO+"OBSERVACIONES :"+OBSERVACIONES);
                                    

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
                                    saveToDatabaseDatosFormulario(datos);
                                    
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
                                    +'&DOCUMENTO='+datos[13]+'&OBSERVACIONES='+datos[14],
                            
                            
				success: function(data){
                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
//                                        window.location.href("EmpleadosView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
                
                
		</script>
                
                <!--Aqui abre para la ventana de guardado ok-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <!--Aqui cierra para la ventana de guardado ok-->

                
                <!--Aqui abre el modal de insertar-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Aqui cierra para abrir el modal de insertar-->

                
	</body>
        
        
        
</html>


