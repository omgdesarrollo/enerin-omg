

$(function(){

    $("#btn_guardar").click(function(){

              var NOMBRE_EMPLEADO=$("#NOMBRE_EMPLEADO").val();
              var APELLIDO_PATERNO=$("#APELLIDO_PATERNO").val();
              var APELLIDO_MATERNO=$("#APELLIDO_MATERNO").val();
              var CATEGORIA=$("#CATEGORIA").val();
              var CORREO=$("#CORREO").val();
                datos=[];
                datos.push(NOMBRE_EMPLEADO);
                datos.push(APELLIDO_PATERNO);
                datos.push(APELLIDO_MATERNO);
                datos.push(CATEGORIA);
                datos.push(CORREO);
                correcto=validarCamposVacios(datos);
//                alert("e  : "+correcto);
                if(correcto!==false){

                saveToDatabaseDatosFormulario(datos);
            }else{
              
            }

    });

     $("#btn_limpiar").click(function(){
              $("#NOMBRE_EMPLEADO").val("");
              $("#APELLIDO_PATERNO").val("");
              $("#APELLIDO_MATERNO").val("");
              $("#CATEGORIA").val("");
              $("#CORREO").val("");
    });


}); // se cierra el $function


function listarDatos()
{
    $.ajax
    ({
        url: '../Controller/EmpleadosTareasController.php?Op=Listar',
        type: 'GET',
        beforeSend:function()
        {
            $('#loader').show();
        },
        success:function(datos)
        {
//            data = datos;
            reconstruirTable(datos);
        },
        error:function(error)
        {
            $('#loader').hide();
        }
    });
}



function reconstruirTable(data)
{
    cargaTodo=0;
    tempData="";
    
    $.each(data,function(index,value){
        
            tempData += reconstruir(value,cargaTodo);
    });
     
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}



function reconstruir(value,carga)
{
    tempData = "";
    
                if(carga==0)
                tempData += "<tr id='registro_"+value.id_empleado+"' name='registro_'>";
                tempData += "<td class='celda' width='22%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','nombre_empleado',"+value.id_empleado+",'id_empleado')\" \n\
                                  onkeyup=\"detectarsihaycambio()\" >"+value.nombre_empleado+"</td>";
                tempData += "<td class='celda' width='16%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','apellido_paterno',"+value.id_empleado+",'id_empleado')\" \n\
                                  onkeyup=\"detectarsihaycambio()\">"+value.apellido_paterno+"</td>";
                tempData += "<td class='celda' width='16%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','apellido_materno',"+value.id_empleado+",'id_empleado')\" \n\
                                  onkeyup=\"detectarsihaycambio()\">"+value.apellido_materno+"</td>";
                tempData += "<td class='celda' width='16%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','categoria',"+value.id_empleado+",'id_empleado')\" \n\
                                  onkeyup=\"detectarsihaycambio()\">"+value.categoria+"</td>";
                tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','correo',"+value.id_empleado+",'id_empleado')\" \n\
                                  onkeyup=\"detectarsihaycambio()\">"+value.correo+"</td>";
                tempData += "<td class='celda' width='15%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'empleados','fecha_creacion',"+value.id_empleado+",'id_empleado')\" \n\
                                  onkeyup=\"detectarsihaycambio()\">"+value.fecha_creacion+"</td>";                    
                
                if(carga==0)
                tempData += "</tr>";
    
        return tempData;                                                        
}


function reconstruirRow(id)
{
    //alert("Entro en ReconstruirRow");
    cargaUno=1;
    tempData="";
    
    $.ajax({
        url:"../Controller/EmpleadosTareasController.php?Op=ListarEmpleado",
        type:'GET',
        data:'ID_EMPLEADO='+id,
        success:function(datos)
        {
            //alert("entro al success"+"-"+datos);
            $.each(datos, function(index,value){
                
               tempData = reconstruir(value,cargaUno);
               $('#registro_'+id).html(tempData);
               $('#loader').hide();
               swal("","Modificado","success");
               setTimeout(function(){swal.close();},1000);
               
            });
        },
        error:function()
        {
            swal("","Error del servidor","error");
            setTimeout(function(){swal.close();},1000);
        }
    })   
}


function detectarsihaycambio() {
                    
    si_hay_cambio=true;
}


function saveSingleToDatabase(Obj,tabla,columna,id,contexto) {
    console.log(Obj.innerHTML+"-"+columna+"-"+tabla+"-"+id+"-"+contexto+"-"+si_hay_cambio);
            if(si_hay_cambio==true){
            //alert("si hay cambio");    
            $("#btnrefrescar").prop("disabled",true);
            
            $(Obj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            
            saveOneToDatabase(Obj.innerHTML,columna,tabla,id,contexto);
            //$(Obj).css("background","#FDFDFD");
           
            si_hay_cambio=false;

        } 

    }
      
 function saveOneToDatabase(valor,columna,tabla,id,contexto)
    {
        //alert("Entro aqui");
        $.ajax({
                url: "../Controller/GeneralController.php?Op=ModificarColumna",
                type: 'GET',
                data: 'TABLA='+tabla+'&COLUMNA='+columna+'&VALOR='+valor+'&ID='+id+'&ID_CONTEXTO='+contexto,
                success: function(modificado)
                {
//                    alert("Entro en modificado"+modificado);
                    if(modificado==true)
                    {
//                        alert("Entro en modificado true"+modificado);
                        reconstruirRow(id);
//                         $('#loader').hide();
//                         swal("","Modificado","success");
//                         setTimeout(function(){swal.close();},1000);
                    }
                    else
                    {
                        $('#loader').hide();
                        swal("","Ocurrio un error al modificar", "error");
                    }
                  $("#btnrefrescar").prop("disabled",false);  
                },
                error:function()
                {
                    $('#loader').hide();
                    swal("","Ocurrio un error al modificar", "error");
                    $("#btnrefrescar").prop("disabled",false);
                }
            });
    }
    
    
    



function saveToDatabaseDatosFormulario(datos){

                    
$.ajax({
    url: "../Controller/EmpleadosTareasController.php?Op=Guardar",
    type: "POST",
    data:'NOMBRE_EMPLEADO='+datos[0]+'&APELLIDO_PATERNO='+datos[1]+'&APELLIDO_MATERNO='+datos[2]+'&CATEGORIA='+datos[3]+'&CORREO='+datos[4],
    success: function(data)
    {
            if(data==1)
             {
//                  alert("Entro al true");
                 swal("Guardado Exitoso!", "", "success");
                 setTimeout(function()
                 {
                     swal.close();
                     $("#create-item .close").click();
                 },1000);
                 
             }
             
             if(data!=1 && data!=-1)
             {
//                 alert("Entro al false");
                 mensaje = "Nombre:"+data[0].nombre_empleado+" "+data[0].apellido_paterno+" "+data[0].apellido_materno;
                 mensaje += "\nCategorita:"+data[0].categoria;
                 mensaje += "\nCorreo:"+data[0].correo;
                 mensaje += "\nDesea agregar el empleado a este modulo?";
                 swal({
                        title:"Ya existe este empleado:",
                        text: mensaje,
                        type: "info",
                        showCancelButton: true,
                        confirmButtonText:"Agregar",
                        cancelButtonText:"Regresar",
                        showLoaderOnConfirm: true,
                        textLoaderOnConfirm:true,


                        }, function(isConfirm)
                        {
                            if(isConfirm)
                            {
//                                alert("OK");
                                $.ajax({
                                        url:'../Controller/EmpleadosTareasController.php?Op=GuardarIdentificador',
                                        type:'POST',
                                        data:'ID='+data[0].id_empleado+ '&IDENTIFICADOR='+data[0].identificador,
                                        success:function(resultado)
                                        {
                                            if(resultado==true)
                                            {
                                                swal("Guardado Exitoso!", "", "success");
                                                setTimeout(function()
                                                {
                                                    swal.close();
                                                    $("#create-item .close").click();
                                                },1000);                                            
                                            }
                                        }
                                  
                                        });

                            }
                            else{
//                                alert("cancel");
                                $("#NOMBRE_EMPLEADO").val("");
                                $("#APELLIDO_PATERNO").val("");
                                $("#APELLIDO_MATERNO").val("");
                                $("#CATEGORIA").val("");
                                $("#CORREO").val("");                                
                            }
                                    
                     });                                  
             }
             
             if(data==-1)
             {
//                 alert("Entro al vacio");
                 swal("Este empleado ya existe", "", "info");
                 setTimeout(function()
                 {
                     swal.close();
                     $("#create-item .close").click();
                 },1000);                                        
             }
    }   
});

}


function validarCamposVacios(datos){
    correcto=false;
    var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    //alert("entro "+datos[0]+" "+datos[1]+" "+datos[2]+" "+datos[3]+" "+datos[4]+"");

if(datos[0] == ""){
$("#mensaje1").fadeIn();
$("#mensaje1").append("Ingrese El Nombre");
$("#mensaje1").css("background-color","red");
$("#mensaje1").css("width", "35%");

correcto=false;

} else{
    $("#mensaje1").fadeOut();
    correcto=true;
    if(datos[1] == ""){
        $("#mensaje2").fadeIn();
        $("#mensaje2").append("Ingrese El Apellido Paterno");
        correcto=false;


    } else {
         $("#mensaje2").fadeOut();
         correcto=true;
         if(datos[2] == ""){
              $("#mensaje3").fadeIn();
              $("#mensaje3").append("Ingrese El Apeliido Materno");
              correcto=false;

         } else {
                $("#mensaje3").fadeOut();
                 correcto=true;
                if(datos[3] == ""){
                    $("#mensaje4").fadeIn();
                    $("#mensaje4").append("Ingrese Categoria");
                    correcto=false;

                } else {
                       $("#mensaje4").fadeOut();
                       correcto=true;
                       if(datos[4] == "" || !expr.test(datos[4])){
                       $("#mensaje5").fadeIn();
                        $("#mensaje5").html("Ingrese Correo");
                         correcto=false;

                       }else{
                            $("#mensaje5").fadeOut();
                            correcto=true;

                       }

                       } //cuarto else

                }// tercer else

}//segundo else


} //primer else

return correcto;    
}


function refresh(){
    listarDatos();
}


function loadSpinner(){
        myFunction();
}


function filterTable() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("idInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("idTable");
    tr = table.getElementsByTagName("tr");

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
function filterTableapellidoPaterno() {
   var input, filter, table, tr, td, i;
   input = document.getElementById("idInputapellidopaterno");
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
function filterTableapellidoMaterno() {
   var input, filter, table, tr, td, i;
   input = document.getElementById("idInputapellidomaterno");
   filter = input.value.toUpperCase();
   table = document.getElementById("idTable");
   tr = table.getElementsByTagName("tr");

   for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[2];
     if (td) {
       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
         tr[i].style.display = "";
       } else {
         tr[i].style.display = "none";
       }
     } 
   }
}
function filterTableCategoria(){
   var input, filter, table, tr, td, i;
   input = document.getElementById("idInputCategoria");
   filter = input.value.toUpperCase();
   table = document.getElementById("idTable");
   tr = table.getElementsByTagName("tr");

   for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[3];
     if (td) {
       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
         tr[i].style.display = "";
       } else {
         tr[i].style.display = "none";
       }
     } 
   }
}
