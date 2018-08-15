
$(function(){
                                                                              
$("#CLAVE_DOCUMENTO").keyup(function(){
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


$("#btn_limpiar").click(function(){

          $("#CLAVE_DOCUMENTO").val("");
          $("#DOCUMENTO").val("");
//          $("#REGISTROS").val("");


});

}); //LLAVE CIERRE FUNCTION



function inicializarFiltros()
{
    filtros =[
            {id:"clave_documento",type:"text"},
            {id:"documento",type:"text"},
            {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
            {name:"opcion",id:"opcion",type:"opcion"}
            ];
}



function construirGrid()
{
//    jsGrid.fields.customControl = MyCControlField;
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
            { name: "clave_documento",title:"Clave del Documento", type: "text", validate: "required" },
            { name: "documento",title:"Documento", type: "text", validate: "required" },
            { name: "id_empleado",title:"Responsable del Documento", type: "select",
                items:EmpleadosCombobox,
                valueField:"id_empleado",
                textField:"nombre_completo"
            },
            {name:"cancel", type:"control", }
        ],
        onItemUpdated: function(args)
        {
//                console.log(args);
            columnas={};
            entro=0;
            id_afectado=args["item"]["id_principal"][0];
            $.each(args["item"],function(index,value)
            {
                if(args["previousItem"][index] != value && value!="")
                {
                        if(index!="id_principal" && !value.includes("<button"))
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
                            data:'TABLA=documentos'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                            success:function(exito)
                            {
                                actualizarDespuesdeEditaryEliminar();
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
            id_afectado= args['item']['id_principal'][0];
    
            $.ajax({
                url:"../Controller/DocumentosController.php?Op=Eliminar",
                type:"POST",
                data:"ID_DOCUMENTO="+JSON.stringify(id_afectado),
                success:function(data)
                {
                    alert("Entro al success "+data);
                    if(data==false)
                    {
                        swal("","El Documento esta validado o asignado a un Registro","error");
                        setTimeout(function(){swal.close();},1500);
                    }else{
                        if(data==true)
                        {
                            actualizarDespuesdeEditaryEliminar();
                            swal("","Se elimino correctamente el Documento","success");
                            setTimeout(function(){swal.close();},1500);
                        }
                    }
                },
                error:function()        
                {
                    swal("","Error en el servidor","error");
                    setTimeout(function(){swal.close();},1500);
                }
            });

        }
        
    });
    
}


function listarDatos()
{
    __datos=[];    
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/DocumentosController.php?Op=Listar";
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
    tempData["id_principal"]= [{'id_documento':value.id_documento}];
    tempData["clave_documento"]=value.clave_documento;
    tempData["documento"]=value.documento;
    tempData["id_empleado"]=value.id_empleado;
    return tempData;
}


function empleadosComboboxparaModal()
{
  
  $.ajax({
      url:"../Controller/EmpleadosController.php?Op=mostrarcombo",
      type:"GET",
      success:function(empleados)
      {
          tempData="";
          $.each(empleados,function(index,value)
          {
              tempData+="<option value='"+value.id_empleado+"'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</option>";
          }); 
          
          $("#ID_EMPLEADOMODAL").html(tempData);
      }
  });   
}


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

function insertarDocumento(documentoDatos)
{
        $.ajax({
        url:"../Controller/DocumentosController.php?Op=Guardar",
        type:"POST",
        data:"documentoDatos="+JSON.stringify(tareaDatos),
        async:false,
        success:function(datos)
        {
//              alert(datos);
            console.log(datos);
            if(typeof(datos) == "object")
            {
                tempData;
                swalSuccess("Documento Creado");                
                $.each(datos,function(index,value)
                {
                   console.log("entro"); 
                   tempData= reconstruir(value,index);  
                });
                console.log(tempData);
                
                $("#jsGrid").jsGrid("insertItem",tempData).done(function()
                {
                    $("#crea_tarea .close ").click();
                });
                
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



function refresh()
{
   listarEmpleados();
   listarDatos();
   inicializarFiltros();
   construirFiltros();
   gridInstance.loadData();
}

function loadSpinner()
{
    myFunction();
}


function actualizarDespuesdeEditaryEliminar()
{
   listarEmpleados();
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