filtros = [
            {name:"ID del Contrato o Asignación",id:"clave_contrato",type:"text"},
            {name:"Region Fiscal",id:"region_fiscal",type:"text"},
            {name:"Ubicación del Punto de Medición",id:"ubicacion",type:"text"},
            {name:"Tag del Patin de Medición",id:"tag_patin",type:"text"},
            {name:"Tipo de Medidor",id:"tipo_medidor",type:"text"},
            {name:"Tag del Medidor",id:"tag_medidor",type:"text"},
            {name:"Clasificación del Sistema de Medición",id:"clasificacion",type:"text"},
            {name:"Tipo de Hidrocarburo",id:"hidrocarburo",type:"text"},
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
    $("#loader").hide();
}

function construirGrid(__datos)
{
    jsGrid.fields.customControl = MyCControlField;
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        heading: true,
        sorting: true,
        paging: true,
        data: __datos,
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
            // console.log(todo);
            // console.log(value);
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
    construirGrid(__datos);
}

function preguntarEliminar(data)
{
    console.log(data);
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

function refresh()
{
    construirFiltros();
    listarDatos();
}

function loadSpinner(){
        myFunction();
}
