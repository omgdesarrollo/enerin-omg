listarCumplimientos();

//listarDatos();
//
//function listarDatos()
//{
//    $.ajax
//    ({
//        url: '../Controller/CumplimientosController.php?Op=obtenerContrato',
//        type: 'GET',
//        beforeSend:function()
//        {
//            $('#loader').show();
//        },
//        success:function(datos)
//        {
////            data = datos;
//            reconstruirTable(datos);
//        },
//        error:function(error)
//        {
//            $('#loader').hide();
//        }
//    });
//}

function listarCumplimientos()
{
    alert("Entro al ajax");
    $.ajax
    ({
        url:'../Controller/CumplimientosController.php?Op=obtenerContrato',
        type:'POST',
//        data:'ID_USUARIO='+id_usuario,
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








