
$(function(){
                                                                             

}); //LLAVE CIERRE FUNCTION



//function inicializarFiltros()
//{
//    filtros =[
//            {id:"noneUno",type:"none"},
//            {id:"clave_documento",type:"text"},
//            {id:"documento",type:"text"},
//            {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
//            {name:"opcion",id:"opcion",type:"opcion"}
//            ];
//}



function construirGrid()
{
    jsGrid.fields.customControl = MyCControlField;
    db={
            loadData: function()
            {
                return DataGrid;
            },
            insertItem: function(item)
            {
                return item;
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
        onRefreshing: function(args) {
        },
        
        width: "100%",
        height: "300px",
        autoload:true,
        heading: true,
        sorting: true,
        editing: true,
        paging: true,
        controller:db,
        pageLoading:false,
        pageSize: 5,
        pageButtonCount: 5,
        updateOnResize: true,
        confirmDeleting: true,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
//        filtering:false,
//        data: __datos,
        fields: 
        [
            { name: "id_principal",visible:false},
            { name:"no",title:"No",width:40},
            { name: "folio_entrada",title:"Folio de Entrada", type: "text", validate: "required" },
            { name: "clave_autoridad",title:"Autoridad Remitente", type: "text", validate: "required" },
            { name: "asunto",title:"Asunto", type: "text", validate: "required" },
            { name: "id_empleadotema",title:"Responsable del Tema", type: "text", validate: "required" },
            { name: "fecha_asignacion",title:"Fecha de Asignacion", type: "text", validate: "required" },            
            { name: "fecha_limite_atencion",title:"Fecha Limite de Atencion", type: "text", validate: "required" },            
            { name: "fecha_alarma",title:"Fecha de Alarma", type: "text", validate: "required" },            
            { name: "status_doc",title:"Status", type: "text", validate: "required" },
            { name: "condicion",title:"Condicion Logica", type: "text", validate: "required" },
            { name: "id_empleado",title:"Responsable del Plan", type: "select",
                items:EmpleadosCombobox,
                valueField:"id_empleado",
                textField:"nombre_completo"
            },
            { name: "archivo_adjunto",title:"Archivo Adjunto", type: "text", validate: "required",width:120, editing:false },            
            { name: "registrar_programa",title:"Registrar programa", type: "text", validate: "required",width:150, editing:false },            
            { name: "avance_programa",title:"Avance del Programa", type: "text", validate: "required", editing:false },           
            { name:"delete", title:"Opción", type:"customControl",sorting:""}
        ],
        onItemUpdated: function(args)
        {
            console.log(args);
            columnas={};
            id_afectado=args["item"]["id_principal"][0];
            $.each(args["item"],function(index,value)
            {
                if(args["previousItem"][index] != value && value!="")
                {
                        if(index!="id_principal" && !value.includes("<button") && index!="delete")
                        {
                                columnas[index]=value;
                        }
                }
            });
            if(Object.keys(columnas).length!=0)
            {
                    $.ajax({
                            url: '../Controller/GeneralController.php?Op=Actualizar',
                            type:'GET',
                            data:'TABLA=seguimiento_entrada'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                            success:function(exito)
                            {
                                refresh();
                                swal("","Actualizacion Exitosa!","success");
                                setTimeout(function(){swal.close();},1000);
                            },
                            error:function()
                            {
                                swal("","Error en el servidor","error");
                                setTimeout(function(){swal.close();},1500);
                            }
                    });
            }
        },
        
        onItemDeleting: function(args) 
        {

        }
        
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
//            alert(value,todo);
//            if(value[0]['reg']!="0" || value[0]['validado']!=0)
//                return "";
//            else
//                return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button ',title:"Eliminar", type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
            return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-edit-button ',title:"Editar", type:'button'});
        },
        insertTemplate: function(value)
        {
        },
        editTemplate: function(value)
        {
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
    datosParamAjaxValues["url"]="../Controller/SeguimientoEntradasController.php?Op=Listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    
    var variablefunciondatos=function obtenerDatosServer (data)
    {
        dataListado = data;
        $.each(data,function(index,value)
        {
            __datos.push(reconstruir(value,index++));
        });

    }
    
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    DataGrid = __datos;
}


function reconstruirTable(_datos)
{
    __datos=[];
    $.each(_datos,function(index,value)
    {
        __datos.push(reconstruir(value,index++));
    });
    construirGrid(__datos);
}


function reconstruir(value,index)
{
    tempData=new Object();
    ultimoNumeroGrid = index;
    tempData["id_principal"]= [{'id_seguimiento_entrada':value.id_seguimiento_entrada}];
    tempData["no"]= index;
    tempData["folio_entrada"]=value.folio_entrada;
    tempData["clave_autoridad"]=value.clave_autoridad;
    tempData["asunto"]=value.asunto;
    tempData["id_empleadotema"]=value.nombre_empleadotema;
    tempData["fecha_asignacion"]=value.fecha_asignacion;
    tempData["fecha_limite_atencion"]=value.fecha_limite_atencion;
    tempData["fecha_alarma"]=value.fecha_alarma;
        if(value.status_doc== "1")
        {
            tempData["status_doc"]="En Proceso";
        };
        if(value.status_doc== "2")
        {
            tempData["status_doc"]="Supendido";
        };
        if(value.status_doc== "3")
        {
            tempData["status_doc"]="Terminado";
        };
//        valGantt.push({"id_documento_entrada":value.id_documento_entrada,"folio_entrada":value.folio_entrada});
    tempData["condicion"]=value.condicion;    
    tempData["id_empleado"]=value.id_empleado;
    tempData["archivo_adjunto"] = "<button onClick='mostrar_urls("+value.id_documento_entrada+")' type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
    tempData["archivo_adjunto"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Mostrar</button>";
    tempData["registrar_programa"]="<button id='btn_cargaGantt' class='btn btn-info' onClick='cargadePrograma("+JSON.stringify({"id_documento_entrada":value.id_documento_entrada,"folio_entrada":value.folio_entrada})+")'>Cargar Programa</button>";
    tempData["avance_programa"]=(value.avance_programa*100).toFixed(2)+"%";    
//    tempData["delete"]= [{"reg":value.reg,"validado":value.validado}];

//este lo voy a checar no borrar
//var n2 = 12.398491;
//n2 = parseFloat(n2);
//alert('Con redondeo: ' + parseFloat(n2).toFixed(2));
//var a2 = Math.floor(n2 * 100) / 100;
//alert('Sin redondeo: ' + a2.toFixed(2));
 //aqui termina lo que voy a a checar
// var a2 = Math.floor(n2 * 100) / 100;
//alert('Sin redondeo: ' + a2.toFixed(2));
// aqui termina lo que voy a a checar
 
 
    return tempData;
}



//function empleadosComboboxparaModal()
//{
//  
//  $.ajax({
//      url:"../Controller/EmpleadosController.php?Op=mostrarcombo",
//      type:"GET",
//      success:function(empleados)
//      {
//          tempData="";
//          $.each(empleados,function(index,value)
//          {
//              tempData+="<option value='"+value.id_empleado+"'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</option>";
//          }); 
//          
//          $("#ID_EMPLEADOMODAL").html(tempData);
//      }
//  });   
//}


function listarEmpleados()
{
    $.ajax({
        url:"../Controller/EmpleadosController.php?Op=nombresCompletos",
        type:"GET",
        async:false,
        success:function(empleadosComb)
        {
            EmpleadosCombobox=empleadosComb;
        }
    });
    return EmpleadosCombobox;
}

months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

function mostrar_urls(id_documento_entrada)
{
        var tempDocumentolistadoUrl = "";
        URL = 'filesDocumento/Entrada/'+id_documento_entrada;
        $.ajax({
                url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                type: 'GET',
                data: 'URL='+URL,
                success: function(todo)
                {
                        if(todo[0].length!=0)
                        {
                                tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                                $.each(todo[0], function (index,value)
                                {
                                        nametmp = value.split("^-O-^-M-^-G-^");
                                        fecha = new Date(nametmp[0]*1000);
                                        fecha = fecha.getDate() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                                        
                                        tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                        tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a></td>";
//                                        tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
//                                        tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
//                                        tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
                                });
                                tempDocumentolistadoUrl += "</tbody></table>";
                        }
                        if(tempDocumentolistadoUrl == " ")
                        {
                                tempDocumentolistadoUrl = " No hay archivos agregados ";
                        }
                        tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdDocumento' type='text' style='display:none;' value='"+id_documento_entrada+"'>";
                        // alert(tempDocumentolistadoUrl);
//                        $('#DocumentoEntradaAgregarModal').html(" ");
//                        $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                        $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                        // $('#fileupload').fileupload();
//                        $('#fileupload').fileupload({
//                        url: '../View/',
//                        });
                }
        });
}


function cargadePrograma(val){
    for(var property in val) {
    alert(property + "=" + val[property]);
}
//        alert("le has picado al folio de entrada  "+foliodeentrada);
console.log(val);
    window.location.href=" GanttView.php?id_documento_entrada="+val.id_documento_entrada+"&folio_entrada="+val.folio_entrada;
//   window.location.replace("http://sitioweb.com");        
}


function refresh()
{
   listarEmpleados();
   listarDatos();
//   inicializarFiltros();
//   construirFiltros();
   gridInstance.loadData();
}

function loadSpinner()
{
    myFunction();
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