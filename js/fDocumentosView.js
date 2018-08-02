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
    {'name':'Responsable','id':'id_empleado',type:'combobox'}

];


function construirFiltros()
{
    tempData = "";
    $.each(filtros,function(index,value)
    {
        if(value.type == "date")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width: auto;display:none;'>";
            tempData += "<input type='date' onChange='construirFiltroSelect(this,\""+value.id+"\")' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
        }
        if(value.type == "text")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
        }
        if(value.type == "combobox")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width:auto;display:none'>";
            tempData += construirFiltrosCombobox(value.data,value.id);
        }
    });
    $("#headerFiltros").append(tempData);
}

function construirFiltrosCombobox(datos,id)
{
    tempData="";
    tempData = "<select onChange='construirFiltrosComboboxSelect(this,\""+id+"\")' margin:2px;>";
    tempData += "<option value='-1'>Responsable del Documento</option>";
    $.each(datos,function(index,value)
    {
            tempData += "<option value='"+value.id+"'>"+value.descripcion+"</option>";
    });
    tempData += "</select>";
    return tempData;
}

function construirFiltroSelect(Obj,id)
{
    val = $(Obj).val();
    if(val=="-1")
            $("#"+id).val("");
    else
            $("#"+id).val(val);
    filtroSupremo();
}





function listarDatos()
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
    
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
        
       
        data: __datos,
        fields: [
                { name: "id_principal",visible:false },
                { name: "clave_documento",title:"Clave del Documento", type: "text", width: 80, validate: "required" },
                { name: "documento",title:"Nombre del Documento", type: "text", width: 150, validate: "required" },
                { name: "id_empleado",title:"Responsable del Documento", type: "select", items:__datosCBE,valueField: "id_empleado", textField: "Name", width: 150, validate: "required" },
                {type:"control"}
        ],
        
        onItemUpdated: function(args) {
//            console.log(args);
            saveUpdateToDatabase(args);
        },
    
        
            
    
        onItemDeleting: function(args) {
//            console.log(args);
            eliminarDocumento(args);

        }
        
        
//        onItemDeleted: function(args){
//            console.log("entro a onItemDeleted");
//            if(args["item"]["eliminar"]=="si"){
//                eliminarEvidencia(args["item"]["id_evidencia"]);
////                  $("#jsGrid").jsGrid("insertItem");
//            }
//        }
        
    });
}

function saveUpdateToDatabase(args) 
{ 
//      console.log("Valor del args en el save: "+args['item']['id_principal'][0]);

      console.log(args);
//      columnas=new Object();
      columnas={};
      id_afectado=args['item']['id_principal'][0];
//      console.log(args['item']['id_principal'][0]);
//      columnas['nombre']="nom";
      $.each(args['item'],function(index,value){
          if(args['previousItem'][index]!=value && value!="")
          {
              if(index!='id_principal'){
//              console.log("Entro aqui");
                    columnas[index]=value;
//                    console.log(index);
                }
          }            
//          console.log(args['previousItem'][index]);
      });
      
//      console.log(columnas);
      if(columnas!="")
      {
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
                listarDatos();
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
            listarDatos();
            swal("Guardado Exitoso!", "", "success");
            setTimeout(function(){swal.close();$("#create-item .close").click();},1000);
        }
        
    });
}

function refresh()
{
    listarDatos();
}

function loadSpinner()
{
        myFunction();
}