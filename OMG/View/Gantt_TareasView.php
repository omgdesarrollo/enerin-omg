<?php
session_start();
require_once '../util/Session.php';
if(isset($_REQUEST["id_tarea"])){
   Session::setSesion("dataGantt_id_tarea",$_REQUEST["id_tarea"]);
    //    echo "el seguimiento de entrada linkeado al de doc de entrada y al folio de entrada   ".$dataGantt=Session::getSesion("dataGantt");;
    echo "<h2><center></center><h2>";
}else{
    $dataGantt=Session::getSesion("dataGantt_id_tarea");
    echo "<h2><center></center><h2>";
}
//Session::setSesion("dataGantt",$_REQUEST["id_documento_entrada"]);
//  Session::setSesion("dataGantt",":(");
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <!--<meta charset="UTF-8" name="viewport" content="width=500, initial-scale=1, maximum-scale=1">-->
        <title></title>
        
    <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--Para abrir alertas de aviso, success,warning, error--> 
    <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>    
<!--        <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
  <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
  <script src="../../assets/dhtmlxGantt/api.js" type="text/javascript"></script>-->
        <link href="../../assets/gantt_5.1.2_com/codebase/dhtmlxgantt.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/gantt_5.1.2_com/codebase/dhtmlxgantt.js" type="text/javascript"></script>
        <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_auto_scheduling.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_auto_scheduling.js.map"></a>-->
    <!--<script src="../../js/jquery.js" type="text/javascript"></script>-->
    <script src="../../js/jquery.min.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- cargar archivo -->
<!--    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">-->
    
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_critical_path.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_critical_path.js.map"></a>-->
    
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_csp.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_csp.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_fullscreen.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_fullscreen.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_grouping.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_grouping.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_keyboard_navigation.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_keyboard_navigation.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_marker.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_marker.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_multiselect.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_multiselect.js.map"></a>-->
    
    <!--aqui empieza para hacer aparecer la ventanita cuando seleccionas--> 
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_quick_info.js" type="text/javascript"></script>-->
    <!--aqui cierra-->
    <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_quick_info.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_smart_rendering.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_smart_rendering.js.map"></a>-->
    <script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_tooltip.js" type="text/javascript"></script>
<!--    <a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_tooltip.js.map"></a>-->
    <script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_undo.js" type="text/javascript"></script>
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_undo.js.map"></a>-->
    <script src="../../assets/gantt_5.1.2_com/codebase/locale/locale_es.js" type="text/javascript"></script>
    <script src="https://export.dhtmlx.com/gantt/api.js?v=20180322"></script>
    
    <script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_fullscreen.js" type="text/javascript"></script>
    
    
   <!--<script src="../../codebase/ext/dhtmlxgantt_smart_rendering.js"></script>-->
   
   <script src="../../assets/gantt_5.1.2_com/codebase/sources/ext/dhtmlxgantt_keyboard_navigation.js" type="text/javascript"></script>
   
   <link href="../../assets/gantt_5.1.2_com/codebase/skins/dhtmlxgantt_meadow.css" rel="stylesheet" type="text/css"/>
   
    
     <link href="../../assets/gantt_5.1.2_com/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
   <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
   
   
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>-->
    <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>

    <!--aqui empieza librerias qe no son del gantt en funcionalidad y presentacion-->
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.1.6/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/18.1.6/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/18.1.6/js/dx.all.js"></script>
    <link href="../../css/PersonalizacionVistasGantt.css" rel="stylesheet" type="text/css"/>
    <!--aqui termina las librerias que no son del gantt-->
     
    
 <style type="text/css">
    html, body{
      height: 100%;
    }
    a{
        color: #337ab7;
        text-decoration: none;
        font-size: 15;
    }        
         .gantt_task_line.gantt_dependent_task {
			background-color: #65c16f;
                        /*background-color:  #0042e9;*/
			/*border: 1px solid #3c9445;*/
		}       
.gantt_task_line.gantt_dependent_task .gantt_task_progress {
			background-color: #46ad51;
		}           
       .gantt_task_progress {
			text-align: left;
			padding-left: 10px;
			box-sizing: border-box;
			color: white;
			font-weight: bold;
		}   
                /*estilos para ocultar el texto de la barra*/ 
                .gantt_task_content {
                    display: none;
                }   
                .completed_task {
		border: 1px solid #94AD94;
                }
                .completed_task .gantt_task_progress {
                    background: #0000cc;
                }
 .dx-treelist-borders > 
 .dx-treelist-pager, 
 .dx-treelist-borders > 
 .dx-treelist-headers,
 .dx-treelist-borders > 
 .dx-treelist-filter-panel{
            background-color:#307ECC ; 
            font-family: "Roboto Slab";
            font-size: 1.2em;
            font-weight: normal;
            }
          .dx-header-row > td > .dx-treelist-text-content {
    white-space: normal;
    vertical-align: top;
    color: white;
}               
#dx {
    /*max-height: 90%;*/
}

 .modal-lg{width: 50%;}
 #tabPanel{
     height: 8%;
 }
 
 

/* #detallesInformacion{
    height: 100px;
    width: 15%;
    background-color: #303030;
    float: left;
    resize: horizontal;
    overflow: hidden;;
    max-width: 30%;
 }*/


#mydiv {
    position: absolute;
    z-index: 9;
    background-color: #f1f1f1;
    text-align: center;
    border: 1px solid #d3d3d3;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    font-size: 10px;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
}


</style> 	
		    
  </head>
    <body>
 
<!-- Draggable DIV -->





<div class="accordion" id="accordionExample">


    
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
           Mostrar
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
          <div>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Detalles</button>
  <input type="submit" class="btn btn-info" value="Recargar" onclick="refrescarDatosGantt()">
  <!--<input type="submit" class="btn btn-info" value="Recargar Detalles" onclick="refrescarDatosGantt()">-->   
      

        <input type="radio" id="scale1" name="scale" value="1" checked/><label for=""><h5>Dia</h5></label>
<input type="radio" id="scale2" name="scale" value="2"/><label for=""><h5>Semana</h5></label>
<input type="radio" id="scale3" name="scale" value="3"/><label for=""><h5>Mes</h5></label>
<input type="radio" id="scale4" name="scale" value="4"/><label for=""><h5>Año</h5></label>
	<input value="deshacer" type="button" onclick='gantt.undo()' style='font-size: 10px'>
	<input value="Rehacer" type="button" onclick='gantt.redo()' style='font-size: 10px'>

        <input value="Exportar a PDF"  class="btn btn-info" type="button" onclick="gantt.exportToPDF()" style="margin:20px;">
    <input value="Exportar a PNG" class="btn btn-info" type="button" onclick="gantt.exportToPNG()">
<input value="Exportar a MS Proyect" class="btn btn-success" type="button" onclick='gantt.exportToMSProject({skip_circular_links: false})'
	   style='margin:20px;'>
<input value="Export a Excel" class="btn btn-info" type="button" onclick='gantt.exportToExcel({
    name:"document.xlsx", 
    columns:[
        { id:"text",  header:"Tarea", width:100 },
        { id:"start_date",  header:"Fecha de Inicio", width:50, type:"date" }
    ],
    server:"https://export.dhtmlx.com/gantt",
    visual:true,
    cellColors:true
})' style='margin:20px;'>
  
          </div>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
          
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
          
<div id="mydiv">
  <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
  <div id="mydivheader">Click Para Mover</div>
  
    
            <div  class="" id="detallesInformacion" style="width:100%;height:60% ;position: fixed;z-index: 4">

                <!--<div class="" id="tree-list"  >-->
                    <div id="dx" ></div>
                                      <!--</div>-->

            </div>
  
  
</div>
          
          
        
      </div>
    </div>
  </div>
</div>                 
      </div>
    </div>
  </div>
</div>

 <div class="" id="gantt_here" style='width: 100%;height: 75%;position: absolute'>       </div>
   
    
<script>
//Make the DIV element draggagle:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
    
    
    
    
    </body>
    
<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
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
    
    
<!-- Inicio de Seccion Modal Informe-->
<div class="modal draggable fade" id="detalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">
                        
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:inherit" aria-hidden="true" class="closeLetra">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Detalles</h4>
		      </div>

		      <div class="modal-body">
                    
                           <!--<div id="tree-list">-->
<!--                             <div id="dx"></div>-->
                            <!--</div>-->
                          <div id="tabPanel"></div>
                                <!--<div sty></div>-->
                        <!--<div id=""></div>-->

                      </div><!-- cierre div class-body -->
                </div><!-- cierre div class modal-content -->
        </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->


  <script type="text/javascript">  
  var dxtreeList;
//empieza para definir como mostrar las tareas si por dia,semana,mes,año
	function setScaleConfig(value) {
		switch (value) {
			case "1":
				gantt.config.scale_unit = "day";
				gantt.config.step = 1;
				gantt.config.date_scale = "%d %M";
				gantt.config.subscales = [];
				gantt.config.scale_height = 27;
				gantt.templates.date_scale = null;
				break;
			case "2":
				var weekScaleTemplate = function (date) {
					var dateToStr = gantt.date.date_to_str("%d %M");
					var startDate = gantt.date.week_start(new Date(date));
					var endDate = gantt.date.add(gantt.date.add(startDate, 1, "week"), -1, "day");
					return dateToStr(startDate) + " - " + dateToStr(endDate);
				};

				gantt.config.scale_unit = "week";
				gantt.config.step = 1;
				gantt.templates.date_scale = weekScaleTemplate;
//				gantt.config.subscales = [
//					{unit: "day", step: 1, date: "%D"}
//				];
                                gantt.config.subscales = [
					{unit: "week", step: 1, date: "%j"}
				];
				gantt.config.scale_height = 50;
				break;
			case "3":
				gantt.config.scale_unit = "month";
				gantt.config.date_scale = "%F, %Y";
//				gantt.config.subscales = [
//					{unit: "day", step: 1, date: "%j, %D"}
//				];
                                
                                
                                gantt.config.subscales = [
					{unit: "month", step: 1, date: "%M"}
				];
                                
                                
				gantt.config.scale_height = 50;
				gantt.templates.date_scale = null;
				break;
			case "4":
				gantt.config.scale_unit = "year";
				gantt.config.step = 1;
				gantt.config.date_scale = "%Y";
				gantt.config.min_column_width = 50;

				gantt.config.scale_height = 90;
				gantt.templates.date_scale = null;


				gantt.config.subscales = [
					{unit: "month", step: 1, date: "%M"}
				];
				break;
		}
	}
setScaleConfig('1');
//termina de definir si sera por dia,semana,mes ,año que se mostrara las tareas


	(function dynamicTaskType() {
		var delTaskParent;

		function checkParents(id) {
			setTaskType(id);
			var parent = gantt.getParent(id);
			if (parent != gantt.config.root_id) {
				checkParents(parent);
			}
		}

		function setTaskType(id) {
			id = id.id ? id.id : id;
			var task = gantt.getTask(id);
			var type = gantt.hasChild(task.id) ? gantt.config.types.project : gantt.config.types.task;
			if (type != task.type) {
				task.type = type;
				gantt.updateTask(id);
			}
		}

		gantt.attachEvent("onParse", function () {
			gantt.eachTask(function (task) {
				setTaskType(task);
			});
		});

		gantt.attachEvent("onAfterTaskAdd", function onAfterTaskAdd(id) {
			gantt.batchUpdate(checkParents(id));
		});

		gantt.attachEvent("onBeforeTaskDelete", function onBeforeTaskDelete(id, task) {
//			alert("antes");
//                       gantt.refreshData();
                        delTaskParent = gantt.getParent(id);
                      
                       var desc=false;
                        $.ajax({
                                url:"../Controller/GanttTareasController.php?Op=descendencia&deleteidtarea="+id,
                                async:false,
                                success:function (res)
                                {
                                 
                                    if(res==true){                                        
                                         desc=false;
                                    }else{
                                        if(res==false){
                                             desc=true;
                                    }
                                    }
                                }
                              });
			return desc;
		});

		gantt.attachEvent("onAfterTaskDelete", function onAfterTaskDelete(id, task) {
                             $.ajax({
                                url:"../Controller/GanttTareasController.php?Op=EliminarTarea&deleteidtarea="+id,
                                success:function (res){

                                }
           
                              });
                                 
                                if (delTaskParent != gantt.config.root_id) {
				gantt.batchUpdate(checkParents(delTaskParent));       
                         }
		});
	})();            
      	(function dynamicProgress() {

		function calculateSummaryProgress(task) {
			if (task.type != gantt.config.types.project){
				return task.progress;
                            }
			var totalToDo = 0;
			var totalDone = 0;
			gantt.eachTask(function (child) {
				if (child.type != gantt.config.types.project) {
                                    
//					totalToDo += child.duration;
                                          totalToDo += (child.porcentaje_por_actividad/100);
//					totalDone += (child.progress || 0) * child.duration;
                                          totalDone += (child.progress || 0) * (child.porcentaje_por_actividad/100);
				}
			}, task.id);
			if (!totalToDo) return 0;
			else return totalDone / totalToDo;
                        
		}

		function refreshSummaryProgress(id, submit) {
			if (!gantt.isTaskExists(id)){
				return;
                            }

			var task = gantt.getTask(id);
			task.progress = calculateSummaryProgress(task);
			if (!submit) {
				gantt.refreshTask(id);
			} else {
				gantt.updateTask(id);
			}

			if (!submit && gantt.getParent(id) !== gantt.config.root_id) {
				refreshSummaryProgress(gantt.getParent(id), submit);
			}
		}
                function calculoDatosSumaProgreso(){
                
                
                }
                
		gantt.attachEvent("onParse", function () {
                   
//                   obtenerTareas().then(function (){
//construirTreeList();
//
//});
                   
                   
                   
                   
			gantt.eachTask(function (task) {
//                             alert("e");
				task.progress = calculateSummaryProgress(task);
			});
		});
		gantt.attachEvent("onAfterTaskUpdate", function (id,item) {
                    
//                    obtenerTareas().then(function (){
//construirTreeList();
//
//});
                    
                    
                    
                    
                    if(item.progress==1)
                        gantt.getTask(id).readonly = true;
//                    console.log(gantt.getTask(id));
			refreshSummaryProgress(gantt.getParent(id), true);
		});

		gantt.attachEvent("onTaskDrag", function (id) {
			refreshSummaryProgress(gantt.getParent(id), false);
		});
		gantt.attachEvent("onAfterTaskAdd", function (id) {
			refreshSummaryProgress(gantt.getParent(id), true);
		});

		(function () {
			var idParentBeforeDeleteTask = 0;
			gantt.attachEvent("onBeforeTaskDelete", function (id) {
				idParentBeforeDeleteTask = gantt.getParent(id);
			});
			gantt.attachEvent("onAfterTaskDelete", function () {
				refreshSummaryProgress(idParentBeforeDeleteTask, true);
			});
		})();
	})();
     var dataEmpleados=[];
//     var data
     obtenerEmpleados();
      gantt.serverList("user",dataEmpleados); 

	gantt.locale.labels.column_owner ="Encargado";
        gantt.locale.labels.section_owner = "Encargado";
        
       gantt.locale.labels.section_statusname="Estatus";
       gantt.locale.labels.column_statusname="Estatus";
        gantt.locale.labels.section_notas="Notas";
        gantt.config.scale_height = 50;
        gantt.config.order_branch = true;
        
        gantt.config.branch_loading = true;
gantt.config.order_branch_free = true;
        gantt.templates.task_class = function (start, end, task) {
		if (task.type == gantt.config.types.project){
//                    console.log("entro ");
			return "hide_project_progress_drag";
                }
                    if(task.progress==1){
                        return "completed_task";
                    }else{
                        return "";
                    }
                
	};
        gantt.locale.labels["complete_button"] = "Completar";
//        console.log(gantt.locale.labels);
	gantt.config.buttons_left = ["dhx_save_btn", "dhx_cancel_btn", "complete_button"];
        gantt.attachEvent("onLightboxButton", function (button_id, node, e) {
		if (button_id == "complete_button") {
			var id = gantt.getState().lightbox;
			gantt.getTask(id).progress = 1;
			gantt.updateTask(id)
			gantt.hideLightbox();
		}
	});
 

        	gantt.config.open_tree_initially = true;
//        	para cerrar las carpetas por default desde el principio

	function byId(list, id) {
		for (var i = 0; i < list.length; i++) {
			if (list[i].key == id)
				return list[i].label || "";
		}
		return "";
	}
        
 var textEditor = {type: "text", map_to: "text"};   
gantt.config.columns=[
//    {name:"id",   label:"id",   align:"center"},
		{name: "text", label: "Nombre", tree: true,resize: true, editor: textEditor},
		
		{
                    name: "owner", width: 80, align: "center",resize: true, template: function (item) {
				return byId(gantt.serverList('user'), item.user)
                    }
		},
//                {name: "status", label: "Status",resize: true},
		{name: "add", width: 40}
	];
//console.log(gantt);

//var status=[];
var opcionstatus = [
    { key: 1, label: 'En Proceso' },
    { key: 2, label: 'Suspendido' }
];
        gantt.config.lightbox.sections = [
		{name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
                {name: "statusname", height: 38, map_to: "status", type: "select", options:opcionstatus},
                {name: "notas", height: 38, map_to: "notas", type: "textarea"},
		{name: "owner", height: 22, map_to: "user", type: "select", options:dataEmpleados},	
		{name: "time", type: "duration", map_to: "auto"}
	];




	var weekScaleTemplate = function (date) {
		var dateToStr = gantt.date.date_to_str("%d %M");
		var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
		return dateToStr(date) + " - " + dateToStr(endDate);
	};
gantt.config.subscales = [
//		{unit: "week", step: 1, template: weekScaleTemplate},
		{unit: "day", step: 1, date: "%j, %D"}
	];

//inicia para expandir o colapsar


//        termina para expandir o colapsar

gantt.config.scale_unit = "month";
gantt.config.step = 1;
gantt.config.date_scale = "%F, %Y";
gantt.config.min_column_width = 50;
gantt.config.order_branch = true;
gantt.config.order_branch_free = true;
gantt.config.branch_loading = true;
gantt.config.fit_tasks = true; 
gantt.config.work_time = false;
gantt.config.auto_scheduling = true;
gantt.config.autosize=false; 


gantt.config.autoscroll = true;
gantt.config.auto_scheduling_strict = true;

gantt.config.sort = true;
//gantt.config.readonly = true;
gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";



    gantt.init("gantt_here");
    gantt.load("../Controller/GanttTareasController.php?Op=ListarTodasLasTareasPorId");


var dp = new gantt.dataProcessor("../Controller/GanttTareasController.php?Op=Modificar");
dp.init(gantt);
//dp.autoUpdate=false;
//dp.attachEvent("onBeforeUpdate", function (id, status, data) {
//         return true;
//});


//empieza en cuanto a el modo de mostrar las tareas por dia,seman,mes,año
	var func = function (e) {
		e = e || window.event;
		var el = e.target || e.srcElement;
		var value = el.value;
		setScaleConfig(value);
		gantt.render();
	};
       	var els = document.getElementsByName("scale");
	for (var i = 0; i < els.length; i++) {
		els[i].onclick = func;
	} 

    function obtenerEmpleados(){     
        $.ajax({
//           url:"../Controller/GanttController.php?Op=ListarEmpleados",
            url:"../Controller/GanttTareasController.php?Op=empleadosNombreCompleto",
//           url:"../Controller/EmpleadosController.php?Op=nombresCompletos",
           data:"",
           async:false,
           success:function (res){
               
               $.each(res,function(index,value){
//                   dataEmpleados.push({key:value.id_empleado,label:value.nombre_empleado});
                   dataEmpleados.push({key:value.id_empleado,label:value.nombre_completo});
             });
           }
           
        });
    }
    gantt.templates.progress_text = function (start, end, task) {
//        if(Math.round(task.progress * 100)==100){
//            $(".gantt_task_line.gantt_dependent_task .gantt_task_progress ").css("background-color","red");
//        }
                $("#taskid").css("background-color:","red");
		return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
	};
        

    var datosTreeList=[]; 
    $(function (){
//        $("#detallesInformacion" ).draggable();
              
obtenerTareas().then(function (){
construirTreeList();

});

    });
    
    function obtenerTareas(){
        return new Promise(function (resolve,reject){
                $.ajax({
                                        url:"../Controller/GanttTareasController.php?Op=ListarTodasLasTareasDetallesPorSuId",
                                        async:false,
                                        success:function (res)
                                        {
                                            datosTreeList=[];
                                            
                                            $.each(res.data,function(index,value){
//                                                console.log(value);
                                                datosTreeObj=new Object();
                                                datosTreeObj["id"]= value.id;
                                                datosTreeObj["parent"]= value.parent;
                                                datosTreeObj["text"]= value.text;
                                                datosTreeObj["user"]= value.user;
                                                datosTreeObj["notasname"]= value.notas;
                                                datosTreeObj["porcentaje_por_actividad"]= value.porcentaje_por_actividad;
                                                datosTreeObj["ponderado_real"]= "value.ponderado_real";
                                                datosTreeObj["avance"]=Math.round(value.progress*100);
                                                datosTreeObj["archivo_adjunto"]= "<button onClick='mostrar_urls("+value.id+")' type='button' class='btn btn-info botones_vista_tabla' data-toggle='modal' data-target='#create-itemUrls'>";
                                                datosTreeObj["archivo_adjunto"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button>";
                                                datosTreeObj["status"]= value.status;
                                                datosTreeList.push(datosTreeObj);
                                            });
                                         resolve();
                                        }
                                      });
                                      
                                  })
        }  
  function construirTreeList(){
   dxtreeList= $("#dx").dxTreeList({
        dataSource: datosTreeList,
        keyExpr: "id",
//        parentIdExpr: "Head_ID",
         parentIdExpr: "parent",
        showRowLines: true,
        showBorders: true,
        columnAutoWidth: true,
        autoExpandAll: true,
        allowColumnResizing: true,
        columnAutoWidth: true,
        allowColumnReordering: true,
        height:700,
        columnChooser: {
        allowSearch: false,
        emptyPanelText: "Seleccionar Columna ",
        enabled: true,
        height: 360,
        mode: "dragAndDrop",
        searchTimeout: 500,
        title: "Columna A Ocultar",
        width: 300
        },
        columnResizingMode: "nextColumn",
        columnFixing: {
        enabled: false,
        texts: {
            fix: "Fix",
            leftPosition: "To the left",
            rightPosition: "To the right",
            unfix: "Unfix"
        },
        },
        editing: {
            mode: "cell",
            allowUpdating: true,
//            allowDeleting: false,
//            allowAdding: false
//            texts:{
//              editRow: "Editar",
//              saveRowChanges: "Guardar",
//              cancelRowChanges: "Cancelar",
//            }
        },
        filterRow: {
        applyFilter: "auto",
        applyFilterText: "Apply filter",
        betweenEndText: "End",
        betweenStartText: "Start",
        operationDescriptions: {
        between: "Between",
        contains: "Contains",
        endsWith: "Ends with",
        equal: "Equals",
        greaterThan: "Greater than",
        greaterThanOrEqual: "Greater than or equal to",
        lessThan: "Less than",
        lessThanOrEqual: "Less than or equal to",
        notContains: "Does not contain",
        notEqual: "Does not equal",
        startsWith: "Starts with"   
        },
        resetOperationText: "Reset",
        showAllText: "",
        showOperationChooser: true,
        visible: true
        },
        noDataText: "No Hay Datos",
        paging: {
            enabled: true,
            pageSize: 10
        },
        pager: {
        allowedPageSizes: null,
        infoText: "Pagina {0} de {1}",
        showInfo: true,
        showNavigationButtons: true,
        showPageSizeSelector: true,
        visible: true
        },
        searchPanel: {
        highlightCaseSensitive: false,
        highlightSearchText: true,
        placeholder: "Search...",
        searchVisibleColumnsOnly: false,
        text: "",
        visible: true,
        width: 160
        },
        loadPanel: {
        enabled: true,
        height: 90,
        indicatorSrc: "",
        showIndicator: true,
        showPane: true,
        text: "Loading...",
        width: 200
        },
        onRowClick:(args)=>{
//            console.log(args);
        },
        onRowUpdated:function (args){
            console.log(args);
            if( args.data.hasOwnProperty('notasname') ) {
                actualizarDeTablaDetalles("notas",args.data["notasname"],args.key);   
            }
            if( args.data.hasOwnProperty('user') ) {
                actualizarDeTablaDetalles("user",args.data["user"],args.key);
            }
            if(args.data.hasOwnProperty('status')){
                actualizarDeTablaDetalles("status",args.data["status"],args.key);
            }
            if(args.data.hasOwnProperty('porcentaje_por_actividad')){
                saberSiSumanPorcentajePonderadoProgramado100loshijos(args);
            }
            
            
            
            
        },
        columns:[
            {
                dataField: "id",
                caption: "ID",
                allowEditing:false
            },
            {
                dataField: "text",
                caption: "Descripcion de la Actividad",
                 allowEditing:false
            },
            
            { 
                dataField: "user",
                caption: "Responsable",
                 allowEditing:true,
                  lookup: {
                    dataSource:dataEmpleados,
                    valueExpr: "key",
                    displayExpr: "label"
                }
            },
            
            { 
                dataField: "porcentaje_por_actividad",
                 caption: "Peso de la Actividad",
                  allowEditing:true
            },
             { 
                dataField: "avance",
                 caption: "Avance (%)",
                  allowEditing:false
                
            },
            { 
                dataField: "notasname",
                caption: "Notas",
                 allowEditing:true,
                 allowUpdating:true
            },
            { 
                dataField: "status",
                caption: "Estatus",
                 allowEditing:false,
                  lookup: {
                    dataSource:opcionstatus,
                    valueExpr: "key",
                    displayExpr: "label"
                }
            },
             { 
                dataField: "archivo_adjunto",
                 captbion: "Archivo Adjunto",
                 cellTemplate:archivoAdjuntoCellTemplate,
                  allowEditing:false
                  
            }
        ],
//        ,
//        onCellPrepared: function(e) {
//            console.log(e);
//            if(e.column.command === "edit") {
//                e.cellElement.children(".dx-link-add").remove();
//            }
//        },
//        onEditorPreparing: function(e) {
//            console.log("pre");
//            console.log(e);
//            console.log("termine pre");
//            if(e.dataField === "parent" && e.row.data.id === 1) {
//                e.cancel = true;
//            }
//        },
//        onInitNewRow: function(e) {
//            e.data.parent = 1;
//        },
        expandedRowKeys: [1, 2, 3, 4, 5]
    });
    
    
    }
   var archivoAdjuntoCellTemplate= function(container, options) {       
//       console.log(options);
      return container.context.innerHTML=options.data.archivo_adjunto;
};
    
    function refrescarDatosGantt(){
        gantt.refreshData();
        gantt.init('gantt_here');
        $.when(gantt.load("../Controller/GanttTareasController.php?Op=ListarTodasLasTareasPorId")).then(function(){
                
                
            obtenerTareas().then(function (){
                construirTreeList();

            });


                
                
                
                
                
                
        });
    }
    function detallesActividadesCompletasGantt(){
        if( $("#detallesInformacion").css("display")!="none"){
                 $("#detallesInformacion").css("display","none");               
        }else{
            $("#detallesInformacion").css("display","");
        }

} 
    var datosModificadosActividadesPonderado_ProgramadoTemp=[];
    var id_padreTareaPonderado_programadoTemp=-1;
    function saberSiSumanPorcentajePonderadoProgramado100loshijos(args)
    {
        var bandera=1;
        var key = args.key;
        var sumatoria = 0;
        var dataFinal=[];
        $.each(datosTreeList,(index,value)=>
        {
            if(value.id == key)
            {
                if(value.parent != id_padreTareaPonderado_programadoTemp)
                {
                    datosModificadosActividadesPonderado_ProgramadoTemp=[];
                    id_padreTareaPonderado_programadoTemp = value.parent;
//                    console.log("reiniciado");
                }
            }
        });
            $.each(datosModificadosActividadesPonderado_ProgramadoTemp,(index,value)=>{
                if(value.key == key)
                {
                    datosModificadosActividadesPonderado_ProgramadoTemp[index] = args;
                    bandera=0;
                }
            });
        // }
        if(bandera==1)
            datosModificadosActividadesPonderado_ProgramadoTemp.push(args);
        
        $.each(datosTreeList,(index,value)=>
        {
            // console.log(value); 
            if(id_padreTareaPonderado_programadoTemp == value.parent)
            {
                sumatoria += parseFloat(value.porcentaje_por_actividad);
            }
            
        });
//        console.log(datosModificadosActividadesPonderado_ProgramadoTemp);
        if(sumatoria>=100 && sumatoria<=100.5)
        {
            alert("Correcto");
//            console.log(args);
//console.log(datosModificadosActividadesPonderado_ProgramadoTemp);
            $.each(datosModificadosActividadesPonderado_ProgramadoTemp,(index,value)=>{
                dataFinal.push({id:parseInt(value.key),ponderado_programado:value.data.porcentaje_por_actividad});
            });
            $.ajax({
                url:'../Controller/GanttTareasController.php?Op=GuardarPonderado',
                type:"POST",
                data: "DATA="+JSON.stringify(dataFinal),
                success:(res)=>
                {
                    if(typeof(res)=="number" && res==1)
                        alert("Modificado en la base de datos con "+parseFloat((sumatoria-100).toString().slice(0,4))+" de mas");
                    else
                        alert(res);
                },
                error:()=>
                {
                    console.log("Error en el servidor");
                }
            })
        }
        else
        {
            if(sumatoria<100){
                alert("El total es menor al 100% del ponderado de la tarea padre  su sumatoria es "+sumatoria +" y su restante es de "+(100-sumatoria)+" no se guardo ");
                
            }else
            alert("El total es mayor al 100% del ponderado de la tarea padre no se guardo ");
        }
    }
    
    
    
    function actualizarDeTablaDetalles(COLUMNA,VALUE,ID_TAREA){
//    console.log(data);
     $.ajax({
                url:'../Controller/GanttTareasController.php?Op=actualizardetabladetalles',
                type:"POST",
                data:"COLUMNA="+COLUMNA+"&VALUE="+VALUE+"&ID_TAREA="+ID_TAREA,
                success:(res)=>
                {
                   
                   
                   
                },
                error:()=>
                {
                    console.log("Error en el servidor");
                }
            })
    
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
    months = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];

    function mostrar_urls(id)
    {
            id_tarea= <?php echo Session::getSesion("dataGantt_id_tarea")?>;
            var tempDocumentolistadoUrl = "";
            URL = 'gantt/gantt_tareas/'+id_tarea+'/'+id;
            $.ajax({
                    url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                    type: 'GET',
                    data: 'URL='+URL+'&SIN_CONTRATO=',
                    success: function(todo)
                    {
                            if(todo[0].length!=0)
                            {
                                    tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                                    $.each(todo[0], function (index,value)
                                    {
                                            nametmp = value.split("^-O-^-M-^-G-^");
                                            fecha = new Date(nametmp[0]*1000);
                                            fecha = fecha.getDate() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();

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
                            tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id+"'>";
                            // alert(tempDocumentolistadoUrl);
                            $('#DocumentoEntradaAgregarModal').html(" ");
                            $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                            $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                            // $('#fileupload').fileupload();
                            $('#fileupload').fileupload({
                            url: '../View/',
                            });
                    }
            });
    }
    
    
    function agregarArchivosUrl()
    {
            id_tarea= <?php echo Session::getSesion("dataGantt_id_tarea")?>;
            var ID = $('#tempInputIdDocumento').val();
            url = 'gantt/gantt_tareas/'+id_tarea+'/'+ID,
            $.ajax({
                    url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
                    type: 'GET',
                    data: 'URL='+url+'&SIN_CONTRATO=',
                    success:function(creado)
                    {
                            if(creado==true)
                                    $('.start').click();
                    },
                    error:function()
                    {
                            swalError("Error del servidor");
                    }
            });
    }
    
    
    function borrarArchivo(url)
    {

        swal({
                title: "ELIMINAR",
                text: "Confirme para eliminar el Archivo",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
                }, function()
                {
                        var ID = $('#tempInputIdDocumento').val();
                        $.ajax({
                                url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
                                type: 'GET',
                                data: 'URL='+url+'&SIN_CONTRATO=',
                                success: function(eliminado)
                                {
                                        // eliminar = eliminado;
                                        if(eliminado)
                                        {
                                                mostrar_urls(ID);
//                                                refresh();
                                                swal("","Archivo eliminado");
                                                setTimeout(function(){swal.close();},1000);
                                        }
                                        else
                                                swal("","Ocurrio un error al eliminar el archivo", "error");
                                },
                                error:function()
                                {
                                        swal("","Ocurrio un error al elimiar el archivo", "error");
                                }
                        });
                });
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
        {% if(t == 1){ if( $('#tempInputIdDocumento').length > 0 ) { var ID = $('#tempInputIdDocumento').val(); mostrar_urls(ID);}else{ $('#btnAgregarDocumentoEntradaRefrescar').click(); } } %}
</script>

    <!--Para abrir alertas de aviso, success,warning, error-->       
    <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
  
    
        <!-- js cargar archivo -->
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

    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
  
  
</html>
