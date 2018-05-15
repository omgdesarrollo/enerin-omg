<?php
session_start();

require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");

// setlocale(LC_ALL,'es_RA');

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
                
                
                
                
                <script>
                
                
                
                </script>

                
                
            
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
                       max-height: calc(100vh - 210px);
                       max-height: calc(100vh - 110px); 
                       overflow-y: auto; 
                    }
                    .modal-body p {
                       text-align:center; 
                       padding-top:10px; 
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

            
             <!-- <div style="height: 50px"></div> -->
             
             <div style="position: fixed;">        
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                    Agregar-Documento
                </button>    
              </div>
	                   
          <div style="height: 55px"></div>

                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				<th class="table-header" >No.</th>
                                <th class="table-header">Clave del Documento</th>
				<th class="table-header">Nombre del Documento</th>				
				<th class="table-header">Responsable del Documento</th>					                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarDocumentos");
                  $cbxEmp= Session::getSesion("listarEmpleadosComboBox");
//                  $Lista = PaginacionController::show_rows("ID_DOCUMENTO");
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">
				<td><?php echo $numeracion++;   ?></td>                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'clave_documento','<?php echo $filas["id_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_documento"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_documento"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
                                  <td> 
<!--                                    <select  class="empleado" name="n_empleado" onchange="saveComboToDatabase('ID_EMPLEADO', <?php // echo $filas["ID_CLAUSULA"]; ?> )">-->
                                    <select   id="id_empleado" class="select"  onchange="saveComboToDatabase('id_empleado', <?php echo $filas["id_documento"]; ?> )">
                                    <!--<select name="name_empleado">-->
                                    <?php
                                    $s="";
                                                foreach ($cbxEmp as $value) {
                                                    if($value["id_empleado"]=="".$filas["id_empleado"]){
//                                                        $s="selected";
                                                    ?>
                                    
                                        <option value="<?php echo "".$filas["id_empleado"] ?>"  selected ><?php echo "".$filas["nombre_empleado"]." ".$filas["apellido_paterno"]." ".$filas["apellido_materno"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_empleado"] ?>"  ><?php echo "".$value["nombre_empleado"]." ".$value["apellido_paterno"]." ".$value["apellido_materno"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>
                                        
                                  
                                   <!--<div id="combo_zone" style="width:230px;"></div>-->
                                    
                                </td>
			  </tr>
		<?php
		}
                
		?>
		  </tbody>
		</table>
                           
                           

   
            
            
			

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
	
             
                
                <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Documento</h4>
		      </div>

		      <div class="modal-body">
		      		<!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                                    <!--<form data-toggle="validator"  >-->
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Clave del Documento:</label>
                                                        <textarea  id="CLAVE_DOCUMENTO" class="form-control" data-error="Ingrese la Clave del Documento" required></textarea>
							<div class="help-block with-errors"></div>
                                                        <div id="msgerrorclave" ></div>
						</div>
                                    
<!--                                     <button class="btn btn-info">Convertir a MAYUSCULAS</button>
                                      <button class="btn btn-info">convertir a minusculas</button>-->
                                                <div class="form-group">
                                                   
							<label class="control-label" for="title">Documento:</label>
                                                        <textarea  id="DOCUMENTO" class="form-control " data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Responsable del Documento:</label>
                                                        
                                                        <select   id="ID_EMPLEADOMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxEmp as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_empleado"] ?>"  ><?php echo "".$value["nombre_empleado"]." ".$value["apellido_paterno"]." ".$value["apellido_materno"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
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
                    
                      var id_clausula;
                      $(function(){
                          
                          
                          
                        $("#CLAVE_DOCUMENTO").keyup(function(){
//                            alert("d");
                            var valueclavedocumento=$(this).val();
//                            alert("d  "+valueclavedocumento);
                            
                            verificarExiste(valueclavedocumento,"clave_documento");
                           
                        });
                          
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                          alert("el value que va a viajar es "+val+" y el id de la claus : "+id_clausula);
                          $.ajax({
                                url: "../Controller/DocumentosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_clausula,
				success: function(data){
                                    
                                        consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                        consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                        window.location.href="DocumentosView.php";
                                    
					//$(editableObj).css("background","#FDFDFD");
				}   
                           });
                          
                          
                        });
  
  
                      
                        
                        
                        $("#btn_guardar").click(function(){
                                  //alert("entro aqui");
                                  
                                    var CLAVE_DOCUMENTO=$("#CLAVE_DOCUMENTO").val();
                                    var DOCUMENTO=$("#DOCUMENTO").val();
                                    var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
                                    

//                                   alert("CLAVE_DOCUMENTO :"+CLAVE_DOCUMENTO + "DOCUMENTO :"+DOCUMENTO + "ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL);
                                  
                                    

                                    datos=[];
                                    datos.push(CLAVE_DOCUMENTO);
                                    datos.push(DOCUMENTO);
                                    datos.push(ID_EMPLEADOMODAL);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                            
//                            alert("entro aqui");
                            
                                  $("#CLAVE_DOCUMENTO").val("");
                                  $("#DOCUMENTO").val("");
                                  //$("#ID_EMPLEADOMODAL").val("");
                                                                      
                        });
                        
                        
  
                      }); //LLAVE CIERRE FUNCTION
                      
                      
                      
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
                
                
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/DocumentosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){
                     id_clausula=id;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/DocumentosController.php?Op=Guardar",
				type: "POST",
				data:'CLAVE_DOCUMENTO='+datos[0]+'&DOCUMENTO='+datos[1]+'&ID_EMPLEADO='+datos[2],
                                
				success: function(data){
                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                         consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                        window.location.href("DocumentosView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
                
                
                
      function verificarExiste(dataString,cualverificar){
//          alert("fdf");
                    //Le pasamos el valor del input al ajax
                            $.ajax({
                                type: "POST",
                                url: "../Controller/DocumentosController.php?Op=verificacionexisteregistro&cualverificar="+cualverificar,
                                data: "registro="+dataString,
                                success: function(data) {    
mensajeerror="";

    $.each(data, function (index,value) {
//        console.log("sub_clausula: " + value.sub_clausula);
        mensajeerror=" "+value.clave_documento+" ya existe";
    });
$("#msgerrorclave").html(mensajeerror);
if(mensajeerror!=""){
    $("#msgerrorclave").css("background","red");
    $("#msgerrorclave").css("width","190px");
    $("#msgerrorclave").css("color","white");
    $("#btn_guardar").prop("disabled",true);
}else{
    $("#btn_guardar").prop("disabled",false);
}



}
                                })
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
