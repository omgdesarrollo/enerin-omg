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

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
       
                     
                
                <style> 
                    .modal-body{
                       max-height: calc(100vh - 110px);
                      overflow-y: auto;
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
     <!--<div>Cargando...</div>-->
   <div id="loader"></div>
      
<?php

require_once 'EncabezadoUsuarioView.php';

?>       

       
<!--<div style="height: 5px"></div>-->       

<div style="position: fixed;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
    Agregar Empleado
</button>
<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh()">
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/exportarEmpleadosView/exportarEmpleadosViewExcel.php'">
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>     
<button type="button" onclick="window.location.href='../ExportarView/exportarEmpleadosView/exportarEmpleadosViewWord.php'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>
    
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Nombre" style="width: 150px;">
    <input type="text" id="idInputapellidopaterno" onkeyup="filterTableapellidoPaterno()" placeholder="Apellido Paterno" style="width: 150px;">
    <input type="text" id="idInputapellidomaterno" onkeyup="filterTableapellidoMaterno()" placeholder="Apellido Materno" style="width: 150px;">
    <input type="text" id="idInputCategoria" onkeyup="filterTableCategoria()" placeholder="Categoria" style="width: 150px;">
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>
                                
<div style="height: 40px"></div>


<div class="table-fixed-header" >
    <div class="table-container">           
               
               <table  id="idTable" class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header" width="10%">No.</th>
				<th class="table-header">Nombre</th>
				<th class="table-header">Apellido Paterno</th>
                                <th class="table-header">Apellido Materno</th>
                                <th class="table-header">Categoria</th>
                                <th class="table-header">Email</th>
                                <th class="table-header">Fecha Creacion</th>
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
                                    <td contenteditable="true" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["nombre_empleado"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'apellido_paterno','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["apellido_paterno"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'apellido_materno','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["apellido_materno"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'categoria','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["categoria"]; ?></td>
                                 <td contenteditable="true" onBlur="saveToDatabase(this,'correo','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["correo"]; ?></td>
                                 <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_creacion','<?php echo $filas["id_empleado"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["fecha_creacion"]; ?></td>
			  </tr>
                          
		<?php
                    }
		}
		?>
		  </tbody>
		</table>
        
    </div>
</div>    
                                            

<!-- Inicio de Seccion Modal -->
<div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">x</span></button>
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
                    var si_hay_cambio=false;
                    
                    $(function(){
                       
                        $("#btn_guardar").click(function(){
                            
                                  var NOMBRE_EMPLEADO=$("#NOMBRE_EMPLEADO").val();
                                  var APELLIDO_PATERNO=$("#APELLIDO_PATERNO").val();
                                  var APELLIDO_MATERNO=$("#APELLIDO_MATERNO").val();
                                  var CATEGORIA=$("#CATEGORIA").val();
                                  var CORREO=$("#CORREO").val();
                                    datos=[];
                                    datos.push(NOMBRE_EMPLEADO);
                                    datos.push(APELLIDO_PATERNO);
                                    datos.push(APELLIDO_MATERNO);
                                    datos.push(CATEGORIA);
                                    datos.push(CORREO);
                                    correcto=validarCamposVacios(datos);
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
                        
    
                    }); // se cierra el $function
                    
                    
                    function validarCamposVacios(datos){
                         correcto=false;

                        var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                        alert("entro "+datos[0]+"   "+datos[1]+"ddf   "+datos[2]+"   "+datos[3]+""+datos[4]+"");
                        
                 if(datos[0] == ""){
                   $("#mensaje1").fadeIn();
                   $("#mensaje1").append("Ingrese El Nombre");
                   $("#mensaje1").css("background-color","red");
                   $("#mensaje1").css("width", "35%");
             
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
                   
                    return correcto;    
                    }
                    
                function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/EmpleadosController.php?Op=Guardar",
				type: "POST",
				data:'NOMBRE_EMPLEADO='+datos[0]+'&APELLIDO_PATERNO='+datos[1]+'&APELLIDO_MATERNO='+datos[2]+'&CATEGORIA='+datos[3]+'&CORREO='+datos[4],
				success: function(data){
//                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success");
                                        setTimeout('refresh()',1000);

                                         consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");
//                                        window.location.href="EmpleadosView.php";
                                        
				}   
		   });

                }    
                
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
                    if(si_hay_cambio==true){
                        
                        $("#btnrefrescar").prop("disabled",true);
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/EmpleadosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");
                                        swal("Actualizacion Exitosa!", "Ok!", "success");
                                        setTimeout(function(){swal.close();},1000);
                                        $("#btnrefrescar").prop("disabled",false);
                                        si_hay_cambio=false;
				}   
		   });
                   
                    } else {
                        
                    }

		}
             
                function consultarInformacion(url){
                    $('#loader').show();

                    $.ajax({  
                     url: ""+url,  
                    success: function(r) {    
//                     $("#procesando").empty();                       
                        $("#idTable").load("EmpleadosView.php #idTable");
                        $('#loader').hide();
                     },
                     beforeSend:function(){

                     },                    
                     error: function(){
                        $('#loader').hide();

                     }
                 
                    });  
                }
                
                
                
                function detectarsihaycambio() {
                    
                    si_hay_cambio=true;
                }
                
               function filterTable() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

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
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputapellidomaterno");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

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
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputCategoria");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

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
                  consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");                                             
                  
                }
                
                
                
                function loadSpinner(){
                        myFunction();
                }
                
                
                
                
		</script>

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
