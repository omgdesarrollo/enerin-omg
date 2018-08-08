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

});


var dataListado=[];

function construirGrid(datosF)
{
    db={
        loadData: function(filter)
        {
            return listarDatos(datosF);
        },
        insertItem: function(item)
        {
            return item;
        }
    };
    window.db = db;
    
    $("#jsGrid").jsGrid({
        onInit: function(args)
        {
//            gridInstance=args;
//            jsGrid.ControlField.prototype.editButton=true;
//            jsGrid.ControlField.prototype.deleteButton=false;
            jsGrid.Grid.prototype.autoload=true;
        },
        onDataLoading: function(args)
        {
            $("#loader").show();
        },
        onDataLoaded:function(args)
        {
            $("#loader").hide();
        },
        onRefreshing: function(args) {
        },
        
        width: "100%",
        height: "300px",
        autoload:true,
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
        pageSize: 5,
        pageButtonCount: 5,
        controller:db,
        filtering:false,
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
            { name: "archivo_adjunto",title:"Archivo Adjunto", type: "text", width: 150, validate: "required" },
            { name: "registrar_programa",title:"Registrar Programa", type: "text", width: 150, validate: "required" },
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


function listarDatos(datosF)
{
    if(datosF==undefined)
    {
        $.ajax({
            url:"../Controller/TareasController.php?Op=Listar",
            type:"GET",
            async:false,
            success:function(datos)
            {
                dataListado= datos;
                d=reconstruirTab(datos);
            },
            error:function(error)
            {
                
            }
        });
        
    }else
    {
        d=reconstruirTab(datosF);        
    }
    return d;
}


function reconstruirTab(datos)
{
    __datos=[];
    $.each(datos,function(index,value){
        __datos.push(reconstruir(value,index++));
    });
    return __datos;
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
            if(typeof(datos) == "object")
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



function loadSpinner()
{
    myFunction();
}