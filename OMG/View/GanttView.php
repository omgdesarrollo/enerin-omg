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
   
  <style type="text/css">
    html, body{
      height:100%;
      padding:0px;
      margin:0px;
      overflow: hidden;
    }

  </style>

 
        
      
        
        	
		
  </head>
    <body>
        
        
     
         <input value="Exportar a pdf" type="button" onclick="gantt.exportToPDF()" style="margin:20px;">
    <input value="Exportar a imagen" type="button" onclick="gantt.exportToPNG()">

  
        
    
    <div id="gantt_here" style='width:100%; height:100%;'></div>
    </body>
    
    
    
    
    
  <script type="text/javascript">
      
      
      
       var tasksA = {
                data: [
                    {
                        id: 1, text: "Project #1", start_date: "01-04-2018", duration: 18, order: 10,
                        progress: 0.4, open: true
                    },
                    {
                        id: 2, text: "Task #1", start_date: "02-04-2018", duration: 8, order: 10,
                        progress: 0.6, parent: 1
                    },
                    {
                        id: 3, text: "Task #2", start_date: "11-04-2018", duration: 8, order: 20,
                        progress: 0.6, parent: 1
                    }
                ],
                links: [
                    { id: 1, source: 1, target: 2, type: "1" }
                ]
            };
            
            var tasksB = {
                data: [
                    {
                        id: 1, text: "Project #2", start_date: "01-04-2018", duration: 18, order: 10,
                        progress: 0.4, open: true
                    },
                    {
                        id: 3, text: "Task #3", start_date: "02-04-2018", duration: 1, order: 10,
                        progress: 0.6, parent: 1
                    },
                    {
                        id: 4, text: "Task #4", start_date: "03-04-2018", duration: 1, order: 20,
                        progress: 0.6, parent: 1
                    }
                ],
                links: [
                    { id: 3, source: 3, target: 4, type: "0" }
                ]
            };



    gantt.init("gantt_here");
    
    gantt.parse(tasksA);
    
     //gantt2 = Gantt.getGanttInstance();
    
    
    
  </script>
</html>
