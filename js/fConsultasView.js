
// configuracionJgrowl = { pool:0, position:" bottom-right", sticky:true, corner:"0px",openDuration:"fast", closeDuration:"slow",theme:"",header:"",themeState:"", glue:"before"};
$(function()
{   
    var $btnDLtoExcel = $('#btn_exportar'); 
    $btnDLtoExcel.on('click', function () 
    {   
        reporteSeleccionado= $("#REPORTES").val();
//        console.log("valor reporte select: ",reporteSeleccionado);        
        __datosExcel=[]
        $.each(dataListado,function (index,value)
            {
                // console.log("Entro al datosExcel");
                if(reporteSeleccionado == 1)
                {
                    __datosExcel.push( reconstruirExcel(value,index+1) );
                }else{
                    if(reporteSeleccionado == 2)
                    {
                        __datosExcel.push( reconstruirExcelDetalles(value,index+1) );
                    }
                }                
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
}); //SE CIERRA EL $(FUNCTION())


function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
            { name: "Nombre Tema",id:"no_tema", type: "text" },
            { name: "Nombre Tema",id:"nombre_tema", type: "text" },
            { name: "Nombre Tema",id:"responsable_tema", type: "text" },
            { name: "Nombre Tema",id:"cumplimiento_tema", type: "none" },

            // { name: "Nombre Tema",id:"estado_tema", type: "combobox",data:[{estado_tema:1,descripcion:"ACTIVO"},{estado_tema:0,descripcion:"INACTIVO"}],descripcion:"descripcion"},
            { name: "Nombre Tema",id:"requisitos_tema", type: "none" },
            { name: "Nombre Tema",id:"requisitos_cumplidos", type: "none" },
            // { name: "Nombre Tema",id:"penalizacion", type: "combobox",data:[{penalizacion:"true",descripcion:"SI"},{penalizacion:"false",descripcion:"NO"}],descripcion:"descripcion"},

            // { name: "Nombre Tema",id:"cumplimiento_requisito", type: "none",},
            // { name: "Nombre Tema",id:"estado_requisito",type: "combobox",data:[
            //     {estado_requisito:"ATRASADO",descripcion:"ATRASADO"},
            //     {estado_requisito:"CUMPLIDO",descripcion:"CUMPLIDO"},
            //     {estado_requisito:"EN PROCESO",descripcion:"EN PROCESO"},
            //     {estado_requisito:"NO INICIADO",descripcion:"NO INICIADO"}
            // ],descripcion:"descripcion"},
            {name:"opcion",id:"opcion",type:"opcion"}
        ];
        resolve();
    });
}

function reconstruir(value,index)
{
    tempData = new Object();    
    if(value[0].cumplimiento_contrato!=undefined)
        $("#cumplimiento_contrato_show").html("% Cumplimiento General: "+value[0].cumplimiento_contrato.toFixed(2));
    tempData["id_principal"] = [{'id_tema':value[0].id_tema}];
    tempData["no_tema"] = value[0].no_tema;
    tempData["nombre_tema"] = value[0].nombre_tema;
    // tempData["id_responsable"] = value.id_responsable;
    tempData["responsable_tema"] = value[0].responsable_tema;
    tempData["cumplimiento_tema"] = value[0].cumplimiento_tema;
    tempData["requisitos_tema"] = value.length;
    tempData["requisitos_cumplidos"] = 0;

    $.each(value,(ind,val)=>
    {
        if(val["estado_requisito"] == "CUMPLIDO")
            tempData["requisitos_cumplidos"]++;
    });

    // tempData["estado_tema"] = value.estado_tema == 0 ? "INACTIVO" : "ACTIVO";
    // tempData["id_requisito"] = value.id_requisito;
    // tempData["requisito"] = value.requisito;
    // tempData["penalizacion"] = value.penalizacion == "true" ? "SI":"NO";
    // tempData["cumplimiento_requisito"] = value.cumplimiento_requisito;
    // tempData["estado_requisito"] = value.estado_requisito;
    tempData["delete"] = tempData["id_principal"];
    tempData["delete"].push({eliminar:0});
    tempData["delete"].push({editar:0});
    return tempData;
}

//function reconstruirExcel(value,index)
//{
////    console.log(value);
//    tempData = new Object();
//    tempData["No. Tema"] = value.no_tema;
//    tempData["Nombre Tema"] = value.nombre_tema;
//    tempData["Responsable del Tema"] = value.responsable_tema;
//    tempData["% Cumplimiento Tema"] = value.cumplimiento_tema;
//    tempData["Estado del Tema"] = value.estado_tema == 0 ? "INACTIVO" : "ACTIVO";
//    tempData["Requisito"] = value.requisito;
//    tempData["Penalizacion"] = value.penalizacion == "true" ? "SI":"NO";
//    tempData["% Cumplimiento Requisito"] = value.cumplimiento_requisito;
//    tempData["Estado Requisito"] = value.estado_requisito;
//  
//    return tempData;
//}

function reconstruirExcel(value,index)
{
//    console.log(value);
    tempData = new Object();
    tempData["No. Tema"] = value[0].no_tema;
    tempData["Nombre Tema"] = value[0].nombre_tema;
    tempData["Responsable del Tema"] = value[0].responsable_tema;
    tempData["% Cumplimiento Tema"] = value[0].cumplimiento_tema;
    tempData["Requisitos por Tema"] = value.length;
    tempData["Requisitos Cumplidos"]= 0;
    $.each(value,(ind,val)=>
    {
        if(val["estado_requisito"] == "CUMPLIDO")            
            tempData["Requisitos Cumplidos"]++;
    });
  
    return tempData;
}

function reconstruirExcelDetalles(value,index)
{
//    console.log(value);
    tempData = new Object();
    tempData["No. Tema"] = value[0].no_tema;
    tempData["Nombre Tema"] = value[0].nombre_tema;
    tempData["Responsable del Tema"] = value[0].responsable_tema;
    tempData["% Cumplimiento Tema"] = value[0].cumplimiento_tema;
    tempData["Requisitos por Tema"] = value.length;
    tempData["Requisitos Cumplidos"]= 0;
    $.each(value,(ind,val)=>
    {
        if(val["estado_requisito"] == "CUMPLIDO")            
            tempData["Requisitos Cumplidos"]++;
    });
    
    tempData["Registros"]= "";
    tempData["Frecuencia"]= "";
    tempData["Evidencias por Cumplir"]= "";
    tempData["Evidencias Cumplidas"]= "";
    $.each(value,(ind,val)=>
    {
        $.each(val['detalles_requisito'],(ind2,val2)=>
        {            
//            console.log("Resultado resta: ",EvidenciasPorCumplir);
            if(val2.id_registro==null)
            {
                tempData["Registros"] += "No";
                tempData["Frecuencia"] += "No";
                tempData["Evidencias por Cumplir"] += "No";
                tempData["Evidencias Cumplidas"] += "No";
            }else{
                tempData["Registros"] += "<li>"+val2.registro+"</li>";
                tempData["Frecuencia"] += "<li>"+val2.frecuencia+"</li>";
                if(val2.frecuencia== "TIEMPO INDEFINIDO")
                {
                    tempData["Evidencias por Cumplir"] += "<li>"+0+"</li>";
                }else{
                    EvidenciasPorCumplir=parseInt(val2.evidencias_realizar)-parseInt(val2.evidencias_validadas);
                    tempData["Evidencias por Cumplir"] += "<li>"+EvidenciasPorCumplir+"</li>";
                }                
                tempData["Evidencias Cumplidas"] += "<li>"+val2.evidencias_validadas+"</li>";

            }
        });
    });
    
    tempData["Estado del Requisito"]= "";
    $.each(value,(ind,val)=>
    {
        tempData["Estado del Requisito"]+= "<li>"+val.estado_requisito+"</li>";
    });    
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
    });
}

function graficar()
{
    let dataGrafica=[];
    let tituloGrafica = "CUMPLIMIENTO DE REQUISITOS";
    let bandera = 0;

    let requisitos_cumplidos = 0;
    let data_requisitos_cumplidos = [];

    let requisitos_procesos = 0;
    let data_requisitos_procesos = [];
    // let requisitos_proceso_sp = 0;
    // let proceso_sp_temas = [];

    // let requisitos_proceso_cp = 0;
    // let proceso_cp_temas = [];

    let requisitos_atrasados = 0;
    let data_requisitos_atrasados = [];
    // let requisitos_atrasados_cp = 0;
    // let atrasados_cp_temas = [];

    // let requisitos_atrasados_sp = 0;
    // let atrasados_sp_temas = [];

    // let no_iniciados=0;

    $.each(dataListado,function(index,value)
    {
        $.each(value,(ind,val)=>{
            if(val.estado_requisito == "ATRASADO")
            {
                requisitos_atrasados++;
                data_requisitos_atrasados.push(val);
            }

            if(val.estado_requisito == "CUMPLIDO")
            {
                requisitos_cumplidos++;
                data_requisitos_cumplidos.push(val);
            }

            if(val.estado_requisito == "EN PROCESO")
            {
                requisitos_procesos++;
                data_requisitos_procesos.push(val);
            }
        });
    });
    if(requisitos_cumplidos!=0)
        dataGrafica.push(["Cumplido",requisitos_cumplidos,">> Requisitos:"+requisitos_cumplidos.toString(),JSON.stringify(data_requisitos_cumplidos),2]);
    if(requisitos_atrasados!=0)
        dataGrafica.push(["Atrasado",requisitos_atrasados,">> Requisitos:"+requisitos_atrasados.toString(),JSON.stringify(data_requisitos_atrasados),1]);
    if(requisitos_procesos!=0)
        dataGrafica.push(["En proceso",requisitos_procesos,">> Requisitos:"+requisitos_procesos.toString(),JSON.stringify(data_requisitos_procesos),1]);
    
    $.each(dataGrafica,function(index,value){
        if(value[1] != 0)
            bandera=1;
    });
    if(bandera == 0)
    {
        dataGrafica.push([ "NO EXISTEN REQUISITOS",1,"SIN REQUISITOS","[]",0]);
        tituloGrafica = "NO EXISTEN REQUISITOS";
    }
    construirGrafica(dataGrafica,tituloGrafica);
}

function graficar2(datos,concepto)
{
    let atrasados = 0;
    let atrasados_penalizados = 0;
    let data_atrasados = [];
    let data_atrasados_penalizados = [];
    let tituloGrafica = "CUMPLIMIENTO ";
    let dataGrafica = [];

    datos = JSON.parse(datos);
    tituloGrafica += concepto.toUpperCase();
    $.each(datos,(index,value)=>{
        if(value.penalizacion == "true")
        {
            atrasados_penalizados++;
            data_atrasados_penalizados.push(value);
        }
        else
        {
            atrasados++;
            data_atrasados.push(value);
        }
    });

    if(atrasados!=0)
        dataGrafica.push([""+concepto,atrasados,">>"+concepto+":"+atrasados,JSON.stringify(data_atrasados),2]);
    if(atrasados_penalizados!=0)
        dataGrafica.push([concepto+" Penalizado",atrasados_penalizados,">>"+concepto+" Penalizado:"+atrasados_penalizados,JSON.stringify(data_atrasados_penalizados),2]);

    construirGrafica(dataGrafica,tituloGrafica);
}

function graficar3(datos,concepto)
{
    let tituloGrafica = "CUMPLIMIENTO POR TEMA";
    let lista = new Object();
    let evidencias_tema = 0;
    let dataGrafica = [];
    let estado;

    datos = JSON.parse(datos);
    if(concepto == "Cumplido")
    {
        estado = "CUMPLIDO";
        // tituloGrafica = "CUMPLIMIENTO REQUISITOS";
    }
    if(concepto == "En Proceso")
    {
        estado = "EN PROCESO";
        // tituloGrafica = "CUMPLIMIENTO REQUISITOS";
    }
    if(concepto == "En Proceso Penalizado")
    {
        estado = "EN PROCESO";
        penalizacion="true";
        // tituloGrafica = "CUMPLIMIENTO REQUISITOS";
    }
    if(concepto == "Atrasado")
    {
        estado = "ATRASADO";
        // tituloGrafica = "INCUMPLIMIENTO REQUISITOS";
    }
    if(concepto == "Atrasado Penalizado")
    {
        estado = "ATRASADO";
        penalizacion="true";
        // tituloGrafica = "INCUMPLIMIENTO PENALIZADOS REQUISITOS";
    }

    $.each(datos,(index,value)=>{
        if(lista[value.id_tema]==undefined)
            lista[value.id_tema]=[];
        lista[value.id_tema].push(value);
    });

    $.each(lista,(index,value)=>{
        evidencias_tema = 0;
        $.each(value,(ind,val)=>{
            $.each(val.detalles_requisito,(id,vl)=>{
                if(vl.id_registro != null)
                {
                    if(estado == "CUMPLIDO")
                    {
                        evidencias_tema+=parseInt(vl.evidencias_validadas);
                    }
                    if(estado == "EN PROCESO")
                    {
                        evidencias_tema+=parseInt(vl.evidencias_proceso);
                    }
                    if(estado == "ATRASADO")
                    {
                        evidencias_tema+=parseInt(vl.evidencias_realizar)-parseInt(vl.evidencias_validadas);
                    }
                }
            });
        });
        dataGrafica.push(["Tema: "+value[0].no_tema,value.length,
        ">> Tema:\n"+value[0].nombre_tema+" \n>> Responsable:\n"+value[0].responsable_tema+"\n>> Requisitos: "+value.length+"\n>> Evidencias:"+evidencias_tema, JSON.stringify(value),3]);
    });
    construirGrafica(dataGrafica,tituloGrafica);
}

function graficar4(datos,concepto)
{
    let lista = new Object();
    let dataGrafica = [];
    let bandera = 0;
    let requisitos = 0;
    let registros = 0;
    let registroTemp = [];
    let estado = "";
    let tituloGrafica = "REGISTROS";
    let id_registro;

    datos = JSON.parse(datos);
    
    $.each(datos,(index,value)=>{
        $.each(value.detalles_requisito,(ind,val)=>{
            if(val.id_registro != null)
            {
                dataGrafica.push(["Registro:\n"+val.registro,1, ">>Registro:"+val.registro+"\n>> Frecuencia:"+val.frecuencia ,"[]",-1]);
                bandera=1;
            }
        });
    });
    if(bandera == 0)
    {
        tituloGrafica = "NO EXISTEN REGISTROS";
        dataGrafica.push([ "NO EXISTEN REGISTROS",1,"SIN REGISTROS","[]",-1]);
    }
    construirGrafica(dataGrafica,tituloGrafica);
}

function refresh()
{
    inicializarFiltros().then((resolve2)=>
    {
        construirFiltros();
        listarDatos();
    },(error)=>
    {
        growlError("Error!","Error al construir la vista, recargue la página");
    });
}