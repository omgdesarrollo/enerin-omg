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
		<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
                <!--<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
		<!--<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />-->
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
               
                
                <!--<link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>-->
                <!--<script src="../../js/loaderanimation.js" type="text/javascript"></script>-->      
                
                
                <!--en esta seccion es para poder abrir el modal--> 
                <!--<script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>-->             
                <!--<link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>-->
                <!--<link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>-->
                <!--<script src="../../codebase/dhtmlx.js"></script>-->
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
                    
                                    
                    div#winVP {
			position: relative;
			height: 350px;
			border: 1px solid #dfdfdf;
			margin: 10px;
		}
                
                .main-encabezado {
                        /*background: #333;*/
                        color: white;
                        height: 80px;

                        width: 100%;  /*hacemos que la cabecera ocupe el ancho completo de la página*/ 
                        left: 0;  /*Posicionamos la cabecera al lado izquierdo*/ 
                        top: 0;  /*Posicionamos la cabecera pegada arriba*/ 
                        position: fixed;  /*Hacemos que la cabecera tenga una posición fija*/ 
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
             <div id="loader"></div>
    

<?php

require_once 'EncabezadoUsuarioView.php';

?>
             

<div style="height: 50px"></div>

             
<div style="position: fixed;">                        
<button type="button" id="btn_informe" class="btn btn-success" data-toggle="modal">
    Informe
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</button>
    
<button type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>        
</div>    
             
<div style="height: 55px"></div>


<div class="contenedortable" style="position: fixed;">   
        <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Folio de Entrada" style="width: 200px;">
        <input type="text" id="idInputEntidad" onkeyup="filterTableEntidad()" placeholder="Buscar Por Entidad" style="width: 150px;">
        <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Buscar Por Asunto" style="width: 140px;">
        <input type="text" id="idInputResponsable" onkeyup="filterTableResponsable()" placeholder="Buscar Por Responsable" style="width: 180px;">
        <input type="text" id="idInputStatus" onkeyup="filterTableStatus()" placeholder="Buscar Por Status" style="width: 130px;">
</div >


<div style="height: 55px"></div>

             
<div class="table-fixed-header" style="display:none;" id="myDiv" class="animate-bottom"> 
    <div class="table-container">
                         
        <table class="tbl-qa" id="idTable">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">Folio de Entrada</th>
                                <th class="table-header">Entidad Reguladora</th>
                                <th class="table-header">Asunto</th>
                                <th class="table-header">Responsable del Tema</th>
                                <th class="table-header">Fecha Limite</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Condicion</th>
                                <!--<th class="table-header">Documento</th>-->
                                
                                
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
//                      $cbxE= Session::getSesion("listarEmpleadosComboBox");
                  
//                  $datostema
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                        
                                <td contenteditable="false" onBlur="saveToDatabase(this,'folio_entrada','<?php echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_entrada"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clave_entidad','<?php echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_entidad"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'asunto','<?php echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php echo $filas["asunto"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleadotema','<?php echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleadotema"]." ".$filas["apellido_paternotema"]." ".$filas["apellido_maternotema"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_limite_atencion','<?php echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_limite_atencion"]; ?></td>
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'status_doc','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);">
                                    <?php 
                                    
                                    if($filas["status_doc"]== 1){
                                        echo "En proceso";
                                        
                                    } if($filas["status_doc"]== 2){
                                        echo "Suspendido";
                                        
                                    } if($filas["status_doc"]== 3){
                                        echo "Terminado";
                                        
                                    }
                                    
                                    ?>                                
                                </td>
                                
                                <td>                                
                                    <?php
                                   
                                    //Inicia Status Logico
                                    $alarm = new Datetime($filas['fecha_alarma']);
                                    $alarm = strftime("%d-%B-%y",$alarm -> getTimestamp());
                                    $alarm = new Datetime($alarm);
                                    
                                    $flimite = new Datetime($filas['fecha_limite_atencion']);// Guarda en una variable la fecha de la base de datos
                                    $flimite = strftime("%d-%B-%y",$flimite -> getTimestamp());// Esta da el formato: dia. mes y año, sin guardar las horas 
                                    $flimite = new Datetime($flimite);//Se guarda en este formato y se reinicializan las horas a 00.
                                    
                                    $hoy = new Datetime();
                                    $hoy = strftime("%d - %B - %y");
                                    $hoy = new Datetime($hoy);
                               

                                    
                                    if($filas["status_doc"]== 1){

                                        if ($flimite <= $hoy){

                                            if($flimite == $hoy){
                                                
                                                echo "Tiempo Limite";
                                                
                                            } else {
                                                
                                                echo "Tiempo Vencido";  
                                            }
                                                  
                                        } else{
                                            
                                          if ($alarm <= $hoy){
                                              
                                              echo "Alerta Vencida";
                                                                                           
                                          } else {
                                                  echo "En Tiempo";
                                              }                                           
                                        }
                                       
                                     
                                    } //Primer If 
                                    
                                  
                                    if($filas["status_doc"]== 2){
                                        echo "Suspendido";
                                        
                                    } if($filas["status_doc"]== 3){
                                        echo "Terminado";
                                        
                                    } 
                                   
                                    //Termina Status Logico
                                   
                                   ?>
                                    
                                </td>
                                
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php // echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php // echo $filas["documento"]; ?></td>-->
                                
                                
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

	               
                
                
                
		<script>
                    
                var id_seguimiento_entrada;
                
//                      $(function(){
//                        $('.select').on('change', function() {
////                          console.log( $(this).prop('value') );
////                          alert("el value que va a viajar es "+ $(this).prop('value'));
//                          
//                        if (cualmodificar == "ID_EMPLEADO") {
//    
//                        column="ID_EMPLEADO";
//    
//                        } else {
//                            
//                        column="ID_ENTIDAD";
//                            
//                        }
//                            
//                         
//                          val=$(this).prop('value');
//                          alert("el value que va a viajar es "+val+" i el id de la clausula : "+id_seguimiento_entrada);
//                          $.ajax({
//                                url: "../Controller/SeguimientoEntradasController.php?Op=Modificar",
//				type: "POST",
//				data:'column='+column+'&editval='+val+'&id='+id_seguimiento_entrada,
//				success: function(data){
////                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
//					//$(editableObj).css("background","#FDFDFD");
//                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
//                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
//                                        window.location.href="SeguimientoEntradaView.php";
//				}   
//                           });
//                          
//                          
//                        });
//  
//  
//                      });
                      
                      
                      
                    $(function(){
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                          alert("el value que va a viajar es "+val+" i el id de la clausula : "+id_seguimiento_entrada);
                          $.ajax({
                                url: "../Controller/SeguimientoEntradasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_seguimiento_entrada,
				success: function(data){
//                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
					//$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
                                        window.location.href="SeguimientoEntradaView.php";
				}   
                           });
                          
                          
                        });
  
                        
                        $("#btn_informe").click(function(){
                        loadChartView(true);
                         });
                         
                      
                        
  
                    });//cierra el $function
                      
                      
                                                  
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
                    
                  window.location.href="InformeGerencialView.php";  
                }
            
    
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
                
              
                function loadChartView(bclose){
                    var dhxWins = new dhtmlXWindows();
                    dhxWins.attachViewportTo("winVP");
        //var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
                    var layoutWin=dhxWins.createWindow({id:"informe", text:"OMG VISUALIZACION INFORME", left: 20, top: -30,width:530,  height:250,  center:true,resize: true,park:true,modal:true });
                    layoutWin.attachURL("ChartView.php");

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


