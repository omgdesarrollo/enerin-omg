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
                <!--Para abrir alertas de aviso, success,warning, error-->
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <!--<link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>-->
                <!-- ace styles -->
                <link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
                
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                
                <!--<link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>-->
                
                <script src="../../js/jquery.js" type="text/javascript"></script>

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/functionTemasView.js" type="text/javascript"></script>
               
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
                <link href="../../assets/dhtmlxSuite_v51_std/skins/web/dhtmlx.css" rel="stylesheet" type="text/css"/>
                <!--<link href="../../assets/dhtmlxSuite_v51_std/skins/skyblue/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
                <!--<link href="../../assets/dhtmlxSuite_v51_std/skins/terrace/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
                
                
            <style> 
                    .modal-body{
                      color:#888;
                      max-height: calc(100vh - 110px);
                      overflow-y: auto;
                     
                    }                    
                    
                    #sugerenciasclausulas {
                    width:350px;
                    height:5px;
                    overflow: auto;
                    }  
                    /*
                    
                    .hideScrollBar{
                      width: 100%;
                      height: 100%;
                      overflow: auto;
                      margin-right: 14px;
                      padding-right: 28px; This would hide the scroll bar of the right. To be sure we hide the scrollbar on every browser, increase this value
                      padding-bottom: 15px; This would hide the scroll bar of the bottom if there is one
                    }*/
                    
                    div#layout_here {
                    position: relative;
                    width: 100%;
                    height: 392px;
                    /*overflow: auto;*/
                    box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                    /*margin: 0 auto;*/
                    }
                    div#treeboxbox_tree{
                    /*position: relative;*/
                    /*width: 900px;*/
                    height: 350px;
                    /*overflow: auto;*/
                    box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                    }
                    
            </style>    


	</head>

        <body class="no-skin" >
    <!--<div id="loader"></div>-->
            
            
<?php

require_once 'EncabezadoUsuarioView.php';

?>

            
<!--<div style="height: 5px"></div>            
           
<div style="position: fixed;">    
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
        Agregar Tema
    </button>

<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/exportarClausulasView/exportarClausulasViewExcel.php'">
<img src="../../images/base/_excel.png" width="30px" height="30px">
</button>     
<button type="button" onclick="window.location.href='../ExportarView/exportarClausulasView/exportarClausulasViewWord.php'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>

    Filtros de busqueda

    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>

</div>
 
<div style="height: 50px"></div>-->


<div id="layout_here" ></div>

<div id="treeboxbox_tree"></div>

<div id="contenido"></div>

<div id="contenidoDetalles"></div>

<div id="form_container" style="width:280px;height:250px;"></div>
            
<!--<table class="table table-bordered table-striped header_fijo"  >
    <thead >
    <tr class="">
     <th class="table-headert" width="8%">No. Tema</th>
     <th class="table-headert" width="20%">Tema</th>
     <th class="table-headert" width="10%">No.Sub-tema</th>
     <th class="table-headert" width="20%">Sub-tema</th>
     <th class="table-headert" width="20%">Responsable del tema</th>
     <th class="table-headert" width="12%">Descripcion</th>
     <th class="table-headert" width="10%">Plazo</th>
    </tr>
   </thead>

       <tbody id="datosGenerales"  style="position:absolute ;overflow: auto;display:block ;width: 100%">

   <tbody class="hideScrollBar"  id="datosGenerales" style="position: absolute">
   </tbody>

</table>     -->


                             
       <!-- Inicio de Seccion Modal Tema-->
       <div class="modal draggable fade" id="create-itemTema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Tema</h4>
		      </div>
                        
		      <div class="modal-body">
                          <form id="temaform">
                          
                                                <div class="form-group">
							<label class="control-label" for="title">No.Tema:</label>
                                                        <input type="text"  id="NO" class="form-control"  />
                                                        
                                                    
							<div class="help-block with-errors"></div>
                                                        <div id="sugerenciasclausulas"></div>
                                                        
						</div>
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Tema:</label>
                                                        <textarea  id="NOMBRE" class="form-control" data-error="Ingrese la Descripcion del Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>                                    
                                    
                                    
						<div class="form-group">
							<label class="control-label" for="title">Descripcion:</label>
                                                        <textarea  id="DESCRIPCION" class="form-control" data-error="Ingrese el Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                                                                                       
                                                                        
                                                <div class="form-group">
							<label class="control-label" for="title">Plazo:</label>
                                                        <textarea  id="PLAZO" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>

                                                <div class="form-group">
							<label class="control-label" for="title">Responsable:</label>
                                                        
                                                        <select   id="ID_EMPLEADOMODAL" class="select1">
                                                                <?php
                                                                $s="";
                                                                
                                                                $cbxE = Session::getSesion("listarEmpleadosComboBox");
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
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar_tema"  class="btn crud-submit btn-info">Limpiar</button>
						</div>
                          </form>

		      </div>
		    </div>

		  </div>
       </div>
       <!--Final de Seccion Modal-->
       
       <!-- Inicio de Seccion Modal Sub-Tema-->
       <div class="modal draggable fade" id="create-itemSubTema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Subtema</h4>
		      </div>
                        
		      <div class="modal-body">
                          <form id="SubTemaform">
                          
                                                <div class="form-group">
							<label class="control-label" for="title">No.Sub-Tema:</label>
                                                        <input type="text"  id="NO_SUBTEMA" class="form-control"  />
                                                        
                                                    
							<div class="help-block with-errors"></div>
                                                        <div id="sugerenciasclausulas"></div>
                                                        
						</div>
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">Sub-Tema:</label>
                                                        <textarea  id="NOMBRE_SUBTEMA" class="form-control" data-error="Ingrese la Descripcion del Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>                                    
                                    
                                    
						<div class="form-group">
							<label class="control-label" for="title">Descripcion:</label>
                                                        <textarea  id="DESCRIPCION_SUBTEMA" class="form-control" data-error="Ingrese el Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                                                                                       
                                                                        
                                                <div class="form-group">
							<label class="control-label" for="title">Plazo:</label>
                                                        <textarea  id="PLAZO_SUBTEMA" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>

                                                                        
                                                                                                                                
						<div class="form-group">
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar_SubTema"  class="btn crud-submit btn-info">Limpiar</button>
						</div>
                          </form>

		      </div>
		    </div>

		  </div>
       </div>
       <!--Final de Seccion Modal-->
       
		<script>  
                      var  id_seleccionado="";
                      
//                      construirContenido();
//                        listarEmpleados();
//                          listarTemas();
                        obtenerDatosArbol();
                        
                        
 $(function(){
     
     $("#temaform").submit(function(e){
         e.preventDefault();
         
         var formData = {"NO":$('#NO').val(),"NOMBRE":$('#NOMBRE').val(),"DESCRIPCION":$('#DESCRIPCION').val(),
                         "PLAZO":$('#PLAZO').val(),"NODO":0,"ID_EMPLEADOMODAL":$('#ID_EMPLEADOMODAL').val()};            
         
         $.ajax({
             url:'../Controller/TemasController.php?Op=GuardarNodo',
             type:'POST',
             data:formData,
             success:function()
             {
                 obtenerDatosArbol();
             }
         });
                
     });
     
     
     $("#SubTemaform").submit(function(e){
         e.preventDefault();
         
         var formData = {"NO":$('#NO_SUBTEMA').val(),"NOMBRE":$('#NOMBRE_SUBTEMA').val(),"DESCRIPCION":$('#DESCRIPCION_SUBTEMA').val(),
                         "PLAZO":$('#PLAZO_SUBTEMA').val(),"NODO":id_seleccionado,"ID_EMPLEADOMODAL":""};            
         
         $.ajax({
             url:'../Controller/TemasController.php?Op=GuardarNodo',
             type:'POST',
             data:formData,
             success:function()
             {
                 obtenerDatosArbol();
                 
//                 myTree.addItem(formData["NO"],formData['NOMBRE_SUBTEMA'], id_seleccionado);
//                myTree.openItem(formData.);
                 obtenerHijos(id_seleccionado);
             }
         });
                
     });
     
     $("btn_limpiar_tema").click(function(){
         $("#NO").val("");
         $("#NOMBRE").val("");
         $("#DESCRIPCION").val("");
         $("#PLAZO").val("");                 
     });
     
     $("btn_limpiar_SubTema").click(function(){
         $("#NO_SUBTEMA").val("");
         $("#NOMBRE_SUBTEMA").val("");
         $("#DESCRIPCION_SUBTEMA").val("");
         $("#PLAZO_SUBTEMA").val("");         
     });
     
     
 }); //CIERRA EL $FUNCTION                      
                          
                          
var myLayout = new dhtmlXLayoutObject({
			parent: "layout_here",
			pattern: "3W",
			cells: [
				{id: "a", width: 240, text: "Temas"},
				{id: "b", width: 600, text: "Sub-Temas"},
                                {id: "c", text: "Detalles"}
				
			]
		});
                
myTree = new dhtmlXTreeObject('treeboxbox_tree', '100%', '100%',0);
myTree.setImagePath("../../codebase/imgs/dhxtree_material/");
            

                
myLayout.cells("a").attachObject("treeboxbox_tree");

var myToolbar = myLayout.cells("a").attachToolbar({
			iconset: "awesome",
			items: [
                                {id:"agregar", type: "button", text: "Agregar", img: "fa fa-plus-square"},
				{id:"eliminar", type: "button", text: "Eliminar", img: "fa fa-trash-o"}
			]
		});

myToolbar.attachEvent("onClick", function(id){
    //your code here
//    alert("hola"+id);
    evaluarToolbarSeccionA(id);

});

function evaluarToolbarSeccionA(id)
{
    if(id=="agregar")
    {
//        alert("entro en agregar");
        $('#create-itemTema').modal('show');
    } 
    if(id=="eliminar")
    {
        var level = myTree.getLevel(id_seleccionado);
//        if(level==1)
//        {
            var subItems= myTree.getSubItems(id_seleccionado);
            if(subItems=="")
            {
                eliminarNodo();
            }else{
                alert("no se puede eliminar tiene descendencia");
            }
//        } 
//        if(level==2)
//        {
//            eliminarNodo();
//        }
    }   
}


function eliminarNodo()
{
    $.ajax({
        url:'../Controller/TemasController.php?Op=Eliminar',
        data:'ID='+id_seleccionado,
        success:function()
        {
           obtenerDatosArbol(); 
           limpiar("#contenidoDetalles");
           limpiar("#contenido");
           id_seleccionado="";
        }
    });
}
function limpiar(id_div){
    $(""+id_div).html("");
}
function obtenerDatosArbol()
    {
        $.ajax({
            url:'../Controller/TemasController.php?Op=Listar',
            success:function(data)
            { 
//                alert("tiene algo el arbol");
             contruirArbol(data);   
//             load(2);
             
            },error:function (){
//                alert("entro en el erro");
            }
        });
    }

function contruirArbol(dataArbol)
    {
        myTree.deleteChildItems(0);
        if(dataArbol.length>0){
        myTree.parse(dataArbol, "jsarray");
        }
    }

                

//            myTree.enableHighlighting(true);

//dataArbol=[["1","0","de"],["2","1","fes"],["3","1","el texto es de la siguiente manera que se puede trabajar "],["5","0","de"]];


myTree.attachEvent("onClick", function(id){
//    var id2 = myTree.getSelectedId();
//    alert("f  "+id2);
    // your code here
    obtenerHijos(id);
    
    id_seleccionado=id;
    return true;
});

  
myLayout.cells("b").attachObject("contenido");

var myToolbar = myLayout.cells("b").attachToolbar({
			iconset: "awesome",
			items: [
                                {id:"agregar", type: "button", text: "Agregar Subtema", img: "fa fa-plus-square"}
			]
		});
                
myToolbar.attachEvent("onClick", function(id){
    //your code here
    //alert("hola"+id);
    evaluarToolbarSeccionB(id);

});

function evaluarToolbarSeccionB(id)
{
//    alert("Este es el ID:"+id)
    if(id_seleccionado=="")
    {
        alert("No hay tema seleccionado");
    } else {
    if(id=="agregar")
    {
//        alert("entro en agregar");
        $('#create-itemSubTema').modal('show');
    } 
    if(id=="eliminar")
    {
        alert("entro en eliminar");
    }
    }
}


    
    function obtenerHijos(id)
    {
//        alert("Este es el ID Hijo:"+id);
       $("#contenido").html("<div style='font-size:30px' class='fa fa-refresh fa-spin'></div>"); 
        $.ajax({
            url:'../Controller/TemasController.php?Op=ListarHijos',
            type:'POST',
            data:'ID='+id,
            success:function(data)
            {
                construirSubDirectorio(data.datosHijos);
                construirDetalleSeleccionado(data.detalles,id);
            }
        });
    }
        
    
    function construirSubDirectorio(data)
    {
        
        tempData1="<div class='table-responsive'><table class='table table-bordered'><thead><tr class='info'>\n\
                    <th>No</th>\n\
                    <th>Subtema</th>\n\
                    <th>Descripcion</th>\n\
                    <th>Plazo</th>\n\
                    </tr></thead><tbody></tbody>";
                $.each(data, function(index,value){
                    tempData1+="<tr><td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'no',"+value.id_tema+")\">"+value.no+"</td>";
                    tempData1+="<td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'nombre',"+value.id_tema+")\" >"+value.nombre+"</td>";
                    tempData1+="<td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'descripcion',"+value.id_tema+")\">"+value.descripcion+"</td>";
                    tempData1+="<td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'plazo',"+value.id_tema+")\">"+value.plazo+"</td></tr>";
//                    tempData1+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
                });
            tempData1+="</table></div>";    
                $("#contenido").html(tempData1);
    }
        
     
   myLayout.cells("c").attachObject("contenidoDetalles");
   
   
    function construirDetalleSeleccionado(data,id)
    {
        var level = myTree.getLevel(id);
//        alert("este es el nivel:"+level);
        tempData2="<div class='table-responsive'><table class='table table-bordered'><thead><tr class='danger'><th>Datos</th><th>Detalles</th></tr></thead><tbody></tbody>";
                    $.each(data, function(index,value){
                       tempData2+="<tr><td class='info'>No</td><td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'no',"+value.id_tema+")\">"+value.no+"</td></tr>";
                       tempData2+="<tr><td class='info'>Tema</td><td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'nombre',"+value.id_tema+")\">"+value.nombre+"</td></tr>";
                       tempData2+="<tr><td class='info'>Descripcion</td><td contenteditable='true' onClick='showEdit(this)' onBlur=\"saveToDatabase(this,'descripcion',"+value.id_tema+")\">"+value.descripcion+"</td></tr>";
                       if(level==1)
                       tempData2+="<tr><td class='info'>Responsable</td><td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
                       
                    });
        tempData2+="</table></div>";
   
        $("#contenidoDetalles").html(tempData2);
    }
    
    
    function saveToDatabase(ObjetoThis,columna,id) {
//        alert("entro al save");            
        
            $(ObjetoThis).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            $.ajax({
                    url: "../Controller/GeneralController.php?Op=ModificarColumna",
                    type: "POST",
                    data:'TABLA=temas &COLUMNA='+columna+' &VALOR='+ObjetoThis.innerHTML+' &ID='+id+' &ID_CONTEXTO=id_tema',
                    success: function(data)
                    {
                        $(ObjetoThis).css("background","");
                    }   
            });        
}

function load(carga){
    
    if(carga==1){
        $("#loader").show();
    }
    if(carga==2){
        $("#loader").hide();
    }
}

        
    
		</script>
                
                
                
                
                <!--Inicia para el spiner cargando-->
                <script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->
              
                <!--Bootstrap-->
		<script src="../../assets/probando/js/bootstrap.min.js"></script>
                <!--Para abrir alertas de aviso, success,warning, error-->
                <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
                
                <!--Para abrir alertas del encabezado-->
                <script src="../../assets/probando/js/ace-elements.min.js"></script>
		<script src="../../assets/probando/js/ace.min.js"></script>
	</body>
        
        
        
</html>
