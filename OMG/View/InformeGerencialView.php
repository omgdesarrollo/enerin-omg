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
                
                
                
                
                
                <!--Aqui empieza el Chart-->
                <!--<link href="dhtmlxChart_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>-->
                <!--<script src="dhtmlxChart_v51_std/codebase/dhtmlxchart.js" type="text/javascript"></script>-->
                <!--<link href="dhtmlxChart_v51_std/codebase/dhtmlxchart.css" rel="stylesheet" type="text/css"/>-->
                
                <!--Aqui termina el Chart-->
                
                
                
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
                
                
                </style>
                
                
                
	</head>

        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
    

<?php

require_once 'EncabezadoUsuarioView.php';

?>
             

<button type="button" id="btn_informe" class="btn btn-success" data-toggle="modal">
    Informe
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</button>
             
             
             
	<div style="display:none;" id="myDiv" class="animate-bottom"> 
                     <div class="contenedortable" id="winVP">
                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">Folio de Entrada</th>
                                <th class="table-header">Entidad Reguladora</th>
                                <th class="table-header">Asunto</th>
                                <th class="table-header">Responsable del Tema</th>
                                <th class="table-header">Fecha Limite</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Condicion</th>
                                <th class="table-header">Documento</th>
                                
                                
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
                                
                                <td></td>
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_informe_gerencial"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
                                
                                
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


