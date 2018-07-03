

function mostrarTareas()
{
    $.ajax
    ({
        url:'../Controller/TareasController.php?Op=Listar',
        type:'GET',
        beforeSend:function()
        {
            $('#loader').show();
        },
        success:function(datosTareas)
        {
            construirContenido(datosTareas);
        },
        error:function(error)
        {
            $('#loader').hide();
        }
    });
}






function construirContenido(datosTareas)
{
    cargaTodo=0;
    tempData="";
    
    $.each(datosTareas,function(index,value){
        tempData+= construirTable(value,cargaTodo); 
    });
    
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}


function construirTable(value,cargaTodo)
{
   tempData="";
   
   if(cargaTodo==0)
       tempData += "<tr id='registro_"+value.id_tarea+"'>"
       tempData += "<td class='celda' width='8%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','contrato',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.contrato+"</td>";
       tempData += "<td class='celda' width='8%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','tarea',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.tarea+"</td>";
       tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','id_empleado',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td>";
       tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','fecha_creacion',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.fecha_creacion+"</td>";
       tempData += "<td class='celda' width='8%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','fecha_alarma',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.fecha_alarma+"</td>";
       tempData += "<td class='celda' width='8%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','fecha_cumplimiento',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.fecha_cumplimiento+"</td>";
       tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','observaciones',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.observaciones+"</td>";
       
       tempData += "<td class='celda' width='8%' style='font-size: -webkit-xxx-large'><button class='btn btn-success' onClick=\"cargadePrograma("+value.id_tarea+","+value.tarea+"] ?>')\">Registrar</button></td>";
    
       tempData += "<td class='celda' width='8%' style='font-size: -webkit-xxx-large'><button onClick='mostrar_urls("+value.id_tarea+");'";
       tempData += "type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
       tempData += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button></td>";             
       
       tempData += "<td class='celda' width='7%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','avance_programa',"+value.id_tarea+",'id_tarea')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.avance_programa+"</td>";
       
    if(cargaTodo==0)
      tempData+="</tr>";
  
  return tempData;
    
}