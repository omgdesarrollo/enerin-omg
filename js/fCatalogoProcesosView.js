filtros = [
            {name:"ID del Contrato o Asignación",id:"clave_contrato",type:"text",width:150},
            {name:"Region Fiscal",id:"region_fiscal",type:"text",witdh:150},
            {name:"Ubicación del Punto de Medición",id:"ubicacion",type:"text",width:150},
            {name:"Tag del Patin de Medición",id:"tag_patin",type:"text",width:130},
            {name:"Tipo de Medidor",id:"tipo_medidor",type:"text",width:150},
            {name:"Tag del Medidor",id:"tag_medidor",type:"text",width:130},
            {name:"Clasificación del Sistema de Medición",id:"clasificacion",type:"text",width:150},
            {name:"Tipo de Hidrocarburo",id:"hidrocarburo",type:"text",width:150},
            {name:"opcion",id:"opcion",type:"opcion"}
        ];

function reconstruir(value,index)
{
    tempData = new Object();
    tempData["no"] = index;
    tempData["id_principal"] = [{"id_contrato":value.id_contrato}];
    tempData["region_fiscal"] = value.region_fiscal;
    tempData["clave_contrato"] = value.clave_contrato;
    tempData["ubicacion"] = value.ubicacion;
    tempData["tag_patin"] = value.tag_patin;
    tempData["tipo_medidor"] = value.tipo_medidor;
    tempData["tag_medidor"] = value.tag_medidor;
    tempData["clasificacion"] = value.clasificacion;
    tempData["hidrocarburo"] = value.hidrocarburo;
    tempData["delete"] = "1";
    return tempData;
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

var db={};

function construirGrid()
{
    jsGrid.fields.customControl = MyCControlField;
    db=
    {
        loadData: function()
        {
            return DataGrid;
        },
        // insertItem: function(item)
        // {
        //     return item;
        // },
    } 
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
        heading: true,
        sorting: true,
        paging: true,
        autoload:true,
        controller:db,
        pageLoading:false,
        pageSize: 10,
        pageButtonCount: 5,
        updateOnResize: true,
        confirmDeleting: true,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        fields: [
                { name:"id_principal", visible:false},
                { name:"clave_contrato", title: "ID del Contrato o Asignación", type: "text", width: 150, validate: "required" },
                { name:"region_fiscal", title: "Region Fiscal", type: "text", width: 150, validate: "required" },
                { name:"ubicacion", title: "Ubicación del Punto de Medición", type: "text", width: 150, validate: "required" },
                { name:"tag_patin", title: "Tag del Patin de Medición", type: "text", width: 130, validate: "required" },
                { name:"tipo_medidor", title: "Tipo de Medidor", type: "text", width: 150, validate: "required" },    
                { name:"tag_medidor", title: "Tag del Medidor", type: "text", width: 130, validate: "required" },
                { name:"clasificacion", title: "Clasificación del Sistema de Medición", type: "text", width: 150, validate: "required" },
                { name:"hidrocarburo", title: "Tipo de Hidrocarburo", type: "text", width: 150, validate: "required" },
                { name:"delete", title:"Opción", type:"customControl" }
        ]
    });
}

var MyCControlField = function(config)
{
    jsGrid.Field.call(this, config);
};
 
MyCControlField.prototype = new jsGrid.Field
({        
        css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
                console.log("haber cuando entra aqui");
                console.log(date1);
                console.log(date2);
        },
        itemTemplate: function(value,todo)
        {
            if(todo.delete=="no")
                return "";
            else
                return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button', type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
        },
        insertTemplate: function(value)
        {
        },
        editTemplate: function(value)
        {
        },
        insertValue: function()
        {
        },
        editValue: function()
        {
        }
});

function listarDatos()
{
    __datos=[];
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/CatalogoProcesosController.php?Op=listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    var variablefunciondatos=function obtenerDatosServer(data)
    {
        dataListado = data;
        $.each(data,function (index,value)
        {
            __datos.push( reconstruir(value,index++) );
        });
    }
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    DataGrid = __datos;
}

function preguntarEliminar(data)
{
    swal({
        title: "",
        text: "¿Eliminar Registro?",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
        },
        function(confirmacion)
        {
            if(confirmacion)
            {
                eliminarRegistro(data.id_principal[0].id_contrato);
            }
        });
}

function insertarRegistro(datos)
{
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=Guardar',
        type:'POST',
        data:'DATOS='+JSON.stringify(datos),
        success:function(exito)
        {
            if(exito==1)
            {
                swalSuccess("Registro Creado");
                //mandar a insertar al grid
            }
            else
            {
                swalError("Error al crear");
            }
        },
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
}

function buscarPorRegionFiscal(Obj)
{
    // $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").attr("disabled",true);
    // $("#INPUT_UBICACION_NUEVOREGISTRO").attr("disabled",true);
    val = $(Obj).val();
    if(val!="")
    {
        $.ajax({
            url:'../Controller/CatalogoProcesosController.php?Op=BuscarID',
            type:'GET',
            data:'CADENA='+val,
            success:function(datos)
            {
                if(typeof(datos)=="object")
                {
                    if(datos.length!=0)
                    {
                        tempData = "";
                        $.each(datos,function(index,value)
                        {
                            // datos = value.correo+"^_^"+value.nombre+"^_^"+value.categoria+"^_^"+value.id_empleado;
                            tempData += "<li role='presentation'><a role='menuitem' tabindex='-1'";
                            tempData += "onClick='seleccionarItem(\""+value.region_fiscal+"\")'>";
                            tempData += value.region_fiscal+"</a></li>";
                            // $("#INPUT_CONTRATO_NUEVOREGISTRO").val(value.clave_contrato);
                        });
                            // nombre = value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
                        $("#dropdownEvent").html(tempData);
                        
                        // $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").val(datos[0].region_fiscal);
                        // $("#INPUT_UBICACION_NUEVOREGISTRO").val(datos[0].ubicacion);
                        // $("#INPUT_CONTRATO_NUEVOREGISTRO").val(datos[0].clave_contrato);
                        // region_fiscal = datos[0].region_fiscal;
                        // ubicacion = datos[0].ubicacion;
                        // contrato = datos[0].clave_contrato;
                    }
                    else
                    {
                        // $("#INPUT_REGIONFISCAL_NUEVOREGISTRO").removeAttr("disabled");
                        // $("#INPUT_UBICACION_NUEVOREGISTRO").removeAttr("disabled");
                        // region_fiscal = "";
                        // ubicacion = "";
                        // contrato = "";
                    }
                }
                else
                {
                    swalError("Error al intentar comprar clave de contrato");
                }
            },
            error:function()
            {
                swalError("Error en el servidor");
            }
        });
    }
}

function refresh()
{
    listarDatos();
    gridInstance.loadData();
}

// function loadSpinner()
// {
//     myFunction();
// }

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

