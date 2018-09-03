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
                <!--Para abrir alertas de aviso, success,warning, error-->       
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
                <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
		                                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <!-- cargar archivo -->
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
                <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
                <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
                
                
                
    <style>
         .jsgrid-header-row>.jsgrid-header-cell {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
            }
            .modal-body{color:#888;max-height: calc(100vh - 110px);overflow-y: auto;}                    
            .modal-lg{width: 100%;}
            .modal {/*En caso de que quieras modificar el modal*/z-index: 1050 !important;}
            body{overflow:hidden;}
                    
                    
  </style>
                
                    
	</head>

        <body class="no-skin" onload="loadSpinner()">
             <div id="loader"></div>
       
<?php

require_once 'EncabezadoUsuarioView.php';

?>
             
 
<div style="height: 5px"></div>

             
<div style="position: fixed;">                          
<button onclick="loadAutocomplete();" type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
		Agregar Documento de Salida
</button>
    
<button id="btnAgregarDocumentoSalidaRefrescar" type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
    
    <input type="text" id="idInputFolioSalida" onkeyup="filterTableFolioSalida()" placeholder="Folio de Salida" style="width: 120px;">
    <input type="text" id="idInputResponsableTema" onkeyup="filterTableResponsableTema()" placeholder="Responsable del Tema" style="width: 160px;">
    <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Asunto" style="width: 120px;">
    <input type="text" id="idInputRemitente" onkeyup="filterTableRemitente()" placeholder="Remitente" style="width: 120px;">
    <input type="text" id="idInputAutoridadRemitente" onkeyup="filterTableAutoridadRemitente()" placeholder="Autoridad Remitente" style="width: 150px;">
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>    
</div>    



<div style="height: 50px"></div>


<!--<div class="contenedortable" style="position: fixed;">   
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Folio de Salida" style="width: 200px;">
</div >


<div style="height: 55px"></div>-->

                   
<!--<div class="table-fixed-header" style="display:block;" id="myDiv" class="animate-bottom">--> 
    <div class="jsgrid" id="jsGrid" style="position: relative; height: 300px; width: 100%;">
        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
        <table  class="jsgrid-table">
            <tbody>
                <tr class="jsgrid-header-row">
				
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 170px;">Folio de Entrada</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Folio de Salida</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Responsable del Tema</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Fecha de Envio</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Asunto</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Remitente</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Autoridad Remitente</th>                                
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Archivo Adjunto</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Observaciones</th>              
                               
                                
			  </tr>
            </tbody>
        </table>
        </div>
                         <div class="jsgrid-grid-body" style="height: 172px;"><table class="jsgrid-table">
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                    $Lista = Session::getSesion("listarDocumentosSalida");
//                   $Lista = PaginacionController::show_rows("ID_ASIGNACION_TEMA_REQUISITO");
                    $cbxDE= Session::getSesion("listarDocumentosEntradaComboBox");
                    //$cbxEnt= Session::getSesion("listarEntidadesReguladorasComboBox");
                    //$cbxClau= Session::getSesion("listarClausulasComboBox");
//                  
//                  $datostema
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="jsgrid-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                                
                              <td class="jsgrid-cell" style="width: 170px;"> 
                                    <select id="id_documento_entrada" class="select" onchange="saveComboToDatabase('id_documento_entrada', <?php echo $filas["id_documento_salida"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxDE as $value) {
                                                    if($value["id_documento_entrada"]=="".$filas["id_documento_entrada"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_documento_entrada"] ?>"  selected ><?php echo "".$value["folio_entrada"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_documento_entrada"] ?>"  ><?php echo "".$value["folio_entrada"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>
                                
                                <td class="jsgrid-cell" style="width: 100px;" contenteditable="true" onBlur="saveToDatabase(this,'folio_salida','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_salida"]; ?></td>
                                <td class="jsgrid-cell" style="width: 100px;" style="background-color: #ccccff" contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado"]." ".$filas["apellido_paterno"]." ".$filas["apellido_materno"]; ?></td>    
                                <td class="jsgrid-cell" style="width: 100px;" contenteditable="true" onBlur="saveToDatabase(this,'fecha_envio','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_envio"]; ?></td>
                                <td class="jsgrid-cell" style="width: 100px;" contenteditable="true" onBlur="saveToDatabase(this,'asunto','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["asunto"]; ?></td>
                                
                                
<!--                                <td> 
                                    <select id="id_entidad" class="select" onchange="saveComboToDatabase('ID_ENTIDAD', <?php echo $filas["id_documento_salida"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxEnt as $value) {
                                                    if($value["id_entidad"]=="".$filas["id_entidad"]){
                                                    
                                                    ?>
                                    
                                        <option value="<?php echo "".$value["id_entidad"] ?>"  selected ><?php echo "".$value["clave_entidad"]; ?></option>
                                        
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        }
                                                             <option value="<?php echo "".$value["id_entidad"] ?>"  ><?php echo "".$value["clave_entidad"]; ?></option>
                                                             <?php
                                                        }
                                                }
                                    
                                    ?>
                                    </select>                                                                     
                                </td>-->

                                
<!--                                <td> 
                                    <select id="id_clausula" class="select" onchange="saveComboToDatabase('ID_CLAUSULA', <?php echo $filas["id_documento_entrada"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxClau as $value) {
                                                    if($value["id_clausula"]=="".$filas["id_clausula"]){
                                                    
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
                                </td>-->
                                
                                
                                <td class="jsgrid-cell" style="width: 100px;" contenteditable="true" onBlur="saveToDatabase(this,'destinatario','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["destinatario"]; ?></td>
                                <td class="jsgrid-cell" style="width: 100px;" contenteditable="false" onBlur="saveToDatabase(this,'clave_entidad','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_entidad"]; ?></td>                              
                                
                                <td class="jsgrid-cell" style="width: 100px;">
                                  <button onClick="mostrar_urls(<?php echo $filas['id_documento_salida'] ?>);" type="button" 
                                  class="btn btn-info" data-toggle="modal" data-target="#create-itemUrls">
                                      <i class='fa fa-cloud-upload' style='font-size: 20px'></i>  
                                      Mostrar
                                  </button>
                                </td>
                                
                                <td class="jsgrid-cell" style="width: 100px;" contenteditable="true" onBlur="saveToDatabase(this,'observaciones','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observaciones"]; ?></td>
                                
                                
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
	
<!--</div>-->
             
             
             
             
<!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:inherit" aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nueva Salida</h4>
		      </div>

		      <div class="modal-body">

                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Folio de Entrada:</label>
                                                        
                                                        <select   id="ID_DOCUMENTO_ENTRADA_MODAL" class="select1" onchange="loadAutocomplete()">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxDE as $value) {
                                                                ?>
                             
                                                                <option value="<?php echo "".$value["id_documento_entrada"] ?>"  ><?php echo "".$value["folio_entrada"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
                                                        <div id="sugerenciasdocumentosalida"></div>
						</div>
                          
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Folio de Salida:</label>
                                                        <input type="text"  id="FOLIO_SALIDA" class="form-control" data-error="Ingrese el Folio de Salida" required />
							<div class="help-block with-errors"></div>
						</div>
                          
                          
                                                <div class="form-group-">
							<label class="control-label" for="title">Fecha de Envio:</label>                                                       
                                                        <input type="date" id="FECHA_ENVIO" class="form-control" data-error="Ingrese la Fecha de Envio" required/>							   
                                                        <div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group-">
							<label class="control-label" for="title">Asunto:</label>                                                       
                                                        <textarea  id="ASUNTO" class="form-control" data-error="Ingrese el Asunto" required></textarea>
                                                        <div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Remitente:</label>
                                                        <textarea  id="DESTINATARIO" class="form-control" data-error="Ingrese al Destinatario" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
<!--                                                <div class="form-group">
							<label class="control-label" for="title">Documento:</label>
                                                        <textarea  id="DOCUMENTO" class="form-control" data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>-->
                                                                                                                              
                                                                                      
                                                <div class="form-group">
							<label class="control-label" for="title">Observaciones:</label>
                                                        <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese las Observaciones" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                                                       
                                    
						<div class="form-group">
                                                    <button type="submit" style="width:49%" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" style="width:49%" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>

		      		<!--</form>-->

		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal-->
       
       
<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
      <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Archivos Adjuntos</h4>
      </div>

      <div class="modal-body">
        <div id="DocumentolistadoUrl"></div>
        
        <div class="form-group">
          <div id="DocumentolistadoUrlModal"></div>
			  </div>

        <div class="form-group" method="post" >
          <button type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Adjuntar Archivo</button>
        </div>
      </div><!-- cierre div class-body -->
    </div><!-- cierre div class modal-content -->
  </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->       
	
                
                
                
                
		<script>
                    
                var id_documento_salida;
                //var cualmodificar;
                
                      $(function(){
                          //inicio detecta evento moda de cierre
//                          $("#create-item").on("hidden.bs.modal", function () {
//    // put your default event here
//    alert("cerro");
//});
//cierre detecto evento cierre modal 
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          

                        //if (cualmodificar == "ID_DOCUMENTO_ENTRADA") {
    
                         column="ID_DOCUMENTO_ENTRADA";    
                                                
                        //} else {
                          
                          //column="ID_ENTIDAD";                          
                          
                        //} 
                        


//                        else {
//                            
//                          column="ID_CLAUSULA";  
//                            
//                        }
                        
                        
                          
                          val=$(this).prop('value');
//                          alert("el value que va a viajar es "+val+" y el id de la clausula : "+id_documento_salida);
                          $.ajax({
                                url: "../Controller/DocumentosSalidaController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_documento_salida,
				success: function(data){
//                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
					//$(editableObj).css("background","#FDFDFD");
//                                        consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
//                                        consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
//                                        window.location.href="DocumentoSalidaView.php";
				}   
                           });
                          
                          
                        });
                        
                        
                        
                        
                        $('#ID_DOCUMENTO_ENTRADA_MODAL').keyup(function(){
                            
                       var valuedocumentosalida = $(this).val();   
                       if(valuedocumentosalida!=""){
                           var dataString = valuedocumentosalida;
                            loadAutocomplete(dataString);
                            
                            
                       }
                         
                           });
  
                        
                        $("#btn_guardar").click(function(){
                                  //alert("entro");
       
        
                                    var ID_DOCUMENTO_ENTRADA_MODAL=$("#ID_DOCUMENTO_ENTRADA_MODAL").val();
                                    
                                    //if(FOLIO_SALIDA === '') {
                                        //alert("Ingrese el Folio de Salida");

                                    //} else {
                                        
                                    var FOLIO_SALIDA=$("#FOLIO_SALIDA").val();
                                            
                                    //}
                                        
                                    
                                    var FECHA_ENVIO=$("#FECHA_ENVIO").val();
                                    var ASUNTO=$("#ASUNTO").val();
                                    var DESTINATARIO=$("#DESTINATARIO").val();
                                    var DOCUMENTO=$("#DOCUMENTO").val();
                                    var OBSERVACIONES=$("#OBSERVACIONES").val();
                                    
                                                                      
                                  
//                                  alert("ID_DOCUMENTO_ENTRADA_MODAL :"+ID_DOCUMENTO_ENTRADA_MODAL+"FOLIO_SALIDA :"+FOLIO_SALIDA
//                                          +"FECHA_ENVIO :"+FECHA_ENVIO+"ASUNTO :"+ASUNTO+"DESTINATARIO :"+DESTINATARIO
//                                          +"DOCUMENTO :"+DOCUMENTO+"OBSERVACIONES :"+OBSERVACIONES);
                                    

                                    datos=[];
                                    datos.push(ID_DOCUMENTO_ENTRADA_MODAL);
                                    datos.push(FOLIO_SALIDA);
                                    datos.push(FECHA_ENVIO);
                                    datos.push(ASUNTO);
                                    datos.push(DESTINATARIO);
                                    datos.push(DOCUMENTO);
                                    datos.push(OBSERVACIONES);                                   
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
  
  
  
                        $("#btn_limpiar").click(function(){
                            
                                  //$("#ID_DOCUMENTO_ENTRADA_MODAL").val("");
                                  $("#FOLIO_SALIDA").val("");
                                  $("#FECHA_ENVIO").val("");
                                  $("#ASUNTO").val("");
                                  $("#DESTINATARIO").val("");
                                  $("#DOCUMENTO").val("");
                                  $("#OBSERVACIONES").val("");
                                  
                                                                                                      
                        });
  
  
  
                      });//Se cierra el function
                      
                      
                                                                      
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
  function saveToDatabase(editableObj,column,id)
  {
                    //alert("entraste aqui ");
    $(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
    $.ajax({
            url: "../Controller/DocumentosSalidaController.php?Op=Modificar",
				    type: "POST",
				    data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				    success: function(data)
            {
					      $(editableObj).css("background","#FDFDFD");
				    }
		      });
  }
                
                
  function saveComboToDatabase(column,id)
  {
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
    id_documento_salida=id;
    cualmodificar=column;
  }
              
               
 
                
  function saveToDatabaseDatosFormulario(datos)
  {
//                    alert("datos nombre "+datos[0]);          
    $.ajax({
            url: "../Controller/DocumentosSalidaController.php?Op=Guardar",
            type: "POST",
            data:'ID_DOCUMENTO_ENTRADA='+datos[0]+'&FOLIO_SALIDA='+datos[1]+'&FECHA_ENVIO='+datos[2]+
            '&ASUNTO='+datos[3]+'&DESTINATARIO='+datos[4]+'&DOCUMENTO='+datos[5]+'&OBSERVACIONES='+datos[6],
            success: function(data)
            {
//                                    alert("se guardo");                    
//					$(editableObj).css("background","#FDFDFD");
                swal("Guardado Exitoso!", "Ok!", "success")
                consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
//                                        window.location.href("EmpleadosView.php");
            }   
          });
//                   window.location.href("EmpleadosView.php");
  }
                
                
  function refresh()
  {
    consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
//    window.location.href="DocumentoSalidaView.php";
  }
                
  function loadSpinner()
  {
    myFunction();
  }
  
  
  
                
              
               
  function consultarInformacion(url)
  {
      $("#loader").show();
      $.ajax({  
            url: ""+url,
            success: function(r)
            {
                $("#idTable").load("DocumentosSalidaView.php #idTable");
                $("#loader").hide();

            },
            beforeSend:function(r)
            {

            },
            error:function(){
                $("#loader").hide();
            }
     });
  }
                
                
                
  function loadAutocomplete()
  {
      //Le pasamos el valor del input al ajax
    var ID_DOCUMENTO_ENTRADA_MODAL= $('#ID_DOCUMENTO_ENTRADA_MODAL').val();
    $.ajax({
            type: "GET",
            url: "../Controller/DocumentosSalidaController.php?Op=loadAutoComplete",
            data: "FOLIOENTRADA="+ID_DOCUMENTO_ENTRADA_MODAL,
            success: function(data)
            {
                          //Escribimos las sugerencias que nos manda la consulta
                      //var datos="<ul>";
//                                    var dato="";
              $.each(data, function (index,value)
              {
                      //        console.log("sub_clausula: " + value.sub_clausula);
                      //if(value.asunto!=""){
                      //         datos+="<li>"+value.sub_clausula+"</li><br>";
//                                        dato=value.remitente;
                $('#DESTINATARIO').val(value.remitente);
                            //}
              });
                      //    datos+="</ul>"
                      //    $('#sugerenciasclausulas').fadeIn(1000).html(datos);


                      //                                               
            }
          }); 
  }
  var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
      ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
      ModalCargaArchivo += "<div class='fileupload-buttons'>";
      ModalCargaArchivo += "<span class='fileinput-button'>";
      ModalCargaArchivo += "<span><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
      ModalCargaArchivo += "<input type='file' name='files[]' multiple></span>";
      ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
      ModalCargaArchivo += "<div class='fileupload-progress' >";
      // ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
      ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
      ModalCargaArchivo += "</div></div>";
      ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";

  $("#subirArchivos").click(function()
  {
    agregarArchivosUrl();
  });
  months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
  function mostrar_urls(id_documento_salida)
  {
      var tempDocumentolistadoUrl = "";
      URL = 'filesDocumento/Salida/'+id_documento_salida;
      $.ajax({
          url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
          type: 'GET',
          data: 'URL='+URL,
          success:function(creado)
          {
            if(creado)
            {
              $.ajax({
                      url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                      type: 'GET',
                      data: 'URL='+URL,
                      success: function(todo)
                      {
                        // console.log(todo[0].length);
                        if(todo[0].length!=0)
                        {
                          tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                          $.each(todo[0], function (index,value)
                          {
                            nametmp = value.split("^-O-^-M-^-G-^");
                            fecha = new Date(nametmp[0]*1000);
                            fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                            
                            tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                            tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a></td>";
                            tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                            tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                            tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
                          });
                          tempDocumentolistadoUrl += "</tbody></table>";
                        }
                        if(tempDocumentolistadoUrl == " ")
                        {
                            tempDocumentolistadoUrl = " No hay archivos agregados ";
                        }
                        tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumentoSalida' type='text' style='display:none;' value='"+id_documento_salida+"'>";
                        $('#DocumentoEntradaAgregarModal').html(" ");
                        $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                        $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                        $('#fileupload').fileupload
                        ({
                          url: '../View/',
                        });
                    }
                  });
            }
            else
            {
              swal("","Error del servidor","error");
            }
          }
        });
  }
  function agregarArchivosUrl()
    {
      var ID_DOCUMENTO_SALIDA = $('#tempInputIdDocumentoSalida').val();
      url = 'filesDocumento/Salida/'+ID_DOCUMENTO_SALIDA;
      $.ajax({
        url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
        type: 'GET',
        data: 'URL='+url,
        success:function(creado)
        {
          if(creado)
            $('.start').click();
        },
        error:function()
        {
          swal("","Error del servidor","error");
        }
      });
    }
    function borrarArchivo(url)
    {
      swal({
          title: "ELIMINAR",
          text: "Confirme para eliminar el documento",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        },function()
        {
          var ID_DOCUMENTO_SALIDA = $('#tempInputIdDocumentoSalida').val();
          $.ajax({
            url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
            type: 'POST',
            data: 'URL='+url,
            success: function(eliminado)
            {
              if(eliminado)
              {
                mostrar_urls(ID_DOCUMENTO_SALIDA);
                swal("","Archivo eliminado");
                setTimeout(function(){swal.close();},1000);
              }
              else
                swal("","Ocurrio un error al elimiar el documento", "error");
            },
            error:function()
            {
              swal("","Ocurrio un error al elimiar el documento", "error");
            }
          });
        });
    }
  function filterTableFolioSalida()
  {
                // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputFolioSalida");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++)
    {
      td = tr[i].getElementsByTagName("td")[1];
      if (td)
      {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
        {
          tr[i].style.display = "";
        }else{
            tr[i].style.display = "none";
        }
      } 
    }
  }
                
                
  function filterTableResponsableTema()
  {
  // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputResponsableTema");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");
      // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++)
    {
        td = tr[i].getElementsByTagName("td")[2];
        if (td)
        {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
          {
            tr[i].style.display = "";
          }else{
            tr[i].style.display = "none";
          }
        }
    }
  }

  function filterTableAsunto()
  {
  // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputAsunto");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++)
    {
      td = tr[i].getElementsByTagName("td")[4];
      if (td)
      {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
        {
          tr[i].style.display = "";
        }else{
          tr[i].style.display = "none";
        }
      }
    }
  }
  
  function filterTableRemitente() {
  // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("idInputRemitente");
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

  function filterTableAutoridadRemitente() {
  // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("idInputAutoridadRemitente");
      filter = input.value.toUpperCase();
      table = document.getElementById("idTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[6];
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
    <script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
      <tr class="template-upload" style="width:100%">
              <td>
              <span class="preview"></span>
              </td>
              <td>
              <p class="name">{%=file.name%}</p>
              <strong class="error"></strong>
              </td>
              <td>
              <p class="size">Processing...</p>
              <!-- <div class="progress"></div> -->
              </td>
              <td>
              {% if (!i && !o.options.autoUpload) { %}
                      <button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>
              {% } %}
              {% if (!i) { %}
                      <button class="cancel" style="padding: 0px 4px 0px 4px;color:white">Cancel</button>
              {% } %}
              </td>
      </tr>
      {% } %} 
</script>

<script id="template-download" type="text/x-tmpl">
{% var t = $('#fileupload').fileupload('active'); var i,file; %}
      {% for (i=0,file; file=o.files[i]; i++) { %}
      <tr class="template-download">
              <td>
              <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                      <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
              </span>
              </td>
              <td>
              <p class="name">
                      <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
              </p>
              </td>
              <td>
              <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <!-- <td> -->
              <!-- <button class="delete" style="padding: 0px 4px 0px 4px;" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button> -->
              <!-- <input type="checkbox" name="delete" value="1" class="toggle"> -->
              <!-- </td> -->
      </tr>
      {% } %}
      {% if(t == 1){ if( $('#tempInputIdDocumentoSalida').length > 0 ) { var ID_DOCUMENTO = $('#tempInputIdDocumentoSalida').val(); mostrar_urls(ID_DOCUMENTO);}else{ $('#btnAgregarDocumentoSalidaRefrescar').click(); } } %}
</script>
                

                <!--Inicia para el spiner cargando-->
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->    
        

                <!--Bootstrap-->
                <!--Aqui abre el modal de insertar-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Aqui cierra para abrir el modal de insertar-->
                <!--Aqui abre para la ventana de guardado ok-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <!--Aqui cierra para la ventana de guardado ok-->

                <!--Para abrir alertas del encabezado-->
                <script src="../../assets/probando/js/ace-elements.min.js"></script>
                <script src="../../assets/probando/js/ace.min.js"></script>
                <script src="../../assets/probando/js/ace-extra.min.js"></script>
              
                
                <!-- js cargar archivo -->
                <script src="../../assets/FileUpload/js/jquery.min.js"></script>
                <script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>
                <script src="../../assets/FileUpload/js/tmpl.min.js"></script>
                <script src="../../assets/FileUpload/js/load-image.all.min.js"></script>
                <script src="../../assets/FileUpload/js/canvas-to-blob.min.js"></script>
                <script src="../../assets/FileUpload/js/jquery.blueimp-gallery.min.js"></script>
                <script src="../../assets/FileUpload/js/jquery.iframe-transport.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-process.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-image.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-audio.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-video.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-validate.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-ui.js"></script>
                <script src="../../assets/FileUpload/js/jquery.fileupload-jquery-ui.js"></script>
                <script src="../../assets/FileUpload/js/main.js"></script>
                
                
                
	</body>
        
        
        
</html>

