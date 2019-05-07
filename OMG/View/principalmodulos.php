<?php
session_start();
require_once '../util/Session.php';
require_once 'rutasArchivos.php';
//$error=Session::eliminarSesion("error");
//$usuario=Session::eliminarSesion("usuario");

if(!isset($_REQUEST["type"])){
      header("location: login.php");
    return;
}else{
    if($_REQUEST["type"]==""){
        header("location: login.php");
//        if($_REQUEST["type"]!= Session::getSesion("tipo")){
//           header("location: login.php");
//           return;
//        }
    }else{
         if($_REQUEST["type"]!= Session::getSesion("tipo")){
           header("location: login.php");
           return;
        }
    }
}




if (Session:: NoExisteSeSion("user")){
    
    header("location: login.php");
    return;
}
// var_dump( Session::getSesion("user") );
//para hallar ruta fisica tanto web como local
//echo dirname(__FILE__);
//$urls["fisica"] = "/home/fpa9q09nzhnx/public_html/oficina/archivos/";
//$urls["logica"] = 'http://www.enerin-omgapps.com/oficina/archivos/';
// $urls[""] = ;

$Usuario=  Session::getSesion("user");
//echo Session::getSesion("tipo");
//$tokenseguridad=  Session::getSesion("token");
//$tse=$tokenseguridad["tokenseguridad"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>OMG APPS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>-->
    <link rel="shortcut icon" href="../../images/base/enerinLogo.png">
    
	<link rel="stylesheet" type="text/css" href="../../codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>
        <link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
         <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
         <!--<link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>-->
         <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="../../codebase/dhtmlx.js"></script>
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <!--<script src="../../js/jqueryTranslator.js" type="text/javascript"></script>-->
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
        <!--<script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>-->
        <script src="../../js/funcionessidebar.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
        <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
        <!--librerias intro js-->
        <script src="../../assets/intro/intro.js" type="text/javascript"></script>
        <link href="../../assets/intro/introjs.css" rel="stylesheet" type="text/css"/>
        <!--librerias materialize-->
        <link type="text/css" rel="stylesheet" href="../../assets/materialize/css/materialize.min.css"  media="screen,projection"/>
         <script type="text/javascript" src="../../assets/materialize/js/materialize.min.js"></script>
         <link href="../../assets/googleApi/icon.css" rel="stylesheet">
        <!--personalizacion de configuracion vista -->
        <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>  
        <style>
            body{
                 /*zoom: 80%;*/
            }
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
			/*height: 450px;*/
                        /*height: 100%;*/
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
                  /*position: relative;*/
                    height:800px;
                    /*zoom: 80%;*/
                     /*height:100%;*/
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
                #limpiarSeleccionesRibbon{
                    margin: 3px 0 3px 3px;
                    float: left;
                    border: 1px solid #dfdfdf;
                    background-color: #fafafa;
                    height: 118px;
                    overflow: hidden;
                    position: relative;
                }                
               #seleccion_informacion{ 

                    margin: 3px 0 3px 3px;
                    float: left;
                    border: 1px solid #dfdfdf;
                    background-color: red;
                    height: 118px;
                    overflow: hidden;
                    position: relative;
                }
                #seleccion_informacion_palabra{ 

                    
                    color: blue;
                }
                #seleccion_opcionmenuarriba{
                    background-color: #cccccc;
                }
                
                
                
                .introjs-helperNumberLayer{
                    left: 9px;
                     visibility: hidden;
                }
                .introjs-helperLayer{
                    position: absolute;
                    /*left: 9px;*/
                    /*visibility: hidden;*/
                }
                .introjs-relativePosition, tr.introjs-showElement > td, tr.introjs-showElement > th{
                    background-color: white;
                }
                
                
/*                .introjs-overlay{
                    
                    z-index: 0;
                    
                }*/
/*                .introjs-tooltip{
                   visibility: hidden; 
                }*/
                /*modalIntroduccion*/
                .collection .collection-item{
                    color:black;
                }
                .informacionA_QueseSeRefiere{
                    color:#0a0a9e;
                }
                .modal{
                    max-height: 95% ;
                    overflow-y:hidden ;
                    position: fixed !important;
                    display:none;
                    /*background: #dfdfdf ;*/
                    
                }
                .modal .modal-content{
                    padding: 0px;
                }
                #opacar{
/*                    display: block; opacity: 1;
                    background: black;
                    width: 100%;
                    height: 100%;
                    position: fixed;
                    opacity: 20px;
                    z-index: 999999;*/
                }
                
              
/*                .select-wrapper input.select-dropdown{
                     background-color: white;
                }*/
                
                .fondoTransparente {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 100%;
                    height: 100%;
                    background-color: #fff;
                    filter: alpha(opacity=50);
                    opacity: .5;
                }

/*                .dhxtabbar_tab_actv{
                 background: red !important;   
                }*/
        
/*                .introjs-fixParent{
                    background-color: red;
                }*/
/*                    .dhxtabbar_tab_actv introjs-fixParent{
                            background-color: red;
                    }*/
/*                .introjs-overlay{
                    z-index: 0;
                }*/
/*                .introjs-helperNumberLayer{
                    left: 9px;
                    visibility: hidden;
                }*/
                /*configuracion responnsiva manua*/
                /* esto funcionará si la resolución de pantalla está entre 300 y 800 pixeles de ancho */
                @media (max-width: 1000px) and (min-width: 200px) {
                #nombremenu{ 
                    /*background: antiquewhite;*/ 
                }
                }
                @media (min-width: 1200px) {
                #nombremenu{ 
                    /*background: red;*/ 
                }
                }
                /* esto funcionará si la resolución mínima de la pantalla es de 1600 pixeles de ancho */
                @media (min-width: 1600px) {}
                
                @media (device-aspect-ratio: 16/9) {  } /* para pantallas de tipo widescreen */
                @media (orientation:portrait) {  } /* para pantallas más altas que anchas */
                @media (orientation:landscape) {  } /* para pantallas más anchas que altas */
                
                
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
    <style id="estilos_colores"></style>
	<script>
    var typePorSiLaSeSessionExpira="<?php  echo $_REQUEST["type"] ?>"; 
    var colorView = <?php
    $color = "";
    if(Session:: NoExisteSeSion("colorFondo_Vista"))
        $color = Session::getSesion("user")["FONDO_COLOR"];
    else
        $color = Session::getSesion("colorFondo_Vista");
    echo "'$color'";
    ?>;
    // var colorLeter = hexToRgb(colorView);
    // // console.log(colorLeter);
    // colorLeter = invertirRgb(colorLeter)==1?"#ffffff":"#000000";

    obligar_color_principal(colorView);
    // colorLeter = invertirRgb(colorLeter);
    // console.log(colorLeter);
    // colorLeter = rgbToHex( colorLeter["r"], colorLeter["g"], colorLeter["b"] );
    // console.log(colorView);
    
    // $("style").append("#seleccion_opcionmenuarriba{ background-color:"+colorView+" !important; }");
    // $("#seleccion_opcionmenuarriba").css("background-color",colorView+" !important");
    function hexToRgb(hex)
    {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    function obligar_color_principal(color)
    {
        colorLeter = hexToRgb(color);
        colorLeter = invertirRgb(colorLeter)==1?"#ffffff":"#000000";
        $("#estilos_colores").html("::-webkit-scrollbar-thumb{ background-color:"+color+" !important;}");
        $("#estilos_colores").append(".dhxlayout_base_material div.dhx_cell_layout div.dhx_cell_hdr{background-color:"+color+" !important;opacity:0.8 !important; color:"+colorLeter+" }");
        $("#estilos_colores").append(".dhxrb_block_label{ background:"+color+" !important; opacity:0.8; color:"+colorLeter+" !important }");
    }

    function rgbToHex(r, g, b)
    {
        return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
    }

    function componentToHex(c)
    {
        var hex = c.toString(16);
        return hex.length == 1 ? "0" + hex : hex;
    }

    function invertirRgb(data)
    {
        // obj = new Object();
        let obj = 0;
        if(data.g<=200)
        {
            if(data.b<=150 && data.r>=100)
                obj = 1;
            else
                if(data.g<=40)
                    obj = 1;
                else
                    if(data.r<=200)
                        obj = 1;
                    else
                        obj = 0;
        }
        return obj;
    }

            
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
     {id:'Información', text:'Información',img:'catalogo.png',type:'button',isbig:true}  
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
         {id:'cambiarcontrato',text:'<div id=\'infocontrato\'>Temática Seleccionada:</div>',img:'contratos.png',type:'button',isbig:true}
  ];
  dataSeccionRibbon=[];
  var listasubmodulos=[];
  var nombre_contenido_sub_usuario;
  var variables_super_globales={};
  variables_super_globales["cumplimientos"]=false;
  var elems ;
  var   options;
  var  instances; 
  var opcionProyectoId=-1;
  variables_super_globales["abrio_seguimiento"]=false;//opcion de oficios llamado seguimiento para saber si ya se le dio click y ya no abrir la ventana cerrara y volverla abrir seria lo optimo
   loadDataNotificaciones();

  
 var infosesionusuario=[
     {id:'sesionusuario',text:'<div id="infousuario"><?php echo "Bienvenido <br>".$Usuario["NOMBRE_USUARIO"]; ?></div>',img:'user.png', type:'button',isbig:true}
 ];

function redimencionarLayout()
{
    // console.log(tam1);
    var tam1,tam2,tamW,tamW1;
    if($(window).height()<720)
    {
        tam1 = 740 - 193;
        tamW1 = $(window).width();
        tamW = tamW1 - 330;
        tam2 = tam1 - 42;
        // console.log($("iframe"));
        // $("#jsGrid").css("height","395px");
        // alert($("#jsGrid").css("height"));
    }
    else
    {
        tam1 = $(window).height() - 193;
        tamW1 = $(window).width();
        tamW = tamW1 - 330;
        tam2 = tam1 - 42;
        // $("#jsGrid").css("height", $(window).height() - 740 + tam2+"px");
    }
    // $(".dhx_cell_hdr").css("height", tam1+"px");
    $("#layoutObj").height(tam1);
    $("#arbolprincipal").height(tam1);
    $(".dhxlayout_cont").width(tamW1-10);
    $(".dhxlayout_cont").height(tam1);

    let nav = $(".dhxlayout_cont")[0].childNodes[0];//objecto navegacion
    let vis = $(".dhxlayout_cont")[0].childNodes[1];//objecto visualizacion
    let sep = $(".dhxlayout_cont")[0].childNodes[2];//objecto separador
    let tamNav = $(nav).width();

    // $(".dhx_cell_cont_layout").css("height", tam2+"px");
    $(nav).height(tam1);
    $(sep).height(tam1);
    $(vis).height(tam1);
    $(vis).width(tamW1 - 25 - tamNav);

    $($(vis)[0].childNodes[0]).width(tamW1 - 25 - tamNav);
    $($(vis)[0].childNodes[1]).width(tamW1 - 25 - tamNav);
    $($(vis)[0].childNodes[1]).height(tam2-1);

    $($(nav)[0].childNodes[1]).height(tam2-1);

    let navNode1 = $(nav)[0].childNodes[1];
    let navNode2 = $(navNode1)[0].childNodes[0];
    let navNode3 = $(navNode2)[0].childNodes[1];
    if(navNode3!=undefined)
    {
        let navNode4 = $(navNode3)[0].childNodes[0];
        $(navNode4).css("border-width","0px 0px 0px 0px");
        console.log($(navNode4).width());
    }
    // $(".dhx_cell_cont_layout").css("width", tamW1 - 42 - tamNav +"px");

    // $(".dhx_cell_layout").css("height", tam1+"px");
    // $(".dhx_cell_layout").css("width", tamW+"px");

    // $(".dhxlayout_cont").css("height", tam1+"px");//l
    

    // $(".dhxlayout_cont").css("width", tamW+"px");//l

    $(".dhxlayout_sep").css("height", tam2+"px");
    $("#arbolprincipal").css("height", tam1+"px");

    $("#sidebarObjV").css("height", tam2+"px");
    // $("#sidebarObjV").css("width", tamW+"px");
    $("#sidebarObj").css("height", tam2+"px");

    $(".dhxtabbar_tabs").css("width", tamW1+"px");
    $(".dhx_cell_tabbar").css("width", tamW1+"px");
    $(".dhxtabbar_cont").css("width", tamW1+"px");

    $(".dhxrb_g_area").css("overflow-y","hidden");
    $(".dhx_cell_tabbar").css("overflow-x","auto");
    // $(".dhxrb_g_area").css("overflow-x","auto");
    // if(tamW1>1060)
    // {
        // $(".dhx_cell_tabbar").css("width", 1057+"px");
    // }
    $(".dhx_cell_cont_tabbar").css("width", "max-content");

    // $(".dhxrb_g_area").css("width", "max-content");
    // console.log($(".dhxrb_g_area").css("overflow-y"));

    // $("#sidebarObjV").css("width", tamW+"px");
    // $("#sidebarObjV").parent().css("width", tamW+"px");
    // $("#sidebarObjV").parent().parent().css("width", tamW+"px");
    // console.log($("#sidebarObj").parent().find(".dhx_cell_hdr").css("height"));
    if($(vis).hasClass("dhxlayout_collapsed_v"))
    {
        $($(vis)[0].childNodes[0]).width(28);
        $($(vis)[0].childNodes[0]).height(tam1);
    }
    var dhx_cell_hdr = $(".dhx_cell_hdr")[0];
    // console.log($(dhx_cell_hdr).css("height"));
    tamdhc_cell_hdr = $(dhx_cell_hdr).height();
    tamdhc_cell_hdr > 47 ?
    $(dhx_cell_hdr).css("height",tam1+"px"):console.log();

    $(".dhxrb_with_tabbar").css("height","190px");
    $(".dhxtabbar_cont").css("height","190px");
    $(".dhx_cell_tabbar").css("height","145px");
    
        // $("iframe").css("height",553-6+"px");
    // else
        // $("iframe").css("height",tam2-6+"px");
        
    // $("#jsGrid");

    // console.log($("#sidebarObjV").parent().parent().css("width", tamW+"px"));
    // myLayout.setAutoSize("a;b;e");
}

function redimencionaCuandoSeUtilizaZoom(){
    
}


  function mostrar_urls()
    {
        return new Promise((resolve,reject)=>{
            let usuario = <?php echo Session::getSesion("user")["ID_USUARIO"] ?>;
            let tempDocumentolistadoUrl = "";
            URL = 'filePerfilesUsuario/'+usuario,
            $.ajax({
                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                type: 'GET',
                data: 'URL='+URL+"&SIN_CONTRATO=''",
                // async:false,
                success: function(todo)
                {
                    if(todo[0].length!=0)
                    {
                       console.log("todo ",todo);
                    }

                    resolve(todo);
                }
            });
        });
    }
// start constructor materialize

   document.addEventListener('DOMContentLoaded', function() {
//    elems = document.querySelectorAll('select');
//    options = document.querySelectorAll('option');
//    instances = M.FormSelect.init(elems, options);
       
    
    
    })
  
   
   
   
// end contructor materialize
//  $('select:not([multiple])').material_select();
    $(function()
    {
       
//        $('.modal').modal(); 
        //start constructor materialize

//      $('select:not([multiple])').material_select();
        //end contructor materialize
        cambiarProyecto().then(function(){
            
            
           startIntro("ventanaIntroduccionAlPrincipio");
//           ;
        });
        
//     $(".dhxtabbar_tab dhxtabbar_tab_actv").change(function(){
////         alert("se detecto cambio ");
//
//     });
//cuando se le da click al a de Aceptar Introduccion
     $("#enlaceAceptarIntroduccion").click(function(){
            
            
            startIntro("modalSeleccionProyectos","","");
            
            
            
            
            
            $("#modalIntroduccion").hide();
            $("#modalSeleccionarProyecto").show();
            $(".modal").css({"max-height": "65%","overflow-y": "hidden"});

console.log("datos del select ",$("#opcionesProyectos"));
//$("#opcionesProyectos")[
console.log("intancia del select ",instances);
 $("#opcionesProyectos").html("");
 $("#opcionesProyectos").append("<option value='-1'>No seleccionado</option>");
           $.ajax({  
                     url: "../Controller/CumplimientosController.php?Op=obtenerContrato",  
                     async:false,
                     success: function(r) {
                        $.each(r,function(index,value){
//                             jsonObj[value.id_cumplimiento] = value.clave_cumplimiento ;
//                               objectOpciones[objectOpciones.length] = new Option( value.clave_cumplimiento, value.id_cumplimiento);
                             $("#opcionesProyectos").append("<option value='"+value.id_cumplimiento+"'>"+value.clave_cumplimiento+"</option>");
//                               htmlOpcionesProyectos+="<option value='"+value.id_cumplimiento+"'>"+value.clave_cumplimiento+"</option>";                         
                        })
//                        $("#opcionesProyectos").append("<option >fd</option>");
//                            htmlOpcionesProyectos+="</select>";
                        elems = document.querySelectorAll('select');
                        options = document.querySelectorAll('option');
                        instances = M.FormSelect.init(elems, options);
                     }    
                  });
            
               
            
           
            
//            $("#opcionesProyectos").html(htmlOpcionesProyectos);
            
            
           
     });
     
     //cuando se desea regresar a intriduccion
     $("#enlaceRegresarA_Introduccion").click(function(){
         $("#modalSeleccionarProyecto").hide();
         
        $("#mensajeSeleccionProyecto").html("");
        $("#mensajeSeleccionProyecto").removeClass();
          
         $("#modalIntroduccion").show();
         //start quitar el borde 
         $(".modal").css({"border-style":""});
         //end quitar el borde
         $(".modal").css({"background":""});
         $(".modal").css({"max-height": "95%","overflow-y": "hidden"});
     });
     //cuando se selecciona el proyecto 
     $("#enlaceAceptarProyectoSeleccionado").click(function(){
       if(opcionProyectoId!=-1){
//         $("#fondoTransparente"). 
      $("#ribbonObj").css({"opacity": ""});
      $("#fondoTransparente").removeClass();
         seleccionarProyecto(opcionProyectoId);
         $("#modalSeleccionarProyecto").hide();
          $("#divAyuda").css("display","inherit");
        }else{
            $("#mensajeSeleccionProyecto").html("Error Seleccione una tematica");
//             $("#mensajeSeleccionProyecto").removeClass();
            $("#mensajeSeleccionProyecto").addClass("alert alert-warning");
//            $(".dhxtabbar_tab.dhxtabbar_tab_actv").addClass("alert alert-warning");
            
            
        }
         //actual1
         
         
         
     });
     
  
     
     
    
     
     //cuando seleccionar una nueva opcion de proyecto
     $('select#opcionesProyectos').on('change',function(){
        var valor = $(this).val();
        opcionProyectoId=valor;
        if(opcionProyectoId!=-1){
         $("#mensajeSeleccionProyecto").html("");
         $("#mensajeSeleccionProyecto").removeClass();
        }
         if(opcionProyectoId==-1){
//         $("#mensajeSeleccionProyecto").html("Error Seleccione una tematica");
//         $("#mensajeSeleccionProyecto").addClass("alert alert-warning");
        }
    });
     
     
     $("#irTutorialProyectos").click(function(){ 
        $("#modalSeleccionCualTutorial").hide();
        ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba";
        startIntro("partedearriba");
     });
     $("#cerrarModalTutoriales").click(function(){
          $("#modalSeleccionCualTutorial").hide();
     });
     $("#irTutorialRollAdministrador").click(function(){
         
         
        $("#modalSeleccionCualTutorial").hide();
//        ribbon._items["cambiarcontrato"].base.id="";
         limpiarSeleccionDeRibbon();
        ribbon._items["Bienvenido"].base.id="seleccion_opcionmenuarriba";
         startIntro("seccionesSidebar","Bienvenido","Permisos");
     });
     $("#irTutorialGestionTemas").click(function(){
         $("#modalSeleccionCualTutorial").hide();
         limpiarSeleccionDeRibbon();
//          ribbon._items["Gestión de Temas Especiales"].base.id="";
        ribbon._items["Gestión de Temas Especiales"].base.id="seleccion_opcionmenuarriba";
         startIntro("seccionesSidebar","Gestión de Temas Especiales","Registros de Tema");
     });
     
//     btnInformacionIntroduccion
       $(document).ready(()=>{
          
//        alert("d");   
           redimencionarLayout();
           $("#informacion")["0"]["funciones"]={"desatascar":function(){
                   desatascarCelda("b");
           }};
//       console.log("ijj  ",$("#informacion"));
//           desbloquearVentana();
       });
       seleccionarProyecto=(result)=>{
             $.ajax({  
                        url: "../Controller/CumplimientosController.php?Op=contratoselec&c="+result+"&obt=false",      
                        success: function(r) {
                              swal({
                                type: 'success',
                                html: 'Tematica Seleccionada:' + r.clave_cumplimiento,    
                                timer: 2000,
                              });
//                                window.top.$("#desc").html("Temática("+r.clave_cumplimiento+")");
                                window.top.$("#desc").html(" Visualizar Tematicas");
                                window.top.$("#infocontrato").html("Temática Seleccionada:<br>("+r.clave_cumplimiento+")");
                                $("#divAyuda").css("display","inherit");
//                                clave_cumplimient_global=r.clave_cumplimiento;
//                                mostrarTareasEnAlarma();
                                
                                
                        }    
           });
           
       }
       function desatascarCelda(celda){
//            myLayout.cells(celda).undock(550,20,400,300);
            myLayout.cells(celda).undock(550,400,400,300);
            redimencionarLayout();
       }
        function expand() {
                myLayout.cells(getId()).expand();
	}
	function collapse() {
                myLayout.cells(getId()).collapse();
	}
        $("#btnAyuda").click(function(elements){
//            startIntro("partedearriba");
            
            $("#modalSeleccionCualTutorial").show();
            
            
        });
//        $("#btnAyudaSwal").click(function(elements){
////            $(".swal2-select")
////            $(".swal2-select").click(function(){
////                alert("swal");
////            });
//            startIntroSwalCargaSeleccionTematica();
//        });
       
        

       $(window).resize(()=>{
//           redimencionaCuandoSeUtilizaZoom();
           // $(window).height();
           // tam1 = $(window).height() - 200;
           // tam2 = tam1 + 42;
           // $(".dhx_cell_cont_layout").css("height", tam1+"px");
           // $(".dhx_cell_layout").css("height", tam2+"px");
           // $(".dhxlayout_cont").css("height", tam2+"px");
           // $("#arbolprincipal").css("height", tam2+"px");
           redimencionarLayout();
       });
           //  layout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});
        
        myLayout = new dhtmlXLayoutObject({parent: "layoutObj",pattern: "2U",cells: [{id: "a", text: "Navegacion", header:true},{id: "b", text: "Visualizacion",header:true}]});

        myLayout.cells("a").setWidth(310);
         myLayout.cells("a").setHeight(710);
        myLayout.cells("a").attachObject("sidebarObj");
        myLayout.cells("b").attachObject("sidebarObjV");

        myLayout.attachEvent("onResizeFinish", function(){
            // alert("A");
            redimencionarLayout();
        });

        myLayout.attachEvent("onExpand", function(name){
            // alert("Z");
//            alert(name)
//            myLayout.cells(name).undock(550,20,400,300);
            redimencionarLayout();
        });
        
        
          myLayout.attachEvent("onCollapse", function(name){
//             alert("Z");
            redimencionarLayout();
        });
        
        myLayout.attachEvent("onPanelResizeFinish", function(names){
            // alert("X");
            redimencionarLayout();
        });


                    detallescontratosiahyseleccionado();
//                  loadDataMenuArriba("","NO SELECCIONADO");
                   
                    loadDataMenuRibbonSeccionArriba();
                    
                  
//                   console.log("nnnn", listasubmodulos);
                      mostrar_urls().then(function (todo){
                                         
                                         
                                            console.log("esto esdd ",todo);
//                                             ribbon.conf.icons_path=todo[1];
//                                             ribbon._items.Bienvenido.conf.icons_path=todo[1];
//                                             ribbon._items.Bienvenido.conf.img=todo[0][ultimo-1];
//                                               ribbon._items.Bienvenido.base.innerHTML="d";
                                              ultimo = todo[0].length;
                                              if(todo[0].length!=0)
                                              {
                                                    ribbon._items.Bienvenido.base.innerHTML='<img class="img-circle dhxrb_image" src="'+todo[1]+"/"+todo[0][ultimo-1]+'"><div class="dhxrb_label_button">\n\
                                                                                       <div id="infousuario">'+nombre_contenido_sub_usuario+'<br><?php echo  $Usuario["NOMBRE_USUARIO"]; ?> </div></div>';
                                              }
                                     });
                    
                   
                     console.log("ri  ",ribbon);
                    ribbon.setSizes();
                    ribbon.attachEvent("onClick", function(itemIdSeleccion, bId){
                       limpiarSeleccionDeRibbon();
//                        limpiarSeleccionesRibbon
                        
                        console.log(ribbon);
//                        dhxrb_big_button
                        
                        if(itemIdSeleccion=="Bienvenido"){
                             ribbon._items["Bienvenido"].base.id="seleccion_opcionmenuarriba";
//                             ribbon._items["Bienvenido"].base.lastElementChild.id="seleccion_informacion_palabra"
//                            ribbon.check(itemIdSeleccion);
//                                      ribbon.isVisible(bId);  
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
                        
                        if(itemIdSeleccion=="cambiarcontrato"){
//                             ribbon._items["cambiarcontrato"].base.lastElementChild.id="seleccion_informacion_palabra"
                             ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba";
//                                 startIntro("seccionesSidebar");
                             console.log("aqui es  ",ribbon);
                                 loadDataSideBarContratos();  
                        }
                          
                
                        if(itemIdSeleccion=="Información") {
//                            ribbon._items["Información"].base.id="seleccion_informacion";
//                            ribbon._items["Información"].base.lastElementChild.id="seleccion_informacion_palabra"
//                            ribbon._items["Información"].base.className="class_informacion";
                           ribbon._items["Información"].base.id="seleccion_opcionmenuarriba";
                           
//                            console.log(listasubmodulos);
//                            console.log(listasubmodulos["0"]["contenido_sub"]["0"]["contenido_vista"]);
                           loadDataSideBarCatalogoInformacion(listasubmodulos["0"]["contenido_sub"]["0"]["contenido_vista"]);
                       }   
                        if(itemIdSeleccion=="Validación"){
                            ribbon._items["Validación"].base.id="seleccion_opcionmenuarriba";
                       
//                            ribbon._items["Validación"].base.lastElementChild.id="seleccion_informacion_palabra";
                          
                           loadDataSideBarCumplimientosDocumentos();
                        }
                       
                        if(itemIdSeleccion=="Evidencias"){
//                            ribbon._items["Evidencias"].base.lastElementChild.id="seleccion_informacion_palabra"
                            ribbon._items["Evidencias"].base.id="seleccion_opcionmenuarriba";
                                loadDataSideBarCumplimientosEvidencias();
                        }
                        
                        if(itemIdSeleccion=="Reportes"){
                             ribbon._items["Reportes"].base.id="seleccion_opcionmenuarriba";
//                            ribbon._items["Reportes"].base.lastElementChild.id="seleccion_informacion_palabra";
                            
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

                        if(itemIdSeleccion=="Gestión de Temas Especiales"){
                            ribbon._items["Gestión de Temas Especiales"].base.id="seleccion_opcionmenuarriba";
                                   
//                            ribbon._items["Control de Temas Especiales"].base.lastElementChild.id="seleccion_informacion_palabra";
                            var listRegistroTareas=[];
                            $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Gestión de Temas Especiales"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarTareas(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                            

                        }
                        
                        if(itemIdSeleccion=="Informe"){
                              ribbon._items["Informe"].base.id="seleccion_opcionmenuarriba";
//                            ribbon._items["Informe"].base.lastElementChild.id="seleccion_informacion_palabra";
                            
                            
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
                        
                        if(itemIdSeleccion=="Catálogos"){
                            ribbon._items["Catálogos"].base.id="seleccion_opcionmenuarriba";
//                             ribbon._items["Catálogos"].base.lastElementChild.id="seleccion_informacion_palabra";
                             $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Catálogos"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarOficiosCatalogos(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                           
                        }
                       
                        if(itemIdSeleccion=="Documentación"){
                              ribbon._items["Documentación"].base.id="seleccion_opcionmenuarriba";
//                            ribbon._items["Documentación"].base.lastElementChild.id="seleccion_informacion_palabra";
                            
                              $.each(listasubmodulos,function (index,value){

                                $.each(value["contenido_sub"],function(index1,value1)
                                {
//                                    console.log(value1);
                                    
                                    if(value1["nombre_contenido_sub"]=="Documentación"){
//                                        console.log(value1["contenido_vista"]);
                                             loadDataSideBarOficiosDocumentacion(value1["contenido_vista"]);
                                    }
                                });
                  
                             })
                           
                        }
                        if(itemIdSeleccion=="Informe Gerencial"){
                             ribbon._items["Informe Gerencial"].base.id="seleccion_opcionmenuarriba";
//                        ribbon._items["Informe Gerencial"].base.lastElementChild.id="seleccion_informacion_palabra"; 
                            loadDataInformeGerencial();
                        }
                        if(itemIdSeleccion=="Seguimiento"){
                              ribbon._items["Seguimiento"].base.id="seleccion_opcionmenuarriba";
//                              ribbon._items["Seguimiento"].base.lastElementChild.id="seleccion_informacion_palabra"; 
                            loadDataCargaProgramaGantt();
                        }
                       
                    });      
                    }	                            
         );


function limpiarSeleccionDeRibbon(){
    
                        if(ribbon._items["Información"]!=undefined){
                           ribbon._items["Información"].base.id="";
                            ribbon._items["Información"].base.lastElementChild.id="";
                            
                        }
                        if(ribbon._items["Validación"]!=undefined){
                            ribbon._items["Validación"].base.id="";
                            ribbon._items["Validación"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Evidencias"]!=undefined){
                            ribbon._items["Evidencias"].base.id="";
                            ribbon._items["Evidencias"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Informe"]!=undefined){
                              ribbon._items["Informe"].base.id="";
                            ribbon._items["Informe"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Reportes"]!=undefined){
                            ribbon._items["Reportes"].base.id="";
                            ribbon._items["Reportes"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Gestión de Temas Especiales"]!=undefined){
                            ribbon._items["Gestión de Temas Especiales"].base.id="";
                            ribbon._items["Gestión de Temas Especiales"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Catálogos"]!=undefined){
                            ribbon._items["Catálogos"].base.id="";
                            ribbon._items["Catálogos"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Documentación"]!=undefined){
                            ribbon._items["Documentación"].base.id="";
                            ribbon._items["Documentación"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Seguimiento"]!=undefined){
                            ribbon._items["Seguimiento"].base.id="";
                            ribbon._items["Seguimiento"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Informe Gerencial"]!=undefined){
                            ribbon._items["Informe Gerencial"].base.id="";
                            ribbon._items["Informe Gerencial"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["Bienvenido"]!=undefined){
                            ribbon._items["Bienvenido"].base.id="";
                            ribbon._items["Bienvenido"].base.lastElementChild.id="";
                        }
                        if(ribbon._items["cambiarcontrato"]!=undefined){
                            ribbon._items["cambiarcontrato"].base.id="";
                            ribbon._items["cambiarcontrato"].base.lastElementChild.id="";
                        }
//                        ribbon._items["Validación"].base.id="";                      
                        
    }
 function loadDataMenuArriba(iniciodinamic,info){	

//     alert();
	var inicio=[
        {id:'00',text:'<div id=\'desc\'>contrato(NO SELECCIONADO)</div>',type:'block',active:true ,items:[
        
                    {id:'0x1',mode:'cols',text:'Contratos'/*type:'block'*/,
          list:datacontratos
        }
        ]},
    
	{id:'0',text:'OMG', active:false, items:[
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
    
    
//ribbon = new dhtmlXRibbon({	parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs:inicio});
//evento de cambios de tabs del ribbon



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
 console.log(listasubmodulos);
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
                                  
                                   nombre_contenido_sub_usuario=value1["nombre_contenido_sub"];
                                     datosSeccionesRibbon[contadoresSeccionesArriba]["list"].push({id:value1["nombre_contenido_sub"], text:'<div id="infousuario">'+value1["nombre_contenido_sub"]+"<br><?php echo  $Usuario["NOMBRE_USUARIO"]; ?>",img:value1["imagen"],type:'button',isbig:true});
                                }else{
//                                    alert(value1["nombre_contenido_sub");
//                                        console.log("f",value1["nombre_contenido_sub"]);
//                                        if(value1["nombre_contenido_sub"]=="Cumplimientos"){
//                                            variables_super_globales["cumplimientos"]=true;
//                                        }
                                        var tienalmenosunavista=false;
                                         $.each(value1["contenido_vista"],function(indexContenidoVistas1,valueContenidoVistas1){
//                                             console.log()
                                             if(valueContenidoVistas1["edit"]=="true" || valueContenidoVistas1["consult"]=="true" || valueContenidoVistas1["delete"]=="true" || valueContenidoVistas1["new"]=="true")
                                             {
                                                 tienalmenosunavista=true;
                                                 console.log("entro ");
                                             }
                                             
                                         });
                                         if(tienalmenosunavista==true){
//                                             console.log("tiene  ",value1["nombre_contenido_sub"]);
                                             datosSeccionesRibbon[contadoresSeccionesArriba]["list"].push({id:value1["nombre_contenido_sub"], text:value1["nombre_contenido_sub"],img:value1["imagen"],type:'button',isbig:true});
                                      
                                         }
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
                     
                     
                     
                     
                     
                          $.each(datosSeccionesRibbon,function(index,value1){
//                console.log("debajo:",value);
                
                             if(value1["text"]=="Cumplimientos"){
                                    variables_super_globales["cumplimientos"]=true;
                                 }
                         });
                         
                         
                         
                         
//                datosSeccionesRibbon.push({id:'0x37',mode:'cols',text:'Usuario',type:'block',
//          list:infosesionusuario});
                     },
                     beforeSend:function(r){

                     }
                 
        });    
        console.log("u  ",datosSeccionesRibbon);
//        datosSeccionesRibbon.text["catal"]
        
//   
        
        
        
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
        {id:'00',text:'<div id=\'desc\'>Temática(NO SELECCIONADA)</div>',active:false ,items:[
        
                    {id:'0x1',mode:'cols',text:'Temáticas',type:'block',
          list:datacontratos
        }
        ]},
	{id:'0',text:'<div id=\'nombremenu\'>MENU PRINCIPAL </div>', active:true, items:datosSeccionesRibbon,width:"" }
        ];

ribbon = new dhtmlXRibbon({parent: "ribbonObj",arrows_mode: "none",icons_path: "../../images/base/",tabs:inicio});
// console.log("procuri el click  ",ribbon);
 
 
 //creo la funcion dentro del ribbon 00= PROYECTOS
 ribbon["_items"]["00"].base.onclick=function(elements){
 
                
//     setInterval(function(){
//          $(".dhxtabbar_tab dhxtabbar_tab_actv").removeClass();
//          console.log("seleccion del click mas adentro");
//     }
//     ,2000);  
//        
 }
 
 
// $("div.dhxtabbar_tab.dhxtabbar_tab_actv")["1"].style.width="800px!important";
//para colocarte por defecto 
ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba";

ribbon.attachEvent("onSelect", function(id, lastId){
  console.log("dd  "+id+"----  "+lastId);
//   console.log("riboon dentro de select  ",ribbon);
  console.log("intro overlay  ",$(".introjs-overlay"));
//    ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba";
  if(id=="00"){//00=id tabs de seccion de edicion o visualizacion de tematica
      $("#nombremenu").html("REGRESAR AL MENU");
//       $("#nombremenu").addClass("fa fa-cloud");
//     $('.images').addClass('col-md-6');
//         ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba";
        $("#desc").html("VISUALIZAR TEMATICAS");
        //para saber el elemento existe en el DOM se lee su tamaño
        if($(".introjs-helperLayer").length>0){
           $(".introjs-helperLayer")["0"].style["opacity"]="0.4"; 
        }
        if($(".introjs-overlay").hasClass()==true){
            alert("paso verificacion clase");
            $(".introjs-overlay")["0"].style["position"]="relative"; 
            $(".introjs-helperLayer")["0"].style["z-index"]="0";
//            $(".introjs-helperLayer")["0"].style["opacity"]="0.4";
        }
//        ribbon["_items"]["00"].base.onclick();
//          $(".dhxtabbar_base_material div.dhxtabbar_tabs div.dhxtabbar_tabs_base div.dhxtabbar_tab div.dhxtabbar_tab_text").css({
//              "background-color": "#172a84"
//            });  
//            $(".dhxtabbar_tab.dhxtabbar_tab_actv").css({"z-index":"9999999"});
//            $("#desc").css({"background": "#090452"});
//            $(".dhxtabbar_tab.dhxtabbar_tab_actv")["1"].id="idTabbarActivado";
          
//            console.log("div  ",$(".dhxtabbar_tab.dhxtabbar_tab_actv"));
//           console.log("d  ", $("div.dhxtabbar_tab.dhxtabbar_tab_actv")["1"].style["zIndex"]);
//            $(".dhxtabbar_tab.dhxtabbar_tab_actv").style.zIndex="9999999";
//            $("div.dhxtabbar_tab.dhxtabbar_tab_actv")["1"].style.width="800px";
//           $(".dhxtabbar_tab.dhxtabbar_tab_actv")["1"].style["z-index"]="9999999";
//            style.zoom
//            console.log("eso es ribbon de tematicas  ",ribbon);
//        $(".dhxtabbar_tab.dhxtabbar_tab_actv").addClass("alert alert-danger");
        
  }
  if(id=="0"){//0=id tabs de seccion de menu principal
             $("#desc").html("VISUALIZAR TEMATICAS");
             $("#nombremenu").html("MENU PRINCIPAL");  
//              ribbon._items["cambiarcontrato"].base.id="";
//      console.log("re");
  }
//  console.log("saber  ",ribbon._items);
//      console.log("ribbon seleccion tabs ",ribbon);
//   $(".dhxtabbar_tab_text").html("dfdsfdfsdfdfsdfdfdsfsdfdfsd");
//   ribbon._items["0"].conf.text="dsdsa";

    return true;
});
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
                    contrato += '<div>"Temática Seleccionada :"</div>';
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
         var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:1338,  height:605,  center:true,resize: true,park:true,modal:true	});
         layoutWin.attachURL("SeguimientoEntradaView.php", null, true);
 
        dhxWins.attachEvent("onMinimize", function(win){
            // alert("minimize");
        });
        
        dhxWins.attachEvent("onShow", function(win){
            // alert("show");
        });
        dhxWins.attachEvent("onHide", function(win){
                 alert("en onhide");
        });
        dhxWins.attachEvent("onClose", function(win){
            console.log("e  ",win);
       //             ribbon._items["Seguimiento"].base.lastElementChild.id="";
                    ribbon._items["Seguimiento"].base.id="";
                    return 1;
        });
// console.log("es ",dhxWins);
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
    <div id="informacion"></div>
<div id="ribbonObj" style="position: relative;width: 100%;"></div>
   
    
<div id="layoutObj" class="layoutObj" style="width:99.9%"> 
    <div id="arbolprincipal"> </div>
    <!--<div id="combo_zone2" style="width:200px; height:30px;"></div>-->
</div>
<!--    <div id="treeviewObj" > 


</div>-->
    
    <!--<div id="treeboxbox_tree" class="treeboxbox_tree" style="height:100%;"></div>-->
    <div id="sidebarObj"> </div>
    
    
 
    <div id="sidebarObjV" style="height: 100%">
  
    </div>
    <input id="gom" type="hidden" value="<?php echo Session::getSesion("token")?>"/>
    <input id="typePorSiLaSeSessionExpira" type="hidden" value="<?php echo $_REQUEST["type"]?>"/>
<script>
 var objetoSwal,  introOpciones;

//var clave_cumplimient_global=-1;
//cambiarCont();
//cambiarProyecto();
mostrarTareasEnAlarma();
mostrarTareasVencidas();
//alert("en");

//var myRibbon = new dhtmlXRibbon("ribbonObj");
 



//setInterval(security_session,2000);
//este metodo muestra la introducción  y descripciones en general de lo que trata
function cambiarProyecto(){
    
    
//    var jsonObj = {};
//
//           $.ajax({  
//                     url: "../Controller/CumplimientosController.php?Op=obtenerContrato",  
//                     success: function(r) {
//        $.each(r,function(index,value){
//             jsonObj[value.id_cumplimiento] = value.clave_cumplimiento ;
//             
//         })
//         
//        
//                       
//                        }    
//        });
     return new Promise(function (resolve, reject) {
//       $("#modalIntroduccion").show();
         //opacar secciones de arriba 
        $("#ribbonObj").css({"opacity": ".5"});
        
        //opacar seccion de abajo 

        $("#modalIntroduccion").fadeIn("10000");
//       $(".modal").fadeIn("300");
       
        resolve();
      } );
     
   
    
//    $("#modalIntroduccion").hide();
    
    
    
}
 
function seleccionarOpcionesProyecto(){
    
    
    
    $("#modalSeleccionarProyecto").show();
}


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
        
//   var htmlBoton="<a class='btn-floating btn-large halfway-fab waves-effect waves-light teal pulse'  id='btnAyudaSwal' style='bottom: 68%;right:-3%' >";
//       htmlBoton+="<i class='material-icons'>help</i>";                 
//       htmlBoton+="</a>";
  objetoSwal=  swal({
  title: 'Seleccione una Temática',
  input: 'select',
//  html:""+htmlBoton,
//  html:'<input type=\'text\' disabled>',
  inputOptions:jsonObj,
  inputPlaceholder: 'Sin Temática Seleccionada ',
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
        reject('Requiere seleccionar una Temática ');
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
                        success: function(r) {
                              swal({
                                type: 'success',
                                html: 'Tematica Seleccionada:' + r.clave_cumplimiento,    
                                timer: 2000,
                              });
//                                window.top.$("#desc").html("Temática("+r.clave_cumplimiento+")");
                                window.top.$("#desc").html(" Visualizar Tematicas");
                                window.top.$("#infocontrato").html("Temática Seleccionada:<br>("+r.clave_cumplimiento+")");
                                $("#divAyuda").css("display","inherit");
//                                clave_cumplimient_global=r.clave_cumplimiento;
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
                window.top.$("#desc").html("Temática("+r.clave_cumplimiento+")");
                window.top.$("#infocontrato").html("Temática Seleccionada::<br>("+r.clave_cumplimiento+")");
//                $("[data-translate]").jqTranslate('../../json/index',{defaultlang:'es' });
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
 
 function mostrarTareasVencidas()
 {
     $.ajax({
         url:"../Controller/NotificacionesTareasController.php?Op=tareasVencidas",
         type:"GET",
         success:function()
         {
             
         }
     });
 }
 
 function security_session(){
     var tipoU=<?php echo "'".$_REQUEST["type"]."'"?>;
     var sactual=<?php echo "'".Session::getSesion("tipo")."'" ?>;
     var tok=<?php echo "'".Session::getSesion("token")."'"  ?>;
     var t=$("#gom").val();
     if(t!=tok){
         console.log("es diferente");
     }
     console.log("t de vista"+t+"-- token actual real "+tok);
//console.log("f  "+sactual+"-- "+tipoU,);
//     if(sactual!=tipoU){
//         console.log("es diferente");
//     }else
//     {
//         console.log("es igual");
//     }
 }
  function RTAndPGeneral()
 {
     return new Promise(function (resolve,reject){
        $.ajax({
            url:"../Controller/TemasController.php?Op=RTAndPGeneral",
            success:function()
            {
                resolve();
            }
        })
    })
 }
// RTAndPGeneral().then(function(){
//     console.log("ya termino");
// });
 
   /*
    * secciones  : es la parte fisica del componente de que lado se encuentra
    */
    function startIntro(secciones,nombre,nombreSidebar){

        if(secciones=="partedearriba"){
//        ribbon._items["cambiarcontrato"].base.id="seleccion_sinestilos";
//                    ribbon._items["cambiarcontrato"].base.id="seleccion_sinestilos";
                           console.log("entro ");
//                             introLocal = introJs();
//                              introLocal.setOptions({
//                              hints: [
//                                 {
//                                   element: document.querySelector('#desc'),
//                                   hint: "Para Editar el nombre de las tematicas (si eres el administrador), o cambiarte de tematica sin refrescar la aplicación (si eres usuario)",
//                                   hintPosition: 'top-middle'
//
//                                 },
//                                 {
//                                   element: document.querySelector('#nombremenu'),
//                                   hint: "Menu principal  donde se muestran los submodulos de navegación",
//                                   hintPosition: 'top-middle'  
//                                 }
//                             ]
//                             });
//                             console.log("estoy aqui ",ribbon._items["cambiarcontrato"].base.id);
//                   //           ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba"; 
//                              introLocal.addHints();   
//                             ribbon._items["cambiarcontrato"].base.id="seleccion_opcionmenuarriba"
                             //start seccion de tabs
//                             console.log(sidebarObjV);
                    var introParteArribaTabs = introJs();
                     introParteArribaTabs.setOptions({
                       steps:[
                         {element:'#desc',
                           intro: "Para Editar el nombre de las tematicas (si eres el administrador), o cambiarte de tematica sin refrescar la aplicación (si eres usuario) "
                         },
                         {
                           element:"#seleccion_opcionmenuarriba",
                           intro: "Indica en que temática estamos navegando y al seleccionarlo nos presenta en la pantalla de visualización todas las temáticas"   
                         },
                         {
                          element:"#sidebarObjV",
                           intro: "Guarda la temática (si eres el administrador) o  cambia de temática sin salir de la aplicación (si eres usuario) ."     
                         }
                       ]
                     });
                     introParteArribaTabs["_options"]["doneLabel"]="Entendido";
                        introParteArribaTabs.start();      
                              //end seccion tabs                
//          introOpciones.start();        
    }
    
//     startIntro("seccionesSidebar","Gestión de Temas Especiales");
    if(secciones=="seccionesSidebar"){
        
        
        if(nombre=="Gestión de Temas Especiales"){
//             var idnombrecompleto="seleccionIntro"+nombreSidebar.replace(/ /g, "");
//            mySidebar.t.tareas.item.id=idnombrecompleto
           
//            $("#"+idnombrecompleto).css({"border-color": "#bf0505","background": "#adadad","color": "black"});
                
//       var intro = introJs();
//          intro.setOptions({
//            steps:[
//              {element:'#'+ mySidebar.t.tareas.item.id,
//                intro: "Registra tus temas especiales en la pantalla de visualizacion que se encuentra a la derecha"
//              }
//            ]
//          });
            var intro = introJs();
          intro.setOptions({
            steps:[
              {element:'#seleccion_opcionmenuarriba',
                intro: "Seccion de gestion de temas especiales"
              },
              {element:'#sidebarObj',
                intro: "1.  Personal : Carga de personal\n\
                        <br>\n\
                        2.Registros de Temas: Registra,Edita,Borra Temas Especiales "
              },
              {element:'#sidebarObjV',
                intro: "1.  Personal : Vista donde se Carga el personal y se actualizan sus datos \n\
                        <br>\n\
                        2.Registros de Temas:Vista donde se Registra,Edita,Borra Temas Especiales  "
              }
            ]
          });
          intro["_options"]["doneLabel"]="Entendido";
//          intro["_options"]["prevLabel"]="Atras";
//          intro["_options"]["nextLabel"]="Siguiente";
//          intro["_options"]["skipLabel"]="Saltar";
//          $(".introjs-helperLayer introjs-fixedTooltip").css({"background-color": "rgba(238, 76, 18, 0)!important"});
          intro.start();
//               $("#sidebarObjV").load('InyectarVistasView.php #tareas');
//                console.log("sirbadar ", window);
//                window.frames.parent.datacontratos["0"].text="d"
//                console.log("elemtno esa  ",window.frames.parent.datacontratos["0"]);
//               console.log(InyectarVistasView.php #tareas);
                
//                console.log("es my  ",mySidebar.t.tareas.item);
                    
            
        }
//         startIntro("seccionesSidebar","Bienvenido","Permisos");
        if(nombre=="Bienvenido"){
//            alert("entro a ben");
        
                            var introParteBienvenido = introJs();
                     introParteBienvenido.setOptions({
                       steps:[
                         {element:'#seleccion_opcionmenuarriba',
                           intro: "Seccion de Configuracion  "
                         },
                         {
                          element:"#sidebarObj",
                          intro:"1.Permisos (Asigna Usuario Y Contraseñas,define  niveles de permisos)\n\
                                 <br>2.Personalizar (Cambio de Contraseña,Color)"
                         },
                         {
                          element:"#sidebarObjV",
                          intro:"PERMISOS : Asigna usuarios del personal existente,proprciona permisos a vistas y tematica\n\
                                 <br><br>\n\
                                 PERSONALIZAR:   Cambiar fondo o Contraseña"
                         }
                       ]
                     });
                     introParteBienvenido["_options"]["doneLabel"]="Entendido";
                        introParteBienvenido.start(); 
           
                
        }
      
        
        
    }
//    
    
    if(secciones=="ventanaIntroduccionAlPrincipio"){
        
//              var introVentanaIntroduccion = introJs();
//          introVentanaIntroduccion.setOptions({
//            steps:[
//              {element:'#datos',
//                intro: "Registra tus temas especiales en la pantalla de visualizacion que se encuentra a la derecha"
//              }
//            ]
//          });
//          introVentanaIntroduccion["_options"]["doneLabel"]="Hecho";
//          introVentanaIntroduccion["_options"]["prevLabel"]="Atras";
//          introVentanaIntroduccion["_options"]["nextLabel"]="Siguiente";
//          introVentanaIntroduccion["_options"]["skipLabel"]="Saltar";
//          $(".introjs-helperLayer introjs-fixedTooltip").css({"background-color": "rgba(238, 76, 18, 0)!important"});
//          introVentanaIntroduccion.start();
    }
    
    if(secciones=="modalSeleccionProyectos"){
//        var introSelecionProyecto = introJs();
//          introSelecionProyecto.setOptions({
//            steps:[
//              {element:'#m1',
//                intro: ""
//              }
//            ]
//          });
//        
//        introSelecionProyecto.start();
        
        $(".modal").css({"border-style":"double"});
//        $(".modal").css({"background":"#00000087"});
//        $(".select-dropdown dropdown-trigger").css({"background-color":"#ffebeb"});
        
        
    }
    
    if(secciones=="rollAdministrador"){
        
//        
//                 var introParteRollAdministrador = introJs();
//                     introParteRollAdministrador.setOptions({
//                       steps:[
//                         {element:'#seleccion_opcionmenuarriba',
//                           intro: "Seccion de Configuracion  "
//                         }
//                       ]
//                     });
//                     introParteRollAdministrador["_options"]["doneLabel"]="Entendido";
//                        introParteRollAdministrador.start();     
        
        
        
    }
//    
    
    
    
    
    
    
    
    }

    
    
    
    
      function startIntroSwalCargaSeleccionTematica(){
//           var intro = introJs();
//           intro.setOptions({
//            steps: [
//              {
//                element: '.swal2-select',
//                intro: "Despliegue para seleccionar tematica"
//              }
//            ]
//          });
////          intro["_options"]["doneLabel"]="Hecho";
//          intro.addHints();
          var intro = introJs();
          intro.setOptions({
            steps:[
              {element:'.swal2-select',
                intro: "Despliega el combo para ver las opciones"
              },
              {elemen:'.swal2-confirm swal2-styled',
               intro:'Presione la opcion seleccionar para confirmar'
              }
            ]
          });
          intro["_options"]["doneLabel"]="Hecho";
          intro["_options"]["prevLabel"]="Atras";
          intro["_options"]["nextLabel"]="Siguiente";
          intro["_options"]["skipLabel"]="Saltar";
          $(".introjs-helperLayer introjs-fixedTooltip").css({"background-color": "rgba(238, 76, 18, 0)!important"});
          intro.start();
//     console.log("objeto swal  ",objetoSwal);
//          $(".swal2-modal .swal2-select").css({"border-color": "#bf0505","background": "palevioletred"});
//          $(".swal2-modal .swal2-select")on('click', function(){
//                var value = $(this).attr('rel'); //get the value
//                value++; //increment value for the nth-child selector to work
//                var value=1;
//                console.log("el value  ",value);
//                value++;
                
//                var value="1";
                
//                $('.swal2-modal .swal2-select')
//                  .find('option:nth-child('+value+')')
//                  .prop('selected',true)
//                  .trigger('change');
//            return false;
//      }


//$("#btnAyuda").css("bottom","67%!important");
//$("#btnAyuda")["context"]["all"]["btnAyuda"]["style"]="67%!important";
//console.log("lo que esta dentro ",$("#btnAyuda")["context"]["all"]);
//$("#btnAyuda").context.styleSheets["0"].cssRules["0"].style.bottom="67%";
console.log("ay  ",$("#btnAyuda"));
//  $("#btnAyuda").s({"bottom":"67%"});
// $("#divAyuda").css({"bottom":"67%"});

//.btn-floating.btn-large.halfway-fab {
//    bottom: -28px;
}

function introTematicaOpcionDentroDeTabs(){
//    introOpciones
//    #seleccion_opcionmenuarriba
console.log("intro opcionesd ",introOpciones);

//$("#seleccion_opcionmenuarriba").css({"border-color": "#bf0505","background": "palevioletred","color": "black"});
// introOpciones.setOptions({
//            steps: [
//              {
//                element: document.querySelector('#seleccion_opcionmenuarriba'),
//                intro: "Indica en que tematica estamos navegando  y al seleccionarlo nos presenta en la pantalla de visualizacion todas las tematicas"
//              }
//            ]
//          });
//introOpciones._introItems.push({"d":"2"});
// introOpciones.start();






}
 
// $(".swal2-modal .swal2-select").css({"border-color": "#bf0505","background": "palevioletred","color": "black"});
 
</script>
<?php  
//$_SESSION=array();
//echo session_id();
//if(isset($_COOKIE[session_name()])){
//    setcookie(session_name(),'', time()-100,'/');
//}
//session_destroy();

?>



</body>

<!--<div data-translate="texto" ></div>-->
</html>
   <ul id="nav-mobile" class="right">
               <ul class="right hide-on-med-and-down">
<!--                    <li><a href="sass.html"><i class="material-icons">search</i></a></li>
                    <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
                    <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>-->
                    <!--<li><a href=""><i class="material-icons">more_vert</i></a></li>-->
                   
                 

                </ul>
       <div class="nav-content" id="divAyuda" style="display:none ">
                    <span class="nav-title">  </span>
                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal pulse"  id="btnAyuda" style="bottom: 68%;right:5%" >
                        <i class="material-icons">help</i>        
                    </a>
                </div>
    </ul>




  <!-- Modal Trigger -->
  <!--<a class="waves-effect waves-light btn modal-trigger" href="#modalIntroduccion">Modal</a>-->

  <!-- Modal Structure -->
  <div id="modalIntroduccion" class="modal">
    <div class="modal-content">
        <center><h5>Introducción</h5></center>
    </div>
      
      
      <div class="modal-body">
           <div class="collection">
               <div  class="collection-item"> <p class="informacionA_QueseSeRefiere"> Nombre de la Aplicación :</p>OMG-APPS-GESTIÓN DE TEMAS ESPECIALES.</div>
            <div  class="collection-item "><p class="informacionA_QueseSeRefiere"> Objetivo de la Aplicación :</p>CONTROL DE TEMAS ESPECIALES.</div>
            <div  class="collection-item"> <p class="informacionA_QueseSeRefiere"> Que es una Temática:</p>ES EL PROYECTO PRINCIPAL DEL CUAL SE DERIVAN UNA GRAN DIVERSIDAD DE TEMAS ESPECIALES.</div>
            <div class="collection-item"><p class="informacionA_QueseSeRefiere"> Ejemplos de temáticas :</p>COMERCIALIZACIÓN, PLANEACIÓN ESTRATEGICA, FINANZAS, OTROS.</div>
            <div class="collection-item"> <p class="informacionA_QueseSeRefiere" > Roll de Administrador  </p>ASIGNA USUARIOS Y CONTRASEÑAS, DEFINE NIVELES DE PERMISOS DE USUARIOS, CREA NOMBRE DE TEMATICAS E INGRESA AL PERSONAL. </div>
            <div class="collection-item"> <p class="informacionA_QueseSeRefiere"> Roll de Usuario:</p>INGRESA TEMAS, DEFINE ALARMAS, ESTABLECE FECHAS LIMITE PARA SU ATENCIÓN, ANOTA OBSERVACIONES, REGISTRA AVANCES, ADJUNTA ARCHIVOS COMO EVIDENCIAS Y PLANEA TAREAS POR MEDIO DE UN DIAGRAMA DE GANTT.</div> 
           </div>
            
         <div class="modal-footer">
            <a  class="modal-close waves-effect waves-green btn-flat" id="enlaceAceptarIntroduccion">Aceptar</a>
         </div>
          
         
      </div>
  </div>
  
  
    <!-- Modal Structure  seleccion de proyecto -->
  <div id="modalSeleccionarProyecto" class="modal">
    <div class="modal-content">
        <center><h5>Clasifica tus Temas Según Temática</h5></center>
    </div>
      
      
      <div class="modal-body" style="width: 100%" >
          
          <center>  
              <!--<label><div style="font-size:25px;color: black">Seleccione una opcion</div></label>-->
              <!--<div id="seccionSelectSeleccionProyecto" class="cssToolTip"  title="Selecciona una opcion">-->
                <select id="opcionesProyectos" > 
                  </select>
              <!--</div>-->
              <div id="mensajeObervacionSeleccionProyecto" class="alert alert-info"> 
                  Obervacion:
                 <p >1. Si estas visualizando este recordatorio es por que  debes guardar las tematicas que se manejaran, selecciona una opcion  
                        y luego confirme en "ACEPTAR" para avanzar, despues  en la parte de atras aparecera un boton parpadeando con el icono de ayuda debera presionarlo para ver los tipos de tutoriales a seguir en caso de ser nuevo se resaltara   lo que debe realizar primero antes de continuar con el flujo de trabajo normal como sugerencia</p>
                
<!--                  <p >1. Si estas visualizando este recordatorio es por que eres administrador y debes guardar las tematicas que se manejaran, es obligatorio para poder continuar
                          selecciona de la lista de opciones en la parte de arriba cualquiera para poder seguir</p>-->
                 
                 
                 
                 
              </div>
                  <!--<div style="width: 100%">-->
<!--                  <div id="opcionesProyectos">
                      
                  </div>-->
                </div>
          <!--</center>-->    
<!--           <div class="modal-footer">
            <a  class="modal-close waves-effect waves-green btn-flat" id="enlaceAceptarProyecto">Aceptar</a>
           </div>-->

           <div style="padding-bottom: 6%"></div>
              <div class=""  id="mensajeSeleccionProyecto"></div>
          <div class="modal-footer" style="">
           <!--<div class="alert alert-warning"  id="mensajeSeleccionProyecto">dsfdsf</div>-->
               <a  class="modal-close waves-effect waves-green btn-flat" id="enlaceRegresarA_Introduccion">Regresar</a>
                <a  class="modal-close waves-effect waves-green btn-flat" id="enlaceAceptarProyectoSeleccionado">Aceptar</a>
          </div>
      </div>
     
    
       <!-- Modal Structure  cualTutorial -->
      <div id="modalSeleccionCualTutorial" class="modal">
    <div class="modal-content">
        <center><h5>Tutorial</h5></center>
        <div>
           
        </div>
    </div>
      
      
      <div class="modal-body">
          <div  class="glyphicon glyphicon-eye-open " style="color: black"></div>   : Visualizar Tutorial    
           <div class="collection">
               <div class="collection-item" style="background: lightblue;"><p class="informacionA_QueseSeRefiere">1. Configuración de Tematicas  *Si no haz guardado tus tematicas debera seleccionar esta opcion  para seguir los pasos.  </p>GUARDA LAS TEMATICAS O CAMBIA<i id="irTutorialProyectos" class="glyphicon glyphicon-eye-open pull-right" style=""></i><br>   </div>
            <div class="collection-item"> <p class="informacionA_QueseSeRefiere" >2.  Roll de Administrador (Observacion): En caso de no visualizar debera irse a la aprte de arriba y donde dice REGRESAR AL MENU debera presionarlo y volver al picarle al ojito:</p>ASIGNA USUARIOS Y CONTRASEÑAS, DEFINE NIVELES DE PERMISOS DE USUARIOS, CREA NOMBRE DE TEMATICAS E INGRESA AL PERSONAL.<i id="irTutorialRollAdministrador" class="glyphicon glyphicon-eye-open pull-right" style=""></i>  </div>
            <div class="collection-item"> <p class="informacionA_QueseSeRefiere"> 3. Roll de Usuario(Gestion Temas Especiales):</p>INGRESA TEMAS, DEFINE ALARMAS, ESTABLECE FECHAS LIMITE PARA SU ATENCIÓN, ANOTA OBSERVACIONES, REGISTRA AVANCES, ADJUNTA ARCHIVOS COMO EVIDENCIAS Y PLANEA TAREAS POR MEDIO DE UN DIAGRAMA DE GANTT.<i id="irTutorialGestionTemas" class="glyphicon glyphicon-eye-open pull-right" style=""></i> </div> 
           </div>
            
         <div class="modal-footer">
            <a  class="modal-close waves-effect waves-green btn-flat" id="cerrarModalTutoriales">Cerrar</a>
         </div>
          
         
      </div>
  </div>
    
    
    
 
    <div id="fondoTransparente" class="fondoTransparente"></div>
    <!--<div class="dhxtabbar_tab dhxtabbar_tab_actv" style="">ee</div>-->

