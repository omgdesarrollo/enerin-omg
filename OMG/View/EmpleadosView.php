<?php
session_start();
require_once '../util/Session.php';
?>



<?php $Usuario=  Session::getSesion("user"); ?>



<html>
    <head>
      <title></title>
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
                     
                     <!--en esta seccion es para poder abrir el modal--> 
                     <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
                     
                      <link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                     <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                     <script src="../../codebase/dhtmlx.js"></script>
                     <!--aqui termina la seccion para poder abrir el modal--> 
                     
                     <!--<script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
                
<!--		<style>
			body{width:100%}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}borde de toda la 
                        .tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;background-color: #33ccff;}
                        .tbl-qa .table-row td {padding:10px;background-color:#ffffff}
		</style>-->
                
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

                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
		<script>
                    
                    $(function(){
                          $("#create-item").draggable({
                             handle: ".modal-header"
                         });
                        $("#btn_guardar").click(function(){
                                  var NOMBRE_EMPLEADO=$("#NOMBRE_EMPLEADO").val();
                                  var APELLIDO_PATERNO=$("#APELLIDO_PATERNO").val();
                                  var APELLIDO_MATERNO=$("#APELLIDO_MATERNO").val();
                                  var CATEGORIA=$("#CATEGORIA").val();
                                  var CORREO=$("#CORREO").val();
//                                  alert("nombre :"+NOMBRE_EMPLEADO+" APELLIDO PATERNO :   "+APELLIDO_PATERNO
//                                    +" APELLIDO MATERNO : "+APELLIDO_MATERNO+" CATEGORIA : "+CATEGORIA+" CORREO :"      
//                                    +CORREO);
                                    datos=[];
                                    datos.push(NOMBRE_EMPLEADO);
                                    datos.push(APELLIDO_PATERNO);
                                    datos.push(APELLIDO_MATERNO);
                                    datos.push(CATEGORIA);
                                    datos.push(CORREO);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
                         $("#btn_limpiar").click(function(){
                                  $("#NOMBRE_EMPLEADO").val("");
                                  $("#APELLIDO_PATERNO").val("");
                                  $("#APELLIDO_MATERNO").val("");
                                  $("#CATEGORIA").val("");
                                  $("#CORREO").val("");
                        });
                        
//                       $('.modal.draggable>.modal-dialog>.modal-content>.modal-header').css('cursor', 'move'); 




 $("#btn_guardar").validate({
        rules: {
            NOMBRE_EMPLEADO: { required: true, minlength: 2},
            APELLIDO_PATERNO: { required: true, minlength: 2},
            APELLIDO_MATERNO: { required:true},
            CATEGORIA: { minlength: 2, maxlength: 15},
            CORREO: { required: true,email: true}
        },
        messages: {
            NOMBRE_EMPLEADO: "Debe introducir su nombre.",
            APELLIDO_PATERNO: "Debe introducir su apellido paterno",
            APELLIDO_MATERNO : "Debe introducir su apellido materno",
            CATEGORIA :"Debe introducir su categoria",
            CORREO : "Debe introducir su correo ",
        },
        submitHandler: function(form){
            var dataString = 'name='+$('#name').val()+'&lastname='+$('#lastname').val()+'...';
            $.ajax({
                type: "POST",
                url:"send.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#formid").hide();
                }
            });
        }
    });
    
    
    
                    });
                    
                function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/EmpleadosController.php?Op=Guardar",
				type: "POST",
				data:'NOMBRE_EMPLEADO='+datos[0]+'&APELLIDO_PATERNO='+datos[1]+'&APELLIDO_MATERNO='+datos[2]+'&CATEGORIA='+datos[3]+'&CORREO='+datos[4]+'',
				success: function(data){
//                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");
//                                        window.location.href("EmpleadosView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }    
                
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
//                    alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/EmpleadosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
             
                      function consultarInformacion(url){
               $.ajax({  
                     url: ""+url,  
                    success: function(r) {    
//                     $("#procesando").empty();
                        
                     },
                     beforeSend:function(r){
//                            $.jGrowl("Guardando  Porfavor Espere......", { header: 'Guardado de Informacion' });


                     }
                 
        });  
            }
               function filterTable() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[1];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                 function filterTableapellidoPaterno() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputapellidopaterno");
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
                 function filterTableapellidoMaterno() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputapellidomaterno");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[3];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                function filterTableCategoria(){
                        // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputCategoria");
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
                    function filterTableCorreo(){
                        // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputCorreo");
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
                
                function refresh(){
                    alert("aqui se debe actualizar checarlo ");
                    
                }
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
		</script>
    </head>
    <body class="no-skin" onload="loadSpinner()">
         <!--<div>Cargando...</div>-->
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
<!--          <div class="pull-right">-->

				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Agregar Empleado
				</button>
                                <button type="button" class="btn btn-info " onclick="refresh();" >
                                    <i class="glyphicon glyphicon-repeat"></i> 
				</button>
  <div class="contenedortable">   
<input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Nombre">
<input type="text" id="idInputapellidopaterno" onkeyup="filterTableapellidoPaterno()" placeholder="Buscar Por Apellido Paterno">
<input type="text" id="idInputapellidomaterno" onkeyup="filterTableapellidoMaterno()" placeholder="Buscar Por Apellido Materno">
<input type="text" id="idInputCategoria" onkeyup="filterTableCategoria()" placeholder="Buscar Por Categoria">
<input type="text" id="idInputCorreo" onkeyup="filterTableCorreo()" placeholder="Buscar Por Correo">
  </div >   


<!--                                 <div class="side-menu" id="sideMenu">
                                    <menu>
                                        <ul class="nav nav-tabs nav-stacked">
                                            <li><a href="#myModal" data-backdrop="false" data-toggle="modal">Agregar Empleado</a>
                                            </li>
                                        </ul>
                                    </menu>
                                </div>   -->
		        <!--</div>-->
       
        <div style="display:none;" id="myDiv" class="animate-bottom"> <!--inicio animacion tabla toda la interfaz seleccionada-->
        
        
           <div class="contenedortable">   
               <table class="tbl-qa" id="idTable">
		  <thead>
			  <tr>
				<th class="table-header" width="10%">NO.</th>
				<th class="table-header">NOMBRE</th>
				<th class="table-header">APELLIDO PATERNO</th>
                                <th class="table-header">APELLIDO MATERNO</th>
                                <th class="table-header">CATEGORIA</th>
                                <th class="table-header">EMAIL</th>
                                <th class="table-header">FECHA CREACION</th>
			  </tr>
		  </thead>
		  <tbody>
                      
		  <?php
                  
                  
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarEmpleados");

                 $numeracion=1;
//		foreach ($Lista as $k=>$filas) { 
                foreach ($Lista as $filas) { 
                
                            
                    ?>
			  <tr class="table-row">
				<td><?php echo $numeracion++; ?></td>
<!--				<td contenteditable="true" onBlur="saveToDatabase(this,'question','<?php// echo $faq[$k]["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php //echo $faq[$k]["NOMBRE_EMPLEADO"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'answer','<?php //echo $faq[$k]["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php //echo $faq[$k]["NOMBRE_EMPLEADO"]; ?></td>-->
                                <td contenteditable="true" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADO','<?php echo $filas["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php echo $filas["NOMBRE_EMPLEADO"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'APELLIDO_PATERNO','<?php echo $filas["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php echo $filas["APELLIDO_PATERNO"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'APELLIDO_MATERNO','<?php echo $filas["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php echo $filas["APELLIDO_MATERNO"]; ?></td>
                                 <td contenteditable="true" onBlur="saveToDatabase(this,'CATEGORIA','<?php echo $filas["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php echo $filas["CATEGORIA"]; ?></td>
                                 <td contenteditable="true" onBlur="saveToDatabase(this,'CORREO','<?php echo $filas["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php echo $filas["CORREO"]; ?></td>
                                 <td contenteditable="false" onBlur="saveToDatabase(this,'FECHA_CREACION','<?php echo $filas["ID_EMPLEADO"]; ?>')" onClick="showEdit(this);"><?php echo $filas["FECHA_CREACION"]; ?></td>
                                 
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>
               
<!--                <table class="table">			
			<thead>
				<tr>
					<th>ID</th>
					<th>NOMBRE EMPLEADO</th>
					<th>CATEGORIA</th>
				</tr>
			</thead>
			<tbody>
-->			<?php //foreach (PaginacionController::show_rows("ID_EMPLEADO") as $row): ?>
		    	<!--<tr>-->
			        <!--<td><?php //echo $row["ID_EMPLEADO"]; ?></td>-->
			        <!--<td><?php //echo $row["NOMBRE_EMPLEADO"]; ?></td>-->
				<!--<td><?php //echo $row["CATEGORIA"]; ?></td>-->
		    	<!--</tr>-->
		    	<?php// endforeach; ?>					<!--
			</tbody>				
		</table>-->
               
             

               
           </div>
       </div>    <!--cierre animacion table y toda la interfaz seleccionada--> 
   
<?php 


?>

        <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Empleado</h4>
		      </div>

		      <div class="modal-body">
		      		<!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                                    <!--<form data-toggle="validator"  >-->
                                    <div id="ok"></div>
		      			<div class="form-group">
							<label class="control-label" for="title">Nombre:</label>
                                                        <input type="text"  id="NOMBRE_EMPLEADO" class="form-control" data-error="Ingrese Nombre" required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="title">Apellido Paterno:</label>
                                                        <textarea  id="APELLIDO_PATERNO" class="form-control" data-error="Ingrese Apellido Paterno." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                <div class="form-group">
							<label class="control-label" for="title">Apellido Materno:</label>
                                                        <textarea  id="APELLIDO_MATERNO" class="form-control" data-error="Ingrese Apellido Materno." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                <div class="form-group">
							<label class="control-label" for="title">Categoria:</label>
                                                        <textarea  id="CATEGORIA" class="form-control" data-error="Ingrese Categoria." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                <div class="form-group">
							<label class="control-label" for="title">Email:</label>
                                                        <textarea  id="CORREO" class="form-control" data-error="Ingrese Email" required></textarea>
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
  
       
       
         <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
         <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    </body>
</html>