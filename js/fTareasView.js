$(function()
{
    $("#btn_crearTarea").click(function()
    {
        tareaDatos=new Object();
        tareaDatos.contrato = $("#CONTRATO").val();
        tareaDatos.tarea = $("#TAREA").val();
        tareaDatos.id_empleado = $("#ID_EMPLEADOMODAL").val();
        tareaDatos.fecha_creacion = $("#FECHA_CREACION").val();
        tareaDatos.fecha_alarma = $("#FECHA_ALARMA").val();
        tareaDatos.fecha_cumplimiento = $("#FECHA_CUMPLIMIENTO").val();
        tareaDatos.observaciones = $("#OBSERVACIONES").val();
        
        listo=
            (
                tareaDatos.contrato!=""?
                tareaDatos.tarea!=""?
                tareaDatos.id_empleado!=""?
                tareaDatos.fecha_creacion!=""?
                tareaDatos.fecha_alarma!=""?
                tareaDatos.fecha_cumplimiento!=""?
                tareaDatos.observaciones!=""?
                true: false: false: false: false: false: false: false                                                               
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

}); //CIERRA $(function())

function inicializarFiltros()
{    
    filtros =[
            {id:"contrato",type:"text"},
            {id:"tarea",type:"text"},
            {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
            {id:"fecha_creacion",type:"date"},
            {id:"fecha_alarma",type:"date"},
            {id:"fecha_cumplimiento",type:"date"},
            {id:"observaciones",type:"text"},
            {id:"archivo_adjunto",type:"text"},
            {id:"registrar_programa",type:"text"},
            {id:"avance_programa",type:"text"},
            {name:"opcion",id:"opcion",type:"opcion"}
         ];    
}


function construirGrid()
{
//    jsGrid.fields.customControl = MyCControlField;
    db={
            loadData: function()
            {
                return DataGrid;
            },
        };
    
    $("#jsGrid").jsGrid({
        onInit: function(args)
        {
            gridInstance=args.grid;
            jsGrid.Grid.prototype.autoload=true;
        },
        onDataLoading: function(args)
        {
            loadBlockUi();
        },
        onDataLoaded:function(args)
        {
            $('.jsgrid-filter-row').removeAttr("style",'display:none');
        },
        
        width: "100%",
        height: "300px",
        autoload:true,
        heading: true,
        sorting: true,
        editing: true,
        paging: true,
        controller:db,
        pageLoading:false,
        pageSize: 5,
        pageButtonCount: 5,
        updateOnResize: true,
        confirmDeleting: true,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
//        filtering:false,
//        data: __datos,
        fields: 
        [
            { name: "id_principal",visible:false},
            { name: "contrato",title:"Contrato", type: "text", width: 80, validate: "required" },
            { name: "tarea",title:"Tarea", type: "text", width: 150, validate: "required" },
            { name: "id_empleado",title:"Responsable del Plan", type: "text", width: 150, validate: "required" },
            { name: "fecha_creacion",title:"Fecha de Creacion", type: "text", width: 150, validate: "required" },
            { name: "fecha_alarma",title:"Fecha de Alarma", type: "text", width: 150, validate: "required" },
            { name: "fecha_cumplimiento",title:"Fecha de Cumplimiento", type: "text", width: 150, validate: "required",editing: false},
            { name: "observaciones",title:"Observaciones", type: "text", width: 150, validate: "required" },
            { name: "archivo_adjunto",title:"Archivo Adjunto", type: "text", width: 150, validate: "required",editing:false },
            { name: "registrar_programa",title:"Registrar Programa", type: "text", width: 150, validate: "required",editing:false },
            { name: "avance_programa",title:"Avance Programa", type: "text", width: 150, validate: "required" },
            {name:"cancel", type:"control", }
        ],
        onItemUpdated: function(args)
        {
                console.log(args);
                columnas={};
                id_afectado=args["item"]["id_principal"][0];
                $.each(args["item"],function(index,value)
                {
                        if(args["previousItem"][index] != value && value!="")
                        {
                                if(index!="id_principal" && !value.includes("<button"))
                                {
                                        columnas[index]=value;
                                }
                        }
                });
                if(Object.keys(columnas).length!=0)
                {
                        $.ajax({
                                url: '../Controller/GeneralController.php?Op=Actualizar',
                                type:'GET',
                                data:'TABLA=tareas'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                                success:function(exito)
                                {
                                    $("#jsGrid").jsGrid("render").done(function()
                                    {
                                //                swalSuccess("Datos Cargados Exitosamente");
                                    });
                                    swal("","Actualizacion Exitosa!","success");
                                    setTimeout(function(){swal.close();},1000);
                                },
                                error:function()
                                {
                                    swal("","Error en el servidor","error");
                                    setTimeout(function(){swal.close();},1500);
                                }
                        });
                }
        }
    });
    
}


function listarDatos()
{
    __datos=[];
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/TareasController.php?Op=Listar";
    datosParamAjaxValues["type"]="GET";
    datosParamAjaxValues["async"]=false;
    
    var variablefunciondatos=function obtenerDatosServer(data)
    {
        dataListado = data;
        $.each(data,function(index,value)
        {
            __datos.push(reconstruir(value,index++));
        });
    }
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    DataGrid = __datos;
}


function reconstruirTable(_datos)
{
    __datos=[];
    $.each(_datos,function(index,value)
    {
        __datos.push(reconstruir(value,index++));
    });
    construirGrid(__datos);
}


function reconstruir(value,index)
{
    tempData=new Object();
    tempData["id_principal"]= [{'id_tarea':value.id_tarea}];
    tempData["contrato"]=value.contrato;
    tempData["tarea"]=value.tarea;
    tempData["id_empleado"]=value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
    tempData["fecha_creacion"]=value.fecha_creacion;
    tempData["fecha_alarma"]=value.fecha_alarma;
    tempData["fecha_cumplimiento"]=value.fecha_cumplimiento;
    tempData["observaciones"]=value.observaciones;
    tempData["archivo_adjunto"] = "<button onClick='mostrar_urls("+value.id_tarea+")' type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
    tempData["archivo_adjunto"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i>Mostrar</button>";
//    tempData["archivo_adjunto"]=value.archivo_adjunto;
    tempData["registrar_programa"]="<button id='btn_cargaGantt' class='btn btn-info' onClick='cargarprogram("+value.id_tarea+")'>Cargar Programa</button>";    
    tempData["avance_programa"]=value.avance_programa;
    return tempData;
}


function archivoyComboboxparaModal()
{
    
  $.ajax({
      url:"../Controller/EmpleadosController.php?Op=mostrarcombo",
      type:"GET",
      success:function(empleados)
      {
          tempData="";
          $.each(empleados,function(index,value)
          {
              tempData+="<option value='"+value.id_empleado+"'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</option>"
          }); 
          
          $("#ID_EMPLEADOMODAL").html(tempData);
      }
  });   
}


function insertarTareas(tareaDatos)
{
    $.ajax({
        url:"../Controller/TareasController.php?Op=Guardar",
        type:"POST",
        data:"tareaDatos="+JSON.stringify(tareaDatos),
        async:false,
        success:function(datos)
        {
//            alert(datos);
//            console.log(datos);
            if(datos==true)
            {
                tempData;
                swalSuccess("Tarea Creada");
                $.each(datos,function(index,value)
                {
                   tempData= reconstruir(value,index);  
                });
                
                $("#jsGrid").jsGrid("insertItem",tempData).done(function()
                {
                    $("#crea_tarea .close ").click();
                });
                
            } else{
                if(datos==false)
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



function listarEmpleados()
{
    $.ajax({
        url:"../Controller/EmpleadosController.php?Op=nombresCompletos",
        type:"GET",
        async:false,
        success:function(empleadosComb)
        {
            console.log(empleadosComb);
            EmpleadosCombobox=empleadosComb;
        }
    });
    return EmpleadosCombobox;
}


function mostrar_urls(id_tarea)
{
        var tempDocumentolistadoUrl = "";
        URL = 'Tareas/'+id_tarea;
        $.ajax({
                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                type: 'GET',
                data: 'URL='+URL,
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
                        tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id_documento_entrada+"'>";
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

function refresh()
{
   listarEmpleados();
   listarDatos();
   inicializarFiltros();
   construirFiltros();
   gridInstance.loadData();
}

function loadSpinner()
{
    myFunction();
}

function loadBlockUi()
{
    $.blockUI({message: '<img src="../../images/base/loader.GIF" alt=""/><span style="color:#FFFFFF"> Espere Por Favor</span>', css:
    { 
        border: 'none', 
        padding: '15px', 
        backgroundColor: '#000', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', 
        opacity: .5, 
        color: '#fff' 
    },overlayCSS: { backgroundColor: '#000000',opacity:0.1,cursor:'wait'} }); 
    setTimeout($.unblockUI, 2000);
}

//area de gantt

function cargarprogram(value){
    alert("d  "+value);
}


//finaliza area de gantt
