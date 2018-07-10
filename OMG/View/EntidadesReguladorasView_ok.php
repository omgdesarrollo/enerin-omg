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

                <!--Para abrir alertas de aviso, success,warning, error-->       
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>


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
                <!--Termina para el spiner cargando-->
                                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                
                <!--en esta seccion es para poder abrir el modal--> 
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                <!--aqui termina la seccion para poder abrir el modal-->
                
	
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
                    
                    
/*                    .main-encabezado {
                        background: #333;
                        color: white;
                        height: 80px;

                        width: 100%;  hacemos que la cabecera ocupe el ancho completo de la página 
                        left: 0;  Posicionamos la cabecera al lado izquierdo 
                        top: 0;  Posicionamos la cabecera pegada arriba 
                        position: fixed;  Hacemos que la cabecera tenga una posición fija 
                    }*/
                    
                    
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
            <!--<div>Cargando...</div>-->
         <div id="loader"></div>
            
            
<?php

require_once 'EncabezadoUsuarioView.php';

?>        

<div style="height: 5px"></div>     


<div style="position: fixed;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
    Agregar Autoridad Remitente
</button>
    
<button type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i>
</button>
    
    <input type="text" id="idInputClaveAutoridad" onkeyup="filterTableClaveAutoridad()" placeholder="Clave Autoridad Remitente" style="width: 210px;">
    <input type="text" id="idInputDescripcion" onkeyup="filterTableDescripcion()" placeholder="Descripcion">
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>    


<div style="height: 47px"></div>


<!--<div class="contenedortable" style="position: fixed;">   
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Descripcion">
</div >


<div style="height: 55px"></div>-->


<div class="table-fixed-header">
    <div class="table-container">    

        <table id="idTable" class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				<!--<th class="table-header" >NO.</th>-->
                                <th class="table-header">Clave Autoridad Remitente</th>
				<th class="table-header">Descripcion</th>				
				<th class="table-header">Direccion</th>				
				<th class="table-header">Telefono</th>				
				<th class="table-header">Extension</th>				
                                <th class="table-header">Email</th>				
                                <th class="table-header">Direccion Web</th>				
									                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarEntidadesReguladoras");
                  //$cbxE= Session::getSesion("listarEmpleadosComboBox");
                  
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">
				<!--<td><?php // echo $numeracion++;   ?></td>-->                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'clave_entidad','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_entidad"]; ?></td>
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'descripcion','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'direccion','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["direccion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'telefono','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["telefono"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'extension','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["extension"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'email','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["email"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'direccion_web','<?php echo $filas["id_entidad"]; ?>')" onClick="showEdit(this);"><?php echo $filas["direccion_web"]; ?></td>
                                
			  </tr>
		<?php
		}
                
		?>
		  </tbody>
		</table>
			   
         
            
            

<!--			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>-->
		
    </div>
</div>           
            
            
            
            <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nueva Autoridad Remitente</h4>
		      </div>

		      <div class="modal-body">
                                    
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Clave Autoridad Remitente:</label>
                                                        <input type="text"  id="CLAVE_ENTIDAD" class="form-control" data-error="Ingrese la clave de la Autoridad" required />
							<div class="help-block with-errors"></div>
						</div>

                                    
						<div class="form-group">
							<label class="control-label" for="title">Descripcion:</label>
                                                        <textarea  id="DESCRIPCION" class="form-control" data-error="Ingrese la Descripcion" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Direccion:</label>
                                                        <textarea  id="DIRECCION" class="form-control" data-error="Ingrese la Direccion" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Telefono:</label>
                                                        <textarea  id="TELEFONO" class="form-control" data-error="Ingrese el Telefono" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Extension:</label>
                                                        <textarea  id="EXTENSION" class="form-control" data-error="Ingrese la Extension" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Email:</label>
                                                        <textarea  id="EMAIL" class="form-control" data-error="Ingrese el Email" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Direccion Web:</label>
                                                        <textarea  id="DIRECCION_WEB" class="form-control" data-error="Ingrese la Direccion Web" required></textarea>
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
                    
                
                $(function(){

                                                                                            
                        $("#btn_guardar").click(function(){
                                  //alert("entro aqui");
                                  
        
                                    var CLAVE_ENTIDAD=$("#CLAVE_ENTIDAD").val();
                                    var DESCRIPCION=$("#DESCRIPCION").val();
                                    var DIRECCION=$("#DIRECCION").val();
                                    var TELEFONO=$("#TELEFONO").val();
                                    var EXTENSION=$("#EXTENSION").val();
                                    var EMAIL=$("#EMAIL").val();
                                    var DIRECCION_WEB=$("#DIRECCION_WEB").val();

//                                    alert("CLAVE_ENTIDAD :"+CLAVE_ENTIDAD+ "DESCRIPCION :"+DESCRIPCION+ "DIRECCION :"+DIRECCION
//                                           + "TELEFONO :"+TELEFONO+ "EXTENSION :"+EXTENSION+ "EMAIL :"+EMAIL+ "DIRECCION_WEB :"+DIRECCION_WEB);
                                  
                                    

                                    datos=[];
                                    datos.push(CLAVE_ENTIDAD);
                                    datos.push(DESCRIPCION);
                                    datos.push(DIRECCION);
                                    datos.push(TELEFONO);
                                    datos.push(EXTENSION);
                                    datos.push(EMAIL);
                                    datos.push(DIRECCION_WEB);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
                        
                        
                        $("#btn_limpiar").click(function(){
                            
//                           alert("entro aqui");
                            
                                  $("#CLAVE_ENTIDAD").val("");
                                  $("#DESCRIPCION").val("");
                                  $("#DIRECCION").val("");
                                  $("#TELEFONO").val("");
                                  $("#EXTENSION").val("");
                                  $("#EMAIL").val("");
                                  $("#DIRECCION_WEB").val("");
                                                                      
                        });
          
                        
  
  
  
                      });   //CIERRE FUNCTION
                    
                    
                    
                    
                    
                                 
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/EntidadesReguladorasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
                
		
                
                function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/EntidadesReguladorasController.php?Op=Guardar",
				type: "POST",
				data:'CLAVE_ENTIDAD='+datos[0]+'&DESCRIPCION='+datos[1]+'&DIRECCION='+datos[2]+'&TELEFONO='+datos[3]
                                      +'&EXTENSION='+datos[4]+'&EMAIL='+datos[5]+'&DIRECCION_WEB='+datos[6],
                                
				success: function(data){
//                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/EntidadesReguladorasController.php?Op=Listar");
                                         consultarInformacion("../Controller/EntidadesReguladorasController.php?Op=Listar");
                                        window.location.href("EntidadesReguladorasView.php");
				}   
        		});
//                                         window.location.href("EmpleadosView.php");
                        }
                
                
                function refresh(){
                  consultarInformacion("../Controller/EntidadesReguladorasController.php?Op=Listar");  
//                  window.location.href="EntidadesReguladorasView.php";  
                }
                
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
                function consultarInformacion(url){
                    $("#loader").show();
                    $.ajax({  
                     url: ""+url,  
                    success: function(r) {
                        $("#idTable").load("EntidadesReguladorasView.php #idTable");
                        $("#loader").hide();
                        
                     },
                     beforeSend:function(r){


                     },
                     error:function(){
                        $("#loader").hide();
                     }
                 
                    });  
                }
                
                
                function filterTableClaveAutoridad() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputClaveAutoridad");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[0];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                
                
                function filterTableDescripcion() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputDescripcion");
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

                
		</script>
                
                <!--Inicia para el spiner cargando-->
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
                <!--jquery-->
                <script src="../../js/jquery.js" type="text/javascript"></script>

                
                <!--Boostrap-->                     
                <!--en esta seccion es para poder abrir el modal--> 
                <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
                <!--aqui termina la seccion para poder abrir el modal--> 
                
                <!--Para abrir alertas del encabezado-->
                <script src="../../assets/probando/js/ace-elements.min.js"></script>
                <script src="../../assets/probando/js/ace.min.js"></script>
                <script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                <!--DHTMLX-->
                <script src="../../codebase/dhtmlx.js"></script>
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                

                
                
	</body>
        
        
        
</html>


