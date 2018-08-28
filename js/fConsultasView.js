
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
    var cumplidos_temas = [];

    var requisitos_proceso_sp = 0;
    var proceso_sp_temas = [];

    var requisitos_proceso_cp = 0;
    var proceso_cp_temas = [];

    var requisitos_atrasados_cp = 0;
    var atrasados_cp_temas = [];

    var requisitos_atrasados_sp = 0;
    var atrasados_sp_temas = [];

    var no_iniciados=0;
    
    
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
            {
                requisitos_atrasados_cp++;
                atrasados_cp_temas.push(value.no_tema);
            }
            else
            {
                requisitos_atrasados_sp++;
                atrasados_sp_temas.push(value.no_tema);
            }
        }
        if(value.estado_requisito == "CUMPLIDO")
        {
            requisitos_cumplidos++;
            cumplidos_temas.push(value.no_tema);
        }
        if(value.estado_requisito == "EN PROCESO")
        {
            if(value.penalizacion == "true")
            {
                requisitos_proceso_cp++;
                proceso_cp_temas.push(value.no_tema);
            }
            else
            {
                requisitos_proceso_sp++;
                proceso_sp_temas.push(value.no_tema);
            }
        }
        if(value.estado_tema == 0)
            no_iniciados++;
    });
    dataGrafica = [
        ["Cumplidos",requisitos_cumplidos," Cantidad: "+requisitos_cumplidos.toString(),JSON.stringify(cumplidos_temas)],
        ["En Proceso",requisitos_proceso_sp," Cantidad: "+requisitos_proceso_sp.toString(),JSON.stringify(proceso_sp_temas)],
        ["En Proceso Penalizados",requisitos_proceso_cp," Cantidad: "+requisitos_proceso_cp.toString(),JSON.stringify(proceso_cp_temas)],
        ["Atrasados",requisitos_atrasados_sp," Cantidad: "+requisitos_atrasados_sp.toString(),JSON.stringify(atrasados_sp_temas)],
        ["Atrasados Penalizados",requisitos_atrasados_cp," Cantidad: "+requisitos_atrasados_cp.toString(),JSON.stringify(atrasados_cp_temas)],
        // ["No Iniciados",no_iniciados],
    ];
    // console.log("requisitos = "+requisitos);
    // console.log("registros = "+registros);
    activeChart = -1;
    chartsCreados = [];
    construirGrafica(dataGrafica,'CUMPLIMIENTO DE REQUISITOS');
}

function construirGrafica(dataGrafica,tituloGrafica)
{
    estructuraGrafica = chartEstructura(dataGrafica);
    opcionesGrafica = chartOptions(tituloGrafica);
    instanceGrafica = drawChart(estructuraGrafica,opcionesGrafica);
    activeChart++;
    chartsCreados.push({grafica:instanceGrafica,data:estructuraGrafica});
}

function chartEstructura(dataGrafica)
{
    data = new google.visualization.DataTable();
    data.addColumn('string', 'nombre');
    data.addColumn('number', 'valor');
    // if(tooltip!=0)
        data.addColumn({type:"string",role:"tooltip"});
    data.addColumn('string','datos');    
        
    data.addRows(dataGrafica);
    return data;
}

function chartOptions(tituloGrafica)
{
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
        title: tituloGrafica,
        // tooltip:{textStyle:{color:"red"},text:"none"},
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
    return options;
}

function drawChart(data,options)
{
    grafica = new google.visualization.PieChart(document.getElementById('graficaPie'));
    grafica.draw(data, options);
    google.visualization.events.addListener(grafica, 'select', selectChart);
    return grafica;
}

// selectChart();

function selectChart()
{
    // var jsonObj = {};
    // console.log("S");
    // {
        var select = chartsCreados[activeChart].grafica.getSelection()[0];
        // console.log(select);
        if(select != undefined)
        {
            // str = data1.getFormattedValue(select[0].row,select[0].row);
            // console.log("1");
            dataNextGrafica = chartsCreados[activeChart].data.getValue(select.row,3);
            // console.log("2");
            // console.log(dataNextGrafica);
            concepto = chartsCreados[activeChart].data.getValue(select.row,0);
            // console.log("3");
            // console.log(dataNextGrafica);
            // console.log(concepto);
            // if(opcion_vista_grafica == 1)
            if(activeChart == 0)
            {
                graficar2(dataNextGrafica,concepto);
            }
            else
                if(activeChart != 2)
                    graficar3(dataNextGrafica,concepto);
            // if(activeChart == 1)
                
        }
    // });
}

$(function(){
    // $("#BTN_ANTERIOR_GRAFICAMODAL").click(function(){
        
    // });

    // $("#OPCION_GRAFICAMODAL").change(function()
    // {
    //     opcion_vista_grafica = $(this).val();
    // });
});

var activeChart = -1;
var chartsCreados = [];

function graficar2(temas,concepto)
{
    temas = JSON.parse(temas);
    var newArray = [];
    var lookupObject  = {};

    var requisitos = 0;
    var registros = 0;
    var temasTemp = [];
    var estado = "";
    var penalizacion=false;
    var tituloGrafica = "CUMPLIMIENTO REQUISITOS";

    if(concepto == "Cumplidos")
        estado = "CUMPLIDO";
    if(concepto == "En Proceso")
        estado = "EN PROCESO";
    if(concepto == "En Proceso Penalizados")
    {
        estado = "EN PROCESO";
        penalizacion=true;
    }
    if(concepto == "Atrasados")
        estado = "ATRASADO";
        tituloGrafica = "INCUMPLIMIENTO REQUISITOS";
    if(concepto == "Atrasados Penalizados")
    {
        estado = "ATRASADO";
        penalizacion=true;
        tituloGrafica = "INCUMPLIMIENTO PENALIZADOS REQUISITOS"
    }

    for(var i in temas)
    {
        lookupObject[temas[i]] = temas[i];
    }

    for(i in lookupObject)
    {
        newArray.push(lookupObject[i]);
    }
    contadorRequisitos=0;
    nombre_tema;
    contadorArreglo=-1;
    no_tema;
    bandera=1;
    bandera2=1;
    $.each(dataListado,function(index,value)
    {
        if(bandera == 1)
        {
            no_tema = value.no_tema;
            bandera=0;
        }
        if(no_tema != value.no_tema)
        {
            no_tema = value.no_tema;
            contadorRequisitos=0;
            bandera2 = 1;
        }
        $.each(temas,function(ind,val)
        {
            if(value.no_tema == val)
            {
                if(bandera2 == 1)
                {
                    temasTemp.push({no_tema:value.no_tema ,nombre:value.nombre_tema,responsable:value.responsable_tema,requisitos:""});
                    contadorArreglo++;
                    bandera2=0;
                }
                if(value.estado_requisito == "CUMPLIDO" && estado == "CUMPLIDO")
                    contadorRequisitos++;
                else
                {
                    if(value.estado_requisito == estado && value.penalizacion == penalizacion)
                        contadorRequisitos++;
                }
                temasTemp[contadorArreglo]["requisitos"] = contadorRequisitos;
            }
        });
    });
    console.log(temasTemp);
    dataGrafica = [];
    $.each(temasTemp,function(index,value)
    {
        dataGrafica.push([value.no_tema,value.requisitos, " Tema: "+value.nombre+" \n Responsable:"+value.responsable, JSON.stringify(value)]);
    });
    construirGrafica(dataGrafica,tituloGrafica);
}

function graficar3(temas,concepto)
{
    alert("porque?");
    temas = JSON.parse(temas);
    console.log(temas);
    var newArray = [];
    var lookupObject  = {};

    var requisitos = 0;
    var registros = 0;
    var registroTemp = [];
    var estado = "";
    var penalizacion=false;
    var tituloGrafica = "CUMPLIMIENTO EVIDENCIAS";

    if(concepto == "Cumplidos")
        estado = "CUMPLIDO";
    if(concepto == "En Proceso")
        estado = "EN PROCESO";
    if(concepto == "En Proceso Penalizados")
    {
        estado = "EN PROCESO";
        penalizacion=true;
    }
    if(concepto == "Atrasados")
    {
        estado = "ATRASADO";
        tituloGrafica = "INCUMPLIMIENTO EVIDENCIAS";
    }
    if(concepto == "Atrasados Penalizados")
    {
        estado = "ATRASADO";
        penalizacion=true;
        tituloGrafica = "INCUMPLIMIENTO PENALIZADOS EVIDENCIAS";
    }

    for(var i in temas)
    {
        lookupObject[temas[i]] = temas[i];
    }

    for(i in lookupObject)
    {
        newArray.push(lookupObject[i]);
    }

    contadorEvidencias=0;
    nombre_tema;
    contadorArreglo=-1;
    no_tema;
    bandera=1;
    bandera2=1;

    $.each(dataListado,function(index,value)
    {
        if(bandera == 1)
        {
            no_tema = value.no_tema;
            bandera=0;
        }
        if(no_tema != value.no_tema)
        {
            no_tema = value.no_tema;
            contadorEvidencias=0;
            bandera2 = 1;
        }
        $.each(temas,function(ind,val)
        {
            if(value.no_tema == val)
            {
                if(bandera2 == 1)
                {
                    
                    // console.log("tamaño de registros :" +value.detalles.length);
                    // contadorArreglo++;
                    bandera2=0;
                }
                if(value.estado_requisito == "CUMPLIDO" && estado == "CUMPLIDO")
                {
                    $.each(value.detalles,function(key,valor)
                    {
                        // if( valor.evidencias_validadas == valor.evidencias_realizar )
                        // {
                            contadorEvidencias = valor.evidencias_validadas;
                            registroTemp.push({nombre_registro:valor.registro,registros:contadorEvidencias});
                            contadorArreglo++;
                            
                        // }
                    });
                }
                else
                {
                    if(value.estado_requisito == "EN PROCESO" && value.penalizacion == penalizacion)
                    {
                        $.each(value.detalles,function(key,valor)
                        {
                            // if( valor.evidencias_validadas != valor.evidencias_realizar)
                                contadorEvidencias = valor.evidencias_proceso;
                                registroTemp.push({nombre_registro:valor.registro,registros:contadorEvidencias});
                    contadorArreglo++;
                                
                        });
                    }
                    if(value.estado_requisito == "ATRASADO" && value.penalizacion == penalizacion)
                    {
                        $.each(value.detalles,function(key,valor)
                        {
                            // if( valor.evidencias_proceso  0)
                                contadorEvidencias = valor.evidencias_realizar - evidencias_totales;
                                registroTemp.push({nombre_registro:valor.registro,registros:contadorEvidencias});
                    contadorArreglo++;
                                
                        });
                    }
                }
                // registroTemp[contadorArreglo]["registros"] = contadorEvidencias;
            }
        });
    });
    console.log(registroTemp);
    // dataGrafica = [];
    $.each(registroTemp,function(index,value)
    {
        dataGrafica.push([value.nombre_registro,value.registros, "Cantidad: "+value.registros.toString() , JSON.stringify(value)]);
    });
    construirGrafica(dataGrafica,tituloGrafica);
}