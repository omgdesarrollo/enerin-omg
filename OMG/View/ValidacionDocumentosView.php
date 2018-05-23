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
                <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

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
                    
                                    
                    div#winVP {
			position: relative;
			height: 350px;
			border: 1px solid #dfdfdf;
			margin: 10px;
		}
                
                   
                    
/*                .main-encabezado {
                        background: #333;
                        color: white;
                        height: 80px;

                        width: 100%;  hacemos que la cabecera ocupe el ancho completo de la página 
                        left: 0;  Posicionamos la cabecera al lado izquierdo 
                        top: 0;  Posicionamos la cabecera pegada arriba 
                        position: fixed;  Hacemos que la cabecera tenga una posición fija 
                    }    */
                    
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
             <div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>


<div style="height: 5px"></div>

             
<div style="position: fixed;">                          
<button type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>

        <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Folio de Entrada" style="width: 140px;">
        <input type="text" id="idInputEntidad" onkeyup="filterTableEntidad()" placeholder="Autoridad Remitente" style="width: 140px;">
        <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Asunto" style="width: 120px;">
        <input type="text" id="idInputResponsable" onkeyup="filterTableResponsable()" placeholder="Responsable Tema" style="width: 180px;">
        <input type="text" id="idInputStatus" onkeyup="filterTableStatus()" placeholder="Status" style="width: 120px;">    
        <input type="text" id="idInputResponsablePlan" onkeyup="filterTableResponsablePlan()" placeholder="Responsable Plan" style="width: 180px;">
        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>    


<div style="height: 47px"></div>


<!--<div class="contenedortable" style="position: fixed;">   
        <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Folio de Entrada" style="width: 200px;">
        <input type="text" id="idInputEntidad" onkeyup="filterTableEntidad()" placeholder="Buscar Por Entidad" style="width: 150px;">
        <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Buscar Por Asunto" style="width: 140px;">
        <input type="text" id="idInputResponsable" onkeyup="filterTableResponsable()" placeholder="Buscar Por Responsable" style="width: 180px;">
        <input type="text" id="idInputStatus" onkeyup="filterTableStatus()" placeholder="Buscar Por Status" style="width: 130px;">
</div >


<div style="height: 55px"></div>-->
             

             
<div class="table-fixed-header" style="display:none;" id="myDiv" class="animate-bottom"> 
    <div class="table-container" id="winVP">
        
        <table class="tbl-qa" id="idTable">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">Clave Documento</th>
                                <th class="table-header">Nombre Documento</th>
                                <th class="table-header">Responsable del Documento</th>
                                <th class="table-header">Tema</th>
                                <th class="table-header">Responsable del Tema</th>
                                <th class="table-header">Documento Adjunto</th>

                                <th class="table-header">Documento por Responsable</th>
                                <th class="table-header">Observacion Documento</th>
                                <th class="table-header">Tema por Responsable</th>
                                <th class="table-header">Observacion Tema</th>
                                <th class="table-header">Plan de Accion</th>
                                <th class="table-header">Desviacion Mayor</th>
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                      $Lista = Session::getSesion("listarValidacionDocumentos");
                      $ListaReqisitos = Session::getSesion("listarAsignacionTemasRequisitos");
                      //$ListaATR= Session::getSesion("listarAsignacionTemasRequisitos");
//                      $cbxEmp= Session::getSesion("listarEmpleadosComboBox");
//                      $cbxEmpleadoPlan= Session::getSesion("listarEmpleadosComboBox");
//                      $cbxEmpleadoPlan1= Session::getSesion("listarEmpleadosComboBox");
                  

//                      $numeracion = 1;
                  

                      foreach ($Lista as $filas)
                          { 
                          ?>
			 
                        <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                                
                                
                                
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clave_documento','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_documento"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado_documento','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado_documento"]." ".$filas["apellido_paterno_documento"]." ".$filas["apellido_materno_documento"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion_clausula"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado_tema','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado_tema"]." ".$filas["apellido_paterno_tema"]." ".$filas["apellido_materno_tema"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'documento_archivo','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento_archivo"]; ?></td>
                       
<!--                                <td>
                                <button type="button" id="btn_mostrar_requisitos" class="btn btn-success" data-toggle="modal">
                                    Ver
                                    <i class="ace-icon fa fa-book" style="color: #0099ff;font-size: 20px;"></i>
                                </button>
                                </td>-->
                                
                                <td>
                                        <button onClick="mostrarRequisitosUrl(<?php echo $filas['id_validacion_documento'] ?>);" type="button" class="btn btn-success" data-toggle="modal" data-target="#checkbox-requisitos">
		                                Ver
                                                <i class="ace-icon fa fa-book" style="color: #0099ff;font-size: 20px;"></i>
                                        </button>
                                </td>
                                
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'validacion_documento_responsable','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["validacion_documento_responsable"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'observacion_documento','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observacion_documento"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'validacion_tema_responsable','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["validacion_tema_responsable"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'observacion_tema','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observacion_tema"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'plan_accion','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["plan_accion"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'desviacion_mayor','<?php echo $filas["id_validacion_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["desviacion_mayor"]; ?></td>
                                
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

	
<!-- Inicio de Seccion Modal Requisitos-->
<div class="modal draggable fade" id="checkbox-requisitos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Check-List Requisitos</h4>
		      </div>

                    
		      <div class="modal-body">
<!--                        <div id="DocumentolistadoUrl"></div>

                        
                        <div class="form-group">
                                <div id="DocumentolistadoUrlModal"></div>
			</div>-->
<div class="row">
    <div class="col">
        <form action="">
                <?php
                                      
                foreach ($ListaReqisitos as $value) { 


                if($value["id_clausula"]=="".$filas["id_clausula"])
                {
                    
                ?>    
            
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" value="opcion1"><?php echo $value["requisito"]; ?>
                </label>
            </div>

                <?php
                }
                }
                ?>

        </form>        
    </div>                                            
</div>  


                        <div class="form-group" method="post" >
                                <button type="submit" id="btn_guardar2"  class="btn crud-submit btn-info">Agregar Archivo</button>
                        </div>
                      </div><!-- cierre div class-body -->
                      
                </div><!-- cierre div class modal-content -->
        </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal Requisitos-->                
                




                
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
                        
//                      $("#btn_mostrar_requisitos").click(function(){
//                        loadVistaRequisitos(true);
//                         });  
  
  
                      });// Cierra el $function 
                      
                function mostrarRequisitosUrl(id_validacion_documento)
                {
                        // alert("mostrar urls: "+id_documento_entrada);
                        mostrarRequisitos_urls(id_validacion_documento);
                }
                
                
                function mostrarRequisitos_urls(id_validacion_documento)
                {
                        alert("entraste aqui ");
                        var tempDocumentolistadoUrl = " ";
                        $.ajax({
                                url: '../Controller/ValidacionDocumentosController.php?Op=listar',
                                type: 'GET',
                                data: 'ID_DOCUMENTO='+id_validacion_documento,
                                success: function(todo)
                                {
                                        $.each(todo[0], function (index,value)
                                        {
                                                // var tempDocumentolistadoUrlSplit = value.DIR.split("/");
                                                // var tempDocumentolistadoUrlPos = tempDocumentolistadoUrlSplit.length - 1;
                                                // console.log(value);
                                                // alert(value);
//                                                tempDocumentolistadoUrl = tempDocumentolistadoUrl +"<li><a href=\"http://localhost:8282/enerin-omg/archivos/files/"+todo[1]['ID_CUMPLIMIENTO']+"/"+id_documento_entrada+"/"+value+"\">" + value + "</a><button style=\"color:green;background:transparent;border:none;padding-left:10px\" onclick='borrarArchivo(\""+value+"\");')><i class=\"fa fa-trash\"></i></button></li>";
                                                tempDocumentolistadoUrl = tempDocumentolistadoUrl +"<li><a href=\"http://enerin-omgapps.com/omgcum/archivos/files/"+todo[1]['ID_CUMPLIMIENTO']+"/"+id_documento_entrada+"/"+value+"\">" + value + "</a><button style=\"color:green;background:transparent;border:none;padding-left:10px\" onclick='borrarArchivo(\""+value+"\");')><i class=\"fa fa-trash\"></i></button></li>";
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
                                        // $('#fileupload').fileupload();
                                        $('#fileupload').fileupload({
                                                url: '../View/',
                                        });
                                        
                                        $('#fileupload').fileupload('option', {
                                        // url: '//jquery-file-upload.appspot.com/',
                                        maxFileSize: 99900000,
                                        });
                                }
                        });
                }
                
                
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
            
    
    function refresh(){
                    
                  window.location.href="ValidacionDocumentosView.php";  
                }
    
    
    function loadSpinner(){
        myFunction();
    }
                
                
    function cargadePrograma(foliodeentrada){
        alert("le has picado al folio de entrada  "+foliodeentrada);
        window.location.href=" GanttView.php?folio_entrada="+foliodeentrada;
//   window.location.replace("http://sitioweb.com");        
    }
    
    
    
//    function loadVistaRequisitos(bclose){
//                    var dhxWins = new dhtmlXWindows();
//                    dhxWins.attachViewportTo("winVP");
//  
//                    var layoutWin=dhxWins.createWindow({id:"requisitos", text:"OMG VISUALIZACION REQUISITOS", left: 20, top: -30,width:530,  height:250,  center:true,resize: true,park:true,modal:true	});
//                    layoutWin.attachURL("RequisitosPorTemaView.php");
//            }
    
    
    function filterTable() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInput");
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
                
                
        function filterTableEntidad() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputEntidad");
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
                
                
        function filterTableAsunto() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputAsunto");
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
                
                
        function filterTableResponsable() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsable");
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
                
                
        function filterTableStatus() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputStatus");
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
                function filterTableResponsablePlan() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsablePlan");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[7];
                      if (td) {
                        select=td.getElementsByTagName("select");
                          $.each(select,function(index,value)
                          {
                                var indexRes = value.selectedIndex;
                                var responsable=value[indexRes].innerHTML;
                                console.log(responsable);
                              if (responsable.toUpperCase().indexOf(filter) > -1)
                              {
                                tr[i].style.display = "";
                              }
                              else
                              {
                                tr[i].style.display = "none";
                              }
//                            console.log(value.options(ind));
                          });
                      } 
                    }
                }
                
    
		</script>
                
            <!--en esta seccion es para poder abrir el modal--> 
                <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
            <!--aqui termina la seccion para poder abrir el modal-->
            
            
                <script src="../../codebase/dhtmlx.js"></script>
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                
                
	</body>
     
</html>


