$(function()
{
    $("#TAREA").keyup(function()
    {
        var valueTarea=$(this).val();
        verificarExiste(valueTarea,"tarea");
    });
    $("#btn_crearTarea").click(function()
    {
        tareaDatos=new Object();
        tareaDatos.referencia = $("#REFERENCIA").val();
        tareaDatos.tarea = $("#TAREA").val();
        tareaDatos.id_empleado = $("#ID_EMPLEADOMODAL").val();
        tareaDatos.fecha_creacion = $("#FECHA_CREACION").val();
        tareaDatos.fecha_alarma = $("#FECHA_ALARMA").val();
        tareaDatos.fecha_cumplimiento = $("#FECHA_CUMPLIMIENTO").val();
        tareaDatos.status_tarea = $("#STATUS_TAREA").val();
        tareaDatos.observaciones = $("#OBSERVACIONES").val();
        tareaDatos.archivo_adjunto = $('#fileupload').fileupload('option', 'url');
        tareaDatos.mensaje="Se le asigno la tarea: "+$("#TAREA").val()+" por el Usuario: ";
        tareaDatos.reponsable_plan= $("#ID_EMPLEADOMODAL").val();
        tareaDatos.tipo_mensaje= 0;
        tareaDatos.atendido= 'false';
        listo=
            (
//                tareaDatos.referencia!=""?
                tareaDatos.tarea!=""?
                tareaDatos.id_empleado!=""?
                tareaDatos.fecha_creacion!=""?
                tareaDatos.fecha_alarma!=""?
                tareaDatos.fecha_cumplimiento!=""?
                tareaDatos.status_tarea!=""?
//                tareaDatos.observaciones!=""?
                true: false: false: false: false: false: false                                                               
            );
        
            listo ? insertarTareas(tareaDatos):swalError("Completar campos");
    });
    
    $("#btn_limpiarModalTarea").click(function()
    {
        $("#CONTRATO").val("");
        $("#TAREA").val("");
        $("#ID_EMPLEADOMODAL").val("");
        $("#FECHA_CREACION").val("");
        $("#FECHA_ALARMA").val("");
        $("#FECHA_CUMPLIMIENTO").val("");
        $("#OBSERVACIONES").val("");        
    });
    
    
    $("#subirArchivos").click(function()
    {
        agregarArchivosUrl();
    });
    
//    $("#btn_informe").click(function()
//    {
//        loadChartView(true);
//    });

    $("#BTN_ANTERIOR_GRAFICAMODAL").click(function()
    {
        activeChart = -1;
        graficar();
    });

    var $btnDLtoExcel = $('#toExcel'); 
    $btnDLtoExcel.on('click', function () 
    {
        __datosExcel=[];
        $.each(dataListado,function(index,value)
        {
            console.log("Entro al datosExcel");
            __datosExcel.push(reconstruirExcel(value,index+1));
        });
        DataGridExcel= __datosExcel;        
        $("#listjson").excelexportHibrido({
            containerid: "listjson"
            , datatype: 'json'
            , dataset: DataGridExcel
            , columns: getColumns(DataGridExcel)
        });
    });      

}); //CIERRA $(FUNCTION())



function inicializarFiltros()
{  
    return new Promise((resolve,reject)=>
    {
        filtros =[
                {id:"noneUno",type:"none"},
                {id:"referencia",type:"text"},
                {id:"tarea",type:"text"},
                {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
                {id:"fecha_creacion",type:"date"},
                {id:"fecha_alarma",type:"date"},
                {id:"fecha_cumplimiento",type:"date"},
                {id:"status_tarea",type: "combobox",descripcion:"descripcion",
                    data:[{"status_tarea":"1","descripcion":"En Proceso"},{"status_tarea":"2","descripcion":"Suspendido"},{"status_tarea":"3","descripcion":"Terminado"}]
                },
                {id:"observaciones",type:"text"},
                {id:"archivo_adjunto",type:"text"},
                {id:"registrar_programa",type:"text"},
                {id:"avance_programa",type:"text"},
                {id:"noneDos",type:"none"},
                {name:"opcion",id:"opcion",type:"opcion"}
        ];
        resolve();
    });    
}



function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        
    
        var __datos=[];
        $.ajax(
        {
            url:"../Controller/TareasController.php?Op=Listar&URL=Tareas/",
            type:"GET",
            beforeSend:function()
            {
                growlWait("Solicitud","Solicitando Datos...");
            },
            success:function(data)
            {
                if(typeof(data)=="object")
                {
                    growlSuccess("Solicitud","Registros obtenidos");
                    dataListado = data;
                    $.each(data,function(index,value)
                    {
                        __datos.push(reconstruir(value,index+1));
                    });
                    DataGrid = __datos;
                    gridInstance.loadData();
                    resolve();
                    
                }else{
                    growlSuccess("Solicitud","No Existen Registros");
                    reject();
                }
            },
            error:function()
            {
                growlError("Error","Error en el servidor");
                reject();
            }

        });
    });    
}


function reconstruir(value,index)
{
    tempData=new Object();
    ultimoNumeroGrid = index;
    tempData["id_principal"]= [{'id_tarea':value.id_tarea}];
    tempData["no"]= index;  
    tempData["referencia"]=value.referencia;
    tempData["tarea"]=value.tarea;
    tempData["id_empleado"]=value.id_empleado;
    tempData["fecha_creacion"]= getSinFechaFormato(value.fecha_creacion);
    tempData["fecha_alarma"]= getSinFechaFormato(value.fecha_alarma);
    tempData["fecha_cumplimiento"]= getSinFechaFormato(value.fecha_cumplimiento);
    tempData["status_tarea"]=value.status_tarea;
    tempData["observaciones"]=value.observaciones;
    tempData["archivo_adjunto"] = "<button onClick='mostrar_urls("+value.id_tarea+")' type='button' class='btn btn-info botones_vista_tabla' data-toggle='modal' data-target='#create-itemUrls'>";
    tempData["archivo_adjunto"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button>";
    if(value.existe_programa!=0)
        tempData["registrar_programa"]="<button id='btn_cargaGantt' class='btn btn-info botones_vista_tabla' onClick='cargarprogram("+value.id_tarea+")'>Vizualizar</button>";
    else
        tempData["registrar_programa"]="<button id='btn_cargaGantt' class='btn btn-info botones_vista_tabla' onClick='cargarprogram("+value.id_tarea+")'>Registrar</button>";
    tempData["avance_programa"]=(value.avance_programa*100).toFixed(2)+"%";
    
    if(value.archivosUpload[0].length==0 && value.existe_programa==0)
    {
        tempData["id_principal"].push({eliminar : 1});
    }else{
        tempData["id_principal"].push({eliminar : 0});
    }
    tempData["id_principal"].push({editar : 1});
    tempData["delete"]= tempData["id_principal"] ;
    
    return tempData;
}

function reconstruirExcel(value,index)
{
    tempData=new Object();
    tempData["No"]= index;  
    tempData["Referencia"]=value.referencia;
    tempData["Tarea"]=value.tarea;
    tempData["Responsable del Plan"]=value.nombre_completo;
    tempData["Fecha de Creacion"]= getSinFechaFormato(value.fecha_creacion);
    tempData["Fecha Alarma"]= getSinFechaFormato(value.fecha_alarma);
    tempData["Fecha de Cumplimiento"]= getSinFechaFormato(value.fecha_cumplimiento);
    if(value.status_tarea==1)
    {
        tempData["Status"]="En Proceso";
    }
    if(value.status_tarea==2)
    {
        tempData["Status"]="Suspendido";
    }
    if(value.status_tarea==3)
    {
        tempData["Status"]="Terminado";
    }
    tempData["Observaciones"]=value.observaciones;
//    tempData["archivo_adjunto"] = "<button onClick='mostrar_urls("+value.id_tarea+")' type='button' class='btn btn-info botones_vista_tabla' data-toggle='modal' data-target='#create-itemUrls'>";
//    tempData["archivo_adjunto"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button>";
//    tempData["registrar_programa"]="<button id='btn_cargaGantt' class='btn btn-info botones_vista_tabla' onClick='cargarprogram("+value.id_tarea+")'>Cargar Programa</button>";    
    tempData["Avance del Programa"]=(value.avance_programa*100).toFixed(2)+"%";
//    tempData["delete"]= [{"existe_programa":value.existe_programa,"existe_archivo":value.archivosUpload[0].length}];
    return tempData;
}


function archivoyComboboxparaModal()
{
  $('#DocumentolistadoUrl').html(" ");
  $('#DocumentolistadoUrlModal').html(" ");
  $('#DocumentoEntradaAgregarModal').html(ModalCargaArchivo);
  
  $.ajax({
      url:"../Controller/TareasController.php?Op=empleadosConUsuario",
      type:"GET",
      success:function(empleados)
      {
          tempData="";
          $.each(empleados,function(index,value)
          {
              tempData+="<option value='"+value.id_empleado+"'>"+value.nombre_completo+"</option>";
          }); 
          
          $("#ID_EMPLEADOMODAL").html(tempData);
      }
  });
  
  $('#fileupload').fileupload({
                url: '../View/'
        });
  
}

function insertarTareas(tareaDatos)
{
    console.log(tareaDatos);
    $.ajax({
        url:"../Controller/TareasController.php?Op=Guardar",
        type:"POST",
        data:"tareaDatos="+JSON.stringify(tareaDatos),
//        async:false,
        success:function(datos)
        {
//            alert("valor datos: "+datos);
//            console.log(datos);
            if(typeof(datos) == "object")
            {
                
//                console.log(datos);
                tempData;
                swalSuccess("Tarea Creada");                
                $.each(datos,function(index,value)
                {
                   tempData= reconstruir(value,ultimoNumeroGrid+1);  
//                   console.log(value.id_empleado); 
                });
                console.log(tempData);
                
                $("#jsGrid").jsGrid("insertItem",tempData).done(function()
                {
                    
                });
                dataListado.push(datos[0]),
                DataGrid.push(tempData),
                $("#crea_tarea .close ").click();
                mostrarTareasEnAlarma();
                mostrarTareasVencidas();
                
            } else{
                if(datos==0)
                {
                    swalError("Error, No se pudo crear la Tarea");                    
                } else{
                    swalInfo("Creado, Pero no listado, Actualice");
                }                
            }
            
        },
        error:function()
            {
                swalError("Error en el servidor");
            }
    });
}


function saveUpdateToDatabase(args)//listo
{
        columnas=new Object();
        id_afectado = args['item']['id_principal'][0];
        id_empleadoActual=args["item"]["id_empleado"];
        id_empleadoAnterior=args["previousItem"]["id_empleado"];
        tarea=args["item"]["tarea"];
        verificar = 0;
        $.each(args['item'],(index,value)=>
        {
                if(args['previousItem'][index]!=value && value!="")
                {
                        if(index!='id_principal' && !value.includes("<button") && index!="delete")
                        {
                                columnas[index]=value;
                        }
                }
        });
        
        if( Object.keys(columnas).length != 0 && verificar==0)
        {
            
            $.ajax({
                url:"../Controller/GeneralController.php?Op=Actualizar",
                type:"POST",
                data:'TABLA=tareas'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                beforeSend:()=>
                {
                        growlWait("Actualización","Espere...");
                },
                success:(data)=>
                {
                        if(data==1)
                        {
                            growlSuccess("Actulización","Se actualizaron los campos");
                            actualizarTarea(id_afectado.id_tarea);
                            
                            if(id_empleadoActual==id_empleadoAnterior)
                            {
                                enviarNotificacionWhenUpdate(id_empleadoActual,tarea);
                            } else{
                                if(id_empleadoActual!=id_empleadoAnterior)
                                {
                                    enviarNotificacionWhenRemoveTarea(id_empleadoAnterior,tarea);
                                    enviarNotificacionWhenRemoveTareaAlNuevoUsuario(id_empleadoActual,tarea);
                                }
                            }                                
                        }
                        else
                        {
                                growlError("Actualización","No se pudo actualizar");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
            });
        }
        else
        {
                componerDataGrid();
                gridInstance.loadData();
        }
}

function actualizarTarea(id_tarea)
{
        $.ajax({
                url:'../Controller/TareasController.php?Op=ListarTarea&URL=Tareas/',
                type: 'GET',
                data:'ID_TAREA='+id_tarea,
                success:function(datos)
                {
                        if(typeof(datos)=="object")
                        {
                            $.each(datos,function(index,value){
                                    componerDataListado(value);
                            });
                            componerDataGrid();
                            gridInstance.loadData();
                        }
                        else
                        {
                                growlError("Actualizar Vista","No se pudo actualizar la vista, refresque");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
        });
}

function componerDataListado(value)// id de la vista documento, listo
{
    id_vista = value.id_tarea;
    id_string = "id_tarea";
    $.each(dataListado,function(indexList,valueList)
    {
        $.each(valueList,function(ind,val)
        {
            if(ind == id_string)
                    ( val==id_vista) ? dataListado[indexList]=value : console.log();
        });
    });
}

function componerDataGrid()//listo
{
    __datos = [];
    $.each(dataListado,function(index,value){
        __datos.push(reconstruir(value,index+1));
    });
    DataGrid = __datos;
}

function listarEmpleados()
{
    $.ajax({
        url:"../Controller/EmpleadosController.php?Op=nombresCompletos",
        type:"GET",
        async:false,
        success:function(empleadosComb)
        {
            EmpleadosCombobox=empleadosComb;
        }
    });
    return EmpleadosCombobox;
}

function listarThisEmpleados()
{
    return new Promise((resolve,reject)=>
    {
        $.ajax(
            {
                url:"../Controller/TareasController.php?Op=responsableTarea",
                type:"GET",
                success:function(empleados)
                {
                    thisEmpleados = empleados;
                    resolve();
                    
                },
                error:function(er)
                {
                    reject(er);
                }

            });
    });
}




function verificarExiste(dataString,cualverificar)
{

$.ajax({
    url: "../Controller/TareasController.php?Op=verificarTarea&cualverificar="+cualverificar,
    type: "POST",
    data: "cadena="+dataString,
    success: function(data) 
    {    
        mensajeerror="";

        $.each(data, function (index,value) {
            mensajeerror=" La Tarea "+value.tarea+" Ya Existe";
        });
        $("#msgerrorTarea").html(mensajeerror);
        if(mensajeerror!=""){
            $("#msgerrorTarea").css("background","orange");
            $("#msgerrorTarea").css("width","190px");
            $("#msgerrorTarea").css("color","white");
            $("#btn_crearTarea").prop("disabled",true);
        }else{
            $("#btn_crearTarea").prop("disabled",false);
        }
    }
    })
}


function mostrar_urls(id_tarea)
{
        var tempDocumentolistadoUrl = "";
        URL = 'Tareas/'+id_tarea;
        $.ajax({
                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                type: 'GET',
                data: 'URL='+URL+'&SIN_CONTRATO=',
                async:false,
                success: function(todo)
                {
                        if(todo[0].length!=0)
                        {
                                tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                                $.each(todo[0], function (index,value)
                                {
                                        nametmp = value.split("^-O-^-M-^-G-^");
                                        fecha = new Date(nametmp[0]*1000);
                                        fecha = fecha.getDate() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                                        
                                        tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                        tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a></td>";
                                        tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                                        tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                                        tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
                                });
                                tempDocumentolistadoUrl += "</tbody></table>";
                        }
                        if(tempDocumentolistadoUrl == " ")
                        {
                                tempDocumentolistadoUrl = " No hay archivos agregados ";
                        }
                        tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id_tarea+"'>";
                        // alert(tempDocumentolistadoUrl);
                        $('#DocumentoEntradaAgregarModal').html(" ");
                        $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                        $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                        // $('#fileupload').fileupload();
                        $('#fileupload').fileupload({
                        url: '../View/',
                        });
                }
        });
}

var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
                ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
                ModalCargaArchivo += "<div class='fileupload-buttons'>";
                ModalCargaArchivo += "<span class='fileinput-button'>";
                ModalCargaArchivo += "<span><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
                ModalCargaArchivo += "<input type='file' name='files[]' multiple></span>";
                ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
                ModalCargaArchivo += "<div class='fileupload-progress' >";
                ModalCargaArchivo += "</div></div>";
                ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";
                

months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];


function agregarArchivosUrl()
{
        var ID_TAREA = $('#tempInputIdDocumento').val();
        url = 'Tareas/'+ID_TAREA,
        $.ajax({
                url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
                type: 'GET',
                data: 'URL='+url+'&SIN_CONTRATO=',
                success:function(creado)
                {
                    if(creado==true)
                        $('.start').click();
                },
                error:function()
                {
                        swalError("Error del servidor");
                }
        });
}


function borrarArchivo2(url)
{

        swal({
//                title: "ELIMINAR",
//                text: "Confirme para eliminar el Archivo",
//                type: "warning",
//                showCancelButton: true,
//                closeOnConfirm: false,
//                showLoaderOnConfirm: true
            title: "Eliminar",
            text: "¿Eliminar Pendiente?",
            type: "Warning",
            showCancelButton: true,
            // closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
                }, 
                function()
                {
                        var ID_TAREA = $('#tempInputIdDocumento').val();
                        $.ajax({
                                url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
                                type: 'GET',
                                data: 'URL='+url+'&SIN_CONTRATO=',
                                success: function(eliminado)
                                {
                                        // eliminar = eliminado;
                                        if(eliminado)
                                        {
                                                mostrar_urls(ID_TAREA);
                                                refresh();
                                                swal("","Archivo eliminado");
                                                setTimeout(function(){swal.close();},1000);
                                        }
                                        else
                                                swal("","Ocurrio un error al eliminar el archivo", "error");
                                },
                                error:function()
                                {
                                        swal("","Ocurrio un error al elimiar el archivo", "error");
                                }
                        });
                });
}


function borrarArchivo(url)
{
        swal({
                title: "",
                text: "¿Desea eliminar el Archivo?",
                type: "warning",
                showCancelButton: true,
                // closeOnConfirm: false,
                showLoaderOnConfirm: true,
//                confirmButtonText:'SI'
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar"
                }).then((res)=>
                {
                        if(res)
                        {
                                var ID_TAREA = $('#tempInputIdDocumento').val();
                                $.ajax({
                                        url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
                                        type: 'POST',
                                        data: 'URL='+url+'&SIN_CONTRATO=',
                                        beforeSend:()=>
                                        {
                                                growlWait("Eliminar Archivo","Eliminando Archivo...");
                                        },
                                        success: function(eliminado)
                                        {
                                                // eliminar = eliminado;
                                                if(eliminado)
                                                {
                                                        growlSuccess("Eliminar Archivo","Archivo Eliminado");
                                                        mostrar_urls(ID_TAREA);
                                                        actualizarTarea(ID_TAREA);
                                                        // swal("","Archivo eliminado");
                                                        setTimeout(function(){swal.close();},1000);
                                                }
                                                else
                                                        growlError("Error Eliminar","Ocurrio un error al eliminar el archivo");
                                        },
                                        error:function()
                                        {
                                                growlError("Error","Error en el servidor");
                                        }
                                });
                        }
                });
}


function preguntarEliminar(data)
{
//     console.log("jajaja",data);
    swal({
        title: "",
        text: "¿Desea Eliminar el Pendiente?",
        type: "warning",
        showCancelButton: true,
        // closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar"
        }).then((confirmacion)=>{
                if(confirmacion)
                {
                        eliminarTarea(data);
                }
        });
}

 function eliminarTarea(id_afectado)
 {
        $.each(dataListado,function(index,value)
        {
            if(value.id_tarea==id_afectado.id_tarea)
            {
                id_empleadoActual=value.id_empleado;
                tarea=value.tarea;
            }
        });
//        console.log(id_empleadoActual);
//        console.log(tarea);
        $.ajax({
                url:"../Controller/TareasController.php?Op=Eliminar",
                type:"POST",
                data:"ID_TAREA="+id_afectado.id_tarea,
                beforeSend:()=>
                {
                        growlWait("Eliminación Tarea","Eliminando...");
                },
                success:(res)=>
                {
                        // console.log(data);
                        if(res >= 0)
                        {
                                dataListadoTemp=[];
                                dataItem = [];
                                numeroEliminar=0;
                                itemEliminar={};
                                id = id_afectado.id_tarea;
                                $.each(dataListado,function(index,value)
                                {
                                        value.id_tarea != id ? dataListadoTemp.push(value) : (dataItem.push(value), numeroEliminar=index+1);
                                });
                                // console.log(dataListadoTemp);
                                // itemEliminar = reconstruir(dataItem[0],numeroEliminar);este esra para el eliminar directo en grid
                                DataGrid = [];
                                dataListado = dataListadoTemp;
                                if(dataListado.length == 0 )
                                        ultimoNumeroGrid=0;
                                $.each(dataListado,function(index,value)
                                {
                                        DataGrid.push( reconstruir(value,index+1) );
                                });

                                gridInstance.loadData();
                                growlSuccess("Eliminación","Registro Eliminado");
                                enviarNotificacionWhenDeleteTarea(id_empleadoActual,tarea);
                        }
                        else
                                growlError("Error Eliminación","Error al Eliminar Registro");
                },
                error:()=>
                {
                        growlError("Error Eliminación","Error del Servidor");
                }
        });
 }



function refresh()
{
   listarEmpleados();
   listarDatos();
   inicializarFiltros();
   construirFiltros();
   gridInstance.loadData();
//   $(".jsgrid-grid-body").css({"height":"171px"});
}


function enviarNotificacionWhenUpdate(id_empleado,tarea)

{
        $.ajax({
            url:"../Controller/TareasController.php?Op=enviarNotificacionWhenUpdate",
            data: "ID_EMPLEADO="+id_empleado+"&TAREA="+tarea,
            success:function(response)
            {
//            (response==true)?(
//                growlSuccess("Notificación","Se notifico del cambio")
//                // swalSuccess("Se notifico del cambio "),
//                //  refresh()
//                )
//            :growlError("Error Notificación","No se pudo notificar el cambio");
            
            },
            error:function()
            {
//            growlError("Error Notificación","Error en el servidor");
            // swalError("Error en el servidor");
            }
        });
}


function enviarNotificacionWhenRemoveTarea(id_empleadoAnterior,tarea)

{
        $.ajax({
            url:"../Controller/TareasController.php?Op=enviarNotificacionWhenRemoveTarea",
            data: "ID_EMPLEADO="+id_empleadoAnterior+"&TAREA="+tarea,
            success:function(response)
            {
            
            },
            error:function()
            {

            }
        });
}


function enviarNotificacionWhenRemoveTareaAlNuevoUsuario(id_empleadoActual,tarea)

{
        $.ajax({
            url:"../Controller/TareasController.php?Op=enviarNotificacionWhenRemoveTareaAlNuevoUsuario",
            data: "ID_EMPLEADO="+id_empleadoActual+"&TAREA="+tarea,
            success:function(response)
            {
            
            },
            error:function()
            {
                
            }
        });
}


function enviarNotificacionWhenDeleteTarea(id_empleadoActual,tarea)
{
    $.ajax({
            url:"../Controller/TareasController.php?Op=enviarNotificacionWhenDeleteTarea",
            data: "ID_EMPLEADO="+id_empleadoActual+"&TAREA="+tarea,
            success:function(response)
            {
            
            },
            error:function()
            {
                
            }
        });   
}

 function mostrarTareasEnAlarma()
 {
     $.ajax({
         url:"../Controller/NotificacionesTareasController.php?Op=tareasEnAlarma",
         type:"GET",
         success:function()
         {
             
         }
     });
 }
 
 
  function mostrarTareasVencidas()
 {
     $.ajax({
         url:"../Controller/NotificacionesTareasController.php?Op=tareasVencidas",
         type:"GET",
         success:function()
         {
             
         }
     });
 }


//area de gantt
function cargarprogram(value){    
    window.open("Gantt_TareasView.php?id_tarea="+value,'_blank');
}//finaliza area de gantt


//IniciaGrafica Informes
var a=0, b=0, c=0, d=0;
function obtenerDatos(bclose)
{
    a=0, b=0, c=0, d=0;   
   return new Promise(function(resolve,reject){ 
    $.ajax({
        url:"../Controller/TareasController.php?Op=datosGrafica",
        type:"GET",
        success:function(data)
        {                
            $.each(data,function(index,value)
            {
                if(value.status=="Tarea vencida")
                {
                  a++;   
                }
                if(value.status=="Alarma vencida")
                {
                  b++;   
                }
                if(value.status=="En tiempo")
                {
                  c++;   
                }
                if(value.status=="Suspendido")
                {
                  d++;   
                }
//                if(value.status=="Terminado")
//                {
//                  e++;   
//                }
            });
            resolve();
        }
    });
    
   });
//    
  

    
} //Finaliza Grafica Informes


//function loadChartView()
//{    
//    obtenerDatos().then(function ()
//    {
//        dibujarGrafica();
//    })
//}


//function dibujarGrafica(){
//    
//        google.charts.load("current", {packages:["corechart"]});
//    google.charts.setOnLoadCallback(drawChart);
//    
//    function drawChart() {
//        var data = google.visualization.arrayToDataTable([
//
//          ['Status', 'Cantidad'],
//          ['En proceso(En Tiempo)', c],
//          ['En proceso(Alarma Vencida)',b],
//          ['En proceso(Tiempo Vencido)', a],
//          ['Suspendido', d]
////          ['Terminado', e]
//        ]);
//
//        var options = {
//          title: 'Tareas',
//          is3D: true,
//          "width":660,
//          "height":340
//        };
//
//        var chart = new google.visualization.PieChart(document.getElementById('graficaTareas'));
//        chart.draw(data, options);
//    } 
//    
//}














