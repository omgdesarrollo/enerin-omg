$(function(){
    
    $("#btn_guardar").click(function()
    {
        documentoSalidaDatos=new Object();
        documentoSalidaDatos.id_documento_entrada = $("#ID_DOCUMENTO_ENTRADA").val();
        documentoSalidaDatos.folio_salida = $("#FOLIO_SALIDA").val();
        documentoSalidaDatos.fecha_envio = $("#FECHA_ENVIO").val();
        documentoSalidaDatos.asunto = $("#ASUNTO").val();
        documentoSalidaDatos.destinatario = $("#DESTINATARIO").val();
        documentoSalidaDatos.archivo_adjunto = $('#fileupload').fileupload('option', 'url');
        documentoSalidaDatos.observaciones = $("#OBSERVACIONES").val();
        listo=
            (
               documentoSalidaDatos.id_documento_entrada!=""?
               documentoSalidaDatos.folio_salida!=""?
               documentoSalidaDatos.fecha_envio!=""?
               documentoSalidaDatos.asunto!=""?
               documentoSalidaDatos.destinatario!=""?
               documentoSalidaDatos.observaciones!=""?
               true: false: false: false: false: false: false
            );

               listo ?  insertarDocumentoSalida(documentoSalidaDatos):swalError("Completar campos");
    });

    $("#btn_limpiar").click(function()
    {
        $("#ID_DOCUMENTO_ENTRADA").val("");
        $("#FOLIO_SALIDA").val("");
        $("#FECHA_ENVIO").val("");
        $("#ASUNTO").val("");
        $("#DESTINATARIO").val("");
        $("#OBSERVACIONES").val("");              
    });
    
});//LLAVE CIERRE FUNCTION


