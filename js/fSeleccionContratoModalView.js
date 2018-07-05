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








