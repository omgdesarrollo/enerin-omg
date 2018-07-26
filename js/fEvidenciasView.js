function listarDatosGrid(){
        __datos=[];
        contador=1;
        datosParamAjaxValues={};
        datosParamAjaxValues["url"]="../Controller/EvidenciasController.php?Op=Listar";
        datosParamAjaxValues["type"]="POST";
        datosParamAjaxValues["async"]=false;
        var variablefunciondatos=function obtenerDatosServer (r)
        {
            $.each(r,function(index,value){
//              (value.validacion_tema_responsable=="true")?status="validado":status="En Proceso";
               __datos.push({
               "No":index++,
               "Requisito":"",
               "Registro":"",
               "Frecuencia":"",
               "Clave_Documento":"",
               "Adjuntar Evidencia":"",
               "Fecha de registro":"",
               "Usuario":"",
               "Accion Correctiva":"",
               "Plan de Accion":"",
               "Desviacion":"",
               "Validacion":"",
               "Opcion":""
               })
            });
//            dataListado = r["info"];
        }
   var listfunciones=[variablefunciondatos];
    ajaxHibridoObtencioDatosSinEnvioDeLadoCliente(datosParamAjaxValues,listfunciones); 
    construirGrid(__datos);
//    return __datos;
}


function construirGrid(datosF)
{
    console.log("A"+datosF);
    
    $("#jsGrid").html("");
    $("#jsGrid").jsGrid({
    width: "100%",
    height: "200px",
    heading: true,
    sorting: true,
    paging: true,
    data: datosF,
    pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
    fields: [
        { name: "No", type: "text", width: 80, validate: "required" },
        { name: "Requisito", type: "text", width: 80, validate: "required" },
        { name: "Registro", type: "text", width: 80, validate: "required" },
        { name: "Frecuencia", type: "text", width: 150, validate: "required" },
        { name: "Clave_Documento", type: "text", width: 150, validate: "required" },
         {name:"Adjuntar Evidencia", type: "text", width: 150, validate: "required"},
        { name: "Fecha de registro", type: "text", width: 150, validate: "required" },
        { name: "Usuario", type: "text", width: 150, validate: "required" },
        { name: "Accion Correctiva", type: "text", width: 150, validate: "required" },
        { name: "Desviacion", type: "text", width: 150, validate: "required" },
        { name: "Validacion", type: "text", width: 150, validate: "required" },
         { name: "Opcion", type: "text", width: 150, validate: "required" }
    ]
    });
}
