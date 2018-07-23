
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
            "nombre empleado plan":value.nombre_empleadoplan,
            "nombre empleado tema":value.nombre_empleadotema
        })
        });
//        console.log(__datos);
   }
   
   var listfunciones=[variablefunciondatos];
   ajaxHibrido(datosParamAjaxValues,listfunciones); 
   
       $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        heading: true,
        sorting: true,
        paging: true,
 
        data: __datos,
        fields: [
                { name: "No", type: "text", width: 80, validate: "required" },
                { name: "nombre empleado plan", type: "text", width: 150, validate: "required" },
                 { name: "nombre empleado tema", type: "text", width: 150, validate: "required" }
                
        ]
    });
}










