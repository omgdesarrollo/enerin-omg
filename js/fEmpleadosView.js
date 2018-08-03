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
    console.log(__datos);
    $("#jsGrid").html("");
    $("#jsGrid").jsGrid({
        onInit: function(args)
        {
            // gridInstance=args;
            jsGrid.ControlField.prototype.editButton=true;
            // jsGrid.ControlField.prototype.deleteButton=false;
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
                entro=0;
                id_afectado=args["item"]["id_principal"][0];
                $.each(args["item"],function(index,value)
                {
                        if(args["previousItem"][index] != value && value!="")
                        {
                                if(index!="id_principal" && !value.includes("<button"))
                                {
                                        columnas[index]=value;
                                        entro=1;
                                }
                        }
                });
                if(entro!=0)
                {
                        $.ajax({
                                url: '../Controller/GeneralController.php?Op=Actualizar',
                                type:'GET',
                                data:'TABLA=empleados'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                                success:function(exito)
                                {
//                                    alert("d");
console.log("d");
                                        console.log(exito);
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
     datosParamAjaxValues["url"]="../Controller/EmpleadosController.php?Op=Listar";
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
        // __datos.push(reconstruir(value,index));
    });
    // $("#jsGrid").jsGrid("loadData");
    // construirGrid(__datos);
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
            url:'../Controller/EmpleadosController.php?Op=Guardar',
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
        if(value=="")
            return false;
    });
    return true;
}