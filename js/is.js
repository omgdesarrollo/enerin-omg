$(function(){
   let cualbotonPresiono="ninguno";
//    $('.modal').modal();
//    var instance = M.Modal.getInstance("modalRecuperarPassword");
//    loginform
    $("#IngresoLog").click(function(e){
        
// console.log("da  ",$("#datosDiv").serialize());
//        alert();
//        jQuery("#loginform").submit(function(e){
//                                    alert("ya entro aqui ");
//para introducir mas datos al objeto serializado se le asigna por  ejemplo  +&b= 2
//los name son los que se obtiene cuando serializas los datos del form
        $("#IngresoLog").attr("disabled",true);
        e.preventDefault();
        
        var formData = $("#loginform").serialize();
        $.ajax({
            type: "POST",
            url: "../Controller/LoginController.php",
            data:formData,
            success: function(r)
            {
                if(r.success==true)
                {
                    var delay = 1000;
                    if(r.accesos=="si"){
//                                                            $.jGrowl("Acceso a vistas exitosa", { sticky: true });
                        var delay = 1000;
                        if(r.contrato=="si"){
//                                                                 $.jGrowl("Tiene contrato Asginado", { sticky: true });
                                $.jGrowl("Cargando  Porfavor Espere......", { sticky: true,theme:"themeG-wait" });
                                $.jGrowl("Bienvenido", { header: 'Acceso Permitido',theme:"themeG-success" });
                                var delay = 1000;
                                setTimeout(function(){ window.location = 'principalmodulos.php?type='+$("#t").val() }, delay);  
                        }else{
                                $.jGrowl("Error no  tiene contrato asignado", { header: 'Error acceso contratos',theme:"themeG-error" });
                                var delay = 1000;
                                $("#IngresoLog").attr("disabled",false);
                        }
                    }else
                    {
                            $.jGrowl("Error no tiene acceso al menos en una vista", { header: 'Error acceso a la vista' });
                                var delay = 1000;
                                $("#IngresoLog").attr("disabled",false);
                    }
                }
                else
                {
                    if(r.success==false){
                            $.jGrowl("Porfavor checa tu Usuario y Password", { header: 'Error de inicio de sesion',theme:"themeG-error" });
                            var delay = 1000;
                            $("#IngresoLog").attr("disabled",false);
                    }
                }
        },
                                    error:function(){
//                                                            alert("hubo un error al tratar de realizar la peticion ajax ");
                                        $.jGrowl("Error......", { sticky: true });
                                        $("#IngresoLog").attr("disabled",false);
                                    }
            });
                    return false;
                });
                
   $("#recuperarPassword").click(function(e){
     cualbotonPresiono="btnRecuperarPassword";
     e.preventDefault();
      $("#modalRecuperarPassword").modal('open');
   });  
   
   $("#aceptarRecuperar").click(function(e){
//        alert("ace"); 
        e.preventDefault();
        var d={"type":"POST","url":"../Controller/EmailController.php?Op=recuperarPassword","tipoDatos":"json","dataSend":[{"usuario":$("#usuarioRecuperar").val(),"t":$("#t").val(),"baseUri":$("#informacion")["0"]["baseURI"]}]};
        $("#informacion")[0]["listaDatos"]=d;

          console.log("f ", $("#informacion"));
          recuperarPassword(d).then(function (){
              console.log("ya termino");
          });   
   })       
 //este metodo se le agregara otra funcion que sera una general para varios tipos de peticiones de datos  aun se anda viendo si se le agregara la otra funcion 
    function recuperarPassword(){
        return new Promise(function(resolve,reject){ 
            $.ajax({
                     type:    ""+$("#informacion")[0]["listaDatos"]["type"], // POST, GET, PUT, DELETE
                     url:     ""+$("#informacion")[0]["listaDatos"]["url"], //http:/ /www.ejemplo.com/peticion
                     dataType:""+$("#informacion")[0]["listaDatos"]["tipoDatos"], // html, xml, json
                     data:{"listaDatos":JSON.stringify($("#informacion")[0]["listaDatos"]["dataSend"])},
                     success: function(r){
                         resolve();
                     } ,
                     error: function(){
                         reject();
//                                                     console.log("Ha ocurrido un error! :(");	 			
                     }
                     });    
        })
    }
    

    avisoImportanteParaConsolaDesarrollador();
    
});
           