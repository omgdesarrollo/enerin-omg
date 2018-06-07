<?php
session_start();

require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible"  content="overview &amp; stats"  />
		<meta charset="utf-8" />
		<title>OMG APPS</title>

		<meta name="description" content="overview &amp; " />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                
                <!--Para abrir alertas de aviso, success,warning, error-->       
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                
                <script src="../../js/jquery.js" type="text/javascript"></script>


            <style>
                   
                   .modal-body{
                      color:#888;
                       max-height: calc(100vh - 110px);
                       overflow-y: auto; 
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

            
<div style="height: 5px"></div>
             
             
<div style="position: fixed;">        
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
    Agregar-Documento
</button>

<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
    
<button type="button" onclick="window.location.href='../ExportarView/exportarDocumentosView/exportarDocumentosViewExcel.php'">
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>     
<button type="button" onclick="window.location.href='../ExportarView/exportarDocumentosView/exportarDocumentosViewWord.php'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>

   <input type="text" id="idInputClaveDocumento" onkeyup="filterTableClaveDocumento()" placeholder="Clave del Documento" style="width: 150px">
   <input type="text" id="idInputNombreDocumento" onkeyup="filterTableNombreDocumento()" placeholder="Nombre del Documento" style="width: 160px">
   <input type="text" id="idInputResponsableDocumento" onkeyup="filterTableResponsableDocumento()" placeholder="Responsable del Documento" style="width: 190px">
   <input type="text" id="idInputRegistros" onkeyup="filterTableRegistros()" placeholder="Registros" style="width: 120px">
   <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>
	     
             
          <div style="height: 47px"></div>
          

          
        
          <div class="table-fixed-header">
              <div class="table-container">

                           <table id="idTable" class="tbl-qa">
		  <thead >
			  <tr>
				<th class="table-header" >No.</th>
                                <th class="table-header">Clave del Documento</th>
				<th class="table-header">Nombre del Documento</th>				
                                <th class="table-header">Responsable del Documento</th>					                                
                                <th class="table-header">Registros</th>	
                                <th class="table-header">Opcion</th>
			  </tr>
		  </thead>
                  
		  <tbody>
		  <?php
                  
                    
                  
                  $Lista = Session::getSesion("listarDocumentos");
                  $cbxEmp= Session::getSesion("listarEmpleadosComboBox");
                  $numeracion = 1;

                  foreach ($Lista as $filas) {
                      if($filas["clave_documento"]!="SIN DOCUMENTO"){
		  ?>
			  <tr class="table-row">
				<td><?php echo $numeracion++;   ?></td>                               
                                <td contenteditable="true" onBlur="saveToDatabase(this,'clave_documento','<?php echo $filas["id_documento"]; ?>')" onClick="showEdit(this);" onkeyup="detectarsihaycambio(this)"><?php echo $filas["clave_documento"]; ?></td>
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'documento','<?php echo $filas["id_documento"]; ?>')" onClick="showEdit(this);"  onkeyup="detectarsihaycambio(this)"><?php echo $filas["documento"]; ?></td>
                                
                                <td> 
                                    <select   id="id_empleado" class="select"  onchange="saveComboToDatabase('id_empleado', <?php echo $filas["id_documento"]; ?> )">
                                    <?php
                                    $s="";
                                                foreach ($cbxEmp as $value) {
                                                    if($value["id_empleado"]=="".$filas["id_empleado"]){
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
                                </td>
                                
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'registros','<?php echo $filas["id_documento"]; ?>')" onClick="showEdit(this);"  onkeyup="detectarsihaycambio(this)"><?php echo $filas["registros"]; ?></td>
                                <!--<td><textarea cols="50"  wrap="soft"> <?php // echo $filas["registros"]; ?> </textarea>  </td>-->
                                <td><button  ><i class="fa fa-trash"></i></button> </td>
			  </tr>
		<?php
                      }
		}
                
		?>
		  </tbody>
		</table>
                           
                           
              </div>
          </div>    
   
            
            
			

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
	
             
                
                <!-- Inicio de Seccion Modal Nuevo Documento-->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Documento</h4>
		      </div>

		      <div class="modal-body">
		      	
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Clave del Documento:</label>
                                                        <textarea  id="CLAVE_DOCUMENTO" class="form-control" data-error="Ingrese la Clave del Documento" required></textarea>
							<div class="help-block with-errors"></div>
                                                        <div id="msgerrorclave" ></div>
						</div>
                                    
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
                                                   
							<label class="control-label" for="title">Registros:</label>
                                                        <textarea  id="REGISTROS" class="form-control " data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                
                                                
                                    
						<div class="form-group">
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>


		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal-->

                
                
		<script>
                    
                      var id_clausula,si_hay_cambio=false;
                      $(function(){
                          
                          
                          
                        $("#CLAVE_DOCUMENTO").keyup(function(){
                            var valueclavedocumento=$(this).val();
                            
                            verificarExiste(valueclavedocumento,"clave_documento");
                           
                        });
                          
                          
                        $('.select').on('change', function() {
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                           $.ajax({
                                url: "../Controller/DocumentosController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+id_clausula,
				success: function(data){
                                     consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                     swal("Actualizacion Exitosa!", "Ok!", "success")
							
                      				
				}   
                           });
                          
                          
                        });
  
  
                      
                        
                        
                        $("#btn_guardar").click(function(){
                                  
                                    var CLAVE_DOCUMENTO=$("#CLAVE_DOCUMENTO").val();
                                    var DOCUMENTO=$("#DOCUMENTO").val();
                                    var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
                                    var REGISTROS=$("#REGISTROS").val();

                                   alert("CLAVE_DOCUMENTO :"+CLAVE_DOCUMENTO + "DOCUMENTO :"+DOCUMENTO + "ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL
                                                            + "REGISTROS :"+REGISTROS);
                                  
                                    

                                    datos=[];
                                    datos.push(CLAVE_DOCUMENTO);
                                    datos.push(DOCUMENTO);
                                    datos.push(ID_EMPLEADOMODAL);
                                    datos.push(REGISTROS);
                                    
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                            
                                  $("#CLAVE_DOCUMENTO").val("");
                                  $("#DOCUMENTO").val("");
                                  $("#REGISTROS").val("");
                                  
                                                                      
                        });
                        
                        
  
                      }); //LLAVE CIERRE FUNCTION
                      
                      
                      
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
                
                
		function saveToDatabase(editableObj,column,id) {
                    if(si_hay_cambio==true){
                            $("#btnrefrescar").prop("disabled",true);
                                $(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
                                $.ajax({
                                        url: "../Controller/DocumentosController.php?Op=Modificar",
                                        type: "POST",
                                        data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
                                        success: function(data){

                                                $(editableObj).css("background","#FDFDFD");
                                                consultarInformacion("../Controller/DocumentosController.php?Op=Listar"); 
                                                 swal("Actualizacion Exitosa!", "Ok!", "success");
                                                $("#btnrefrescar").prop("disabled",false);
                                                si_hay_cambio=false;
                                        }   
                           });
                    }
                    else{
                      
                    }
		}
                
                
                
                
                function save(){
                    aler("valor");
                }
                
                function saveComboToDatabase(column,id){
                     id_clausula=id;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
                   alert("datos nombre "+datos[3]);
                    
                    	$.ajax({
                                url: "../Controller/DocumentosController.php?Op=Guardar",
				type: "POST",
				data:'CLAVE_DOCUMENTO='+datos[0]+'&DOCUMENTO='+datos[1]+'&ID_EMPLEADO='+datos[2]+'&REGISTROS='+datos[3],
                                
				success: function(data){
                                    
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                         consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                      window.location.href("DocumentosView.php");
				}   
		   });
                }
                
                
                
                
      function verificarExiste(dataString,cualverificar){

                            $.ajax({
                                type: "POST",
                                url: "../Controller/DocumentosController.php?Op=verificacionexisteregistro&cualverificar="+cualverificar,
                                data: "registro="+dataString,
                                success: function(data) {    
                                mensajeerror="";

                                    $.each(data, function (index,value) {
                                        mensajeerror=" El Documento "+value.clave_documento+" Ya Existe";
                                    });
                                $("#msgerrorclave").html(mensajeerror);
                                    if(mensajeerror!=""){
                                        $("#msgerrorclave").css("background","orange");
                                        $("#msgerrorclave").css("width","190px");
                                        $("#msgerrorclave").css("color","white");
                                        $("#btn_guardar").prop("disabled",true);
                                    }else{
                                        $("#btn_guardar").prop("disabled",false);
                                    }



                                    }
                                })
                            }
                                 
                
                
                function refresh(){
                  consultarInformacion("../Controller/DocumentosController.php?Op=Listar");  
                }
                
                
                
                function loadSpinner(){
                         
                        myFunction();
                        
                         
                }
                
                
                
                function consultarInformacion(url){
                    
                    $('#loader').show();
                    $.ajax({  
                     url: ""+url,
                    success: function(r) {
                        $("#idTable").load("DocumentosView.php #idTable");
                        $('#loader').hide();
                     },
                     beforeSend:function(r){


                     },
                     error:function(){
                         $('#loader').hide();
                     }
                 
                    });  
                }
                function detectarsihaycambio(value){
                    
                    si_hay_cambio=true;   
                }
                
                
                function filterTableClaveDocumento() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputClaveDocumento");
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
                
                
                
                function filterTableNombreDocumento() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputNombreDocumento");
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
                
                
                function filterTableResponsableDocumento() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsableDocumento");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[3];
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
                          });

                      } 
                    }
                }
                
                
                function filterTableRegistros() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputRegistros");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

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

                
		</script>
               
               <!--Inicia para el spiner cargando-->
               <script src="../../js/loaderanimation.js" type="text/javascript"></script>
               <!--Termina para el spiner cargando--> 

               <!--Bootstrap-->
               <script src="../../assets/probando/js/bootstrap.min.js"></script>
               
               <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
               
               <!--Para abrir alertas del encabezado-->
               <script src="../../assets/probando/js/ace-elements.min.js"></script>
               <script src="../../assets/probando/js/ace.min.js"></script>
     
	</body>
        
        
        
</html>
