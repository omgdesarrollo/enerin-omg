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
                
                
                <script src="../../js/jquery.js" type="text/javascript"></script>

		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                <link href="style.css" rel="stylesheet" type="text/css"/>
                
                <!--Modal requisitos-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
                <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css'>

                <!--Modal requisitos2-->
                <link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
                
                
                /*Estilos checkbox*/
                
/*                 body {
  font-size: 16px;
}*/

.header {
  height: 8rem;
  background: #009688;
}

.content {
  width: 20rem;
  margin: -4rem auto 0 auto;
  padding: 1rem;
  background: #fff;
  border-radius: 0.125rem;
  box-shadow: 0 0.125rem 0.3125rem 0 rgba(0, 0, 0, 0.25);
}

.list {
  margin: .5rem;
}

.list__item {
  margin: 0 0 .5rem 0;
  padding: 0;
}

.label--checkbox {
  position: relative;
  margin: .5rem;
  font-family: Arial, sans-serif;
  line-height: 135%;
  cursor: pointer;
}

.checkbox {
  position: relative;
  top: -0.375rem;
  margin: 0 1rem 0 0;
  cursor: pointer;
}
.checkbox:before {
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  content: "";
  position: absolute;
  left: 0;
  z-index: 1;
  width: 1rem;
  height: 1rem;
  border: 2px solid #f2f2f2;
}
.checkbox:checked:before {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  height: .5rem;
  border-color: #009688;
  border-top-style: none;
  border-right-style: none;
}
.checkbox:after {
  content: "";
  position: absolute;
  top: -0.125rem;
  left: 0;
  width: 1.1rem;
  height: 1.1rem;
  background: #fff;
  cursor: pointer;
}

.button--round {
  -webkit-transition: 0.3s background ease-in-out;
  -moz-transition: 0.3s background ease-in-out;
  transition: 0.3s background ease-in-out;
  width: 2rem;
  height: 2rem;
  background: #5677fc;
  border-radius: 50%;
  box-shadow: 0 0.125rem 0.3125rem 0 rgba(0, 0, 0, 0.25);
  color: #fff;
  text-decoration: none;
  text-align: center;
}
.button--round i {
  font-size: 1rem;
  line-height: 220%;
  vertical-align: middle;
}
.button--round:hover {
  background: #3b50ce;
}

.button--sticky {
  position: fixed;
  right: 2rem;
  top: 16rem;
}

.content {
  -webkit-animation-duration: 0.4s;
  animation-duration: 0.4s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation-name: slideUp;
  animation-name: slideUp;
  -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

@-webkit-keyframes slideUp {
  0% {
    -webkit-transform: translateY(6.25rem);
    transform: translateY(6.25rem);
  }
  100% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
@keyframes slideUp {
  0% {
    -webkit-transform: translateY(6.25rem);
    transform: translateY(6.25rem);
  }
  100% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
                
                
                </style>
                
            <script>
            
            var myCombo;
                
                
                
           function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
            function loadVista(bclose){
//                consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
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
                    layoutWin.attachURL("TemasModalView.php");
            } 
                
//        function cargarComboEmpleados(){
////            alert("ya cargo");
//             $.ajax({
//                                url: "../Controller/EmpleadosController.php?Op=mostrarcombo",
////                                        url: "192.168.1.75/OMG-STANDAR/OMG/Controller/ClausulasController.php?Op=mostrarcombo",
//				type: "POST",
//				data:'Combo=true',
//                                async:false,
//				success: function(data){
//                                    
//                                    $.each(data,function(i,value){
////                                        alert("el nombre es "+ value.NOMBRE_EMPLEADO);
//                                        
//myCombo.addOption([
// {value:""+value.ID_EMPLEADO, text:""+value.NOMBRE_EMPLEADO}
//]);
//      
//                                        
//                                    });
//                                    myCombo.setChecked("1", true);
//                                                                        
//
////					$(editableObj).css("background","#FDFDFD");
//				}   
//		   });
//        }
        
            </script>

                
	</head>

        <body class="no-skin" onload="loadSpinner()">
	<div id="loader"></div>
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
					<a  class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							OMG APPS
						</small>
					</a>
		</div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav" style="height: 10%">
                    <!--seccion de inicio de sesion de alarmas--> 
                        <li class="purple dropdown-modal">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
					<span class="badge badge-important">0</span>
				</a>

				<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
					<li class="dropdown-header">
					     <i class="ace-icon fa fa-exclamation-triangle"></i>
						1 NOTIFICACIONES
					</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar navbar-pink">
								<li>
									<a href="#">
									     <div class="clearfix">
										<span class="pull-left">
										    <i class="btn btn-xs no-hover btn-pink fa fa-user"></i>
											Urgentes
										</span>
										<span class="pull-right badge badge-info">+1</span>
									      </div>
									</a>
								</li>

										
							</ul>
						</li>

						<li class="dropdown-footer">
									<a href="#">
										<!--VER MAS NOTIFICACIONES-->
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
						</li>
				</ul>
			</li>
                        <!--seccion de cierre  alarmas-->
                        
                        <!--inicio de seccion de mensajes-->
                        
                        <li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">0</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									Cantidad de Mensajes
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
									


										<li>
											<a href="#" class="clearfix">
												<img src="../../assets/probando/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">aqui va el usuario remitente:</span>
														aqui va el mensaje
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>aqui va la fecha en que lo envio </span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										<!--ver todos los mensajes-->
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
                        
                        <!--cierre de seccion de mensajes-->
                        
                        
                        
                        <!--seccion de info usuario-->
                            <li class="light-blue dropdown-modal">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="../../assets/probando/images/avatars/avatar.png" alt="<?php echo $Usuario["NOMBRE_USUARIO"]; ?>" />
					<span class="user-info">
						<small>Bienvenido,</small>
						<?php echo $Usuario["NOMBRE_USUARIO"]; ?>
					</span>

<!--								<i class="ace-icon fa fa-caret-down"></i>-->
				</a>

					
			    </li>
                        <!--fin de seccion de info usuario-->
                        
                        
                        
                        
                        
                    </ul>
                    
                    
                </div>
                
            </div>
        </div>
        
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
                                    <select id="id_documento" class="select" onchange="saveComboToDatabase('ID_DOCUMENTO', <?php echo $filas["ID_ASIGNACION_DOCUMENTO_TEMA"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxDoc as $value) {
                                                    
                                                    if($value["ID_DOCUMENTO"]=="".$filas["ID_DOCUMENTO"]){
//                                                        $s="selected";
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["ID_DOCUMENTO"] ?>"  selected ><?php echo "".$value["CLAVE_DOCUMENTO"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        
                                                        else{
                                                            ?>
                                                        <!--}-->
                                                             <option value="<?php echo "".$value["ID_DOCUMENTO"] ?>"  ><?php echo "".$value["CLAVE_DOCUMENTO"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>
                                   <!--<div id="combo_zone" style="width:230px;"></div>-->
                                    
                                </td>

                                <td contenteditable="false" onBlur="saveToDatabase(this,'DOCUMENTO','<?php echo $filas["ID_ASIGNACION_DOCUMENTO_TEMA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DOCUMENTO"]; ?></td>

                                
                                
                                
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
                                
                                  
                                
                                   
                                    <td contenteditable="false" onBlur="saveToDatabase(this,'CLAUSULA','<?php echo $filas["ID_ASIGNACION_DOCUMENTO_TEMA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["CLAUSULA"]; ?></td>
                                    <td contenteditable="false" onBlur="saveToDatabase(this,'DESCRIPCION_CLAUSULA','<?php echo $filas["ID_ASIGNACION_DOCUMENTO_TEMA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DESCRIPCION_CLAUSULA"]; ?></td>
                                    
                                    
                                    <td>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-item">
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
                                                                
                                                                <option value="<?php echo "".$value["ID_DOCUMENTO"] ?>"  ><?php echo "".$value["CLAVE_DOCUMENTO"]; ?></option>
                                                                
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
       <div class="modal draggable fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      
                      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Temas</h4>
		      </div>

		      <div class="modal-body">
		  
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
				
                            
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'CLAUSULA','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);">                            
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add-requirement"><?php echo $filas["CLAUSULA"]; ?></button>                                                              
                                </td>
                                
                                <td contenteditable="false" onBlur="saveToDatabase(this,'DESCRIPCION_CLAUSULA','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["DESCRIPCION_CLAUSULA"]; ?></td>                                                         
                                <!--<td contenteditable="false" onBlur="saveToDatabase(this,'REQUISITO','<?php echo $filas["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php echo $filas["REQUISITO"]; ?></td>-->                                                                                                                                     
                                                    
			  </tr>
		<?php
		}
                
		?>
		  </tbody>
		</table>

                                                                                                                                                           
<!--						<div class="form-group">
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>-->
                          

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
                        
                
                <div class="container">
			
			<div class="row">
				
				<div class="col">
                                    
					<?php
                                                       
                                            foreach ($ListaReqisitos as $value) { 
   
    
                                            if($value["ID_CLAUSULA"]=="".$filas["ID_CLAUSULA"]){
        
                                         ?>  
					<form action="" class="mt-3">
                                            

						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="" id="checkboxPersonalizado1" class="custom-control-input">
							<label for="checkboxPersonalizado1" class="custom-control-label"><?php echo $value["REQUISITO"]; ?></label>
						</div>

					</form>
                                    
                                        <?php
                                            } else {
        
                                            echo "No hay requisitos";
      
                                            ?>   
       
      
    
                                         <?php
    
                                            }
  
                                        }
    
                                        ?>
                                 
				</div>				
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
                    layoutWin.attachURL("TemasModalView.php");
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
                <!--Modal requisitos-->
                <script src="../../js/indexcheckbox.js" type="text/javascript"></script>
                
                <!--Modal requisitos-->
                <!--<script src="../../js/bootstrap.min.js" type="text/javascript"></script>-->
<!--                <script src="../../js/jquery-3.3.1.min.js" type="text/javascript"></script>
                <script src="../../js/popper.min.js" type="text/javascript"></script>-->

	</body>
        
        
</html>


