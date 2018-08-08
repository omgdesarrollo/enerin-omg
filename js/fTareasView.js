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
    tempData["archivo_adjunto"]=value.archivo_adjunto;
    tempData["avance_programa"]=value.avance_programa;
    return tempData;
}






function loadSpinner()
{
    myFunction();
}