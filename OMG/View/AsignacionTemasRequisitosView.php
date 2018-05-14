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

                        width: 100%; /* hacemos que la cabecera ocupe el ancho completo de la página */
                        left: 0; /* Posicionamos la cabecera al lado izquierdo */
                        top: 0; /* Posicionamos la cabecera pegada arriba */
                        position: fixed; /* Hacemos que la cabecera tenga una posición fija */
                    }
                </style>    
                
                
                

	</head>

        <body class="no-skin" onload="loadSpinner()">
            <!--<div>Cargando...</div>-->
            <div id="loader"></div>
            
<?php

require_once 'EncabezadoUsuarioView.php';

?> 

<div style="height: 50px"></div>
            
        <div style="position: fixed;">     
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                    Asignar Tema-Requisito
            </button>    
        </div>
            
<div style="height: 55px"></div>

<!--<div style="display:none;" id="myDiv" class="animate-bottom"> inicio animacion tabla toda la interfaz seleccionada
    <div class="contenedortable" id="winVP"> -->

                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				<th class="table-header" >NO.</th>
                                <th class="table-header">TEMA</th>
                                <th class="table-header">DESCRIPCION DEL TEMA</th>
				<th class="table-header">REQUISITO</th>									
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarAsignacionTemasRequisitos");
//                   $Lista = PaginacionController::show_rows("ID_ASIGNACION_TEMA_REQUISITO");
                  $cbxClau= Session::getSesion("listarClausulasComboBox");
//                  $datostema
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">
				<td><?php echo $numeracion++;   ?></td>
                                
                                
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADO','<?php //echo $Lista[$k]["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php //echo $Lista[$k]["NOMBRE_EMPLEADO"]; ?></td>-->
                 
                                <td style="background-color: #ccccff">
                                    <select id="id_clausula"class="select" onchange="saveComboToDatabase('id_clausula', <?php echo $filas["id_asignacion_tema_requisito"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxClau as $value) {
                                                    if($value["id_clausula"]=="".$filas["id_clausula"]){
//                                                        $s="selected";
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_clausula"] ?>"  selected ><?php echo "".$value["clausula"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_clausula"] ?>"  ><?php echo "".$value["clausula"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>
                                   <!--<div id="combo_zone" style="width:230px;"></div>-->
                                    
                                </td>
                  
                                <td  style="background-color: #ccccff" contenteditable="false" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_asignacion_tema_requisito"]; ?>')" onClick="showNoEdit(this);"><div><?php echo $filas["descripcion_clausula"]; ?></td>
                    <!--</div>-->
                                <td contenteditable="true" onBlur="saveToDatabase(this,'requisito','<?php echo $filas["id_asignacion_tema_requisito"]; ?>')" onClick="showEdit(this);"><?php echo $filas["requisito"]; ?></td>
                                                    
			  </tr>
		<?php
		}
                
		?>
		  </tbody>
		</table>


			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
	
<!--    </div>         
</div>         -->
                
                <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Requisito a un Tema</h4>
		      </div>

		      <div class="modal-body">
		      		<!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                                    <!--<form data-toggle="validator"  >-->
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        
                                                        <select   id="ID_CLAUSULAMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxClau as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_clausula"] ?>"  ><?php echo "".$value["clausula"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Requisito:</label>
                                                        <textarea  id="REQUISITO" class="form-control" data-error="Ingrese el Requisito" required></textarea>
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
                


		<script src="../../assets/probando/js/jquery-2.1.4.min.js"></script>

		<script src="../../assets/probando/js/bootstrap.min.js"></script>

		<script src="../../assets/probando/js/ace-elements.min.js"></script>
		<script src="../../assets/probando/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
	
		</script>
                
                
                
                
		<script>
                    
                      var id_asignacion_tema_requisito;
                      $(function(){
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          column="ID_CLAUSULA";
                          val=$(this).prop('value');
                          //alert("el value que va a viajar es "+val+" i el id de la clausula : "+idclausula);
                          $.ajax({
                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_asignacion_tema_requisito,
				success: function(data){
                                    
					//$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        alert("entron ");
                                        window.location.href="AsignacionTemasRequisitosView.php";
                                       
				}   
                           });
                          
                          
                        });
                        
                        
                        $("#btn_guardar").click(function(){
                                  //alert("entro aqui");
                                  
        
                                    var ID_CLAUSULAMODAL=$("#ID_CLAUSULAMODAL").val();
                                    var REQUISITO=$("#REQUISITO").val();

                                   alert("ID_CLAUSULAMODAL :"+ID_CLAUSULAMODAL + "REQUISITO :"+REQUISITO );
                                  
                                    

                                    datos=[];
                                    datos.push(ID_CLAUSULAMODAL);
                                    datos.push(REQUISITO);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                            
//                            alert("entro aqui");
                            
                                  //$("#ID_CLAUSULAMODAL").val("");
                                  $("#REQUISITO").val("");
                                                                      
                        });
                        
                        
                        
                        
                        
  
                      }); //LLAVE CIERRE FUNCTION
                      
                      
                      
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
                
                
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){
                     id_asignacion_tema_requisito=id;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Guardar",
				type: "POST",
				data:'ID_CLAUSULA='+datos[0]+'&REQUISITO='+datos[1]+'',
                                
				success: function(data){
                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                         consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        window.location.href("AsignacionTemasRequisitosView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
                
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
                
		</script>
                
                
                <script src="../../codebase/dhtmlx.js"></script>
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
         
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>   
                
                
	</body>
        
        
        
</html>
