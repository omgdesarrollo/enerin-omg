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
        reject('requieres seleccionar un contrato');
      }
    });
  }
}).then(function (result) {
//  swal({
//    type: 'success',
//    html: 'tu has seleccionado el contrato ' + result
//  });
alert("ya");

    $.ajax({  
                        url: "../Controller/CumplimientosController.php?Op=contratoselec&c="+result+"&obt=false",  
                        async:false,
                        success: function(r) {
                              window.top.$("#desc").html("CONTRATO("+r.clave_cumplimiento+")");
                                window.top.$("#infocontrato").html("Contrato Seleccionado:<br>("+r.clave_cumplimiento+")");
//                            alert("si te respondio");
                          
                            
                           }    
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
    
       var c="";
       
     $.ajax
    ({
        url:'../Controller/CumplimientosController.php?Op=contratoselec&obt=true',
        type:'POST',
        async:false,
        success:function(d)
        {
//            reconstruirTable(datos)
            if(d!=""){
                c=d;//en esta variable se guarda el contrato seleccionado falta
            }
        }                  
        
    });
//    alert("contrato seleccionado  "+c);
    
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
                tempData += "<tr  id='registro_"+value.id_cumplimiento+"'>";
                tempData += "<td class='celda' width='50%'>"+value.clave_cumplimiento+"</td>";
                tempData += "<td class='celda' width='50%'>"+value.cumplimiento+"</td>";
                if(carga==0)
                tempData += "</tr>";
    
        return tempData;                                                        
}
