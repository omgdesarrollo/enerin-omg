

$(function(){
                                                                              
$("#CLAVE_DOCUMENTO").keyup(function(){
    var valueclavedocumento=$(this).val();

    verificarExiste(valueclavedocumento,"clave_documento");

});


$('.select').on('change', function() {
  column="ID_EMPLEADO";
  val=$(this).prop('value');
   $.ajax({
        url: "../Controller/DocumentosController.php?Op=Modificar",
        type: "POST",
        data:'column='+column+'&editval='+val+'&id='+id_clausula,
        success: function(data){
             consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
             swal("Actualizacion Exitosa!", "Ok!", "success")


        }   
   });


});

$("#btn_guardar").click(function(){

            var CLAVE_DOCUMENTO=$("#CLAVE_DOCUMENTO").val();
            var DOCUMENTO=$("#DOCUMENTO").val();
            var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
            var REGISTROS=$("#REGISTROS").val();

           alert("CLAVE_DOCUMENTO :"+CLAVE_DOCUMENTO + "DOCUMENTO :"+DOCUMENTO + "ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL
                                    + "REGISTROS :"+REGISTROS);



            datos=[];
            datos.push(CLAVE_DOCUMENTO);
            datos.push(DOCUMENTO);
            datos.push(ID_EMPLEADOMODAL);
            datos.push(REGISTROS);

            saveToDatabaseDatosFormulario(datos);

});

$("#btn_limpiar").click(function(){

          $("#CLAVE_DOCUMENTO").val("");
          $("#DOCUMENTO").val("");
          $("#REGISTROS").val("");


});

}); //LLAVE CIERRE FUNCTION


function listarDatos()
{
    $.ajax
    ({
        url:'../Controller/DocumentosController.php?Op=Listar',
        type:'GET',
        beforeSend:function()
        {
            $('#loader').show();
        },
        success:function(datosDoc)
        {
            listarEmpleados(datosDoc);
        },
        error:function(error)
        {
            $('#loader').hide();
        }
    });
};


function listarEmpleados(datosDoc)
{
    $.ajax
    ({
        url:'../Controller/EmpleadosController.php?Op=mostrarcombo',
        type:'GET',
        success:function(datosEmp)
        {
            reconstruirTable(datosDoc,datosEmp);
        }
    });
}

function reconstruirTable(datosDoc,datosEmp)
{
    cargaTodo=0;
    tempData="";
    $.each(datosDoc,function(index,value){
        tempData+= reconstruir(value,cargaTodo,datosEmp);
    });
    
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}

function reconstruir(value,carga,datosEmp)
{
    tempData="";
    
    if(carga==0)
    tempData += "<tr id='registro_"+value.id_documento+"'>"
    tempData += "<td class='celda' width='25%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'documentos','clave_documento',"+value.id_documento+",'id_documento')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.clave_documento+"</td>";
    tempData += "<td class='celda' width='25%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'documentos','documento',"+value.id_documento+",'id_documento')\" \n\
                     onkeyup=\"detectarsihaycambio()\">"+value.documento+"</td>";
//    tempData += "<td class='celda' width='25%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'documentos','id_empleado',"+value.id_documento+",'id_documento')\" \n\
//                     onkeyup=\"detectarsihaycambio()\">"+value.id_empleado+"</td>";
    
    tempData += '<td><select class="select" onchange=\"saveComboToDatabase(\'id_empleado\',this,'+value.id_documento+')\">';
    $.each(datosEmp,function(index2,value2)
    {
        tempData += "<option value='"+value2.id_empleado+"'>";
        if(value.id_empleado==value2.id_empleado)
    });
    
    tempData += '</select></td>';
    
    
    tempData += "<td class='celda' width='25%'><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"><i class='fa fa-trash'></i></button></td>";
    
    if(carga==0)
      tempData+="</tr>";
  
  return tempData;
}


