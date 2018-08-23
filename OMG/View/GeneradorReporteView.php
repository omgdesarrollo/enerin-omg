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
/*            overflow: scroll;  */
            }
            
            
            #seccionIzquierda {
			position: relative;
			/*margin-left: 10px;*/
			/*margin-top: 50px;*/
			width: 100%    ;
                        overflow:auto ;
			height: 180px;
			/*box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		      }
		      
		        #seccionDerecha {
			position: relative;
			/*margin-left: 10px;*/
			/*margin-top: 50px;*/
			width: 100%    ;
                        overflow:auto ;
			height: 180px;
			/*box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		      }
		      
		      
		     #seccionAbajo{
			position: relative;
			/*margin-left: 10px;*/
			/*margin-top: 50px;*/
			/*width: 100%    ;*/
                        overflow:auto ;
			height: 150px;
			/*box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);*/
                        box-shadow: 0 1px 3px rgba(0,0,0,90.05), 0 1px 3px rgba(0,0,0,0.09);
		      }
		      #layoutObjGenerador{
		      position: relative;
		      	height: 310px;
		      	  width: 100%;
                   
                    box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
		      }
		        div#layout_here {
                    position: relative;
                    width: 100%;
                    height: 392px;
                    /*overflow: auto;*/
                    box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
                    /*margin: 0 auto;*/
                    }
		      
		      
		      
        </style>              	 
</head>
<body class="no-skin" onload="">
<!-- <div id="loader"></div>  -->
<?php
    require_once 'EncabezadoUsuarioView.php';
    // require_once '../Model/socketModel.php';
?>








<div id="layoutObjGenerador">

<div class="col-md-12 ">
<div class="col-md-6 ">
<!-- <div class="col-md-6 "> -->
<div id="seccionIzquierda">
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
<!-- </div> -->
<!-- <div class="col-md-3"> -->
<button id='reporteMensualanual' class="btn btn-info">Generar Reporte</button>
<button id='reporteDiariosdelMensualAnualCalculo' class="btn btn-info">Calculo de todos los diarios  </button>
<!-- </div> -->
<button id='btnAgregarMolarAlMes' class="btn btn-info" data-toggle="modal" data-target="#createitemMolares">Agregar % Molares</button>

</div>
</div>

<div class="col-md-6 ">

<!-- <button id='toExcel' > -->
<!--      <img src="../../images/base/_excel.png" width="35px" height="auto"></button> -->
<div id="seccionDerecha">
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
</div>

</div>
<!-- <div id="seccionAbajo"> -->
<div id="jsGrid" ></div>
<!-- </div> -->

<div id="listjson"></div>
<div id="layoutObjGenerador" class="layoutObj"></div>


<script>
    var data1=[],DataGrid=[],myCombo,myCombo2;
    var fechas_inicio_final={"fecha_inicio":"","fecha_final":""};
    bandera=0;   
$(function()
{    
	myCombo = dhtmlXComboFromSelect("mySelect");
	myCombo2 = dhtmlXComboFromSelect("mySelect2");
	  myLayout = new dhtmlXLayoutObject({parent: "layoutObjGenerador",pattern: "3U",cells: [{id: "a", text: "Mensual", header:true,height: 210},{id: "b", text: "Rango de Fechas",header:true},{id: "c", text: "Tabla de Datos",header:true}]});

	myLayout.cells("a").attachObject("seccionIzquierda");
	myLayout.cells("b").attachObject("seccionDerecha");
	myLayout.cells("c").attachObject("jsGrid");
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
//                     alert("dfds");

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
     var lista=[],__datos=[];
             $.ajax({
                 url:'../Controller/GeneradorReporteController.php?Op=ListByMonthAndYear',
                 type:'POST',
                 data:'MONTH='+myCombo.getSelectedValue()+"&YEAR="+myCombo2.getSelectedValue(),
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
//     } 
     }
     );
     var $btnreporteDiariosdelMensualAnualCalculo=  $('#reporteDiariosdelMensualAnualCalculo'); 
     $btnreporteDiariosdelMensualAnualCalculo.on('click', function () {
// alert("le has picado ");
       var lista=[],__datos=[];
               $.ajax({
                   url:'../Controller/GeneradorReporteController.php?Op=ListByMonthAndYearCalculo',
                   type:'POST',
                   data:'MONTH='+myCombo.getSelectedValue()+"&YEAR="+myCombo2.getSelectedValue(),
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
//       }
        
       }
       );
     var $btn_guardarMolares=  $('#btn_guardarMolares'); 
     $btn_guardarMolares.on('click', function () {
   var datosMolares={"MES":myCombo.getSelectedValue(),"ANO":myCombo2.getSelectedValue(),"omg2c1":$("#omg2c1").val(),"omg2c2":$("#omg2c2").val(),"omg2c2":$("#omg2c2").val(),"omg2c3":$("#omg2c3").val(),"omg2c4":$("#omg2c4").val(),"omg2c5":$("#omg2c5").val(),"omg2c6":$("#omg2c6").val(),"omg2c7":$("#omg2c7").val(),"omg2c8":$("#omg2c8").val(),"omg2c9":$("#omg2c9").val(),"omg2c10":$("#omg2c10").val(),"omg2c11":$("#omg2c11").val()};
   
    	 $.ajax({
             url:'../Controller/GeneradorReporteController.php?Op=ListByMonthAndYearCalculo',
             type:'POST',
             data:datosMolares,
             success:function(r)
             {
//                data1=r;
//                $.each(r,function (index,value)
//                  {
//                      __datos.push( reconstruir(value,index++) );
//                  });
//                DataGrid=__datos;
               
//                 gridInstance.loadData();
             },
             error:function()
             {
             }
         }); 


    	 
     });










     
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
	
	    <div class="modal draggable fade" id="createitemMolares" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear % Molares</h4>
		      </div>
                        
		      <div class="modal-body">
                         
                          
                                                <div class="form-group">
							<label class="control-label" for="title">C1:</label>
                                                        <input type="text"  id="omg2c1" class="form-control"  />
                                                        
                                                    
<!-- 							<div class="help-block with-errors"></div> -->
<!--                                                         <div id="sugerenciasclausulas"></div> -->
                                                        
						</div>
                                                
                                                <div class="form-group">
							<label class="control-label" for="title">C2:</label>
                                                        <textarea  id="omg2c2" class="form-control" data-error="Ingrese la Descripcion del Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>                                    
                                    
                                    
						<div class="form-group">
							<label class="control-label" for="title">C3:</label>
                                                        <textarea  id="omg2c3" class="form-control" data-error="Ingrese el Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                                                                                       
                                                                        
                                                <div class="form-group">
							<label class="control-label" for="title">C4:</label>
                                                        <textarea  id="omg2c4" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>

   <div class="form-group">
							<label class="control-label" for="title">IC4:</label>
                                                        <textarea  id="omg2c5" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						   <div class="form-group">
							<label class="control-label" for="title">C5:</label>
                                                        <textarea  id="omg2c6" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						   <div class="form-group">
							<label class="control-label" for="title">IC5:</label>
                                                        <textarea  id="omg2c7" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						   <div class="form-group">
							<label class="control-label" for="title">C6+:</label>
                                                        <textarea  id="omg2c8" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						   <div class="form-group">
							<label class="control-label" for="title">CO2:</label>
                                                        <textarea  id="omg2c9" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						   <div class="form-group">
							<label class="control-label" for="title">H2S:</label>
                                                        <textarea  id="omg2c10" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						   <div class="form-group">
							<label class="control-label" for="title">N2:</label>
                                                        <textarea  id="omg2c11" class="form-control" data-error="Ingrese la Descripcion del Sub-Tema" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                                                        
                                                                                                                                
						<div class="form-group">
                                                    <button type="submit" style="width:49%" id="btn_guardarMolares"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" style="width:49%" id="btn_limpiar_Molares"  class="btn crud-submit btn-info">Limpiar</button>
						</div>
                        

		      </div>
		    </div>

		  </div>
       </div>
     
</html>