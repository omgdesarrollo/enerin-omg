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
		<!--<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />-->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>

                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/fEmpleadosOficiosView.js" type="text/javascript"></script>
                
<style>
        
.modal-body{
color:#888;
max-height: calc(100vh - 110px);
overflow-y: auto;
}                    

#sugerenciasclausulas {
width:350px;
height:5px;
overflow: auto;
}  
body{
overflow:hidden;     
}

.hideScrollBar{
width: 100%;
height: 100%;
overflow: auto;
margin-right: 14px;
padding-right: 28px; /*This would hide the scroll bar of the right. To be sure we hide the scrollbar on every browser, increase this value*/
padding-bottom: 15px; /*This would hide the scroll bar of the bottom if there is one*/
}
  

</style>

                
</head>
    
    
    
    
<body class="no-skin" onload="loadSpinner()">
   <div id="loader"></div>
      
<?php

require_once 'EncabezadoUsuarioView.php';

?>       
       
<div style="height: 5px"></div>       

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


 <table class="table table-bordered table-striped header_fijo"  >
    <thead >
    <tr class="">
     <!--<th class="table-headert" width="8%">No.</th>-->
     <th class="table-headert" width="21.12%">Nombre</th>
     <th class="table-headert" width="15.36%">Apellido Paterno</th>
     <th class="table-headert" width="15.36%">Apellido Materno</th>
     <th class="table-headert" width="15.36%">Categoria</th>
     <th class="table-headert" width="14.4%">Email</th>
     <th class="table-headert" width="14.4%">Fecha Creacion</th>
    </tr>
   </thead>

   <tbody class="hideScrollBar"  id="datosGenerales" style="position: absolute">
   </tbody>

</table>  
                                            

<!-- Inicio de Seccion Modal -->
<div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
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
                    si_hay_cambio=false;
                    listarDatos();



//function listarDatos()
//{
//    $.ajax
//    ({
//        url: '../Controller/EmpleadosController.php?Op=Listar',
//        type: 'GET',
//        beforeSend:function()
//        {
//            $('#loader').show();
//        },
//        success:function(datos)
//        {
////            data = datos;
//            reconstruirTable(datos);
//        },
//        error:function(error)
//        {
//            $('#loader').hide();
//        }
//    });
//}



//function reconstruirTable(data)
//{
//    cargaTodo=0;
////    tempData="";
//    
////    $.each(data,function(index,value){
////        
////            tempData += reconstruir(value,cargaTodo);
////    });
//      tempData = "";
//    
//    $.each(data,function(index,value){
////                if(carga==0)
////                tempData += "<tr id='registro_"+value.id_empleado+"'>";
//                tempData += "<tr><td class='celda' width='22%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','nombre_empleado',"+value.id_empleado+",'id_empleado')\" \n\
//                                  onkeyup=\"detectarsihaycambio()\" >"+value.nombre_empleado+"</td>";
//                tempData += "<td class='celda' width='16%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','apellido_paterno',"+value.id_empleado+",'id_empleado')\" \n\
//                                  onkeyup=\"detectarsihaycambio()\">"+value.apellido_paterno+"</td>";
//                tempData += "<td class='celda' width='16%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','apellido_materno',"+value.id_empleado+",'id_empleado')\" \n\
//                                  onkeyup=\"detectarsihaycambio()\">"+value.apellido_materno+"</td>";
//                tempData += "<td class='celda' width='16%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','categoria',"+value.id_empleado+",'id_empleado')\" \n\
//                                  onkeyup=\"detectarsihaycambio()\">"+value.categoria+"</td>";
//                tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','correo',"+value.id_empleado+",'id_empleado')\" \n\
//                                  onkeyup=\"detectarsihaycambio()\">"+value.correo+"</td>";
//                tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','fecha_creacion',"+value.id_empleado+",'id_empleado')\" \n\
//                                  onkeyup=\"detectarsihaycambio()\">"+value.fecha_creacion+"</td>";                    
//                
////                if(carga==0)
//                tempData += "</tr>";
//            });
//    $("#datosGenerales").html(tempData);
//    $("#loader").hide();
//}
//
//
//function saveSingleToDatabase(Obj,tabla,columna,id,contexto) {
////    alert(Obj.innerHTML+"-"+columna+"-"+tabla+"-"+id+"-"+contexto+"-"+si_hay_cambio);
//            if(si_hay_cambio==true){
//            //alert("si hay cambio"); 
//            $("#btnrefrescar").prop("disabled",true);
//            
//            $(Obj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
//            
////            saveOneToDatabase(Obj.innerHTML,columna,tabla,id,contexto);
//            $(Obj).css("background","#FDFDFD");
//           
//            si_hay_cambio=false;
//
//        } 
//
//    }
//    
//    
// function detectarsihaycambio() {
//                    
//    si_hay_cambio=true;
//}   
              
                
//		function showEdit(editableObj) {
//			$(editableObj).css("background","#FFF");
//		} 
//		
//		function saveToDatabase(editableObj,column,id) {
//                    if(si_hay_cambio==true){
//                        
//                        $("#btnrefrescar").prop("disabled",true);
//			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
//			$.ajax({
//                                url: "../Controller/EmpleadosController.php?Op=Modificar",
//				type: "POST",
//				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
//				success: function(data){
//					$(editableObj).css("background","#FDFDFD");
//                                        consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");
//                                        swal("Actualizacion Exitosa!", "Ok!", "success");
//                                        setTimeout(function(){swal.close();},1000);
//                                        $("#btnrefrescar").prop("disabled",false);
//                                        si_hay_cambio=false;
//				}   
//		   });
//                   
//                    } else {
//                        
//                    }
//
//		}
             
                
                
                
                
                
                
                
                
//                function reconstruirTable(data)
//                {
//                    cargarTodo=0;
//                    tempData ="";
//                    $.ajax({
//                        url:"../Controller/EmpleadosController.php",
//                        type:'GET',
//                        data:'',
//                        success:
//                                
//                    });
//
//                }
                
                
                
                
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
