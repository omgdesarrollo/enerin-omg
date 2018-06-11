
 $(function(){
                           
    
                          
                        $('.select').on('change', function() {
                          column="ID_EMPLEADO";
                          val=$(this).prop('value');
                          
                      
                              alert("entro aqui ");
          
                          $.ajax({
                                url: "../Controller/ClausulasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+val+'&id='+idclausula,
				success: function(data){
                                    
                                        swal("Actualizacion Exitosa!", "Ok!", "success");
                                        refresh();

				}   
                           });
                       
                          
                        });
                        
                        
                        $('#CLAUSULA').keyup(function(){
                            
                       var valueclausula = $(this).val();   
                       if(valueclausula!=""){
                           var dataString = valueclausula;
                            loadAutocomplete(dataString);
                            
                            
                       }
                         
                           });
                        
                        
                        
                        
                        
                        $("#btn_guardar").click(function(){
       
        
                                    var CLAUSULA=$("#CLAUSULA").val();
                                    var DESCRIPCION_CLAUSULA=$("#DESCRIPCION_CLAUSULA").val();
                                    var SUB_CLAUSULA=$("#SUB_CLAUSULA").val();
                                    var DESCRIPCION_SUB_CLAUSULA=$("#DESCRIPCION_SUB_CLAUSULA").val();
                                    var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
                                    var DESCRIPCION=$("#DESCRIPCION").val();
                                    var PLAZO=$("#PLAZO").val();
                            

                                    datos=[];
                                    datos.push(CLAUSULA);
                                    datos.push(DESCRIPCION_CLAUSULA);
                                    datos.push(SUB_CLAUSULA);
                                    datos.push(DESCRIPCION_SUB_CLAUSULA);
                                    datos.push(ID_EMPLEADOMODAL);
                                    datos.push(DESCRIPCION);
                                    datos.push(PLAZO);
                                    saveToDatabaseDatosFormulario(datos);
                                    
                        });
                        
 


                        $("#btn_limpiar").click(function(){
                                  $("#CLAUSULA").val("");
                                  $("#DESCRIPCION_CLAUSULA").val("");
                                  $("#SUB_CLAUSULA").val("");
                                  $("#DESCRIPCION_SUB_CLAUSULA").val("");
                                  //$("#ID_EMPLEADOMODAL").val("");
//                                  $("#TEXTO_BREVE").val("");
                                  $("#DESCRIPCION").val("");
                                  $("#PLAZO").val("");
                                                                      
                        });
                        
  
                      }); //Se cierra el function







//1 .funciones para consultar informacion y construir datos 
  function contruirContenido()
 {
     
  $.ajax({
   url:"../Controller/ClausulasController.php?Op=Listar",
   method:"POST",
    success:function(data)
    {
     
         for(var count=0; count<data.length; count++)
         {
          var html_data = '<tr><td  class="celda-no-editable" width="12%">'+data[count].clausula+'</td>';
          html_data += '<td class="celda" width="20%" OnClick="obtener(\'h\')" class="descripcion_clausula" >' +data[count].descripcion_clausula+'</td>';
          html_data += '<td class="celda" width="10%"  class="sub_clausula" >'+data[count].sub_clausula+'</td>';
          html_data += '<td class="celda" width="20%"  class="descripcion">'+data[count].descripcion_sub_clausula+'</td>';
          html_data += '<td class="celda" width="20%"  class="id_empleado" >'+data[count].id_empleado+'</td>';
          html_data += '<td class="celda" width="10%"  class="descripcion" >'+data[count].descripcion+'</td>';
          html_data += '<td class="celda" width="6%"  class="plazo" >'+data[count].plazo+'</td></tr>';
          $('#datosGenerales').append(html_data);

         }
    }
  })
 }

function obtener(v){
    alert("d"+v);
}


//1. termina 
function consultarInformacion(url){
              $("#loader").show();
              $.ajax({  
                    url: ""+url,  
                   success: function(r) 
                   {
                       $("#idTable").load("ClausulasView.php #idTable")
                       $("#loader").hide();                        
                    },
                    error:function(){
                       $("#loader").hide();                         
                    }

             });  
}

                
                
function loadAutocomplete(dataString){
    $.ajax({
            type: "POST",
            url: "../Controller/ClausulasController.php?Op=loadAutoComplete",
            data: "cadenaclausula="+dataString,
            success: function(data) 
            {
                    var dato="";
                        $.each(data, function (index,value) {
                                if(value.sub_clausula!=""){
                                        dato=value.descripcion_clausula;

                                }
                        });

                    $('#DESCRIPCION_CLAUSULA').val(dato);
                    if(dato==""){
                        $('#DESCRIPCION_CLAUSULA').prop("readonly",false);
                    }else{
                        if(dato!=""){
                            $('#DESCRIPCION_CLAUSULA').prop("readonly",true);   
                        }
                    }


             }
        }); 
}
                                                                   
function loadSpinner(){
        myFunction();
}
function refresh(){
   consultarInformacion("../Controller/ClausulasController.php?Op=Listar"); 
 }
 
 
     function saveToDatabaseDatosFormulario(datos){;
                    
                    	$.ajax({
                                url: "../Controller/ClausulasController.php?Op=Guardar",
				type: "POST",
				data:'CLAUSULA='+datos[0]+'&DESCRIPCION_CLAUSULA='+datos[1]+'&SUB_CLAUSULA='+datos[2]
                                                       +'&DESCRIPCION_SUB_CLAUSULA='+datos[3]+'&ID_EMPLEADO='+datos[4]
                                                       +'&DESCRIPCION='+datos[5]+'&PLAZO='+datos[6],
                                    success: function(data)
                                    {

                                            swal("Guardado Exitoso!", "Ok!", "success")
                                            refresh();
                                    }   
		               });
    }
                
                
function detectarsihaycambio(){

si_hay_cambio=true;
}

function saveComboToDatabase(column,id){
idclausula=id;

}

function saveToDatabase(editableObj,column,id) {
                    
        if(si_hay_cambio==true)
        {
            $("#btnrefrescar").prop("disabled",true);
            $(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            $.ajax({
                    url: "../Controller/ClausulasController.php?Op=Modificar",
                    type: "POST",
                    data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
                    success: function(data)
                    {
                            $(editableObj).css("background","#FDFDFD");
                            swal("Actualizacion Exitosa!", "Ok!", "success");
                            refresh();

                            $("#btnrefrescar").prop("disabled",false);
                            si_hay_cambio=false;

                    }   
            });

        }
}
             
function showEdit(editableObj) {
        $(editableObj).css("background","#FFF");
} 



		
                
                
                
                
                
                
                
                

