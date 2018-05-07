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

        <body class="no-skin" >
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
		Agregar Tema
        </button>    

	                   
                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				<th class="table-header" >NO.</th>
                                <th class="table-header">TEMA</th>
				<th class="table-header">SUB-TEMA</th>				
				<th class="table-header">DESCRIPCION DEL TEMA</th>				
				<th class="table-header">DESCRIPCION DEL SUB-TEMA</th>				
				<th class="table-header">RESPONSABLE</th>				
				<th class="table-header">TEXTO BREVE</th>				
				<th class="table-header">DESCRIPCION</th>				
                                <th class="table-header">PLAZO</th>					
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarClausulas");
                  $cbxE= Session::getSesion("listarEmpleadosComboBox");
                  
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">
				<td><?php echo $numeracion++;   ?></td>
                                
                                            <?php
//                                            echo "el valor es :   "."{$k}=>{$filas["CLAUSULA"]}";
                                            ?>
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'CLAUSULA','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["CLAUSULA"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'SUB_CLAUSULA','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["SUB_CLAUSULA"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'DESCRIPCION_CLAUSULA','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DESCRIPCION_CLAUSULA"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'DESCRIPCION_SUB_CLAUSULA','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DESCRIPCION_SUB_CLAUSULA"]; ?></td>
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADO','<?php //echo $Lista[$k]["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php //echo $Lista[$k]["NOMBRE_EMPLEADO"]; ?></td>-->
                                <td> 
<!--                                    <select  class="empleado" name="n_empleado" onchange="saveComboToDatabase('ID_EMPLEADO', <?php echo $filas["ID_CLAUSULA"]; ?> )">-->
                                    <select   id="id_empleado" class="select"  onchange="saveComboToDatabase('ID_EMPLEADO', <?php echo $filas["ID_CLAUSULA"]; ?> )">
                                    <!--<select name="name_empleado">-->
                                    <?php
                                    $s="";
                                                foreach ($cbxE as $value) {
                                                    if($value["ID_EMPLEADO"]=="".$filas["ID_EMPLEADO"]){
//                                                        $s="selected";
                                                    ?>
                                    
                                        <option value="<?php echo "".$filas["ID_EMPLEADO"] ?>"  selected ><?php echo "".$filas["NOMBRE_EMPLEADO"]." ".$filas["APELLIDO_PATERNO"]." ".$filas["APELLIDO_MATERNO"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["ID_EMPLEADO"] ?>"  ><?php echo "".$value["NOMBRE_EMPLEADO"]." ".$value["APELLIDO_PATERNO"]." ".$value["APELLIDO_MATERNO"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>
                                        
                                  
                                   <!--<div id="combo_zone" style="width:230px;"></div>-->
                                    
                                </td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'TEXTO_BREVE','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["TEXTO_BREVE"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'DESCRIPCION','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DESCRIPCION"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'PLAZO','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["PLAZO"]; ?></td>
                                
			  </tr>
		<?php
		}
                
		?>
		  </tbody>
		</table>
			

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
             
                
       <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Tema</h4>
		      </div>

		      <div class="modal-body">
		      		<!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                                    <!--<form data-toggle="validator"  >-->
                                    
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        <input type="text"  id="CLAUSULA" class="form-control" data-error="Ingrese el Tema" required />
							<div class="help-block with-errors"></div>
						</div>

                                    
						<div class="form-group">
							<label class="control-label" for="title">Sub-Tema:</label>
                                                        <textarea  id="SUB_CLAUSULA" class="form-control" data-error="Ingrese el Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Descripcion del Tema:</label>
                                                        <textarea  id="DESCRIPCION_CLAUSULA" class="form-control" data-error="Ingrese la Descripcion del Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Descripcion del Sub-Tema:</label>
                                                        <textarea  id="DESCRIPCION_SUB_CLAUSULA" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Texto-Breve:</label>
                                                        <textarea  id="TEXTO_BREVE" class="form-control" data-error="Ingrese el Texto-Breve" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Descripcion:</label>
                                                        <textarea  id="DESCRIPCION" class="form-control" data-error="Ingrese la Descripcion" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Plazo:</label>
                                                        <textarea  id="PLAZO" class="form-control" data-error="Ingrese el Plazo" required></textarea>
							<div class="help-block with-errors"></div>
						</div>

                                                


                                                <div class="form-group">
							<label class="control-label" for="title">Responsable:</label>
                                                        
                                                        <select   id="ID_EMPLEADOMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxE as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["ID_EMPLEADO"] ?>"  ><?php echo "".$value["NOMBRE_EMPLEADO"]." ".$value["APELLIDO_PATERNO"]." ".$value["APELLIDO_MATERNO"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
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
                


		<script src="../../assets/probando/js/jquery-2.1.4.min.js"></script>

		<script src="../../assets/probando/js/bootstrap.min.js"></script>

		<script src="../../assets/probando/js/ace-elements.min.js"></script>
		<script src="../../assets/probando/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript"></script>
                
                
                
                
		<script>
                    
                      var idclausula;
                      $(function(){
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                          //alert("el value que va a viajar es "+val+" i el id de la clausula : "+idclausula);
                          $.ajax({
                                url: "../Controller/ClausulasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+idclausula,
				success: function(data){
                                    
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        window.location.href="ClausulasView.php";    
                                    
					//$(editableObj).css("background","#FDFDFD");
				}   
                           });
                          
                          
                        });
                        
                        
                        $("#btn_guardar").click(function(){
                                  //alert("entro");
       
        
                                    var CLAUSULA=$("#CLAUSULA").val();
                                    var SUB_CLAUSULA=$("#SUB_CLAUSULA").val();
                                    var DESCRIPCION_CLAUSULA=$("#DESCRIPCION_CLAUSULA").val();
                                    var DESCRIPCION_SUB_CLAUSULA=$("#DESCRIPCION_SUB_CLAUSULA").val();
                                    var TEXTO_BREVE=$("#TEXTO_BREVE").val();
                                    var DESCRIPCION=$("#DESCRIPCION").val();
                                    var PLAZO=$("#PLAZO").val();
                                    var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
                                    //alert("ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL);
                                  
//                                  alert("Clausula :"+CLAUSULA+ "Sub-clausula :"+SUB_CLAUSULA+ "Descripcion clausula :" +DESCRIPCION_CLAUSULA+
//                                          "Descripcion sub clausula : " +DESCRIPCION_SUB_CLAUSULA+ " texto breve :" +TEXTO_BREVE "descripcion :" +DESCRIPCION+
//                                         "Plazo :" +PLAZO+ "Requisito :" +REQUISITO+ "id_empleado :" +ID_EMPLEADO);   
                                    

                                    datos=[];
                                    datos.push(CLAUSULA);
                                    datos.push(SUB_CLAUSULA);
                                    datos.push(DESCRIPCION_CLAUSULA);
                                    datos.push(DESCRIPCION_SUB_CLAUSULA);
                                    datos.push(TEXTO_BREVE);
                                    datos.push(DESCRIPCION);
                                    datos.push(PLAZO);
                                    datos.push(ID_EMPLEADOMODAL);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                                  $("#CLAUSULA").val("");
                                  $("#SUB_CLAUSULA").val("");
                                  $("#DESCRIPCION_CLAUSULA").val("");
                                  $("#DESCRIPCION_SUB_CLAUSULA").val("");
                                  $("#TEXTO_BREVE").val("");
                                  $("#DESCRIPCION").val("");
                                  $("#PLAZO").val("");
                                  //$("#ID_EMPLEADOMODAL").val("");
                                                                      
                        });
                        
  
                      }); //Se cierra el function
                      
                      
                      
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
                
                
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/ClausulasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){
                     idclausula=id;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/ClausulasController.php?Op=Guardar",
				type: "POST",
				data:'CLAUSULA='+datos[0]+'&SUB_CLAUSULA='+datos[1]+'&DESCRIPCION_CLAUSULA='+datos[2]
                                                       +'&DESCRIPCION_SUB_CLAUSULA='+datos[3]+'&TEXTO_BREVE='+datos[4]
                                                       +'&DESCRIPCION='+datos[5]+'&PLAZO='+datos[6]+'&ID_EMPLEADO='+datos[7],
				success: function(data){
                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        window.location.href("ClausulasView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
		</script>
                
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                
                
	</body>
        
        
        
</html>
