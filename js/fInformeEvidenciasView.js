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
}); //SE CIERRA EL $(FUNCTION())




parametroscheck={"validado":"false","no_validado":"false","sin_documento":"false"};

function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
            { id:"noneUno", type:"none"},
        //     { id: "tema",name:"Tema", type: "text"},
        //     { id: "registro",name:"Registro", type: "text"},
        //     { id: "frecuencia",name:"Frecuencia", type: "combobox",data:frecuenciaData,descripcion:"frecuencia"},
        //     { id: "clave_documento",name:"Clave Documento", type: "text"},
        //     { id: "fecha_creacion",name:"Fecha Creación", type: "date"},
        //     // { id: "adjuntar_evidencia",name:"Adjuntar Evidencia", type: "text"},
        //     { id:"noneDos", type:"none"},
        //     { id: "fecha_registro",name:"Fecha Registro", type: "date"},
        //     { id: "usuario",name:"Usuario", type: "text"},
        //     { id:"noneTres", type:"none"},
        //     { id:"noneCuatro", type:"none"},
        //     { id:"noneCinco", type:"none"},
        //     { id:"noneSeis", type:"none"},
        //     // { id: "accion_correctiva",name:"Accion Correctiva", type: "text"},
        //     // { id: "plan_accion",name:"Plan Accion", type: "text"},
        //     // { id: "desviacion",name:"Desviacion", type: "text"},
        //     // { id: "validacion",name:"Validacion", type: "text"},
        //     {name:"opcion",id:"opcion",type:"opcion"}
        //     // { id:"delete", name:"Opción", type:"customControl",sorting:""},
        { id: "tema",title:"Tema", type: "text"},
        { id: "tema_responsable",title:"Responsable del Tema",type:"text"},
        { id: "requisito",title:"Requisito", type: "text"},
        { id: "registro",title:"Registro", type: "text"},
        { id: "frecuencia",title:"Frecuencia", type: "combobox",data:frecuenciaData,descripcion:"frecuencia"},
        { id: "clave_documento",title:"Clave Documento", type: "text"},
        // { id: "documento_responsable",title:"Responsable Documento",type:"text"},
        { id: "fecha_creacion",title:"Fecha Evidencia", type: "date"},
        { id: "fecha_registro",title:"Fecha Registro", type: "none"},
        { id: "evidencia",title:"Evidencia", type: "none"},
        // { name: "usuario",title:"Usuario", type: "text", width:250, editing:false }
        // { name: "plan_accion",title:"Plan Accion", type: "text", width: 160, editing:false },
        { id: "desviacion",title:"Desviacion", type: "none"},
        { id: "accion_correctiva",title:"Accion Correctiva", type: "none"},
        { id: "avance_plan",title:"Avance del Plan", type: "text"},
        { id: "estatus",title:"Estatus", type: "combobox",data:estatusFiltro,descripcion:"estatus"},
        { id:"delete", name:"Opción", type:"opcion",sorting:""},
        ];
        resolve();
    });
}

    // $(function (){
//      alert("tene");
// $('#checkValidado').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//             alert("esta en "+$(this).is(':checked'));
//            parametroscheck["validado"]="false";
//            alert("validados");
//        }else{
//            alert("esta  "+$(this).is(':checked'));
            //  parametroscheck["validado"]=$(this).is(':checked');
//        }
//alert("checkeado  "+parametroscheck["validado"]);
    // cargar("validados");
//alert("d"+parametroscheck["validado"]+"  no validados  "+parametroscheck["no_validado"] );
    // });
    
// $('#checkNoValidado').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//        }
//alert("d");
// parametroscheck["no_validado"]=$(this).is(':checked');
//     cargar("novalidados");
//     });
    
// $('#checkSinDocumento').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//        }
//alert("d");
// parametroscheck["sin_documento"]=$(this).is(':checked');
//     cargar("sindocumento");
//     });
    
    
    // }); //CIERRA EL $(FUNCTION)
    
    
// function cargar(key){
//     switch (key) {
//         case "validados":

//         //        alert("entraste en validados");
//                 listarDatos();
//         break;
        
//         case "novalidados":
//             listarDatos();
//         //        alert("no validados");
//         break;
        
//         case "sindocumento":
//             listarDatos();
//         //        alert("sin documento");
//         break;
        
//         default:

//         break;
//     }
// }
// months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

function mostrar_urls(id_evidencia)
{
    var tempData=[];
    URL = 'filesEvidenciaDocumento/'+id_evidencia;
    // $.ajax({
    //     url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
    //     type: 'GET',
    //     data: 'URL='+URL,
    //     success:function(creado)
    //     {
    //     if(creado)
    //     {
            $.ajax({
            url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
            type: 'GET',
            data: 'URL='+URL,
            async:false,
            success: function(todo)
            {
                console.log(todo);
                if(todo[0].length!=0)
                {
                    // tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                    $.each(todo[0], function (index,value)
                    {
                        nametmp = value.split("^-O-^-M-^-G-^");
                        fecha = new Date(nametmp[0]*1000);
                        fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                        tempData["name"] = "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a>";
                        tempData["fecha"] = fecha;
                        // tempDocumentolistadoUrl += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                        // tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                        // tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button>";
                        // tempDocumentolistadoUrl += "</td></tr>";
                    });
                    // tempDocumentolistadoUrl += "</tbody></table>";
                }
                else
                {
                    tempData["name"] = " Sin archivo";
                    tempData["fecha"] = " ----------- ";
                }
                // $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
            }
            });
            console.log(tempData);
            return tempData;
        // }
        // else
        // {
        //     swal("Error en el servidor");
        // }
        // }
    // });
}

function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        URL = 'filesEvidenciaDocumento/';
        __datos=[];
        $.ajax({
            url: '../Controller/InformeEvidenciasController.php?Op=Listar',
            type: 'GET',
            data:"URL="+URL,
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
                    // console.log(__datos);
                    DataGrid = __datos;
                    gridInstance.loadData();
                    resolve();
                }
                else
                {
                    growlSuccess("Solicitud","No Existen Registros de Evidencias");
                    reject();
                }
            },
            error:function(e)
            {
                // console.log(e);
                growlError("Error","Error en el servidor");
                reject();
            }
        });
    });
}

function mostrarMensajes(msj,num)
{
    $("#areaMensaje").html(msj);
    if(num == 0)
        $("#myModalLabelMandarNotificacion").html("Desviación");
    else
        $("#myModalLabelMandarNotificacion").html("Acción Correctiva");
}

function reconstruir(value,index)
{
    noMsj = "<i class='fa fa-file-o' style='font-size: xx-large;color:#6FB3E0;cursor:pointer' aria-hidden='true'></i>";
    yesMsj = "<i class='ace-icon fa fa-file-text-o icon-animated-bell' style='font-size: xx-large;color:#02ff00;cursor:pointer' aria-hidden='true'></i>";
    ultimoNumeroGrid = index;
    tempData = new Object();
    
    tempData["no"] = ultimoNumeroGrid;
    tempData["id_principal"] = [];
    tempData["id_principal"].push({'id_evidencias':value.id_evidencias});
    
    tempData["tema"] = value.tema;
    tempData["tema_responsable"] = value.tema_responsable;

    //  tempData["requisito"] = "<span tooltiptext><span></span></span><p>"+value.requisito+"</p>";
    tempData["requisito"] = value.requisito;
//     "<div class='stat-item tooltip' data-stat='95' data-soft='Photoshop' data-color='#C0DCF1'>\n\
//        <span tooltiptext><span></span></span>\n\
//        <p>'Hola Mundo'</p>\n\
//      </div>";
//    tempData["requisito"] = "<td class='celda' width='10%' style='font-size: -webkit-xxx-large'><button type='button' class='btn btn-success'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
    tempData["registro"] = value.registro;
    tempData["frecuencia"] = value.frecuencia;

    tempData["clave_documento"] = value.clave_documento;
    tempData["documento_responsable"] = value.documento_responsable;

    if(value.archivosUpload[0].length != 0)
    {
            todoArchivo = value.archivosUpload[0][0].split("^-O-^-M-^-G-^");
            tempData["evidencia"] = "<a href='"+value.archivosUpload[1]+"' download='"+todoArchivo[1]+"'>"+todoArchivo[1]+"</a>";
            tempData["fecha_registro"] = getFechaStamp(todoArchivo[0]);
    }
    else
    {
        tempData["evidencia"] = "Sin Archivo";
        tempData["fecha_registro"] = "Sin Fecha";
    }
    tempData["fecha_creacion"] = getSinFechaFormato(value.fecha_creacion);

    tempData["desviacion"] = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;'";
    tempData["desviacion"] += "onClick='mostrarMensajes(\""+value.desviacion+"\",0);' data-toggle='modal'";
    if(value.desviacion=="")
        tempData["desviacion"] += "data-target='#MandarNotificacionModal'>"+noMsj+"</button>";
    else
        tempData["desviacion"] += "data-target='#MandarNotificacionModal'>"+yesMsj+"</button>";
    // value.desviacion;
    // tempData["accion_correctiva"] = value.accion_correctiva;
    tempData["accion_correctiva"] = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;'";
    tempData["accion_correctiva"] += "onClick='mostrarMensajes(\""+value.accion_correctiva+"\",1);' data-toggle='modal'";
    if(value.accion_correctiva=="")
        tempData["accion_correctiva"] += "data-target='#MandarNotificacionModal'>"+noMsj+"</button>";
    else
        tempData["accion_correctiva"] += "data-target='#MandarNotificacionModal'>"+yesMsj+"</button>";

    // tempData["avance_plan"]=(value.avance_plan*100).toFixed(2)+"%";
    tempData["avance_plan"] = value.avance_plan;
    tempData["estatus"] = value.estatus;
    // tempData["delete"] = [];
    tempData["delete"]=tempData["id_principal"];
    tempData["delete"].push({eliminar:0});
    tempData["delete"].push({editar:0});
    return tempData;
}


function reconstruirExcel(value,index)
{
    tempData = new Object();
    tempData["No"] = index;
    tempData["Tema"] = value.tema;
    tempData["Responsable del Tema"] = value.tema_responsable;
    tempData["Requisito"] = value.requisito;
    tempData["Registro"] = value.registro;
    tempData["Frecuencia"] = value.frecuencia;
    tempData["Clave del Documento"] = value.clave_documento;
    tempData["Fecha Evidencia"] = getSinFechaFormato(value.fecha_creacion);
    if(value.archivosUpload[0].length==0)
    {
        tempData["Fecha Registro"] ="";
        tempData["Evidencia"] ="No";        
    }else{
        $.each(value.archivosUpload[0],function(index2,value2){            
            nametmp = value2.split("^-O-^-M-^-G-^");
            fecha = getFechaStamp(nametmp[0]);
            
            tempData["Fecha Registro"] = fecha;
            tempData["Evidencia"] = "Si";   
        });        
    }
    tempData["Desviacion"] = value.desviacion;
    tempData["Accion Correctiva"] = value.accion_correctiva;
    tempData["Avance del Plan"] = value.avance_plan;
    tempData["Estatus"] = value.estatus;
    
    return tempData;
}


   
//    var listfunciones=[variablefunciondatos];
//    ajaxHibrido(datosParamAjaxValues,listfunciones); 
   
//        $("#jsGrid").jsGrid({
//         width: "100%",
//         height: "300px",
//         heading: true,
//         sorting: true,
//         paging: true,
 
//         data: __datos,
//         fields: [
//                 { name: "No", type: "text", width: 80, validate: "required" },
//                 { name: "Tema", type: "text", width: 150, validate: "required" },
//                 { name: "Requisitos", type: "text", width: 150, validate: "required" },
//                 { name: "Registros", type: "text", width: 150, validate: "required" },
// //                { name: "Clave del Documento",textField: "Clave documento", type: "text", width: 150, validate: "required" },
//                 { name: "Clave del Documento", type: "text", width: 200, validate: "required" },    
//                 { name: "Responsable del Documento", type: "text", width: 250, validate: "required" },
//                 { name: "Frecuencia", type: "text", width: 150, validate: "required" },
//                 { name: "Evidencia", type: "text", width: 150, validate: "required" },
//                 { name: "Fecha de Registro", type: "text", width: 150, validate: "required" },
//                 { name: "Desviacion", type: "text", width: 150, validate: "required" },
//                 { name: "Accion Correctiva", type: "text", width: 150, validate: "required" },
//                 { name: "Avance del Plan", type: "text", width: 150, validate: "required" },
//                 { name: "status", type: "text", width: 150, validate: "required" }
//         ]
//     });
// }


// function construirTable(datos)
// {
//     cargaTodo=0;
//     tempData="";
    
//     $.each(datos,function(index,value){
        
//             tempData += construir(value,cargaTodo);
//     });
    
// //    $.each(datos["info"],function(index,value){
// //        value["clave_cumplimiento"]=datos["detallesContrato"]["clave_cumplimiento"];
// //        value["cumplimiento"]=datos["detallesContrato"]["cumplimiento"];
// //            tempData += construir(value,cargaTodo);
// //    });
     
//     $("#datosGenerales").html(tempData);
//     $("#loader").hide();
// }


// function mostrarTemaResponsable(id_documento)
// {
//     ValoresTemaResponsable = "<table class='tbl-qa'>\n\
//                                 <tr>\n\
//                                     <th class='table-header'>Tema</th>\n\
//                                     <th class='table-header'>Responsable del Tema</th>\n\
//                                 </tr>\n\
//                                 <tbody>";
    
//     $.ajax({
//         url:'../Controller/InformeEvidenciasController.php?Op=MostrarTemayResponsable',
//         type:'POST',
//         data:'ID_DOCUMENTO='+id_documento,
//         success:function(datosTemaResponsable)
//         {
//             $.each(datosTemaResponsable,function(index,value){
//                 ValoresTemaResponsable+="<tr><td>"+value.no+"</td>" ;
//                 ValoresTemaResponsable+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
//             });
//                 ValoresTemaResponsable += "</tbody></table>";
//                 $('#TemayResponsableListado').html(ValoresTemaResponsable);
//         }
//     });
// }

// function mostrarRequisitos(id_documento)
// {
//         ValoresRequisitos = "<ul>";

//         $.ajax ({
//             url: "../Controller/InformeEvidenciasController.php?Op=MostrarRequisitosPorDocumento",
//             type: 'POST',
//             data: 'ID_DOCUMENTO='+id_documento,
//             success:function(datosRequisitos)
//             {
//                $.each(datosRequisitos,function(index,value){
                
//                 ValoresRequisitos+="<li>"+value.requisito+"</li>";                                       

//                });
//            ValoresRequisitos += "</ul>";     
//                $('#RequisitosListado').html(ValoresRequisitos);
//             }
//         });
// }

// function mostrarRegistros(id_documento)
// {
//  ValoresRegistros = "<ul>";

//  $.ajax ({
//      url:"../Controller/InformeEvidenciasController.php?Op=MostrarRegistrosPorDocumento",
//      type: 'POST',
//      data: 'ID_DOCUMENTO='+id_documento,
//      success:function(datosRegistros)
//      {
//          $.each(datosRegistros,function(index,value){
//             ValoresRegistros+="<li>"+value.registro+"</li>"; 
//          });

// ValoresRegistros += "</ul>";
//          $('#RegistrosListado').html(ValoresRegistros);
//      }
//  })
// }



// function loadSpinner(){
//         myFunction();
// }
var activeChart = -1;
var chartsCreados = [];
var chartsFunciones = [()=>{graficar()},(dataNextGrafica,concepto)=>{graficar2(dataNextGrafica,concepto)}];//checar como poner funciones en un arreglo
console.log(chartsFunciones);
function graficar()
{
    let validados = 0;
    let validados_data = [];
    let proceso = 0;
    let proceso_data = [];
    // let sin_asignar = 0;
    // let sin_asignar_data = [];

    // console.log(dataListado);
    $.each(dataListado,(index,value)=>{
        if(value.estatus == "EN PROCESO")
        {
            proceso++;
            proceso_data.push({id_tema:value.id_tema});
        }
        if(value.estatus == "VALIDADO")
        {
            validados++;
            validados_data.push({id_tema:value.id_tema});
        }
    });
    let dataGrafica = [
        // ["Sin Asignar",sin_asignar,">> Documentos:"+sin_asignar.toString(),JSON.stringify(sin_asignar_data)],
        ["Validados",validados,">> Evidencias:"+validados.toString(),JSON.stringify(validados_data)],
        ["En Proceso",proceso,">> Evidencias:"+proceso.toString(),JSON.stringify(proceso_data)]
    ];
    activeChart = -1;
    chartsCreados = [];
    let tituloGrafica = "VALIDACIÓN DE EVIDENCIAS";
    let bandera = 0;
    $.each(dataGrafica,function(index,value){
        if(value[1] != 0)
            bandera=1;
    });

    if(bandera == 0)
    {
        dataGrafica.push([ "NO EXISTEN DOCUMENTOS",1,"SIN DOCUMENTOS","[]"]);
        tituloGrafica = "NO EXISTEN DOCUMENTOS";
    }
    // console.log(JSON.parse(dataGrafica[1][3]));
    construirGrafica(dataGrafica,tituloGrafica);
    $("#BTN_ANTERIOR_GRAFICAMODAL").html("Recargar");
}

function construirGrafica(dataGrafica,tituloGrafica)//funcion sin cambio
{
    estructuraGrafica = chartEstructura(dataGrafica);
    opcionesGrafica = chartOptions(tituloGrafica);
    instanceGrafica = drawChart(dataGrafica,estructuraGrafica,opcionesGrafica);
    activeChart++;
    chartsCreados.push({grafica:instanceGrafica,data:estructuraGrafica});
}

function chartEstructura(dataGrafica)//funcion sin cambio
{
    // console.log(dataGrafica);
    data = new google.visualization.DataTable();
    data.addColumn('string', 'nombre');
    data.addColumn('number', 'valor');
    // if(tooltip!=0)
        data.addColumn({type:"string",role:"tooltip"});
    data.addColumn('string','datos');
    
    // if(dataGrafica.length != 0)
        data.addRows(dataGrafica);
    // else
    //     data.addRows([[ "NO HAY DATOS",1,"SIN DATOS",""]]);
    return data;
}

function chartOptions(tituloGrafica)//funcion sin cambio
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
        tooltip:{textStyle:{color:"#000000"},text:"none",isHtml:true},
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
        "width":800,
        "height":400
    };
    return options;
}

function drawChart(dataGrafica,data,options)//funcion sin cambio
{
    grafica = new google.visualization.PieChart(document.getElementById('graficaPie'));
    grafica.draw(data, options);
    if(dataGrafica[0][3]!="[]")
        google.visualization.events.addListener(grafica, 'select', selectChart);
    return grafica;
}

function selectChart()
{
    var select = chartsCreados[activeChart].grafica.getSelection()[0];
    if(select != undefined)
    {
        dataNextGrafica = chartsCreados[activeChart].data.getValue(select.row,3);
        concepto = chartsCreados[activeChart].data.getValue(select.row,0);
        chartsFunciones[activeChart+1](dataNextGrafica,concepto);
            // graficar2(dataNextGrafica,concepto);
        $("#BTN_ANTERIOR_GRAFICAMODAL").html("Anterior");
    }
}

function graficar2(temas,concepto)
{
    temas = JSON.parse(temas);
    // console.log(temas);
    let lista = [];
    let id_tema;
    let bandera = 0;
    let estatus = 0;
    let dataGrafica = [];

    $.each(temas,(index,value)=>{
        if(bandera==0)
        {
            id_tema = value.id_tema;
            lista.push(value);
        }
        bandera=1;
        if(value.id_tema != id_tema)
        {
            lista.push(value);
        }
        else
        {
            id_tema = value.id_tema;
        }
    });
    console.log(lista);
    // estatus = concepto == "Sin Asignar" ? 0 : concepto == "En Proceso" ? 1 : 2;
    tituloGrafica = concepto == "VALIDADO" ? "EVIDENCIAS VALIDADAS" : "EVIDENCIAS EN PROCESO";
    
    $.each(temas,(index,value)=>{
        s
    });

    // $.each(dataListado,(index,value)=>{
    //     if(value.estatus == concepto)
    //     {
    //         $.each(value.temas_responsables,(ind,val)=>{
    //             $.each(lista,(key,valor)=>{
    //                 if(valor.no_tema==val.no)
    //                 {
    //                     if(lista[key]["documentos"]!=undefined)
    //                         lista[key]["documentos"]++;
    //                     else
    //                         lista[key]["documentos"]=1;
    //                 }
    //             });
    //         });
    //     }
    // });
    $.each(lista,(index,value)=>{
        dataGrafica.push(["Tema: "+value.no_tema,value.documentos,">> Tema:\n"+value.nombre_tema+"\n>> Responsable:\n"+value.responsable_tema+"\n>> Documentos:"+value.documentos,"[]"]);
    });
    // console.log(dataGrafica);
    construirGrafica(dataGrafica,tituloGrafica);
}
