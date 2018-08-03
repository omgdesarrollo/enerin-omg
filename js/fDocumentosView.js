
$(function(){
                                                                              
$("#CLAVE_DOCUMENTO").keyup(function(){
    var valueclavedocumento=$(this).val();

    verificarExiste(valueclavedocumento,"clave_documento");

});


$("#btn_guardar").click(function(){

            var CLAVE_DOCUMENTO=$("#CLAVE_DOCUMENTO").val();
            var DOCUMENTO=$("#DOCUMENTO").val();
            var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
//            var REGISTROS=$("#REGISTROS").val();

//           alert("CLAVE_DOCUMENTO :"+CLAVE_DOCUMENTO + "DOCUMENTO :"+DOCUMENTO + "ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL);

            datos=[];
            datos.push(CLAVE_DOCUMENTO);
            datos.push(DOCUMENTO);
            datos.push(ID_EMPLEADOMODAL);
//            datos.push(REGISTROS);

            saveToDatabaseDatosFormulario(datos);

});

$("#btn_limpiar").click(function(){

          $("#CLAVE_DOCUMENTO").val("");
          $("#DOCUMENTO").val("");
//          $("#REGISTROS").val("");


});

}); //LLAVE CIERRE FUNCTION


filtros = 
[
    {'name':'Clave','id':'clave_documento',type:'text'},
    {'name':'Documento','id':'documento',type:'text'},
//    {'name':'Responsable','id':'id_empleado',type:'combobox',data:consultarEmpleados()}
];


//function construirFiltros()
//{
//    tempData = "";
//    $.each(filtros,function(index,value)
//    {
//        if(value.type == "date")
//        {
//            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width: auto;display:none;'>";
//            tempData += "<input type='date' onChange='construirFiltroSelect(this,\""+value.id+"\")' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
//        }
//        if(value.type == "text")
//        {
//            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
//        }
//        if(value.type == "combobox")
//        {
//            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width:auto;display:none'>";
//            tempData += construirFiltrosCombobox(value.data,value.id);
//        }
//    });
//    $("#headerFiltros").append(tempData);
//}
//
//function construirFiltrosCombobox(datos,id)
//{
//    tempData="";
//    tempData = "<select onChange='construirFiltrosComboboxSelect(this,\""+id+"\")' margin:2px;>";
//    tempData += "<option value='-1'>Responsable del Documento</option>";
//    $.each(datos,function(index,value)
//    {
//            tempData += "<option value='"+value.id+"'>"+value.descripcion+"</option>";
//    });
//    tempData += "</select>";
//    return tempData;
//}
//
//function construirFiltroSelect(Obj,id)
//{
//    val = $(Obj).val();
//    if(val=="-1")
//            $("#"+id).val("");
//    else
//            $("#"+id).val(val);
//    filtroSupremo();
//}





var ____listaDeTodoTipoDeVariantes={"todoloquetienequeverconfiltros":{filtroAlPrincipioDeTodosLosCampos:false}};

//simbologia
//                _=funcion
//                __=variables
//                ___=objetos
//                ____=listas de objetos



function listarDatos(queRetornar)
{
//    alert("Entro a listar datos");
    __datos=[];
    __datosCBE=[];
    
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/DocumentosController.php?Op=Listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    
    var variablefunciondatos=function obtenerDatosServer (data)
    {
        $.each(data.empl,function(index,value){
//            alert(data.empl);
              __datosCBE.push({
                "Name":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
                "id_empleado":value.id_empleado           
              });
//              alert(__datosCBE);
                
        });
//        console.log(__datosCBE);
        
        $.each(data.doc,function(index,value){
//          alert("Valores each: "+value);

            __datos.push({
                "id_principal":[{'id_documento':value.id_documento}],
                "clave_documento":value.clave_documento,
                "documento":value.documento,
//                "Responsable del Documento":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno           
                "id_empleado":value.id_empleado
            })
        });
    }
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    
   if(queRetornar==1)
   {
       console.log(__datos);
      return __datos; 
   }else{
      return __datosCBE;
      console.log(__datosCBE);
   }
//   
//   console.log(__datos);

//    return __datos;
}


function listarjsGrid()
{  
    db={
                loadData: function(filter) {
//                    console.log("Entro al loadData");
//                    console.log(listarDatos(1));
//                    alert("e");
//                        console.log(filter);
//                        return listarDatos(1);
                        
//                          var __filter = $("#jsGrid").jsGrid("getFilter");
//            console.log(__filter);
//             return $.grep(this.clients, function(client) {
//                return (!filter.Name || client.Name.indexOf(filter.Name) > -1)
//                    && (!filter.Age || client.Age === filter.Age)
//                    && (!filter.Address || client.Address.indexOf(filter.Address) > -1)
//                    && (filter.Married === undefined || client.Married === filter.Married);
//            });

            return $.grep(listarDatos(1),function (data){
                var objetoSinFiltroDeCombo={"comparacionesFiltros":(!filter.clave_documento || data.clave_documento.indexOf(filter.clave_documento) > -1)
                       &&(!filter.documento || data.documento.indexOf(filter.documento)> -1)};
                var objetoConTodosLosFiltros={"comparacionesFiltros":(!filter.clave_documento || data.clave_documento.indexOf(filter.clave_documento) > -1)
                       &&(!filter.documento || data.documento.indexOf(filter.documento)> -1)
                       &&(!filter.id_empleado || data.id_empleado.indexOf(filter.id_empleado)> -1)};
                if(____listaDeTodoTipoDeVariantes["todoloquetienequeverconfiltros"]["filtroAlPrincipioDeTodosLosCampos"]==false){
                    ____listaDeTodoTipoDeVariantes["todoloquetienequeverconfiltros"]["filtroAlPrincipioDeTodosLosCampos"]=true;
                    return objetoSinFiltroDeCombo["comparacionesFiltros"];
                }else
                {
                    return objetoConTodosLosFiltros["comparacionesFiltros"];
                }
//                       &&(!filter.id_empleado || data.id_empleado(filter.id_empleado)> -1) ;
            });
              },
                  insertItem: function(item) {
                      return item;
              },
           } 
           
    window.db = db; 
    
    $("#jsGrid").jsGrid({
        
        onInit: function(args){
            console.log(jsGrid);
            gridInstance=args;
              jsGrid.ControlField.prototype.editButton=true;
              jsGrid.Grid.prototype.autoload=true;
//              jsGrid.Field.prototype.filtering=false;
//                jsGrid.Field.prototype.filtering=true;
//                jsGrid.Field.prototype.visible=false;
        }, 
        onDataLoading: function(args) {
            $("#loader").show();
        },
        onDataLoaded:function(args){
            $("#loader").hide();
//              jsGrid.Field.prototype.filtering=true;
        },
        onRefreshing: function(args) {
        },
        
        width: "100%",
        height: "300px",
        autoload:true,
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
        controller:db,
        filtering:true,
//        data: __datos,
        fields: [
                { name: "id_principal",visible:false },
                { name: "clave_documento",title:"Clave del Documento", type: "textarea", validate: "required"},
                { name: "documento",title:"Nombre del Documento", type: "textarea",  validate: "required" },
                { name: "id_empleado",title:"Responsable del Documento", type: "select", items:listarDatos(0),valueField: "id_empleado", textField: "Name", validate: "required",autosearch: false,filterValue: function() { 
//                       console.log("dentro del name");
//                        console.log(this.items[this.filterControl.val()][this.valueField]);
//                        console.log("termina dentro del name");
                return this.items[this.filterControl.val()][this.valueField];
                }},
                {type:"control"}
        ],
        
        onItemUpdated: function(args) {
//            console.log(args);
            saveUpdateToDatabase(args);
        },
    
//        editRowRenderer :function (item, itemIndex){
////            alert("le");
//            console.log(item);
//            console.log("--");
//            console.log(itemIndex);
//            return item;
//        },
            
    
        onItemDeleting: function(args) {
//            console.log(args);
            eliminarDocumento(args);

        }
        
    });
   
}


function saveUpdateToDatabase(args) 
{ 
//      console.log("Valor del args en el save: "+args['item']['id_principal'][0]);

      console.log(args);
//      columnas=new Object();
      columnas={};
       entro=0;
      id_afectado=args['item']['id_principal'][0];
//      console.log(args['item']['id_principal'][0]);
//      columnas['nombre']="nom";
      $.each(args['item'],function(index,value){
          if(args['previousItem'][index]!=value && value!="")
          {
              if(index!='id_principal' && !value.includes("<button")){
//              console.log("Entro aqui");
                    columnas[index]=value;
                    entro=1;
//                    console.log(index);
                }
          }            
//          console.log(args['previousItem'][index]);
      });
      
//      console.log(columnas);
      if(entro!=0)
      {
          console.log("Valor columnas: "+columnas);
        $.ajax({
            url:"../Controller/GeneralController.php?Op=Actualizar",
            type:"POST",
            data:'TABLA=documentos'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),          
            success:function(data)
            {
//                alert("Entro al success");
                swal("","Actualizacion Exitosa!", "success");
                setTimeout(function(){swal.close();},1000);
            },
            error:function()
            {
                swal("","Error en el servidor","error");
                setTimeout(function(){swal.close();},1500);
            }            
        });
      }     
}

function eliminarDocumento(args)
{
//    console.log(args);
    id_afectado= args['item']['id_principal'][0];
//    console.log(args['item']['id_principal'][0]);
//alert("Entro a la funcion eliminar");
    $.ajax({
        url:"../Controller/DocumentosController.php?Op=Eliminar",
        type:"POST",
        data:"ID="+JSON.stringify(id_afectado),
        success:function(data)
        {
//            alert("Entro al success "+data);
            if(data==false)
            {
                swal("","El Documento esta validado o asignado a un Registro","error");
                setTimeout(function(){swal.close();},1500);
            }else{
                if(data==true)
                {
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


function saveToDatabaseDatosFormulario(datos)
{
    $.ajax({
        
        url:"../Controller/DocumentosController.php?Op=Guardar",
        type:"POST",
        data:"CLAVE_DOCUMENTO="+datos[0]+"&DOCUMENTO="+datos[1]+"&ID_EMPLEADO="+datos[2],
        success:function(data)
        {
//            swal("Guardado Exitoso!", "", "success");
//            setTimeout(function(){swal.close();$("#create-item .close").click();},1000);
            refresh('agregarDocumento');

        }
        
    });
}

function refresh(evaluar)
{
    switch(evaluar)
    {
        case 'agregarDocumento':
            ____listaDeTodoTipoDeVariantes["todoloquetienequeverconfiltros"]["filtroAlPrincipioDeTodosLosCampos"]=false;
           $("#jsGrid").jsGrid("render").done(function() {
            swal("Guardado Exitoso!", "", "success");
            setTimeout(function(){swal.close();$("#create-item .close").click();},1000);
        });
        
        break;
        
        case 'refrescarTable':
            ____listaDeTodoTipoDeVariantes["todoloquetienequeverconfiltros"]["filtroAlPrincipioDeTodosLosCampos"]=false;
            
            $("#jsGrid").jsGrid("render").done(function() {
            swal("Se cargaron correctamente los Datos", "", "success");
            setTimeout(function(){swal.close();$("#create-item .close").click();},1000);
        });    
            
            break;
    }    
}

function loadSpinner()
{
        myFunction();
}