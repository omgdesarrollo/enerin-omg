
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
        };
    
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
                {name:"no", title:"No",width:60,type:"text"},
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
            dataListado.push(datos);
            DataGrid.push(tempData);
            $("#jsGrid").jsGrid("insertItem",tempData);
        },
        error:function()
        {
            swalError("Error en el servidor al intentar agregar el registro a la vista");
        }
    });
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

function eliminarRegistro(id)
{
    $.ajax({
        url:'../Controller/CatalogoProcesosController.php?Op=EliminarRegistro',
        type:'GET',
        data:'ID_CONTRATO='+id,
        success:function(respuesta)
        {
            if(respuesta==-2)
            {
                swalInfo("No se puede eliminar, Ya esta en uso");
            }
            else
            {
                if(respuesta==1)
                    swalSuccess("Registro Eliminado");
                else
                    swalError("No se pudo eliminar");
            }
        },
        error:function()
        {
            swalError("Error en el servidor");
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

