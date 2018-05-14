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
                
                
                <script src="../../js/jquery.js" type="text/javascript"></script>
		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
              
                
                <!--Modal requisitos-->
<!--                <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
                <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css'>-->

                
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
                        background: #333;
                        color: white;
                        height: 80px;

                        width: 100%;  
                        left: 0; 
                        top: 0;  
                        position: fixed; 
                    }
                

                </style>
                
                
	</head>

        <body class="no-skin" onload="loadSpinner()">
	<div id="loader"></div>
        
<?php

require_once 'EncabezadoUsuarioView.php';

?>          
        
<div style="height: 50px"></div>


            <div style="position: fixed;">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
		Asignar Documento-Tema
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
        
        
        <div style="display:none;" id="myDiv" class="animate-bottom"> <!--inicio animacion tabla toda la interfaz seleccionada-->
                    <!--<div id="winVP"></div>-->
                <div class="contenedortable" id="winVP">  
                           <table class="tbl-qa">
		  <!--<thead>-->
			  <tr>
				<th class="table-header" >NO.</th>
                                <th class="table-header">CLAVE DEL DOCUMENTO</th>
                                <th class="table-header">DOCUMENTO</th>
				<th class="table-header">CLAVE DEL TEMA</th>									
                                <th class="table-header">DESCRIPCION DEL TEMA</th>									
				<th class="table-header">OPCION</th>									
				<!--<th class="table-header">REQUISITO</th>-->									

			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarAsignacionDocumentosTemas");
                  $cbxDoc= Session::getSesion("listarDocumentosComboBox");
                  $cbxATR= Session::getSesion("listarAsignacionTemasRequisitosComboBox");
                  $ListaReqisitos = Session::getSesion("listarAsignacionTemasRequisitos");
                  $ListaTemas = Session::getSesion("listarClausulas");
                  
                  
                  
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">
				<td><?php echo $numeracion++;   ?></td>
                                
                                
                                <td> 
                                    <select id="id_documento" class="select" onchange="saveComboToDatabase('id_cocumento', <?php echo $filas["id_asignacion_documento_tema"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxDoc as $value) {
                                                    
                                                    if($value["id_cocumento"]=="".$filas["id_cocumento"]){
//                                                        $s="selected";
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_cocumento"] ?>"  selected ><?php echo "".$value["clave_documento"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        
                                                        else{
                                                            ?>
                                                        <!--}-->
                                                             <option value="<?php echo "".$value["id_cocumento"] ?>"  ><?php echo "".$value["clave_documento"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>
                                   <!--<div id="combo_zone" style="width:230px;"></div>-->
                                    
                                </td>

                                <td contenteditable="false" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_asignacion_documento_tema"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>

                                
                                
                                
<!--                                <td> 
                                    <select id="id_asignacion_tema_requisito" class="select" onchange="saveComboToDatabase('ID_ASIGNACION_TEMA_REQUISITO', <?php echo $filas["ID_ASIGNACION_DOCUMENTO_TEMA"]; ?> )">
                                    <?php
                                    $s="";
//                                                foreach ($cbxATR as $value) {
//                                                    if($value["ID_ASIGNACION_TEMA_REQUISITO"]=="".$filas["ID_ASIGNACION_TEMA_REQUISITO"]){
//                                                        $s="selected";
                                                    
                                                    ?>
                                    
                                        <option value="<?php // echo "".$value["ID_ASIGNACION_TEMA_REQUISITO"] ?>"  selected ><?php // echo "".$value["CLAUSULA"]; ?></option>
                                        
                                                        <?php
//                                                        }
//                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php // echo "".$value["ID_ASIGNACION_TEMA_REQUISITO"] ?>"  ><?php // echo "".$value["CLAUSULA"]; ?></option>
                                                             <?php
//                                                        }
//                                                }
                                    
                                    ?>
                                    </select>                                    
                                </td>-->
                                
                                  
                                
                                   
                                    <td contenteditable="false" onBlur="saveToDatabase(this,'clausula','<?php echo $filas["id_asignacion_documento_tema"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clausula"]; ?></td>
                                    <td contenteditable="false" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_asignacion_documento_tema"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion_clausula"]; ?></td>
                                    
                                    
                                    <td>
                                    <button type="button" id="btn_mostrar_requisitos" class="btn btn-secondary" data-toggle="modal">
                                    Ver Detalles
                                    <i class="ace-icon fa fa-book" style="color: #0099ff;font-size: 20px;"></i>
                                    </button>                                  
                                    </td>    
                  
<!--                                <td contenteditable="false" onBlur="saveToDatabase(this,'REQUISITO','<?php echo $filas["ID_ASIGNACION_DOCUMENTO_TEMA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["REQUISITO"]; ?></td>   -->
                                                                                                                                      
                                                    
			  </tr>
		<?php
		}
                
		?>
		  </tbody>
		</table>
			

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
                        
        </div>
        
        
        <!-- Inicio de Seccion Modal-Crear-->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Asignar Nuevo Documento-Tema</h4>
		      </div>

		      <div class="modal-body">

                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Clave del Documento:</label>
                                                        
                                                        <select   id="ID_DOCUMENTOMODAL" class="select1">
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
                                    
                                    
                                    
                                    
<!--                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        
                                                        <select   id="ID_ASIGNACION_TEMA_REQUISITO_MODAL" class="select2">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxATR as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php //echo "".$value["ID_ASIGNACION_TEMA_REQUISITO"] ?>"  ><?php echo "".$value["CLAUSULA"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>-->
                                    
                                    
                                    

                                                
                                    
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
        
       
       
        
       <!-- Inicio de Seccion Modal-Edit-->
       <div class="modal draggable fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
		<div class="modal-content">
		      
                    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Temas</h4>
		    </div>

                    
                    <div class="modal-body">
                          
                        <div class="row">                              
                            <div class="col-md-8">
                  <table class="tbl-qa">
		 
			  <tr>				
				<th class="table-header">CLAVE DEL TEMA</th>									
                                <th class="table-header">DESCRIPCION DEL TEMA</th>																		
				<!--<th class="table-header">REQUISITO</th>-->									
			  </tr>
		  
		  <tbody>
		 
                  <?php

                                                       

                  foreach ($ListaTemas as $filas) { 
		  ?>
			  <tr class="table-row">
				
                            
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clausula','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);">                            
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add-requirement"><?php echo $filas["clausula"]; ?></button>
                                    
                                </td>
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion_clausula"]; ?></td>                                                         
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'REQUISITO','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["REQUISITO"]; ?></td>-->                                                                                                                                     
                                                    
			  </tr>
		<?php
		}
                
		?>
                          
                          
                 
		  </tbody>
		</table>
                                      
            </div>      
                                                 
            
                            <div class="col-md-4">

                               <table class="tbl-qa">
		 
			  <tr>				
				<th class="table-header">REQUISITO</th>																		
			  </tr>
		  
		  <tbody>
                      
                <?php
                                                       
                                            foreach ($ListaReqisitos as $value) { 
   
    
                                            if($value["ID_CLAUSULA"]=="".$filas["ID_CLAUSULA"]){
        
                                         ?>  
                      
                                <tr class="table-row">  
                                    <td>
					<form action="" class="mt-3">
                                            

						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="" id="checkboxPersonalizado1" class="custom-control-input">
							<label for="checkboxPersonalizado1" class="custom-control-label"><?php echo $value["REQUISITO"]; ?></label>
						</div>

					</form>
                                    </td>    
                               </tr>            
                                    
                                        <?php
                                            } else {
                                        ?>        
                                <tr class="table-row">  
                                    <td>
                                            <?php echo "No hay requisitos";?>
                                    </td>        
                                </tr>
      
                                      <?php
    
                                            }
  
                                        }
    
                                        ?>      

              
		  </tbody>
		</table>                     
                                                                                                      
                                  
            </div>                                                               
                        </div>
                              

                            <div class="form-group">
                                <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
                            </div>
                                
                           
                          
		    </div>
                        
		</div>

            </div>
       </div>
       <!--Final de Seccion Modal-Edit-->
        

          
       
       
       <!-- Inicio de Seccion Modal-Edit-->
       <div class="modal draggable fade" id="add-requirement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      
                      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar Requisitos</h4>
		      </div>
                        
                        
<header class="header">
  	
</header>
<section class="content">
  
    
    <?php
                                                       
    foreach ($ListaReqisitos as $value) { 
   
    
    if($value["ID_CLAUSULA"]=="".$filas["ID_CLAUSULA"]){
        
     ?>    
         
    <ul class="list">
      
        <li class="list__item">
            <label class="label--checkbox">
                <input type="checkbox" class="checkbox" checked>
                <?php echo $value["REQUISITO"]; ?>
            </label>
        </li>
    </ul>
    
    <?php
    } else {
        
    echo "No hay requisitos";
      
      ?>   
       
      
    
    <?php
    
    }
  
    }
    
    ?>
    
  
  
</section>
                            
                        


                                                                                                                                                           
                            <div class="form-group">
                                <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
                            </div>
                          

		      </div>
                        
		    </div>

		  </div>
	</div>
       <!--Final de Seccion Modal-Edit-->
       
       
       

        <script>
                    
                var id_asignacion_documento_tema;
                var cualmodificar;
         
                
                      $(function(){
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                        
                        if(cualmodificar == "ID_DOCUMENTO"){
                            column="ID_DOCUMENTO";
                        } else {
                            column="ID_ASIGNACION_TEMA_REQUISITO";
                        }     
                          
                          val=$(this).prop('value');
                          alert("el value que va a viajar es "+val+" y el id de la clausula : "+id_asignacion_documento_tema);
                          $.ajax({
                                url: "../Controller/AsignacionDocumentosTemasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_asignacion_documento_tema,
				success: function(data){
                                        consultarInformacion("../Controller/AsignacionDocumentosTemasController.php?Op=Listar");
                                        consultarInformacion("../Controller/AsignacionDocumentosTemasController.php?Op=Listar");
                                        window.location.href="AsignacionDocumentosTemasView.php";
				
				}   
                           });
                          
                          
                        });
                        
                        
                        $("#btn_lista_documentos").click(function(){
                        loadVista(true);
                        });
                 
                 
                        $("#btn_lista_temas").click(function(){
                        loadVistaTemas(true);
                         });
                         
                         
                        $("#btn_mostrar_requisitos").click(function(){
                        loadVistaRequisitos(true);
                         }); 
                 
                 
//                        $("#create-item-documentos").draggable({
//                             handle: ".modal-header"
//                        });
                        
                        
                        
                        $("#btn_guardar").click(function(){
                                  //alert("entro aqui");
                                  
        
                                    var ID_DOCUMENTOMODAL=$("#ID_DOCUMENTOMODAL").val();
                                    var ID_ASIGNACION_TEMA_REQUISITO_MODAL=$("#ID_ASIGNACION_TEMA_REQUISITO_MODAL").val();

                                    alert("ID_DOCUMENTOMODAL :"+ID_DOCUMENTOMODAL+ "ID_ASIGNACION_TEMA_REQUISITO_MODAL :"+ID_ASIGNACION_TEMA_REQUISITO_MODAL );
                                  
                                    

                                    datos=[];
                                    datos.push(ID_DOCUMENTOMODAL);
                                    datos.push(ID_ASIGNACION_TEMA_REQUISITO_MODAL);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
                        
                        $("#btn_limpiar").click(function(){
                            
                           alert("entro aqui");
                            
                                  $("#ID_DOCUMENTOMODAL").val("");
                                  $("#ID_ASIGNACION_TEMA_REQUISITO_MODAL").val("");
                                                                      
                        });
                        
 
  
  
                      });   //CIERRE FUNCTION
                                            
                                            
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/AsignacionDocumentosTemasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){
                    alert("esta es la columna" + column);
                        id_asignacion_documento_tema=id;
                        cualmodificar=column;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/AsignacionDocumentosTemasController.php?Op=Guardar",
				type: "POST",
				data:'ID_DOCUMENTO='+datos[0]+'&ID_ASIGNACION_TEMA_REQUISITO='+datos[1],
                                
				success: function(data){
                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
         
        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/AsignacionDocumentosTemasController.php?Op=Listar");
                                         consultarInformacion("../Controller/AsignacionDocumentosTemasController.php?Op=Listar");
                                        window.location.href("AsignacionDocumentosTemasView.php");
				}   
        		});
//                                         window.location.href("EmpleadosView.php");
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
                
                
                
                
            var myCombo;
                
                
                
           function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
            function loadVista(bclose){
                    var dhxWins = new dhtmlXWindows();
                    dhxWins.attachViewportTo("winVP");
        //var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
                    var layoutWin=dhxWins.createWindow({id:"documentos", text:"OMG VISUALIZACION DOCUMENTOS", left: 20, top: -30,width:330,  height:250,  center:true,resize: true,park:true,modal:true	});
                    layoutWin.attachURL("DocumentosModalView.php");
            } 
            
            
            function loadVistaTemas(bclose){
                    var dhxWins = new dhtmlXWindows();
                    dhxWins.attachViewportTo("winVP");
        //var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
                    var layoutWin=dhxWins.createWindow({id:"temas", text:"OMG VISUALIZACION TEMAS", left: 20, top: -30,width:530,  height:250,  center:true,resize: true,park:true,modal:true	});
//                    layoutWin.attachURL("TemasModalView.php");
                    layoutWin.attachURL("ChartView.php");

            }
            
            
            function loadVistaRequisitos(bclose){
                    var dhxWins = new dhtmlXWindows();
                    dhxWins.attachViewportTo("winVP");
        //var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
                    var layoutWin=dhxWins.createWindow({id:"requisitos", text:"OMG VISUALIZACION REQUISITOS", left: 20, top: -30,width:530,  height:250,  center:true,resize: true,park:true,modal:true	});
                    layoutWin.attachURL("RequisitosPorTemaView.php");
            }
               
               
               
                
        </script>
                                        
                
                
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                     
                     
                <!--en esta seccion es para poder abrir el modal--> 
                <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
                <!--aqui termina la seccion para poder abrir el modal--> 
                
                <script src="../../codebase/dhtmlx.js"></script>
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
               
<!--                Modal requisitos
                <script src="../../js/indexcheckbox.js" type="text/javascript"></script>-->
                
              
                
                
<!--                <script type="text/javascript">
                
                function Mostrar(){
		document.getElementById("caja-requisito");
                }
                
                
                </script>-->
                
                
                
                
	</body>
        
        
        
</html>


