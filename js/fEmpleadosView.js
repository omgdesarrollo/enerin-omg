filtros = 
[
    {'name':'Nombre','id':'nombre_empleado',type:'text'},
    {'name':'Apellido Paterno','id':'apellido_paterno',type:'text'},
    {'name':'Apellido Materno','id':'apellido_materno',type:'text'},
    {'name':'Categoria','id':'categoria',type:'text'},
    {'name':'Correo','id':'correo',type:'text'},
    {'name':'Fecha Creación','id':'fecha_creacion',type:'date'}
];

function construirFiltros()
{
    tempData = "";
    $.each(filtros,function(index,value)
    {
        if(value.type == "date")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width: auto;display:none;'>";
            tempData += "<input type='date' onChange='construirFiltroSelect(this,\""+value.id+"\")' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
        }
        if(value.type == "text")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
        }
        if(value.type == "combobox")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width:auto;display:none'>";
            tempData += construirFiltrosCombobox(value.data,value.id);
        }
    });
    $("#headerFiltros").append(tempData);
}

function construirFiltrosCombobox(datos,id)
{
    tempData="";
    tempData = "<select onChange='construirFiltrosComboboxSelect(this,\""+id+"\")' margin:2px;>";
    tempData += "<option value='-1'>Autoridad Remitente</option>";
    $.each(autoridades,function(index,value)
    {
            tempData += "<option value='"+value.id+"'>"+value.descripcion+"</option>";
    });
    tempData += "</select>";
    return tempData;
}

function construirFiltroSelect(Obj,id)
{
    val = $(Obj).val();
    if(val=="-1")
            $("#"+id).val("");
    else
            $("#"+id).val(val);
    filtroSupremo();
}

function construirGrid(__datos)
{
    console.log(__datos);
    $("#jsGrid").html("");
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
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
            {type:"control"}
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
                if(columnas!="")
                {
                        $.ajax({
                                url: '../Controller/GeneralController.php?Op=Actualizar',
                                type:'GET',
                                data:'TABLA=empleados'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                                success:function(exito)
                                {
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
        __datos.push(reconstruir(value,index));
    });
    construirGrid(__datos);
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

function insertarEmpleado()
{
    
}

function loadSpinner(){
        myFunction();
}