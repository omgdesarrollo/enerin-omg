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

                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                <!--  -->
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
                <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
                <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
                
                <!--LIBRERIA SWEET ALERT 2-->
                <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
                <!--END LIBRERIA SWEET ALERT 2-->

                <!--<script src="../../js/tools.js" type="text/javascript"></script>-->
                
        <style>
           body{overflow:hidden;}
        </style>              
                
 			 
</head>

<body class="no-skin" onload="">





<script>
    seleccionConcepto();
    function seleccionConcepto()
    { 
var jsonObj = {};
//var jsonObjTemp={};
//var 
var conceptoseleccionado="";
  __contador=1;
           $.ajax({  
                     url: "../Controller/CatalogoProcesosController.php?Op=ListarConceptos",  
                     async:true,
                     success: function(r) {
                            $.each(r,function(index,value){
                                jsonObj[value.id_concepto_reportes] =value.concepto;
//                                jsonObjTemp[value.id_concepto_reportes]=value.vista;

                            })
                       
                     }    
            });
                swal({
  title: 'Selecciona un Concepto',
  input: 'select',
  inputOptions:jsonObj,
  inputPlaceholder: 'selecciona un concepto ',
  showCancelButton: true,
  showLoaderOnConfirm: true,
//   allowEscapeKey:false,
//   allowOutsideClick: false,
   showConfirmButton: true,
   confirmButtonText:"Seleccionar",
  inputValidator: function (value) {
    return new Promise(function (resolve, reject) {
      if (value !== '') {
        resolve();
      } else {
        reject('requieres seleccionar un concepto ');
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
//   console.log(result);
   
    $.ajax({  
                        url: "../Controller/ConceptoReportesVistasController.php?Op=detectarVista",  
                        async:true,
                        data:"idConcepto="+result,
                        success: function(r) {
                              swal({
                                type: 'success',
                                html: 'Concepto Cargado exitosamente ',    
                                timer: 2000,
                              });            
    }    
           });
  });
   
 }
</script>

    
	</body>
     
</html>