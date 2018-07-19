noArchivo=0;
months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
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
        tempData+= "<tr id='registro_"+value.id_tarea+"'>"+construirTable(value)+"</tr>";;
    });
    
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}

function construirTable(value)
{
    tempData="";
    URL = 'Tareas/'+value.id_tarea;
    $.ajax({
        url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
        type: 'GET',
        data: 'URL='+URL+"&SIN_CONTRATO=XD"
    });

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

    tempData += "<td class='celda' width='8%' style='font-size: -webkit-xxx-large'><button onClick='mostrar_urls("+value.id_tarea+");'";
    tempData += "type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
    tempData += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button></td>";

    tempData += "<td class='celda' width='8%' style='font-size: -webkit-xxx-large'><button class='btn btn-success' onClick=\"cargadePrograma("+value.id_tarea+","+value.tarea+"] ?>')\">Registrar</button></td>";
    
    tempData += "<td class='celda' width='7%' contenteditable='true' onBlur=\"saveToDatabase(this,'tareas','avance_programa',"+value.id_tarea+",'id_tarea')\"\n\
                    onkeyup=\"detectarsihaycambio()\">"+value.avance_programa+"</td>";

  return tempData;
}

var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='form-data'>";
    ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
    ModalCargaArchivo += "<div class='fileupload-buttons'>";
    ModalCargaArchivo += "<span class='fileinput-button'>";
    ModalCargaArchivo += "<span id='spanAgregarDocumento'><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
    ModalCargaArchivo += "<input type='file' name='files[]'></span>";
    ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
    ModalCargaArchivo += "<div class='fileupload-progress' >";
    // ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
    ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
    ModalCargaArchivo += "</div></div>";
    ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";

$(function()
{
    $("#subirArchivos").click(function()
    {
        agregarArchivosUrl();
    });
});

function mostrar_urls(id_tarea)
{
    var tempDocumentolistadoUrl = "";
    URL = 'Tareas/'+id_tarea;
    $.ajax({
        url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
        type: 'GET',
        data: 'URL='+URL+"&SIN_CONTRATO=XD",
        success:function(creado)
        {            
            if(creado)
            {
                $.ajax({
                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                type: 'GET',
                data: 'URL='+URL+"&SIN_CONTRATO=XD",
                success: function(todo)
                {
                    console.log(todo);
                    if(todo[0].length!=0)
                    {
                        tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                        $.each(todo[0], function (index,value)
                        {
                            nametmp = value.split("^-O-^-M-^-G-^");
                            fecha = new Date(nametmp[0]*1000);
                            fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                            
                            tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                            tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a></td><td>";
                            tempDocumentolistadoUrl += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                            tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                            tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button>";
                            tempDocumentolistadoUrl += "</td></tr>";
                        });
                        tempDocumentolistadoUrl += "</tbody></table>";
                    }
                    else
                    {
                        tempDocumentolistadoUrl = " No hay archivos agregados ";
                    }
                    tempDocumentolistadoUrl += "<input id='tempInputIdTarea' type='text' style='display:none;' value='"+id_tarea+"'>";
                    // tempDocumentolistadoUrl += "<input id='tempInputIdParaDocumento' type='text' style='display:none;' value='"+-1+"'>";
                    $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                    $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                    $('#fileupload').fileupload
                    ({
                        url: '../View/',
                    });
                }
                });
            }
            else
            {
                swal("","Error del servidor","error");
            }
        }
    });
}

function borrarArchivo(url,id_para)
{
    swal({
        title: "ELIMINAR",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    },function()
    {
        var ID_TAREA = $('#tempInputIdTarea').val();
        $.ajax({
        url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
        type: 'POST',
        data: 'URL='+url+"&SIN_CONTRATO=XD",
        success: function(eliminado)
        {
            if(eliminado)
            {
                mostrar_urls(ID_TAREA);
                // refresh();
                swal("","Archivo eliminado");
                setTimeout(function(){swal.close();},1000);
            }
            else
                swal("","Ocurrio un error al elimiar el documento", "error");
        },
        error:function()
        {
            swal("","Ocurrio un error al elimiar el documento", "error");
        }
        });
    });
}

function agregarArchivosUrl()
{
    var ID_TAREA = $('#tempInputIdTarea').val();
    URL = 'Tareas/'+ID_TAREA,
    $.ajax({
        url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
        type: 'GET',
        data: 'URL='+URL+"&SIN_CONTRATO=XD",
        success:function(creado)
        {
            if(creado)
                $('.start').click();
        },
        error:function()
        {
            swal("","Error del servidor","error");
        }
    });
}
