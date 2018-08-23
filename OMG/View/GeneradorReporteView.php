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

		<!-- bootstrap & fontawesome -->
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script> -->

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" /> -->
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
        <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->

                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                <link href="../../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

                <!--  -->
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                
                <!-- <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script> -->

                <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
                <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
                <!--LIBRERIA SWEET ALERT 2-->
                <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
                <!--END LIBRERIA SWEET ALERT 2-->
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
                <link href="../../css/filtroSupremo.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/settingsView.css" rel="stylesheet" type="text/css"/>
                <script src="../../js/tools.js" type="text/javascript"></script>
                <script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>
                <script src="../../js/GeneradorReporteView.js" type="text/javascript"></script>         
                <script src="../../js/excelexportarjs.js" type="text/javascript"></script>
                <!-- <script src="../../js/socket.js" type="text/javascript"></script> -->
                <!-- <script src="../../js/fancywebsocket.js" type="text/javascript"></script> -->
                
        <style>
            .jsgrid-header-row>.jsgrid-header-cell 
            {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
            }
            body{
/*             overflow: scroll; /* Scrollbar are always visible */ */
            }

        </style>              
                
 			 
</head>

<body class="no-skin" onload="">

<!-- <div id="loader"></div>  -->
       

<?php
    require_once 'EncabezadoUsuarioView.php';
    // require_once '../Model/socketModel.php';
?>

<div class="col-md-12 ">
<div class="col-md-6 ">
<label>Seleccione El Mes:</label>
<select id="mySelect" style="width:130px;">
		<option value="01" selected="selected">Enero</option>
		<option value="02">Febrero</option>
		<option value="03">Marzo</option>
		<option value="04">Abril</option>
		<option value="05">Mayo</option>
		<option value="06">Junio</option>
		<option value="07">Julio</option>
		<option value="08">Agosto</option>
		<option value="09">Septiembre</option>
		<option value="10">Octubre</option>
		<option value="11">Noviembre</option>	
		<option value="12">Diciembre</option>	
</select>

<label> Seleccione El Periodo Anual:</label>
<select id="mySelect2" style="width:130px;">
		<option value="2017">2017</option>
		<option value="2018">2018</option>
		
</select>

<button id='reporteMensualanual' class="btn btn-info">Generar Reporte</button>
<button id='reporteDiariosdelMensualAnual' class="btn btn-info">Calculo de todos los diarios  </button>
</div>
<div class="col-md-6 ">

<!-- <button id='toExcel' > -->
<!--      <img src="../../images/base/_excel.png" width="35px" height="auto"></button> -->
<label>Fecha Inicio</label>
<input type="text" id="fechaInicio"/>
<br>
<label>Fecha Final</label>
<input type="text" id="fechaFinal"/>
<br><br><br>
<button id='reporte' class="btn btn-info">Obtener todos los diarios</button>
<button id='reporteCalculoDiarios' class="btn btn-info">Calcular todos los diarios</button>
<!--<div class="row">-->
</div>
<div id="jsGrid" style="width: 90%"></div>

<div id="listjson"></div>
<script>
    var data1=[],DataGrid=[],myCombo,myCombo2;
    var fechas_inicio_final={"fecha_inicio":"","fecha_final":""};
    bandera=0;   
    var month=0,year=0,presionadomes=false,presionadoyear=false;

//    

    
$(function()
{    
	myCombo = dhtmlXComboFromSelect("mySelect");
	myCombo2 = dhtmlXComboFromSelect("mySelect2");
	 myCombo.attachEvent("onChange", function(value, text)
	     	    {
		 				presionadomes=true;
		 				month=value;
	    	            
	     	    }); 
	 myCombo2.attachEvent("onChange", function(value, text)
	     	    {
					 presionadoyear=true;
	     	            year=value;
	    	            
	     	    }); 

	    
    construirGridGenerador();

    $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#fechaInicio").datepicker({
            dateFormat: 'yy/mm/dd',
            firstDay: 1,
            onSelect: function() {
               fechas_inicio_final["fecha_inicio"]=$("#fechaInicio").val();             
            }
        }).datepicker("setDate", new Date());   
         $("#fechaFinal").datepicker({
            dateFormat: 'yy/mm/dd',
            firstDay: 1,
            onSelect: function() {
               fechas_inicio_final["fecha_final"]=$("#fechaFinal").val();
            }
        }).datepicker("setDate", new Date());      
     var $btntoExcel = $('#reporte');
     $btntoExcel.on("click",function()
    {
        bandera=true;
        growlWait("Reporte","Generando Reporte");
                                
        obtenerDatosReporte();
        growlSuccess("Reporte","Reporte Generado Exitoso");
    });


     var $btnCalculoDiariosRangoFechasInicioFin = $('#reporteCalculoDiarios'); 
     $btnCalculoDiariosRangoFechasInicioFin.on('click', function () {
                    alert("dfds");

    	   var lista=[],__datos=[];
           $.ajax({
               url:'../Controller/GeneradorReporteController.php?Op=GenerarReporteCalculoDeTodosLosDiariosRangoFechas',
               type:'POST',
               data:'FECHA_INICIO='+fechas_inicio_final["fecha_inicio"]+"&FECHA_FINAL="+fechas_inicio_final["fecha_final"],
               success:function(r)
               {
                 data1=r;
                 
                 $.each(r,function (index,value)
                   {
                       __datos.push( reconstruir(value,index++) );
                   });
                 DataGrid=__datos;
                 
                  gridInstance.loadData();
               },
               error:function()
               {
               }
           }); 

     });

     var $btnReporteMensualAnual=  $('#reporteMensualanual'); 

     $btnReporteMensualAnual.on('click', function () {
    alert("d");
    if(presionadomes==false || presionadoyear==false){
    	alert("debe seleccionar un mes y año");
    }else{
     var lista=[],__datos=[];
//      alert("esd");
             $.ajax({
                 url:'../Controller/GeneradorReporteController.php?Op=ListByMonthAndYear',
                 type:'POST',
                 data:'MONTH='+month+"&YEAR="+year,
                 success:function(r)
                 {
                   data1=r;
                   $.each(r,function (index,value)
                     {
                         __datos.push( reconstruir(value,index++) );
                     });
                   DataGrid=__datos;
                   
                    gridInstance.loadData();
                 },
                 error:function()
                 {
                 }
             }); 
    }
      
     }
     );

     


     

     

     fechas_inicio_final["fecha_inicio"]=$("#fechaInicio").val();
     fechas_inicio_final["fecha_final"]=$("#fechaFinal").val();
})  
function obtenerDatosReporte(){
// 	alert();
    var lista=[],__datos=[];
        $.ajax({
            url:'../Controller/GeneradorReporteController.php?Op=GenerarReporteTodosLosDiarios',
            type:'POST',
            data:'FECHA_INICIO='+fechas_inicio_final["fecha_inicio"]+"&FECHA_FINAL="+fechas_inicio_final["fecha_final"],
            success:function(r)
            {
              data1=r;
              
              $.each(r,function (index,value)
                {
                    __datos.push( reconstruir(value,index++) );
                });
              DataGrid=__datos;
              
               gridInstance.loadData();
            },
            error:function()
            {
            }
        }); 
}
 </script>   
<script>   	
    
	var $btnDLtoExcel = $('#toExcel'); 
                $btnDLtoExcel.on('click', function () {
                    if(bandera==true){
                        $("#listjson").excelexportHibrido({
                                    containerid: "listjson"
                                       , datatype: 'json'
                                       , dataset: data1
                                       , columns: getColumns(data1)     
                                });
                    }
    });    





                
</script>
<!--<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>-->
    
	
	
            <!--<script src="../../js/fCatalogoProcesosView.js" type="text/javascript"></script>-->

            <!--Inicia para el spiner cargando-->
            <script src="../../js/loaderanimation.js" type="text/javascript"></script>
            <!--Termina para el spiner cargando-->
           
            <!--Bootstrap-->
            <script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>
            <!--Para abrir alertas de aviso, success,warning, error-->       
            <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
            
            <!--Para abrir alertas del encabezado-->
            <script src="../../assets/probando/js/ace-elements.min.js"></script>
            <script src="../../assets/probando/js/ace.min.js"></script>
    
	</body>
     
</html>