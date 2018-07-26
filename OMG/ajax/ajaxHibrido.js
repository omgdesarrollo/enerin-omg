function ajaxHibrido(paramAjaxValues,funciones){
    $.ajax
    (
     {
        url:""+paramAjaxValues["url"],
        type:""+paramAjaxValues["type"],
        data:paramAjaxValues["paramDataValues"],
        async:paramAjaxValues["async"],
        beforeSend:function()
        {
//            $('#loader').show();
        },
        success:function(response)
        {    
            funciones[0](response);
//            $('#loader').hide();
                
        },
        error:function(error)
        {
//            $('#loader').hide();
        }
    }       
    );  
};
function ajaxHibridoObtencioDatosSinEnvioDeLadoCliente(paramAjaxValues,funciones){

    $.ajax
    (
     {
        url:""+paramAjaxValues["url"],
        type:""+paramAjaxValues["type"],
        async:paramAjaxValues["async"],
        beforeSend:function()
        {
//            $('#loader').show();
        },
        success:function(response)
        {    
            funciones[0](response);
//            $('#loader').hide();
                
        },
        error:function(error)
        {
//            $('#loader').hide();
        }
    }       
    );
    
    
};




