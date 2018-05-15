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
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
             <script src="../../js/jquery.js" type="text/javascript"></script>

		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                
                 <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                     <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                     
 <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
 			 
	</head>

        
        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       

<?php

require_once 'EncabezadoUsuarioView.php';

?>             

             
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
                                
                                
                                
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'folio_entrada','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_entrada"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clave_entidad','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_entidad"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'asunto','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["asunto"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleadotema','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleadotema"]." ".$filas["apellido_paternotema"]." ".$filas["apellido_maternotema"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_limite_atencion','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_limite_atencion"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'status_doc','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["status_doc"]; ?></td>
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADOPLAN','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php //echo $filas["nombre_empleadoplan"]; ?></td>-->
                                                                                                                             
                                <td> 
                                    <select   id="id_empleado" class="select"  onchange="saveComboToDatabase('id_empleado', <?php echo $filas["id_seguimiento_entrada"]; ?> )">
                                    
                                    <?php
                                    $s="";
                                                foreach ($cbxEmpleadoPlan as $value) {
                                                    
                                                    if($value["id_empleadoplan"]=="".$filas["id_empleado"]){
//                                                        $s="selected";
                                                    ?>
                                    
                                        <option value="<?php echo "".$filas["id_empleadoplan"] ?>"  selected ><?php echo "".$filas["nombre_empleadoplan"]." ".$filas["apellido_paternoplan"]." ".$filas["apellido_maternoplan"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            
                                                            
                                                            
                                                        ?>
                                                        
                                                             <?php
                                                        }
                                                        
                                                        
                                                        foreach($cbxEmpleadoPlan1 as $value1){
                                                               if($value1["id_empleado"]!=$filas["id_empleadoplan"]){
                                                         ?>
                                                            <option value="<?php echo "".$value1["id_empleado"] ?>"  ><?php echo "".$value1["nombre_empleado"]." ".$value1["apellido_paterno"]." ".$value1["apellido_materno"]; ?></option>

                                                         <?php
                                                               }
                                                        
                                        
                                                            }
                                                             break;
                                                }
                                    
                                    ?>
                                    </select>                                                                    
                                </td>
                                
                                                                    
                                <td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
                                <td ><button class="btn btn-info" onClick="cargadePrograma('<?php echo $filas["folio_entrada"]; ?>')">Cargar Programa</button></td>
                                
			  </tr>
                          
		<?php
		}
                
		?>
		  </tbody>
		</table>

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
        myFunction();
    }
                
                
    function cargadePrograma(foliodeentrada){
        alert("le has picado al folio de entrada  "+foliodeentrada);
        window.location.href=" GanttView.php?folio_entrada="+foliodeentrada;
//   window.location.replace("http://sitioweb.com");
        
    }
		</script>
                
                
                
                
	</body>
     
</html>


