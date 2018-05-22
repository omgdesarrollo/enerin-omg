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
                
                
                <script src="../../js/jquery.js" type="text/javascript"></script>

		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
                
                 <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                     
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
<button onclick="loadAutocomplete();" type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
		Agregar Documento de Salida
</button>
    
<button type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
    
    <input type="text" id="idInputFolioSalida" onkeyup="filterTableFolioSalida()" placeholder="Buscar Por Folio de Salida" style="width: 190px;">
    <input type="text" id="idInputResponsableTema" onkeyup="filterTableResponsableTema()" placeholder="Buscar Por Responsable del Tema" style="width: 240px;">
    <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Buscar Por Asunto" style="width: 140px;">
    <input type="text" id="idInputRemitente" onkeyup="filterTableRemitente()" placeholder="Buscar Por Remitente" style="width: 160px;">
    <input type="text" id="idInputAutoridadRemitente" onkeyup="filterTableAutoridadRemitente()" placeholder="Buscar Por Autoridad Remitente" style="width: 230px;">    
</div>    



<div style="height: 80px"></div>


<!--<div class="contenedortable" style="position: fixed;">   
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Folio de Salida" style="width: 200px;">
</div >


<div style="height: 55px"></div>-->

                   
<div class="table-fixed-header" style="display:none;" id="myDiv" class="animate-bottom"> 
    <div class="table-container">
        
        <table id="idTable" class="tbl-qa">
			  <tr>
				
                                <th class="table-header">Folio de Entrada</th>
                                <th class="table-header">Folio de Salida</th>
                                <th class="table-header">Responsable del Tema</th>
                                <th class="table-header">Fecha de Envio</th>
                                <th class="table-header">Asunto</th>
                                <th class="table-header">Remitente</th>
                                <th class="table-header">Autoridad Remitente</th>                                
                                <th class="table-header">Documento</th>
                                <th class="table-header">Observaciones</th>              
                               
                                
			  </tr>
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
			  <tr class="table-row">

                                <!--<td><?php //echo $numeracion++;   ?></td -->
                                
                                <td> 
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
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'folio_salida','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["folio_salida"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'nombre_empleado','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["nombre_empleado"]." ".$filas["apellido_paterno"]." ".$filas["apellido_materno"]; ?></td>    
                                <td contenteditable="true" onBlur="saveToDatabase(this,'fecha_envio','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_envio"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'asunto','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["asunto"]; ?></td>
                                
                                
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
                                
                                
                                <td contenteditable="true" onBlur="saveToDatabase(this,'destinatario','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["destinatario"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'clave_entidad','<?php echo $filas["id_documento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clave_entidad"]; ?></td>                              
                                <td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["documento"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'observaciones','<?php echo $filas["id_documento_salida"]; ?>')" onClick="showEdit(this);"><?php echo $filas["observaciones"]; ?></td>
                                
                                
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
             
             
             
             
<!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Documento:</label>
                                                        <textarea  id="DOCUMENTO" class="form-control" data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                                                                                              
                                                                                      
                                                <div class="form-group">
							<label class="control-label" for="title">Observaciones:</label>
                                                        <textarea  id="OBSERVACIONES" class="form-control" data-error="Ingrese las Observaciones" required></textarea>
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
                    
                var id_documento_salida;
                //var cualmodificar;
                
                      $(function(){
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
                          alert("el value que va a viajar es "+val+" y el id de la clausula : "+id_documento_salida);
                          $.ajax({
                                url: "../Controller/DocumentosSalidaController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_documento_salida,
				success: function(data){
//                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
					//$(editableObj).css("background","#FDFDFD");
                                        consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
                                        consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
                                        window.location.href="DocumentoSalidaView.php";
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
		
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/DocumentosSalidaController.php?Op=Modificar",
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
                        id_documento_salida=id;
                        cualmodificar=column;
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
            
    
                
                
                function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/DocumentosSalidaController.php?Op=Guardar",
				type: "POST",
				data:'ID_DOCUMENTO_ENTRADA='+datos[0]+'&FOLIO_SALIDA='+datos[1]+'&FECHA_ENVIO='+datos[2]+'&ASUNTO='+datos[3]
                                    +'&DESTINATARIO='+datos[4]+'&DOCUMENTO='+datos[5]+'&OBSERVACIONES='+datos[6],
                            
                            
				success: function(data){
//                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
//                                        window.location.href("EmpleadosView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
                
                function refresh(){
                    
                  window.location.href="DocumentoSalidaView.php";  
                }
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
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
                
                
                
                function filterTableFolioSalida() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputFolioSalida");
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
                
                
                function filterTableResponsableTema() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsableTema");
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
                
                
                function filterTableAsunto() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputAsunto");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[4];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
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
                
                
                
                <!--Aqui abre para la ventana de guardado ok-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <!--Aqui cierra para la ventana de guardado ok-->

                
                <!--Aqui abre el modal de insertar-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Aqui cierra para abrir el modal de insertar-->
                
                
                
                
	</body>
        
        
        
</html>


