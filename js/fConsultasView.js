
// configuracionJgrowl = { pool:0, position:" bottom-right", sticky:true, corner:"0px",openDuration:"fast", closeDuration:"slow",theme:"",header:"",themeState:"", glue:"before"};



function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
            { name: "Nombre Tema",id:"no_tema", type: "text",},
            { name: "Nombre Tema",id:"nombre_tema", type: "text",},
            { name: "Nombre Tema",id:"responsable_tema", type: "text",},
            { name: "Nombre Tema",id:"cumplimiento_tema", type: "text",},

            { name: "Nombre Tema",id:"estado_tema", type: "combobox",data:[{estado_tema:1,descripcion:"INICIADO"},{estado_tema:0,descripcion:"NO INICIADO"}],descripcion:"descripcion"},

            { name: "Nombre Tema",id:"requisito", type: "text",},

            { name: "Nombre Tema",id:"penalizacion", type: "combobox",data:[{penalizacion:"true",descripcion:"SI"},{penalizacion:"false",descripcion:"NO"}],descripcion:"descripcion"},

            { name: "Nombre Tema",id:"cumplimiento_requisito", type: "text",},
            { name: "Nombre Tema",id:"estado_requisito",type: "combobox",data:[
                {estado_requisito:"ATRASADO",descripcion:"ATRASADO"},
                {estado_requisito:"CUMPLIDO",descripcion:"CUMPLIDO"},
                {estado_requisito:"EN PROCESO",descripcion:"EN PROCESO"},
                {estado_requisito:"NO INICIADO",descripcion:"NO INICIADO"}
            ],descripcion:"descripcion"},
            {name:"opcion",id:"opcion",type:"opcion"}
        ];
        resolve();
    });
}

function reconstruir(value,index)
{
    tempData = new Object();
    tempData["id_principal"] = [{'id_tema':value.id_tema}],
    tempData["no_tema"] = value.no_tema,
    tempData["nombre_tema"] = value.nombre_tema,
    tempData["id_responsable"] = value.id_responsable,
    tempData["responsable_tema"] = value.responsable_tema,
    tempData["cumplimiento_tema"] = value.cumplimiento_tema,
    tempData["estado_tema"] = value.estado_tema == 0 ? "NO INICIADO" : "INICIADO",
    tempData["id_requisito"] = value.id_requisito,
    tempData["requisito"] = value.requisito,
    tempData["penalizacion"] = value.penalizacion == "true" ? "SI":"NO",
    tempData["cumplimiento_requisito"] = value.cumplimiento_requisito,
    tempData["estado_requisito"] = value.estado_requisito,
    tempData["delete"] = "0";
    return tempData;
}

function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        __datos=[];
        $.ajax({
            url:"../Controller/ConsultasController.php?Op=Listar",
            type:"GET",
            beforeSend:function()
            {
                growlWait("Solicitud","Solicitando Datos...");
            },
            success:function(data)
            {
                if(typeof(data)=="object")
                {
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
        
    //     __datos=[];
    //     datosParamAjaxValues={};
    //     datosParamAjaxValues["url"]="../Controller/ConsultasController.php?Op=Listar";
    //     datosParamAjaxValues["type"]="POST";
    //     // datosParamAjaxValues["async"]=false;
    //     var variablefunciondatos=function obtenerDatosServer(data)
    //     {        
    //         $.each(data,function(index,value){
    // //          alert("Valores each: "+value);

    //             __datos.push({
    //                 "id_principal":[{'id_tema':value.id_tema}],
    //                 "no":value.no,
    //                 "nombre":value.nombre,
    // //                "Responsable del Documento":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno           
    //                 "id_empleado":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
    //                 "total_requisitos":value.total_requisitos,
    //                 "resultado":value.resultado,
    //                 "total_registros":value.total_registros,
                    
    //             })
    //         });
    //     }
    
    //     var listfunciones=[variablefunciondatos];
    //     ajaxHibrido(datosParamAjaxValues,listfunciones);
    
        // return __datos;
    });
}


// function construirGrid()
// {  
//     db={
//                 loadData: function(filter) {
// //                    console.log("Entro al loadData");
// //                    console.log(listarDatos(1));
//                         return listarDatos();
//               },
//                   insertItem: function(item) {
//                       return item;
//               },
//            } 
           
//     window.db = db; 
    
//     $("#jsGrid").jsGrid({
        
//         onInit: function(args){
//             gridInstance=args;
//                 jsGrid.ControlField.prototype.editButton=false;
//                 jsGrid.ControlField.prototype.deleteButton=false;
//                 jsGrid.Grid.prototype.autoload=true;
//         }, 
//         onDataLoading: function(args) {
//             $("#loader").show();
//         },
//         onDataLoaded:function(args){
//             $("#loader").hide();
//         },
//         onRefreshing: function(args) {
//         },
        
//         width: "100%",
//         height: "300px",
// //        editing: true,
//         heading: true,
//         sorting: true,
//         paging: true,
//         controller:db,
//         filtering:true,
// //        data: __datos,
//         fields: [
//                 { name: "id_principal",visible:false },
//                 { name: "no",title:"No.Tema", type: "text", width: 80, validate: "required" },
//                 { name: "nombre",title:"Tema", type: "text", width: 150, validate: "required" },
//                 { name: "id_empleado",title:"Responsable del Tema", type: "text", width: 150, validate: "required" },
// //                { name: "no",title:"No.Sub-Tema", type: "text", width: 150, validate: "required" },
// //                { name: "nombre",title:"Sub-Tema", type: "text", width: 150, validate: "required" },
//                 { name: "total_requisitos",title:"Requisito", type: "text", width: 150, validate: "required" },
//                 { name: "resultado",title:"Penalizacion", type: "text", width: 150, validate: "required" },
//                 { name: "total_registros",title:"Registro", type: "text", width: 150, validate: "required" },
//                  { name: "id_cumplimiento",title:"Cumplimiento", type: "text", width: 150, validate: "required" },
//                 {type:"control"}
//         ]
                
//     });
// }
function graficar()
{
    var requisitos = 0;
    var registros = 0;
    var evidencias_realizar = 0;
    var requisitos_cumplidos = 0;
    var requisitos_proceso_sp = 0;
    var requisitos_proceso_cp = 0;
    var requisitos_atrasados_cp = 0;
    var requisitos_atrasados_sp = 0;
    $.each(dataListado,function(index,value)
    {
        requisitos++;
        registros+=value.detalles.length;
        $.each(value.detalles,function(ind,val){
            evidencias_realizar += val.evidencias_realizar;
        });
        if(value.estado_requisito == "ATRASADO")
        {
            if(value.penalizacion == "true")
                requisitos_atrasados_cp++;
            else
                requisitos_atrasados_sp++;
        }
        if(value.estado_requisito == "CUMPLIDO")
        {
            requisitos_cumplidos++;
        }
        if(value.estado_requisito == "EN PROCESO")
        {
            if(value.penalizacion == "true")
                requisitos_proceso_cp++;
            else
                requisitos_proceso_sp++;
        }
    });
    dataGrafica = [
        ["Cumplidos",requisitos_cumplidos],
        ["En Proceso",requisitos_proceso_sp],
        ["En Proceso Penalizados",requisitos_proceso_cp],
        ["Atrasados",requisitos_atrasados_sp],
        ["Atrasados Penalizados",requisitos_atrasados_cp],
    ];
    // console.log("requisitos = "+requisitos);
    // console.log("registros = "+registros);

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Pizza');
    data.addColumn('number', 'Populartiy');
    // data.addColumn({type:"string",role:"tooltip"})
    data.addRows(dataGrafica);

    var options = 
    {
        legend:{
                position:"labeled",alignment:"start",
                textStyle:
                {
                    color:"black", fontSize:14, bold:true
                }
            },
        pieSliceText:"none",
        // title: 'CUMPLIMIENTO DE REQUISITOS',
        tooltip:{textStyle:{color:"red"},text:"value"},
        // pieSliceText:"",
        titleTextStyle:{color:"black"},
        'is3D':true,
        slices: { 
            1: {offset: 0.02,color:"#80ffbf"},
            3: {offset: 0.02,color:"#bfff80"},
            0: {offset: 0.02,color:"#ffbf80"},
            4: {offset: 0.02,color:"#ff80bf"},
            2: {offset: 0.02,color:"#bf80ff"},
        },
        backgroundColor:"",
        "width":660,
        "height":340
    };

    var chart = new google.visualization.PieChart(document.getElementById('graficaPie'));
    chart.draw(data, options);
}

function drawChart()
{
    
}