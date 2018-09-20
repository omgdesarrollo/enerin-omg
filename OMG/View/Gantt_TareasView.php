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

    <!--aqui empieza librerias qe no son del gantt en funcionalidad y presentacion-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.1.6/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/18.1.6/css/dx.light.css" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>-->
    <script>window.angular || document.write(decodeURIComponent('%3Cscript src="js/angular.min.js"%3E%3C\/script%3E'))</script>
    <script src="https://cdn3.devexpress.com/jslib/18.1.6/js/dx.all.js"></script>
    <!--aqui termina las librerias que no son del gantt-->
    
    
    
    
 <style type="text/css">
    html, body{
      /*width: 100%;*/
      height: 92%;
/*      padding:0px;
      margin:0px;*/
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

 .modal-lg{width: 92%;}
.modal-dialog {
  /*position: fixed;*/
  /*margin: 0;*/
  width: 98%;
  height: 90%;
/*  padding: 0;*/
}
.modal-content {
  position: fixed; 
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  
/*  border: 2px solid #3c7dcf;
  border-radius: 0;
  box-shadow: none;*/
}
.modal-header {
  /*position: absolute;*/
  top: 0;
  right: 0;
  left: 0;
  height: 50px;
  padding: 10px;
  background: black;
  border: 0;
}
.modal-title {
  /*font-weight: 300;*/
  /*font-size: 2em;*/
  color: #fff;
  /*line-height: 30px;*/
}

 #tabPanel{
     height: 8%;
 }
 .dx-item-content dx-multiview-item-content{
   background-color: red;  
 }
  </style> 	
		
  </head>
    <body>
        
        
     
  <!--<form action="">-->
  <input type="submit" class="btn btn-info" value="Recargar" onclick="refrescarDatosGantt()">      
      
  <!--</form>-->
        <input type="radio" id="scale1" name="scale" value="1" checked/><label for=""><h5>Dia</h5></label>
<input type="radio" id="scale2" name="scale" value="2"/><label for=""><h5>Semana</h5></label>
<input type="radio" id="scale3" name="scale" value="3"/><label for=""><h5>Mes</h5></label>
<input type="radio" id="scale4" name="scale" value="4"/><label for=""><h5>Año</h5></label>
<!--<div style="text-align:center;">-->
	<input value="deshacer" type="button" onclick='gantt.undo()' style='font-size: 10px'>
	<input value="Rehacer" type="button" onclick='gantt.redo()' style='font-size: 10px'>
        <!--<button class="btn btn-danger" type="button" onclick='detallesActividadesCompletasGantt()' data-toggle='modal' data-target='#detalles' style='font-size: 10px'>Detalles</button>-->
        <button class="btn btn-danger" type="button" onclick='detallesActividadesCompletasGantt()' data-toggle='modal' data-target='#detalles' style='font-size: 10px'>Detalles</button>
<!--</div>-->
        <?php  
        
//        echo"e  ".Session::getSesion("dataGantt");
        ?>
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
//                                        growlError("Descendencia","Error Tiene Tareas En Descendencia");
//                                             gantt.alert({
//                                                    title:"Error",
//                                                    type:"alert-error",
//                                                    text:"Error Tiene Tareas En Descendencia"
//                                              });
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
//                    alert();
//                    console.log("entro en calculate summary progress");
			if (task.type != gantt.config.types.project){
//                            alert("");
				return task.progress;
                            }
			var totalToDo = 0;
			var totalDone = 0;
			gantt.eachTask(function (child) {
//                            console.log(child.text);
				if (child.type != gantt.config.types.project) {
                                    
//                                    alert("diferente de r");
//					totalToDo += child.duration;
                                          totalToDo += (child.porcentaje_por_actividad/100);
                                          console.log(totalToDo);
                                        console.log(totalToDo);
//					totalDone += (child.progress || 0) * child.duration;
                                          totalDone += (child.progress || 0) * (child.porcentaje_por_actividad/100);
				}
			}, task.id);
			if (!totalToDo) return 0;
			else return totalDone / totalToDo;
                        
		}
                
                

		function refreshSummaryProgress(id, submit) {
//                   console.log("entro en refresh summary progress");
			if (!gantt.isTaskExists(id)){
//                            alert();
				return;
                            }

			var task = gantt.getTask(id);
                        console.log(task);
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
//    {name:"id",   label:"id",   align:"center"},
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
        
        

 
          var datosTreeList=[]; 
    $(function (){
 
//    var tabs = [{
//            title: 'Detalles Registros Actividad',
//            text: 'Tabla'
//        }, {
//            title: 'Avances Visuales',
//            text: ''
//        
//        }];
//        $(function () {
//            $("#tabPanel").dxTabPanel({
//                items: tabs
//            });
//    }); 
        
//obtenerTareas().then(function (){
//construirTreeList();
//
//
//});
    
 

    });

    
    function obtenerTareas(){
        return new Promise(function (resolve,reject){
                $.ajax({
                                        url:"../Controller/GanttTareasController.php?Op=ListarTodasLasTareasDetallesPorSuId",
                                        success:function (res)
                                        {
                                         datosTreeList=res.data;
                                         resolve();
//                                          construirTreeList();
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
//        autoExpandAll: true,
        allowColumnResizing: true,
        columnAutoWidth: true,
        allowColumnReordering: true,
        height:900,
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
//        noDataText: "No Hay Datos",
//         scrolling: {
//            mode: "standard"
//        },
        paging: {
            enabled: true,
            pageSize: 10
        },
//        pager: {
//            showPageSizeSelector: true,
//            allowedPageSizes: [5, 10, 20],
//            showInfo: true
//        },
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
        onCellClick:(args)=>{
//            console.log(args);
        },
        onRowClick:(args)=>{
//            console.log(args);
        },
        onRowUpdated:function (args){
//            console.log(args);
            saberSiSumanPorcentajePonderadoProgramado100loshijos(args);
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
                 allowEditing:false
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
                dataField: "porcentaje_por_actividad",
                 caption: "Ponderado Programado %",
                validationRules: [{ type: "required" }]
            },
             { 
                dataField: "ponderado_real",
                 caption: "Ponderado Real",
                 allowEditing:false
            },
             { 
                dataField: "avance",
                 caption: "Avance",
                  allowEditing:false
                
            },
             { 
                dataField: "archivo_adjunto",
                 caption: "Archivo Adjunto",
                  allowEditing:false   
            }
        ],
        onCellPrepared: function(e) {
            if(e.column.command === "edit") {
                e.cellElement.children(".dx-link-add").remove();
            }
        },
        onEditorPreparing: function(e) {
            if(e.dataField === "parent" && e.row.data.id === 1) {
                e.cancel = true;
            }
        },
        onInitNewRow: function(e) {
            e.data.parent = 1;
        },
        expandedRowKeys: [1, 2, 3, 4, 5]
    }); 
    }
    
    
    function refrescarDatosGantt(){
        gantt.refreshData();
        gantt.init('gantt_here');
//        gantt.load("../Controller/GanttTareasController.php?Op=ListarTodasLasTareasPorId");
        $.when(gantt.load("../Controller/GanttTareasController.php?Op=ListarTodasLasTareasPorId")).then(function(){

           
           
           
           
          
        });
    }
    
    function detallesActividadesCompletasGantt(){
     obtenerTareas().then(function (){
//         alert();
         construirTreeList();

     });
} 
    var datosModificadosActividadesPonderado_ProgramadoTemp=[];
    var id_padreTareaPonderado_programadoTemp=-1;
    function saberSiSumanPorcentajePonderadoProgramado100loshijos(args)
    {
        // console.log(args);
        var bandera=1;
        var key = args.key;
        var sumatoria = 0;
        var dataFinal=[];
        // var hijos = [];

        // id_padreTareaPonderado_programadoTemp
        $.each(datosTreeList,(index,value)=>
        {
            // console.log(value);
            if(value.id == key)
            {
                if(value.parent != id_padreTareaPonderado_programadoTemp)
                {
                    datosModificadosActividadesPonderado_ProgramadoTemp=[];
                    id_padreTareaPonderado_programadoTemp = value.parent;
                    console.log("reiniciado");
                }
            }
        });

        // if(datosModificadosActividadesPonderado_ProgramadoTemp.length == 0)
        //     datosModificadosActividadesPonderado_ProgramadoTemp.push(args);
        // else
        // {
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
        console.log(datosModificadosActividadesPonderado_ProgramadoTemp);
        if(sumatoria>=100 && sumatoria<=100.5)
        {
            alert("Correcto");
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
                alert("El total es menor al 100% del ponderado de la tarea padre  su sumatoria es "+sumatoria +" y su restante es de "+(100-sumatoria));
                
            }else
            alert("El total es mayor al 100% del ponderado de la tarea padre");
        }
    }
    
    
    
    
    
  </script>
  
  
 
  
  
  
</html>
