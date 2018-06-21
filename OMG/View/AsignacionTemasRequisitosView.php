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
    
        <!--<link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>-->
        <!--<script src="../../codebase/dhtmlx.js" type="text/javascript"></script>-->
        <!--<link href="../../codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
        <!--<link href="../../skins/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
        <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
        <link href="../../assets/dhtmlxSuite_v51_std/skins/web/dhtmlx.css" rel="stylesheet" type="text/css"/>
        
        
<!--        <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
        <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
        <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/dhtmlxSuite_v51_std/skins/material/dhtmlx.css" rel="stylesheet" type="text/css"/>-->
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
		width: 900px;
		height: 350px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
		/*margin: 0 auto;*/
                }
                
     
                    
          
          
          
          
                </style>    
                
                
                

	</head>

<body class="no-skin" onload="loadSpinner()">
            <!--<div>Cargando...</div>-->

            
<?php

    require_once 'EncabezadoUsuarioView.php';

?>



<div style="height: 10px"></div>


<div id="layout_here"></div>

<div id="treeboxbox_tree"></div>   

<div id="temas">
    <div id="contenido"></div>
</div>
<!--<div id="gridbox" style="width:500px; height:350px; background-color:white;"></div>-->

	<script>
            var myLayout, myTreeView, myGrid, myDataView, myMenu, myToolbar;
            myTree = new dhtmlXTreeObject('treeboxbox_tree', '100%', '100%',0);
	    myTree.setImagePath("../../codebase/imgs/dhxtree_material/");
//            myTree.enableHighlighting(true);

dataArbol=[["1","0","de"],["2","1","fes"],["3","1","el texto es de la siguiente manera que se puede trabajar "],["5","0","de"]];
  
    myTree.deleteChildItems(0);
 
  if(dataArbol.length>0){
    myTree.parse(dataArbol, "jsarray");
  }
//    obtenerDatosArbol();


var myLayout = new dhtmlXLayoutObject({
			parent: "layout_here",
			pattern: "2U",
			cells: [
				{id: "a", width: 240, text: "Temas"},
				{id: "b", text: "Descripcion"}
				
			]
		});
              myLayout.cells("b").hideHeader();  




var myToolbar = myLayout.cells("b").attachToolbar({
			iconset: "awesome",
			items: [
				{type: "button", text: "Actualizar", img: "fa fa-refresh fa-spin"},
                                {type: "button", text: "Guardar", img: "fa fa-save "},
				{type: "button", text: "Eliminar", img: "fa fa-trash-o "}
			]
		});
                       myLayout.cells("a").attachObject("treeboxbox_tree");
                
                        
                  
     function obtenerTemas(){
          $.ajax({
            url: '../Controller/RegistrosController.php?Op=GenerarArbol',
            type: 'GET',
            data: 'ID_ASIGNACION='+id_asignacion,
            success:function(data)
            {
               
                $.each(data,function(index,value)
                {
                    dataArbol.push([padre,0,value.requisito]);
                    dataIds.push([padre,value.id_requisito,value.requisito]);
                    $.each(value[0],function(ind,val)
                    {
                        hijo++;
                        dataArbol.push([hijo,padre,val.registro]);
                        dataIds.push([hijo,val.id_registro,val.registro]);
                    });
                    hijo++;
                    padre=hijo;
                });
//                console.log(dataArbol);
                showArbol(dataArbol,dataIds);
            }
        });
     }                
        
    // obtenerDatosArbol(1);
    function obtenerDatosArbol(id_asignacion)
    {
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
                $.each(data,function(index,value)
                {
                    dataArbol.push([padre,0,value.requisito]);
                    dataIds.push([padre,value.id_requisito,value.requisito]);
                    $.each(value[0],function(ind,val)
                    {
                        hijo++;
                        dataArbol.push([hijo,padre,val.registro]);
                        dataIds.push([hijo,val.id_registro,val.registro]);
                    });
                    hijo++;
                    padre=hijo;
                });
//                console.log(dataArbol);
                showArbol(dataArbol,dataIds);
            }
        });
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

              
		