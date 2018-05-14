<?php
session_start();
require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");

?>




<html ng-app="omgApp">
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
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->

                <script src="../../js/jquery.js" type="text/javascript"></script>

		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                     
                     <!--en esta seccion es para poder abrir el modal--> 
                     <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>             
                     <link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                     <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                     <script src="../../codebase/dhtmlx.js"></script>
                     <!--aqui termina la seccion para poder abrir el modal--> 
                     
                     
                     <script src="../../angular/angular.min.js" type="text/javascript"></script>
                     <script src="../../angular/app.js" type="text/javascript"></script>
                    
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

                
                
                
                
    </head>
    
    
    <body class="no-skin" onload="loadSpinner()">
         <!--<div>Cargando...</div>-->
         <div id="loader"></div>
      
<div>
<?php		
require_once 'EncabezadoUsuarioView.php';
?>       
</div>
         
<div style="height: 50px"></div>         

                                <div style="position: fixed;">    
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Agregar Empleado
				</button>

                                <button type="button" class="btn btn-info " onclick="refresh();" >
                                    <i class="glyphicon glyphicon-repeat"></i> 
				</button>
                                </div>

<div style="height: 55px"></div>


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
                    
                    
                    if($filas["nombre_empleado"]!="SIN RESPONSABLE"){
                                            
                            
                    ?>
                      
                      
			  <tr class="table-row">
                              
                              
				<td><?php echo $numeracion++; ?></td>                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'apellido_paterno','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);"><?php echo $filas["apellido_paterno"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'apellido_materno','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);"><?php echo $filas["apellido_materno"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'categoria','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);"><?php echo $filas["categoria"]; ?></td>
                                 <td contenteditable="true" onBlur="saveToDatabase(this,'correo','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);"><?php echo $filas["correo"]; ?></td>
                                 <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_creacion','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_creacion"]; ?></td>
			  </tr>
                          
		<?php
                    }
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

		      <div id="validacion_empleado" class="modal-body">
		      		<!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                                    <!--<form data-toggle="validator"  >-->
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
//                                    correcto=validarCamposVacios(datos);
                                    alert("e  : "+correcto);
                                    if(correcto!==false){
                                                  //  alert("si paso ");
                                    saveToDatabaseDatosFormulario(datos);
                                }else{
                                    //alert("no paso ");
                                }
                                    
                        });
                        
                        
                         $("#btn_limpiar").click(function(){
                                  $("#NOMBRE_EMPLEADO").val("");
                                  $("#APELLIDO_PATERNO").val("");
                                  $("#APELLIDO_MATERNO").val("");
                                  $("#CATEGORIA").val("");
                                  $("#CORREO").val("");
                        });
                        
//                       $('.modal.draggable>.modal-dialog>.modal-content>.modal-header').css('cursor', 'move'); 


    
    
                    }); //Cierra $fuction
                    
                    
                    
                    
                    
                    function validarCamposVacios(datos){
                         correcto=false;
//                                    datos.push(NOMBRE_EMPLEADO);
//                                    datos.push(APELLIDO_PATERNO);
//                                    datos.push(APELLIDO_MATERNO);
//                                    datos.push(CATEGORIA);
//                                    datos.push(CORREO);
                        var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                        alert("entro "+datos[0]+"   "+datos[1]+"ddf   "+datos[2]+"   "+datos[3]+""+datos[4]+"");
                        
                    if(datos[0] == ""){
                      $("#mensaje1").fadeIn();
                      $("#mensaje1").append("Ingrese El Nombre");
   //                   $("#mensaje1").animate({left: '250px'});
                      $("#mensaje1").css("background-color","red");
                      $("#mensaje1").css("width", "35%");
                      // $("#div2").fadeIn("slow");
                      // $("#div3").fadeIn(3000);
                      correcto=false;
                  
                   
                    } 
                
                        else{
                            $("#mensaje1").fadeOut();
                            correcto=true;
                            if(datos[1] == ""){
                            $("#mensaje2").fadeIn();
                            $("#mensaje2").append("Ingrese El Apellido Paterno");
                            correcto=false;
                          
                   
                            } else {
                                    $("#mensaje2").fadeOut();
                                    correcto=true;
                                    if(datos[2] == ""){
                                    $("#mensaje3").fadeIn();
                                    $("#mensaje3").append("Ingrese El Apeliido Materno");
                                    correcto=false;
                            
                                    } else {
                                            $("#mensaje3").fadeOut();
                                            correcto=true;
                                            if(datos[3] == ""){
                                            $("#mensaje4").fadeIn();
                                            $("#mensaje4").append("Ingrese Categoria");
                                            correcto=false;
                                    
                                            } else {
                                                    $("#mensaje4").fadeOut();
                                                    correcto=true;
                                                    if(datos[4] == "" || !expr.test(datos[4])){
                                                    $("#mensaje5").fadeIn();
                                                    $("#mensaje5").html("Ingrese Correo");
                                                    correcto=false;
                                            
                                                    }else{
                                                          $("#mensaje5").fadeOut();
                                                          correcto=true;
                                               
                                                         }
                                               
                                                    }
                                           
                                            }// tercer else
               
                                    }//segundo else
                   
               
                            } //primer else
                        alert("co  "+correcto);
                    return correcto;    
                    }
                    
                    
                    
                    
                    
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
                                        window.location.href="EmpleadosView.php";
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
//                    alert("aqui se debe actualizar checarlo ");
                 window.location.href="EmpleadosView.php";   
                }
                
                
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
		</script>


     
       
         <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
         <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
         
         
         
    </body>
</html>
