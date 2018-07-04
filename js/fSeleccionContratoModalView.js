

function listarCumplimientos()
{
    alert("Entro al ajax");
    $.ajax
    ({
        url:'../Controller/CumplimientosController.php?Op=obtenerContrato',
        type:'POST',
        data:'ID_USUARIO='+id_usuario,
        success:function(datos)
        {
            construirTable(datos)
        }                  
        
    });
}


function construirTable(datos)
{
    tempData="";
 
//        tempData+= construir(value,cargaTodo);
    tempData += '<select class="select" onchange="saveComboToDatabase(\'id_empleado\',this,'+value.id_documento+')">';
    $.each(datos,function(index,value)
    {
        tempData += "<option value='"+value.id_cumplimiento+"'";
        tempData+="selected";
        tempData+=">"+value.clave_cumplimiento+"</option>";
    });
    tempData += '</select>';

    
    $("#contenidomodal").html(tempData);
    $("#loader").hide();
}


