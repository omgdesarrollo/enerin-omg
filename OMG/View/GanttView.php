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
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_tooltip.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_tooltip.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_undo.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_undo.js.map"></a>-->
    <script src="../../assets/gantt_5.1.2_com/codebase/locale/locale_es.js" type="text/javascript"></script>
    <script src="https://export.dhtmlx.com/gantt/api.js?v=20180322"></script>
    
   <!--<script src="../../codebase/ext/dhtmlxgantt_smart_rendering.js"></script>-->
   <script src="../../js/jquery.min.js" type="text/javascript"></script>
   
   <link href="../../assets/gantt_5.1.2_com/codebase/skins/dhtmlxgantt_meadow.css" rel="stylesheet" type="text/css"/>
    <!--<link rel="stylesheet" href="../../assets/gantt_5.1.2_com/skins/dhtmlxgantt_meadow.css?">-->
    
    
     <!--<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
    
     <link href="../../assets/gantt_5.1.2_com/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
    
    
  <style type="text/css">
    html, body{
      width: 100%;
      height: 100%;
      padding:0px;
      margin:0px;
      overflow: hidden;
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
                
/*     .gantt_data_area {
    position: relative;
    overflow-x: auto;
    overflow-y: auto;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: auto;
}  */
  </style>

 
      
        
        	
		
  </head>
    <body>
        
        
     
  <form action="">
      <input type="submit" class="btn btn-info" value="Recargar">      
      
  </form>
        
        <?php  
        if($_REQUEST["folio_entrada"]==""){
            echo "no tiene folio de entrada  ";
        }else
        {
            
        echo "el folio de entrada ".$_REQUEST["folio_entrada"]; 
        } ?>
        
        
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
  
    
    
  <script type="text/javascript">
      
      
 
      
//       var tasksA = {
//                data: [
//                    {
//                        id: 1, text: "Project #1", start_date: "01-04-2018", duration: 18, order: 10,
//                        progress: 0.4, open: true
//                    },
//                    {
//                        id: 2, text: "Task #1", start_date: "02-04-2018", duration: 8, order: 10,
//                        progress: 0.6, parent: 1
//                    },
//                    {
//                        id: 3, text: "Task #2", start_date: "11-04-2018", duration: 8, order: 20,
//                        progress: 0.6, parent: 1
//                    }
//                ],
//                links: [
//                    { id: 1, source: 1, target: 2, type: "1" }
//                ]
//            };
            
//            var tasksB = {
//                data: [
//                    {
//                        id: 1, text: "Project #2", start_date: "01-04-2018", duration: 18, order: 10,
//                        progress: 0.4, open: true
//                    },
//                    {
//                        id: 3, text: "Task #3", start_date: "02-04-2018", duration: 1, order: 10,
//                        progress: 0.6, parent: 1
//                    },
//                    {
//                        id: 4, text: "Task #4", start_date: "03-04-2018", duration: 1, order: 20,
//                        progress: 0.6, parent: 1
//                    }
//                ],
//                links: [
//                    { id: 3, source: 3, target: 4, type: "0" }
//                ]
//            };
//gantt.message({
//		text: "Predefinido Estructura de proyecto <br>1 - <b>Projecto</b><br>2 - <b>Subprojecto</b><br>3 - <b>Tareas</b><br>las tareas no pueden tener elementos secundarios Click para cerrar",
//		expire: -1
//	});
//gantt.config.scale_height = 60;

//  gantt.serverList("stage", [
//		{key: 1, "label": "Planeacion"},
//		{key: 2, "label": "Prueba"}
//	]);
     var dataEmpleados=[];
//     var data
     obtenerEmpleados();
      gantt.serverList("user",dataEmpleados); 
//     
//       $.each(dataEmpleados,function(index,value){
////           alert("entro");
////                var list={key:value.id_empleado,value:value.nombre_empleado};   
////                   alert("v  "+value.id_empleado+"  y el nombre : "+value.nombre_empleado);
////                   list.push("value");
////alert("d"+list.key);
////                   dataEmpleados.push({key:value.id_empleado,value:value.nombre_empleado});
//                   console.log("d  "+dataEmpleados);
//               });
//      console.log("d  "+dataEmpleados);
     
     
        
//	gantt.serverList("user", [
//		{key: 0, label: "N/A"},
//		{key: 1, label: "Hugo"},
//		{key: 2, label: "Frank"},
//		{key: 3, label: "Daniel"}
//	]);
//	gantt.serverList("priority", [
//		{key: 1, label: "Alta"},
//		{key: 2, label: "Normal"},
//		{key: 3, label: "Baja"}
//	]);
        
//        gantt.config.order_branch = true;
//	gantt.config.grid_width = 420;
//	gantt.config.row_height = 24;
//	gantt.config.grid_resize = true;
//gantt.locale.labels.column_nombre =
//		gantt.locale.labels.section_nombre = "Nombre";
        
//	gantt.locale.labels.column_priority =
//		gantt.locale.labels.section_priority = "Prioridad";
	gantt.locale.labels.column_owner ="Encargado";
		gantt.locale.labels.section_owner = "Encargado";
        
        gantt.config.scale_height = 50;
//        gantt.config.order_branch = true;
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


//gantt.config.lightbox.project_sections = [
//		{name: "description", height: 70, map_to: "text", type: "textarea", focus: true},
//		{name: "time", type: "duration", map_to: "auto", readonly: true}
//	];

  




gantt.config.order_branch = true;
gantt.config.order_branch_free = true;
gantt.config.branch_loading = true;
gantt.config.fit_tasks = true; 


gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.init("gantt_here");
    gantt.load("../Controller/GanttController.php?Op=MostrarTareasCompletasPorFolioDeEntrada");
 
var dp = new gantt.dataProcessor("../Controller/GanttController.php?Op=Modificar");
dp.init(gantt);

//dp.attachEvent("onAfterUpdate", function(id, action, tid, response){
//    if(action == "error"){
//        // do something here
//        alert("error al cargar los datos del server");
//    }
//});
//dp.setTransactionMode({
//   mode: "REST",
//   header:{
//       "Authorization": "Token 9944b09199c62bcf9418ad846dd0e4bbdfc6ee4b"
//    }
//});
//    dhtmlxGantt se puede usar sin gantt.dataProcessor. En ese caso, deberá supervisar todos los cambios realizados 
//    en el Gantt manualmente y luego enviarlos a su back-end. Aquí está la lista de eventos que deberá escuchar:
//    gantt.attachEvent('onAfterTaskAdd', function(id, task) {
//        
//        alert("acaba de crear la tarea");
//  taskService.create(task)
//    .then(function(result){
//      gantt.changeTaskId(id, result.databaseId);
//    });
//});
//gantt.attachEvent('onAfterTaskUpdate', function(id, task) {
//    alert("e");
//  taskService.update(task);
//});
//gantt.attachEvent('onAfterTaskDelete', function(id) {
//  taskService.delete(id);
//});
// 
//// links
//gantt.attachEvent('onAfterLinkAdd', function(id, link) {
//  linkService.create(link)
//    .then(function(result){
//      gantt.changeLinkId(id, result.databaseId);
//    });
//});
// 
//gantt.attachEvent('onAfterLinkUpdate', function(id, link) {
//  linkService.update(task);
//});
// 
//gantt.attachEvent('onAfterLinkDelete', function(id, link) {
//  linkService.delete(id);
//});



//termina dondse se puede escuchar sin dataprocessor




    
    	gantt.attachEvent("onAfterTaskDrag", function (id, mode) {
		var task = gantt.getTask(id);
		if (mode == gantt.config.drag_mode.progress) {
			var pr = Math.floor(task.progress * 100 * 10) / 10;
//			gantt.message(task.text + " is now " + pr + "% completed!");
		} else {
			var convert = gantt.date.date_to_str("%H:%i, %F %j");
			var s = convert(task.start_date);
			var e = convert(task.end_date);
//			gantt.message(task.text + " starts at " + s + " and ends at " + e);
		}
	});
    
//    	gantt.attachEvent("onBeforeTaskChanged", function (id, mode, old_event) {
//		var task = gantt.getTask(id);
//		if (mode == gantt.config.drag_mode.progress) {
//			if (task.progress < old_event.progress) {
//				gantt.message(task.text + " progress can't be undone!");
//				return false;
//			}
//		}
//		return true;
//	});
    
    
    
    gantt.attachEvent("onBeforeTaskDrag", function (id, mode) {
		var task = gantt.getTask(id);
		var message = task.text + " ";

		if (mode == gantt.config.drag_mode.progress) {
			message += "progress is being updated";
		} else {
			message += "is being ";
			if (mode == gantt.config.drag_mode.move)
				message += "moved";
			else if (mode == gantt.config.drag_mode.resize)
				message += "resized";
		}

//		gantt.message(message);
		return true;
	});
    
    gantt.templates.progress_text = function (start, end, task) {
		return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
	};
    gantt.templates.task_class = function (start, end, task) {
		if (task.type == gantt.config.types.project)
			return "hide_project_progress_drag";
	};

 
    gantt.attachEvent("onTaskDrag", function (id) {
//        alert("d");
			refreshSummaryProgress(gantt.getParent(id), false);
		});
                
             gantt.attachEvent("onTaskDrag", function(id, mode, task, original){
  	var minimal_date = gantt.getState().min_date// + 86400;
    minimal_date = gantt.date.add(minimal_date, 1, 'day');
 	if (task.start_date < minimal_date) gantt.refreshData();
  
  	var maximal_date = gantt.getState().max_date// + 86400;
    maximal_date = gantt.date.add(maximal_date, 1, 'day');
 	if (task.end_date < maximal_date) gantt.refreshData();  
});
//             gantt.attachEvent("onAfterAutoSchedule",function(taskId, updatedTasks){
//                 alert("");
//    // any custom logic here
//});
             
             
             
        function refreshSummaryProgress(id, submit) {
//            alert("le has picado para avanzar");
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
                
                function calculateSummaryProgress(task) {
//                    alert("calcula el progreso del padre");
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
//                                alert("");
//cuando crea una tarea
				gantt.updateTask(id);
			}
		}
//    gantt.parse(tasksA);
    
    
    
    
     //gantt2 = Gantt.getGanttInstance();
    
    var tasks = {
		"data": [
			{"id": 1, "text": "Tarea 1 ", "start_date": "02-04-2018 00:00", "duration": 3, "priority": 3, "stage": 1, "user": 3, "open": true, "parent": 0},
			{"id": 5, "text": "Tarea 1.1", "start_date": "05-04-2018 00:00", "duration": 4, "parent": 1, "open": true, "priority": 1, "stage": 1, "user": 1},
			{"id": 6, "text": "Tarea 1.2", "start_date": "11-04-2018 00:00", "duration": 6, "parent": 1, "open": true, "priority": 2, "stage": 2, "user": 3},
			{"id": 2, "text": "Tarea 2", "start_date": "11-04-2018 00:00", "duration": 2, "priority": 1, "stage": 3, "user": 0, "open": true, "parent": 0},
			{"id": 7, "text": "Tarea 2.1 ", "start_date": "13-04-2018 00:00", "duration": 2, "parent": 2, "open": true, "priority": 3, "stage": 2, "user": 2},
			{"id": 3, "text": "Tarea 3 ", "start_date": "11-04-2018 00:00", "duration": 6, "priority": 2, "stage": 2, "user": 1, "open": true, "parent": 0},
			{"id": 8, "text": "Tarea 3.1", "start_date": "09-04-2018 00:00", "duration": 3, "parent": 3, "open": true, "priority": 1, "stage": 1, "user": 3},
			{"id": 9, "text": "Tarea 3.2", "start_date": "12-04-2018 00:00", "duration": 2, "parent": 3, "open": true, "priority": 3, "stage": 3, "user": 1},
			{"id": 10, "text": "Tarea 3.3", "start_date": "17-04-2018 00:00", "duration": 2, "parent": 3, "open": true, "priority": 2, "stage": 2, "user": 0}
		], "links": [
			{"source": "1", "target": "5", "type": "0"},
			{"source": "5", "target": "8", "type": "0"},
			{"source": "3", "target": "7", "type": "0"},
			{"source": "6", "target": "7", "type": "0"},
			{"source": "2", "target": "10", "type": "0"}
		]
	};
    
    
    
    var demo_tasks = {
		"data": [
			{"id": 11, "text": "Project #1", "start_date": "", "duration": "", "progress": 0.6, "open": true, type: gantt.config.types.project},
			{"id": 12, "text": "Task #1", "start_date": "03-04-2018", "duration": "5", "parent": "11", "progress": 1, "open": true, type: gantt.config.types.task},
			{"id": 13, "text": "Task #2", "start_date": "", "duration": "", "parent": "11", "progress": 0.4, "open": true, type: gantt.config.types.project},
			{"id": 14, "text": "Task #3", "start_date": "02-04-2018", "duration": "6", "parent": "11", "progress": 0.8, "open": true, type: gantt.config.types.task},
			{"id": 15, "text": "Task #4", "start_date": "", "duration": "", "parent": "11", "progress": 0.18, "open": true, type: gantt.config.types.project},
			{"id": 16, "text": "Task #5", "start_date": "02-04-2018", "duration": "7", "parent": "11", "progress": 0, "open": true, type: gantt.config.types.task},
			{"id": 17, "text": "Task #2.1", "start_date": "03-04-2018", "duration": "2", "parent": "13", "progress": 1, "open": true, type: gantt.config.types.task},
			{"id": 18, "text": "Task #2.2", "start_date": "06-04-2018", "duration": "3", "parent": "13", "progress": 0.8, "open": true, type: gantt.config.types.task},
			{"id": 19, "text": "Task #2.3", "start_date": "10-04-2018", "duration": "4", "parent": "13", "progress": 0.2, "open": true, type: gantt.config.types.task},
			{"id": 20, "text": "Task #2.4", "start_date": "10-04-2018", "duration": "4", "parent": "13", "progress": 0, "open": true, type: gantt.config.types.task},
			{"id": 21, "text": "Task #4.1", "start_date": "03-04-2018", "duration": "4", "parent": "15", "progress": 0.5, "open": true, type: gantt.config.types.task},
			{"id": 22, "text": "Task #4.2", "start_date": "03-04-2018", "duration": "4", "parent": "15", "progress": 0.1, "open": true, type: gantt.config.types.task},
			{"id": 23, "text": "Task #4.3", "start_date": "03-04-2018", "duration": "5", "parent": "15", "progress": 0, "open": true, type: gantt.config.types.task}
		],
		"links": [
			{"id": "10", "source": "11", "target": "12", "type": "1"},
			{"id": "11", "source": "11", "target": "13", "type": "1"},
			{"id": "12", "source": "11", "target": "14", "type": "1"},
			{"id": "13", "source": "11", "target": "15", "type": "1"},
			{"id": "14", "source": "11", "target": "16", "type": "1"},
			{"id": "15", "source": "13", "target": "17", "type": "1"},
			{"id": "16", "source": "17", "target": "18", "type": "0"},
			{"id": "17", "source": "18", "target": "19", "type": "0"},
			{"id": "18", "source": "19", "target": "20", "type": "0"},
			{"id": "19", "source": "15", "target": "21", "type": "2"},
			{"id": "20", "source": "15", "target": "22", "type": "2"},
			{"id": "21", "source": "15", "target": "23", "type": "2"}
		]
	};
        
           var demo_tasks2 = {
		
		"data": [
			{"id": 1426170055699, "start_date": "04-01-2019 00:00", "text": "Project #1", "duration": 11, "type": "project", "parent": 0},
			{"id": 1426170055704, "start_date": "03-01-2019 00:00", "text": "Subproject #1", "duration": 9,"progress": 0.43, "parent": "1426170055699", "type": "subproject"},
			{"id": 1426170055707, "start_date": "04-01-2019 00:00", "text": "Task #1", "duration": 1, "parent": "1426170055704", "type": "task"},
			{"id": 1426170055710, "start_date": "06-01-2019 00:00", "text": "Task #2", "duration": 4, "parent": "1426170055704", "type": "task"},
			{"id": 1426170055711, "start_date": "10-01-2019 00:00", "text": "Task #3", "duration": 3, "parent": "1426170055704", "type": "task"},
			{"id": 1426170055712, "start_date": "02-01-2019 00:00", "text": "Subproject #2", "duration": 5, "parent": "1426170055699", "type": "subproject"},
			{"id": 1426170055715, "start_date": "03-01-2019 00:00", "text": "Task #1", "duration": 4, "parent": "1426170055712", "type": "task", "progress": 0},
			{"id": 1426170055718, "start_date": "07-01-2019 00:00", "text": "Task #2", "duration": 5, "parent": "1426170055712", "type": "task"},
			{"id": 1426170055702, "start_date": "02-01-2019 00:00", "text": "Project #2", "duration": 15, "type": "project", "end_date": "17-01-2019 00:00", "parent": 0},
			{"id": 1426170055719, "start_date": "02-01-2019 00:00", "text": "Subproject #1", "duration": 7, "parent": "1426170055702", "type": "subproject"},
			{"id": 1426170055722, "start_date": "02-01-2019 00:00", "text": "Task #1", "duration": 4, "parent": "1426170055719", "type": "task"},
			{"id": 1426170055725, "start_date": "06-01-2019 00:00", "text": "Task #2", "duration": 6, "parent": "1426170055719", "type": "task"},
			{"id": 1426170055726, "start_date": "12-01-2019 00:00", "text": "Task #3", "duration": 5, "parent": "1426170055719", "type": "task"},
			{"id": 1426170055703, "start_date": "08-01-2019 00:00", "text": "Project #3", "duration": 8, "type": "project", "parent": 0},
			{"id": 1426170055727, "start_date": "08-01-2019 00:00", "text": "Subproject #1", "duration": 8, "parent": "1426170055703", "type": "subproject"}
		], "links": [
                    
                    
                ]
	};
    
	
//    gantt.parse(demo_tasks2);
    
    
//    var tasks = {
//		"data": [
//			{"id": 1, "text": "Task #1", "start_date": "02-04-2018 00:00", "duration": 3, "priority": 3, "stage": 1, "user": 3, "open": true, "parent": 0},
//			{"id": 5, "text": "Task #1.1", "start_date": "05-04-2018 00:00", "duration": 4, "parent": 1, "open": true, "priority": 1, "stage": 1, "user": 1},
//			{"id": 6, "text": "Task #1.2", "start_date": "11-04-2018 00:00", "duration": 6, "parent": 1, "open": true, "priority": 2, "stage": 2, "user": 3},
//			{"id": 2, "text": "Task #2", "start_date": "11-04-2018 00:00", "duration": 2, "priority": 1, "stage": 3, "user": 0, "open": true, "parent": 0},
//			{"id": 7, "text": "Task #2.1", "start_date": "13-04-2018 00:00", "duration": 2, "parent": 2, "open": true, "priority": 3, "stage": 2, "user": 2},
//			{"id": 3, "text": "Task #3", "start_date": "11-04-2018 00:00", "duration": 6, "priority": 2, "stage": 2, "user": 1, "open": true, "parent": 0},
//			{"id": 8, "text": "Task #3.1", "start_date": "09-04-2018 00:00", "duration": 3, "parent": 3, "open": true, "priority": 1, "stage": 1, "user": 3},
//			{"id": 9, "text": "Task #3.2", "start_date": "12-04-2018 00:00", "duration": 2, "parent": 3, "open": true, "priority": 3, "stage": 3, "user": 1},
//			{"id": 10, "text": "Task #3.3", "start_date": "17-04-2018 00:00", "duration": 2, "parent": 3, "open": true, "priority": 2, "stage": 2, "user": 0}
//		], "links": [
//			{"source": "1", "target": "5", "type": "0"},
//			{"source": "5", "target": "8", "type": "0"},
//			{"source": "3", "target": "7", "type": "0"},
//			{"source": "6", "target": "7", "type": "0"},
//			{"source": "2", "target": "10", "type": "0"}
//		]
//	};
    
    
    
    


    
    
    
    function obtenerEmpleados(){
        
        $.ajax({
           url:"../Controller/GanttController.php?Op=ListarEmpleados",
           data:"",
           async:false,
           success:function (res){
//               alert("se hizo ");
               
               $.each(res,function(index,value){
//                var list={key:value.id_empleado,value:value.nombre_empleado};   
//                   alert("v  "+value.id_empleado+"  y el nombre : "+value.nombre_empleado);
//                   list.push("value");
//alert("d"+list.key);
                   dataEmpleados.push({key:value.id_empleado,label:value.nombre_empleado});
//                   console.log("d  "+dataEmpleados.);
               });
           }
           
        });
//        $.each(dataEmpleados,function(index,value){
////                var list={key:value.id_empleado,value:value.nombre_empleado};   
////                   alert("v  "+value.id_empleado+"  y el nombre : "+value.nombre_empleado);
////                   list.push("value");
////alert("d"+list.key);
////                   dataEmpleados.push({key:value.id_empleado,value:value.nombre_empleado});
//                   console.log("d1  "+value.value);
//               });
        
      
        
    }
//         $.each(dataEmpleados,function(index,value){
//             alert("v  :"+value.key);
////                var list={"key":value.id_empleado,"value":value.nombre_empleado};   
////                   alert("v  "+value.id_empleado+"  y el nombre : "+value.nombre_empleado);
////                   list.push("value");
////                   dataEmpleados.push(list);
//               });
        
        
        
        
        
//          $.ajax({
//                                url: "../Controller/AsignacionTemasRequisitosController.php?Op=Modificar",
//				type: "POST",
//				data:'column='+column+'&editval='+val+'&id='+id_asignacion_tema_requisito,
//				success: function(data){
//                                    //alert("SE hizo");
//					//$(editableObj).css("background","#FDFDFD");
//                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
//                                        consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
//                                        //alert("entron ");
//                                        refresh();                                        
//                                        //window.location.href="AsignacionTemasRequisitosView.php";
//                                       
//				}   
//                           });
        
 
    
    $(function (){
        
      
      
//     gantt.batchUpdate(function () {
////         alert("se ha cargado el gantt exitosamente");
//    gantt.eachSelectedTask(function(task_id){
//        if(gantt.isTaskExists(task_id))
//            gantt.deleteTask(task_id);
//    });
//});
     gantt.attachEvent("onParse", function () {
//         alert("le has picado ");
			gantt.eachTask(function (task) {
				setTaskType(task);
			});
		}); 
      
    });
    
  </script>
  
  
 
  
  
  
</html>
