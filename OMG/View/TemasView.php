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
/*                    body{
                    overflow:hidden;     
                    }
                    
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
                    width: 900px;
                    height: 350px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                    /*margin: 0 auto;*/
                    }
            
                    
            </style>    


	</head>

<body class="no-skin">
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


<div id="layout_here"></div>

<div id="treeboxbox_tree"></div>

<div id="contenido"></div>

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


                             
       <!-- Inicio de Seccion Modal -->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                    <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>
                          </form>

		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal-->
       
		<script>  
                      var idclausula,si_hay_cambio=false;
//                      construirContenido();
//                        listarEmpleados();
//                          listarTemas();
                        obtenerDatosArbol();
                        
                        
 $(function(){
     
     $("#temaform").submit(function(e){
         e.preventDefault();
         var formData = {"NO":$('#NO').val(),"NOMBRE":$('#NOMBRE').val()};
         
         $.ajax({
             url:'../Controller/TemasController.php?Op=GuardarNodo',
             type:'POST',
             data:formData,
             success:function(data)
             {
                 
             }
         });
         
//         var NO=$('#NO').val();
//         var NOMBRE=$('#NOMBRE').val();
//         var DESCRIPCION=$('#DESCRIPCION').val();
//         var PLAZO=$('#PLAZO').val();
//         var ID_EMPLEADOMODAL
//         alert("PLAZO"+PLAZO);
         
         datos=[];
         datos.push(NO);
         datos.push(NOMBRE);
         datos.push(DESCRIPCION);
         datos.push(PLAZO);
         
     });
     
 });                       
                          
                          
var myLayout = new dhtmlXLayoutObject({
			parent: "layout_here",
			pattern: "2U",
			cells: [
				{id: "a", width: 240, text: "Temas"},
				{id: "b", text: "Descripcion"}
				
			]
		});
                
    myTree = new dhtmlXTreeObject('treeboxbox_tree', '100%', '100%',0);
	    myTree.setImagePath("../../codebase/imgs/dhxtree_material/");
            
            
                
myLayout.cells("a").attachObject("treeboxbox_tree");

var myToolbar = myLayout.cells("a").attachToolbar({
			iconset: "awesome",
			items: [
                                {id:"agregar", type: "button", text: "Agregar", img: "fa fa-plus-square"},
				{id:"eliminar", type: "button", text: "Eliminar", img: "fa fa-trash-o "}
			]
		});


var formStructure = [
    {type:"radio", name:"color", value:"r", checked:true, label:"Red"},
    {type:"radio", name:"color", value:"g", label:"Green"},
    {type:"radio", name:"color", value:"b", label:"Blue"}
];
var dhxForm = new dhtmlXForm("form_container", formStructure);


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
        $('#create-item').modal('show');
    } 
    if(id=="eliminar")
    {
        alert("entro en eliminar");
    }   
}

function obtenerDatosArbol()
    {
        $.ajax({
            url:'../Controller/TemasController.php?Op=Listar',
            success:function(data)
            {                                          
             contruirArbol(data);   
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
    // your code here
    obtenerHijos(id);
    
//    alert("rama"+id);
    return true;
});
  
myLayout.cells("b").attachObject("contenido");                
    
    
    function obtenerHijos(id)
    {
       $("#contenido").html("<div style='font-size:30px' class='fa fa-refresh fa-spin'></div>"); 
        $.ajax({
            url:'../Controller/TemasController.php?Op=ListarHijos',
            type:'POST',
            data:'ID='+id,
            success:function(data)
            {
                construirSubDirectorio(data);
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
                    tempData1+="<tr><td>"+value.no+"</td>";
                    tempData1+="<td>"+value.nombre+"</td>";
                    tempData1+="<td>"+value.descripcion+"</td>";
                    tempData1+="<td>"+value.plazo+"</td></tr>";
//                    tempData1+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
                });
            tempData1+="</table></div>";    
                $("#contenido").html(tempData1);
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
