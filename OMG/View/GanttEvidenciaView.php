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
        
        
    <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--Para abrir alertas de aviso, success,warning, error--> 
    <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>  
<!--        <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
  <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
  <script src="../../assets/dhtmlxGantt/api.js" type="text/javascript"></script>-->
        <link  href="../../assets/gantt_5.1.2_com/codebase/dhtmlxgantt.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/gantt_5.1.2_com/codebase/dhtmlxgantt.js" type="text/javascript"></script>
        <!--<script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_auto_scheduling.js" type="text/javascript"></script>-->
    <!--<a href="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_auto_scheduling.js.map"></a>-->
    <!--<script src="../../js/jquery.js" type="text/javascript"></script>-->
   
    <!--<link id="skin" href="../../assets/gantt_5.1.2_com/codebase/skins/dhtmlxgantt_terrace.css" rel="stylesheet" type="text/css"/>-->
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
    <script src="../../assets/gantt_5.1.2_com/codebase/ext/dhtmlxgantt_grouping.js" type="text/javascript"></script>
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

    
    
    <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
    <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
    <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
    
    <link href="../../assets/dhtmlxSuite_v51_std/skins/material/dhtmlx.css" rel="stylesheet" type="text/css"/>
    <!--<link href="../../assets/dhtmlxSuite_v51_std/skins/skyblue/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
    <!--<link href="../../assets/dhtmlxSuite_v51_std/skins/terrace/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
    <!--<link href="../../assets/dhtmlxSuite_v51_std/skins/web/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
    
    
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
    /*tareas padres -->*/
         .gantt_task_line.gantt_dependent_task {
			background-color: #65c16f;
                        /*background-color:  #0042e9;*/
			/*border: 1px solid #3c9445;*/
		}   
       /*<--*/         
                
.gantt_task_line.gantt_dependent_task .gantt_task_progress {
			background-color: #46ad51;
		}
                
       .gantt_task_progress {
			text-align: left;
			padding-left: 10px;
			box-sizing: border-box;
			color: black;
			font-weight: bold;
               
                        
		}
                /*estilos para ocultar el texto de la barra*/ 
/*                .gantt_task_content {
                    display: none;
                }   */
                .completed_task {
		border: 1px solid #94AD94;
                }
                .completed_task .gantt_task_progress {
                    background: #0000cc;
                }
                .task_suspendida .gantt_task_progress{
                    background:yellow; 
                }
                
                .text_tarea_terminada_Azul{
                    color: white;
                }
                .text_tarea_suspendida_amarilla{
                    color: black;
                }
                
                .summary-row,
		.summary-row.odd {
			background-color: #EEEEEE;
			font-weight: bold;
		}

		.gantt_grid div,
		.gantt_data_area div {
			font-size: 12px;
		}
		.summary-bar {
			opacity: 0.4;
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

#mydiv {
    position: absolute;
    z-index: 9;
    padding-left: 5%;
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
    <body >
<!-- Draggable DIV -->
<form action="">
    
    <button>recargar temporal</button>
</form>

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
          
          <div style="height: 35px;">
          <div id="toolbarObj"></div>
          </div>
          <!--<div>-->

<!--	<input value="deshacer" type="button" onclick='gantt.undo()' style='font-size: 10px'>
	<input value="Rehacer" type="button" onclick='gantt.redo()' style='font-size: 10px'>-->
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
  
  <div  class="" id="detallesInformacion" style="width:94%;height:60% ;position: fixed;z-index: 2;">
                <div id="mydivheader" style="position: absolute">Click Para Mover</div>   
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



    
  <div class="" id="gantt_here" style='width: 100%;height: 95%;position: absolute'>       </div>
   
    
    <!--<input id="id_evid" type="text" value="<?php echo Session::getSesion("dataGanttEvidencia") ?>">-->
    </body>
  
    
    
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

var opcionstatus=[
    { key: 1, label: 'En Proceso' },
    { key: 2, label: 'Suspendido' },
    { key: 3, label: 'Terminado'}
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

    
    function obtenerEmpleados(){
        
        $.ajax({
//           url:"../Controller/GanttEvidenciasController.php?Op=ListarEmpleados",
           url:"../Controller/GanttEvidenciasController.php?Op=empleadosNombreCompleto",
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
    var datosTreeList=[]; 
    var ventana_detalles_abierta=false;
    $(function (){
        
        
        
       cargarMenuArriba();
        var myToolbar;
		function cargarMenuArriba() {
			myToolbar = new dhtmlXToolbarObject({
				parent: "toolbarObj",
				icons_path: "../../images/base/"
			});    

                        myToolbar.addButton("detalles", 3, "Detalles", "File_Table.png", "save_dis.gif");
                        
                         myToolbar.addButton("refresh", 3, "Recargar", "refresh.png");
			myToolbar.addSeparator("sep1", 3);
                        
                        var agrupacionesCampos=Array(	Array('agrupar_descripcion', 'obj', 'Descripcion', '661.png'),
						Array('agrupar_responsables','obj', 'Responsables' , '659.png'));
                        
                        myToolbar.addButtonSelect("agrupar_descripcion", 13, "Agrupar", agrupacionesCampos, "691.png");

			myToolbar.addSeparator("sep3", 8);
                        var visualizacionBarras=Array(	Array('tiempodia', 'obj', 'Dia', '663.png'),
						Array('tiemposemana','obj', 'Semana' , '663.png'),
                                                Array('tiempomes','obj', 'Mes' , '663.png'),
                                                Array('tiempoaño','obj', 'Año' , '663.png'));
                        
                        
                        myToolbar.addButtonSelect("visualizacionTiempo", 13, "Visualizacion Barras ", visualizacionBarras, "670.png");
                        
                        myToolbar.addSeparator("sep4", 8);
                        
                        var printOpts = [	['exportar_excel', 'obj', 'Excel', '_excel.png'],
						['exportar_pdf','obj', 'Pdf' , 'pdf.png'],
						['exportar_png',  'obj', 'Png'  , 'image.png']
                                        ];
//						Array('print_cfg',  'obj', 'MS Proyect'   , ''));
			console.log(printOpts);
			myToolbar.addButtonSelect("exportar", 13, "Exportar", printOpts, "descargar.png");
                   
                        myToolbar.addSeparator("sep5", 8);                     
                          
                                  
                        
//                        obtenerDescripcionDEnDondeSeEstanCargandoLasTareas().then(function (){
                                myToolbar.addButton("descripcion", 8, "<?php echo ""; ?>", "infodescripciongantt.png");
//                        })
                        
			
                }
                
                myToolbar.attachEvent("onClick", function(id){
                       console.log(id);
                       switch(id){
                           case "detalles":
                               
                               if(ventana_detalles_abierta==false){
                                    $("#multiCollapseExample2").show();
                                    ventana_detalles_abierta=true;
                                }
                                else{
                                     if(ventana_detalles_abierta==true){
                                        $("#multiCollapseExample2").hide();
                                        ventana_detalles_abierta=false;
                                     }
                                }
                           break;
                           case "refresh":
                               refrescarDatosGantt();
                           break;
                           case "agrupar_descripcion":
                               showGroups();
                           break;
                           case "agrupar_responsables":
                               showGroups('user');
                           break;
                            case "tiempodia":
                                setScaleConfig("1");
                                gantt.render();
                                
                            break;
                             case "tiemposemana":
                                  setScaleConfig("2");
                                  gantt.render();
                            break;
                             case "tiempomes":
                                 setScaleConfig("3");
                                  gantt.render();
                            break;
                             case "tiempoaño":
                                 setScaleConfig("4");
                                  gantt.render();
                            break;
                            case "exportar_excel":
                            gantt.exportToExcel({
                                name:"document.xlsx", 
                                columns:[
                                    { id:"text",  header:"Tarea", width:100 },
                                    { id:"start_date",  header:"Fecha de Inicio", width:50, type:"date" }
                                ],
                                server:"https://export.dhtmlx.com/gantt",
                                visual:true,
                                cellColors:true
                            })
                            break;
                            case "exportar_pdf":
                                gantt.exportToPDF();
                            break;
                            case "exportar_png":
                                gantt.exportToPNG()
                            break;
                            case "exportar_MSProyect":
                                gantt.exportToMSProject();
                            break;
                           
                        }
                });
        
        
        
        
        
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
      
   obtenerTareas().then(function (){
        construirTreeList();

    });   
      
      

    });
       
    function obtenerTareas(){
        return new Promise(function (resolve,reject){
                $.ajax({
                                        url:"../Controller/GanttEvidenciasController.php?Op=ListarTodasLasTareasDetallesPorSuId",
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
