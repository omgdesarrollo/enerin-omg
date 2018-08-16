
function seleccionConcepto()
{ 
var jsonObj = {};
var catalogo_reporte="";
 $.getJSON("../../js/Seleccion_Catalogo&&Reporte.json", function(json) {
       catalogo_reporte=json.dataCatalogoReportes[0].detectarVistaCatalogo;
 });
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
                        url: "../Controller/ConceptoReportesVistasController.php?Op="+catalogo_reporte,  
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