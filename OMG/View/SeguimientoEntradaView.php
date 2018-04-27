<?php
session_start();
require_once '../util/Session.php';
?>

<?php $Usuario=  Session::getSesion("user"); ?>
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


             
             <div style="display:none;" id="myDiv" class="animate-bottom"> 
                     <div class="contenedortable">
                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">FOLIO E</th>
                                <th class="table-header">ENT REGU</th>
                                <th class="table-header">ASUNTO</th>
                                <th class="table-header">RESP TEMA</th>
                                <th class="table-header">FECHA LIMITE</th>
                                <th class="table-header">STATUS</th>
                                <th class="table-header">RESP PLAN</th>
                                <th class="table-header">DOC.</th>
                                <th class="table-header">CARGA DE PROGRAMA</th>
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                      $Lista = Session::getSesion("listarSeguimientoEntradas");
//                    $Lista = PaginacionController::show_rows("ID_ASIGNACION_TEMA_REQUISITO");
//                    $cbxCump= Session::getSesion("listarCumplimientosComboBox");
//                    $cbxEnt= Session::getSesion("listarEntidadesReguladorasComboBox");
//                    $cbxClau= Session::getSesion("listarClausulasComboBox");
                      $cbxEmp= Session::getSesion("listarEmpleadosComboBox");
                      $cbxEmpleadoPlan= Session::getSesion("listarEmpleadosComboBox");
                      $cbxEmpleadoPlan1= Session::getSesion("listarEmpleadosComboBox");
                  

                      $numeracion = 1;
                  

                      foreach ($Lista as $filas) { 
                        ?>
			 
                        <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                                
                                
                                
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'FOLIO_ENTRADA','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FOLIO_ENTRADA"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'CLAVE_ENTIDAD','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["CLAVE_ENTIDAD"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'ASUNTO','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["ASUNTO"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADOTEMA','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["NOMBRE_EMPLEADOTEMA"]." ".$filas["APELLIDO_PATERNOTEMA"]." ".$filas["APELLIDO_PATERNOTEMA"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'FECHA_LIMITE_ATENCION','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FECHA_LIMITE_ATENCION"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'STATUS_DOC','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["STATUS_DOC"]; ?></td>
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADOPLAN','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["NOMBRE_EMPLEADOPLAN"]; ?></td>-->
                                                                                                                             
                                <td> 
                                    <select   id="id_empleado" class="select"  onchange="saveComboToDatabase('ID_EMPLEADO', <?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?> )">
                                    
                                    <?php
                                    $s="";
                                                foreach ($cbxEmpleadoPlan as $value) {
                                                    
                                                    if($value["ID_EMPLEADOPLAN"]=="".$filas["ID_EMPLEADO"]){
//                                                        $s="selected";
                                                    ?>
                                    
                                        <option value="<?php echo "".$filas["ID_EMPLEADOPLAN"] ?>"  selected ><?php echo "".$filas["NOMBRE_EMPLEADOPLAN"]." ".$filas["APELLIDO_PATERNOPLAN"]." ".$filas["APELLIDO_MATERNOPLAN"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            
                                                            
                                                            
                                                        ?>
                                                        
                                                             <?php
                                                        }
                                                        
                                                        
                                                        foreach($cbxEmpleadoPlan1 as $value1){
                                                               if($value1["ID_EMPLEADO"]!=$filas["ID_EMPLEADOPLAN"]){
                                                         ?>
                                                            <option value="<?php echo "".$value1["ID_EMPLEADO"] ?>"  ><?php echo "".$value1["NOMBRE_EMPLEADO"]." ".$value1["APELLIDO_PATERNO"]." ".$value1["APELLIDO_MATERNO"]; ?></option>

                                                         <?php
                                                               }
                                                        
                                        
                                                            }
                                                             break;
                                                }
                                    
                                    ?>
                                    </select>                                                                    
                                </td>
                                
                                                                    
                                <td contenteditable="true" onBlur="saveToDatabase(this,'DOCUMENTO','<?php echo $filas["ID_SEGUIMIENTO_ENTRADA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DOCUMENTO"]; ?></td>
                                <td ><button class="btn btn-info">Cargar Programa</button></td>
                                
			  </tr>
                          
		<?php
		}
                
		?>
		  </tbody>
		</table>
<!--                         
                          <nav>
		  	<ul class="pagination">
		  		<?php //if ($data["actual-section"] != 1): ?> 		  			
		    		<li><a href="AsignacionTemasRequisitosView.php?page=1">Inicio</a></li>
		    		<li><a href="AsignacionTemasRequisitosView.php?page=////<?php echo $data['previous']; ?>">&laquo;</a></li>
				<?php //endif; ?>

				<?php //for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
				<?php //if ($i > $data["total-pages"]): break; endif; ?>
				<?php //$active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
			    	<li class="////<?php // echo $active; ?>">
					<a href="AsignacionTemasRequisitosView.php?page=////<?php //echo $i; ?>">
						<?php //echo $i; ?>			    		
					</a>
			    	</li>
			    	<?php //endfor; ?>
				
				<?php //if ($data["actual-section"] != $data["total-sections"]): ?>
                                <li><a href="AsignacionTemasRequisitosView.php?page=////<?php //echo $data['next']; ?>">&raquo;</a></li>
			    	<li><a href="AsignacionTemasRequisitosView.php?page=////<?php //echo $data['total-pages']; ?>">Final</a></li>
		    		<?php //endif; ?>
		  	</ul>
		</nav>-->
                     </div>

<!--			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>-->
	
</div>

	
                
                
                
                
		<script>
                    
                var id_seguimiento_entrada;
                
                                            
                      $(function(){
                          
                        $('.select').on('change', function() {
                          console.log( $(this).prop('value') );
                          
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                          alert("el value que va a viajar es "+val+" y el id del seguimiento : "+id_seguimiento_entrada);
                          
                          $.ajax({
                                url: "../Controller/SeguimientoEntradasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_seguimiento_entrada,
				
				success: function(data){
                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
					//$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
                                        window.location.href="SeguimientoEntradaView.php";
				}   
                           });
                          
                          
                        });
  
  
                      });
                      
                      
                                                  
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
                
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/SeguimientoEntradasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
                                        
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){


                        id_seguimiento_entrada=id;
                        
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
                
		</script>
                
                
                
                
	</body>
        
        
        
</html>


