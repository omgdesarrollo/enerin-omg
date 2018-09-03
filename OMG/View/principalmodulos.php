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
         <!--<link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>-->
         <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="../../codebase/dhtmlx.js"></script>
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
        <!--<script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>-->
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
                        height: 100%;
                        /*background-color: #ffff33;*/
			/*box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		}
                div#sidebarObjV {
			position: relative;
			/*margin-left: 10px;*/
                        /*margin-top: 50px;*/
			/*width: 900px    ;*/
                        /*overflow: auto;*/
                        
                        /*esta linea es la original ver si la reemplazo por la abajo de esta*/ 
                        /*height: 450px;*/  
                        height: 100%;
/*			box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		}
                div#arbolprincipal{
/*                  position: relative;*/
                    height:500px; 
                }
                .dhtmlxribbon_material .dhxrb_block_base{
                        border: 1px solid #b5bebf;
                        /*background-color: #0f76e057;*/
                }
                .dhtmlxribbon_material .dhxrb_g_area{
                    overflow-y: auto;
                } 
                .dhtmlxribbon_material .dhxrb_big_button {
                    padding: 1px;
                }
                
/*                body{
                    height: 100%;
                    background-color: #6666ff;
                }*/
/*                .layoutObj{
                    background-color: #cc66ff;
                    height: 100%;
                    position: re;
                }*/
                
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
 
// var seccionReporte=[
//      {id:'excel',text:'Excel',img:'File_XLS_Excel.png', type:'button'},
//      {id:'pdf',text:'PDF',img:'FILE_PDF.png', type:'button'}
// ];
 
 var seccionCatalogo=[
     {id:'Informacion', text:'Informacion',img:'catalogo.png',type:'button',isbig:true}  
 ];
 
 
 var seccionCumplimiento=[
     {id:'documentos',text:'Validacion de Documentos',img:'documentos.png',type:'button',isbig:true} ,
     {id:'evidencias',text:'Evidencias',img:'operaciones.png',type:'button',isbig:true},
     {id:'informecumplimientos',text:'Informe',img:'documentos.jpg',type:'button',isbig:true}
 ];
 
  var seccionProcesos=[
     {id:'procesos',text:'Reportes',img:'procesos.png',type:'button',isbig:true} ,
 ];
 
 var seccionTareas=[
     {id:'tareas',text:'Registro de Tareas',img:'tareas.png',type:'button',isbig:true} ,
 ];
  var seccionOficios=[
     {id:'catalogooficios',text:'Catalogos',img:'catalogos.png',type:'button',isbig:true},  
     {id:'documentacion',text:'Documentacion',img:'oficios.png',type:'button',isbig:true},  
     {id:'cargaprograma',text:'Seguimiento',img:'663.png',type:'button',isbig:true},
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
   var listasubmodulos=[];
  
   loadDataNotificaciones();

  
 var infosesionusuario=[
     {id:'sesionusuario',text:'<div id="infousuario"><?php echo "Bienvenido <br>".$Usuario["NOMBRE_USUARIO"]; ?></div>',img:'user.png', type:'button',isbig:true}
 ];
	$(function() {	
      
           //  layout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});
        
        myLayout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});

        myLayout.cells("a").setWidth(310);
         myLayout.cells("a").setHeight(710);
        myLayout.cells("a").attachObject("sidebarObj");
        myLayout.cells("b").attachObject("sidebarObjV");
        

                    detallescontratosiahyseleccionado();
//                  loadDataMenuArriba("","NO SELECCIONADO");
                   
                    loadDataMenuRibbonSeccionArriba();
                  
                    ribbon.setSizes();
                    ribbon.attachEvent("onClick", function(itemIdSeleccion, bId){
                        if(itemIdSeleccion=="Bienvenido"){
                               $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Bienvenido"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarAjustesUsuario(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                        }
                        if(itemIdSeleccion=="cambiaresc")
                            alert("le has picado a cam biar act");
                        
                        if(itemIdSeleccion=="logout")
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
                        
                
                        if(itemIdSeleccion=="Informacion") {
//                            console.log(listasubmodulos);
//                            console.log(listasubmodulos["0"]["contenido_sub"]["0"]["contenido_vista"]);
                           loadDataSideBarCatalogoInformacion(listasubmodulos["0"]["contenido_sub"]["0"]["contenido_vista"]);
                       }   
                        if(itemIdSeleccion=="Validacion")
                           loadDataSideBarCumplimientosDocumentos();
                       
                        if(itemIdSeleccion=="Evidencias")
                            loadDataSideBarCumplimientosEvidencias();
                        
                        if(itemIdSeleccion=="Reportes"){
                            
                            
                              $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Reportes"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarProcesos(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                            
//                            loadDataSideBarProcesos();
                        }

                        if(itemIdSeleccion=="Registro de Tareas"){
                            var listRegistroTareas=[];
                            $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Registro de Tareas"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarTareas(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                            

                        }
                        
                        if(itemIdSeleccion=="Informe"){
                            
                            
                            
                                 $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Informe"){
//                                        console.log(value1["contenido_vista"]);

                                            loadDataSideBarInformeCumplimientos(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                             
                             
                            
                        }
                        
                        if(itemIdSeleccion=="Catalogos"){
                            
                             $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Catalogos"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarOficiosCatalogos(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                           
                        }
                       
                        if(itemIdSeleccion=="Documentacion"){
                            
                            
                            
                              $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Documentacion"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarOficiosDocumentacion(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                           
                        }
                        if(itemIdSeleccion=="Informe Gerencial")
                            loadDataInformeGerencial();
                        if(itemIdSeleccion=="Seguimiento")
                            loadDataCargaProgramaGantt();
                       
                    });      
                    }	                            
         );

 function loadDataMenuArriba(iniciodinamic,info){	

     
	var inicio=[
        {id:'00',text:'<div id=\'desc\'>contrato(NO SELECCIONADO)</div>' ,items:[
        
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
      
                             {id:'0x34',mode:'cols',text:'Procesos',type:'block',
          list:seccionProcesos},
      
                             {id:'0x35',mode:'cols',text:'Tareas',type:'block',
          list:seccionTareas},
                            
                             {id:'0x36',mode:'cols',text:'Oficios',type:'block',
          list:seccionOficios},
                             
                             {id:'0x37',mode:'cols',text:'Usuario',type:'block',
          list:infosesionusuario}
	] }
        ];
    
    
ribbon = new dhtmlXRibbon({	parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs:inicio});

    }
    
    
    
    
    
     function loadDataMenuRibbonSeccionArriba(){	

         var datosSeccionesRibbon=[];
                
        //aqui empieza este siempre va por que es el que permite cerrar sesion 
        datosSeccionesRibbon.push({id:'0x0',mode:'cols',text:'Principal',type:'block', 
		list:[
		    {id:'logout',text:'Cerrar',img:'cerrarsesion.png', type:'button',isbig:true}
		   
		      ]	});

var entro_seccion_Registro_Tareas=false;
var entro_seccion_Catalogo=false;
var entro_seccion_Documentos=false;
var seccionesRibbonArriba=[];
var datosTemp=[];
var datosTemp2=[];
var contadorSecciones=1;



var seccionCatalogo=[
     {id:'Informacion', text:'Informacion',img:'catalogo.png',type:'button',isbig:true}  
 ];
 submodulos=[];
 dentrodesubmodulos=[]
var bandera=false;
var bandera2=false;
var bandera3=false;
var nombre_submodulo="";
var contador=-1;
var contador2=-1;
var listaModulos=[];
var nombre_contenido_sub="";
var listado_contenido_sub=[];
var vistas = [];

        $.ajax({  
                     url: "../Controller/LoadEstructuraPantallaGeneralController.php?Op=VistasPorUsuarioLaCualTienePermisos",  
                     async:false,
                    success: function(r){
                        $.each(r,function (index,value)
                        {
//                                    bandera=false;
                            if(bandera3==false)
                            {
                                nombre_submodulo=value["nombre_submodulo"];
                                listaModulos.push({nombre_submodulo:value["nombre_submodulo"],contenido_sub:[]});
                                contador++;
                            }
                            bandera3=true;
                            if(value["nombre_submodulo"]==nombre_submodulo)
                            {
                                if(bandera==false)
                                {
                                    nombre_contenido_sub = value["nombre_contenido_sub"];
                                    
                                    bandera=true;
                                }
                                if(nombre_contenido_sub == value["nombre_contenido_sub"])
                                {
                                    if(bandera2==false)
                                    {
                                        listado_contenido_sub.push({nombre_contenido_sub:value["nombre_contenido_sub"],contenido_vista:[],hijos:0,imagen:value["imagen_seccion_up"]});
                                        contador2++;
                                        bandera2=true;
                                    }
                                    if(value["imagen_seccion_izquierda"]!="undefined")
                                    {
//                                        vistas=[];
//                                        vistas.push({nombre:value["nombre"],id:value["id_vista"],edit:value["EDIT"],consult:value["consult"],"delete":value["delete"]
//                                            ,"new":value["new"],imagen:value["imagen_seccion_izquierda"]});
                                        listado_contenido_sub[contador2]["hijos"]=1;
//                                        listado_contenido_sub[contador2]["contenido_vista"] = vistas;
                                        listado_contenido_sub[contador2]["contenido_vista"].push({nombre:value["nombre"],id:value["id_vistas"],edit:value["EDIT"],consult:value["consult"],"delete":value["delete"],
                                            "new":value["new"],imagen:value["imagen_seccion_izquierda"]});
                                    }
                                    else
                                    {
                                        listado_contenido_sub[contador2]["nombre"] = value["nombre"];
                                        listado_contenido_sub[contador2]["id"] = value["id_vistas"];
                                        listado_contenido_sub[contador2]["edit"] = value["EDIT"];
                                        listado_contenido_sub[contador2]["consult"] = value["consult"];
                                        listado_contenido_sub[contador2]["delete"] = value["delete"];
                                        listado_contenido_sub[contador2]["new"] = value["new"];
                                        listado_contenido_sub[contador2]["imagen"] = value["imagen_seccion_up"];
                                    }
//                                    listaModulos[contador]["contenido_sub"] = listado_contenido_sub;
                                }
                                else
                                {
//                                    listado_contenido_sub=[];
//                                    contador2=-1;
                                    nombre_contenido_sub = value["nombre_contenido_sub"];
                                    listado_contenido_sub.push({nombre_contenido_sub:value["nombre_contenido_sub"],contenido_vista:[],hijos:0,imagen:value["imagen_seccion_up"]});
                                    contador2++;
                                    if(value["imagen_seccion_izquierda"]!="undefined")
                                    {
//                                        vistas=[];
//                                        vistas.push({nombre:value["nombre"],id:value["id_vista"],edit:value["EDIT"],consult:value["consult"],"delete":value["delete"],
//                                            "new":value["new"],imagen:value["imagen_seccion_izquierda"]});
                                        listado_contenido_sub[contador2]["hijos"]=1;
                                        listado_contenido_sub[contador2]["contenido_vista"].push({nombre:value["nombre"],id:value["id_vistas"],edit:value["EDIT"],consult:value["consult"],"delete":value["delete"],
                                            "new":value["new"],imagen:value["imagen_seccion_izquierda"]});
                                    }
                                    else
                                    {
                                        listado_contenido_sub[contador2]["nombre"] = value["nombre"];
                                        listado_contenido_sub[contador2]["id"] = value["id_vistas"];
                                        listado_contenido_sub[contador2]["edit"] = value["EDIT"];
                                        listado_contenido_sub[contador2]["consult"] = value["consult"];
                                        listado_contenido_sub[contador2]["delete"] = value["delete"];
                                        listado_contenido_sub[contador2]["new"] = value["new"];
                                        listado_contenido_sub[contador2]["imagen"] = value["imagen_seccion_up"];
                                    }
                                }
                                listaModulos[contador]["contenido_sub"]=listado_contenido_sub;
                            }
                            else
                            {
                                nombre_contenido_sub = value["nombre_contenido_sub"];
                                nombre_submodulo=value["nombre_submodulo"];
                                listaModulos.push({nombre_submodulo:value["nombre_submodulo"],contenido_sub:[]});
                                contador++;
                                contador2=-1;
                                vistas=[];
                                listado_contenido_sub=[];
                                bandera2=false;
//                                bandera=false;
                                if(nombre_contenido_sub == value["nombre_contenido_sub"])
                                {
                                    if(bandera2==false)
                                    {
                                        listado_contenido_sub.push({nombre_contenido_sub:value["nombre_contenido_sub"],contenido_vista:[],hijos:0,imagen:value["imagen_seccion_up"]});
                                        contador2++;
                                        bandera2=true;
                                    }
                                    if(value["imagen_seccion_izquierda"]!="undefined")
                                    {
//                                        vistas=[];
//                                        vistas.push({nombre:value["nombre"],id:value["id_vista"],edit:value["EDIT"],consult:value["consult"],"delete":value["delete"]
//                                            ,"new":value["new"],imagen:value["imagen_seccion_izquierda"]});
                                        listado_contenido_sub[contador2]["hijos"]=1;
//                                        listado_contenido_sub[contador2]["contenido_vista"] = vistas;
                                        listado_contenido_sub[contador2]["contenido_vista"].push({nombre:value["nombre"],id:value["id_vistas"],edit:value["EDIT"],consult:value["consult"],"delete":value["delete"],
                                            "new":value["new"],imagen:value["imagen_seccion_izquierda"]});
                                    }
                                    else
                                    {
                                        listado_contenido_sub[contador2]["nombre"] = value["nombre"];
                                        listado_contenido_sub[contador2]["id"] = value["id_vistas"];
                                        listado_contenido_sub[contador2]["edit"] = value["EDIT"];
                                        listado_contenido_sub[contador2]["consult"] = value["consult"];
                                        listado_contenido_sub[contador2]["delete"] = value["delete"];
                                        listado_contenido_sub[contador2]["new"] = value["new"];
                                        listado_contenido_sub[contador2]["imagen"] = value["imagen_seccion_up"];
                                    }
                                }
                                
                                listaModulos[contador]["contenido_sub"]=listado_contenido_sub;
                            }
                        });
//                        console.log(listaModulos);
 var banderasSeccionesArriba=false;
 var contadoresSeccionesArriba=1    ;
 listasubmodulos=[]=listaModulos;
              $.each(listasubmodulos,function (index,value){
                  nombre_submodulo=value["nombre_submodulo"];

                 banderasSeccionesArriba=false;
             
                  $.each(value["contenido_sub"],function(index1,value1)
                  {
//                        console.log(value["contenido_sub"]);
                      if(value1["hijos"]>0){
                          $.each(value1["contenido_vista"],function(indexContenidoVistas,valueContenidoVistas){                             
//                              console.log(valueContenidoVistas);                          
                              if(banderasSeccionesArriba==false){
                                     if(valueContenidoVistas["edit"]=="true" || valueContenidoVistas["consult"]=="true" || valueContenidoVistas["delete"]=="true" || valueContenidoVistas["new"]=="true")
                                    {
                                           banderasSeccionesArriba=true;
                                            datosSeccionesRibbon.push( {id:'0x'+contadoresSeccionesArriba,mode:'cols',text:value["nombre_submodulo"],type:'block',list:[]} );
                                    }
                        } 
                          }) 
                           if(banderasSeccionesArriba==true)
                            {
                                
                                var quieniniciosesion="";
                                if(value1["nombre_contenido_sub"]=="Bienvenido"){
                                   
                                     datosSeccionesRibbon[contadoresSeccionesArriba]["list"].push({id:value1["nombre_contenido_sub"], text:'<div id="infousuario">'+value1["nombre_contenido_sub"]+"<br><?php echo  $Usuario["NOMBRE_USUARIO"]; ?>",img:value1["imagen"],type:'button',isbig:true});
                                }else{
//                                    alert(value1["nombre_contenido_sub");
                                        console.log(value1);
                                        var tienalmenosunavista=false;
                                         $.each(value1["contenido_vista"],function(indexContenidoVistas1,valueContenidoVistas1){
//                                             console.log()
                                             if(valueContenidoVistas1["edit"]=="true" || valueContenidoVistas1["consult"]=="true" || valueContenidoVistas1["delete"]=="true" || valueContenidoVistas1["new"]=="true")
                                             {
                                                 tienalmenosunavista=true;
                                                 console.log("entro ");
                                             }
                                             
                                         });
                                         if(tienalmenosunavista==true)
                                      datosSeccionesRibbon[contadoresSeccionesArriba]["list"].push({id:value1["nombre_contenido_sub"], text:value1["nombre_contenido_sub"],img:value1["imagen"],type:'button',isbig:true});
                                }
                            }
                      }
                      else{                                   
                          if(banderasSeccionesArriba==false)
                            {
                                if(value1["edit"]=="true" || value1["consult"]=="true" || value1["delete"]=="true" || value1["new"]=="true")
                                {
//                                    alert(value["nombre_submodulo"]);
//                                    alert(value1["nombre_contenido_sub"]);
                                    banderasSeccionesArriba=true;
                                    datosSeccionesRibbon.push( {id:'0x'+contadoresSeccionesArriba,mode:'cols',text:''+value["nombre_submodulo"],type:'block',list:[]} );
                                }
                            }
                            if(banderasSeccionesArriba==true)
                            {
//                            alert("entro en true");
//console.log(value1);
                             if(value1["edit"]=="true" || value1["consult"]=="true" || value1["delete"]=="true" || value1["new"]=="true")
                                {
                                    datosSeccionesRibbon[contadoresSeccionesArriba]["list"].push({id:value1["nombre_contenido_sub"], text:value1["nombre_contenido_sub"],img:value1["imagen"],type:'button',isbig:true});
                                }
                            }       
                        }
                  });
                  
                if(banderasSeccionesArriba==true)
                        contadoresSeccionesArriba++;
              });            
                     datosSeccionesRibbon;           
//                datosSeccionesRibbon.push({id:'0x37',mode:'cols',text:'Usuario',type:'block',
//          list:infosesionusuario});
                     },
                     beforeSend:function(r){

                     }
                 
        });    
       
        
        datosSeccionesRibbonArriba=[
	{id:'0x2',mode:'cols',text:'Principal',type:'block', 
		list:[
		    {id:'logout',text:'Cerrar',img:'cerrarsesion.png', type:'button',isbig:true}
		   
		      ]	},
                            {id:'0x32',mode:'cols',text:'Catalogo',type:'block',
          list:seccionCatalogo},	
                             
                             {id:'0x33',mode:'cols',text:'Cumplimientos',type:'block',
          list:seccionCumplimiento},
      
                             {id:'0x34',mode:'cols',text:'Procesos',type:'block',
          list:seccionProcesos},
      
                             {id:'0x35',mode:'cols',text:'Tareas',type:'block',
          list:seccionTareas},
                            
                             {id:'0x36',mode:'cols',text:'Oficios',type:'block',
          list:seccionOficios},
                             
                             {id:'0x37',mode:'cols',text:'Usuario',type:'block',
          list:infosesionusuario}
	];
        

        
	var inicio=[
        {id:'00',text:'<div id=\'desc\'>contrato(NO SELECCIONADO)</div>' ,items:[
        
                    {id:'0x1',mode:'cols',text:'Contratos',type:'block',
          list:datacontratos
        }
        ]},
	{id:'0',text:'OMG', active:true, items:datosSeccionesRibbon }
        ];
    
    
ribbon = new dhtmlXRibbon({	parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs:inicio});

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
 
     
     function loadDataContratoSeleccionado()
     {
         contrato="";
         $.ajax({
             url:"../Controller/CumplimientosController.php?Op=contratoselec&obt=true",
             type:"POST",
             async:false,
             success:function(dato)
             {
                 if(dato!="")
                 {
                    contrato += '<div>"El contrato es:"</div>';
                 }
                 return contrato;
             }
         });
         
         $("#infocontrato").html(contrato);
     }
    
      
    function logout(){
            swal({
  title: "Cerrar Sesion",
  text: "Confirme si desea cerrar sesion",
  type: "warning",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
   preConfirm: function() {
    return new Promise(function(resolve) {
      setTimeout(function() {
        resolve()
      }, 1000)
    })
  }
}, function () {
//    window.location.href="Logout.php";
//  setTimeout(function () {
//        temporalcierresesion=1;
//    swal("Sesion finalizada de manera correcta");
//  }, 2000);

 
}).then(function (result) {
     window.location.href="Logout.php";
});;
    }
    

    
    
    function loadDataCargaProgramaGantt(){     
       var dhxWins = new dhtmlXWindows();
        //var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
         dhxWins.attachViewportTo("arbolprincipal");
         var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:1338,  height:505,  center:true,resize: true,park:true,modal:true	});
         layoutWin.attachURL("SeguimientoEntradaView.php", null, true);
 
        dhxWins.attachEvent("onMinimize", function(win){
        });
        
        dhxWins.attachEvent("onShow", function(win){
        });
    dhxWins.attachEvent("onHide", function(win){
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
<div id="ribbonObj" style="position: relative;width: 100%;"></div>
   
    
<div id="layoutObj" class="layoutObj" > 
    <div id="arbolprincipal"> </div>
    <!--<div id="combo_zone2" style="width:200px; height:30px;"></div>-->
</div>
<!--    <div id="treeviewObj" > 


</div>-->
    
    <!--<div id="treeboxbox_tree" class="treeboxbox_tree" style="height:100%;"></div>-->
    <div id="sidebarObj"> </div>
    
    
 
    <div id="sidebarObjV">
  
    </div>
    <input id="gom" type="hidden" value="<?php echo Session::getSesion("token")?>"/>

<script>
cambiarCont();
mostrarTareasEnAlarma();

function cambiarCont()
    { 

var jsonObj = {};

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
  title: 'Selecciona un cumplimiento',
  input: 'select',
//  html:s,
//  html:'<input type=\'text\' disabled>',
  inputOptions:jsonObj,
  inputPlaceholder: 'selecciona un cumplimiento ',
  showCancelButton: false,
  showLoaderOnConfirm: true,
   allowEscapeKey:false,
   allowOutsideClick: false,
   showConfirmButton: true,
   confirmButtonText:"Seleccionar",
  inputValidator: function (value) {
    return new Promise(function (resolve, reject) {
      if (value !== '') {
        resolve();
      } else {
        reject('requieres seleccionar un contrato ');
      }
    });
  },
  preConfirm: function() {
    return new Promise(function(resolve) {
      setTimeout(function() {
        resolve()
      }, 1000)
    })
  }
}).then(function (result) {
    $.ajax({  
                        url: "../Controller/CumplimientosController.php?Op=contratoselec&c="+result+"&obt=false",  
                        async:true,
                        success: function(r) {
                              swal({
                                type: 'success',
                                html: 'tu has seleccionado el contrato ' + r.clave_cumplimiento,    
                                timer: 2000,
                              });
                                window.top.$("#desc").html("CONTRATO("+r.clave_cumplimiento+")");
                                window.top.$("#infocontrato").html("Contrato Seleccionado:<br>("+r.clave_cumplimiento+")");
//                                mostrarTareasEnAlarma();
                                
                                
    }    
           });
  });
   
 }
 
 function detallescontratosiahyseleccionado()
 {
    $.ajax({  
            url: "../Controller/CumplimientosController.php?Op=contratoselec&obt=true",  
            async:false,
            success: function(r) 
            {
                window.top.$("#desc").html("CONTRATO("+r.clave_cumplimiento+")");
                window.top.$("#infocontrato").html("Contrato Seleccionado:<br>("+r.clave_cumplimiento+")");
            }    
        });
 }
 
 
 
 function mostrarTareasEnAlarma()
 {
     $.ajax({
         url:"../Controller/NotificacionesTareasController.php?Op=tareasEnAlarma",
         type:"GET",
         success:function()
         {
             
         }
     });
 }

</script>

</body>
</html>