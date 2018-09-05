function ajaxHibrido(paramAjaxValues,funciones){
  return new Promise((resolve,reject)=>
    {
    $.ajax
    (
     {
        url:""+paramAjaxValues["url"],
        type:""+paramAjaxValues["type"],
        data:paramAjaxValues["paramDataValues"],
        async:paramAjaxValues["async"],
        beforeSend:function()
        {
            growlWait("Solicitud","Solicitando Datos...");
//            $('#loader').show();
        },
        success:function(response)
        {    
           growlSuccess(mensajesjGrowl[0]["header"],mensajesjGrowl[0]["header"]);
            funciones[0](response);
            resolve();
//            $('#loader').hide();    
        },
        error:function(error)
        {
             growlError("Error","Error en el servidor");
            reject();
//            $('#loader').hide();
        }
    }       
    );
    
    
    });
        
};
function getJSONSendData(paramAjaxValues,funciones){
$.getJSON(paramAjaxValues["url"],paramAjaxValues["paramDataValues"],sucess=function (response,status,xhr){
   funciones[0](response); 
});

    
    
};




