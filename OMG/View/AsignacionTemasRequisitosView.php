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

        <script src="../../js/jquery.js" type="text/javascript"></script>

        <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
        <link href="../../assets/dhtmlxSuite_v51_std/skins/web/dhtmlx.css" rel="stylesheet" type="text/css"/>
        
        
            <style>
               
                div#sidebarObj {
			position: relative;
			margin-left: 10px;
			margin-top: 10px;
			width: 900px;
			height: 350px;
			box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
		}
                div#layout_here {
		position: relative;
		width: 100%;
		height: 380px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
		/*margin: 0 auto;*/
                }
                
                div#treeboxbox_tree{
                   height: 300px; 
                }
                    
          
          
          
          
                </style>    
                
                
                

	</head>

<body class="no-skin" >            
<?php

    require_once 'EncabezadoUsuarioView.php';

?>
   <div class="modal draggable fade" id="create-itemRequisito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Requisito</h4>
		      </div>
                        
		      <div class="modal-body">
                          <form id="formRequisitos">
                                     
                                                <div class="form-group">
							<label class="control-label" for="title">Requisito</label>
                                                        <textarea  id="REQUISITO" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span style="border:none;background-color:transparent;" class="input-group-addon">Con Penalizacion</span>
                                                        <input type="checkbox" style="width: 40px; height: 40px" class="checkbox" id="checkPenalizado">
                                                        
                                                    </div>							
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
    
 <div class="modal draggable fade" id="create-itemRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Registro</h4>
		      </div>
                        
		      <div class="modal-body">
                    <form id="formRegistro">   
                        <div class="form-group">
                            <label class="control-label" for="title">Registro</label>
                            <textarea  id="REGISTRO" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>                                                                                                                          

                        <div class="form-group">
                            <label class="control-label">Clave/Descripcion: </label>
                            <div class="dropdown">
                                <input onBlur="registroClaveEscritura()" style="width:100%" type="text" class="dropdown-toggle" 
                                id="CLAVEESCRITURA_AGREGARREGISTRO" data-toggle="dropdown" onKeyup="buscarDocumento(this)" autocomplete="off"/>
                                <ul style="width:100%;cursor:pointer;" class="dropdown-menu" id="dropdownEvent" role="menu" 
                                aria-labelledby="menu1"></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Frecuencia: </label>
                            <select id="selectFrecuencia" >
                                <option value="DIARIO">DIARIO</option>
                                <option value="MENSUAL">MENSUAL</option>
                                <option value="SEMANAL">SEMANAL</option>
                                <option value="BIMESTRAL">BIMESTRAL</option>
                                <option value="ANUAL">ANUAL</option>
                                 <option value="TIEMPO INDEFINIDO">TIEMPO INDEFINIDO</option>
                               
                            </select>
                        </div>
                        
                        <div id="INFO_AGREGARREGISTRO">
                            <div class="form-group">
                                Clave Documento:
                            </div>
                            <div class="form-group">
                                Descripcion Documento:
                            </div>
                            <div class="form-group">
                                Responsable Documento:
                            </div>
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
            
<div style="height: 10px"></div>

<div id="layout_here"></div>

<div id="treeboxbox_tree"></div>   

<div id="seccionIzquierda">
    <div id="contenido" ></div>
</div>

<div id="contenidoDetalles"></div>
	<script>
            var myLayout, myTree, myToolbar,id_asignacion_t=-1,levelv=0,id_asignacion_r=-1,selec_tema=-1,id_seleccionado=-1,dataIds_req=[],dataIds_reg=[];
            myTree = new dhtmlXTreeObject('treeboxbox_tree', '100%', '100%',0);
	    myTree.setImagePath("../../codebase/imgs/dhxtree_material/");


obtenerTemasEnAsignacion();

function buscarDocumento(data)
{
    cadena = $(data).val().toLowerCase();
    tempData="";    
    if(cadena!="")
    {
        $.ajax({
            url: '../Controller/AsignacionDocumentosTemasController.php?Op=BuscarDocumento',
            type: 'GET',
            data: 'CADENA='+cadena,
            success:function(documentos)
            {
                $.each(documentos,function(index,value)
                {
                    // nombre = value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
                    datos = value.id_documento+"^_^"+value.clave_documento+"^_^"+value.documento+"^_^"+value.nombre_empleado;
                    tempData += "<li role='presentation'><a role='menuitem' tabindex='-1'";
                    tempData += "onClick='seleccionarItemDocumentos("+JSON.stringify(value)+")'>";
                    tempData += value.clave_documento+" - "+value.documento+"</a></li>";
                });
                $("#dropdownEvent").html(tempData);
            }
        });
    }
}

var idDocumentoSelect=-1;
function seleccionarItemDocumentos(Documentos)
{
    $('#CLAVEESCRITURA_AGREGARREGISTRO').val(Documentos.clave_documento);
    idDocumentoSelect=Documentos.id_documento;
    // tempData = "<div class='form-group'>Clave Documento: "+Documentos.clave_documento+"</div>";
    tempData = "<div class='form-group'>Descripcion Documento: "+Documentos.documento+"</div>";
    tempData += "<div class='form-group'>Responsable Documento: "+Documentos.nombre_empleado+"</div>";
    $("#INFO_AGREGARREGISTRO").html(tempData);
}

function registroClaveEscritura()
{
    val = $('#CLAVEESCRITURA_AGREGARREGISTRO').val();
    if(val=="")
    {
        idDocumentoSelect=-1;
    // tempData = "<div class='form-group'>Clave Documento: "+Documentos.clave_documento+"</div>";
        tempData = "<div class='form-group'>Descripcion Documento:</div>";
        tempData += "<div class='form-group'>Responsable Documento:</div>";
        $("#INFO_AGREGARREGISTRO").html(tempData);
    }
}


parametroscheck={"penalizado":"false"};

$(function(){
    
    $('#checkPenalizado').click(function() {
        parametroscheck["penalizado"]=$(this).is(':checked');
        alert(parametroscheck["penalizado"]);
    });
    
    $("#formRequisitos").submit(function(e){
         e.preventDefault();
//         alert("dcf  "+id_asignacion_t);
         var formData = {"ID_ASIGNACION_TEMA_REQUISITO":id_asignacion_t,"REQUISITO":$('#REQUISITO').val(),"PENALIZACION":parametroscheck["penalizado"]};            
         
         $.ajax({
             url:'../Controller/AsignacionTemasRequisitosController.php?Op=GuardarNodo',
             type:'POST',
             data:formData,
             success:function()
             {
                 obtenerDatosArbol(id_asignacion_t);
             }
         });
                
     }); 
     
       $("#formRegistro").submit(function(e){
         e.preventDefault();
//         alert("dcf  "+id);
        
//        console.log(dataIds_req);
        id_req=-1;
//        console.log(dataIds_req);
//console.log("seleccionado es "+id_seleccionado);
        $.each(dataIds_req,function(index,value){
            if(value.padre==id_seleccionado){
               id_req= value.id_requisito;
//               alert("d "+id_req);
            }
//            alert("d "+value.id_requisito);
        });
//       if(id_){ 
//$("#selectFrecuencia option[value="+ valor +"]").attr("selected",true)
         var formData = {"ID_REQUISITO":id_req,"REGISTRO":$('#REGISTRO').val(),"ID_DOCUMENTO":idDocumentoSelect,"FRECUENCIA":$("#selectFrecuencia").prop("value")};
         
         $.ajax({
             url:'../Controller/AsignacionTemasRequisitosController.php?Op=GuardarSubNodo',
             type:'POST', 
             data:formData,
             success:function(data)
             {
//                 alert("s");
                 obtenerDatosArbol(id_asignacion_t);
             }
         });
                
     }); 
     
     
}); //CIERRA $FUNCTION

var myLayout = new dhtmlXLayoutObject({
			parent: "layout_here",
			pattern: "3W",
			cells: [
				{id: "a", width: 240, text: "Temas"},
				{id: "b",   text: "Requisitos-Registros"},
                                {id: "c", width: 260,text: "Detalles"}
				
			]
		});
 myLayout.cells("a").attachObject("seccionIzquierda");



var myToolbar = myLayout.cells("b").attachToolbar({
			iconset: "awesome",
			items: [
//				{type: "button", text: "Actualizar", img: "fa fa-refresh fa-spin"},
                                {id:"agregarReq",type: "button", text: "Agregar Requisito", img: "fa fa-save "},
                                {id:"agregar",type: "button", text: "Agregar Registro", img: "fa fa-save "},
				{id:"eliminar",type: "button", text: "Eliminar", img: "fa fa-trash-o "}
                                
			]
		});

myLayout.cells("b").attachObject("treeboxbox_tree");
     
     
     
myToolbar.attachEvent("onClick", function(id){

    evaluarToolbarSeccionB(id);

});

myTree.attachEvent("onClick", function(id){

 levelv = myTree.getLevel(id);
 id_seleccionado=id;

idTree=-1;
//alert("seleccionado  "+id_seleccionado);
   $.each(dataIds_req,function(index,value){
            if(value.padre==id_seleccionado){
               idTree= value.id_requisito;
            }
        });
 
 obtenerInfo(idTree);
});


function evaluarToolbarSeccionB(id)
{
    if(id_asignacion_t==-1){
//        alert(id_asignacion_t);
        swal("","Seleccione un Tema","error");
        setTimeout(function(){swal.close();},1500);
    }else{
            if(id=="agregar")
            {
                if( selec_tema==0){
//                   if(levelv==0){
//                        $('#create-itemRequisito').modal('show');
//                        
//                   }
//                   else{
                   
                        if(levelv==1){
                            $('#create-itemRegistro').modal('show');

                       }else{
                            swal("","Seleccione un Requisito","error");
                            setTimeout(function(){swal.close();},1500);
                       }
//                 }
                }
                   
            } 
            
            if(id=="agregarReq"){
                $('#create-itemRequisito').modal('show');
//                alert("fd "+id_asignacion_t);
//                
//                
//               myTreeView.unselectItem(id_seleccionado); 
//alert("d");

//    id_asignacion_t
            }
            
            if(id=="eliminar")
            {
                    var level = myTree.getLevel(id_seleccionado);
                    var subItems= myTree.getSubItems(id_seleccionado);
//                    alert(level);
//                    alert(subItems);                    
                    if(level==0){
//                        alert(subItems);
                      swal("","Seleccione un Requisito","error");
                      setTimeout(function(){swal.close();},1500);  
                    } else {
                        
                        if(subItems==0)
                        {
                            alert("Si se puede eliminar el registro");
            //                eliminarNodo();
                        }else{
//                            alert("Registros: "+subItems);
                            swal("","El requisito tiene Registros","error");
                            setTimeout(function(){swal.close();},1500);
                        }
                    }    
            }
    }
}
               
               
                  
     function obtenerTemasEnAsignacion(){
//         alert("e");  
    
          $.ajax({
            url: '../Controller/AsignacionTemasRequisitosController.php?Op=Listar',
            success:function(data)
            {
               $htmlData="<table><t</table><ul class='list-group'>";
               $.each(data,function(index,value){
                  $htmlData+="<li class='list-group-item'><button onclick='obtenerDatosArbol("+value.id_asignacion_tema_requisito+")' >"+value.no+"-"+value.nombre+"</button><span class='badge'></li>"; 
                
               });
              $htmlData+="</ul>";
              $("#contenido").html($htmlData);
//              contruirLista();
            }
        });
     }
     
    // obtenerDatosArbol(1);
    function obtenerDatosArbol(id_asignacion)
    {
       id_asignacion_t=id_asignacion;
       selec_tema=0;
        levelv=0;
        cadenaReq="";
        cadenaReg="";
        dataIds_req.length=0;
        dataIds_reg.length=0;
//       alert("d  :"+id_asignacion_t);
//        id_asignacion_t=id_asignacion;
//        alert("d");
        $.ajax({
            url: '../Controller/RegistrosController.php?Op=GenerarArbol',
            type: 'GET',
            data: 'ID_ASIGNACION='+id_asignacion,
            success:function(data)
            {
                // console.log(data);
                dataArbol=[];
                dataIds=[];
                padre=1;
                hijo=1;
                $.each(data.data,function(index,value)
                {
                    cadenaReq=value.requisito;
//                    cadenaReq.substr(0,6);
                    dataArbol.push([padre,0,"Requisito-"+ cadenaReq.substr(0,9)+"...."]);
                    dataIds_req.push({"padre":padre,"id_requisito":value.id_requisito,"requisito":value.requisito});
//                    dataIds.push({"padre":padre,"id_requisito":value.id_requisito,"requisito":value.requisito});
//                    dataIds.push(value.id_requisito);
                    $.each(value[0],function(ind,val)
                    {
                        hijo++;
                        cadenaReg=val.registro;
                        dataArbol.push([hijo,padre,"Registro-"+cadenaReg.substr(0,9)+"...."]);
                        
//                        dataIds.push([hijo,val.id_registro,val.registro]);
                         dataIds_reg.push({"hijo":hijo,"id_registro":val.id_registro,"registro":val.registro});
//                        dataIds.push([val.id_registro]);
                    });
                    hijo++;
                    padre=hijo;
                });
//                console.log(dataIds_reg);
         
//                dataIds_req=dataIds;
//                console.log("d"+dataIds_req);
//                console.log("d:  "+dataArbol);
                showArbol(dataArbol,dataIds);
                construirDetalleSeleccionado(data.detallesTema,id_asignacion_t);
//                obtenerTema(id_asignacion_t);
                
            }
        });
    }
    
//    function obtenerTema(id)
//    {
//       $.ajax({
//           url:'../Controller/TemasController.php?Op=ListarHijos',
//           type:'POST',
//           data:'ID='+id,
//           success:function(data)
//           {   
////               construirSubDirectorio(data.datosHijos);
//               construirDetalleSeleccionado(data.detalles,id);
//           }
//       });
//    }
    
myLayout.cells("c").attachObject("contenidoDetalles");
    
    function construirDetalleSeleccionado(data,id)
    {
//        var level = myTree.getLevel(id);
//        alert("este es el nivel:"+level);
        tempData2="<div class='table-responsive'><table class='table table-bordered'><thead><tr class='danger'><th>Datos</th><th>Detalles</th></tr></thead><tbody></tbody>";
                    $.each(data, function(index,value){
                       tempData2+="<tr><td class='info'>No</td><td>"+value.no+"</td></tr>";
                       tempData2+="<tr><td class='info'>Tema</td><td>"+value.nombre+"</td></tr>";
                       tempData2+="<tr><td class='info'>Descripcion</td><td>"+value.descripcion+"</td></tr>";
//                       if(level==1)
                       tempData2+="<tr><td class='info'>Responsable</td><td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
                       
//                       alert("");
console.log("d");
                    });
        tempData2+="</table></div>";
   
        $("#contenidoDetalles").html(tempData2);
    }
    
    function obtenerInfo(id){
//        alert("ya has entrado aqui "+data);
        if(id==-1){
//         alert("accederas a registros");
            idTree=-1;
//alert("el id seleccionado es :  "+id_seleccionado);
             $.each(dataIds_reg,function(index,value){
//                 console.log("id_reg:  "+value.hijo);
                        if(value.hijo==id_seleccionado){
                               idTree= value.id_registro;
                        }
             });        
            obtenerDetalles_Seleccionado(idTree,"reg"); 
        }
        else{
//            alert("d "+id);
            obtenerDetalles_Seleccionado(id,"req");
        }
    }
    
    
   function obtenerDetalles_Seleccionado(id,tipo){

   $.ajax({
       url:"../Controller/AsignacionTemasRequisitosController.php?Op=detalles",
       type:"POST",
       data:{"id":id,"tipo":tipo},
       success:function(d){
//       alert("se hizo ");
            construirDetalles(d);
    }
        });
    
    }
    function construirDetalles(d){    
        $("#contenidoDetalles").html(d);
    }
    
        </script>      
</body>

            <script src="../../js/functionATRView.js" type="text/javascript"></script>
            <!--<script src="../../js/loaderanimation.js" type="text/javascript"></script>-->
                        <!--Termina para el spiner cargando-->

            <!--Bootstrap-->
            <script src="../../assets/probando/js/bootstrap.min.js"></script>
            <!--Para abrir alertas de aviso, success,warning, error-->
            <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>

            <!--Para abrir alertas del encabezado-->
            <script src="../../assets/probando/js/ace-elements.min.js"></script>
            <script src="../../assets/probando/js/ace.min.js"></script>
 
</html>

              
		