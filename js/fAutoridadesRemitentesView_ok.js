
$(function(){
    
    $("#btn_guardar").click(function(){
        
        var CLAVE_AUTORIDAD=$("#CLAVE_AUTORIDAD").val();
        var DESCRIPCION=$("#DESCRIPCION").val();
        var DIRECCION=$ ("#DIRECCION").val();
        var TELEFONO=$ ("#TELEFONO").val();
        var EXTENSION=$ ("#EXTENSION").val();
        var EMAIL=$ ("#EMAIL").val();
        var DIRECCION_WEB=$ ("#DIRECCION_WEB").val();
        
        datos=[];
        datos.push(CLAVE_AUTORIDAD);
        datos.push(DESCRIPCION);
        datos.push(DIRECCION);
        datos.push(TELEFONO);
        datos.push(EXTENSION);
        datos.push(EMAIL);
        datos.push(DIRECCION_WEB);
        
        correcto=validarCamposVacios(datos);
        
        if(correcto!==false)
        {
            saveToDatabaseDatosFormulario(datos);
        } else {
            
        }
        
    });
    
}); //CIERRA EL FUNCTION


function validarCamposVacios(datos)
{
    correcto=false;
    var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    
    if(datos[0] == ""){
        $("#mensaje1").fadeIn();
        $("#mensaje1").append("Ingrese la Autoridad Remitente");
        $("#mensaje1").css("background-color","red");
        $("#mensaje1").css("width", "35%");

        correcto=false;
    } else{
        $("#mensaje1").fadeOut();
        correcto=true;
            if(datos[1] == ""){
                $("#mensaje2").fadeIn();
                $("#mensaje2").append("Ingrese la Descripcion");
                $("#mensaje2").css("background-color","red");
                $("#mensaje2").css("width", "35%");
                correcto=false;
            } else {
                $("#mensaje2").fadeOut();
                correcto=true;
                    if(datos[2] == ""){
                         $("#mensaje3").fadeIn();
                         $("#mensaje3").append("Ingrese la Direccion");
                         $("#mensaje3").css("background-color","red");
                         $("#mensaje3").css("width", "35%");
                         correcto=false;
                    } else {
                        $("#mensaje3").fadeOut();
                        correcto=true;
                            if(datos[3] == ""){
                                $("#mensaje4").fadeIn();
                                $("#mensaje4").append("Ingrese el Telefono");
                                $("#mensaje4").css("background-color","red");
                                $("#mensaje4").css("width", "35%");
                                correcto=false;
                            } else {
                                $("#mensaje4").fadeOut();
                                correcto=true;
                                    if(datos[4] == ""){
                                    $("#mensaje5").fadeIn();
                                    $("#mensaje5").html("Ingrese la Extension");
                                    $("#mensaje5").css("background-color","red");
                                    $("#mensaje5").css("width", "35%");
                                    correcto=false;
                                    } else {
                                        $("#mensaje5").fadeOut();
                                        correcto=true;
                                            if(datos[5] == "" || !expr.test(datos[5])){
                                            $("#mensaje6").fadeIn();
                                            $("#mensaje6").html("Ingrese el Email");
                                            $("#mensaje6").css("background-color","red");
                                            $("#mensaje6").css("width", "35%");
                                            correcto=false;
                                            } else {
                                                $("#mensaje6").fadeOut();
                                                correcto=true;
                                                    if(datos[6] == ""){
                                                    $("#mensaje7").fadeIn();
                                                    $("#mensaje7").html("Ingrese la Direccion Web");
                                                    $("#mensaje7").css("background-color","red");
                                                    $("#mensaje7").css("width", "35%");
                                                    correcto=false;
                                                    } else {
                                                        $("#mensaje7").fadeOut();
                                                        correcto=true;
                                                        
                                                    }//septimo else
                                                
                                            }//sexto else
                                        
                                    } //quinto else
                                    
                            }//cuarto else
                        
                    }//tercer else
                    
                    
            }//segundo else
        
    }//primer else
    
    return correcto;       
}

function saveToDatabaseDatosFormulario(datos)
{
    $.ajax({
        url:'../Controller/AutoridadesRemitentesController.php?Op=Guardar',
        type:'POST',
        data:'CLAVE_AUTORIDAD='+datos[0]+'&DESCRIPCION='+datos[1]+'&DIRECCION='+datos[2]+'&TELEFONO='+datos[3]+'&EXTENSION='+datos[4]+'&EMAIL='+datos[5]+'&DIRECCION_WEB='+datos[6],
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


function listarDatos()
{
    $.ajax
    ({
        url:'../Controller/AutoridadesRemitentesController.php?Op=Listar',
        type:'GET',
        beforeSend:function()
        {
            $('#loader').show();
        },
        success:function(datos)
        {
            construirTable(datos)
        },
        error:function(error)
        {
            $('#loader').hide();
        }        
        
    });
}

function construirTable(datos)
{
    cargaTodo=0;
    tempData="";
    
    $.each(datos,function(index,value){
        
        tempData += construir(value,cargaTodo);
    });
    
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}

function construir(value,cargaTodo)
{
    tempData="";
    
        if(cargaTodo==0)
            tempData += "<tr id='registro_"+value.id_autoridad+"'>";
            tempData += "<td class='celda' width='12%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','clave_autoridad',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.clave_autoridad+"</td>";
            tempData += "<td class='celda' width='20%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','descripcion',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.descripcion+"</td>";
            tempData += "<td class='celda' width='20%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','direccion',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.direccion+"</td>";
            tempData += "<td class='celda' width='12%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','telefono',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.telefono+"</td>";
            tempData += "<td class='celda' width='12%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','extension',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.extension+"</td>";
            tempData += "<td class='celda' width='12%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','email',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.email+"</td>";
            tempData += "<td class='celda' width='12%' contenteditable='true' onBlur=\"saveSingleToDatabase(this,'autoridad_remitente','direccion_web',"+value.id_autoridad+",'id_autoridad')\" \n\
                                      onkeyup=\"detectarsihaycambio()\" >"+value.direccion_web+"</td>";
        if(cargaTodo==0)
            tempData += "</tr>"
    
    return tempData;
}


function detectarsihaycambio() {
                    
    si_hay_cambio=true;
}

function saveSingleToDatabase(Objeto,tabla,columna,id,contexto)
{
    if(si_hay_cambio==true)
    {
        $("#btnrefrescar").prop("disabled",true);
        $(Objeto).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
        
        saveOneToDatabase(Objeto.innerHTML,columna,tabla,id,contexto);
        
        si_hay_cambio=false;
    }
    
}

function saveOneToDatabase(valor,columna,tabla,id,contexto)
{
//    alert("Entro al save one");
    $.ajax({
        url:'../Controller/GeneralController.php?Op=ModificarColumna',
        type:'POST',
        data:'TABLA='+tabla+'&COLUMNA='+columna+'&VALOR='+valor+'&ID='+id+'&ID_CONTEXTO='+contexto,
        success:function(modificado)
        {
            if(modificado==true)
            {
                reconstruirFila(id)
            } else {
                $('#loader').hide();
                swal("","Ocurrio un error al modificar", "error");
            }
        },
        error:function()
        {
            $('#loader').hide();
            swal("","Ocurrio un error al modificar", "error");
            $("#btnrefrescar").prop("disabled",false);
        }
        
    });
}

function reconstruirFila(id)
{
    cargaUno=1;
    tempData="";
    
    $.ajax({
        url:'../Controller/AutoridadesRemitentesController.php?Op=listarAutoridad',
        type:'POST',
        data:'ID_AUTORIDAD='+id,
        success:function(datos)
        {
            $.each(datos,function(index,value){
                
                tempData = construir(value,cargaUno);
                $('#registro_'+id).html(tempData);
                $('#loader').hide();
                swal("","Modificado","success");
               setTimeout(function(){swal.close();},1000);
               $("#btnrefrescar").prop("disabled",false);
                
            });
            
        },
        error:function()
        {
            swal("","Error del servidor","error");
            setTimeout(function(){swal.close();},1000);
        }
        
    });
}



function refresh(){
    listarDatos();
}




function loadSpinner(){
        myFunction();
}


