
$(function(){
                                                                              
    $("#CLAVE_DOCUMENTO").keyup(function()
    {
        var valueclavedocumento=$(this).val();

        verificarExiste(valueclavedocumento,"clave_documento");

    });

    $("#btn_guardar").click(function()
    {
        documentoDatos=new Object();
        documentoDatos.clave_documento = $("#CLAVE_DOCUMENTO").val();
        documentoDatos.documento = $("#DOCUMENTO").val();
        documentoDatos.id_empleado = $("#ID_EMPLEADOMODAL").val();

        listo=
            (
               documentoDatos.clave_documento!=""?
               documentoDatos.documento!=""?
               documentoDatos.id_empleado!=""?
               true: false: false: false
            );

               listo ?  insertarDocumento(documentoDatos):swalError("Completar campos");
    });


    $("#btn_limpiar").click(function()
    {

              $("#CLAVE_DOCUMENTO").val("");
              $("#DOCUMENTO").val("");
    //          $("#REGISTROS").val("");


    });
    
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
//        console.log("Entro al excelexportHibrido");
        $("#listjson").excelexportHibrido({
            containerid: "listjson"
            , datatype: 'json'
            , dataset: DataGridExcel
            , columns: getColumns(DataGridExcel)
        });
    });

}); //LLAVE CIERRE FUNCTION



function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros =[
                {id:"noneUno",type:"none"},
                {id:"clave_documento",type:"text"},
                {id:"documento",type:"text"},
                {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
                {name:"opcion",id:"opcion",type:"opcion"}
        ];
    resolve();
    });
    
}



//function construirGrid()
//{
//    jsGrid.fields.customControl = MyCControlField;
//    db={
//            loadData: function()
//            {
//                return DataGrid;
//            },
//            insertItem: function(item)
//            {
//                return item;
//            },
//        };
//    
//    $("#jsGrid").jsGrid({
//        onInit: function(args)
//        {
//            gridInstance=args.grid;
//            jsGrid.Grid.prototype.autoload=true;
//        },
//        onDataLoading: function(args)
//        {
//            loadBlockUi();
//        },
//        onDataLoaded:function(args)
//        {
//            $('.jsgrid-filter-row').removeAttr("style",'display:none');
//        },
//        onRefreshing: function(args) {
//        },
//        
//        width: "100%",
//        height: "300px",
//        autoload:true,
//        heading: true,
//        sorting: true,
//        editing: true,
//        paging: true,
//        controller:db,
//        pageLoading:false,
//        pageSize: 5,
//        pageButtonCount: 5,
//        updateOnResize: true,
//        confirmDeleting: true,
//        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
////        filtering:false,
////        data: __datos,
//        fields: 
//        [
//            { name: "id_principal",visible:false},
//            { name:"no",title:"No",width:20},
//            { name: "clave_documento",title:"Clave del Documento",type: "textarea", validate: "required" },
//            { name: "documento",title:"Documento",type: "textarea", validate: "required" },
//            { name: "id_empleado",title:"Responsable del Documento", type: "select",
//                items:EmpleadosCombobox,
//                valueField:"id_empleado",
//                textField:"nombre_completo"
//            },
//            { name:"delete", title:"Opción", type:"customControl",sorting:""}
//        ],
//        onItemUpdated: function(args)
//        {
//            console.log(args);
//            columnas={};
//            id_afectado=args["item"]["id_principal"][0];
//            $.each(args["item"],function(index,value)
//            {
//                if(args["previousItem"][index] != value && value!="")
//                {
//                        if(index!="id_principal" && !value.includes("<button") && index!="delete")
//                        {
//                                columnas[index]=value;
//                        }
//                }
//            });
//            if(Object.keys(columnas).length!=0)
//            {
//                    $.ajax({
//                            url: '../Controller/GeneralController.php?Op=Actualizar',
//                            type:'GET',
//                            data:'TABLA=documentos'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
//                            success:function(exito)
//                            {
//                                refresh();
//                                swal("","Actualizacion Exitosa!","success");
//                                setTimeout(function(){swal.close();},1000);
//                            },
//                            error:function()
//                            {
//                                swal("","Error en el servidor","error");
//                                setTimeout(function(){swal.close();},1500);
//                            }
//                    });
//            }
//        },
//        
//        onItemDeleting: function(args) 
//        {
//
//        }
//        
//    });
//}
//
//var MyCControlField = function(config)
//{
//    jsGrid.Field.call(this, config);
//};
//
//
//MyCControlField.prototype = new jsGrid.Field
//({
//        css: "date-field",
//        align: "center",
//        sorter: function(date1, date2)
//        {
//            console.log("haber cuando entra aqui");
//            console.log(date1);
//            console.log(date2);
//            // return 1;
//        },
//        itemTemplate: function(value,todo)
//        {
////            alert(value,todo);
//            if(value[0]['reg']!="0" || value[0]['validado']!=0)
//                return "";
//            else
//                return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button ',title:"Eliminar", type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
//        },
//        insertTemplate: function(value)
//        {
//        },
//        editTemplate: function(value)
//        {
//            val = "<input class='jsgrid-button jsgrid-update-button' type='button' title='Actualizar' onClick='aceptarEdicion()'>";
//            val += "<input class='jsgrid-button jsgrid-cancel-edit-button' type='button' title='Cancelar Edición' onClick='cancelarEdicion()'>";
//            return val;
//        },
//        insertValue: function()
//        {
//        },
//        editValue: function()
//        {
//        }
//});
//
//
//function cancelarEdicion()
//{
//    $("#jsGrid").jsGrid("cancelEdit");
//}
//
//function aceptarEdicion()
//{
//    gridInstance.updateItem();
//}

function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        var __datos=[];
        $.ajax(
        {
            url:"../Controller/DocumentosController.php?Op=Listar",
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
                    $.each(data,function(index,value)
                    {
                        __datos.push(reconstruir(value,index+1));
                    }); 
                    DataGrid = __datos;
                    gridInstance.loadData();
                    resolve();
                }else{
                    growlSuccess("Solicitud","No Existen Registros");
                    reject();
                }               
            },
            error:function()
            {
                growlError("Error","Error en el servidor");
                reject();
            }        
        });
    });
}


function reconstruir(value,index)
{
    tempData=new Object();
    ultimoNumeroGrid = index;
    tempData["id_principal"]= [{'id_documento':value.id_documento}];
    tempData["no"]= index;
    tempData["clave_documento"]=value.clave_documento;
    tempData["documento"]=value.documento;
    tempData["id_empleado"]=value.id_empleado;
//    tempData["delete"]= [{"reg":value.reg,"validado":value.validado}];
    if(value.reg==0 && value.validado)
    {
        tempData["id_principal"].push({eliminar : 1});
    }else{
        tempData["id_principal"].push({eliminar : 0});
    }
    
    tempData["id_principal"].push({editar : 1});
    tempData["delete"]= tempData["id_principal"] ;
    return tempData;
}

function reconstruirExcel(value,index)
{
//    console.log(value);
    tempData=new Object();
//    ultimoNumeroGrid = index;
//    tempData["id_principal"]= [{'id_documento':value.id_documento}];
    tempData["No"]= index;
    tempData["Clave del Documento"]=value.clave_documento;
    tempData["Documento"]=value.documento;
    tempData["Responsable del Documento"]=value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
//    tempData["delete"]= [{"reg":value.reg,"validado":value.validado}];
    return tempData;
}


function listarEmpleados()
{
    $.ajax({
        url:"../Controller/DocumentosController.php?Op=nombresCompletos",
        type:"GET",
        async:false,
        success:function(empleadosComb)
        {
            EmpleadosCombobox=empleadosComb;
            tempData="";
            $.each(empleadosComb,function(index,value)
            {
  //                tempData+="<option value='"+value.id_empleado+"'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</option>";
                  tempData+="<option value='"+value.id_empleado+"'>"+value.nombre_completo+"</option>";
            }); 
            
            $("#ID_EMPLEADOMODAL").html(tempData);
        }
    });
    return EmpleadosCombobox;
//return tempData;
}


function listarThisEmpleados()
{
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:"../Controller/DocumentosController.php?Op=responsableDocumento",
            type:"GET",
            success:(empleados)=>
            {
                thisEmpleados = empleados;
                resolve();
            },
            error:(er)=>
            {
                reject(er);
            }
        });
        
    });
}

function insertarDocumento(documentoDatos)
{
//    alert("Entro a la funcion guardar");
        $.ajax({
        url:"../Controller/DocumentosController.php?Op=Guardar",
        type:"POST",
        data:"documentoDatos="+JSON.stringify(documentoDatos),
        async:false,
        success:function(datos)
        {
//            alert("valor datos: "+datos);
//            console.log(datos);
            if(typeof(datos) == "object")
            {
                tempData;
                swalSuccess("Documento Creado");                
                $.each(datos,function(index,value)
                {
//                   console.log("Este es el value: "+value); 
                   tempData= reconstruir(value,ultimoNumeroGrid+1);  
                });
//                console.log(tempData);
                
                $("#jsGrid").jsGrid("insertItem",tempData).done(function()
                {
//                    $("#crea_documento .close ").click();
                });
                    dataListado.push(datos[0]),
                    DataGrid.push(tempData),
                    $("#crea_documento .close ").click();
                
            } else{
                if(datos==0)
                {
                    swalError("Error, No se pudo crear el Documento");                    
                } else{
                    swalInfo("Creado, Pero no listado, Actualice");
                }                
            }
            
        },
        error:function()
            {
                swalError("Error en el servidor");
            }
    });
    
}


function saveUpdateToDatabase(args)//listo
{
        columnas=new Object();
        entro=0;
        id_afectado = args['item']['id_principal'][0];
        verificar = 0;
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
        
        if( Object.keys(columnas).length != 0 && verificar==0)
        {
            
            $.ajax({
                url:"../Controller/GeneralController.php?Op=Actualizar",
                type:"POST",
                data:'TABLA=documentos'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                beforeSend:()=>
                {
                        growlWait("Actualización","Espere...");
                },
                success:(data)=>
                {
                        if(data==1)
                        {
                                growlSuccess("Actulización","Se actualizaron los campos");
                                actualizarDocumento(id_afectado.id_documento);
                        }
                        else
                        {
                                growlError("Actualización","No se pudo actualizar");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
            });
        }
        else
        {
                componerDataGrid();
                gridInstance.loadData();
        }
}

 function actualizarDocumento(id_documento)
{
        $.ajax({
                url:'../Controller/DocumentosController.php?Op=ListarDocumento',
                type: 'GET',
                data:'ID_DOCUMENTO='+id_documento,
                success:function(datos)
                {
                        if(typeof(datos)=="object")
                        {
                            $.each(datos,function(index,value){
                                    componerDataListado(value);
                            });
                            componerDataGrid();
                            gridInstance.loadData();
                        }
                        else
                        {
                                growlError("Actualizar Vista","No se pudo actualizar la vista, refresque");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
        });
}


function componerDataListado(value)// id de la vista documento, listo
{
    id_vista = value.id_documento;
    id_string = "id_documento";
    $.each(dataListado,function(indexList,valueList)
    {
        $.each(valueList,function(ind,val)
        {
            if(ind == id_string)
                    ( val==id_vista) ? dataListado[indexList]=value : console.log();
        });
    });
}

function componerDataGrid()//listo
{
    __datos = [];
    $.each(dataListado,function(index,value){
        __datos.push(reconstruir(value,index+1));
    });
    DataGrid = __datos;
}


function verificarExiste(dataString,cualverificar)
{

$.ajax({
    type: "POST",
    url: "../Controller/DocumentosController.php?Op=verificacionexisteregistro&cualverificar="+cualverificar,
    data: "registro="+dataString,
    success: function(data) {    
    mensajeerror="";

        $.each(data, function (index,value) {
            mensajeerror=" El Documento "+value.clave_documento+" Ya Existe";
        });
    $("#msgerrorclave").html(mensajeerror);
        if(mensajeerror!=""){
            $("#msgerrorclave").css("background","orange");
            $("#msgerrorclave").css("width","190px");
            $("#msgerrorclave").css("color","white");
            $("#btn_guardar").prop("disabled",true);
        }else{
            $("#btn_guardar").prop("disabled",false);
        }



        }
    })
}


//function preguntarEliminar(data)
//{
////    console.log(data);
//    // valor = true;
//    swal({
//        title: "",
//        text: "¿Eliminar Registro?",
//        type: "info",
//        showCancelButton: true,
//        closeOnConfirm: false,
//        showLoaderOnConfirm: true,
//        confirmButtonText: "Eliminar",
//        cancelButtonText: "Cancelar",
//        },
//        function(confirmacion)
//        {
//            if(confirmacion)
//            {
//                eliminarDocumento(data);
//            }
//            else
//            {
//            }
//        });
//}


//function eliminarDocumento(item)
//{
////    alert("Entro a la funcion eliminar: "+item);
//
////            id_afectado=item['id_principal'][0];
//            id_afectado=item['id_documento'];
////            console.log(id_afectado);
//            $.ajax({
//
//                url:"../Controller/DocumentosController.php?Op=Eliminar",
//                type:"POST",
////                data:"ID_DOCUMENTO="+JSON.stringify(id_afectado),
//                data:"ID_DOCUMENTO="+id_afectado,
////                beforeSend:function()
////                {
////                    growlWait("Eliminación Documento","Eliminando...");
////                },
//                success:function(data)
//                {
////                    alert("Entro al success "+data);
//                    if(data==false)
//                    {
////                        swal("","El Documento esta validado o asignado a un Registro","error");
////                        setTimeout(function(){swal.close();},1500);
//                        swalError("El Documento esta validado o asignado a un Registro");
//                    }else{
//                        if(data==true)
//                        {
//                            refresh();
////                            actualizarDespuesdeEditaryEliminar();
////                            swal("","Se elimino correctamente el Documento","success");
////                            setTimeout(function(){swal.close();},1500);
//                            swalSuccess("Se elimino correctamente el Documento");
//                        }
//                    }
//                },
//                error:function()        
//                {
//                    swal("","Error en el servidor","error");
//                    setTimeout(function(){swal.close();},1500);
//                }
//            });
//}


function preguntarEliminar(data)
{
//     console.log("jajaja",data);
    swal({
        title: "",
        text: "¿Eliminar Documento?",
        type: "info",
        showCancelButton: true,
        // closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
        }).then((confirmacion)=>{
                if(confirmacion)
                {
                        eliminarDocumento(data);
                }
        });
}

 function eliminarDocumento(id_afectado)
 {
        $.ajax({
                url:"../Controller/DocumentosController.php?Op=Eliminar",
                type:"POST",
                data:"ID_DOCUMENTO="+id_afectado.id_documento,
                beforeSend:()=>
                {
                        growlWait("Eliminación Documento","Eliminando...");
                },
                success:(res)=>
                {
                        // console.log(data);
                        if(res >= 0)
                        {
                                dataListadoTemp=[];
                                dataItem = [];
                                numeroEliminar=0;
                                itemEliminar={};
                                id = id_afectado.id_documento;
                                $.each(dataListado,function(index,value)
                                {
                                        value.id_documento != id ? dataListadoTemp.push(value) : (dataItem.push(value), numeroEliminar=index+1);
                                });
                                // console.log(dataListadoTemp);
                                // itemEliminar = reconstruir(dataItem[0],numeroEliminar);este esra para el eliminar directo en grid
                                DataGrid = [];
                                dataListado = dataListadoTemp;
                                if(dataListado.length == 0 )
                                        ultimoNumeroGrid=0;
                                $.each(dataListado,function(index,value)
                                {
                                        DataGrid.push( reconstruir(value,index+1) );
                                });

                                gridInstance.loadData();
                                growlSuccess("Eliminación","Registro Eliminado");
                        }
                        else
                                growlError("Error Eliminación","Error al Eliminar Registro");
                },
                error:()=>
                {
                        growlError("Error Eliminación","Error del Servidor");
                }
        });
 }


function refresh()
{
   listarEmpleados();
   listarDatos();
   inicializarFiltros();
   construirFiltros();
   gridInstance.loadData();
}