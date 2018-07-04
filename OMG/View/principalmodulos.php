<?php
session_start();
require_once '../util/Session.php';
//$error=Session::eliminarSesion("error");
//$usuario=Session::eliminarSesion("usuario");
if (Session:: NoExisteSeSion("user")){
    header("location: login.php");
    return;
}
$urls["fisica"] = "C:xampp/htdocs/enerin-omg/archivos/";
$urls["logica"] = "".$_SERVER['HTTP_HOST']."/enerin-omg/archivos/";
//para hallar ruta fisica tanto web como local
//echo dirname(__FILE__);
//temrina para hallar ruta fisica tanto web como local 
//rutas web 
//$urls["fisica"] = "/home/fpa9q09nzhnx/public_html/omgcum/archivos/";
//$urls["logica"] = 'http://www.enerin-omgapps.com/omgcum/archivos/';
// $urls[""] = ;
Session::setSesion("URLS",$urls);
$Usuario=  Session::getSesion("user");
//$tokenseguridad=  Session::getSesion("token");
//$tse=$tokenseguridad["tokenseguridad"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>OMG APPS</title>
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
                        /*overflow: auto;*/
                        height: 450px;
/*			box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		}
                
                div#arbolprincipal{
/*                  position: relative;*/
                    height:500px; 
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
     {id:'Informacion', text:'Informacion',img:'catalogo.png',type:'button',isbig:true}  
 ];
 
 
 var seccionCumplimiento=[
     {id:'documentos',text:'Validacion de Documentos',img:'documentos.png',type:'button',isbig:true} ,
     {id:'evidencias',text:'Evidencias',img:'operaciones.png',type:'button',isbig:true},
     //{id:'planaccion',text:'Plan de Accion',img:'planaccion.png',type:'button',isbig:true}
 ];
 
 
 var seccionGantt=[
     {id:'tareas',text:'Carga Programa Gantt',img:'663.png',type:'button',isbig:true} ,
 ];
 
 var seccionReportesGerenciales=[
     {id:'reporte',text:'Reporte',img:'documentos.jpg',type:'button',isbig:true}  
 ];

  var seccionOficios=[
     {id:'catalogooficios',text:'Catalogos',img:'catalogos.png',type:'button',isbig:true},  
     {id:'documentacion',text:'Documentacion',img:'oficios.png',type:'button',isbig:true},  
     {id:'cargaprograma',text:'Carga Programa Gantt',img:'663.png',type:'button',isbig:true},
     {id:'informegerencial',text:'Informe Gerencial',img:'seguimiento.png',type:'button',isbig:true}
 ];
  var cambiodeidioma=[
      {
          id:'cambioespanol',text:'Cambiar a ESPAÑOL',img:'',type:'button',isbig:true
      },
      {
          id:'cambioingles',text:'Cambiar a INGLES',img:'',type:'button',isbig:true
      }
  ];

 var cambiodeidioma=[
      {
          id:'cambioespanol',text:'Cambiar a ESPAÑOL',img:'',type:'button',isbig:true
      },
      {
          id:'cambioingles',text:'Cambiar a INGLES',img:'',type:'button',isbig:true
      }
  ];
  
  
var gantt=[
    {
         id:'cargadeprograma',text:'Carga de Programa',img:'',type:'button',isbig:true
    }  
];

  datacontratos=[];
  dataSeccionRibbon=[];
//    loadEstructuraMaster();
//    loadDataContratos();
   loadDataNotificaciones();
   

  
 var infosesionusuario=[
     {id:'sesionusuario',text:'<div id="infousuario"><?php echo "Bienvenido <br>".$Usuario["NOMBRE_USUARIO"]; ?></div>',img:'user.png', type:'button',isbig:true}
 ];
// nombre_usuario=$("#idusuario").val();
 
	$(function() {	
      
           //  layout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});
        
        myLayout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});

        myLayout.cells("a").setWidth(310);
        myLayout.cells("a").attachObject("sidebarObj");
        myLayout.cells("b").attachObject("sidebarObjV");
        
//                    loadDataContratos();
                  loadDataMenuArriba("");
//                    loadEstructuraMaster();
 
                    ribbon.attachEvent("onClick", function(itemIdSeleccion, bId){
//                         alert(itemIdSeleccion);
                        if(itemIdSeleccion=="sesionusuario")
//                            loadViewUsuario();
                            loadDataSideBarAjustesUsuario();
                            // $("#sidebarObjV").html('UsuarioAjusteView.php');
                        
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
                        
                        if(itemIdSeleccion=="Informacion") 
                           loadDataSideBarCatalogoInformacion();
                       
                        if(itemIdSeleccion=="documentos")
                           loadDataSideBarCumplimientosDocumentos();
                       
                        if(itemIdSeleccion=="evidencias")
                            loadDataSideBarCumplimientosEvidencias();

                        if(itemIdSeleccion=="tareas")
                            loadDataSideBarTareasGantt();
                        
                        if(itemIdSeleccion=="reporte")
                            loadDataSideBarReportesGerenciales();
                        
                        if(itemIdSeleccion=="catalogooficios")
                            loadDataSideBarOficiosCatalogos();
                       
                        if(itemIdSeleccion=="documentacion")
                            loadDataSideBarOficiosDocumentacion();
                        if(itemIdSeleccion=="informegerencial")
                            loadDataInformeGerencial();
                        if(itemIdSeleccion=="cargaprograma")
                            loadDataCargaProgramaGantt();
                       
                    });      
                    }	
                            
                            
//                            
         );

 function loadDataMenuArriba(iniciodinamic){	

     
     
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
		   
		      ]	},
                            {id:'0x32',mode:'cols',text:'Catalogo',type:'block',
          list:seccionCatalogo},	
                             
                             {id:'0x33',mode:'cols',text:'Cumplimientos',type:'block',
          list:seccionCumplimiento},
      
                             {id:'0x33',mode:'cols',text:'Tareas',type:'block',
          list:seccionGantt},
                            
                             {id:'0x34',mode:'cols',text:'Reportes Gerenciales',type:'block',
          list:seccionReportesGerenciales},
                             
                             {id:'0x35',mode:'cols',text:'Oficios',type:'block',
          list:seccionOficios},
                             
                             {id:'0x36',mode:'cols',text:'Usuario',type:'block',
          list:infosesionusuario}
	] }
        ];
    
    
ribbon = new dhtmlXRibbon({	parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs:inicio});
  
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
                          $("#sidebarObjV").append("<div class='loader'></div>");


                     }
                 
        });  
            }

function loadDataNotificaciones(){
           $.ajax({  
                     url: "../Controller/NotificacionesController.php?Op=mostrarNotificaciones->Responsable",  
                    success: function(r) {    
//                     $("#procesando").empty();
                     },
                     beforeSend:function(r){
//                          $("#sidebarObjV").append("<div class='loader'></div>");


                     }
                 
        });
        
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
                        
                      datacontratos.push( {id:'contratos',text:value.clave_cumplimiento,img:'oficios.png',type:'button',isbig:true} );

                         })                       
                        }    
        });
     }
      
      function loadEstructuraMaster(){
      var seccionMenuDinamic=[];
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
		   
		      ]	},
                            {id:'0x32',mode:'cols',text:'Catalogo',type:'block',
          list:seccionCatalogo},	
                             
                             {id:'0x33',mode:'cols',text:'Cumplimientos',type:'block',
          list:seccionCumplimiento},
      
                             {id:'0x33',mode:'cols',text:'Tareas',type:'block',
          list:seccionGantt},
                            
                             {id:'0x34',mode:'cols',text:'Reportes Gerenciales',type:'block',
          list:seccionReportesGerenciales},
                             
                             {id:'0x35',mode:'cols',text:'Oficios',type:'block',
          list:seccionOficios},
                             
                             {id:'0x36',mode:'cols',text:'Usuario',type:'block',
          list:infosesionusuario}
	] }
        ];
      
//      alert("va a realizar una reestrucutracion");
      var contadorid=1;
      var contadorinternoitems=1;
//      var tabs=[];
      var submodulosItems=[];
      var submodulosItemsDataHelp=[];
      
      var seccioneslistadentroItems=[];
      var seccioneslista_seleccion=[];
      var iterar=0;
//      var seccion
            $.ajax({
                 url: "../Controller/LoadEstructuraPantallaGeneralController.php?Op=Listar",  
                     async:false,
                     success: function(r) {
                         
                        //alert("en:   ");
//                     datacontratos.push( {id:'oficio',text:''+,img:'oficios.png',type:'button',isbig:true} )
                     seccionMenuDinamic.push({id:''+(contadorid++),text:'Seleccion de contrato(Click)' ,items:[        
                            {id:'0',mode:'cols',text:'Contratos',type:'block',list:datacontratos}
                            ]});
                      submodulosItems.push({id:''+(contadorid++),mode:'cols',text:'Principal',type:'block', 
                        list:[
                                {id:'logout',text:'Cerrar',img:'cerrarsesion.png', type:'button',isbig:true}
		   
                              ]	});  
                        $.each(r,function(index,value){
// var seccionCatalogo=[
//     {id:'catalogo', text:'Informacion',img:'catalogo.png',type:'button',isbig:true}  
// ];
//                                
                                   if(value.EDIT=="true" || value.consult=="true" || value.delete=="true" || value.new=="true"){
                                        var listadentroitems=[];
                                        listadentroitems.push({id:value.nombre_contenido_sub, text:value.nombre_contenido_sub,img:value.imagen_seccion_up,type:'button',isbig:true});
                                        
                                        cont=value.nombre_contenido_sub;
                                        if(iterar>0){
                                            $.each(listadentroitems ,function (i,v){
    //                                               alert("w  :"+ v.id);
                                                   va=v.id;       
                                                  $.each(r,function(i,v){
    //                                                        if(va=!v.){
    //                                                            
    //                                                        }
    //                                                    alert(v)
                                                  });

                                            });  
                                            
                                        }
                                        
                                        
                                            submodulosItems.push({id:''+(contadorid++),mode:'cols',text:''+value.nombre_submodulo,type:'block', list:listadentroitems});
//                                        }
                                        iterar++;
                //                                    iterar=1;
                                    }
                              });
                     seccionMenuDinamic.push({id:""+(contadorid++),text:'OMG', active:true, items:submodulosItems});
//                            
                       loadDataMenuArriba(seccionMenuDinamic);
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
    
    
    
    function loadDataCargaProgramaGantt(){
          consultarInformacion("../Controller/EmpleadosController.php?Op=Listar"); 
          consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo"); 
          
          consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
        
    var dhxWins = new dhtmlXWindows();
//var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
 dhxWins.attachViewportTo("arbolprincipal");
 var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:1338,  height:505,  center:true,resize: true,park:true,modal:true	});
 layoutWin.attachURL("SeguimientoEntradaView.php", null, true);
 
        dhxWins.attachEvent("onMinimize", function(win){
    // your code here
//    alert("d");
        });
        
        dhxWins.attachEvent("onShow", function(win){
    // code here
    alert("d");
        });
    dhxWins.attachEvent("onHide", function(win){
    // your code here
    alert("en onhide");
});

    }
    
    
    
    function cerrarSesion(bclose){
            var dhxWins = new dhtmlXWindows();
//var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
 var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:430,  height:205,  center:true,resize: true,park:true,modal:true	});
 layoutWin.attachURL("login.php", null, true);
 

}            
                

        </script>
        

</head>
<!--<body>-->
<body onload="consultarInformacion('../Controller/DocumentosEntradaController.php?Op=Alarmas')">
    
    
    <!--<div id="layoutCatalogoBase"></div>-->
<!--    <div id="tbtemp" style="position: absolute;top: -2px; height: 20px; width: 130px;z-index: 104;left: 1px;">
		<div id="tbprincipal"></div>
	</div>	-->
<!--<div id="arbolprincipal">--> 
<div id="ribbonObj" style="position: relative;width: 100%;"></div>
   
    
<div id="layoutObj" class="layoutObj"> 
    <div id="arbolprincipal"> </div>
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
<!--</div>-->
    <!--<div id="idusuario" type="hidden" value="<?php echo $Usuario["NOMBRE_USUARIO"]; ?>" >-->
</body>
</html>