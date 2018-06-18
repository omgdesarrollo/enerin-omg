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
                 <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
                <script src="../../js/jquery.js" type="text/javascript"></script>
		<script src="../../assets/probando/js/ace-extra.min.js"></script>

                     
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>

                
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
                
                   
                    
/*                .main-encabezado {
                        background: #333;
                        color: white;
                        height: 80px;

                        width: 100%;  hacemos que la cabecera ocupe el ancho completo de la página 
                        left: 0;  Posicionamos la cabecera al lado izquierdo 
                        top: 0;  Posicionamos la cabecera pegada arriba 
                        position: fixed;  Hacemos que la cabecera tenga una posición fija 
                    }    */
                    
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
<button type="button" class="btn btn-info " onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>

        <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Folio de Entrada" style="width: 140px;">
        <input type="text" id="idInputEntidad" onkeyup="filterTableEntidad()" placeholder="Autoridad Remitente" style="width: 140px;">
        <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Asunto" style="width: 120px;">
        <input type="text" id="idInputResponsable" onkeyup="filterTableResponsable()" placeholder="Responsable del Tema" style="width: 180px;">
        <input type="text" id="idInputStatus" onkeyup="filterTableStatus()" placeholder="Status" style="width: 120px;">    
        <input type="text" id="idInputResponsablePlan" onkeyup="filterTableResponsablePlan()" placeholder="Responsable Plan" style="width: 180px;">
        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>    


<div style="height: 47px"></div>


<!--<div class="contenedortable" style="position: fixed;">   
        <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Folio de Entrada" style="width: 200px;">
        <input type="text" id="idInputEntidad" onkeyup="filterTableEntidad()" placeholder="Buscar Por Entidad" style="width: 150px;">
        <input type="text" id="idInputAsunto" onkeyup="filterTableAsunto()" placeholder="Buscar Por Asunto" style="width: 140px;">
        <input type="text" id="idInputResponsable" onkeyup="filterTableResponsable()" placeholder="Buscar Por Responsable" style="width: 180px;">
        <input type="text" id="idInputStatus" onkeyup="filterTableStatus()" placeholder="Buscar Por Status" style="width: 130px;">
</div >


<div style="height: 55px"></div>-->
             

             
<div class="table-fixed-header"  id="" class="animate-bottom"> 
    <div class="table-container">
        
        <table class="tbl-qa" id="idTable">
		  <!--<thead>-->
			  <tr>
				
                                <th class="table-header">Folio de Entrada</th>
                                <th class="table-header">Autoridad Remitente</th>
                                <th class="table-header">Asunto</th>
                                <th class="table-header">Responsable del Tema</th>
                                <th class="table-header">Fecha Asignacion</th>
                                <th class="table-header">Fecha Limite</th>
                                <th class="table-header">Fecha Alarma</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Condicion</th>
                                <th class="table-header">Responsable del Plan</th>
                                <th class="table-header">Archivo Adjunto</th>
                                <th class="table-header">Registrar Programa</th>
                                <th class="table-header">Avance del Programa</th>
			  </tr>
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                      $Lista = Session::getSesion("listarSeguimientoEntradas");
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
                                <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_asignacion','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_asignacion"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_limite_atencion','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_limite_atencion"]; ?></td>
                                <td contenteditable="false" onBlur="saveToDatabase(this,'fecha_alarma','<?php echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php echo $filas["fecha_alarma"]; ?></td>
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
                                
                                <td>
                                        <button onClick="mostrar_urls(<?php echo $filas['id_documento_entrada'] ?>);" type="button" class="btn btn-info" data-toggle="modal" data-target="#create-itemUrls">
                                            <i class='fa fa-cloud-upload' style='font-size: 20px'></i>
                                            Mostrar
                                        </button>
                                        <!-- <?php echo $filas['id_documento_entrada']; ?> -->
                                </td>
                                
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php // echo $filas["id_seguimiento_entrada"]; ?>')" onClick="showEdit(this);"><?php // echo $filas["documento"]; ?></td>-->
                                <td ><button class="btn btn-success" onClick="cargadePrograma('<?php echo $filas["id_documento_entrada"]; ?>','<?php echo $filas["folio_entrada"] ?>')">Registrar</button></td>
                                <td><?php echo $filas["avance_programa"]; ?></td>
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

<!--                        <div class="form-group" method="post" >
                                <button type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Adjuntar Archivo</button>
                        </div>-->
                      </div><!-- cierre div class-body -->
                </div><!-- cierre div class modal-content -->
        </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->

	
                
                
                
                
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
//                                    window.location.href="AsignacionTemasRequisitosView.php?page=1";
					//$(editableObj).css("background","#FDFDFD");
//                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
//                                        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
//                                        window.location.href="SeguimientoEntradaView.php";
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
              
               
    function refresh(){
                  consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");  
//                  window.location.href="SeguimientoEntradaView.php";  
                }
    
    
    function loadSpinner(){
        myFunction();
    }           
              
               
    function consultarInformacion(url){
        
        $("#loader").show();
        $.ajax({  
            url: ""+url,  
            success: function(r) {
                $("#idTable").load("SeguimientoEntradaView.php #idTable")
                $("#loader").hide();

            },
            beforeSend:function(r){

            },
            error:function(){
                $("#loader").hide();
            }
                 
        });  
    }
    
    
    
    function mostrar_urls(id_documento_entrada)
        {
                var tempDocumentolistadoUrl = "";
                $.ajax({
                        url:    '../Controller/DocumentosEntradaController.php?Op=getIdCumplimiento',
                        type:   'GET',
                        data: 'ID_DOCUMENTO='+id_documento_entrada,
                        success: function(Id_cumplimiento)
                        {
                                if(Id_cumplimiento!="")
                                {
                                        URL = 'filesDocumento/Entrada/'+Id_cumplimiento+"/"+id_documento_entrada;
//                                        alert(URL);
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
                                                                                console.log(todo[0].length);
                                                                                if(todo[0].length!=0)
                                                                                {
                                                                                        tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                                                                                        $.each(todo[0], function (index,value)
                                                                                        {
                                                                                                nametmp = value.split("^");
                                                                                                name;
                                                                                                fecha = nametmp[0];
                                                                                                $.each(nametmp, function(index,value)
                                                                                                {
                                                                                                        if(index!=0)
                                                                                                                (index==1)?name=value:name+="-"+value;
                                                                                                });                                                                        
                                                                                                tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                                                                                tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\">"+name+"</a></td>";
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
                                                                                tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id_documento_entrada+"'>";
                                                                                // alert(tempDocumentolistadoUrl);
                                                                                $('#DocumentoEntradaAgregarModal').html(" ");
//                                                                                $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                                                                                $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                                                                                // $('#fileupload').fileupload();
                                                                                $('#fileupload').fileupload({
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
                        }
                });
        }
    
                
                
    function cargadePrograma(id_documento_entrada,folio_entrada){
//        alert("le has picado al folio de entrada  "+foliodeentrada);
        window.location.href=" GanttView.php?id_documento_entrada="+id_documento_entrada+"&folio_entrada="+folio_entrada;
//   window.location.replace("http://sitioweb.com");        
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
                      td = tr[i].getElementsByTagName("td")[7];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      } 
                    }
                }
                function filterTableResponsablePlan() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsablePlan");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[9];
                      if (td) {
                        select=td.getElementsByTagName("select");
                          $.each(select,function(index,value)
                          {
                                var indexRes = value.selectedIndex;
                                var responsable=value[indexRes].innerHTML;
                                console.log(responsable);
                              if (responsable.toUpperCase().indexOf(filter) > -1)
                              {
                                tr[i].style.display = "";
                              }
                              else
                              {
                                tr[i].style.display = "none";
                              }
//                            console.log(value.options(ind));
                          });
                      } 
                    }
                }
                
    
		</script>
                
            <!--en esta seccion es para poder abrir el modal--> 
                <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
            <!--aqui termina la seccion para poder abrir el modal-->    
                
                
	</body>
     
</html>


