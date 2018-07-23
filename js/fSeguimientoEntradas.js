
    $(function (){

    
    
    }); //CIERRA EL $(FUNCTION)
function listarDatosSeguimientoEntrada()
{
        __datos=[];
        contador=1;
        datosParamAjaxValues={};
        datosParamAjaxValues["url"]="../Controller/SeguimientoEntradasController.php?Op=Listar";
        datosParamAjaxValues["type"]="GET";
//        datosParamAjaxValues["paramDataValues"]=parametroscheck;
        datosParamAjaxValues["async"]=false;
        var variablefunciondatos=function obtenerDatosServer (r){
        $.each(r,function (index,value){
       
//        nameDate=mostrar_urls(value.id_evidencias);
        __datos.push({
            "No":contador++,
            "folio entrada":value.folio_entrada,
            "autoridad remitente":value.clave_autoridad,
            "asunto":value.asunto,
            "responsable del tema":value.nombre_empleadotema,
            "fecha asignacion":value.fecha_asignacion,
            "fecha limite":value.fecha_limite_atencion,
            "fecha alarma":value.fecha_alarma,
            "status":value.status_doc,
            "condicion":"En proceso",
            "responsable del plan":value.nombre_empleadoplan,
            "archivo adjunto":value.nombre_empleadoplan,
            "registrar programa":value.nombre_empleadoplan,
            "avance del programa":value.avance_programa,
        })
        });
  } 
   var listfunciones=[variablefunciondatos];
   ajaxHibrido(datosParamAjaxValues,listfunciones); 
   
       $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        filtering: true,
        heading: true,
        sorting: true,
        paging: true,
        data: __datos,
        fields: [
                { name: "No", type: "text", width: 80, validate: "required" },
                { name: "folio entrada", type: "text", width: 80, validate: "required" },
                { name: "autoridad remitente", type: "text", width: 150, validate: "required" },
                { name: "asunto", type: "text", width: 150, validate: "required" },
                { name: "responsable del tema", type: "text", width: 150, validate: "required" },
                { name: "fecha asignacion", type: "text", width: 80, validate: "required" },
                { name: "fecha limite", type: "text", width: 80, validate: "required" },
                { name: "fecha alarma", type: "text", width: 80, validate: "required" },
                { name: "status", type: "text", width: 80, validate: "required" },
                { name: "condicion", type: "text", width: 80, validate: "required" },
                { name: "responsable del plan", type: "text", width: 80, validate: "required" },
                { name: "archivo adjunto", type: "text", width: 80, validate: "required" },
                { name: "registrar programa", type: "text", width: 80, validate: "required" },
                { name: "avance del programa", type: "text", width: 80, validate: "required" },
        ]
    });
}







