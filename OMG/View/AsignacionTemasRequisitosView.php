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

                 
                 <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<!--
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                
                <script src="../../js/jquery.js" type="text/javascript"></script>

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
         
                <link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                <script src="../../codebase/dhtmlx.js" type="text/javascript"></script>
                <link href="../../codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
              


            <style>
                
                    
                div#winVP {
			position: relative;
			height: 350px;
			border: 1px solid #dfdfdf;
			margin: 10px;
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
    // $filtrosArray = array(
    //     array("name"=>"Clave","column"=>0),
    //     array("name"=>"Nombre Documento","column"=>1),
    //     array("name"=>"Responsable","column"=>2),
    //     array("name"=>"Clasificación","column"=>6),
            // array("name"=>"Clave Evidencia","column"=>"text"),
        // );
        $titulosTable = 
            array("No.","Tema","Descripción de Tema","Requisitos");
?> 

<div style="height: 5px"></div>
            
<div style="position: fixed;">     
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
        Asignar Tema-Requisito
</button>    

<button type="button" id="btn_lista_documentos" class="btn btn-success" data-toggle="modal">
    Lista de Documentos
    <!--<i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>-->
</button>

<button type="button" id="btn_lista_temas" class="btn btn-success" data-toggle="modal">
    Lista de Temas
    <!--<i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>-->
</button>
    <button type="button" class="btn btn-success" onclick="showArbol()" data-toggle="modal" data-target="#show-arbol">
        mostrar Arbol
</button>   
<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
    
<button type="button" onclick="window.location.href='../ExportarView/exportarAsignacionTemasRequisitosView/exportarAsignacionTemasRequisitoExcel.php'">
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>     
<button type="button" onclick="window.location.href='../ExportarView/exportarAsignacionTemasRequisitosView/exportarAsignacionTemasRequisitoWord.php'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>
    
<div style="height: 5px"></div> 


<input type="text" id="idInputDescripcionTema" onkeyup="filterTableDescripcionTema()" placeholder="Descripcion del Tema" style="width: 220px">
<input type="text" id="idInputRequisito" onkeyup="filterTableRequisito()" placeholder="Requisito" style="width: 150px">
<i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>    

</div>

<div style="height: 70px"></div>

<div class="table-fixed-header"> 

    <div class="table-container" id="winVP"> 
        <table id="idTable" class="tbl-qa">
            <tr>
                
            <?php   foreach($titulosTable as $value)
                {?>
              
                    <th class="table-header"> <?php echo $value ?> </th>
                <?php } ?>
            </tr>
		  <tbody id="tbodyTableAsignacion">
          </tbody>
        </table>
    </div>         
</div>  

<?php

//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarAsignacionTemasRequisitos");
                  $cbxClau= Session::getSesion("listarClausulasComboBox");
                  $cbxDoc= Session::getSesion("listarDocumentosComboBox");
                  $numeracion = 1;
?>

<!-- //		foreach ($Lista as $k=>$filas) {  -->
<!-- //                   $valorid= $Lista[$k]["ID_EMPLEADO"]; -->
<!-- //                   $nombreempleado=$Lista[$k]["NOMBRE_EMPLEADO"]; -->
                  
<!--			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>-->
	
        
         
                
                <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
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
                

 <div class="modal draggable fade" id="show-arbol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Arbol</h4>
		      </div>

            <div class="modal-body">                   
                <div id="treeboxbox_tree" style="width:100%;height:300px;background-color:white;"></div>
            </div>
		    </div>
		  </div>
		</div>                

		<script>
            myTree = new dhtmlXTreeObject('treeboxbox_tree', '100%', '100%',0);
			    myTree.setImagePath("../../codebase/imgs/dhxtree_material/");
            myTree.enableHighlighting(true);
                        
                      var id_asignacion_tema_requisito;
                      var cualmodificar,si_hay_cambio=false;
                      $(function(){
                          
                          
                          
                        $('.select').on('change', function() {
                          
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
//                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                        swal("Actualizacion Exitosa!", "Ok!", "success")

                                        //alert("entron ");
//                                        refresh();                                        
                                        //window.location.href="AsignacionTemasRequisitosView.php";
                                       
				}   
                           });
                          
                          
                        });
                        
                        
                        $("#btn_guardar").click(function(){                                  
                                    var ID_CLAUSULAMODAL=$("#ID_CLAUSULAMODAL").val();
                                    var REQUISITO=$("#REQUISITO").val();
                                    var ID_DOCUMENTOMODAL=$("#ID_DOCUMENTOMODAL").val();

                                    datos=[];
                                    datos.push(ID_CLAUSULAMODAL);
                                    datos.push(REQUISITO);
                                    datos.push(ID_DOCUMENTOMODAL);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                            
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
//                    alert("d");
                    if(si_hay_cambio==true){
                        $("#btnrefrescar").prop("disabled",true);

                            //alert("entraste aqui ");
                                $(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
                                $.ajax({
                                        url: "../Controller/AsignacionTemasRequisitosController.php?Op=Modificar",
                                        type: "POST",
                                        data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
                                        success: function(data){
                                                $(editableObj).css("background","#FDFDFD");
                                                consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");  
                                                swal("Actualizacion Exitosa!", "Ok!", "success");
                                                $("#btnrefrescar").prop("disabled",false);

                                                 si_hay_cambio=false;
                                                 

                                        }   
                           });
                    }else{
//                        alert("n");
                    }
		}
                
                
                function saveComboToDatabase(column,id){
                     id_asignacion_tema_requisito=id;
                     cualmodificar=column;
               }
               
               
               
               function saveToDatabaseDatosFormulario(datos){
                    
                    	$.ajax({
                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Guardar",
				type: "POST",
				data:'ID_CLAUSULA='+datos[0]+'&REQUISITO='+datos[1]+'&ID_DOCUMENTO='+datos[2],
                                
				success: function(data){
                                        swal("Guardado Exitoso!", "Ok!", "success");
                                         consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                         consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                         setTimeout('refresh()',1000);
				}   
		   });
                }
                
                
                function consultarInformacion(url){
                    $("#loader").show();
                    
                    $.ajax({  
                          url: ""+url,  
                         success: function(r) {
                             
                             $("#idTable").load("AsignacionTemasRequisitosView.php #idTable");
                             $("#loader").hide();
                          },
                          beforeSend:function(r){


                          },
                          error:function(){
                              $("#loader").hide();
                          }

                     });  
            }
                
                
              
    function refresh(){
        // consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
        // listarClausulas();
        //window.location.href="AsignacionTemasRequisitosView.php";  
    }
                
    function loadSpinner()
    {//cargar listado
//                    alert("se cargara otro ");
            myFunction();
            listarDocumentos();

    }
    // obtenerDatosArbol(1);
    function obtenerDatosArbol(id_asignacion)
    {
        $.ajax({
            url: '../Controller/RegistrosController.php?Op=GenerarArbol',
            type: 'GET',
            data: 'ID_ASIGNACION='+id_asignacion,
            success:function(data)
            {
                // console.log(data);
                array=[];
                padre=1;
                hijo=1;
                $.each(data,function(index,value)
                {
                    array.push([padre,0,value.requisito]);
                    $.each(value[0],function(ind,val)
                    {
                        hijo++;
                        array.push([hijo,padre,val.registro]);
                    });
                    hijo++;
                    padre=hijo;
                });
                console.log(array);
                showArbol(array);
            }
        });
    }
    function listarClausulas(documentos)
    {
        $.ajax({
            url: '../Controller/ClausulasController.php?Op=Listar',
            type: 'GET',
            success:function(data)
            {
                construirTable(data,documentos);
            }
        });
    }
    function listarDocumentos()
    {
        $.ajax({
            url: '../Controller/DocumentosController.php?Op=Listar',
            type: 'GET',
            success:function(data)
            {
                listarClausulas(data);
            }
        });
    }

    function construirTable(clausulasData,documentosData)
    {
        tableBuild="";
        numeracion=1;
        $.ajax({
            url: '../Controller/AsignacionTemasRequisitosController.php?Op=Listar',
            type: 'GET',
            success:function(data)
            {
                $.each(data,function(index,value)
                {
                    tableBuild += "<tr class='table-row' id='registro_"+value.id_asignacion_tema_requisito+"'><td>"+value.id_asignacion_tema_requisito+"</td>";
                    tableBuild += "<td style='background-color: #ccccff'>";
                    tableBuild += "<select class='select' onchange='saveComboToDatabase(\'id_clausula\',"+value.id_asignacion_tema_requisito+")'>";
                    $.each(clausulasData,function(index2,value2)
                    {

                        tableBuild += "<option value='"+value2.id_clausula+"'";
                        if(value.id_clausula==value2.clausula)
                            tableBuild += "selected";
                        tableBuild += ">"+value2.clausula+"</option>";
                    });
                    tableBuild += "</select></td>";
                    tableBuild += "<td style='background-color: #ccccff' contenteditable='false' onBlur='saveToDatabase(this,\'descripcion_clausula\',"+value.id_asignacion_tema_requisito+")'";
                    tableBuild += "onClick='showNoEdit(this);'>"+value.descripcion_clausula+"</td>";
                    tableBuild += "<td><button onClick='obtenerDatosArbol("+value.id_asignacion_tema_requisito+");' type='button' class='btn btn-success'";
                    tableBuild += "data-toggle='modal' data-target='#show-arbol'>";
                    tableBuild += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i> Ver</button></td>";
            
                    // tableBuild += "<td class='text-left' contenteditable='true' onBlur='saveToDatabase(this,\'requisito\',"+value.id_asignacion_tema_requisito+")' onClick='showEdit(this)'";
                    // tableBuild += "onkeyup='detectarsihaycambio(this)'>"+value.requisito+"</td>";
                    // tableBuild += "<td><select id='id_documento' class='select' onchange='saveComboToDatabase(\'id_documento\',"+value.id_asignacion_tema_requisito+")'>";
                    // $.each(documentosData,function(index3,value3)
                    // {
                    //     tableBuild += "<option value='"+value.id_documento+"'";
                    //         if(value3.id_documento==value.id_documento)
                    //     tableBuild += "selected";
                    //     tableBuild += ">"+value3.clave_documento+"</option>";
                    // });
                    // tableBuild +="</select></td><tr>";
                    tableBuild +="<tr>";
                });
                $('#tbodyTableAsignacion').html(tableBuild);
            }
        });
    }
                
                  function detectarsihaycambio(value){
                    si_hay_cambio=true;
                    
                    
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
            
            
            function filterTableDescripcionTema() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputDescripcionTema");
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
                
                
            function filterTableRequisito() {
                // Declare variables 
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("idInputRequisito");
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
                
              
		</script>
                <script src="../../js/functionATRView.js" type="text/javascript"></script>
                <!--Inicia para el spiner cargando-->
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
                
                <!--jquery-->
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                
                <!--Bootstrap-->
                <script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Para abrir alertas de aviso, success,warning, error-->       
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                
                <!--Para abrir alertas del encabezado-->
		<script src="../../assets/probando/js/ace-elements.min.js"></script>
		<script src="../../assets/probando/js/ace.min.js"></script>
                <script src="../../assets/probando/js/ace-extra.min.js"></script>
     
		     
                
	</body>
        
        
        
</html>
