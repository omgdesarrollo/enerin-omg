  var gridInstance;
$(function (){
    
    
    
});
function listarDatos()//listarDatos
{
    __datos=[];
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/ReportesController.php?Op=listar&data=2";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=true;
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
//    return 1;
}




function construirGridGenerador()
{
//    jsGrid.fields.customControl = MyCControlField;
        db=
        {
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
//            loadBlockUi();
               
        },
        onDataLoaded:function(args)
        {
//            $('.jsgrid-filter-row').removeAttr("style",'display:none');
        },
        width: "100%",
        height: "300px",
        autoload:true,
        heading: true,
        sorting: true,
//        sorter:true,
        paging: true,
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
                { name:"omgc1", title: "Fecha Produccion", type: "text", width: 150, validate: "required" },
                { name:"omgc2", title: "Presion", type: "text", width: 150, validate: "required" },
                { name:"omgc3", title: "Temperatura", type: "text", width: 150, validate: "required" },
                { name:"omgc4", title: "Produccion de Petroleo", type: "text", width: 150, validate: "required" },
                { name:"omgc5", title: "°AP(PETROLEO)I", type: "text", width: 150, validate: "required"},
                { name:"omgc6", title: "%S(PETROLEO)", type: "text", width: 150, validate: "required"},
                { name:"omgc7", title: "Sal", type: "text", width: 150, validate: "required" },
                { name:"omgc8", title: "%H20(PETROLEO)", type: "text", width: 150, validate: "required" },
                { name:"omgc9", title: "Produccion de condensado Medido Neto", type: "text", width: 190, validate: "required" },
                { name:"omgc10", title: "°API(CONDENSADO)", type: "text", width: 170, validate: "required" },
                { name:"omgc11", title: "%S(CONDENSADO)", type: "text", width: 170, validate: "required" },
                { name:"omgc12", title: "%H20(CONDENSADO)", type: "text", width: 180, validate: "required" },
                { name:"omgc13", title: "Produccion de gas medido", type: "text", width: 180, validate: "required" },
                { name:"omgc14", title: "Poder Calorifico de gas", type: "text", width: 180, validate: "required" },
                { name:"omgc15", title: "Peso Molecular de gas", type: "text", width: 150, validate: "required" },
                { name:"omgc16", title: "Energia de gas", type: "text", width: 150, validate: "required" },
                { name:"omgc17", title: "Eventos", type: "text", width: 150, validate: "required" }
//                { name:"omgc18", title: "Fecha Real Reporte", type: "text", width: 190, validate: "required" }               
//                { name:"delete", title:"Opción", type:"customControl" }
        ]
        
        
    });
}

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
    tempData["omgc1"] = value.omgc1;
    tempData["omgc2"] = value.omgc2;
    tempData["omgc3"] = value.omgc3;
    tempData["omgc4"] = value.omgc4;
    tempData["omgc5"] = value.omgc5;
    tempData["omgc6"] = value.omgc6;
    tempData["omgc7"] = value.omgc7;
    tempData["omgc8"] = value.omgc8;
    tempData["omgc9"] = value.omgc9;
    tempData["omgc10"] = value.omgc10;
    tempData["omgc11"] = value.omgc11;
    tempData["omgc12"] = value.omgc12;
    tempData["omgc13"] = value.omgc13;
    tempData["omgc14"] = value.omgc14;
    tempData["omgc15"] = value.omgc15;
    tempData["omgc16"] = value.omgc16;
    tempData["omgc17"] = value.omgc17;
//    tempData["omgc18"] = value.omgc18;
    tempData["delete"] = "1";
    return tempData;
}


