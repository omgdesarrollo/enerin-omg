parametroscheck={"validado":"false","no_validado":"false","sin_documento":"false"}; 
   __datos=[];
$(function(){
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
        contador=1;
        datosParamAjaxValues={};
        datosParamAjaxValues["url"]="../Controller/InformeValidacionDocumentosController.php?Op=listarparametros(v,nv,sd)";
        datosParamAjaxValues["type"]="POST";
        datosParamAjaxValues["paramDataValues"]=parametroscheck;
        datosParamAjaxValues["async"]=false;
        var variablefunciondatos=function obtenerDatosServer (r){
        status="validado";
        $.each(r["info"],function(index,value){
          (value.validacion_tema_responsable=="true")?status="validado":status="En Proceso";
           __datos.push({
           "No":contador++,
           "Clave del Documento":value.clave_documento,
           "Nombre del Documento":value.documento,
           "Responsable del Documento":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
           "Tema":"<button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
           "Requisitos":"<button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
           "Registros":"<button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
           "Status":status
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
            { name: "No", type: "text", width: 80, validate: "required" },
            { name: "Clave del Documento", type: "text", width: 150, validate: "required" },
            { name: "Nombre del Documento", type: "text", width: 150, validate: "required" },
            { name: "Responsable del Documento", type: "text", width: 150, validate: "required" },
            { name: "Tema", type: "text", width: 150, validate: "required" },
            { name: "Requisitos", type: "text", width: 150, validate: "required" },
            { name: "Registros", type: "text", width: 150, validate: "required" },
            { name: "Status", type: "text", width: 150, validate: "required" }
        ]
    });
   
}


function listarDatosGrafica()
{
    __datosGraficar=[
        {"Conceptos":"Empleados","Seleccion":""},
        {"Conceptos":"Temas","Seleccion":""},
        {"Conceptos":"Documentos","Seleccion":""},
        {"Conceptos":"Asignaciones","Seleccion":""},
        {"Conceptos":"Validacion de Documentos","Seleccion":""},
        {"Conceptos":"Evidencias","Seleccion":""}
    ];
       
    __fieldsDatos=[
            { name: "Conceptos", type: "text", width: 80, validate: "required" },
            { name: "Seleccion", type: "text", width: 80, validate: "required" }
    ];
            
    
//   var listfunciones=[variablefunciondatos];
//   ajaxHibrido(datosParamAjaxValues,listfunciones); 
   $("#jsGridGrafico").html();
       $("#jsGridGrafico").jsGrid({
        width: "20%",
        height: "300px",
        heading: true,
        sorting: true,
        paging: true,
        data: __datosGraficar,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        
        fields:__fieldsDatos, 
//                [
////            { name: "clave_doc",textField: "Clave documento", type: "text", width: 150, validate: "required" },
//            { name: "Conceptos", type: "text", width: 80, validate: "required" },
//            { name: "Seleccion", type: "text", width: 80, validate: "required" }
//
//
//        ]
    });
    
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
