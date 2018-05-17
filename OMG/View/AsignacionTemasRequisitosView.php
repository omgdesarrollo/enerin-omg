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

		
                <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

		<!-- text fonts -->
		<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
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

<div style="height: 50px"></div>
            
        <div style="position: fixed;">     
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                    Asignar Tema-Requisito
            </button>    
        

            <button type="button" id="btn_lista_documentos" class="btn btn-success" data-toggle="modal">
                Lista de Documentos
                <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
            </button>
        
        
            <button type="button" id="btn_lista_temas" class="btn btn-success" data-toggle="modal">
                Lista de Temas
                <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
            </button>
        </div>
            
<div style="height: 55px"></div>


<div class="contenedortable">   
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Descripcion del Tema" style="width: 220px">
</div > 



<div class="table-fixed-header" style="display:none;" id="myDiv" class="animate-bottom"> <!--inicio animacion tabla toda la interfaz seleccionada-->
    <div class="table-container" id="winVP"> 

                           <table id="idTable" class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				<th class="table-header" >No.</th>
                                <th class="table-header">Tema</th>
                                <th class="table-header">Descripcion del Tema</th>
				<th class="table-header">Requisito</th>									
				<th class="table-header">Clave Documento</th>									
                                
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarAsignacionTemasRequisitos");
                  $cbxClau= Session::getSesion("listarClausulasComboBox");
                  $cbxDoc= Session::getSesion("listarDocumentosComboBox");
//                  $datostema
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row" >
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
                                    
                                </td>
                  
                                <td  style="background-color: #ccccff" contenteditable="false" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_asignacion_tema_requisito"]; ?>')" onClick="showNoEdit(this);"><div><?php echo $filas["descripcion_clausula"]; ?></td>
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'requisito','<?php echo $filas["id_asignacion_tema_requisito"]; ?>')" onClick="showEdit(this);"><?php echo $filas["requisito"]; ?></td>
                                
                                <td> 
                                    <select id="id_documento" class="select" onchange="saveComboToDatabase('id_documento', <?php echo $filas["id_asignacion_tema_requisito"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxDoc as $value) {
                                                    
                                                    if($value["id_documento"]=="".$filas["id_documento"]){
//                                                        $s="selected";
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_documento"] ?>"  selected ><?php echo "".$value["clave_documento"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        
                                                        else{
                                                            ?>
                                                        <!--}-->
                                                             <option value="<?php echo "".$value["id_documento"] ?>"  ><?php echo "".$value["clave_documento"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>
                                
                                    
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
	
    </div>         
</div>         
                
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
							<label class="control-label" for="title">Documento:</label>
                                                        
                                                        <select   id="ID_DOCUMENTOMODAL" class="select2">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxDoc as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_documento"] ?>"  ><?php echo "".$value["clave_documento"]; ?></option>
                                                                
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
                

                
                
                
                
		<script>
                    
                      var id_asignacion_tema_requisito;
                      var cualmodificar;
                      $(function(){
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          
                          if(cualmodificar == "id_clausula"){
                            column="id_clausula";
                            
                        } if (cualmodificar == "id_documento"){
                            column="id_documento";
                        }
                          
                          val=$(this).prop('value');
                          //alert("el value que va a viajar es "+val+" i el id de la clausula : "+idclausula);
                          $.ajax({
                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_asignacion_tema_requisito,
				success: function(data){
                                    //alert("SE hizo");
					//$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        //alert("entron ");
                                        refresh();                                        
                                        //window.location.href="AsignacionTemasRequisitosView.php";
                                       
				}   
                           });
                          
                          
                        });
                        
                        
                        $("#btn_guardar").click(function(){
                                  alert("entro aqui");
                                  
        
                                    var ID_CLAUSULAMODAL=$("#ID_CLAUSULAMODAL").val();
                                    var REQUISITO=$("#REQUISITO").val();
                                    var ID_DOCUMENTOMODAL=$("#ID_DOCUMENTOMODAL").val();

                                   alert("ID_DOCUMENTOMODAL :"+ID_DOCUMENTOMODAL);
                                  
                                    

                                    datos=[];
                                    datos.push(ID_CLAUSULAMODAL);
                                    datos.push(REQUISITO);
                                    datos.push(ID_DOCUMENTOMODAL);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                            
//                            alert("entro aqui");
                            
                                  //$("#ID_CLAUSULAMODAL").val("");
                                  $("#REQUISITO").val("");
                                                                      
                        });
                        
                        
                        $("#btn_lista_documentos").click(function(){
                        loadVistaDocumentos(true);
                        });
                 
                 
                        $("#btn_lista_temas").click(function(){
                        loadVistaTemas(true);
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
                     cualmodificar=column;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Guardar",
				type: "POST",
				data:'ID_CLAUSULA='+datos[0]+'&REQUISITO='+datos[1]+'&ID_DOCUMENTO='+datos[2],
                                
				success: function(data){
                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success");
                                         consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                         consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                         setTimeout('refresh()',1000);
                                         //window.location.href="AsignacionTemasRequisitosView.php";
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
                
                function consultarInformacion(url){
               $.ajax({  
                     url: ""+url,  
                    success: function(r) {    
                     },
                     beforeSend:function(r){


                     }
                 
                });  
            }
                
                
                
                
                
                function refresh(){
                    
                  window.location.href="AsignacionTemasRequisitosView.php";  
                }
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
            function loadVistaDocumentos(bclose){
                    var dhxWins = new dhtmlXWindows();
                    dhxWins.attachViewportTo("winVP");
                    var layoutWin=dhxWins.createWindow({id:"documentos", text:"OMG VISUALIZACION DOCUMENTOS", left: 20, top: -30,width:330,  height:250,  center:true,resize: true,park:true,modal:true	});
                    layoutWin.attachURL("DocumentosModalView.php");
            } 
            
            
            function loadVistaTemas(bclose){
                    var dhxWins = new dhtmlXWindows();
                    dhxWins.attachViewportTo("winVP");
                    var layoutWin=dhxWins.createWindow({id:"temas", text:"OMG VISUALIZACION TEMAS", left: 20, top: -30,width:530,  height:250,  center:true,resize: true,park:true,modal:true	});
                    layoutWin.attachURL("TemasModalView.php");
                
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
                
		</script>
                
                
                <script src="../../assets/probando/js/jquery-2.1.4.min.js"></script>

		<script src="../../assets/probando/js/ace-elements.min.js"></script>
		<script src="../../assets/probando/js/ace.min.js"></script>
                
                <script src="../../codebase/dhtmlx.js"></script>
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
         
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                
                <!--en esta seccion es para poder abrir el modal--> 
                <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
                <!--aqui termina la seccion para poder abrir el modal-->
                
                
	</body>
        
        
        
</html>
