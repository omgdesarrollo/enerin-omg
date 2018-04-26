<?php
session_start();
require_once '../util/Session.php';
//$error=Session::eliminarSesion("error");
//$usuario=Session::eliminarSesion("usuario");
if (Session:: NoExisteSeSion("user")){
    header("location: login.php");
    return;
}

$Usuario=  Session::getSesion("user");


?>

<!DOCTYPE html>
<html>
<head>
	<title>OMG</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="../../codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
  <link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
   <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
   <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
   <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="../../codebase/dhtmlx.js"></script>
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
        <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
        <script src="../../js/funcionessidebar.js" type="text/javascript"></script>
        <style>
		div#sidebarObj {
			position: relative;
			/*margin-left: 10px;*/
			/*margin-top: 50px;*/
			/*width: 100%    ;*/
                        overflow:auto ;
			height: 450px;
			/*box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		}
                
                
                div#sidebarObjV {
			position: relative;
			/*margin-left: 10px;*/
                        /*margin-top: 50px;*/
			/*width: 900px    ;*/
                        overflow: auto;
                        height: 450px;
/*			box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		}
	</style>
	<script>
            
            
            
		var dhxWins, w1,w , myLayout, mySidebar,ribbon,layout;
                var arr = [];
                var nombre_usuario;
//                dhtmlx.image_path='../../codebase/imgs/';
                var seccionHerramientas=[
					
					{id:'adjuntar',text:'Adjuntar Documento',img:'attach.png',imgdis:"attach_dis.png", type:'button',isbig:true}	
	  		      	
	  		      	//,{id:'cuadre',text:'Cuadre recursos',img:'643.png', imgdis:"643_dis.png",type:'button'}	  		  	
 ];
 
 var seccionReporte=[
      {id:'excel',text:'Excel',img:'File_XLS_Excel.png', type:'button'},
      {id:'pdf',text:'PDF',img:'FILE_PDF.png', type:'button'}
 ];
 
 var seccionCatalogo=[
     {id:'catalogo', text:'Informacion',img:'catalogo.png',type:'button',isbig:true}  
 ];
 
 var seccionCumplimiento=[
     {id:'documentos',text:'Documentos',img:'documentos.png',type:'button',isbig:true} ,
     {id:'operaciones',text:'Operaciones',img:'operaciones.png',type:'button',isbig:true},
     {id:'planaccion',text:'Plan de Accion',img:'planaccion.png',type:'button',isbig:true}
 ];
 
 var seccionInformesGerenciales=[
     {id:'informe',text:'Informe',img:'documentos.jpg',type:'button',isbig:true}  
 ];

  var seccionOficios=[
     {id:'catalogooficios',text:'Catalogos',img:'catalogos.png',type:'button',isbig:true},  
     {id:'documentacion',text:'Documentacion',img:'oficios.png',type:'button',isbig:true},  
     {id:'vistas',text:'Vistas',img:'vistas.png',type:'button',isbig:true}  
 ];
  var cambiodeidioma=[
      {
          id:'cambioespanol',text:'Cambiar a ESPAÑOL',img:'',type:'button',isbig:true
      },
      {
          id:'cambioingles',text:'Cambiar a INGLES',img:'',type:'button',isbig:true
      }
  ];


  datacontratos=[];
 loadDataContratos();
    

  
 var infosesionusuario=[
     {id:'sesionusuario',text:'<div id="infousuario"><?php echo $Usuario["NOMBRE_USUARIO"]; ?></div>',img:'user.png', type:'button',isbig:true}
 ];
// nombre_usuario=$("#idusuario").val();
 
	$(function() {	
      
           //  layout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});
        
        myLayout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});
//			myLayout.cells("a").setWidth(250);
//                        myLayout.cells("a").setText("Catalogo");
        myLayout.cells("a").setWidth(310);
//         myLayout.cells("a").attachSidebar();
        myLayout.cells("a").attachObject("sidebarObj");
        myLayout.cells("b").attachObject("sidebarObjV");
        
        //loadDataContratos();
       
         //alert("n:   "+arr[1].text);
//            $.each(listseleccioncontratos,function(index,value){
//                         alert("v  "+value.CUMPLIMIENTO);
//                       
////                        alert(""+value.CLAVE_CUMPLIMIENTO); 
//                     });
       
//        var myCombo = new dhtmlXCombo("combo_zone2","alfa2",200);
        
//         myLayout.cells("b").attachObject("menugrid");
//                  myGrid = new dhtmlXGridObject({parent : 'gridbox'});
//			myGrid.setImagePath("../../codebase/imgs/");
//			myGrid.setHeader("NOMBRE EMPLEADO");
//			myGrid.setInitWidths("200");
//			myGrid.setColAlign("left");
//			myGrid.setColTypes("NOMBRE_EMPLEADO");
////                        myGrid.setColumnHidden(2,true);
////			myGrid.setColSorting("int,str,str");
////                        myGrid.setColSorting("int");
//			myGrid.init();
                        
//        myLayout.cells("b").attachURL("principalmodulos.php", null, true);
//        myLayout.cells("a").attachObject("empleado");
       
     //   myLayout.cells("a").attachObject("treeboxbox_tree");	
        
//        tree = new dhtmlXTreeObject('treeboxbox_tree', '100%', '100%', 0);
//			tree.setImagePath("../../codebase/imgs/dhxtree_material/");
                        //tree.setImagePath("../../codebase/imgs/dhxtree_material/");
	//		tree.enableKeyboardNavigation(true);
	//		tree.enableKeySearch(true);	
        
//       myLayout.cells("a").attachTreeView({
//      parent:"treeviewObj",
//    items: [
//        {id: 1, text: "Books", open: 1, items: [
//            {id: 2, text: "Turned at Dark / C. C. Hunter"},
//            {id: 3, text: "Daire Meets Ever / Alyson Noël"},
//            {id: 4, text: "Socs and Greasers / Rob Lowe"},
//            {id: 5, text: "Privacy and Terms.pdf"},
//            {id: 6, text: "Licence Agreement.pdf"}
//        ]}
//    ]
//});
        loadDataMenuArriba();
       
//  mySidebar = new dhtmlXSideBar({
//				parent: "sidebarObj",
//				icons_path: "",
//				json: ""
//			});
//           mySidebar.attachEvent("onClick", function(itemId, bId){
//                                    alert("d");
//                        });
                    ribbon.attachEvent("onClick", function(itemIdSeleccion, bId){
                        if(itemIdSeleccion=="cambiaresc")
                            alert("le has picado a cam biar act");
                        
                        if(itemIdSeleccion=="logout")
         //                   alert("le has picado a cerrar sesion");
//                        cerrarSesion(false);
                            logout();
                        if(itemIdSeleccion=="principal")
                           alert("le has picado a principal");
                        
                        if(itemIdSeleccion=="adjuntar")
                           alert("le has picado ajuntar");
                        
                        if(itemIdSeleccion=="autorizar")
                           alert("le has picado autorizar");
                        
                        if(itemIdSeleccion=="excel")
                           alert("le has picado a excel ");
                        
                        if(itemIdSeleccion=="pdf")
                           alert("le has picado a pdf");
                        
                        if(itemIdSeleccion=="catalogo")
                           loadDataSideBarCatalogoInformacion();
                       
                       if(itemIdSeleccion=="documentos")
                           loadDataSideBarCumplimientosDocumentos();
                       if(itemIdSeleccion=="operaciones")
                           loadDataSideBarCumplimientosOperaciones();
                       if(itemIdSeleccion=="planaccion")
                           loadDataSideBarCumplimientosPlanDeAccion();
                        if(itemIdSeleccion=="catalogooficios")
                           loadDataSideBarOficiosCatalogos();
                       
                        if(itemIdSeleccion=="documentacion")
                           loadDataSideBarOficiosDocumentacion();
                       
                        if(itemIdSeleccion=="vistas")
                           loadDataSideBarOficiosVistas();
                       
                           
                       
                    });      
                    }	
                            
                            
//                            
         );
 
 function loadDataMenuArriba(){	
//	alert("data "+data.id);
	var inicio=[
{id:'00',text:'Seleccion de contrato(Click)' ,items:[
        
        {id:'0x1',mode:'cols',text:'Contratos',type:'block',
            list:datacontratos
        }
]},         
	{id:'0',text:'OMG', active:true, items:[
	{id:'0x2',mode:'cols',text:'Principal',type:'block', 
		list:[
		    {id:'logout',text:'Cerrar',img:'cerrarsesion.png', type:'button',isbig:true}
//		    {id:'principal',text:'Inicio',img:'inicio.png', type:'button',isbig:true} 
		   
		      ]	},
//	{id:'0x3',mode:'cols',text:'Herramientas',type:'block', 
//		  		list:seccionHerramientas},	
	  		
	{id:'0x31',mode:'cols',text:'Reporte',type:'block', 
	  		list:seccionReporte
	  		     
	},
      
                            {id:'0x32',mode:'cols',text:'Catalogo',type:'block',
		  		list:seccionCatalogo},	
                             
                             {id:'0x33',mode:'cols',text:'Cumplimientos',type:'block',
		  		list:seccionCumplimiento},
                            
                             {id:'0x34',mode:'cols',text:'Informes Gerenciales',type:'block',
          list:seccionInformesGerenciales},
                             
                             {id:'0x35',mode:'cols',text:'Oficios',type:'block',
          list:seccionOficios},
                             
                             {id:'0x36',mode:'cols',text:'Usuario',type:'block',
          list:infosesionusuario}
	] },
    {id:'002',text:'Configuraciones' ,items:[
        
        {id:'0x1',mode:'cols',text:'Cambio de idioma',type:'block',
            list:cambiodeidioma
        }
]}
        ];
    
    
ribbon = new dhtmlXRibbon({	parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs: inicio	});
  
//    var dhxWins = new dhtmlXWindows();
//var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);

    }





    









    
    function consultarInformacion(url){
               $.ajax({  
                     url: ""+url,  
                    success: function(r) {    
                     $("#procesando").empty();
                     },
                     beforeSend:function(r){
//                          $("#loader").empty();
                          $("#sidebarObjV").append("<div class='loader'></div>");
//                            $.jGrowl("Cargando  Porfavor Espere......", { header: 'Carga de Informacion' });
//                         alert("e");
//                          $("#sidebarObjV").append("Cargando Informacion ...");
//$.jGrowl("Cargando  Porfavor Espere......", { sticky: true });

//var delay = 1000;
//							setTimeout(function(){
//                                                            $.jGrowl("Informacion Obtenida", { sticky: true });
//                                                        },delay);

                     }
                 
        });  
            }
//    {id:'contratos',text:'Contrato 1',img:'contratos.png', type:'button',isbig:true}


    
    
   function loadDataArbol(){
//          myTreeView = myLayout.cells("a").attachTreeView({
//				root_id: "",
//				iconset: "font_awesome",
//				items: "xml/directoryTree.php?id={id}"
//			});
                        
//                        var myTreeView = new dhtmlXTreeView({
//    parent:"treeviewObj",
//    items: [
//        {id: 1, text: "Books", open: 1, items: [
//            {id: 2, text: "Turned at Dark / C. C. Hunter"},
//            {id: 3, text: "Daire Meets Ever / Alyson Noël"},
//            {id: 4, text: "Socs and Greasers / Rob Lowe"},
//            {id: 5, text: "Privacy and Terms.pdf"},
//            {id: 6, text: "Licence Agreement.pdf"}
//        ]}
//    ]
//});


//	    	var list=[];
//// 	    	var dsub=[];
//// 	    	dsub.push(comboSub.getSelectedValue());
//// 	    	dsub.push(0);
//// 	    	dub.push(comboSub.getComboText());
//// 	    	
//// 	    	list.push(dsub);
//	    	alert("d");
//                tree.deleteChildItems(0);
//			
//var a=[];								
//							 a.push(1);
//							 a.push(0);
//							 a.push("Empleados");
//							 list.push(a);	
//                                                         a=[];
//                                                         a.push(2);
//							 a.push(1);
//							 a.push("Empleados1");
//			list.push(a);
//
//			 if(list.length>0){
//			tree.parse(list, "jsarray");
//				 existenodo=true;
//			 }else
//				 existenodo=false;

		}
                
                
     function loadDataContratos(){
//         alert("usuario es "+$("#idusuario").val());
          $.ajax({  
                     url: "../Controller/CumplimientosController.php?Op=Listar&TipoOperacion=ListarContratosPorUsuario&usuario=<?php echo $Usuario["NOMBRE_USUARIO"]; ?>",  
                     async:false,
                     success: function(r) {
                        //alert("en:   ");
//                     datacontratos.push( {id:'oficio',text:''+,img:'oficios.png',type:'button',isbig:true} )
                     
                     $.each(r,function(index,value){
                        // alert("ya entro y "+value.CLAVE_CUMPLIMIENTO);
                      datacontratos.push( {id:'contratos',text:value.CLAVE_CUMPLIMIENTO,img:'oficios.png',type:'button',isbig:true} )

                         })                       
                        }    

    
    });
     }
         
    function logout(){
            swal({
  title: "Cerrar Sesion",
  text: "Confirme si desea cerrar sesion",
  type: "warning",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
    window.location.href="Logout.php";
//  setTimeout(function () {
//        temporalcierresesion=1;
//    swal("Sesion finalizada de manera correcta");
//  }, 2000);

 
});
    }
    function cerrarSesion(bclose){
            var dhxWins = new dhtmlXWindows();
//var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
 var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:430,  height:205,  center:true,resize: true,park:true,modal:true	});
 layoutWin.attachURL("login.php", null, true);
 
//	w = dhxWins.createWindow({id:"cet", text:"OMG", left: 20, top: 30,width:430,  height:205,  center:true,resize: false,park:false,modal:true	});
//	w.attachURL("login.php",null, {});
////	w.setIconCss("iconi"); 	
////	w.button('park').hide();
////	w.button('minmax').hide();
//	if (bclose) w.button('close').hide();
//	w.attachEvent("onClose", function(win){
//	    return true;
//	});
}            
                
//		function doOnLoad() {
//			
//			//dhxWins = new dhtmlXWindows();
//			//dhxWins.attachViewportTo("winVP");
////                        dhxWins.setHeader("dd");
////                        myLayout.cells("").setText("Folders");
//			myLayout = new dhtmlXLayoutObject("layoutCatalogoBase", "2U");
//			myLayout.cells("a").setWidth(250);
//                        myLayout.cells("a").setText("Catalogo");
//                            
//                          //  myLayout.cells("b").hideHeader();
//                        myLayout.cells("b").setText("Visualizacion");
//                        myLayout.cells("a").attachObject("layoutCatalogoBase");
//                        
//                        
////                        myTreeView = myLayout.cells("a").attachTreeView({
////				root_id: "",
////				iconset: "font_awesome",
////				items: "xml/directoryTree.php?id={id}"
////			});
//                        
//			//w1 = dhxWins.createWindow("w1", 20, 30, 600, 400);
//			//myLayout = w1.attachLayout("2U");
////			myLayout.cells("c").setText("Folders");
//			// or
//			// myLayout = new dhtmlXLayoutObject({parent: w1, pattern: "3L"});
//		}

        </script>
        

</head>
<body>
    
    <!--<div id="layoutCatalogoBase"></div>-->
<!--    <div id="tbtemp" style="position: absolute;top: -2px; height: 20px; width: 130px;z-index: 104;left: 1px;">
		<div id="tbprincipal"></div>
	</div>	-->
    
<div id="ribbonObj" style="position: relative;width: 100%;"></div>
   
    
<div id="layoutObj" class="layoutObj"> 

    <!--<div id="combo_zone2" style="width:200px; height:30px;"></div>-->
</div>
<!--    <div id="treeviewObj" > 


</div>-->
    
    <!--<div id="treeboxbox_tree" class="treeboxbox_tree" style="height:100%;"></div>-->
    <div id="sidebarObj"> </div>
    
    <div id="sidebarObjV">
        
        
        
    </div>

    
    <div id="infousuario">
      
    </div>

    <!--<div id="idusuario" type="hidden" value="<?php echo $Usuario["NOMBRE_USUARIO"]; ?>" >-->
</body>
</html>