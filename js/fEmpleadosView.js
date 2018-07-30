

function listarDatos()
{
    
     __datos=[];
     datosParamAjaxValues={};
     datosParamAjaxValues["url"]="../Controller/EmpleadosController.php?Op=Listar";
     datosParamAjaxValues["type"]="POST";
     datosParamAjaxValues["async"]=false;
     
     var variablefunciondatos=function obtenerDatosServer (data)
    {
        $.each(data,function(index,value){
            __datos.push({
                "id_principal":[{'id_empleado':value.id_empleado}],
                "nombre_empleado":value.nombre_empleado,
                "apellido_materno":value.apellido_materno,
                "apellido_paterno":value.apellido_paterno,
                "categoria":value.categoria,
                "fecha_creacion":value.fecha_creacion
            })
        });
    }
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
    
    data: __datos,
        fields: [
                { name: "id_principal",visible:false },
                { name: "nombre_empleado",title:"Nombre", type: "text", width: 80, validate: "required" },
                { name: "apellido_paterno",title:"Apellido Paterno", type: "text", width: 150, validate: "required" },
                { name: "apellido_materno",title:"Apellido Materno", type: "text", width: 150, validate: "required" },
                { name: "categoria",title:"Categoria", type: "text", width: 150, validate: "required" },
                { name: "fecha_creacion",title:"Fecha Creacion", type: "text", width: 150, validate: "required" },
                {type:"control"}
        ]
    });
}




function loadSpinner(){
        myFunction();
}