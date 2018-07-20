 listarDatos();

$(function(){
                                                                              
$("#CLAVE_DOCUMENTO").keyup(function(){
    var valueclavedocumento=$(this).val();

    verificarExiste(valueclavedocumento,"clave_documento");

});


//$('.select').on('change', function() {
//  column="ID_EMPLEADO";
//  val=$(this).prop('value');
//   $.ajax({
//        url: "../Controller/DocumentosController.php?Op=Modificar",
//        type: "POST",
//        data:'column='+column+'&editval='+val+'&id='+id_clausula,
//        success: function(data){
//             consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
//             swal("Actualizacion Exitosa!", "Ok!", "success")
//
//
//        }   
//   });
//
//
//});


$("#btn_guardar").click(function(){

            var CLAVE_DOCUMENTO=$("#CLAVE_DOCUMENTO").val();
            var DOCUMENTO=$("#DOCUMENTO").val();
            var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
//            var REGISTROS=$("#REGISTROS").val();

           alert("CLAVE_DOCUMENTO :"+CLAVE_DOCUMENTO + "DOCUMENTO :"+DOCUMENTO + "ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL);

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
}


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
    tempData += "<tr id='registro_"+value.id_documento+"' name='registro_'>"
    tempData += "<td class='celda' width='33%' contenteditable='true' onBlur=\"saveToDatabase(this,'documentos','clave_documento',"+value.id_documento+",'id_documento')\"\n\
                     onkeyup=\"detectarsihaycambio()\">"+value.clave_documento+"</td>";
    tempData += "<td class='celda' width='33%' contenteditable='true' onBlur=\"saveToDatabase(this,'documentos','documento',"+value.id_documento+",'id_documento')\" \n\
                     onkeyup=\"detectarsihaycambio()\">"+value.documento+"</td>";    
    tempData += '<td class="celda" width="33%"><select class="select" onchange="saveComboToDatabase(\'id_empleado\',this,'+value.id_documento+')">';
        $.each(datosEmp,function(index2,value2)
        {
            tempData += "<option value='"+value2.id_empleado+"'";
            if(value.id_empleado==value2.id_empleado)
                tempData+="selected";
                tempData+=">"+value2.nombre_empleado+" "+value2.apellido_paterno+" "+value2.apellido_materno+"</option>";
        });
    
    tempData += '</select></td>';
//    tempData += "<td class='celda' width='25%'><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"><i class='fa fa-trash'></i></button></td>";
    
    if(carga==0)
      tempData+="</tr>";
  
  return tempData;
}

function saveToDatabase(ObjetoThis,tabla,columna,id,contexto) 
{
//        alert("entro al save");            
        
            $(ObjetoThis).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            $.ajax({
                    url: "../Controller/GeneralController.php?Op=ModificarColumna",
                    type: "POST",
                    data:'VALOR='+ObjetoThis.innerHTML+' &TABLA='+tabla+' &COLUMNA='+columna+'  &ID='+id+' &ID_CONTEXTO='+contexto+'',
                    
                    success: function(data)
                    {
//                        console.log(valor);
                        $(ObjetoThis).css("background","");
                    }   
            });  

}

function saveComboToDatabase(column,val,iddocumento)
{
//    alert("entro al save");

    valorobjeto= val[val.selectedIndex].value;
    console.log(valorobjeto);
    
    $.ajax({
        url: "../Controller/DocumentosController.php?Op=Modificar",
        type: "POST",
        data:'column='+column+'&editval='+valorobjeto+'&id='+iddocumento,
        success: function(data){
//        alert("Estos son los datos"+data);    
                swal("Actualizacion Exitosa!", "", "success");
                setTimeout(function(){swal.close();},1000);
        }   
   });

}

function saveToDatabaseDatosFormulario(datos)
{
    $.ajax({
        
        url:"../Controller/DocumentosController.php?Op=Guardar",
        type:"POST",
        data:"CLAVE_DOCUMENTO="+datos[0]+"&DOCUMENTO="+datos[1]+"&ID_EMPLEADO="+datos[2],
        success:function(data)
        {
            swal("Guardado Exitoso!", "", "success");
                 setTimeout(function()
                 {
                     swal.close();
                     $("#create-item .close").click();
                 },1000);
            
        }
        
    });
}


//function detectarsihaycambio(value){                   
//    si_hay_cambio=true;   
//}

function verificarExiste(dataString,cualverificar){

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
                                 
                
                
function refresh(){
    listarDatos();
}
                
                
                
function loadSpinner(){
        myFunction();
}


function filterTableClaveDocumento() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputClaveDocumento");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      } 
    }
}



function filterTableNombreDocumento() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputNombreDocumento");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      } 
    }
}


function filterTableResponsableDocumento() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInputResponsableDocumento");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
          select=td.getElementsByTagName("select");
          $.each(select,function(index,value)
          {
                var indexRes = value.selectedIndex;
                var responsable=value[indexRes].innerHTML;
                console.log(responsable);
              if (responsable.toUpperCase().indexOf(filter) > -1)
              {
                tr[i].style.display = "";
              }
              else
              {
                tr[i].style.display = "none";
              }
          });

      } 
    }
}
