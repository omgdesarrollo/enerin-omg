  $(function (){
     
//              cambiarCont();
      $("#btn-cont").click(function (){
          
          
        cambiarCont();
      });
      
  });


 function cambiarCont()
    { 
  datoscont={};
           $.ajax({  
                     url: "../Controller/CumplimientosController.php?Op=obtenerContrato",  
                     async:false,
                     success: function(r) {
                        //alert("en:   ");
//                     datacontratos.push( {id:'oficio',text:''+,img:'oficios.png',type:'button',isbig:true} )
                     
//                     $.each(r,function(index,value){
//                        // alert("ya entro y "+value.CLAVE_CUMPLIMIENTO);
//                        
////                      datacontratos.push( {id:'contratos',text:value.clave_cumplimiento,img:'oficios.png',type:'button',isbig:true} );
////                         datosco   
//                            
//                         })
//                   datoscont={'r.id_cumplimiento':""};
                        }    
        });
        
        
//        datoscont={ '1': 'Contrato 1' },
//                   { '2': 'Contrato 2'};
        
                swal({
  title: 'Selecciona un contrato',
  input: 'select',
  inputOptions:datoscont,
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
  swal({
    type: 'success',
    html: 'tu has seleccionado el contrato ' + result
  });
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
                tempData += "<td class='celda' width='50%'>"+value.clave_cumplimiento+"</td>";
                tempData += "<td class='celda' width='50%'>"+value.cumplimiento+"</td>";                  
                if(carga==0)
                tempData += "</tr>";
    
        return tempData;                                                        
}








