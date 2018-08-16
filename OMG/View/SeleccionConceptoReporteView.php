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
                <!--LIBRERIA SWEET ALERT 2-->
                <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
                <!--END LIBRERIA SWEET ALERT 2-->
                <!--LIBRERIA DE JGROWL--> 
                 <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>
                 <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
                 <!--END LIBRERIA JGROWL-->
                <!--<script src="../../js/tools.js" type="text/javascript"></script>-->                        		 
        </head>
<body class="no-skin" onload="">
<script>
seleccionConcepto();
function seleccionConcepto()
{ 
var jsonObj = {};
  __contador=1;
           $.ajax({  
                     url: "../Controller/CatalogoProcesosController.php?Op=ListarConceptos",  
                     async:false,
                     success: function(r) {
                            $.each(r,function(index,value){
                                jsonObj[value.id_concepto_reportes] =value.concepto;
//                                jsonObjTemp[value.id_concepto_reportes]=value.vista;
                            });
                     }    
            });
  swal({
  title: 'Selecciona un Concepto',
  input: 'select',
  inputOptions:jsonObj,
  inputPlaceholder: 'selecciona un concepto ',
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
    $.ajax({  
                        url: "../Controller/ConceptoReportesVistasController.php?Op=detectarVista",  
                        data:"idConcepto="+result,
                        success: function(r) {
                            if(r!=="D:"){//!== significa si no son identicos tanto en tipo de variable como valor por seguridad y hacer mas resisten la validacion
                              $.jGrowl("Cargando  Porfavor Espere......", { sticky: true });
                              $.jGrowl("Concepto  "+r.concepto+"  Cargado Exitoso", { header: 'Acceso Exitoso' });
                                  var delay = 1000;
                                  setTimeout(function(){window.top.$("#sidebarObjV").load("InyectarVistasView.php  "+r.vistaHtml);}, delay);                      
                            }
                            else{
                                  $.jGrowl("Error la Vista No Existe", { header: 'Error' });
                            }
                        }    
    });
});
   
 }
</script>
</body>
     
</html>