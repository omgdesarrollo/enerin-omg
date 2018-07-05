  $(function (){
     
//              cambiarCont();
      $("#btn-cont").click(function (){
          
          
        cambiarCont();
      });
      
  });


 function cambiarCont()
    { 
//var jsonObj = {
//    members: 
//           {
//            host: "hostName",
//            viewers: 
//            {
//            }
//        }
//}
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

//        console.
                swal({
  title: 'Selecciona un contrato',
  input: 'select',
  inputOptions:jsonObj,
  inputPlaceholder: 'selecciona un contrato ',
  showCancelButton: true,
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
});
    
 } 
    

listarCumplimientos();


function listarCumplimientos()
{
//    alert("Entro al ajax");
    $.ajax
    ({
        url:'../Controller/CumplimientosController.php?Op=obtenerContrato',
        type:'POST',
        success:function(datos)
        {
            reconstruirTable(datos)
        }                  
        
    });
}


function reconstruirTable(data)
{
    cargaTodo=0;
    tempData="";
    
    $.each(data,function(index,value){
        
            tempData += reconstruir(value,cargaTodo);
    });
     
    $("#contenido").html(tempData);
    $("#loader").hide();
}


function reconstruir(value,carga)
{
    tempData = "";
    
                if(carga==0)
                tempData += "<tr id='registro_"+value.id_cumplimiento+"'>";
                tempData += "<td class='celda' width='22%'>"+value.clave_cumplimiento+"</td>";
                tempData += "<td class='celda' width='22%'>"+value.cumplimiento+"</td>";                  
                if(carga==0)
                tempData += "</tr>";
    
        return tempData;                                                        
}
