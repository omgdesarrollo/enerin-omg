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
    
   <script src="../../codebase/ext/dhtmlxgantt_smart_rendering.js"></script>
    
    
    
    
     <!--<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
    
     <link href="../../assets/gantt_5.1.2_com/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
    
    
  <style type="text/css">
    html, body{
      width: 100%;
      height: 100%;
/*      padding:0px;
      margin:0px;*/
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
                
                

  </style>

 
        
      
        
        	
		
  </head>
    <body>
        
        
     
  <form action="">
      <input type="submit" value="Recargar">      
      
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
      
      gantt.attachEvent("onLinkClick", function (id) {
          
       alert("le has picado");   
      });
      
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
gantt.message({
		text: "Predefinido Estructura de proyecto <br>1 - <b>Projecto</b><br>2 - <b>Subprojecto</b><br>3 - <b>Tareas</b><br>las tareas no pueden tener elementos secundarios Click para cerrar",
		expire: -1
	});
gantt.config.scale_height = 60;

  gantt.serverList("stage", [
		{key: 1, "label": "Planeacion"},
		{key: 2, "label": "Prueba"}
	]);
	gantt.serverList("user", [
		{key: 0, label: "N/A"},
		{key: 1, label: "Hugo"},
		{key: 2, label: "Frank"},
		{key: 3, label: "Daniel"}
	]);
	gantt.serverList("priority", [
		{key: 1, label: "Alta"},
		{key: 2, label: "Normal"},
		{key: 3, label: "Baja"}
	]);
        
//        gantt.config.order_branch = true;
//	gantt.config.grid_width = 420;
//	gantt.config.row_height = 24;
//	gantt.config.grid_resize = true;
//gantt.locale.labels.column_nombre =
//		gantt.locale.labels.section_nombre = "Nombre";
        
	gantt.locale.labels.column_priority =
		gantt.locale.labels.section_priority = "Prioridad";
	gantt.locale.labels.column_owner =
		gantt.locale.labels.section_owner = "Encargado";
	gantt.locale.labels.column_stage =
		gantt.locale.labels.section_stage = "Escenario";

	function byId(list, id) {
		for (var i = 0; i < list.length; i++) {
			if (list[i].key == id)
				return list[i].label || "";
		}
		return "";
	}
        
        
gantt.config.columns = [
		{name: "text", label: "Nombre", tree: true, width: '*'},
		{
			name: "priority", width: 80, align: "center", template: function (item) {
				return byId(gantt.serverList('priority'), item.priority)
			}
		},
		{
			name: "owner", width: 80, align: "center", template: function (item) {
				return byId(gantt.serverList('user'), item.user)
			}
		},
		{
			name: "stage", width: 80, align: "center", template: function (item) {
				return byId(gantt.serverList('stage'), item.stage)
			}
		},
		{name: "add", width: 40}
	];


gantt.config.lightbox.sections = [
		{name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
		{name: "priority", height: 22, map_to: "priority", type: "select", options: gantt.serverList("priority")},
		{name: "owner", height: 22, map_to: "user", type: "select", options: gantt.serverList("user")},
		{name: "stage", height: 22, map_to: "stage", type: "select", options: gantt.serverList("stage")},
		{name: "time", type: "duration", map_to: "auto"}
	];




  








    gantt.init("gantt_here");
    
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
    
    
    
    
    

    
    
    
    
    
    
    
  </script>
  
  
  
  
</html>
