$(function()
{
    var $btnDLtoExcel = $('#toExcel'); 
    $btnDLtoExcel.on('click', function () 
    {   
        __datosExcel=[]
        $.each(dataListado,function (index,value)
            {
                console.log("Entro al datosExcel");
                __datosExcel.push( reconstruirExcel(value,index+1) );
            });
            DataGridExcel= __datosExcel;
//            console.log("Entro al excelexportHibrido");
        $("#listjson").excelexportHibrido({
            containerid: "listjson"
            , datatype: 'json'
            , dataset: DataGridExcel
            , columns: getColumns(DataGridExcel)
        });
    });      
    
    
}); //CIERRA EL $(FUNCTION())


function inicializarFiltros()
{    
    return new Promise((resolve,reject)=>
    {
        filtros =[
//                {id:"noneUno",type:"none"},
                {id:"no",type:"text"},
                {id:"nombre",type:"text"},
                {id:"descripcion",type:"text"},
                {id:"fecha_inicio",type:"date"},
                {name:"opcion",id:"opcion",type:"opcion"}
             ];
         resolve();
    });
}


function reconstruir(value,index)
{
    tempData = new Object();
//    tempData["id_principal"] = [{'id_tema':value.id_tema}],
//    tempData["no"]= index;
    tempData["no"] = value.no,
    tempData["nombre"] = value.nombre,
    tempData["descripcion"] = value.descripcion,
    tempData["fecha_inicio"] = value.fecha_inicio

    return tempData;
}

function reconstruirExcel(value,index)
{
    tempData = new Object();
    tempData["No"]= value.no;
    tempData["Tema"] = value.nombre,
    tempData["Descripcion"] = value.descripcion,
    tempData["Fecha de Inicio"] = value.fecha_inicio

    return tempData;
}

//function reconstruirExcel(value,index)
//{
//    tempData = new Object();
////    tempData["id_principal"] = [{'id_tema':value.id_tema}],
//    tempData["No"]= index;
//    tempData["Folio de Entrada"] = value.folio_entrada,
//    tempData["Autoridad Remitente"] = value.clave_autoridad,
//    tempData["Asunto"] = value.asunto,
//    tempData["Responsable del Tema"] = value.nombre_completo,
//    tempData["Fecha de Asignacion"] = getSinFechaFormato(value.fecha_asignacion),
//    tempData["Fecha Limite de Atencion"] = getSinFechaFormato(value.fecha_limite_atencion),
//    tempData["Fecha de Alarma"] = getSinFechaFormato(value.fecha_alarma),
//    tempData["Status"] = value.status_doc,
//    tempData["Condicion Logica"] = value.condicion
////    tempData["delete"] = "0";
//    return tempData;
//}

function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        var __datos=[];
        $.ajax({
            url:"../Controller/ControlTemasController.php?Op=Listar",
            type:"GET",
            beforeSend:function()
            {
                growlWait("Solicitud","Solicitando Datos...");
            },
            success:function(data)
            {
//                console.log(data);
                if(typeof(data)=="object")
                {
//                    console.log(data);
                    growlSuccess("Solicitud","Registros obtenidos");
                    dataListado = data;
                    $.each(data,function (index,value)
                    {
                        __datos.push( reconstruir(value,index+1) );
                    });
                    DataGrid = __datos;
                    gridInstance.loadData();                    
                    resolve();
                }
                else
                {
                    growlSuccess("Solicitud","No Existen Registros");
                    reject();
                }
            },
            error:function(e)
            {
                console.log(e);
                growlError("Error","Error en el servidor");
                reject();
            }
        });
        
    });
}