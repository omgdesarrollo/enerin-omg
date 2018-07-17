   parametroscheck={"validado":"false","no_validado":"false","sin_documento":"false"}; 
   __datos=[];
    $(function (){
$('#checkValidado').click(function() {
    parametroscheck["validado"]=$(this).is(':checked');
    cargar("validados");
});
    
$('#checkNoValidado').click(function() {
parametroscheck["no_validado"]=$(this).is(':checked');
    cargar("novalidados");
    });
    
$('#checkSinDocumento').click(function() {
parametroscheck["sin_documento"]=$(this).is(':checked');
    cargar("sindocumento");
    });
    $("#btnGraficar").click(function (){

 $('#modalgraficas').modal('show');

    });
    });
    
    
function cargar(key){
    switch (key) {
        case "validados":
         listarDatos();
        break;
        
        case "novalidados":
            listarDatos();
        break;
        
        case "sindocumento":
            listarDatos();
        break;
        
        default:

        break;
    }
}

function listarDatos()
{ 
        __datos=[];
        datosParamAjaxValues={};
        datosParamAjaxValues["url"]="../Controller/InformeValidacionDocumentosController.php?Op=listarparametros(v,nv,sd)";
        datosParamAjaxValues["type"]="POST";
        datosParamAjaxValues["paramDataValues"]=parametroscheck;
        datosParamAjaxValues["async"]=false;
        var variablefunciondatos=function obtenerDatosServer (r){
        status="validado";
        $.each(r["info"],function (index,value){
          (value.validacion_tema_responsable=="true")?status="validado":status="En Proceso";
           __datos.push({"clave_doc":value.clave_documento,
           "temayresponsable":"<button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
           "requisitos":"<button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
           "registros":"<button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
           "nombre_doc":value.documento,
           "responsable_doc":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
           "status":status
           })

        if(value.validacion_tema_responsable=="true"){status="validado";}else{status="En proceso";}
        __datos.push({
        "clave_doc":value.clave_documento,
        "temayresponsable":"<button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
        "requisitos":"<button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
        "registros":"<button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
        "nombre_doc":value.documento,
        "responsable_doc":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
        "status":status
        })
        });
   }
   var listfunciones=[variablefunciondatos];
   ajaxHibrido(datosParamAjaxValues,listfunciones); 
   $("#jsGrid").html();
       $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        heading: true,
        sorting: true,
        paging: true,
        data: __datos,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        fields: [
            { name: "clave_doc",label: "Clave documento", type: "text", width: 150, validate: "required" },
             { name: "temayresponsable", type: "text", width: 150, validate: "required" },
             { name: "requisitos", type: "text", width: 150, validate: "required" },
              { name: "registros", type: "text", width: 150, validate: "required" },
              { name: "nombre_doc", type: "text", width: 150, validate: "required" },
              { name: "responsable_doc", type: "text", width: 150, validate: "required" },
              { name: "status", type: "text", width: 150, validate: "required" }
//            { name: "Age", type: "number", width: 50 },
//            { name: "Address", type: "text", width: 200 },
//            { name: "Country", type: "select", items: countries, valueField: "Id", textField: "Name" },
//            { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
//            { type: "control" }
        ]
    });
   
//    $.ajax
//    ({
//        url: '../Controller/InformeValidacionDocumentosController.php?Op=listarparametros(v,nv,sd)',
//        type: 'POST',
//        data:parametroscheck,
//        beforeSend:function()
//        {
//            $('#loader').show();
//        },
//        success:function(datos)
//        {
////            data = datos;
//            construirTable(datos);
//        },
//        error:function(error)
//        {
//            $('#loader').hide();
//        }
//    });
}


//function construirTable(data)
//{
//    cargaTodo=0;
//    tempData="";
//    
//    $.each(data["info"],function(index,value){
//        value["clave_cumplimiento"]=data["detallesContrato"]["clave_cumplimiento"];
//        value["cumplimiento"]=data["detallesContrato"]["cumplimiento"];
//            tempData += construir(value,cargaTodo);
//    });
//     
//    $("#datosGenerales").html(tempData);
//    $("#loader").hide();
//}

//function construir(value,carga)
//{
//    tempData = "";
//    
//                if(carga==0)
//                tempData += "<tr id='registro_"+value.id_validacion_documento+"'>";
//                tempData += "<td class='celda' width='5%'>"+value.clave_cumplimiento+"</td>"
//                tempData += "<td class='celda' width='10%'>"+value.cumplimiento+"</td>"
//                tempData += "<td class='celda' width='10%'><button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
//                tempData += "<td class='celda' width='10%'><button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
//                tempData += "<td class='celda' width='10%'><button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
//                tempData += "<td class='celda' width='15%'>"+value.clave_documento+"</td>";
//                tempData += "<td class='celda' width='15%'>"+value.documento+"</td>";
//                tempData += "<td class='celda' width='15%'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td>";
//                if(value.validacion_tema_responsable=="true")
//                {
//                   tempData += "<td class='celda' width='10%'>Validado</td>";
//                }
//                if (value.validacion_tema_responsable=="false")
//                {
//                   tempData += "<td class='celda' width='10%'>En Proceso</td>"; 
//                }
//                
//                if(carga==0)
//                tempData += "</tr>";
//    
//        return tempData;                                                        
//}


function mostrarTemaResponsable(id_documento)
{
    ValoresTemaResponsable = "<table class='tbl-qa'>\n\
                                <tr>\n\
                                    <th class='table-header'>Tema</th>\n\
                                    <th class='table-header'>Responsable del Tema</th>\n\
                                </tr>\n\
                                <tbody>";
    $.ajax ({
        url:"../Controller/InformeValidacionDocumentosController.php?Op=MostrarTemayResponsable",
        type:'POST',
        data:'ID_DOCUMENTO='+id_documento,
        success:function(responseTemayResponsable)
        {
            $.each(responseTemayResponsable,function(index,value){
              ValoresTemaResponsable+="<tr><td>"+value.no+"</td>" ;
              ValoresTemaResponsable+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";  

            });

            ValoresTemaResponsable += "</tbody></table>";
            $('#TemayResponsableListado').html(ValoresTemaResponsable);
        }

    })

}
    
    
function mostrarRequisitos(id_documento)
{
        ValoresRequisitos = "<ul>";

        $.ajax ({
            url: "../Controller/InformeValidacionDocumentosController.php?Op=MostrarRequisitosPorDocumento",
            type: 'POST',
            data: 'ID_DOCUMENTO='+id_documento,
            success:function(datosRequisitos)
            {
               $.each(datosRequisitos,function(index,value){
                
                ValoresRequisitos+="<li>"+value.requisito+"</li>";                                       

               });
           ValoresRequisitos += "</ul>";     
               $('#RequisitosListado').html(ValoresRequisitos);
            }
        });
}


function mostrarRegistros(id_documento)
{
 ValoresRegistros = "<ul>";

 $.ajax ({
     url:"../Controller/InformeValidacionDocumentosController.php?Op=MostrarRegistrosPorDocumento",
     type: 'POST',
     data: 'ID_DOCUMENTO='+id_documento,
     success:function(responseregistros)
     {
         $.each(responseregistros,function(index,value){
            ValoresRegistros+="<li>"+value.registro+"</li>"; 
         });

ValoresRegistros += "</ul>";
         $('#RegistrosListado').html(ValoresRegistros);
     }
 })
}
function loadSpinner(){
        myFunction();
}
