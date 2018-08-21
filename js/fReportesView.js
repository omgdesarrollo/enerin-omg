
var RegionesFiscalesComboDhtml;
var contratoComboDhtml;
var ubicacionComboDhtml;
var tagPatinComboDhtml;
var tagMedidorComboDhtml;
var id_catalogop;
var valorCheckBox;

$(function (){
    
    $('#checkBoxPorcentaje').click(function() {
        valorCheckBox=$(this).is(':checked');
//        alert(valorCheckBox);
    });
    
    $("#btn_guardar_reportediario").click(function()
    {
        var FECHA_CREACION= $("#INPUT_FECHA_NUEVOREGISTRO").val();
        var ID_CATALOGOP=id_catalogop;
        var VALOR_CHECKBOX=valorCheckBox;
        
        alert("FECHA_CREACION: "+FECHA_CREACION+ "ID_CATALOGOP: "+ID_CATALOGOP+ "VALOR_CHECKBOX: "+VALOR_CHECKBOX);
        
        datos=[];
        datos.push(FECHA_CREACION);
        datos.push(ID_CATALOGOP);
        datos.push(VALOR_CHECKBOX);
        
        listo=
            (
               FECHA_CREACION!=""?
               ID_CATALOGOP!=""?
               true: false: false
            );
            
            alert("valor listo: "+listo);
           listo ?  insertarReporte(datos):swalError("Completar campos");
   
    });
    

    primera = true;
    RegionesFiscalesComboDhtml.attachEvent("onChange", function(value, text)
    {
//            alert("entro a RegionesFiscales: "+text);
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
    
    
    segunda = true;
    ubicacionComboDhtml.attachEvent("onChange", function(value, text)
    {
//            alert("entro a ubicacion: "+text);
        if(segunda)
        {
            ubicacion=text;
            selectItemComboUbicacion(value,text);
            segunda = false;
        }
        else
            segunda = true;
    });
    
    ubicacionComboDhtml.attachEvent("onOpen", function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
    
    
    tercera = true;
    tagPatinComboDhtml.attachEvent("onChange", function(value, text)
    {
//            alert("entro al TagPatin: "+text);
        if(tercera)
        {
            tag_patin=text;
            selectItemComboTagPatin(value,text);
            tercera = false;
        }
        else
            tercera = true;
    });
    
    tagPatinComboDhtml.attachEvent("onOpen", function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
    
    cuarta = true;
    tagMedidorComboDhtml.attachEvent("onChange", function(value, text)
    {
//            alert("entro al TagMedidor: "+text);
        if(cuarta)
        {
            tag_medidor=text;
            selectItemComboTagMedidor(value,text);
            cuarta = false;
        }
        else
            cuarta = true;
    });
    
    tagMedidorComboDhtml.attachEvent("onOpen", function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
    
}); //CIERRA $(FUNCTION())


function selectItemCombo(value,text)
{
    buscarPorRegionFiscal(text);
}


function buscarPorRegionFiscal(cadena)
{
    datosDhtmlContrato=[];
    datosDhtmlUbicacion=[];
//    datosDhtmlTagPatig=[];
    $.ajax({
        url:'../Controller/ReportesController.php?Op=buscarID',
        type:'GET',
        data:'CADENA='+cadena,
        async:false,
        success:function(datos)
        {
            $.each(datos,function(index,value)
            {
                if(index==0)
                $("#INPUT_CONTRATO_NUEVOREGISTRO").html(value.clave_contrato).css("background","#ddd");
//                datosDhtmlContrato.push({value:index,text:value.clave_contrato});
                datosDhtmlUbicacion.push({value:index,text:value.ubicacion});
            });
        },
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
    
     

//    contratoComboDhtml.clearAll();
//    contratoComboDhtml.addOption(datosDhtmlContrato);
    ubicacionComboDhtml.clearAll();
    ubicacionComboDhtml.addOption(datosDhtmlUbicacion);

//    contratoComboDhtml.getOptionsCount()!=0 ?
//    ( contratoComboDhtml.selectOption(0),contratoComboDhtml.disable(),clave_contrato = contratoComboDhtml.getSelectedText()) : (clave_contrato="",contratoComboDhtml.enable());
}


//PRIMERA VISTA EN EL MODAL
function buscarRegionesFiscales()
{
    datosDhtml=[];
    $.ajax({
        url:'../Controller/ReportesController.php?Op=buscarRegionFiscal',
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
    
//    contratoComboDhtml = new dhtmlXCombo({
//        parent: "INPUT_CONTRATO_NUEVOREGISTRO",
//        width: 540,
//        filter: true,
//        name: "combo",
//        items:[],
//    });
//    contratoComboDhtml.attachEvent("onOpen",function()
//    {
//        this.DOMlist.style.zIndex = 2000;
//    });
    
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
    
    tagPatinComboDhtml = new dhtmlXCombo({
    parent: "INPUT_TAGPATIN_NUEVOREGISTRO",
    width: 540,
    filter: true,
    name: "combo",
    items:[],
    });
    tagPatinComboDhtml.attachEvent("onOpen",function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
    
    tagMedidorComboDhtml = new dhtmlXCombo({
    parent: "INPUT_TAGMEDIDOR_NUEVOREGISTRO",
    width: 540,
    filter: true,
    name: "combo",
    items:[],
    });
    tagMedidorComboDhtml.attachEvent("onOpen",function()
    {
        this.DOMlist.style.zIndex = 2000;
    });
    
}

function selectItemComboUbicacion(value,text)
{
    buscarTagPatinPorUbicacion(text);
}


function buscarTagPatinPorUbicacion(ubicacion)
{
//    alert("hasta aqui");
    datosDhtmlTagPatin=[];
        $.ajax({
        url:'../Controller/ReportesController.php?Op=obtenerTagPatin',
        type:'GET',
        data:'UBICACION='+ubicacion,
        async:false,
        success:function(datosTagPatin)
        {
            $.each(datosTagPatin,function(index,value){
//                alert(value.tag_patin);
//                if(index==0)
                datosDhtmlTagPatin.push({value:index,text:value.tag_patin});                
            });
            
        },
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
    
    tagPatinComboDhtml.clearAll();
    tagPatinComboDhtml.addOption(datosDhtmlTagPatin);
}


function selectItemComboTagPatin(value,text)
{
//    alert("entro al selectItemComboTagPatin");
    buscarTagMedidorPorTagPatin(text);
}


function buscarTagMedidorPorTagPatin(tagPatin)
{
//    alert(tagPatin);
    datosDhtmlTagMedidor=[];
    $.ajax({
        url:'../Controller/ReportesController.php?Op=obtenerTagMedidor',
        type:'GET',
        data:'TAG_PATIN='+tagPatin,
        async:false,
        success:function(datosTagMedidor)
        {
            $.each(datosTagMedidor,function(index,value){
//                alert(value.tag_medidor);
//                if(index==0)
                datosDhtmlTagMedidor.push({value:index,text:value.tag_medidor});                
            });
            
        },
        error:function()
        
        {
            swalError("Error en el servidor");
        }
    });
    
    tagMedidorComboDhtml.clearAll();
    tagMedidorComboDhtml.addOption(datosDhtmlTagMedidor);
}


function selectItemComboTagMedidor(value,text)
{
//    alert("entro al selectItemComboTagPatin");
    buscarTipoMedidorYOtrosDatosPorTagMedidor(text);
}


function buscarTipoMedidorYOtrosDatosPorTagMedidor(tagMedidor)
{
    datosDhtmlTipoMedidor=[];
    datosDhtmlClasificacion=[];
    datosDhtmlHidrocarburo=[];
    $.ajax({
        url:'../Controller/ReportesController.php?Op=obtenerTipoMedidor',
        type:'GET',
        data:'TAG_MEDIDOR='+tagMedidor,
        async:false,
        success:function(datosTipoMedidor)
        {
            $.each(datosTipoMedidor,function(index,value){
//                alert(value.tipo_medidor);
                id_catalogop=value.id_catalogop;
//                alert(id_catalogop);
                if(index==0)
                    $("#INPUT_TIPOMEDIDOR_NUEVOREGISTRO").html(value.tipo_medidor).css("background","#ddd");
                    $("#INPUT_CLASIFICACION_NUEVOREGISTRO").html(value.clasificacion).css("background","#ddd");
                    $("#INPUT_HIDROCARBURO_NUEVOREGISTRO").html(value.hidrocarburo).css("background","#ddd");                            
            });
            
        },
        error:function()
        {
            swalError("Error en el servidor");
        }
    });
}


function insertarReporte(datos)
{
    $.ajax({
        url:"../Controller/ReportesController.php?Op=Guardar",
        type:"POST",
        data:"FECHA_CREACION="+datos[0]+"&ID_CATALOGOP="+datos[1]+"&VALOR_CHECKBOX="+datos[2],
        async:false,
        success:function()
        {
            alert("Entro al success");
            
        },
        error:function()
        {
            
        }
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
    tempData["omgc18"] = value.omgc18;
    tempData["delete"] = "1";
    return tempData;
}
function listarDatosReportes()//listarDatos
{
    __datos=[];
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/ReportesController.php?Op=listar&data=2";
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
    DataGrid = __datos;
//    return 1;
}

function construirGrid()
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
                { name:"omgc5", title: "°AP(PETROLEO)I", type: "text", width: 150, validate: "required" },
                { name:"omgc6", title: "%S(PETROLEO)", type: "text", width: 150, validate: "required" },
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
                { name:"omgc17", title: "Eventos", type: "text", width: 150, validate: "required" },
                { name:"omgc18", title: "Fecha Real Reporte", type: "text", width: 190, validate: "required" }
                
//                { name:"delete", title:"Opción", type:"customControl" }
        ]
        
        
    });
}

function precargados()
    {
     var _data=""; 
//     var  clave_contrato='<input list="opcionescontratos" name="eleccioncontratos" /><datalist id="opcionescontratos">'
         clave_contrato="<select>";
//        region_fiscal='<input list="opciones" name="opciones" /><datalist id="opciones"><option </datalist>';
        region_fiscal="<select>";
        pm="<select>";
        tpm="<select>";
        tm="<select>";
        clasificacionsistemamedicion="<select>";
        th="<select>";
        
        $.ajax({
            url : '../Controller/ReportesController.php?Op=listar&data=2',
            async:false,
            success 	: function(r)
            {
//                console.log(r);
//                                    $("#contrato").val(r["clave_cumplimiento"]);
                $.each(r,function (index,value)
                {
                    clave_contrato+="<option value="+value['clave_contrato']+">"+value['clave_contrato']+"</option>";
                   region_fiscal+="<option value="+value['region_fiscal']+">"+value['region_fiscal']+"</option>";
                    pm+="<option value="+value['ubicacion']+">"+value["ubicacion"]+"</option>";
                    tpm+="<option value="+value['tag_patin']+">"+value["tag_patin"]+"</option>";
                    tm+="<option value="+value['tipo_medidor']+">"+value["tipo_medidor"]+"</option>";
                    clasificacionsistemamedicion+="<option value="+value['clasificacion']+">"+value["clasificacion"]+"</option>";
                    th+="<option value="+value['hidrocarburo']+">"+value["hidrocarburo"]+"</option>";
                });
//                clave_contrato+="</datalist>"
                $("#clave_contrato").html(clave_contrato);
                $("#contrato").html(clave_contrato);
                $("#region_fiscal").html(region_fiscal);
                $("#pm").html(pm);
                $("#tpm").html(tpm);
                $("#tm").html(region_fiscal);
                  $("#clasificacionsistemamedicion").html(clasificacionsistemamedicion);
                     $("#th").html(th);
//                jBoxReportes.html.form=_data;
                
//                $("#clasificacionsistemamedicion").html(clasificacionsistemamedicion);
//                $("#th").html(th);
            }
        });
    }
    



