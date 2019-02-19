// var instanciaG;
// configuracionJgrowl = { pool:0, position:" bottom-right", sticky:true, corner:"0px",openDuration:"fast", closeDuration:"slow",theme:"",header:"",themeState:"", glue:"before"};
// openDuration,closeDuration : slow, normal, fast

// inicializa el objeto de estructura de filtros
inicializarFiltros = ()=>
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
            {id:"noneUno", type:"none"},
            {name:"ID del Contrato o Asignación",id:"clave_contrato",type:"text"},
            {name:"Region Fiscal",id:"region_fiscal",type:"text"},
            {name:"Ubicación del Punto de Medición",id:"ubicacion",type:"text"},
            {name:"Tag del Patin de Medición",id:"tag_patin",type:"text"},
            {name:"Tipo de Medidor",id:"tipo_medidor",type:"text"},
            {name:"Tag del Medidor",id:"tag_medidor",type:"text"},
            {name:"Clasificación del Sistema de Medición",id:"clasificacion",type:"text"},
            {name:"Tipo de Hidrocarburo",id:"hidrocarburo",type:"text"},
            {name:"opcion",id:"opcion",type:"opcion"}
        ];
        resolve();
    });
}

// construye el objeto de la fila de la tabla (jsGrid)
reconstruir = (value,index)=>
{
    tempData = new Object();
    ultimoNumeroGrid = index;
    tempData["no"] = index;
    tempData["id_principal"] = [];
    tempData["id_principal"].push({"id_catalogoP":value.id_catalogoP});
    tempData["region_fiscal"] = value.region_fiscal;
    tempData["clave_contrato"] = value.clave_contrato;
    tempData["ubicacion"] = value.ubicacion;
    tempData["tag_patin"] = value.tag_patin;
    tempData["tipo_medidor"] = value.tipo_medidor;
    tempData["tag_medidor"] = value.tag_medidor;
    tempData["clasificacion"] = value.clasificacion;
    tempData["hidrocarburo"] = value.hidrocarburo;

    tempData["id_principal"].push({eliminar:1});
    tempData["id_principal"].push({editar:1});//si quieres que edite 1, si no 0

    tempData["delete"]=tempData["id_principal"];
    return tempData;
}

//function reconstruirTable(_datos)
//{
//    __datos=[];
//    $.each(_datos,function(index,value)
//    {
//        __datos.push(reconstruir(value,index++));
//    });
//    construirGrid(__datos);
//}

// lista registro de catalogo produccion y contruye el cuerpo de la tabla (jsGrid)
listarDatos = ()=>
{
    return new Promise((resolve,reject)=>{
        __datos=[];
        $.ajax({
            url:"../Controller/CatalogoProduccionController.php?Op=listar",
            type:"GET",
            async:true,
            beforeSend:()=>
            {
                growlWait("Solicitud","Solicitando Datos de Catalogo");
            },
            success:(data)=>
            {
                if(typeof(data)=="object")
                {
                    growlSuccess("Solicitud","Registros obtenidos");
                    dataListado = data;
                    $.each(data,(index,value)=>
                    {
                        __datos.push( reconstruir(value,index+1) );
                    });
                    DataGrid = __datos;
                    gridInstance.loadData();
                    resolve("si");
                }
                else
                {
                    growlSuccess("Solicitud","No Existen Registros");
                    reject("no");
                }
            },
            error:(e)=>
            {
                growlError("Error","Error en el servidor");
                reject("no");
            }
        });
    });
    
    // __datos=[];
    // datosParamAjaxValues={};
    // datosParamAjaxValues["url"]="../Controller/CatalogoProcesosController.php?Op=listar";
    // datosParamAjaxValues["type"]="GET";
    // datosParamAjaxValues["async"]=true;
    // var variablefunciondatos=function obtenerDatosServer(data)
    // {
    //     dataListado = data;
    //     $.each(data,function (index,value)
    //     {
    //         __datos.push( reconstruir(value,index+1) );
    //     });
    //     DataGrid = __datos;
    //     gridInstance.loadData();
    // }
    // var listfunciones=[variablefunciondatos];
    // ajaxHibrido(datosParamAjaxValues,listfunciones);
}

// lista un registro de catalogo produccion y agrega el registro a la tabla (jsGrid)
listarUno = (ID_insertado)=>
{
    $.ajax({
        url:'../Controller/CatalogoProduccionController.php?Op=listarUno',
        type:'GET',
        data:'ID_CONTRATO='+ID_insertado,
        success:(datos)=>
        {
            tempData = new Object();
            $.each(datos,(index,value)=>{
                tempData = reconstruir(value,ultimoNumeroGrid+1);
            });
            $("#jsGrid").jsGrid("insertItem",tempData).done(()=>{});
            dataListado.push(datos[0]);
            DataGrid.push(tempData);
            growlSuccess("Construir","Registro agregado a la vista");
        },
        error:()=>
        {
            growlError("Error","Error en el servidor al intentar agregar el registro a la vista");
            // swalError("Error en el servidor al intentar agregar el registro a la vista");
        }
    });
}

// ejecuta una pregunta para confirmar la eliminacion de un registro de catalogo producccion
preguntarEliminar = (data)=>
{
    // console.log(data);
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
        (confirmacion)=>
        {
            if(confirmacion)
            // {
                eliminarRegistro(data.id_catalogoP);
            // }
            // else
            // {
            // }
        });
        // return eliminarRegistro(data.id_principal[0].id_contrato);
}

// elimina el registro de catalogo produccion y reconstruye los datos en la tabla (jsGrid)
eliminarRegistro = (id)=>
{
    // val = true;
    $.ajax({
        url:'../Controller/CatalogoProduccionController.php?Op=EliminarRegistro',
        type:'GET',
        data:'ID_CONTRATO='+id,
        async:false,
        beforeSend:()=>
        {
            growlWait("Eliminación","Eliminando registro espere...");
        },
        success:(respuesta)=>
        {
            if(respuesta==-2)
            {
                swalInfo("No se puede eliminar, Ya esta en uso");
            }
            else
            {
                if(respuesta==1)
                {
                    dataListadoTemp=[];
                    dataItem = [];
                    numeroEliminar=0;
                    itemEliminar={};
            
                    $.each(dataListado,(index,value)=>
                    {
                        value.id_catalogoP != id ? dataListadoTemp.push(value) : (dataItem.push(value), numeroEliminar=index+1);
                        // JSON.stringify(value).indexOf( JSON.stringify(datos[0]) ) != -1 ? console.log() : dataListadoTemp.push(value);
                    });
                    // console.log(dataListado);
                    itemEliminar = reconstruir(dataItem[0],numeroEliminar);
                    // console.log(itemEliminar);
                    DataGrid = [];
                    dataListado = dataListadoTemp;
                    $.each(dataListado,(index,value)=>
                    {
                        DataGrid.push( reconstruir(value,index+1) );
                    });
                    gridInstance.loadData();
                    growlSuccess("Eliminación","Registro Eliminado");
                    swal.close();
                }
                else
                {
                    growlError("Error","No se pudo eliminar el registro");
                    swal.close();
                }
            }
        },
        error:()=>
        {
            growlError("Error","Error en el servidor al eliminar");
            swal.close();
        }
    });
    // return false;
}

// manda los datos para agregar un nuevo registro de catalogo produccion
insertarRegistro = (datos)=>
{
    $.ajax({
        url:'../Controller/CatalogoProduccionController.php?Op=Guardar',
        type:'POST',
        data:'DATOS='+JSON.stringify(datos),
        success:(exito)=>
        {
            if(exito!=-2 && exito!=-1)
            {
                listarUno(exito);
                swalSuccess("Registro Creado");
            }
            else
            {
                swalError("Error al crear");
            }
        },
        error:()=>
        {
            swalError("Error en el servidor");
        }
    });
}

// obtiene el objeto de los cambios, manda los datos para actualizar y reconstruye los datos en la tabla (jsGrid)
saveUpdateToDatabase = (args)=>//listo
{
    columnas=new Object();
    entro=0;
    id_afectado = args['item']['id_principal'][0];
    region_fiscalTemp = args['previousItem']['region_fiscal'];
    $.each(args['item'],(index,value)=>
    {
        if(args['previousItem'][index]!=value && value!="")
        {
            if(index!='id_principal' && !value.includes("<button") && index!="delete")
            {
                columnas[index]=value;
            }
        }
    });

    if( Object.keys(columnas).length != 0)
    {
        $.ajax({
            url:"../Controller/CatalogoProduccionController.php?Op=Actualizar",
            type:"POST",
            data:'TABLA=catalogo_reporte'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado)+"&REGION="+region_fiscalTemp,
            beforeSend:()=>
            {
                growlWait("Actualización","Espere...");
            },
            success:(data)=>
            {
                if(typeof(data)=="object")
                {
                    growlSuccess("Actulización","Se actualizaron los campos");
                    $.each(data,(index,value)=>{
                        componerDataListado(value);
                    });
                    componerDataGrid();
                    gridInstance.loadData();
                }
                else
                    growlError("Actualización","No se pudo actualizar");
            },
            error:()=>
            {
                growlError("Error","Error del servidor");
            }
        });
    }
}

// sustituye uno de los registros de los datos de catalogo produccion (dataListado)
componerDataListado = (value)=>// id de la vista documento, listo
{
    id_vista = value.id_catalogoP;
    id_string = "id_catalogoP";
    $.each(dataListado,(indexList,valueList)=>
    {
        $.each(valueList,(ind,val)=>
        {
            if(ind == id_string)
                ( val==id_vista) ? dataListado[indexList]=value : console.log();
        });
    });
}

// recontruye los datos (DataGrid) para la tabla (jsGrid)
componerDataGrid = ()=>//listo
{
    __datos = [];
    $.each(dataListado,(index,value)=>{
        __datos.push(reconstruir(value,index+1));
    });
    DataGrid = __datos;
}

var RegionesFiscalesComboDhtml;
var contratoComboDhtml;
var ubicacionComboDhtml;

$(()=>{
    primera = true;
    RegionesFiscalesComboDhtml.attachEvent("onChange",(value, text)=>
    {
        if(primera)
        {
            region_fiscal=text;
            selectItemCombo(value,text);
            primera = false;
        }
        else
            primera = true;
    });
    
    // evento hecho porque la lista del objecto(HTML) del combo no se visualiza al estar en un modal
    RegionesFiscalesComboDhtml.attachEvent("onOpen",()=>
    {
        this.DOMlist.style.zIndex = 2000;
    });
});

// function mostrarComboDHTML()
// {
//     index = new Object();
//     index["z-index"] = 2000;
//     index.visibility = $(".dhxcombolist_material").css("visibility");
//     index.width = $(".dhxcombolist_material").css("width");
//     index.top = $(".dhxcombolist_material").css("top");
//     index.left = $(".dhxcombolist_material").css("left");
//     $(".dhxcombolist_material").css(index);
// }

selectItemCombo = (value,text)=>
{
    buscarPorRegionFiscal(text);
}

// realiza una busqueda de acuerdo a la region fiscal
buscarPorRegionFiscal = (cadena)=>
{
    datosDhtmlContrato=[];
    datosDhtmlUbicacion=[];
    $.ajax({
        url:'../Controller/CatalogoProduccionController.php?Op=BuscarID',
        type:'GET',
        data:'CADENA='+cadena,
        async:false,
        success:(datos)=>
        {
            if(typeof(datos)=="object")
            {
                $.each(datos,(index,value)=>
                {
                    if(index==0)
                    datosDhtmlContrato.push({value:index,text:value.clave_contrato});
                    if(value.ubicacion != null)
                    {
                        datosDhtmlUbicacion.push({value:index,text:value.ubicacion});
                    }
                });
            }
        },
        error:()=>
        {
            swalError("Error en el servidor");
        }
    });

    contratoComboDhtml.clearAll();
    contratoComboDhtml.addOption(datosDhtmlContrato);
    ubicacionComboDhtml.clearAll();
    ubicacionComboDhtml.addOption(datosDhtmlUbicacion);

    contratoComboDhtml.getOptionsCount()!=0 ?
    ( contratoComboDhtml.selectOption(0),contratoComboDhtml.disable(),clave_contrato = contratoComboDhtml.getSelectedText()) : (clave_contrato="",contratoComboDhtml.enable());
}

// realiza una busqueda de regiones fiscales
buscarRegionesFiscales = ()=>
{
    return new Promise((resolve,reject)=>{
        datosDhtmlRegiones=[];
        $.ajax({
            url:'../Controller/CatalogoProduccionController.php?Op=BuscarRegionesFiscales',
            type:'GET',
            // async:false,
            success:(datos)=>
            {
                $.each(datos,(index,value)=>
                {
                    datosDhtmlRegiones.push({value:index,text:value.region_fiscal});
                });
                RegionesFiscalesComboDhtml.clearAll();
                RegionesFiscalesComboDhtml.addOption(datosDhtmlRegiones);
                resolve();
            },
            error:()=>
            {
                swalError("Error en el servidor");
                reject();
            }
        });
    });
}

// reinica valores y refresca datos de la vista
refresh = ()=>
{
    $("#btnrefrescar").attr("disabled",true);
    promesaBuscarRegionesFiscales = buscarRegionesFiscales();
    promesaBuscarRegionesFiscales.then((resolve)=>{
        inicializarFiltros();
        listarDatosPromesa = listarDatos();
        listarDatosPromesa.then((result)=>
        {
            $("#btnrefrescar").removeAttr("disabled");
        },(error)=>{
            growlError("ERROR!","Error al intentar refrescar datos");
            $("#btnrefrescar").removeAttr("disabled");
        });
    },(error)=>{
        growlError("ERROR!","Error al intentar refrescar datos");
        $("#btnrefrescar").removeAttr("disabled");
    });

    // enviarWB();
}

// function loadBlockUi()
// {
//     $.blockUI({message: '<img src="../../images/base/loader.GIF" alt=""/><span style="color:#FFFFFF"> Espere Por Favor</span>', css:
//     { 
//         border: 'none', 
//         padding: '15px', 
//         backgroundColor: '#000', 
//         '-webkit-border-radius': '10px', 
//         '-moz-border-radius': '10px', 
//         opacity: .5, 
//         color: '#fff' 
//     },overlayCSS: { backgroundColor: '#000000',opacity:0.1,cursor:'wait'} }); 
//     setTimeout($.unblockUI, 2000);
// }

// function enviarWB()
// {
//     ws.send(JSON.stringify([{nombre:"jose"}]));
//     ws.close();
// }