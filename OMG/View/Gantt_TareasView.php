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
        <title></title>
        
        
<!--        <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
  <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
  <script src="../../assets/dhtmlxGantt/api.js" type="text/javascript"></script>-->
        <link href="../../assets/gantt_5.1.2_com/codebase/dhtmlxgantt.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/gantt_5.1.2_com/codebase/dhtmlxgantt.js" type="text/javascript"></script>
        <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_auto_scheduling.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_auto_scheduling.js.map"></a>-->
    
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
   <script src="../../js/jquery.min.js" type="text/javascript"></script>
   <script src="../../assets/gantt_5.1.2_com/codebase/sources/ext/dhtmlxgantt_keyboard_navigation.js" type="text/javascript"></script>
   
   <link href="../../assets/gantt_5.1.2_com/codebase/skins/dhtmlxgantt_meadow.css" rel="stylesheet" type="text/css"/>
   
    
     <link href="../../assets/gantt_5.1.2_com/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
   <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
   
   
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>-->
    <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>

    <!--librerias para el treelist -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.1.6/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/18.1.6/css/dx.light.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.2/jszip.min.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/18.1.6/js/dx.all.js"></script>
    <!--termina el treelist -->
 <style type="text/css">
    html, body{
      /*width: 100%;*/
      height: 100%;
      padding:0px;
      margin:0px;
      /*overflow: hidden;*/
    }
    
    
    
    
/*    .mpp-sample {
			background: url("../../assets/gantt_5.1.2_com/samples/08_api/common/ms-project.png");
			width: 32px;
			height: 32px;
			background-repeat: no-repeat;
			padding-left: 40px;
			line-height: 32px;
			display: inline-block;
		}*/
                
         .gantt_task_line.gantt_dependent_task {
			background-color: #65c16f;
			border: 1px solid #3c9445;
		}       
.gantt_task_line.gantt_dependent_task .gantt_task_progress {
			background-color: #46ad51;
		}
/*         .hide_project_progress_drag .gantt_task_progress_drag {
			visibility: hidden;
		}*/
                
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
                /*termina estilos para ocultar el texto de la barra*/
                /* para la pantalla completa*/ 
/*                	.gantt-fullscreen {
			position: absolute;
			bottom: 20px;
			right: 20px;
			width: 30px;
			height: 30px;
			padding: 2px;
			font-size: 32px;
			background: transparent;
			cursor: pointer;
			opacity: 0.5;
			text-align: center;
			-webkit-transition: background-color 0.5s, opacity 0.5s;
			transition: background-color 0.5s, opacity 0.5s;
		}
                .gantt-fullscreen:hover {
			background: rgba(150, 150, 150, 0.5);
			opacity: 1;
		}*/
                /*termina para la pantalla completa*/ 
                
/*     .gantt_data_area {
    position: relative;
    overflow-x: auto;
    overflow-y: auto;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: auto;
}  */

 .dx-treelist-borders > 
 .dx-treelist-pager, 
 .dx-treelist-borders > 
 .dx-treelist-headers,
 .dx-treelist-borders > 
 .dx-treelist-filter-panel{
            background-color:#307ECC ; 
            /*color: #ffffff;*/
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
    max-height: 440px;
}

 .modal-lg{width: 99%;}
  </style> 	
		
  </head>
    <body>
        
        
     
  <form action="">
      <input type="submit" class="btn btn-info" value="Recargar">      
      
  </form>
        <input type="radio" id="scale1" name="scale" value="1" checked/><label for=""><h5>Dia</h5></label>
<input type="radio" id="scale2" name="scale" value="2"/><label for=""><h5>Semana</h5></label>
<input type="radio" id="scale3" name="scale" value="3"/><label for=""><h5>Mes</h5></label>
<input type="radio" id="scale4" name="scale" value="4"/><label for=""><h5>Año</h5></label>
<!--<div style="text-align:center;">-->
	<input value="deshacer" type="button" onclick='gantt.undo()' style='font-size: 10px'>
	<input value="Rehacer" type="button" onclick='gantt.redo()' style='font-size: 10px'>
        <button class="btn btn-danger" type="button" onclick='' data-toggle='modal' data-target='#detalles' style='font-size: 10px'>Detalles</button>
        
<!--</div>-->
        <?php  
        
//        echo"e  ".Session::getSesion("dataGantt");
        ?>
        <input value="Exportar a PDF"  class="btn btn-info" type="button" onclick="gantt.exportToPDF()" style="margin:20px;">
    <input value="Exportar a PNG" class="btn btn-info" type="button" onclick="gantt.exportToPNG()">
<input value="Exportar a MS Proyect" class="btn btn-success" type="button" onclick='gantt.exportToMSProject({skip_circular_links: false})'
	   style='margin:20px;'>
<input value="Export a Excel" class="btn btn-info" type="button" onclick='gantt.exportToExcel()' style='margin:20px;'>
  
<!--<div class="row">
		<div class="col-md-2 col-md-push-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Gantt info</h3>
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills nav-stacked" id="gantt_info">
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-10 col-md-pull-2">
			<div class="gantt_wrapper panel" id="gantt_here"></div>
		</div>
	</div>-->


<!--	<form id="mspImport" action="" method="POST" enctype="multipart/form-data">
		<input type="file" id="mspFile" name="file"
			   accept=".mpp,.xml, text/xml, application/xml, application/vnd.ms-project, application/msproj, application/msproject, application/x-msproject, application/x-ms-project, application/x-dos_ms_project, application/mpp, zz-application/zz-winassoc-mpp"/>
		<button id="mspImportBtn" type="submit">Seleccion el MS Proyect</button>
	</form>-->
    
    <div id="gantt_here" style='width:100%; height:100%;'></div>
    </body>
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
       
                           <div id="tree-list">
                             <div id="dx"></div>
                            </div>
                        <!--<div id=""></div>-->

                      </div><!-- cierre div class-body -->
                </div><!-- cierre div class modal-content -->
        </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->
  <script type="text/javascript">  
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
                                        growlError("Descendencia","Error Tiene Tareas En Descendencia");
//                                        alert("tiene descendencia ");
//                                         swalError("No se puede eliminar la actividad, tiene descendencia ");
                                        
                                         desc=false;
                                    }else{
                                        if(res==false){
//                                                    alert("no tiene descendencia");
//                                                    $.jGrowl("Eliminacion Exitosa", { header: '' });
                                             desc=true;
                                    }
                                    }
                                }
                              });
			return desc;
		});

		gantt.attachEvent("onAfterTaskDelete", function onAfterTaskDelete(id, task) {
//			alert("s");
//alert("des");
//                    alert("tarea eliminada es "+id);
                             $.ajax({
                                url:"../Controller/GanttTareasController.php?Op=EliminarTarea&deleteidtarea="+id,
                                success:function (res){

                                }
           
                              });
                                 
                                if (delTaskParent != gantt.config.root_id) {
				gantt.batchUpdate(checkParents(delTaskParent));
                                 
                         }
//                         window.location.href="GanttView.php";
		});
	})();            
      	(function dynamicProgress() {

		function calculateSummaryProgress(task) {
			if (task.type != gantt.config.types.project)
				return task.progress;
			var totalToDo = 0;
			var totalDone = 0;
			gantt.eachTask(function (child) {
				if (child.type != gantt.config.types.project) {
					totalToDo += child.duration;
					totalDone += (child.progress || 0) * child.duration;
				}
			}, task.id);
			if (!totalToDo) return 0;
			else return totalDone / totalToDo;
		}

		function refreshSummaryProgress(id, submit) {
			if (!gantt.isTaskExists(id))
				return;

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


		gantt.attachEvent("onParse", function () {
                   
			gantt.eachTask(function (task) {
//                             alert("e");
				task.progress = calculateSummaryProgress(task);
			});
		});

		gantt.attachEvent("onAfterTaskUpdate", function (id) {
			refreshSummaryProgress(gantt.getParent(id), true);
		});

		gantt.attachEvent("onTaskDrag", function (id) {
			refreshSummaryProgress(gantt.getParent(id), false);
		});
		gantt.attachEvent("onAfterTaskAdd", function (id) {
			refreshSummaryProgress(gantt.getParent(id), true);
//                         gantt.load("../Controller/GanttController.php?Op=MostrarTareasCompletasPorFolioDeEntrada");
                          
//                                var dp = new gantt.dataProcessor("../Controller/GanttController.php?Op=Modificar");

//                                dp.init(gantt);
//                        gantt.render();
//                        gantt.refreshData();
//                         alert("quedo agregado");
//                          $("#gantt_here").load("GanttView.php  #gantt_here");
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
        
        gantt.config.scale_height = 50;
        gantt.config.order_branch = true;
        
//        gantt.config.branch_loading = true;
//gantt.config.order_branch_free = true;
//        para abrir las carpetas por default desde el principio

gantt.templates.task_class = function (start, end, task) {
		if (task.type == gantt.config.types.project)
			return "hide_project_progress_drag";
	};

//        	gantt.config.open_tree_initially = true;
//        	para cerrar las carpetas por default desde el principio


//	gantt.locale.labels.column_stage =
//		gantt.locale.labels.section_stage = "Escenario";

	function byId(list, id) {
		for (var i = 0; i < list.length; i++) {
			if (list[i].key == id)
				return list[i].label || "";
		}
		return "";
	}
        
        
gantt.config.columns = [
    {name:"id",   label:"id",   align:"center" },
		{name: "text", label: "Nombre", tree: true, width: '*'},
		
		{
			name: "owner", width: 80, align: "center", template: function (item) {
				return byId(gantt.serverList('user'), item.user)
			}
		},
		{name: "add", width: 40}
	];


gantt.config.lightbox.sections = [
		{name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
		
		{name: "owner", height: 22, map_to: "user", type: "select", options: gantt.serverList("user")},	
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

//gantt.config.lightbox.project_sections = [
//		{name: "description", height: 70, map_to: "text", type: "textarea", focus: true},
//		{name: "time", type: "duration", map_to: "auto", readonly: true}
//	];



//inicia para expandir o colapsar

        
//        termina para expandir o colapsar

        gantt.config.scale_unit = "month";
	gantt.config.step = 1;
	gantt.config.date_scale = "%F, %Y";
	gantt.config.min_column_width = 50;
//        gantt.config.scale_height = 90;




gantt.config.order_branch = true;
gantt.config.order_branch_free = true;
gantt.config.branch_loading = true;
gantt.config.fit_tasks = true; 
gantt.config.work_time = false;
gantt.config.auto_scheduling = true;

	gantt.config.auto_scheduling_strict = true;

gantt.config.sort = true;
//gantt.config.readonly = true;
gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";



    gantt.init("gantt_here");
    gantt.load("../Controller/GanttTareasController.php?Op=ListarTodasLasTareasPorId");


var dp = new gantt.dataProcessor("../Controller/GanttTareasController.php?Op=Modificar");
dp.init(gantt);

//gantt.config.branch_loading = true;


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
 //termina en cuanto a el modo de mostrar las tareas por dia,seman,mes,año  
        
//dp.setTransactionMode("REST");

    console.log(dp);
    
    //para no actualizar en tiempo real 
//dp.autoUpdate=false;
//dp.action_param="status";


    
//    	gantt.attachEvent("onAfterTaskDrag", function (id, mode) {
//		var task = gantt.getTask(id);
//		if (mode == gantt.config.drag_mode.progress) {
//			var pr = Math.floor(task.progress * 100 * 10) / 10;
////			gantt.message(task.text + " is now " + pr + "% completed!");
//		} else {
//			var convert = gantt.date.date_to_str("%H:%i, %F %j");
//			var s = convert(task.start_date);
//			var e = convert(task.end_date);
////			gantt.message(task.text + " starts at " + s + " and ends at " + e);
//		}
//	});
    
//    gantt.attachEvent("onBeforeTaskDrag", function (id, mode) {
//		var task = gantt.getTask(id);
//		var message = "la Tarea "+task.text + " ";
//
//		if (mode == gantt.config.drag_mode.progress) {
//			message += "su progreso fue actualizado";
//		} else {
//			message += "se ha ";
//			if (mode == gantt.config.drag_mode.move)
//				message += "movido";
//			else if (mode == gantt.config.drag_mode.resize)
//				message += "reacomodado";
//		}
//
//		gantt.message(message);
//		return true;
//	});
    
//    gantt.templates.progress_text = function (start, end, task) {
//		return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
//	};
//    gantt.templates.task_class = function (start, end, task) {
//		if (task.type == gantt.config.types.project)
//			return "hide_project_progress_drag";
//	};

 
//    gantt.attachEvent("onTaskDrag", function (id) {
////        alert("d");
//			refreshSummaryProgress(gantt.getParent(id), false);
//		});
                
//             gantt.attachEvent("onTaskDrag", function(id, mode, task, original){
//  	var minimal_date = gantt.getState().min_date// + 86400;
//    minimal_date = gantt.date.add(minimal_date, 1, 'day');
// 	if (task.start_date < minimal_date) gantt.refreshData();
//  
//  	var maximal_date = gantt.getState().max_date// + 86400;
//    maximal_date = gantt.date.add(maximal_date, 1, 'day');
// 	if (task.end_date < maximal_date) gantt.refreshData();  
//});
//             gantt.attachEvent("onAfterAutoSchedule",function(taskId, updatedTasks){
//                 alert("");
//    // any custom logic here
//});
             
             
             
//        function refreshSummaryProgress(id, submit) {
////            alert("le has picado para avanzar");
//			if (!gantt.isTaskExists(id))
//				return;
//
//			var task = gantt.getTask(id);
//			task.progress = calculateSummaryProgress(task);
//
//			if (!submit) {
//				gantt.refreshTask(id);
//			} else {
//				gantt.updateTask(id);
//			}
//
//			if (!submit && gantt.getParent(id) !== gantt.config.root_id) {
//				refreshSummaryProgress(gantt.getParent(id), submit);
//			}
//		}
                
                
//                function calculateSummaryProgress(task) {
////                    alert("calcula el progreso del padre");
//			if (task.type != gantt.config.types.project)
//				return task.progress;
//			var totalToDo = 0;
//			var totalDone = 0;
//			gantt.eachTask(function (child) {
//				if (child.type != gantt.config.types.project) {
//					totalToDo += child.duration;
//					totalDone += (child.progress || 0) * child.duration;
//				}
//			}, task.id);
//			if (!totalToDo) return 0;
//			else return totalDone / totalToDo;
//		}
                
                
//                function checkParents(id) {
//			setTaskType(id);
//			var parent = gantt.getParent(id);
//			if (parent != gantt.config.root_id) {
//				checkParents(parent);
//			}
//		}
//                function setTaskType(id) {
//			id = id.id ? id.id : id;
//			var task = gantt.getTask(id);
//			var type = gantt.hasChild(task.id) ? gantt.config.types.project : gantt.config.types.task;
//			if (type != task.type) {
//				task.type = type;
////                                alert("");
//                                console.log("jh");
////cuando crea una tarea
//				gantt.updateTask(id);
////                                dp.init(gantt);
////                                gantt.refreshData();
////                                gantt.getTask(id).readonly = true;
////                                gantt.load("../Controller/GanttController.php?Op=MostrarTareasCompletasPorFolioDeEntrada");
////                                gantt.refreshTask(id);
//			}
//		}
//    gantt.parse(tasksA);
    
    
   
    
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
		return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
	};
    
    $(function (){
        
        
        
obtenerTareas();
    
  
    
    
      
//     gantt.batchUpdate(function () {
////         alert("se ha cargado el gantt exitosamente");
//    gantt.eachSelectedTask(function(task_id){
//        if(gantt.isTaskExists(task_id))
//            gantt.deleteTask(task_id);
//    });
//});
//     gantt.attachEvent("onParse", function () {
////         alert("le has picado ");
//			gantt.eachTask(function (task) {
//				setTaskType(task);
//			});
//		}); 
      
      

    });
var datosTreeList=[];
    
    function obtenerTareas(){
  $.ajax({
                                url:"../Controller/GanttTareasController.php?Op=ListarTodasLasTareasDetallesPorSuId",
                                async:false,
                                success:function (res)
                                {
                                 datosTreeList=res.data;
                                  construirTreeList();
                                }
                              });
    }
  function construirTreeList(){
             
   $("#dx").dxTreeList({
        dataSource: datosTreeList,
        keyExpr: "id",
//        parentIdExpr: "Head_ID",
         parentIdExpr: "parent",
        showRowLines: true,
        showBorders: true,
        columnAutoWidth: true,
        editing: {
            mode: "row",
            allowUpdating: true,
            allowDeleting: false,
            allowAdding: false,
            texts:{
              editRow: "Editar",
              saveRowChanges: "Guardar",
              cancelRowChanges: "Cancelar",
            }
        },
        columns:[
            {
                dataField: "id",
                caption: "id",
                allowEditing:false
            },
            {
                dataField: "text",
                caption: "Nombre de la Actividad",
                validationRules: [{ type: "required" }]
            },
            
            { 
                dataField: "user",
                caption: "Responsable",
                validationRules: [{ type: "required" }],
                 allowEditing:false,
                  lookup: {
                    dataSource:dataEmpleados,
                    valueExpr: "key",
                    displayExpr: "label"
                }
            },
            { 
                dataField: "notas",
                caption: "Notas",
                validationRules: [{ type: "required" }]
            },
            { 
                dataField: "ponderado_programado",
                 caption: "Ponderado Programado",
                validationRules: [{ type: "required" }]
            },
             { 
                dataField: "ponderado_real",
                 caption: "Ponderado Real",
                validationRules: [{ type: "required" }]
            },
             { 
                dataField: "avance",
                 caption: "Avance",
                  allowEditing:false
                
            }
//            ,
//            {
//                dataField: "Title",
//                caption: "Position",
//                validationRules: [{ type: "required" }]
//            }, {
//                dataField: "Hire_Date",
//                dataType: "date",
//                width: 120,
//                validationRules: [{ type: "required" }]
//            }
        ],
        onCellPrepared: function(e) {
            if(e.column.command === "edit") {
                e.cellElement.children(".dx-link-add").remove();
            }
        },
        onEditorPreparing: function(e) {
            if(e.dataField === "Head_ID" && e.row.data.ID === 1) {
                e.cancel = true;
            }
        },
        onInitNewRow: function(e) {
            e.data.Head_ID = 1;
        },
        expandedRowKeys: [1, 2, 3, 4, 5]
    }); 
    }
    
    var employees = [{
    "ID": 1,
    "Head_ID": 0,
    "Full_Name": "John Heart",
    "Prefix": "Mr.",
    "Title": "CEO",
    "City": "Los Angeles",
    "State": "California",
    "Email": "jheart@dx-email.com",
    "Skype": "jheart_DX_skype",
    "Mobile_Phone": "(213) 555-9392",
    "Birth_Date": "1964-03-16",
    "Hire_Date": "1995-01-15"
}, {
    "ID": 2,
    "Head_ID": 1,
    "Full_Name": "Samantha Bright",
    "Prefix": "Dr.",
    "Title": "COO",
    "City": "Los Angeles",
    "State": "California",
    "Email": "samanthab@dx-email.com",
    "Skype": "samanthab_DX_skype",
    "Mobile_Phone": "(213) 555-2858",
    "Birth_Date": "1966-05-02",
    "Hire_Date": "2004-05-24"
}, {
    "ID": 3,
    "Head_ID": 1,
    "Full_Name": "Arthur Miller",
    "Prefix": "Mr.",
    "Title": "CTO",
    "City": "Denver",
    "State": "Colorado",
    "Email": "arthurm@dx-email.com",
    "Skype": "arthurm_DX_skype",
    "Mobile_Phone": "(310) 555-8583",
    "Birth_Date": "1972-07-11",
    "Hire_Date": "2007-12-18"
}, {
    "ID": 4,
    "Head_ID": 1,
    "Full_Name": "Robert Reagan",
    "Prefix": "Mr.",
    "Title": "CMO",
    "City": "Bentonville",
    "State": "Arkansas",
    "Email": "robertr@dx-email.com",
    "Skype": "robertr_DX_skype",
    "Mobile_Phone": "(818) 555-2387",
    "Birth_Date": "1974-09-07",
    "Hire_Date": "2002-11-08"
}, {
    "ID": 5,
    "Head_ID": 1,
    "Full_Name": "Greta Sims",
    "Prefix": "Ms.",
    "Title": "HR Manager",
    "City": "Atlanta",
    "State": "Georgia",
    "Email": "gretas@dx-email.com",
    "Skype": "gretas_DX_skype",
    "Mobile_Phone": "(818) 555-6546",
    "Birth_Date": "1977-11-22",
    "Hire_Date": "1998-04-23"
}, {
    "ID": 6,
    "Head_ID": 3,
    "Full_Name": "Brett Wade",
    "Prefix": "Mr.",
    "Title": "IT Manager",
    "City": "Reno",
    "State": "Nevada",
    "Email": "brettw@dx-email.com",
    "Skype": "brettw_DX_skype",
    "Mobile_Phone": "(626) 555-0358",
    "Birth_Date": "1968-12-01",
    "Hire_Date": "2009-03-06"
}, {
    "ID": 7,
    "Head_ID": 5,
    "Full_Name": "Sandra Johnson",
    "Prefix": "Mrs.",
    "Title": "Controller",
    "City": "Beaver",
    "State": "Utah",
    "Email": "sandraj@dx-email.com",
    "Skype": "sandraj_DX_skype",
    "Mobile_Phone": "(562) 555-2082",
    "Birth_Date": "1974-11-15",
    "Hire_Date": "2005-05-11"
}, {
    "ID": 8,
    "Head_ID": 4,
    "Full_Name": "Ed Holmes",
    "Prefix": "Dr.",
    "Title": "Sales Manager",
    "City": "Malibu",
    "State": "California",
    "Email": "edwardh@dx-email.com",
    "Skype": "edwardh_DX_skype",
    "Mobile_Phone": "(310) 555-1288",
    "Birth_Date": "1973-07-14",
    "Hire_Date": "2005-06-19"
}, {
    "ID": 9,
    "Head_ID": 3,
    "Full_Name": "Barb Banks",
    "Prefix": "Mrs.",
    "Title": "Support Manager",
    "City": "Phoenix",
    "State": "Arizona",
    "Email": "barbarab@dx-email.com",
    "Skype": "barbarab_DX_skype",
    "Mobile_Phone": "(310) 555-3355",
    "Birth_Date": "1979-04-14",
    "Hire_Date": "2002-08-07"
}, {
    "ID": 10,
    "Head_ID": 2,
    "Full_Name": "Kevin Carter",
    "Prefix": "Mr.",
    "Title": "Shipping Manager",
    "City": "San Diego",
    "State": "California",
    "Email": "kevinc@dx-email.com",
    "Skype": "kevinc_DX_skype",
    "Mobile_Phone": "(213) 555-2840",
    "Birth_Date": "1978-01-09",
    "Hire_Date": "2009-08-11"
}, {
    "ID": 11,
    "Head_ID": 5,
    "Full_Name": "Cindy Stanwick",
    "Prefix": "Ms.",
    "Title": "HR Assistant",
    "City": "Little Rock",
    "State": "Arkansas",
    "Email": "cindys@dx-email.com",
    "Skype": "cindys_DX_skype",
    "Mobile_Phone": "(818) 555-6655",
    "Birth_Date": "1985-06-05",
    "Hire_Date": "2008-03-24"
}, {
    "ID": 12,
    "Head_ID": 8,
    "Full_Name": "Sammy Hill",
    "Prefix": "Mr.",
    "Title": "Sales Assistant",
    "City": "Pasadena",
    "State": "California",
    "Email": "sammyh@dx-email.com",
    "Skype": "sammyh_DX_skype",
    "Mobile_Phone": "(626) 555-7292",
    "Birth_Date": "1984-02-17",
    "Hire_Date": "2012-02-01"
}, {
    "ID": 13,
    "Head_ID": 10,
    "Full_Name": "Davey Jones",
    "Prefix": "Mr.",
    "Title": "Shipping Assistant",
    "City": "Pasadena",
    "State": "California",
    "Email": "davidj@dx-email.com",
    "Skype": "davidj_DX_skype",
    "Mobile_Phone": "(626) 555-0281",
    "Birth_Date": "1983-03-06",
    "Hire_Date": "2011-04-24"
}, {
    "ID": 14,
    "Head_ID": 10,
    "Full_Name": "Victor Norris",
    "Prefix": "Mr.",
    "Title": "Shipping Assistant",
    "City": "Little Rock",
    "State": "Arkansas",
    "Email": "victorn@dx-email.com",
    "Skype": "victorn_DX_skype",
    "Mobile_Phone": "(213) 555-9278",
    "Birth_Date": "1986-07-23",
    "Hire_Date": "2012-07-23"
}, {
    "ID": 15,
    "Head_ID": 10,
    "Full_Name": "Mary Stern",
    "Prefix": "Ms.",
    "Title": "Shipping Assistant",
    "City": "Beaver",
    "State": "Utah",
    "Email": "marys@dx-email.com",
    "Skype": "marys_DX_skype",
    "Mobile_Phone": "(818) 555-7857",
    "Birth_Date": "1982-04-08",
    "Hire_Date": "2012-08-12"
}, {
    "ID": 16,
    "Head_ID": 10,
    "Full_Name": "Robin Cosworth",
    "Prefix": "Mrs.",
    "Title": "Shipping Assistant",
    "City": "Los Angeles",
    "State": "California",
    "Email": "robinc@dx-email.com",
    "Skype": "robinc_DX_skype",
    "Mobile_Phone": "(818) 555-0942",
    "Birth_Date": "1981-06-12",
    "Hire_Date": "2012-09-01"
}, {
    "ID": 17,
    "Head_ID": 9,
    "Full_Name": "Kelly Rodriguez",
    "Prefix": "Ms.",
    "Title": "Support Assistant",
    "City": "Boise",
    "State": "Idaho",
    "Email": "kellyr@dx-email.com",
    "Skype": "kellyr_DX_skype",
    "Mobile_Phone": "(818) 555-9248",
    "Birth_Date": "1988-05-11",
    "Hire_Date": "2012-10-13"
}, {
    "ID": 18,
    "Head_ID": 9,
    "Full_Name": "James Anderson",
    "Prefix": "Mr.",
    "Title": "Support Assistant",
    "City": "Atlanta",
    "State": "Georgia",
    "Email": "jamesa@dx-email.com",
    "Skype": "jamesa_DX_skype",
    "Mobile_Phone": "(323) 555-4702",
    "Birth_Date": "1987-01-29",
    "Hire_Date": "2012-10-18"
}, {
    "ID": 19,
    "Head_ID": 9,
    "Full_Name": "Antony Remmen",
    "Prefix": "Mr.",
    "Title": "Support Assistant",
    "City": "Boise",
    "State": "Idaho",
    "Email": "anthonyr@dx-email.com",
    "Skype": "anthonyr_DX_skype",
    "Mobile_Phone": "(310) 555-6625",
    "Birth_Date": "1986-02-19",
    "Hire_Date": "2013-01-19"
}, {
    "ID": 20,
    "Head_ID": 8,
    "Full_Name": "Olivia Peyton",
    "Prefix": "Mrs.",
    "Title": "Sales Assistant",
    "City": "Atlanta",
    "State": "Georgia",
    "Email": "oliviap@dx-email.com",
    "Skype": "oliviap_DX_skype",
    "Mobile_Phone": "(310) 555-2728",
    "Birth_Date": "1981-06-03",
    "Hire_Date": "2012-05-14"
}, {
    "ID": 21,
    "Head_ID": 6,
    "Full_Name": "Taylor Riley",
    "Prefix": "Mr.",
    "Title": "Network Admin",
    "City": "San Jose",
    "State": "California",
    "Email": "taylorr@dx-email.com",
    "Skype": "taylorr_DX_skype",
    "Mobile_Phone": "(310) 555-7276",
    "Birth_Date": "1982-08-14",
    "Hire_Date": "2012-04-14"
}, {
    "ID": 22,
    "Head_ID": 6,
    "Full_Name": "Amelia Harper",
    "Prefix": "Mrs.",
    "Title": "Network Admin",
    "City": "Los Angeles",
    "State": "California",
    "Email": "ameliah@dx-email.com",
    "Skype": "ameliah_DX_skype",
    "Mobile_Phone": "(213) 555-4276",
    "Birth_Date": "1983-11-19",
    "Hire_Date": "2011-02-10"
}, {
    "ID": 23,
    "Head_ID": 6,
    "Full_Name": "Wally Hobbs",
    "Prefix": "Mr.",
    "Title": "Programmer",
    "City": "Chatsworth",
    "State": "California",
    "Email": "wallyh@dx-email.com",
    "Skype": "wallyh_DX_skype",
    "Mobile_Phone": "(818) 555-8872",
    "Birth_Date": "1984-12-24",
    "Hire_Date": "2011-02-17"
}, {
    "ID": 24,
    "Head_ID": 6,
    "Full_Name": "Brad Jameson",
    "Prefix": "Mr.",
    "Title": "Programmer",
    "City": "San Fernando",
    "State": "California",
    "Email": "bradleyj@dx-email.com",
    "Skype": "bradleyj_DX_skype",
    "Mobile_Phone": "(818) 555-4646",
    "Birth_Date": "1988-10-12",
    "Hire_Date": "2011-03-02"
}, {
    "ID": 25,
    "Head_ID": 6,
    "Full_Name": "Karen Goodson",
    "Prefix": "Miss",
    "Title": "Programmer",
    "City": "South Pasadena",
    "State": "California",
    "Email": "kareng@dx-email.com",
    "Skype": "kareng_DX_skype",
    "Mobile_Phone": "(626) 555-0908",
    "Birth_Date": "1987-04-26",
    "Hire_Date": "2011-03-14"
}, {
    "ID": 26,
    "Head_ID": 5,
    "Full_Name": "Marcus Orbison",
    "Prefix": "Mr.",
    "Title": "Travel Coordinator",
    "City": "Los Angeles",
    "State": "California",
    "Email": "marcuso@dx-email.com",
    "Skype": "marcuso_DX_skype",
    "Mobile_Phone": "(213) 555-7098",
    "Birth_Date": "1982-03-02",
    "Hire_Date": "2005-05-19"
},{
    "ID": 27,
    "Head_ID": 5,
    "Full_Name": "Sandy Bright",
    "Prefix": "Ms.",
    "Title": "Benefits Coordinator",
    "City": "Denver",
    "State": "Colorado",
    "Email": "sandrab@dx-email.com",
    "Skype": "sandrab_DX_skype",
    "Mobile_Phone": "(818) 555-0524",
    "Birth_Date": "1983-09-11",
    "Hire_Date": "2005-06-04"
}, {
    "ID": 28,
    "Head_ID": 6,
    "Full_Name": "Morgan Kennedy",
    "Prefix": "Mrs.",
    "Title": "Graphic Designer",
    "City": "San Fernando Valley",
    "State": "California",
    "Email": "morgank@dx-email.com",
    "Skype": "morgank_DX_skype",
    "Mobile_Phone": "(818) 555-8238",
    "Birth_Date": "1984-07-17",
    "Hire_Date": "2012-01-11"
}, {
    "ID": 29,
    "Head_ID": 28,
    "Full_Name": "Violet Bailey",
    "Prefix": "Ms.",
    "Title": "Jr Graphic Designer",
    "City": "La Canada",
    "State": "California",
    "Email": "violetb@dx-email.com",
    "Skype": "violetb_DX_skype",
    "Mobile_Phone": "(818) 555-2478",
    "Birth_Date": "1985-06-10",
    "Hire_Date": "2012-01-19"
},{
    "ID": 30,
    "Head_ID": 5,
    "Full_Name": "Ken Samuelson",
    "Prefix": "Dr.",
    "Title": "Ombudsman",
    "City": "St. Louis",
    "State": "Missouri",
    "Email": "kents@dx-email.com",
    "Skype": "kents_DX_skype",
    "Mobile_Phone": "(562) 555-9282",
    "Birth_Date": "1972-09-11",
    "Hire_Date": "2009-04-22"
}];

  </script>
  
  
 
  
  
  
</html>
