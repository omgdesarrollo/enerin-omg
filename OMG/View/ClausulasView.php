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
                    
                    
                    #sugerenciasclausulas {
                    width:350px;
                    height:5px;
                    overflow: auto;
                    }
               
/*                    .main-encabezado {
                        background: #333;
                        color: white;
                        height: 80px;

                        width: 100%;  hacemos que la cabecera ocupe el ancho completo de la página 
                        left: 0;  Posicionamos la cabecera al lado izquierdo 
                        top: 0;  Posicionamos la cabecera pegada arriba 
                        position: fixed;  Hacemos que la cabecera tenga una posición fija 
                    } */
                   
                    
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
                Agregar Tema
            </button>
            
            <button type="button" class="btn btn-info " onclick="refresh();" >
                <i class="glyphicon glyphicon-repeat"></i> 
	    </button>
            
            <!--Filtros de busqueda-->
            <input type="text" id="idInputTema" onkeyup="filterTableTema()" placeholder="Buscar Por Tema">
            <input type="text" id="idInputSubTema" onkeyup="filterTableSubTema()" placeholder="Buscar Por Sub-Tema">
            <input type="text" id="idInputResponsable" onkeyup="filterTableResponsable()" placeholder="Buscar Por Responsable">
            
        </div>
 
<div style="height: 47px"></div>



<!--<div class="contenedortable" style="position: fixed;">   
    <input type="text" id="idInput" onkeyup="filterTable()" placeholder="Buscar Por Tema">
</div >-->


<!--<div style="height: 55px"></div>-->


<div class="table-fixed-header">
    <div class="table-container">            
            
                           <table id="idTable" class="tbl-qa">
                              
		  <!--<thead>-->
                            
                               <tr  >
                          <!--<div class="main-header">-->
				<!--<th class="table-header" >NO.</th>-->
                                <th  class="table-header">No.Tema</th>
				<th   class="table-header">Tema</th>				
				<th  class="table-header">No.Sub-Tema</th>				
				<th  class="table-header">Sub-Tema</th>				
				<th   class="table-header">Responsable</th>				
				<!--<th class="table-header">TEXTO BREVE</th>-->				
				<th  class="table-header">Descripcion</th>				
                                <th  class="table-header">Plazo</th>					
                          <!--</div>-->
                               </tr>
                     
		  <!--</thead>-->
		  <tbody>
		  <?php
                  
                    
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarClausulas");
                  $cbxE= Session::getSesion("listarEmpleadosComboBox");
                  
                  $numeracion = 1;
                  
//		foreach ($Lista as $k=>$filas) { 
//                   $valorid= $Lista[$k]["ID_EMPLEADO"];
//                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"];
                  foreach ($Lista as $filas) { 
		  ?>
			  <tr class="table-row">
				<!--<td><?php //echo $numeracion++;   ?></td>-->
                                
                                            <?php
//                                            echo "el valor es :   "."{$k}=>{$filas["CLAUSULA"]}";
                                            ?>
                                <!--DESCRIPCION_SUB_CLAUSULA-->
                                <td contenteditable="true" onBlur="saveToDatabase(this,'clausula','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["clausula"]; ?></td>
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'descripcion_clausula','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion_clausula"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'sub_clausula','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["sub_clausula"]; ?></td>
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'descripcion_sub_clausula','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion_sub_clausula"]; ?></td>
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'NOMBRE_EMPLEADO','<?php //echo $Lista[$k]["ID_CLAUSULA"]; ?>')" onClick="showEdit(this);"><?php //echo $Lista[$k]["NOMBRE_EMPLEADO"]; ?></td>-->
                                <td> 
<!--                                    <select  class="empleado" name="n_empleado" onchange="saveComboToDatabase('ID_EMPLEADO', <?php echo $filas["id_clausula"]; ?> )">-->
                                    <select   id="id_empleado" class="select"  onchange="saveComboToDatabase('id_empleado', <?php echo $filas["id_clausula"]; ?> )">
                                    <!--<select name="name_empleado">-->
                                    <?php
                                    $s="";
                                                foreach ($cbxE as $value) {
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
                                <!--<td contenteditable="true" onBlur="saveToDatabase(this,'TEXTO_BREVE','<?php //echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["texto_breve"]; ?></td>-->
                                <td class="text-left" contenteditable="true" onBlur="saveToDatabase(this,'descripcion','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["descripcion"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'plazo','<?php echo $filas["id_clausula"]; ?>')" onClick="showEdit(this);"><?php echo $filas["plazo"]; ?></td>
                                
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
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Tema</h4>
		      </div>

		      <div class="modal-body">
		      		<!--<form data-toggle="validator" action="api/create.php" method="POST">-->
                                    <!--<form data-toggle="validator"  >-->
                                    
                                                
<!--                                                <div class="form-group">
							<label class="control-label" for="title">No.Tema:</label>
                                                        <input type="text"  id="CLAUSULA" class="form-control" data-error="Ingrese el Tema" required />
							<div class="help-block with-errors"></div>
						</div>-->
                                                <div class="form-group">
							<label class="control-label" for="title">No.Tema:</label>
                                                        <input type="text"  id="CLAUSULA" class="form-control"  />
                                                        
                                                        <!--<div id="combo_zone" style="width:230px;"></div>-->
							<div class="help-block with-errors"></div>
                                                        <div id="sugerenciasclausulas"></div>
                                                        <!--<div class="suggest-element"> </div>-->
                                                        
						</div>
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        <textarea  id="DESCRIPCION_CLAUSULA" class="form-control" data-error="Ingrese la Descripcion del Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>                                    
                                    
                                    
						<div class="form-group">
							<label class="control-label" for="title">No.Sub-Tema:</label>
                                                        <textarea  id="SUB_CLAUSULA" class="form-control" data-error="Ingrese el Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Sub-Tema:</label>
                                                        <textarea  id="DESCRIPCION_SUB_CLAUSULA" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
<!--                                                <div class="form-group">
							<label class="control-label" for="title">Texto-Breve:</label>
                                                        <textarea  id="TEXTO_BREVE" class="form-control" data-error="Ingrese el Texto-Breve" required></textarea>
							<div class="help-block with-errors"></div>
						</div>-->


                                                <div class="form-group">
							<label class="control-label" for="title">Responsable:</label>
                                                        
                                                        <select   id="ID_EMPLEADOMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                foreach ($cbxE as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_empleado"] ?>"  ><?php echo "".$value["nombre_empleado"]." ".$value["apellido_paterno"]." ".$value["apellido_materno"]; ?></option>
                                                                
                                                                    <?php
                                                                
                                                                }
                                    
                                                                 ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                                    

                                                <div class="form-group">
							<label class="control-label" for="title">Descripcion:</label>
                                                        <textarea  id="DESCRIPCION" class="form-control" data-error="Ingrese la Descripcion" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Plazo:</label>
                                                        <textarea  id="PLAZO" class="form-control" data-error="Ingrese el Plazo" required></textarea>
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
		<script type="text/javascript"></script>
                
                
                
                
		<script>
                    
                      var idclausula;
                      $(function(){
                           
                         
                          
                        $('.select').on('change', function() {
//                          console.log( $(this).prop('value') );
//                          alert("el value que va a viajar es "+ $(this).prop('value'));
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                          //alert("el value que va a viajar es "+val+" i el id de la clausula : "+idclausula);
                          $.ajax({
                                url: "../Controller/ClausulasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+idclausula,
				success: function(data){
                                    
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        window.location.href="ClausulasView.php";    
                                    
					//$(editableObj).css("background","#FDFDFD");
				}   
                           });
                          
                          
                        });
                        
                        
                        $('#CLAUSULA').keyup(function(){
                            
                       var valueclausula = $(this).val();   
                       if(valueclausula!=""){
                           var dataString = valueclausula;
                            loadAutocomplete(dataString);
                            
                            
                       }
                         
                           });
                        
                        
                        
                        
                        
                        $("#btn_guardar").click(function(){
                                  //alert("entro");
       
        
                                    var CLAUSULA=$("#CLAUSULA").val();
                                    var DESCRIPCION_CLAUSULA=$("#DESCRIPCION_CLAUSULA").val();
                                    var SUB_CLAUSULA=$("#SUB_CLAUSULA").val();
                                    var DESCRIPCION_SUB_CLAUSULA=$("#DESCRIPCION_SUB_CLAUSULA").val();
                                    var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
//                                    var TEXTO_BREVE=$("#TEXTO_BREVE").val();
                                    var DESCRIPCION=$("#DESCRIPCION").val();
                                    var PLAZO=$("#PLAZO").val();
                                    //alert("ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL);
                                  
//                                  alert("Clausula :"+CLAUSULA+ "Sub-clausula :"+SUB_CLAUSULA+ "Descripcion clausula :" +DESCRIPCION_CLAUSULA+
//                                          "Descripcion sub clausula : " +DESCRIPCION_SUB_CLAUSULA+ " texto breve :" +TEXTO_BREVE "descripcion :" +DESCRIPCION+
//                                         "Plazo :" +PLAZO+ "Requisito :" +REQUISITO+ "id_empleado :" +ID_EMPLEADO);   
                                    

                                    datos=[];
                                    datos.push(CLAUSULA);
                                    datos.push(DESCRIPCION_CLAUSULA);
                                    datos.push(SUB_CLAUSULA);
                                    datos.push(DESCRIPCION_SUB_CLAUSULA);
                                    datos.push(ID_EMPLEADOMODAL);
//                                    datos.push(TEXTO_BREVE);
                                    datos.push(DESCRIPCION);
                                    datos.push(PLAZO);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                                  $("#CLAUSULA").val("");
                                  $("#DESCRIPCION_CLAUSULA").val("");
                                  $("#SUB_CLAUSULA").val("");
                                  $("#DESCRIPCION_SUB_CLAUSULA").val("");
                                  //$("#ID_EMPLEADOMODAL").val("");
//                                  $("#TEXTO_BREVE").val("");
                                  $("#DESCRIPCION").val("");
                                  $("#PLAZO").val("");
                                                                      
                        });
                        
  
                      }); //Se cierra el function
                      
                      
                      
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
                
                
		function saveToDatabase(editableObj,column,id) {
                    //alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/ClausulasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
                
                
                function saveComboToDatabase(column,id){
                     idclausula=id;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
//                    alert("datos nombre "+datos[0]);
                    
                    	$.ajax({
                                url: "../Controller/ClausulasController.php?Op=Guardar",
				type: "POST",
				data:'CLAUSULA='+datos[0]+'&DESCRIPCION_CLAUSULA='+datos[1]+'&SUB_CLAUSULA='+datos[2]
                                                       +'&DESCRIPCION_SUB_CLAUSULA='+datos[3]+'&ID_EMPLEADO='+datos[4]
                                                       +'&DESCRIPCION='+datos[5]+'&PLAZO='+datos[6],
				success: function(data){
//                                    alert("se guardo");
                                    
//					$(editableObj).css("background","#FDFDFD");
                                        swal("Guardado Exitoso!", "Ok!", "success")
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                        window.location.href("ClausulasView.php");
				}   
		   });
//                   window.location.href("EmpleadosView.php");
                }
                
                
                function refresh(){
                    
                  window.location.href="ClausulasView.php";  
                }
                
                
                function loadSpinner(){
//                    alert("se cargara otro ");
                        myFunction();
                }
                
                
                
                function loadAutocomplete(dataString){
                    //Le pasamos el valor del input al ajax
                            $.ajax({
                                type: "POST",
                                url: "../Controller/ClausulasController.php?Op=loadAutoComplete",
                                data: "cadenaclausula="+dataString,
                                success: function(data) {
                                    //Escribimos las sugerencias que nos manda la consulta
                                //var datos="<ul>";
                                var dato="";
                                    $.each(data, function (index,value) {
                                //        console.log("sub_clausula: " + value.sub_clausula);
                                if(value.sub_clausula!=""){
                                //         datos+="<li>"+value.sub_clausula+"</li><br>";
                                        dato=value.descripcion_clausula;

                                     }
                                    });
                                //    datos+="</ul>"
                                //    $('#sugerenciasclausulas').fadeIn(1000).html(datos);
                                $('#DESCRIPCION_CLAUSULA').val(dato);
                                if(dato==""){

                                $('#DESCRIPCION_CLAUSULA').prop("readonly",false);
                                }else{
                                    if(dato!=""){
                                 $('#DESCRIPCION_CLAUSULA').prop("readonly",true);   
                                 }
                                }

                                //                                               
                                                                }
                                                            }); 
                                                }
                
                
                
                function filterTableTema() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputTema");
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
                
                
                function filterTableSubTema() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputSubTema");
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
                
                
                function filterTableResponsable() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputResponsable");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("idTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[4];
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
                
                
                <link rel="stylesheet" type="text/css" href="../../../codebase/fonts/font_roboto/roboto.css"/>
                   <script src="../../codebase/dhtmlx.js"></script>
                <link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
               
                <!--Para abrir alertas de aviso, success,warning, error-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                
                
	</body>
        
        
        
</html>
