
$(function()
{
    $("#btn_crearEmpleado").click(function()
    {
        empleadoDatos=new Object();
        empleadoDatos.nombre_empleado = $("#NOMBRE_EMPLEADO").val();
        empleadoDatos.apellido_paterno = $("#APELLIDO_PATERNO").val();
        empleadoDatos.apellido_materno = $("#APELLIDO_MATERNO").val();
        empleadoDatos.categoria = $("#CATEGORIA").val();
        empleadoDatos.email = $("#CORREO").val();
        (checarVacio(empleadoDatos)) ? insertarEmpleado(empleadoDatos) : swalError("Completar campos");
    });

    $("#btn_limpiarEmpleado").click(function()
    {
        $("#NOMBRE_EMPLEADO").val("");
        $("#APELLIDO_PATERNO").val("");
        $("#APELLIDO_MATERNO").val("");
        $("#CATEGORIA").val("");
        $("#CORREO").val("");
    });

    $("#CORREO").keyup(function()
    {
        correo = $("#CORREO").val();
        $("#btn_crearEmpleado").attr("disabled",true);
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        correoEmail = regex.test(correo) ? true : false;
        if(correoEmail)
        {
            $.ajax({
                url:'../Controller/EmpleadosTareasController.php?Op=VerificaCorreo',
                type:'GET',
                data:'CORREO='+correo,
                success:function(disponible)
                {
                    if(disponible != 0)
                    {
                        swalError("Correo no disponible");
                        $("#CORREO").val(correo.slice(0,-1));
                        correoEmail=false;
                    }
                    else
                    // {
                        $("#btn_crearEmpleado").removeAttr("disabled");
                        // $.ajax({
                        //     url:'../Controller/EmpleadosController.php?Op=VerificaCorreoWeb',
                        //     type:'GET',
                        //     data:'CORREO='+correo,
                        //     success:function(exito)
                        //     {
                                
                        //     }
                        // });
                    // }
                },
                error:function()
                {
                    swalError("Error en el servidor");
                }
            });
        }
    });
}); //CIERRA EL (FUNCTION())


filtros = 
[
    {'name':'Nombre','id':'nombre_empleado',type:'text'},
    {'name':'Apellido Paterno','id':'apellido_paterno',type:'text'},
    {'name':'Apellido Materno','id':'apellido_materno',type:'text'},
    {'name':'Categoria','id':'categoria',type:'text'},
    {'name':'Correo','id':'correo',type:'text'},
    {'name':'Fecha Creación','id':'fecha_creacion',type:'date'},
    // {'name':'Autoridad','id':'id_autoridad',type:'combobox',data: consultarAutoridades() },
];
correoEmail=false;

function construirGrid(__datos)
{
    $("#jsGrid").html("");
    $("#jsGrid").jsGrid({
        onInit: function(args)
        {
            // gridInstance=args;
            jsGrid.ControlField.prototype.editButton=true;
             jsGrid.ControlField.prototype.deleteButton=false;
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
        width: "100%",
        height: "300px",
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
        pageSize: 5,
        pageButtonCount: 5,
        data: __datos,
        fields: 
        [
            { name: "id_principal",visible:false},
            { name: "nombre_empleado",title:"Nombre", type: "text", width: 80, validate: "required" },
            { name: "apellido_paterno",title:"Apellido Paterno", type: "text", width: 150, validate: "required" },
            { name: "apellido_materno",title:"Apellido Materno", type: "text", width: 150, validate: "required" },
            { name: "categoria",title:"Categoria", type: "text", width: 150, validate: "required" },
            { name: "correo",title:"Correo", type: "text", width: 150, validate: "required" },
            { name: "fecha_creacion",title:"Fecha Creacion", type: "text", width: 150, validate: "required",editing: false},
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
                                data:'TABLA=empleados'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                                success:function(exito)
                                {
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
    $("#loader").hide();
}

function listarDatos()
{
     __datos=[];
     datosParamAjaxValues={};
     datosParamAjaxValues["url"]="../Controller/EmpleadosTareasController.php?Op=Listar";
     datosParamAjaxValues["type"]="POST";
     datosParamAjaxValues["async"]=false;
     
     var variablefunciondatos=function obtenerDatosServer(data)
    {
        dataListado = data;
        $.each(data,function(index,value)
        {
            __datos.push( reconstruir(value,index) );
        });
    }
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);

    construirGrid(__datos);
    
}

function reconstruirTable(_datos)
{
    __datos=[];
    $.each(_datos,function(index,value)
    {
        __datos.push(reconstruir(value,index));
    });
    // $("#jsGrid").jsGrid("loadData");
    construirGrid(__datos);
    $("#loader").hide();
}

function reconstruir(value,index)
{
    tempData = new Object();
    tempData["id_principal"] = [{'id_empleado':value.id_empleado}];
    tempData["nombre_empleado"] = value.nombre_empleado;
    tempData["apellido_materno"] = value.apellido_materno;
    tempData["apellido_paterno"] = value.apellido_paterno;
    tempData["categoria"] = value.categoria;
    tempData["correo"] = value.correo;
    tempData["fecha_creacion"] = value.fecha_creacion;
    tempData["cancel"]=false;
    return tempData;
}

function componerDataListado(value)// id de la vista documento
{
    dataListado;
    id_vista = value.id_documento_entrada;
    id_string = "id_documento_entrada"
    $.each(dataListado,function(indexList,valueList)
    {
        $.each(valueList,function(ind,val)
        {
            if(ind == id_string)
                    ( val.indexOf(id_vista) != -1 ) ? ( dataListado[indexList]=value ):  console.log();
        });
    });
}

function insertarEmpleado(empleadoDatos)
{
    if(correoEmail)
    {
        $.ajax({
            url:'../Controller/EmpleadosTareasController.php?Op=Guardar',
            type:'POST',
            data:'EmpleadoDatos='+JSON.stringify(empleadoDatos),
            async:false,
            success:function(datos)
            {
                if( typeof(datos) == "object")
                {
                    tempData;
                    swalSuccess("Creado");
                    $.each(datos,function(index,value)
                    {
                        tempData = reconstruir(value,index);
                    });
                    $("#jsGrid").jsGrid("insertItem",tempData).done(function()
                    {
                        $("#crea_empleado .close ").click();
                    });
                }
                else
                {
                    if( datos == 0 )
                        swalError("Error, No se pudo crear");
                    else
                    {
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
    else
    {
        swalInfo("El correo no es correcto");
    }
}

function loadSpinner()
{
    myFunction();
}

function refresh()
{
    construirFiltros();
    listarDatos();
}

function checarVacio(datos)
{
    $.each(datos,function(index,value)
    {
        vacio=true;
        if(value=="")
            vacio=false;
    });
    return vacio;
}