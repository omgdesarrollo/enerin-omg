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
$urls["logica"] = "../../../enerin-omg/archivos/";
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
        <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
        <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
        <style>
                .modal-body{
                      color:#888;
                      max-height: calc(100vh - 110px);
                      overflow-y: auto;
                     
                    } 
            
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
     {id:'informecumplimientos',text:'Informe',img:'documentos.jpg',type:'button',isbig:true}
 ];
 
 
 var seccionTareas=[
     {id:'tareas',text:'Registro de Tareas',img:'tareas.png',type:'button',isbig:true} ,
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

  datacontratos=[
//         {id:'cambiarcontrato',text:'Cambiar Contrato',img:'contratos.png',type:'button',isbig:true}
         {id:'cambiarcontrato',text:'<div id=\'infocontrato\'>Contrato Seleccionado:</div>',img:'contratos.png',type:'button',isbig:true}
  ];
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
                  loadDataMenuArriba("","NO SELECCIONADO");
//                    loadEstructuraMaster();
                  
                    ribbon.setSizes();
                    ribbon.attachEvent("onClick", function(itemIdSeleccion, bId){
//                         alert(itemIdSeleccion);

//                        if(itemIdSeleccion=="cambiarcontrato")
//                            cambiarCont();
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
                        
                        if(itemIdSeleccion=="cambiarcontrato")
                            loadDataSideBarContratos();  
                        
                
                        if(itemIdSeleccion=="Informacion") 
                           loadDataSideBarCatalogoInformacion();
                       
                        if(itemIdSeleccion=="documentos")
                           loadDataSideBarCumplimientosDocumentos();
                       
                        if(itemIdSeleccion=="evidencias")
                            loadDataSideBarCumplimientosEvidencias();

                        if(itemIdSeleccion=="tareas")
                            loadDataSideBarTareas();
                        
                        if(itemIdSeleccion=="informecumplimientos")
                            loadDataSideBarInformeCumplimientos();
                        
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

 function loadDataMenuArriba(iniciodinamic,info){	

//     if(info=="")
     
	var inicio=[
        {id:'00',text:'<div id=\'desc\'>contrato('+info+')</div>' ,items:[
        
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
      
                             {id:'0x34',mode:'cols',text:'Tareas',type:'block',
          list:seccionTareas},
                            
                             
                             {id:'0x35',mode:'cols',text:'Oficios',type:'block',
          list:seccionOficios},
                             
                             {id:'0x36',mode:'cols',text:'Usuario',type:'block',
          list:infosesionusuario}
	] }
        ];
    
    
ribbon = new dhtmlXRibbon({	parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs:inicio});
//$("#desc").append(""+info);
  
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
                        
//                      datacontratos.push( {id:'contratos',text:value.clave_cumplimiento,img:'oficios.png',type:'button',isbig:true} );

                         })                       
                        }    
        });
     }
     
     
     function loadDataContratoSeleccionado()
     {
//         alert("entro aqui ");
         contrato="";
         $.ajax({
             url:"../Controller/CumplimientosController.php?Op=contratoselec&obt=true",
             type:"POST",
             async:false,
             success:function(dato)
             {
                 if(dato!="")
                 {
                    contrato += '<div>"El contrato es:"+dato</div>';
                 }
                 return contrato;
             }
         });
         
         $("#infocontrato").html(contrato);
     }
     
     
//     function contratoSeleccionado(dato)
//     {
//         tempData="";
//         
//                  tempData+= '<div></div>';         
//     }
     
     
      
      function loadEstructuraMaster(){
      var seccionMenuDinamic=[];
                var inicio=[
        {id:'00',text:'<div id=\'desc\'></div>' ,items:[
        
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
//    window.location.href="Logout.php";
//  setTimeout(function () {
//        temporalcierresesion=1;
//    swal("Sesion finalizada de manera correcta");
//  }, 2000);

 
}).then(function (result) {
     window.location.href="Logout.php";
//  swal({
//    type: 'success',
//    html: 'tu seleccionaste ' + result
//  }).then(function(){
//       window.location.href="Logout.php";
//  }) ;
});;
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

    
<!--    <div id="infousuario">
      
    </div>-->
<!--</div>-->
    <!--<div id="idusuario" type="hidden" value="<?php // echo $Usuario["NOMBRE_USUARIO"]; ?>" >-->



<!--<div id="popup" style="display: none;">
    <div class="content-popup">
        <div class="close"><a href="#" id="close"><img src="images/close.png"/></a></div>
        <div>
        	<h2>Contenido POPUP</h2>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.</p>
            <div style="float:left; width:100%;">
    	<iframe src="" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
    </div>
        </div>
    </div>
</div>
<div class="popup-overlay"></div>-->



<script>
cambiarCont();

function cambiarCont()
    { 

var jsonObj = {
    
        }

  $contador=1;
           $.ajax({  
                     url: "../Controller/CumplimientosController.php?Op=obtenerContrato",  
                     async:false,
                     success: function(r) {
        $.each(r,function(index,value){
             jsonObj[value.id_cumplimiento] = value.clave_cumplimiento ;
                                })
                       
                        }    
        });

                swal({
  title: 'Selecciona un contrato',
  input: 'select',
  inputOptions:jsonObj,
  inputPlaceholder: 'selecciona un contrato ',
  showCancelButton: false,
  inputValidator: function (value) {
    return new Promise(function (resolve, reject) {
      if (value !== '') {
        resolve();
      } else {
        reject('requieres seleccionar un contrato ');
      }
    });
  }
}).then(function (result) {
//  swal({
//    type: 'success',
//    html: 'tu has seleccionado el contrato ' + result
//  });

//alert("d");
    $.ajax({  
                        url: "../Controller/CumplimientosController.php?Op=contratoselec&c="+result+"&obt=false",  
                        async:true,
                        success: function(r) {
                            
//                            $.each(r,function (index,value){
////                               $('#desc', window.parent.document).html("d");
//                            alert("entro aqui ");
////                            loadDataMenuArriba("",value.clave_cumplimiento);
//                            });
//                            alert("e  "+r.id_cumplimieCnto);
//                            console.log(r.cumplimiento);
//                             loadDataMenuArriba("",r.clave_cumplimiento);
                            
//                                $('#desc').html("d1");
    }    
           });
  });
    
 } 

</script>

</body>
</html>