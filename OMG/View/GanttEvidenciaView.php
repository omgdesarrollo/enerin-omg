<?php  
session_start();
require_once '../util/Session.php';
if(isset($_REQUEST["id_evid"])){
//    Session::setSesion("dataValidado", $value)
    Session::setSesion("dataGanttEvidencia",$_REQUEST["id_evid"]);
//    Session::setSesion("dataGanttFolio_Entrada",$_REQUEST["folio_entrada"]);
//    echo "el seguimiento de entrada linkeado al de doc de entrada y al folio de entrada   ".$dataGantt=Session::getSesion("dataGantt");;
    echo "<h4><center>El id de evidencia = ".Session::getSesion("dataGanttEvidencia")."</center><h4>";
    ?>
    <center><div id="infoquepuedehacer"></div></center> 
<?php
}else{
        $dataGantt=Session::getSesion("dataGanttEvidencia");
       echo "<h2><center>El id de evidencia = ".Session::getSesion("dataGanttEvidencia")."</center><h2>";
       ?>
       
        <center><div id="infoquepuedehacer"></div></center> 
<?php
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
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_tooltip.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_tooltip.js.map"></a>-->
    <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_undo.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_undo.js.map"></a>-->
    <script src="../../assets/gantt_5.1.2_com/codebase/locale/locale_es.js" type="text/javascript"></script>
    <script src="https://export.dhtmlx.com/gantt/api.js?v=20180322"></script>
    
   <!--<script src="../../codebase/ext/dhtmlxgantt_smart_rendering.js"></script>-->
   <script src="../../js/jquery.min.js" type="text/javascript"></script>
   <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_keyboard_navigation.js" type="text/javascript"></script>-->
    <div id="lib"></div>
   <link href="../../assets/gantt_5.1.2_com/codebase/skins/dhtmlxgantt_meadow.css" rel="stylesheet" type="text/css"/>
   <link href="../../assets/gantt_5.1.2_com/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   
   <!--Para abrir alertas de aviso, success,warning, error-->       
   <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
   <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
   <script src="../../js/jquery.js" type="text/javascript"></script>
   <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
   <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
    
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
         <!--<input id="g" type="submit" class="btn btn-info" value="Guardar Cambios">-->      
        
        <?php  
        
//        echo"e  ".Session::getSesion("dataGantt");
        ?>
        
        
<!--        <input value="Exportar a PDF"  class="btn btn-info" type="button" onclick="gantt.exportToPDF()" style="margin:20px;">
    <input value="Exportar a PNG" class="btn btn-info" type="button" onclick="gantt.exportToPNG()">
<input value="Exportar a MS Proyect" class="btn btn-success" type="button" onclick='gantt.exportToMSProject({skip_circular_links: false})'
	   style='margin:20px;'>
<input value="Export a Excel" class="btn btn-info" type="button" onclick='gantt.exportToExcel()' style='margin:20px;'>
  -->
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
    
    <!--<input id="id_evid" type="text" value="<?php echo Session::getSesion("dataGanttEvidencia") ?>">-->
    </body>
  
    
    
  <script type="text/javascript">    
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
//                        alert("procedera a eliminarse");
                        delTaskParent = gantt.getParent(id);
                        
//                         alert("d  "+delTaskParent);
//                        var taskId = gantt.getSelectedId();
//                        gantt.deleteTask(delTaskParent);
//                        gantt.deleteTask(delTaskParent);
//                                alert("el id es : "+id);
                        var desc=false;
                        $.ajax({
                                url:"../Controller/GanttEvidenciasController.php?Op=descendencia&deleteidtarea="+id,
                                async:false,
                                success:function (res)
                                {
                                 
                                    if(res==true){
//                                        alert("tiene descendencia ");
                                         swalError("No se puede eliminar la actividad, tiene descendencia ");
                                        
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
                                url:"../Controller/GanttEvidenciasController.php?Op=EliminarTarea&deleteidtarea="+id,
                                async:false,
                                success:function (res){
                                            $.jGrowl("Eliminacion Exitosa", { header: '' });
                                }
           
                              });
//                                var tienehijos=false; 
//                                 gantt.eachTask(function (child) {
//                                     tienehijos=true;
//				if (child.type != gantt.config.types.project) {
//					totalToDo += child.duration;
//					totalDone += (child.progress || 0) * child.duration;
//				}
//			},id);
//                                 if(tienehijos==true){
//                                     alert("tiene hijos ");
//                                 }else{
//                                     alert("no tiene");
//                                 }
                                 
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
		{name: "text", label: "Nombre",tree: true, width: '*'},
		
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
gantt.config.work_time = true;
gantt.config.auto_scheduling = true;
gantt.config.sort = true;

//gantt.config.readonly = false;


gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.init("gantt_here");
    gantt.load("../Controller/GanttEvidenciasController.php?Op=Mostrar_Plan");


var dp = new gantt.dataProcessor("../Controller/GanttEvidenciasController.php?Op=Modificar");
////
dp.init(gantt);

//dp.setTransactionMode("REST");

//    console.log(dp);
    
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
           url:"../Controller/GanttEvidenciasController.php?Op=ListarEmpleados",
           data:"",
           async:false,
           success:function (res){
               
               $.each(res,function(index,value){
                   dataEmpleados.push({key:value.id_empleado,label:value.nombre_empleado});
             });
           }
           
        });
      
        
    }


    
    gantt.templates.progress_text = function (start, end, task) {
		return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
	};
    
    $(function (){
//        var solounavez=0;
      $.ajax({
          url:"../Controller/GanttEvidenciasController.php?Op=verificar_valid",
          type:"POST",
          async:false,
          data:"id_evid=<?php echo Session::getSesion("dataGanttEvidencia") ?>"
          ,success:function (res){
                if(res=="true"){
                        gantt.config.readonly = true;  
                    $("#infoquepuedehacer").html("Solo Visualizacion");
                   
                }else
                {
                    if(res=="false"){
                        gantt.config.readonly = false;  
//                        var script = document.createElement('script');
//                        script.src = 'https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js';
//                        document.head.appendChild(script);
                        $("#infoquepuedehacer").html("Permitido Edicion");
//                        var nuevoScript = document.createElement("script");
//                        nuevoScript.type = "text/javascript";
//                        script.src = "../../assets/gantt_5.1.2_com/codebase/sources/ext/dhtmlxgantt_keyboard_navigation.js";
//                    if(solounavez==0){
//                        var s = $('script');
//                        var libreria = '../../assets/gantt_5.1.2_com/codebase/sources/ext/dhtmlxgantt_keyboard_navigation.js';
//                        s.attr('src', libreria);
//                        $(document.head).html(s);
//                    }
//                    solounavez++;
                        lib="<script";
                        lib+="  src=\"../../assets/gantt_5.1.2_com/codebase/sources/ext/dhtmlxgantt_keyboard_navigation.js\"";
                        lib+="  type=\"text/javascript\">";
                        lib+="  <\/script>";
                        $("#lib").html(lib);
                    }
                }
                
           }
      });
      
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
//      $("#g").click(function(){
//     var dp = new gantt.dataProcessor("../Controller/GanttEvidenciasController.php?Op=Modificar");
//////
//    
//            });
    });
    
    function swalError(msj)
    {
        swal({
                title: '',
                text: msj,
                showCancelButton: false,
                showConfirmButton: false,
                type:"error",
                timer:1500
            });
            //esta linea esta de mas mejor pasarselo al objeto json del swal que tiene su key de tiempo 
//        setTimeout(function(){swal.close();$('#agregarUsuario .close').click()},1500);
//        $('#loader').hide();
    }
    
  </script>
  
  
 
  
  
  
</html>
