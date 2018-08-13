
function inicializarFiltros()
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
}

function reconstruir(value,index)
{
    tempData = new Object();
    ultimoNumeroGrid = index;
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

//function reconstruirTable(_datos)
//{
//    __datos=[];
//    $.each(_datos,function(index,value)
//    {
//        __datos.push(reconstruir(value,index++));
//    });
//    construirGrid(__datos);
//}

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
            updateItem:function()
            {
                // console.log(a);
            }
        };
    
    $("#jsGrid").jsGrid({
        onInit: function(args)
        {
            gridInstance=args.grid;
            jsGrid.Grid.prototype.editButton=true;
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
        // rowClick:function(args)
        // {
            // console.log(args);
            // argsGlobal=args;
        // },
        // sortStrategies:function(a)
        // {
        //     console.log("A",a);
        // },
        width: "100%",
        height: "300px",
        autoload:true,
        heading: true,
        sorting: true,
        editing: true,
        // selecting: false,
    //    sorter:true,
        paging: true,
        controller:db,
        pageLoading:false,
        pageSize: 10,
        pageButtonCount: 5,
        updateOnResize: true,
        confirmDeleting: false,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        fields: [
                { name:"id_principal", visible:false},
                {name:"no", title:"No",width:60},
                { name:"clave_contrato", title: "ID del Contrato o Asignación", type: "text", width: 150, validate: "required"},
                { name:"region_fiscal", title: "Region Fiscal", type: "text", width: 150, validate: "required" },
                { name:"ubicacion", title: "Ubicación del Punto de Medición", type: "text", width: 150, validate: "required" },
                { name:"tag_patin", title: "Tag del Patin de Medición", type: "text", width: 130, validate: "required" },
                { name:"tipo_medidor", title: "Tipo de Medidor", type: "text", width: 150, validate: "required" },    
                { name:"tag_medidor", title: "Tag del Medidor", type: "text", width: 130, validate: "required" },
                { name:"clasificacion", title: "Clasificación del Sistema de Medición", type: "text", width: 150, validate: "required" },
                { name:"hidrocarburo", title: "Tipo de Hidrocarburo", type: "text", width: 150, validate: "required"},
                { name:"delete", title:"Opción", type:"customControl",sorting:""},
                // {type:"control",editButton: true}
        ],
        onItemDeleted:function(args)
        {
            // console.log("deleted");
            // console.log(args);
            // console.log(argsGlobal);
            // // if(preguntarEliminar(args.item))
            //     // args.cancel = true;
        },
        onItemDeleting:function(args)
        {
            // console.log("deleting");
            // console.log(args);
            // argsGlobal = args;
            // preguntarEliminar(args.item);
            // if(ifeliminar==0)
            // {
            //     args.cancel = true;
            //     ifeliminar=1;
            // }
            // else
            //     gridInstance.onItemDeleted(args);
            // args.cancel = preguntarEliminar(args.item);
                //  = true;
            // console.log("jajaja");
        }
        ,
        onItemUpdated:function(args)
        {
            console.log("aqui entro");
            saveUpdateToDatabase(args);
        },
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
            // return 1;
        },
        itemTemplate: function(value,todo)
        {
            if(todo.delete=="no")
                return "";
            else
                return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button ',title:"Eliminar", type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
        },
        insertTemplate: function(value)
        {
        },
        editTemplate: function(value)
        {
            // return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button', type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
            // return this._inputEditUpdate = $("<input>").attr( {class:'jsgrid-button jsgrid-update-button', type:'button',onClick:"alert();"});
            // return this._inputEditUpdate = $("<input>").attr( {class:'jsgrid-button jsgrid-cancel-edit-button', type:'button',onClick:"alert();"});
            val = "<input class='jsgrid-button jsgrid-update-button' type='button' title='Actualizar' onClick='aceptarEdicion()'>";
            val += "<input class='jsgrid-button jsgrid-cancel-edit-button' type='button' title='Cancelar Edición' onClick='cancelarEdicion()'>";
            return val;
        },
        insertValue: function()
        {
        },
        editValue: function()
        {
        }
});

function cancelarEdicion()
{
    $("#jsGrid").jsGrid("cancelEdit");
}

function aceptarEdicion()
{
    gridInstance.updateItem();
}

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
            __datos.push( reconstruir(value,index+1) );
        });
    }
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    DataGrid = __datos;
    return 1;
}

function listarUno(ID_insertado)
{
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=listarUno',
        type:'GET',
        data:'ID_CONTRATO='+ID_insertado,
        success:function(datos)
        {
            tempData = new Object();
            $.each(datos,function(index,value){
                tempData = reconstruir(value,ultimoNumeroGrid+1);
            });
            $("#jsGrid").jsGrid("insertItem",tempData).done(function(){});
            dataListado.push(datos[0]);
            DataGrid.push(tempData);
        },
        error:function()
        {
            swalError("Error en el servidor al intentar agregar el registro a la vista");
        }
    });
}

function preguntarEliminar(data)
{
    // valor = true;
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
            else
            {
            }
        });
        // return eliminarRegistro(data.id_principal[0].id_contrato);
}

function eliminarRegistro(id)
{
    // val = true;
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=EliminarRegistro',
        type:'GET',
        data:'ID_CONTRATO='+id,
        async:false,
        success:function(respuesta)
        {
            if(respuesta==-2)
            {
                swalInfo("No se puede eliminar, Ya esta en uso");
            }
            else
            {
                if(respuesta==1)
                {
                    
                    // listarDatos();
                    // $.ajax({
                    //     url:'../Controller/CatalogoProcesosController.php?Op=listarUno',
                    //     type:'GET',
                    //     data:'ID_CONTRATO='+id,
                    //     success:function(datos)
                        // {
                            // console.log("aqui");
                            dataListadoTemp=[];
                            dataItem = [];
                            numeroEliminar=0;
                            itemEliminar={};
                    //         tempData = new Object();
                    //         $.each(datos,function(index,value){
                    //             tempData = reconstruir(value,ultimoNumeroGrid+1);
                    //         });

                            // dataListado.push(datos);
                            // DataGrid.push(tempData);
                            $.each(dataListado,function(index,value)
                            {
                                value.id_contrato != id ? dataListadoTemp.push(value) : (dataItem.push(value), numeroEliminar=index+1);
                                // JSON.stringify(value).indexOf( JSON.stringify(datos[0]) ) != -1 ? console.log() : dataListadoTemp.push(value);
                            });
                            // console.log(dataListado);
                            itemEliminar = reconstruir(dataItem[0],numeroEliminar);
                            // console.log(itemEliminar);
                            DataGrid = [];
                            dataListado = dataListadoTemp;
                            $.each(dataListado,function(index,value)
                            {
                                DataGrid.push( reconstruir(value,index+1) );
                            });
                            // console.log(DataGrid);
                            // $("#jsGrid").jsGrid("deleteItem",$(".jsgrid-row jsgrid-selected-row"));

                            // console.log("final");
                            // val = false;
                            // argsGlobal.cancel = false;
                            // console.log(gridInstance.onItemDeleting());
                            swalSuccess("Registro Eliminado");
                            gridInstance.loadData();
                            // $("#jsGrid").jsGrid("insertItem",tempData);
                        // },
                        // error:function()
                        // {
                        //     swalError("Error en el servidor al intentar eliminar el registro de la vista");
                        // }
                    // });
                }
                else
                    swalError("No se pudo eliminar");
            }
        },
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
    // return false;
}

function insertarRegistro(datos)
{
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=Guardar',
        type:'POST',
        data:'DATOS='+JSON.stringify(datos),
        success:function(exito)
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
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
}

function saveUpdateToDatabase(args)
{
    console.log(args);
    columnas=new Object();
    entro=0;
    id_afectado = args['item']['id_principal'][0];
    region_fiscalTemp = args['previousItem']['region_fiscal'];
    $.each(args['item'],function(index,value)
    {
        if(args['previousItem'][index]!=value && value!="")
        {
            if(index!='id_principal' && !value.includes("<button"))
            {
                columnas[index]=value;
            }
        }
    });

    if( Object.keys(columnas).length != 0)
    {
        $.ajax({
            url:"../Controller/CatalogoProcesosController.php?Op=Actualizar",
            type:"POST",
            data:'TABLA=catalogo_reporte'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado)+"&REGION="+region_fiscalTemp,
            success:function(data)
            {
                if(data > 0 )
                {
                    swalSuccess("Actualizacion Exitosa!");
                    refresh();
                }
                else
                    swalError("No se puedo actualizar");
                // setTimeout(function(){swal.close();},1000);
            },
            error:function()
            {
                // swal("","Error en el servidor","error");
                // setTimeout(function(){swal.close();},1500);
            }
        });
    }
}

var RegionesFiscalesComboDhtml;
var contratoComboDhtml;
var ubicacionComboDhtml;
$(function(){
    primera = true;
    RegionesFiscalesComboDhtml.attachEvent("onChange", function(value, text)
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
    RegionesFiscalesComboDhtml.attachEvent("onOpen", function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
});

function mostrarComboDHTML()
{
    index = new Object();
    index["z-index"] = 2000;
    index.visibility = $(".dhxcombolist_material").css("visibility");
    index.width = $(".dhxcombolist_material").css("width");
    index.top = $(".dhxcombolist_material").css("top");
    index.left = $(".dhxcombolist_material").css("left");
    $(".dhxcombolist_material").css(index);
}

function selectItemCombo(value,text)
{
    buscarPorRegionFiscal(text);
}

function buscarPorRegionFiscal(cadena)
{
    datosDhtmlContrato=[];
    datosDhtmlUbicacion=[];
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=BuscarID',
        type:'GET',
        data:'CADENA='+cadena,
        async:false,
        success:function(datos)
        {
            $.each(datos,function(index,value)
            {
                if(index==0)
                datosDhtmlContrato.push({value:index,text:value.clave_contrato});
                datosDhtmlUbicacion.push({value:index,text:value.ubicacion});
            });
        },
        error:function()
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

function buscarRegionesFiscales()
{
    datosDhtml=[];
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=BuscarRegionesFiscales',
        type:'GET',
        async:false,
        success:function(datos)
        {
            $.each(datos,function(index,value)
            {
                datosDhtml.push({value:index,text:value.region_fiscal});
            });
        },
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
    RegionesFiscalesComboDhtml = new dhtmlXCombo({
        parent: "INPUT_REGIONFISCAL_NUEVOREGISTRO",
        width: 540,
        filter: true,
        name: "combo",
        index:"2000",
        items:datosDhtml,
    });
    contratoComboDhtml = new dhtmlXCombo({
        parent: "INPUT_CONTRATO_NUEVOREGISTRO",
        width: 540,
        filter: true,
        name: "combo",
        items:[],
    });
    contratoComboDhtml.attachEvent("onOpen",function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
    
    ubicacionComboDhtml = new dhtmlXCombo({
        parent: "INPUT_UBICACION_NUEVOREGISTRO",
        width: 540,
        filter: true,
        name: "combo",
        items:[],
    });
    ubicacionComboDhtml.attachEvent("onOpen",function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
}

function refresh()
{
    listarDatos();
    gridInstance.loadData();
}

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

